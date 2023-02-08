<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from getskills.dexignzone.com/xhtml/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Oct 2022 13:50:40 GMT -->
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
	<link rel="shortcut icon" type="image/png" href="<?php echo site_url('assets/images/favicon.png'); ?>" />
    <link href="<?php echo site_url('assets/css/style.css'); ?>" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form action="<?php echo site_url('user/sign'); ?>" method="post">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Nom</strong></label>
                                            <input type="text" class="form-control" placeholder="nom" name="nom">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Prenom</strong></label>
                                            <input type="text" class="form-control" placeholder="prenom" name="prenom">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" value="Password" name="mdp">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="<?php echo site_url('log'); ?>">Sign in</a></p>
                                    </div>
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
<script src="<?php echo site_url('assets/js/dlabnav-init.js') ?>"></script>
<script src="<?php echo site_url('assets/js/styleSwitcher.js') ?>"></script>
</body>

<!-- Mirrored from getskills.dexignzone.com/xhtml/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Oct 2022 13:50:40 GMT -->
</html>