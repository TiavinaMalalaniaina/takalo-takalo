<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="<?php echo base_url(); ?>/assets/css/bootstrap/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/fontawesome-5/css/all.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<div class="wraper">
					<center>
						<div class="logo">
							<img src="<?php echo base_url(); ?>/assets/images/cercle_E.png"/>
						</div>
					</center>
					<center><h2 class="title">E-change</h2></center>
						<div class="content">
							<div class="form-container">
								<form method="post">
									<div class="form-group">
										<input type="email" name="email" class="form-control" placeholder="Email" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" class="form-control" placeholder="Password" required>
									</div>
									<button class="btn mt-3">LOGIN</button>				
								</form>
							</div>
						</div>
						<div class="footer">
						<h4>Don't have an account?
						<strong class="f"><a href="<?php site_url('welcome/inscri/');?>">Sing up</a></strong>
						</h4>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>