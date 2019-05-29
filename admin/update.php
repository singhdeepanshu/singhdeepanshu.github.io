<?php
session_start();
require_once('../dbConfig.php');
$mysqli_conn = new Connection();
$mysqli_conn->connect();
$event = null;
//$id = null;
static $id=null;
if(isset($_GET["id"]))
{
	//static global $id;
	$id = $_GET['id'];
	$sql = "select * from `events_list` where id = $id";
	$result = $mysqli_conn->get($sql);
	global $event;
	if($result->num_rows > 0) {
		$event = mysqli_fetch_assoc($result);
	}else{
		die("An Error Occured, No results found");
		
	}
}

function get_data($data){
	global $event;
	if($event != null && $event != ""){
		$temp = $event[$data];
		if($data=='starting_time')
		{
			$temp = date("Y-m-d\TH:i:s",strtotime($event[$data]));
			return $temp;
		}
		
		if($temp != "" && $temp != null){
			return $temp;
		}
	}
}


if((isset($_POST['updateevent'])) && (isset($_GET["id"]))) 
{

       
      
  $mysqli_conn = new Connection();
      
      $mysqli_conn->connect();
      
      $array = array();   
      
      $array['name'] = mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['name']);
      $array['description'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['description']);
      $array['starting_time'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['starting_time']);
      $array['duration'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['duration']);
      $array['location'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['location']);
      $array['fees'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['fees']);
      $array['videos'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['videos']);
     // $array['first_img'] =  mysqli_real_escape_string($mysqli_conn->conn, $path_of_uploaded_file_first);
     // $array['second_img'] =  mysqli_real_escape_string($mysqli_conn->conn, $path_of_uploaded_file_second);
     // $array['third_img'] =  mysqli_real_escape_string($mysqli_conn->conn, $path_of_uploaded_file_third);
      
      
	foreach( array_keys($array) as $key ) {
		$fields[] = $key;
		$values[] = "'".$array[$key]."'";
	}
	
	$update_query="";
	for($i = 0; $i<count($fields); $i++ ){
		$update_query = $update_query . $fields[$i] ."=".$values[$i].",";
	}
	$update_query = substr_replace($update_query ,"",-1);
	   
      
      // $fields = implode(",", $fields);
      // $values = implode(",", $values);
      
		
	$sql = 	"update `events_list` set $update_query where id = $id";
   
 
      $result1 = $mysqli_conn->get($sql);
      
      if($result1 != false){
         
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
	<meta name="description" content="Spritual Events" />
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
		<section id="content" style="background-color: #FF3371;">

			<div class="content-wrap">

				<div class="container clearfix">
					<div class="tab-container">

								
								<div class="search_div">
									<div class="frmSearch">
										<input type="text" id="search-box" class="form-control not-dark" placeholder="Search Event by Name"/>
									</div>
								</div>
								<div id="suggesstion-box"></div>
								<br><br>
								
								<div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-23" aria-labelledby="ui-id-43" role="tabpanel" aria-hidden="true">
									<form id="login-form" name="login-form" class="nobottommargin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
												<div class="col_full">
											<label for="login-form-username">Name:</label>
											<input type="text" id="login-form-username" value="<?php echo get_data('name');?>" name="name" class="form-control not-dark" required="">
										</div>
										<div class="col_full">
											<label for="login-form-username">Description:</label>
											<textarea id="login-form-username" rows="5" name="description" class="form-control not-dark" required=""><?php echo get_data('description');?></textarea>
										</div>
										<div class="col_full">
											<label for="login-form-username">Starting On:</label>
											<input type="datetime-local" id="login-form-username" name="starting_time" value="<?php echo get_data('starting_time');?>" class="form-control not-dark" required="">
										</div>
									
										<div class="col_full">
											<label for="login-form-username">Duration:</label>
											<input type="text" id="login-form-username" name="duration" value="<?php echo get_data('duration');?> hrs" class="form-control not-dark">
										</div>
										<!-- <div class="col_full">
											<label for="login-form-username">Time:</label>
											<input type="text" id="login-form-username" name="time" value="" class="form-control not-dark" required="">
										</div> -->
										<div class="col_full">
											<label for="login-form-username">Location:</label>
											<input type="text" id="login-form-username" name="location" value="<?php echo get_data('location');?>" class="form-control not-dark" required="">
										</div>
										<div class="col_full">
											<label for="login-form-username">First Image:</label>
											<?php
												echo "<div class='preview_div'>";
												echo "<img class='image_preview' src=". get_data('first_img') ."></div>";			
											?>
											<input type="file" id="login-form-username" name="uploaded_file_first" class="form-control not-dark" accept=".jpg,.jpeg,.png">
										</div>
										<div class="col_full">
											<label for="login-form-username">Second Image:</label>
											<?php
												echo "<div class='preview_div'>";
												echo "<img class='image_preview' src=". get_data('second_img') ."></div>";
											?>
											<input type="file" id="login-form-username" name="uploaded_file_second" class="form-control not-dark" accept=".jpg,.jpeg,.png">
										</div>
										<div class="col_full">
											<label for="login-form-username">Third Image:</label>
											<?php
												echo "<div class='preview_div'>";
												echo "<img class='image_preview' src=". get_data('third_img') ."></div>";
											?>
											<input type="file" id="login-form-username" name="uploaded_file_third" class="form-control not-dark" accept=".jpg,.jpeg,.png">
										</div>
										<div class="col_full">
											<label for="login-form-username">Fees:</label>
											<input type="text" id="login-form-username" name="fees" value="<?php echo get_data('fees');?>" class="form-control not-dark">
										</div>
										
										<div class="col_full">
											<label for="login-form-username">Videos:</label>
											<input type="text" id="login-form-username" name="videos" value="<?php echo get_data('videos');?>" class="form-control not-dark">
										</div>

											<input type="text" name="case" value="3" hidden="">

										<div class="col_full nobottommargin">
											<button type="submit" class="button button-3d button-black nomargin" id="login-form-submit" name="updateevent">Update</button>

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
	<script src="../js/custom.js"></script>

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
