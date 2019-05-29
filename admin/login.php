<?php
	session_start();
	if(isset($_SESSION['admin'])){
		header('Location:index.php');
	}
	else{

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="../style.css" type="text/css" />
	<link rel="stylesheet" href="../css/dark.css" type="text/css" />
	<link rel="stylesheet" href="../css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="../css/animate.css" type="text/css" />
	<link rel="stylesheet" href="../css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="../css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Login - Layout 5 | Canvas</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap nopadding">

				<div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('../images/events/home.jpeg') center center no-repeat; background-size: cover;"></div>

				<div class="section nobg full-screen nopadding nomargin">
					<div class="container-fluid vertical-middle divcenter clearfix">
						<!--
						<div class="center">
							<a href="index.html"><img src="images/logo-dark.png" alt="Canvas Logo"></a>
						</div> -->

						<div class="card divcenter noradius noborder" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
							<div class="card-body" style="padding: 40px;">
								<form id="login-form" name="login-form" class="nobottommargin" action="check_login.php" method="post">
									<h3 class="center">Login | Admin</h3>

									<div class="col_full">
										<?php
											$id = null;
											if(isset($_GET["adffe"])){
												$id = $_GET['adffe'];
												if($id == 'wrong'){
													?>
													<div class="alert alert-danger alert-dismissable fade show">
													    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													    <i class="icon-warning-sign"></i> Username or Password is incorrect.
													</div>
													<?php
												}
												if($id == 'empty'){
													?>
													<div class="alert alert-danger alert-dismissable fade show">
													    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													    <i class="icon-warning-sign"></i> Please enter Username and Password.
													</div>
													<?php

												}
											} 
										?>

									</div>

									<div class="col_full">
										<!-- <label for="login-form-username">Username:</label> -->
										<input type="text" id="login-form-username" name="username" value="" class="form-control not-dark" placeholder="Username" />
									</div>

									<div class="col_full">
										<!-- <label for="login-form-password">Password:</label> -->
										<input type="password" id="login-form-password" name="password" value="" class="form-control not-dark" placeholder="Password" />
									</div>

									<div class="col_full">
										<button type="submit" class="button button-3d button-amber nomargin" id="login-form-submit" name="submit">Login <i class="icon-line2-login"></i></button>
										<span class="fright"><i class="icon-lock3"></i> <a href="forgot_password.php"> Forgot password?</a></span>
									</div>
								</form>

								<!-- <div class="line line-sm"></div> -->
							</div>
						</div>

						<div class="center dark"><small></small></div>

					</div>
				</div>

			</div>

		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="../js/jquery.js"></script>
	<script src="../js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="../js/functions.js"></script>

</body>
</html>
<?php
	}	
?>