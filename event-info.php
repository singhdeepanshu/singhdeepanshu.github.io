<?php
session_start();
   if(isset($_REQUEST['readmore']))
   {
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

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<link rel="stylesheet" href="css/colors.php" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Event - Single Left Sidebar | Canvas</title>

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
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Events</a></li>
					<li class="breadcrumb-item active" aria-current="page">Event Single</li>
				</ol>
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
									<a href="#"><img src="images/events/home.jpeg" alt="Event Single"></a>
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
									<div class="spost clearfix">
										<div class="entry-image">
											<a href="#" class="nobg"><img src="images/events/home.jpeg" alt=""></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#"><?php echo $val['name']; ?></a></h4>
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

							</div>

						</div>
					</div>

				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">

					<div class="col_two_third">

						<div class="col_one_third">

							<div class="widget clearfix">

								<img src="images/footer-widget-logo.png" alt="" class="footer-logo">

								<p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards.</p>

								<div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
									<address>
										<strong>Headquarters:</strong><br>
										795 Folsom Ave, Suite 600<br>
										San Francisco, CA 94107<br>
									</address>
									<abbr title="Phone Number"><strong>Phone:</strong></abbr> (91) 8547 632521<br>
									<abbr title="Fax"><strong>Fax:</strong></abbr> (91) 11 4752 1433<br>
									<abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
								</div>

							</div>

						</div>

						<div class="col_one_third">

							<div class="widget widget_links clearfix">

								<h4>Blogroll</h4>

								<ul>
									<li><a href="http://codex.wordpress.org/">Documentation</a></li>
									<li><a href="http://wordpress.org/support/forum/requests-and-feedback">Feedback</a></li>
									<li><a href="http://wordpress.org/extend/plugins/">Plugins</a></li>
									<li><a href="http://wordpress.org/support/">Support Forums</a></li>
									<li><a href="http://wordpress.org/extend/themes/">Themes</a></li>
									<li><a href="http://wordpress.org/news/">WordPress Blog</a></li>
									<li><a href="http://planet.wordpress.org/">WordPress Planet</a></li>
								</ul>

							</div>

						</div>

						<div class="col_one_third col_last">

							<div class="widget clearfix">
								<h4>Recent Posts</h4>

								<div id="post-list-footer">
									<div class="spost clearfix">
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
											</div>
											<ul class="entry-meta">
												<li>10th July 2014</li>
											</ul>
										</div>
									</div>

									<div class="spost clearfix">
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
											</div>
											<ul class="entry-meta">
												<li>10th July 2014</li>
											</ul>
										</div>
									</div>

									<div class="spost clearfix">
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
											</div>
											<ul class="entry-meta">
												<li>10th July 2014</li>
											</ul>
										</div>
									</div>
								</div>
							</div>

						</div>

					</div>

					<div class="col_one_third col_last">

						<div class="widget clearfix" style="margin-bottom: -20px;">

							<div class="row">

								<div class="col-lg-6 bottommargin-sm">
									<div class="counter counter-small"><span data-from="50" data-to="15065421" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
									<h5 class="nobottommargin">Total Downloads</h5>
								</div>

								<div class="col-lg-6 bottommargin-sm">
									<div class="counter counter-small"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
									<h5 class="nobottommargin">Clients</h5>
								</div>

							</div>

						</div>

						<div class="widget subscribe-widget clearfix">
							<h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
							<div class="widget-subscribe-form-result"></div>
							<form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
								<div class="input-group divcenter">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="icon-email2"></i></div>
									</div>
									<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
									<div class="input-group-append">
										<button class="btn btn-success" type="submit">Subscribe</button>
									</div>
								</div>
							</form>
						</div>

						<div class="widget clearfix" style="margin-bottom: -20px;">

							<div class="row">

								<div class="col-lg-6 clearfix bottommargin-sm">
									<a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
										<i class="icon-facebook"></i>
										<i class="icon-facebook"></i>
									</a>
									<a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
								</div>
								<div class="col-lg-6 clearfix">
									<a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
										<i class="icon-rss"></i>
										<i class="icon-rss"></i>
									</a>
									<a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
								</div>

							</div>

						</div>

					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>
						<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a href="#" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-vimeo">
								<i class="icon-vimeo"></i>
								<i class="icon-vimeo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-github">
								<i class="icon-github"></i>
								<i class="icon-github"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-yahoo">
								<i class="icon-yahoo"></i>
								<i class="icon-yahoo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-linkedin">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
						</div>

						<div class="clear"></div>

						<i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +91-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->
    
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