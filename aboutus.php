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
    <link rel="shortcut icon" href="images/favicon.png" />
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
	<div id="wrapper" class="clearfix" style="background:url(images/events/aboutus.jpg);">

	<?php include 'nav.php'; ?>
    <section id="content">
	<div class="content-wrap">

				<div class="container clearfix">

					<div id="posts" class="events small-thumbs">

						<div class="entry clearfix">
							<div class="entry-image d-md-none d-lg-block">
								<a href="#">
									<img src="images/events/about.jpg" alt="Inventore voluptates velit totam ipsa tenetur">
									
								</a>
							</div>
							<div class="entry-c">
								<div class="entry-content">
									<p style="font-size:16pt;">Last year, we sold our current campus to Seattle Children’s Hospital, a necessity to maintain the fiscal health of the organization. The sale set us on the path to financial sustainability and has provided us with the opportunity to reassess how we can best steward the Center as a home for learning and spiritual growth as we enter our second century.
	</p>
								</div>
							</div>
						</div>


					</div>

				</div>

	</div>
	
	
	</section>
	<?php include 'footer.php'; ?>
	</div>
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