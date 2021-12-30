<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Clean Login Form Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />

	<!-- css files -->
	<link href="{{asset("css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" media="all">
	<link href="{{asset("css/login.css")}}" rel="stylesheet" type="text/css" media="all" />
	<!-- /css files -->

	<!-- online fonts -->
	<link href="//fonts.googleapis.com/css?family=Sirin+Stencil" rel="stylesheet">
	<!-- online fonts -->

<body>
	<div class="container demo-1">
		<div class="content">
			<div id="large-header" class="large-header">
				<h1>Elearning</h1>
				<div class="main-agileits">
					<!--form-stars-here-->
					<div class="form-w3-agile">
						<h2>login now</h2>
						<form action="{{route("post_dang_nhap")}}" method="post">
							@csrf
							<div class="form-sub-w3">
								<input type="text" name="username" placeholder="Username" />
								<!-- <div class="icon-w3">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div> -->
								@error('username')
								<div class="alert alert-danger" style="color: white;">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-sub-w3">
								<input type="password" name="password" placeholder="Password" />
								<!-- <div class="icon-w3">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div> -->
								@error('password')
								<div class="alert alert-danger" style="color: white;">{{ $message }}</div>
								@enderror
							</div>

							<div class=" form-check">
								<input class="form-check-input" type="checkbox" name="remember">
								<label class="form-check-label" style="color: white;font-size:15px;">
									Ghi Nhớ
								</label>
							</div>
							<p class=" p-bottom-w3ls">Forgot Password?<a class href="{{route("quen_mat_khau")}}"> Click here</a></p>
							<p class=" p-bottom-w3ls1">New User?<a class href="{{route("dang_ki")}}"> Register here</a></p>

							<div class="clear"></div>
							<div class="submit-w3l">
								<input type="submit" value="Login">
							</div>
						</form>

					</div>
					<!--//form-ends-here-->
				</div><!-- copyright -->
				<div class="copyright w3-agile">
					<p> Welcome to<a href="#" target="_blank"> Elearning</a></p>
				</div>
				<!-- //copyright -->
			</div>
		</div>
	</div>

</body>

</html>