
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lumino - Forms</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link href="css/datepicker3.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		
		<!--Theme Switcher-->
		<style id="hide-theme">
			body{
				display:none;
                
			}
          
		</style>
		<script type="text/javascript">
			function setTheme(name){
				var theme = document.getElementById('theme-css');
				var style = 'css/theme-' + name + '.css';
				if(theme){
					theme.setAttribute('href', style);
				} else {
					var head = document.getElementsByTagName('head')[0];
					theme = document.createElement("link");
					theme.setAttribute('rel', 'stylesheet');
					theme.setAttribute('href', style);
					theme.setAttribute('id', 'theme-css');
					head.appendChild(theme);
				}
				window.localStorage.setItem('lumino-theme', name);
			}
			var selectedTheme = window.localStorage.getItem('lumino-theme');
			if(selectedTheme) {
				setTheme(selectedTheme);
			}
			window.setTimeout(function(){
					var el = document.getElementById('hide-theme');
					el.parentNode.removeChild(el);
				}, 5);
		</script>
		<!-- End Theme Switcher -->
		
		<!--Custom Font-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
        <!--HEADER-->
		<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span></button>
					<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
					<ul class="nav navbar-top-links navbar-right">
						<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-envelope"></em><span class="label label-info">15</span>
						</a>
							<ul class="dropdown-menu dropdown-messages">
								<li>
									<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="images/profile-pic-2.jpg" width="40">
										</a>
										<div class="message-body"><small class="pull-right">3 mins ago</small>
											<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
										<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="images/profile-pic-1.jpg" width="40">
										</a>
										<div class="message-body"><small class="pull-right">1 hour ago</small>
											<a href="#">New message from <strong>Jane Doe</strong>.</a>
										<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="all-button"><a href="#">
										<em class="fa fa-inbox"></em> <strong>All Messages</strong>
									</a></div>
								</li>
							</ul>
						</li>
						<a class="dropdown-toggle count-info" href="{{ route('logout') }}">
							<em class="fa fa-bell"></em><span class="label label-primary">5</span>
						</a>
							
						
					</ul>
					<ul class="navbar-right theme-switcher">
						<li><span>Choose Theme:</span></li>
						<li><a href="#" title="Default" data-theme="default" class="theme-btn theme-btn-default">Default</a></li>
						<li><a href="#" title="Iris" data-theme="iris" class="theme-btn theme-btn-iris">Iris</a></li>
						<li><a href="#" title="Midnight" data-theme="midnight" class="theme-btn theme-btn-midnight">Midnight</a></li>
						<li><a href="#" title="Lime" data-theme="lime"  class="theme-btn theme-btn-lime">Lime</a></li>
						<li><a href="#" title="Rose" data-theme="rose" class="theme-btn theme-btn-rose">Rose</a></li>
					</ul>
				</div>
			</div><!-- /.container-fluid -->
		</nav>

        <!--MENU-->
		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
			<div class="profile-sidebar">
				<div class="profile-userpic">
					<img src="image/admin.jpg" width="60" alt="User Avatar" class="img-circle" />
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">Username</div>
					<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="divider"></div>
			<form role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
			</form>
			<ul class="nav menu">
				<li class="parent "><a data-toggle="collapse" href="#sub-item-1" class="" aria-expanded="true">
					<em class="fa fa-file-o">&nbsp;</em> Quản lí ngày <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right" aria-expanded="true"><i class="fa fa-plus"></i></span>
					</a>
					<ul class="children list-day collapse in" id="sub-item-1" aria-expanded="true" style="">
						<li><a class="" href="gallery.html">
							Thứ 2
						</a></li>
						<li><a class="" href="gallery.html">
							Thứ 3
						</a></li>
						<li><a class="" href="error.html">
							Thứ 4
						</a></li>
						<li><a class="" href="error.html">
							Thứ 5
						</a></li>
						<li><a class="" href="error.html">
							Thứ 6
						</a></li>
					</ul>
				</li>

                
			</ul>
		</div>
			

        <!--MAIN-->
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                    <li class="active">Tài khoản</li>
                </ol>
            </div><!--/.row-->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lí sinh viên</h1>
                    <ul class="nav nav-pills mb-3 time-active" id="pills-tab" role="tablist">
                        <li class="nav-item " role="presentation">
                          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                              <div class="range-time">
                                    <h4 class="text-center range-houre range-time-mb-0"><span>13:00</span>-<span>14:00</span></h4>
                                    <p class="text-center subject range-time-mb-0">Môn Toán</p>
                                    <p class="text-center teacher range-time-mb-0">Nguyễn Thế Phúc</p>
                              </div>
                          </a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                            <div class="range-time">
                                <h4 class="text-center range-houre range-time-mb-0"><span>13:00</span>-<span>14:00</span></h4>
                                <p class="text-center subject range-time-mb-0">Môn Toán</p>
                                <p class="text-center teacher range-time-mb-0">Nguyễn Thế Phúc</p>
                            </div>
                          </a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <div class="range-time">
                                <h4 class="text-center range-houre range-time-mb-0"><span>13:00</span>-<span>14:00</span></h4>
                                <p class="text-center subject range-time-mb-0">Môn Toán</p>
                                <p class="text-center teacher range-time-mb-0">Nguyễn Thế Phúc</p>
                            </div>
                          </a>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Họ tên</th>
                                        <th>Giờ vào</th>
                                        <th>Giờ ra</th>
                                        <th>Đi muộn</th>
                                        <th>Vắng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Nguyễn Văn Tôn</td>
                                        <td>13:00</td>
                                        <td>13:00</td>
                                        <td>M</td>
                                        <td>V</td>
                                    </tr>
                                 
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Họ tên</th>
                                        <th>Giờ vào</th>
                                        <th>Giờ ra</th>
                                        <th>Đi muộn</th>
                                        <th>Vắng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Nguyễn Văn Tôn</td>
                                        <td>13:00</td>
                                        <td>13:00</td>
                                        <td>M</td>
                                        <td>V</td>
                                    </tr>
                                 
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Họ tên</th>
                                        <th>Giờ vào</th>
                                        <th>Giờ ra</th>
                                        <th>Đi muộn</th>
                                        <th>Vắng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Nguyễn Văn Tôn</td>
                                        <td>13:00</td>
                                        <td>13:00</td>
                                        <td>M</td>
                                        <td>V</td>
                                    </tr>
                                 
                                    
                                </tbody>
                            </table>
                        </div>
                      </div>
                </div>
            </div>
        </div>


        <div class="row">
			<div class="col-lg-12">
               
               
            </div>
		</div>
	

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/chart.min.js"></script>
		<script src="js/chart-data.js"></script>
		<script src="js/easypiechart.js"></script>
		<script src="js/easypiechart-data.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/custom.js"></script>
        <script>
			window.onload = function () {
				var chart1 = document.getElementById("line-chart").getContext("2d");
				window.myLine = new Chart(chart1).Line(lineChartData, {
				responsive: true,
				scaleLineColor: "rgba(0,0,0,.2)",
				scaleGridLineColor: "rgba(0,0,0,.05)",
				scaleFontColor: "#c5c7cc"
				});
			};
		</script>
		
	</body>
</html>
