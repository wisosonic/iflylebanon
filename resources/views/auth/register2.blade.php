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
			<div style="background-image: url('/loginpage/images/bg-03.jpg'); background-position: center; background-size:cover" class="wrap-login100">
				<span class="login100-form-logo">
					<i class="zmdi zmdi-account"></i>
				</span>

				<span class="login100-form-title p-b-34 p-t-27">
					Register
				</span>
				<form class="login100-form validate-form" id="register_form" method="POST" action="">
					{{ csrf_field() }}
					
					<div style="padding-top: 20px;" class="row">
						<div class="six">
							<div class="wrap-input100 validate-input" data-validate="Enter email address">
								<input onkeydown="changeBorderColor('email');" class="input100" type="email" name="email" id="email" placeholder="Email address">
								<span class="focus-input100" data-placeholder="&#xf200;"></span>
							</div>
							<div id="availability"></div>
							<div class="wrap-input100 validate-input" data-validate="First name">
								<input onkeydown="changeBorderColor('fname');" class="input100" type="fname" name="fname" id="fname" placeholder="First name">
								<span class="focus-input100" data-placeholder="&#xf207;"></span>
							</div>
							<div class="wrap-input100 validate-input" data-validate="Last name">
								<input onkeydown="changeBorderColor('lname');" class="input100" type="lname" name="lname" id="lname" placeholder="Last name">
								<span class="focus-input100" data-placeholder="&#xf207;"></span>
							</div>
							<div class="wrap-input100 validate-input" data-validate="Enter password">
								<input onkeydown="changeBorderColor('password');" class="input100" type="password" name="password" id="password" placeholder="Password">
								<span class="focus-input100" data-placeholder="&#xf191;"></span>
							</div>
							<div class="wrap-input100 validate-input" data-validate="Confirm your password">
								<input onkeydown="changeBorderColor('password');" class="input100" type="password" name="password_confirmation" id="password_confirmation" placeholder="Password confirmation">
								<span class="focus-input100" data-placeholder="&#xf191;"></span>
							</div>
						</div>
						<div class="six">
							<div class="wrap-input100 validate-input" data-validate="Phone">
								<input class="input100" type="phone" name="phone" id="phone" placeholder="Personal phone number">
								<span class="focus-input100" data-placeholder="&#xf2d4;"></span>
							</div>
							<div style="height:47px" class="wrap-input100 validate-input" data-validate="Pro">
								<input onchange="checkAgency();" class="input-checkbox100" id="pro" type="checkbox" name="pro">
								<label class="label-checkbox100" for="pro">
									I own a travel agency
								</label>
							</div>
							<div id="agencydiv" style="display: none" class="wrap-input100 validate-input" data-validate="Agency">
								<input class="input100" type="agency" name="agency" id="agency" placeholder="Travel agency name">
								<span class="focus-input100" data-placeholder="&#xf121;"></span>
							</div>
							<div id="addressdiv" style="display: none" class="wrap-input100 validate-input" data-validate="Address">
								<input class="input100" type="address" name="address" id="address" placeholder="Address">
								<span class="focus-input100" data-placeholder="&#xf1ab;"></span>
							</div>
							<div id="agencyphonediv" style="display: none" class="wrap-input100 validate-input" data-validate="Telephone">
								<input class="input100" type="agencyphone" name="agencyphone" id="agencyphone" placeholder="Agency phone number">
								<span class="focus-input100" data-placeholder="&#xf2be;"></span>
							</div>
						</div>
					</div>
						
					<div class="container-login100-form-btn">
						<button onclick="goToLogin(); return false;" style="margin-right: 10px" class="login100-form-btn">Login</button>
						<button onclick="sendForm(); return false;"  class="login100-form-btn">Create account</button>
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

	<script type="text/javascript">
		function goToLogin() {
			window.location.href = "/login";
		}
	</script>


@endSection