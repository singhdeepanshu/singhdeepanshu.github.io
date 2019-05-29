<?php
session_start();

require_once('../dbConfig.php');

    
  $mysqli_conn = new Connection();
      
      $mysqli_conn->connect();

      if(isset($_REQUEST["deleteevent"])){

		$mysqli_conn = new Connection();
		$mysqli_conn->connect();
        //Get ID from select value
        $event = mysqli_real_escape_string($mysqli_conn->conn, $_POST['event']);
	/*	$squery= "select * from 'events_list' WHERE id = '$event'";
		$del = $mysqli_conn->get($squery);
		while($r =mysqli_fetch_row($del))
		{
			if ( is_file( $r['first_img'] ) ) {
           chmod( $r['first_img'] , 777 );
           unlink( $r['first_img'] );
         }
		 if ( is_file( $r['second_img'] ) ) {
           chmod( $r['second_img'] , 777 );
           unlink ($r['second_img'] );
         }
		 if ( is_file($r['third_img'] ) ) {
           chmod ($r['third_img'] , 777 );
           unlink ($r['third_img'] );
         }
		}
	*/
        $query = "DELETE FROM `events_list` WHERE id = '$event'";

        $result = $mysqli_conn->get($query);

        if($result){
      		  
          
        }
        else{
           echo $event ;
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
		<section id="content" style="background-color:#FF3371;">

			<div class="content-wrap">

				<div class="container clearfix">
					<div class="tab-container">

									
									<!-- <div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-22" aria-labelledby="ui-id-42" role="tabpanel" aria-hidden="true" style="display: none;">
										<table class="table table-hover">
										  <thead>
											<tr>
											  <th>#</th>
											  <th>First Name</th>
											  <th>Last Name</th>
											  <th>Username</th>
											</tr>
										  </thead>
										  <tbody>
											<tr>
											  <td>1</td>
											  <td>Mark</td>
											  <td>Otto</td>
											  <td>@mdo</td>
											</tr>
											<tr>
											  <td>2</td>
											  <td>Jacob</td>
											  <td>Thornton</td>
											  <td>@fat</td>
											</tr>
											<tr>
											  <td>3</td>
											  <td colspan="2">Larry the Bird</td>
											  <td>@twitter</td>
											</tr>
										  </tbody>
										</table>
									</div> -->
									<div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-23" aria-labelledby="ui-id-43" role="tabpanel" aria-hidden="false" style="">
										<form id="login-form" name="login-form" class="nobottommargin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" method="post">
												<div class="col_full">
													<label for="login-form-username">Choose Event to Delete:</label>
													<!-- <input type="text" id="login-form-username" name="name" class="form-control not-dark" required=""> -->
													<select class="form-control selectpicker not-dark" id="login-form-username" name="event">
							                            <option value="" disabled>Event Name</option>
							                           	<?php
															$sql = "SELECT id,name From events_list";
															$result = $mysqli_conn->get($sql);
															if($result->num_rows > 0) {
																while($row = mysqli_fetch_assoc($result)){
																	echo "<option value=". $row['id'] .">".$row['name']."</option>";
																}
															}
														?>
												</div>

											<input type="text" name="case" value="3" hidden="">
											<br>
										<div class="col_full nobottommargin">
											<button class="button button-3d button-black nomargin" id="login-form-submit" name="deleteevent">Delete</button>

										</div>
									</form>
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
