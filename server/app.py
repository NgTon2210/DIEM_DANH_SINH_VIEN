from deepface import DeepFace
from flask import Flask, Response, request
import cv2
import numpy as np

app = Flask(__name__)
backSub = cv2.createBackgroundSubtractorMOG2(history=10, varThreshold=40, detectShadows=False)

# config camera
camera = cv2.VideoCapture(0)

capture_photo = False

count = 1;
total_white_pixel = 0;
array_check_in_out = []
def getFrame():
    global count
    global total_white_pixel
    global array_check_in_out

    while True:
        success, frame = camera.read()
        # crop image

        if not success:
            break
        else:
            bgSubMat = backSub.apply(frame)
            # crop image 360x480 -> 240x320
            bgSubMat = bgSubMat[120:360, 160:480]

            total_white_pixel += np.count_nonzero(bgSubMat == 255)
            if count % 3 == 0:
                if total_white_pixel < 500:
                    array_check_in_out.append(total_white_pixel)
                if total_white_pixel > 500:
                    array_check_in_out = []
                count = 1
                total_white_pixel = 0

            if len(array_check_in_out) == 10:
                if sum(array_check_in_out) > 1000:
                    print('CHUP ANH -------------------------->')
                array_check_in_out = []

            count += 1

            ret, buffer = cv2.imencode('.jpg', bgSubMat)
            frame = buffer.tobytes()
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')  # concat frame one by one and show result

@app.route('/video_feed')
def frameOut():
    return Response(getFrame(), mimetype='multipart/x-mixed-replace; boundary=frame')

if __name__ == '__main__':
    app.run(debug=True)
