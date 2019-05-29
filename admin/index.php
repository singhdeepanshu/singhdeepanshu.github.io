<?php
session_start();

	require_once('../dbConfig.php');
	$mysqli_conn = new Connection();
	$mysqli_conn->connect();
	$events = array();
	$msg="";
	$sql = "select * from `events_list`";
	$result = $mysqli_conn->get($sql);

	if($result->num_rows > 0) {
	 $row_count = mysqli_num_rows($result);
		while($row = mysqli_fetch_assoc($result)){
			$events[] = $row;	
		}
		
	}
	if($result->num_rows==0){
		$msg="null";
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

	<div class="body-overlay"></div>

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

								
								<div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-22" aria-labelledby="ui-id-42" role="tabpanel" aria-hidden="false" style="">
									<table class="table table-hover">
									  <thead>
										<tr>
										  <th>#</th>
										  <th>Name</th>
										  <th>Description</th>
										  <th>Starting from</th>
										  <th>Duration</th>
										  <th>Location</th>
										  <th>Images</th>
										  <th>Fees</th>
										  <th>Videos</th>
										</tr>
									  </thead>
									  <tbody>
										<?php
											$i=1;
											
											foreach($events as $val){
												echo "<tr>";
												echo "<td>".$i."</td>";
												echo "<td>".$val['name']."</td>";
												echo "<td>".$val['description']."</td>";
												echo "<td>".date("l jS, F Y h:i:s A", strtotime($val['starting_time']))."</td>";
												echo "<td>".$val['duration']."</td>";
												echo "<td>".$val['location']."</td>";
												echo "<td><div class='live_preview_div'><img class='live_image_preview' src=".$val['first_img']."><img class='live_image_preview' src=".$val['second_img']."><img class='live_image_preview' src=".$val['third_img']."></div></td>";
												echo "<td>".$val['fees']."</td>";
												echo "<td><a target=_blank href=".$val['videos']." >".$val['videos']."</a></td>";
												echo "</tr>";
												$i++;
											}
											
										?>
									  </tbody>
									</table>
									<?php if($msg=='null')
									{ 
										echo "<h4 style='color:grey; text-align:center;'> No Events in line </h4>";
									}
									?>
								</div>
							
							</div>
				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<?php include "../footer.php"; ?>
		<!-- #footer end -->

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
