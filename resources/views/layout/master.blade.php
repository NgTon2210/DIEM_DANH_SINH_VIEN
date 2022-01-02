
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Điểm danh sinh viên</title>
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link href="{{ asset('css/datepicker3.css') }}" rel="stylesheet">
		<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	</head>
	<body>
        <!--HEADER-->
        @include('layout.header')

        <!--MENU-->
        @include('layout.navbar')

        <!--MAIN-->
        @yield('main')

        @section('script')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/chart.min.js')}}"></script>
		<script src="{{asset('js/chart-data.js')}}"></script>
		<script src="{{asset('js/easypiechart.js')}}"></script>
		<script src="{{asset('js/easypiechart-data.js')}}"></script>
		<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
		<script src="{{asset('js/custom.js')}}"></script>
        @show

	</body>
</html>
