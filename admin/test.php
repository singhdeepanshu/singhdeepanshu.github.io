<?php
	session_start();

	if(isset($_SESSION['admin'])){
		header('Location:index.php');
	}
	else{

		include('../dbConfig.php');

		$step="Email";
		$msg="";
		$email="";

		$mysqli_conn = new Connection();
      
      	$mysqli_conn->connect();

		if(isset($_POST["emailsubmit"])){
        	

	        $email=mysqli_real_escape_string($mysqli_conn->conn,$_POST['email']);

			$step="Verify";
	        // echo '<script>$(".form-registered").fadeOut(300);
	         // $(".form-code").delay(300).fadeIn(100);</script>';

	        $sql="SELECT email FROM admin_user WHERE email = '$email' ";

	        if($result=$mysqli_conn->get($sql)){

	            if($result->num_rows == 1){
	                $length = 8;
	                $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	                $str = '';
	                $max = mb_strlen($keyspace, '8bit') - 1;
	                for ($i = 0; $i < $length; ++$i) {
	                    $str .= $keyspace[rand(0, $max)];
	                }

	                $sql1= "UPDATE admin_user SET code = '$str' where username = 'admin'";

	                if($result1=$mysqli_conn->get($sql1)){
	                                
	                    $to = $email;
	                    $subject = "Events Admin Panel Security Code";
	                    $txt = "Please use the following security code for the Events Admin Panel account."."\r\n"."Security Code: ".$str."\r\n"."\r\n"."\r\n"."Thanks"."\r\n"."The Events Team ";
	                    $headers =  "From: contact@events.com";

	                    mail($to,$subject,$txt,$headers);


	                }

	            }
	        }
	    }


	    if(isset($_POST["codesubmit"])){
        

	        $code=mysqli_real_escape_string($mysqli_conn->conn,$_POST['code']);

	        

	        $sql="SELECT code FROM admin_user WHERE code = '$code' ";

	        if($result=$mysqli_conn->get($sql)){

	            if($result->num_rows == 1){
	            	// echo '<script>console.log("code verified");
	            	// $(".form-registered").fadeOut(300);
	                    // $(".form-reset").delay(300).fadeIn(100)</script>';
	                    $step="Verified";

	            }
	        }
	    }

	    if(isset($_POST['passwordsubmit'])){

        
        $get_newpassword=mysqli_real_escape_string($mysqli_conn->conn,$_POST['newpassword']);
        $get_confirmpassword=mysqli_real_escape_string($mysqli_conn->conn,$_POST['confirmpassword']);

        if($get_confirmpassword===$get_newpassword){

        	$sql="UPDATE admin_user SET password = '$get_newpassword' where username = 'admin'";

            if($result=$mysqli_conn->get($sql)){

            	// echo '<script>$(".form-registered").fadeOut();$(".form-code").fadeOut(); $(".successpass").fadeIn(100);
            	echo '<script>setTimeout(function(){
  window.location = "http://localhost/repo-eventos/admin/login.php";
}, 5000);</script>';
				$step="Changed";
				$msg="Success";
            		// header('Refresh: 10; URL=http://localhost/repo-eventos/admin/login.php');
               
            }else{
                // echo '<script>$(".errorpass").fadeIn(100);</script>';
				$msg="Error";

            }
        }
        else{
        	// echo '<script>$(".notmatchpass").fadeIn(100);</script>';
				$msg="NotMatch";

    	}
                           
             
    }

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
	<title>Forgot Password - Layout 5 | Canvas</title>

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
									<h3 class="center">Reset Password</h3>

										<?php if($step=="Email"){ ?>

									<form class="form-registered center" method="post">
										<div class="form-group">
											<label for="registered-email" class="control-label sr-only">Enter Registered Email ID</label>
											<input type="email" class="form-control" name="email" id="registered-email" placeholder="Registered Email ID" required="required" value="">
										</div>
										
										<button type="submit" class="button button-3d button-amber nomargin" name="emailsubmit">Submit</button>
										
									</form>

										<?php } if($step=="Verify"){ ?>

									<form class="form-auth-small form-code center" method="post">
										<p class="lead">If <b><?php echo $email; ?></b> matches the registered email ID for Events admin panel, we'll send you a code.</p>

										<div class="form-group">
											<label for="verify-code" class="control-label sr-only">Verify Code</label>
											<input type="text" maxlength="9" class="form-control" name="code" id="verify-code" placeholder="Code" required="required" value="">
										</div>
										
										
										<button type="submit" class="button button-3d button-amber nomargin" name="codesubmit">Verify</button>
										<button type="submit" id="gobacktoemail" class="button button-3d button-amber nomargin" name="goback">Back</button>
									</form>
									
										<?php } if($step=="Verified"){ ?>

									<form class="form-auth-small form-reset center" method="post">
										<div class="form-group">
											<label for="new-password" class="control-label sr-only">New Password</label>
											<input type="password" class="form-control" name="newpassword" required="required" id="new-password" placeholder="New Password" required="required" value="">
										</div>
										<div class="form-group">
											<label for="confirm-password" class="control-label sr-only">Confirm Password</label>
											<input type="password" class="form-control" name="confirmpassword" required="required" id="confirm-password" placeholder="Confirm Password" required="required" value="">
										</div>
										
										<button type="submit" class="button button-3d button-amber nomargin" name="passwordsubmit">Reset</button>
										
										
									</form>
									
										<?php } if($msg=="NotMatch"){ ?>

									<div class="alert notmatchpass alert-danger alert-dismissable fade show" style="display: none;">
									    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									    Password didn't Match.
									</div>

										<?php } if($msg=="Success"){ ?>

									<div class="alert successpass alert-success alert-dismissable fade show" style="display: none;">
									    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									    Password Reset Successfully. Redirecting to login within 5 seconds.
									</div>

										<?php } if($msg=="Error"){ ?>

									<div class="alert errorpass alert-warning alert-dismissable fade show" style="display: none;">
									    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									    Error Connecting to database! Try Again.
									</div>

										<?php } ?>


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