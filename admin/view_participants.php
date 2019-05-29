<?php
session_start();
	
	require_once('../dbConfig.php');
	$mysqli_conn = new Connection();
	$mysqli_conn->connect();
	$users = array();
	$sql = "select * from `user_list`";
	$result = $mysqli_conn->get($sql);

	if($result->num_rows > 0) {
	 $row_count = mysqli_num_rows($result);
		while($row = mysqli_fetch_assoc($result)){
			$users[] = $row;	
		}
		
	}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<?php
		if(isset($_SESSION['admin'])){
	?>
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
	<link rel="shortcut icon" href="../images/favicon.png" />
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Admin-Spritual Events</title>

</head>

<body class="stretched">
 
	<div class="body-overlay">Administration</div>
	
	<div id="side-panel" class="dark">
      
		<div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon-line-cross"></i></a></div>

		<div class="side-panel-wrap">

			<div class="widget clearfix">

				<?php include 'nav-admin.php'; ?>

			</div>


		</div>

	</div>

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header" data-sticky-class="not-dark">

			<div id="header-wrap">

				<div class="container clearfix">

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu" class="dark">

						<div id="side-panel-trigger" class="side-panel-trigger"><a href="#"><i class="icon-reorder"></i></a></div>

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->

		<!-- Content
		============================================= -->
		<section id="content">
             
			<div class="content-wrap">

				<div class="container clearfix">
					<div class="tab-container">
                       <h2 class="text-center">Registered Participants </h2>
								
								<div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-22" aria-labelledby="ui-id-42" role="tabpanel" aria-hidden="false" style="">
									<table class="table table-hover" cellpadding='0' cellspacing='0'>
									  <thead>
										<tr>
										  <th style='background:#85c2f7;'>#</th>
										<!--  <th>Photo</th>   -->
										  <th>Name</th>
										  <th style='background:#85c2f7;'>Email</th>
										  <th>Address</th>
										  <th style='background:#85c2f7;'>Date of Birth</th>
										</tr>
									  </thead>
									  <tbody>
										<?php
											$i=1;
											foreach($users as $val){
												echo "<tr>";
												echo "<td style='background:#85c2f7;'>".$i."</td>";
											/*	echo "<td><div class='participant_preview_div'><img class='participant_image_preview' src=".$val['photo']."></div></td>";  */
												echo "<td>".$val['name']."</td>";
												echo "<td style='background:#85c2f7;'>".$val['email']."</td>";
												echo "<td>".$val['address']."</td>";
												echo "<td style='background:#85c2f7;'>".date("jS, F Y", strtotime($val['dob']))."</td>";
												echo "</tr>";
												$i++;
											}
										?>
									  </tbody>
									</table>
								</div>
								

							</div>
				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<?php include "../footer.php"; ?>
		<!--Footer closed -->
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
<?php
	}
	else{
		header('Location:login.php');
	}
?>
</body>
</html>
