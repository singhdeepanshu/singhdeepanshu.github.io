<?php
session_start();
  
	require_once('./dbConfig.php');
	$mysqli_conn = new Connection();
	$mysqli_conn->connect();
	$events = array();
	$id = $_REQUEST['id'];
	$sql = "select * from `events_list` where id =$id";
	$sql2 = "select * from `events_list`";
	$result = $mysqli_conn->get($sql);
	$result2 = $mysqli_conn->get($sql2);

	if($result->num_rows > 0) {
	 $row_count = mysqli_num_rows($result);
		while($row = mysqli_fetch_assoc($result)){
			$events[] = $row;	
		}
		
	}
	if($result2->num_rows > 0) {
	 $row_count2 = mysqli_num_rows($result2);
		while($row2 = mysqli_fetch_assoc($result2)){
			$events2[] = $row2;	
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
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
    <link rel="shortcut icon" href="images/favicon.png" />
	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<link rel="stylesheet" href="css/colors.php" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Events Detail - Spiritual Events</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Nav Bar -->
		<?php include 'nav.php'; ?>
		<!-- Nav Bar Ends-->

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<?php		
								$i=1;
								foreach($events as $val){
								$today = date("Y-m-d H:i:s A");
								$data = date("Y-m-d H:i:s A",strtotime($val['starting_time']));
								if($data>=$today)	
								{
							?>
				<h3> <?php echo $val['name']; ?> </h3>
			<!--	<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Events</a></li>
					<li class="breadcrumb-item active" aria-current="page">Event Single</li>
				</ol> -->
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="postcontent nobottommargin clearfix">

						<div class="single-event">

							<div class="">
								<div class="entry-image bottommargin-lg">
									<a href="#"><img src="<?php echo substr($val['first_img'],1); ?>" alt="Event Single"></a>
								</div>
							</div>


							<div class="clear"></div>

							<div class="">
								<div class="card events-meta mb-3">
									<div class="card-header"><h5 class="mb-0"><?php echo $val['name']; ?></h5></div>
									<div class="card-body">
										<ul class="iconlist nobottommargin">
											<li>
												<i class="icon-line-columns"></i> 	<?php echo $val['description']; ?>
											</li>
											<li>
												<i class="icon-calendar3"></i>       <?php echo date("j",strtotime($val['starting_time'])); ?></li>
											<li>	<i class="icon-time"></i>       <?php echo $val['duration']; ?> Hrs </li>
											 <li> <i class="icon-map-marker2"></i>      <?php echo $val['location']; ?> </li>
											 <li> <i class="icon-euro"></i> <strong>      <?php echo $val['fees']; ?></strong>
										</li>
										</ul>

									</div>
								</div>
								<div class="center"><a href='#' class="button button-small button-circle button-border button-amber" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="icon-inbox"></i>Register</a></div>
							     <?php
								    include 'register.php';
								 ?>
																														
							</div>
								<?php }} ?>
							<div class="clear"></div>

						</div>

					</div>

					<div class="sidebar nobottommargin col_last clearfix">
						<div class="sidebar-widgets-wrap">

							<div class="widget clearfix">

								<h4>Upcoming Events</h4>
								<div id="post-list-footer">
                                       <?php
									    $i=1;
											foreach($events2 as $val){
											 $today = date("Y-m-d H:i:s A");																     
							                 $data= date("Y-m-d H:i:s A",strtotime($val['starting_time']));
											 if($data>=$today)	
											 {
                                        ?>		
                                    <form id="login-form" name="login-form" class="nobottommargin" action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">							   
									<div class="spost clearfix">
										<div class="entry-image">
											<input type="hidden" name="id" value="<?php echo $val['id']; ?>">
											<a href="#" class="nobg" onclick="javascript:document.form.submit();"><img src="<?php echo substr($val['first_img'],1); ?>" alt="event-image"></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<input type="hidden" name="id" value="<?php echo $val['id']; ?>">
												<h4><a href="#" onclick="javascript:document.form.submit();"><?php echo $val['name']; ?></a></h4>
											</div>
											<ul class="entry-meta">
												<li>
												                     <?php 						
																		 echo date("jS M Y",strtotime($val['starting_time']));
																	 ?>
												</li>
											</ul>
										</div>

									</div>

                                     <?php
											}}
									  ?>									 
                                    
								</div>
										</form>
							</div>

						</div>
					</div>

				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<?php include 'footer.php'; ?>
    
	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

	<script src="https://maps.google.com/maps/api/js?key=AIzaSyDMxJ92oBkSnVNHFX3R8XhtYQPEgk1_IiI"></script>
	<script src="js/jquery.gmap.js"></script>

	<script>

		jQuery(document).ready( function($){

			var eventStartDate = new Date(2018, 9, 31);
			$('#event-countdown').countdown({until: eventStartDate});

		});

		jQuery('#event-location').gMap({
			address: 'Ibiza, Spain',
			maptype: 'ROADMAP',
			zoom: 15,
			markers: [
				{
					address: "Ibiza, Spain"
				}
			],
			doubleclickzoom: false,
			controls: {
				panControl: true,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: false,
				streetViewControl: false,
				overviewMapControl: false
			}
		});

	</script>

</body>
</html>