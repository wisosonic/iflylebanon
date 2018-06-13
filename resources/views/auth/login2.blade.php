@extends("general")

@section("content")
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/loginpage/images/icons/favicon.ico"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/loginpage/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/loginpage/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/loginpage/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/loginpage/vendor/animate/animate.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="/loginpage/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/loginpage/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/loginpage/vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="/loginpage/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/loginpage/css/util.css">
		<link rel="stylesheet" type="text/css" href="/loginpage/css/main.css">
	<!--===============================================================================================-->
	<style type="text/css">
		input[type=email] {
			padding: 0 5px 0 38px;
		}
		input[type=email]:focus {
			padding-left: 5px;
		}
	</style>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('/loginpage/images/bg-02.jpg');">
			<div style="background-image: url('/loginpage/images/bg-03.jpg'); background-position: center; " class="wrap-login100">
				<form class="login100-form validate-form" id="login_form" method="POST" action="">
					{{ csrf_field() }}
					<span class="login100-form-logo">
						<i class="zmdi zmdi-account"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate="Enter email address">
						<input onkeydown="changeBorderColor('email');" class="input100" type="email" name="email" id="email" placeholder="Email address">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input onkeydown="changeBorderColor('password');" class="input100" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<div class="wrap-input100 validate-input" data-validate="">
						@if ($errors->has('email'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('email') }}</strong>
	                        </span>
	                    @endif
					</div>

					<div class="container-login100-form-btn">
						<button onclick="sendlogin(); return false;" style="margin-right: 10px" class="login100-form-btn">Login</button>
						<button class="login100-form-btn">Create an account</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="/loginpage/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/loginpage/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/loginpage/vendor/bootstrap/js/popper.js"></script>
	<script src="/loginpage/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/loginpage/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/loginpage/vendor/daterangepicker/moment.min.js"></script>
	<script src="/loginpage/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/loginpage/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/loginpage/js/main.js"></script>

	

@endSection