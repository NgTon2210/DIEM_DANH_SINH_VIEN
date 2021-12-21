from deepface import DeepFace
from flask import Flask, Response, request
import cv2
import numpy as np

app = Flask(__name__)
backSub = cv2.createBackgroundSubtractorMOG2(history=10, varThreshold=40, detectShadows=False)

# config camera
camera = cv2.VideoCapture(0)

def getFrame():
    while True:
        success, frame = camera.read()
        if not success:
            break
        else:
            fgMask = backSub.apply(frame)
            ret, buffer = cv2.imencode('.jpg', fgMask)
            frame = buffer.tobytes()
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')  # concat frame one by one and show result

@app.route('/video_feed')
def frameOut():
    return Response(getFrame(), mimetype='multipart/x-mixed-replace; boundary=frame')

if __name__ == '__main__':
    app.run(debug=True)