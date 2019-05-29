<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Enter your details for contacting the spiritual Events" />

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
	<link rel="stylesheet" href="css/fontawesome/css/all.min.css" type="text/css">

	<!-- Document Title
	============================================= -->
	<title>Contact Us - Spiritual Events</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

	<?php include 'nav.php'; ?>
    <section id="content">
		<div id="container" style="margin-left:20px;">
			<div id="header">
				<h1 class="form-header">Fill in the form</h1>
			</div>
		<div id="content">
			<div id="success" class="alert alert-success alert-dismissable fade show d-none">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<p class="form">Thank you for contacting us. We will be in touch soon.</p>
			</div>
		
			<div id="fail" class="alert notmatchpass alert-danger alert-dismissable fade show d-none">
			 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<p class="form">There is an error in submitting the form. Try Again!! </p>
			</div>
		 
			<p class="form-content" style="font-size:14pt;">Please text or call us on <a href="#">9716867755</a> for fastest response or enter your contact details below and we will Reach you back as soon as we can.</p>
			<form class="contact_form" action="mail.php" method="post" autocomplete="on">
				<div class="row">
				<div class="form-group col-12">
					<label for="name">Name <i class="fas fa-user"></i></label>
					<input type="text" name="name" id="name" autofocus required>
				</div>
				<div class="form-group col-12">
					<label for="phone">Contact Number <i class="fas fa-phone"></i></label>
					<input type="text" name="phone" id="phone" maxlength="10" pattern="[0-9]{10}" required>
				</div>
				<div class="form-group col-12">
					<label for="email">Email <i class="fas fa-envelope"></i></label>
					<input type="email" name="email" id="email" required>
				</div>
				<div class="form-group col-12">
					<label for="message">Message <i class="far fa-comments"></i></label><br>
					<textarea type="textarea" name="message" rows="5" placeholder="Write your message" cols="32"required></textarea>
				</div>
				<div class="form-group col-12">
					<div class="g-recaptcha" data-sitekey="6LdjV28UAAAAAND6ltJleQZ2BHTKYtfcr2K9rcsb"></div>
				</div>
				<div class="col-12">
					<button type="submit" name="contactSubmit" id="contactSubmit" class="button button-circle button-amber button-border">Send Message</button>
				</div>
				</div>
			</form>
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
	
<script>
    $(document).ready(function() {

// process the form
$('.contact_form').submit(function(event) {

    // get the form data before sending via ajax
    var formData = {
        'name'               : $('input[name=name]').val(),
        'phone'             : $('input[name=phone]').val(),
		'email'				: $('input[name=email]').val(),
        'message'            : $('input[name=message]').val()
    };

    // send the form to your PHP file (using ajax, no page reload!!)
    $.ajax({
        type: 'POST', 
        url:  form.attr('action'), // <<<< -------  complete with your php filename (watch paths!)
        data:  formData,  // the form data
        dataType: 'json', // how data will be returned from php
        encode: true,
		cache:false,
		success: function(data) {
           $('.success').show();
        },
		error:  function(response){
			$('.error').show();
		}			
    });
    
    event.preventDefault();
});
    }); 
</script>

</body>
</html>