import face_recognition, cv2, json, os, re, io
import numpy as np
from datetime import datetime
# helper for project
def thresthold_detect(array, n):
    for value in array:
        if value <= n:
            return True
    return False

def add_user_to_json(path_file, data):
    with open(path_file, 'r+', encoding = 'utf8' ) as file:
        if os.path.getsize(path_file) != 0:
            arr = json.load(file)
        else:
            arr = []
        arr.append(data)
        file.seek(0)
        json.dump(arr, file, ensure_ascii = False, indent=4)

def no_accent_vietnamese(s):
    s = re.sub(r'[àáạảãâầấậẩẫăằắặẳẵ]', 'a', s)
    s = re.sub(r'[ÀÁẠẢÃĂẰẮẶẲẴÂẦẤẬẨẪ]', 'A', s)
    s = re.sub(r'[èéẹẻẽêềếệểễ]', 'e', s)
    s = re.sub(r'[ÈÉẸẺẼÊỀẾỆỂỄ]', 'E', s)
    s = re.sub(r'[òóọỏõôồốộổỗơờớợởỡ]', 'o', s)
    s = re.sub(r'[ÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠ]', 'O', s)
    s = re.sub(r'[ìíịỉĩ]', 'i', s)
    s = re.sub(r'[ÌÍỊỈĨ]', 'I', s)
    s = re.sub(r'[ùúụủũưừứựửữ]', 'u', s)
    s = re.sub(r'[ƯỪỨỰỬỮÙÚỤỦŨ]', 'U', s)
    s = re.sub(r'[ỳýỵỷỹ]', 'y', s)
    s = re.sub(r'[ỲÝỴỶỸ]', 'Y', s)
    s = re.sub(r'[Đ]', 'D', s)
    s = re.sub(r'[đ]', 'd', s)
    return s

def get_data(path_file):
    #đọc file và chuyển dưới dạng arr
    with open(path_file, 'r+', encoding = 'utf8' ) as file:
        arr = []
        if os.path.getsize(path_file) != 0:
            arr = json.load(file)

    #lặp mảng và xử lý để lấy măt dưới dạng ma trận
    for value in arr:
        known_face_names.append(value["name"])
        image = face_recognition.load_image_file(value["path"])
        encoding = face_recognition.face_encodings(image)[0]
        known_face_encodings.append(encoding)

    return known_face_encodings , known_face_names

def get_list_student(path_file):
    with open(path_file, 'r+', encoding = 'utf8' ) as file:
        arr = []
        if os.path.getsize(path_file) != 0:
            arr = json.load(file)
    result = []
    for value in arr:
        result.append(value["name"])
    return result

def in_list(list_student, name):
    for value in list_student:
        if value == name:
            return True
    return False

def take_attendance(name,list_present,list_absent):
    if name != 'Unknown': #neu khong có trong danh sach thì them vao
        if not in_list(list_present,name):
            list_present.append(name)
            list_absent.remove(name)

    return list_present, list_absent #neu có rồi thì return


known_face_encodings = [] # chứa danh sách face dưới dạng ma trận
known_face_names = [] # chứa danh sách tên tương ứng
known_face_encodings, known_face_names = get_data("data/data.json")

# Initialize some variables
face_locations = []
face_encodings = []
face_names = []
process_this_frame = True

list_present = []
list_absent = get_list_student("data/data.json")





video_capture = cv2.VideoCapture(0) # đọc từ webcam

while True:
    # đọc frame của video
    ret, frame = video_capture.read()
    # sự kiện nhấn phím
    key = cv2.waitKey(1)

    if key % 256 == 27:
        # ESC pressed
        print("Thoát ứng dụng thành công!!!!!!")
        break
    elif key % 256 == 32:
        name = input("Nhập họ tên: ")
        img_name = "img_" + datetime.now().strftime('%d_%m_%Y_%H_%M_%S')+".jpg"
        data = {"name" : name , "path" : "data/"+img_name}
        add_user_to_json("data/data.json", data) #add vào json
        cv2.imwrite("data/" + img_name, frame) #add anh tuong ung vao data
        print("Đã thêm học sinh mới với tên : " + name)
    elif key == 117:
        known_face_encodings, known_face_names = get_data("data/data.json")
        list_absent = get_list_student("data/data.json")



    small_frame = cv2.resize(frame, (0, 0), fx=0.25, fy=0.25)
    rgb_small_frame = small_frame[:, :, ::-1]

    # Only process every other frame of video to save time
    if process_this_frame: #kiem tra nhan frame tu webcam
        face_locations = face_recognition.face_locations(rgb_small_frame)
        face_encodings = face_recognition.face_encodings(rgb_small_frame, face_locations)

        face_names = []
        #lay face o webcam so sanh với face trong danh sach
        for face_encoding in face_encodings:
            # See if the face is a match for the known face(s)
            matches = face_recognition.compare_faces(known_face_encodings, face_encoding)
            name = "Unknown"


            face_distances = face_recognition.face_distance(known_face_encodings, face_encoding)
            if (thresthold_detect(face_distances, 0.35)):
                best_match_index = np.argmin(face_distances)
                if matches[best_match_index]:
                    name = known_face_names[best_match_index]

            face_names.append(name)

    process_this_frame = not process_this_frame


    # Display the results
    for (top, right, bottom, left), name in zip(face_locations, face_names):

        top *= 4
        right *= 4
        bottom *= 4
        left *= 4

        cv2.rectangle(frame, (left, top), (right, bottom), (0, 0, 255), 2)

        # Draw a label with a name below the face
        cv2.rectangle(frame, (left, bottom - 35), (right, bottom), (0, 0, 255), cv2.FILLED)
        font = cv2.FONT_HERSHEY_DUPLEX

        cv2.putText(frame, no_accent_vietnamese(name), (left + 6, bottom - 6), font, 1.0, (255, 255, 255), 1)

        list_present, list_absent= take_attendance( name, list_present ,list_absent)

        filename = datetime.now().strftime('%d_%m_%Y')
        with io.open("diem_danh/{}.txt".format(filename), 'w', encoding='utf8') as f:
            f.write("==========DANH SÁCH LỚP============\n")
            f.write(str(get_list_student("data/data.json")) + "\n")
            f.write("==========CÓ MẶT============\n")
            for value in list_present:
                f.write(value+"\n")
            f.write("==========VẮNG MẶT============\n")
            for value in list_absent:
                f.write(value+"\n")


    cv2.imshow('Video', frame)


# Release handle to the webcam
video_capture.release()
cv2.destroyAllWindows()









