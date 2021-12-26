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
    <link href="{{ asset('css/strap.min.css') }}" rel="stylesheet">
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
                $("#name").html('Vui Longf thu lai');
                $("#photo").attr('src','#');
            }
            else{
                $("#student_code").html(data.data.student_code);
                $("#name").html(data.data.name);
                $("#photo").attr('src',data.data.photo);
            }
            setTimeout(removeInfo, 5000);
          
        });
        function removeInfo() {
                $("#student_code").html('');
                $("#name").html('');
                $("#photo").attr('src','#');
        }
      </script>
</head>
<body>
    <header>
        <div class="detect-login">
            <a href="{{ route('login') }}">Login</a>
        </div>
    </header>
    <main class="main">
        <div class="content">
            <h3 class="content-title">Điểm danh sinh viên</h3>
            <div class="content-detect">
                <div class="detect-image">
                    <img src="{{ env('SERVER_STREAM') }}">
                </div>
                <div class="content-info">
                    <h4>Xin chào!</h4>
                    <p id="student_code"></p>
                    <p id="name"></p>
                   
                </div>
            </div>
        </div>
        
    </main>
    <img style="width: 42%;" id="photo" src="#" alt="Hình ảnh bạn">
</body>
</html>