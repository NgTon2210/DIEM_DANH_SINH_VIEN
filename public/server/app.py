from deepface import DeepFace
from flask import Flask, Response, request
from deepface.basemodels import Facenet512
import cv2, os, requests, time
from datetime import datetime
import numpy as np
from flask import jsonify

#-------------add model face opencv
faceCascade = cv2.CascadeClassifier("C:\\Users\\Ng_Ton\\anaconda3\\envs\\detect_face\\Lib\\site-packages\\cv2\\data\\haarcascade_frontalface_default.xml")

# -------------load model Deepface
app = Flask(__name__)
backSub = cv2.createBackgroundSubtractorMOG2(history=10, varThreshold=40, detectShadows=False)
model = Facenet512.loadModel()
DeepFace.find(img_path ='image_load_model.jpg', db_path ="static", model_name ='Facenet512', model = model, enforce_detection = False)

#-------------Read camera
camera = cv2.VideoCapture(0)

#-------------params config
jump_frame = 3
threshold_white_pixel = 700
len_array_bst = 10
threshold_capture = 1000
server_laravel = "http://localhost:8000/listen-server"


#-------------params support
only_read_camera = False
capture_photo = False
array_check_in_out = []
total_white_pixel = 0
count = 1

def getFrame():
    global model
    global capture_photo
    global count
    global total_white_pixel
    global array_check_in_out
    global faceCascade

    while True:
        success, frame = camera.read()
        # crop image

        if not success:
            break
        else:
            if only_read_camera:
                if capture_photo:
                    cv2.imwrite("photo.jpg", frame)
                    capture_photo = False
            else:
                bgSubMat = backSub.apply(frame)
                total_white_pixel += np.count_nonzero(bgSubMat == 255)
                if count % jump_frame == 0:
                    if total_white_pixel < threshold_white_pixel:
                        array_check_in_out.append(total_white_pixel)
                    if total_white_pixel > threshold_white_pixel:
                        array_check_in_out = []
                    count = 1
                    total_white_pixel = 0

                if len(array_check_in_out) == len_array_bst:
                    if sum(array_check_in_out) > threshold_capture:
                        gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
                        faces = faceCascade.detectMultiScale(gray, scaleFactor=1.1, minNeighbors=5, minSize=(30, 30), flags=cv2.CASCADE_SCALE_IMAGE)

                        if len(faces) > 0:
                            cv2.imwrite("img_detect.jpg", frame)
                            time.sleep(1)
                            recognition_face = DeepFace.find(img_path='img_detect.jpg', db_path="static", model_name='Facenet512', model=model, enforce_detection=False)

                            student_code = ''
                            identity = ''
                            try:
                                identity = recognition_face.iloc[0].identity
                            except:
                                print("Face not in database")
                            if identity:
                                student_code = identity.split("\\")[1].split("/")[0]
                            url = server_laravel + "?student_code=" + student_code
                            requests.get(url)
                            if os.path.exists("img_detect.jpg"):
                                os.remove("img_detect.jpg")
                    array_check_in_out = []

                count += 1

            ret, buffer = cv2.imencode('.jpg', frame)
            frame = buffer.tobytes()
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')  # concat frame one by one and show result

@app.route('/video_feed')
def frameOut():
    return Response(getFrame(), mimetype='multipart/x-mixed-replace; boundary=frame')

@app.route('/camera_only_read')
def camera_only_read():
    global only_read_camera
    only_read_camera = True
    data = {"status": "success"}
    return jsonify(data)

@app.route('/camera_detect')
def camera_detect():
    global only_read_camera
    only_read_camera = False
    data = {"status": "success"}
    return jsonify(data)

@app.route('/take_photo')
def take_photo():
    global capture_photo
    capture_photo = True
    data = {"status": "success"}
    return jsonify(data)

if __name__ == '__main__':
    app.run(debug=True)
