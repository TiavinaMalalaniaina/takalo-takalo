<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from getskills.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Oct 2022 13:49:11 GMT -->
<head>
        <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="GetSkills  : GetSkills Online Learning Admin Bootstrap 5 Template" />
	<meta property="og:title" content="GetSkills  : GetSkills Online Learning  Admin Bootstrap 5 Template" />
	<meta property="og:description" content="GetSkills  : GetSkills Online Learning  Admin Bootstrap 5 Template" />
	<meta property="og:image" content="social-image.html" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>GetSkills Online Learning Admin</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="<?php echo site_url('assets/images/favicon.png') ?>" />
    <link href="<?php echo site_url('assets/css/style.css'); ?>" rel="stylesheet">

</head>

<body class="body  h-100" style="9">
    <div class="container h-100">
		<div class="row h-100 align-items-center justify-contain-center">
			<div class="col-xl-12 mt-3">
				<div class="card">
					<div class="card-body p-0">
						<div class="row m-0">
							<div class="col-xl-6 col-md-6 sign text-center">
								<div>
									<div class="text-center my-5">
										<a href="index.html"><h1>Takalo-takalo</h1></a>
									</div>
									<img src="<?php echo site_url('assets/images/log.png'); ?>" class="education-img"></img>
								</div>	
							</div>
							<div class="col-xl-6 col-md-6">
								<div class="sign-in-your">
									<h4 class="fs-20 font-w800 text-black">Sign in your account</h4>
									<span>Welcome back! Login with your data that you entered<br> during registration</span>
									<div class="login-social">
										<a href="javascript:void(0);" class="btn font-w800 d-block my-4"><i class="fab fa-google me-2 text-primary"></i>Login with Google</a>
										<a href="javascript:void(0);" class="btn font-w800 d-block my-4"><i class="fab fa-facebook-f me-2 facebook-log"></i>Login with Facebook</a>
									</div>
									<form action="<?php echo site_url('/log/login'); ?>" method="post">
										<div class="mb-3">
											<label class="mb-1"><strong>Email</strong></label>
											<input type="text" class="form-control" value="Tiavina" name="username">
										</div>
										<div class="mb-3">
											<label class="mb-1"><strong>Password</strong></label>
											<input type="password" class="form-control" value="1234" name="mdp">
										</div>
										<div class="row d-flex justify-content-between mt-4 mb-2">
											<div class="mb-3">
											   <div class="form-check custom-checkbox ms-1">
													<input type="checkbox" class="form-check-input" id="basic_checkbox_1">
													<label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
											</div>
											<div class="mb-3">
												<a href="page-forgot-password.html">Forgot Password?</a>
											</div>
										</div>
										<div class="text-center">
											<button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo site_url('assets/vendor/global/global.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/custom.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/dlabnav-init.js'); ?>"></script>
	<script src="<?php echo site_url('assets/js/styleSwitcher.js'); ?>"></script>
</body>

<!-- Mirrored from getskills.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Oct 2022 13:49:12 GMT -->
</html>