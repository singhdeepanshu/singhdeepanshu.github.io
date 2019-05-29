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
    <link rel="shortcut icon" href="images/favicon.png" />
	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="css/colors.php" type="text/css" />

	<!-- Document Title
	============================================= -->
	<title>Events Calendar | Canvas</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Nav Bar -->
		<?php include 'nav.php'; ?>
		<!-- Nav Bar Ends-->
		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="parallax header-stick bottommargin-lg dark" style="padding: 60px 0; background-image: url('images/calendar.jpg'); height: auto;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -500px;">

					<div class="container clearfix">

						<div class="events-calendar">
							<div class="events-calendar-header clearfix">
								<h2>Events Overview</h2>
								<h3 class="calendar-month-year">
									<span id="calendar-month" class="calendar-month"></span>
									<span id="calendar-year" class="calendar-year"></span>
									<nav>
										<span id="calendar-prev" class="calendar-prev"><i class="icon-chevron-left"></i></span>
										<span id="calendar-next" class="calendar-next"><i class="icon-chevron-right"></i></span>
										<span id="calendar-current" class="calendar-current" title="Got to current date"><i class="icon-reload"></i></span>
									</nav>
								</h3>
							</div>
							<div id="calendar" class="fc-calendar-container"></div>
						</div>


					</div>

				</div>

				<div class="container clearfix">

					<div class="col_one_fourth nobottommargin">
						<div class="feature-box fbox-effect fbox-center fbox-outline nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-calendar i-alt"></i></a>
							</div>
							<h3>Interactive Sessions<span class="subtitle"></span></h3>
						</div>
					</div>

					<div class="col_one_fourth nobottommargin">
						<div class="feature-box fbox-effect fbox-center fbox-outline nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-map i-alt"></i></a>
							</div>
							<h3>Great Locations<span class="subtitle"></span></h3>
						</div>
					</div>

					<div class="col_one_fourth nobottommargin">
						<div class="feature-box fbox-effect fbox-center fbox-outline nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-microphone2 i-alt"></i></a>
							</div>
							<h3>Global Speakers<span class="subtitle"></span></h3>
						</div>
					</div>

					<div class="col_one_fourth nobottommargin col_last">
						<div class="feature-box fbox-effect fbox-center fbox-outline nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-food2 i-alt"></i></a>
							</div>
							<h3>In-between Meals<span class="subtitle"></span></h3>
						</div>
					</div>

					<div class="clear"></div>

					<div class="divider divider-center"><i class="icon-circle-blank"></i></div>

					<h3>Upcoming Events</h3>
					  <?php 
						include 'upcoming-events.php';
					  ?>
				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<?php include 'footer.php'; ?>
	<!-- #footer end -->

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

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

	<script>

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
		};

	</script>

</body>
</html>
