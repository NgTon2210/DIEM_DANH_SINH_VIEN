<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detect</title>
    <link href="{{ asset('css/strap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/detect.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <div class="detect-login">
            <a href="Login.html">Login</a>
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
                    <p>Nguyễn Văn Tôn</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>