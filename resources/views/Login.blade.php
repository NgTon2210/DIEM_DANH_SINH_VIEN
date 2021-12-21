
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dang nhap</title>
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	</head>
	<body>
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">Login</div>
					<div class="panel-body">
						<form method="POST" action="{{ route('handle.login') }}" role="form">
							@csrf
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password" value="">
								</div>
								<div class="checkbox">
									<label>
										<input name="remember" type="checkbox" value="Remember Me">Remember Me
									</label>
								</div>
								<div class="text-center">
									<button class="btn btn-lg btn-primary" type="submit">Login</button></fieldset>
								</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->	
	
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
