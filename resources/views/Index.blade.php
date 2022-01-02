<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detect</title>
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    <link href="{{ asset('templates/css/detect.css') }}" rel="stylesheet">
    <link href="{{ asset('css/detect.css') }}" rel="stylesheet">
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('839f27c45848f531e7f8', {
          cluster: 'ap1'
        });
    
        var channel = pusher.subscribe('detect-face');
        channel.bind('face', function(data) {
            if (data.data == null) {
                $("#student_code").html('');
                $("#name").html('Vui Lòng Thử Lại !!!!!!!!!!');
                $("#photo").attr('src','#');
            }
            else{
                $("#student_code").html(data.data.student_code);
                $("#name").html(data.data.name);
                $("#photo").attr('src',data.data.photo);
                $("#time_in").html(data.data.time_in);
                $("#time_out").html(data.data.time_out);

                let state = data.data.state;
                if (state == 'true_time') {
                    $("#state").html('Đúng giờ');
                }else if(state == 'late_time'){
                    $("#state").html('Muộn giờ !!');
                }else if(state == 'absent_time'){
                    $("#state").html('Vắng mặt !!!!!!');
                }else if(state == 'out'){
                    $("#state").html('Kết thúc giờ học');
                }else{
                    $("#state").html('Chứ đến khung giờ điểm danh');
                }
                
            }
            setTimeout(removeInfo, 7000);
        });
        function removeInfo() {
                $("#student_code").html('__________');
                $("#name").html('__________________');
                $("#photo").attr('src','https://media.istockphoto.com/vectors/missing-image-of-a-person-placeholder-vector-id1288129985?k=20&m=1288129985&s=612x612&w=0&h=OHfZHfKj0oqIDMl5f_oRqH13MHiB63nUmySYILbWbjE=');
                $("#time_in").html('__:__');
                $("#time_out").html('__:__');
                $("#state").html('__________');
        }
      </script>
</head>
<body>
    <header class="header">
        <img src="https://www.tlu.edu.vn/Portals/_default/skins/tluvie/images/logo.png" alt="">
    </header>
        
    <main class="main">
        <div class="content">
            <h3 class="content-title">Điểm danh sinh viên</h3>
            <div class="content-detect">
                <div class="detect-image">
                    <img src="{{ env('SERVER_STREAM') }}">
                </div>
                <div class="content-info">
                    <div class="info-name">
                        <h4>Xin chào!</h4>
                        <p id="name">__________________</p>
                    </div>
                    <div class="info-code">
                        <h4>Mã sinh viên: <span id="student_code">__________</span></h4>
                    </div>
                    <div class="info-time-in">
                        <h4>Giờ vào: <span id="time_in">__:__</span></h4>
                    </div>
                    <div class="info-time-out">
                        <h4>Giờ ra: <span id="time_out">__:__</span></h4>
                    </div>
                    <div class="info-time-out">
                        <h4>Trạng thái: <span id="state">__________</span></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="take-photo">
            <img id="photo" src="https://media.istockphoto.com/vectors/missing-image-of-a-person-placeholder-vector-id1288129985?k=20&m=1288129985&s=612x612&w=0&h=OHfZHfKj0oqIDMl5f_oRqH13MHiB63nUmySYILbWbjE=" >
        </div>
    </main>
   
</body>
</html>