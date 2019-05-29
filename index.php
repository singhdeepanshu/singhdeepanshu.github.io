<?php
session_start();

	require_once('./dbConfig.php');
	$mysqli_conn = new Connection();
	$mysqli_conn->connect();
	$events = array();
	$sql = "select * from `events_list`";
	$result = $mysqli_conn->get($sql);

	if($result->num_rows > 0) {
	 $row_count = mysqli_num_rows($result);
		while($row = mysqli_fetch_assoc($result)){
			$events[] = $row;	
		}
		
	}
   if(isset($_POST['user-register']))
   {
	   $array = array();   
      
      $array['name'] = mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['name']);
      $array['email'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['email']);
      $array['address'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['address']);
      $array['dob'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['dob']);
      $array['phone'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['phone']);
      $array['birthplace'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['birthplace']);
		foreach( array_keys($array) as $key ) {
          $fields[] = "`$key`";
          $values[] = "'" . $array[$key] . "'";
      }   
      
      $fields = implode(",", $fields);
      $values = implode(",", $values);
      
      $sql =  "INSERT INTO `user_list` ($fields) VALUES ($values) ";
      
      $result1 = $mysqli_conn->get($sql);
      
      if($result1 != false){
         
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
	<link rel="stylesheet" href="css/calendar.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="css/colors.php" type="text/css" />

	<!-- Document Title
	============================================= -->
	<title>Home</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

	<?php include 'nav.php'; ?>


		<section id="slider" class="slider-element slider-parallax full-screen dark" style="overflow: hidden; background: url('images/events/home.jpeg') no-repeat center center;background-size: cover;">

			<div class="slider-parallax-inner">

				<div class="container clearfix vertical-middle" style="z-index: 3;">

					<div class="heading-block title-center nobottomborder">
						<h1>Welcome Text</h1>
					</div>

				</div>

			</div>

		</section>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_one_fourth nobottommargin">
						<div class="feature-box fbox-effect fbox-center fbox-outline fbox-dark nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-calendar i-alt"></i></a>
							</div>
							<h3>Interactive Sessions<span class="subtitle">Lorem ipsum dolor sit</span></h3>
						</div>
					</div>

					<div class="col_one_fourth nobottommargin">
						<div class="feature-box fbox-effect fbox-center fbox-outline fbox-dark nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-map i-alt"></i></a>
							</div>
							<h3>Great Locations<span class="subtitle">Officia ipsam laudantium</span></h3>
						</div>
					</div>

					<div class="col_one_fourth nobottommargin">
						<div class="feature-box fbox-effect fbox-center fbox-outline fbox-dark nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-microphone2 i-alt"></i></a>
							</div>
							<h3>Global Speakers<span class="subtitle">Laudantium cum dignissimos</span></h3>
						</div>
					</div>

					<div class="col_one_fourth nobottommargin col_last">
						<div class="feature-box fbox-effect fbox-center fbox-outline fbox-dark nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-food2 i-alt"></i></a>
							</div>
							<h3>In-between Meals<span class="subtitle">Perferendis accusantium quae</span></h3>
						</div>
					</div>


					<div class="clear"></div>

				</div>                            												

				<div class="container clearfix">

					<div class="nobottommargin">

						<div class="fancy-title title-border title-center topmargin bottommargin-lg">
							<h2>Upcoming Events</h2>
						</div>
						
						<?php 
							include 'upcoming-events.php'; 
						?>
						
 					</div>

					<div class="clear"></div>


				</div>


				<div class="section footer-stick notopmargin">

					<div class="heading-block center">
						<h3>Receive <span>regular</span> Event Updates</h3>
					</div>

					<div class="subscribe-widget">
						<div class="widget-subscribe-form-result"></div>
						<form id="widget-subscribe-form2" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
							<div class="input-group input-group-lg divcenter" style="max-width:600px;">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="icon-email2"></i></div>
								</div>
								<input type="email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
								<div class="input-group-append">
									<button class="btn btn-secondary" type="submit">Subscribe Now</button>
								</div>
							</div>
						</form>
					</div>




				</div>

			</div>

		</section><!-- #content end -->

		<?php include 'footer.php'; ?>

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/jquery.calendario.js"></script>
	<script src="js/events-data.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyDMxJ92oBkSnVNHFX3R8XhtYQPEgk1_IiI"></script>
	<script src="js/jquery.gmap.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

	<script>
		jQuery(document).ready( function($){
			var newDate = new Date(2018, 9, 31);
			$('#countdown-ex1').countdown({until: newDate});
		});

		var cal = $( '#calendar' ).calendario( {
			onDayClick : function( $el, $contentEl, dateProperties ) {

				for( var key in dateProperties ) {
					console.log( key + ' = ' + dateProperties[ key ] );
				}

			},
			caldata : canvasEvents
		} ),
		$month = $( '#calendar-month' ).html( cal.getMonthName() ),
		$year = $( '#calendar-year' ).html( cal.getYear() );

		$( '#calendar-next' ).on( 'click', function() {
			cal.gotoNextMonth( updateMonthYear );
		} );
		$( '#calendar-prev' ).on( 'click', function() {
			cal.gotoPreviousMonth( updateMonthYear );
		} );
		$( '#calendar-current' ).on( 'click', function() {
			cal.gotoNow( updateMonthYear );
		} );

		function updateMonthYear() {
			$month.html( cal.getMonthName() );
			$year.html( cal.getYear() );
		}

		$('#google-map4').gMap({
			 address: 'Australia',
			 maptype: 'ROADMAP',
			 zoom: 3,
			 markers: [
				{
					address: "Melbourne, Australia",
					html: "Melbourne, Australia"
				},
				{
					address: "Sydney, Australia",
					html: "Sydney, Australia"
				},
				{
					address: "Perth, Australia",
					html: "Perth, Australia"
				}
			 ],
			 doubleclickzoom: false,
			 controls: {
				 panControl: true,
				 zoomControl: true,
				 mapTypeControl: false,
				 scaleControl: false,
				 streetViewControl: false,
				 overviewMapControl: false
			 }
		});
	</script>

</body>
</html>
