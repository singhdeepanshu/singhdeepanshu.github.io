<?php
session_start();

require_once('../dbConfig.php');

//Settings 
$max_allowed_file_size = 300; // size in KB 
$allowed_extensions = array("jpg", "jpeg", "png", "svg");
$upload_folder = '../events_images/'; //<-- this folder must be writeable by the script

$errors ='';

if(isset($_POST['addevent']))
{

  //Get the uploaded file information
  $name_of_uploaded_file_first =  basename($_FILES['uploaded_file_first']['name']);
  $name_of_uploaded_file_second =  basename($_FILES['uploaded_file_second']['name']);
  $name_of_uploaded_file_third =  basename($_FILES['uploaded_file_third']['name']);
  
  //get the file extension of the file
  $type_of_uploaded_file_first = substr($name_of_uploaded_file_first, 
              strrpos($name_of_uploaded_file_first, '.') + 1);
  $type_of_uploaded_file_second = substr($name_of_uploaded_file_second, 
              strrpos($name_of_uploaded_file_second, '.') + 1);
  $type_of_uploaded_file_third = substr($name_of_uploaded_file_third, 
              strrpos($name_of_uploaded_file_third, '.') + 1);
  
  $size_of_uploaded_file_first = $_FILES["uploaded_file_first"]["size"]/1024;
  $size_of_uploaded_file_second = $_FILES["uploaded_file_second"]["size"]/1024;
  $size_of_uploaded_file_third = $_FILES["uploaded_file_third"]["size"]/1024;
  
  
  if($size_of_uploaded_file_first > $max_allowed_file_size ) 
  {
    $errors .= "\n Size of file should be less than $max_allowed_file_size";
  }
  if($size_of_uploaded_file_second > $max_allowed_file_size ) 
  {
    $errors .= "\n Size of file should be less than $max_allowed_file_size";
  }
  if($size_of_uploaded_file_third > $max_allowed_file_size ) 
  {
    $errors .= "\n Size of file should be less than $max_allowed_file_size";
  }
  
  //------ Validate the file extension -----
  $allowed_ext = false;
  for($i=0; $i<sizeof($allowed_extensions); $i++) 
  { 
    if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file_first) == 0)
    {
      $allowed_ext = true;    
    }
	if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file_second) == 0)
    {
      $allowed_ext = true;    
    }
	if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file_third) == 0)
    {
      $allowed_ext = true;    
    }
  }

  /* $allowed_ext = false;
  for($i=0; $i<sizeof($allowed_extensions); $i++) 
  { 
    if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file_second) == 0)
    {
      $allowed_ext = true;    
    }
  }

  $allowed_ext = false;
  for($i=0; $i<sizeof($allowed_extensions); $i++) 
  { 
    if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file_third) == 0)
    {
      $allowed_ext = true;    
    }
  }
   */
  if(!$allowed_ext)
  {
    $errors .= "\n The uploaded file is not supported file type. ".
    " Only the following file types are supported: ".implode(',',$allowed_extensions);
  }
  
  //send the email 
  if(empty($errors))
  {
    //copy the temp. uploaded file to uploads folder
    $uid1=bin2hex(random_bytes(32));
	$uid2=bin2hex(random_bytes(32));
	$uid3=bin2hex(random_bytes(32));  
    //$path_of_uploaded_file = $upload_folder . $name_of_uploaded_file;
    $path_of_uploaded_file_first = $upload_folder . $uid1 . "." . $type_of_uploaded_file_first;
    $path_of_uploaded_file_second = $upload_folder . $uid2 . "." . $type_of_uploaded_file_second;
    $path_of_uploaded_file_third = $upload_folder . $uid3 . "." . $type_of_uploaded_file_third;
    $tmp_path_first = $_FILES["uploaded_file_first"]["tmp_name"];
    $tmp_path_second = $_FILES["uploaded_file_second"]["tmp_name"];
    $tmp_path_third = $_FILES["uploaded_file_third"]["tmp_name"];
    
    if(is_uploaded_file($tmp_path_first))
    {
        if(!copy($tmp_path_first,$path_of_uploaded_file_first))
        {
          $errors .= '\n error while copying the uploaded file';
        }
    }
 
    if(is_uploaded_file($tmp_path_second))
    {
        if(!copy($tmp_path_second,$path_of_uploaded_file_second))
        {
          $errors .= '\n error while copying the uploaded file';
        }
    }
  
    if(is_uploaded_file($tmp_path_third))
    {
        if(!copy($tmp_path_third,$path_of_uploaded_file_third))
        {
          $errors .= '\n error while copying the uploaded file';
        }
    }
        
    
  $mysqli_conn = new Connection();
      
      $mysqli_conn->connect();
      
      $array = array();   
      
      $array['name'] = mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['name']);
      $array['description'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['description']);
      $array['starting_time'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['starting_time']);
      $array['duration'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['duration']);
      $array['location'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['location']);
      $array['first_img'] =  mysqli_real_escape_string($mysqli_conn->conn, $path_of_uploaded_file_first);
      $array['second_img'] =  mysqli_real_escape_string($mysqli_conn->conn, $path_of_uploaded_file_second);
      $array['third_img'] =  mysqli_real_escape_string($mysqli_conn->conn, $path_of_uploaded_file_third);
      $array['fees'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['fees']);
      $array['videos'] =  mysqli_real_escape_string($mysqli_conn->conn, $_REQUEST['videos']);
		foreach( array_keys($array) as $key ) {
          $fields[] = "`$key`";
          $values[] = "'" . $array[$key] . "'";
      }   
      
      $fields = implode(",", $fields);
      $values = implode(",", $values);
      
      $sql =  "INSERT INTO `events_list` ($fields) VALUES ($values) ";
      
      $result1 = $mysqli_conn->get($sql);
      
      if($result1 != false){
         
      }
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

	<link rel="stylesheet" href="../css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Side Panel - Right Overlay | Canvas</title>

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
											<label for="login-form-username">Name:</label>
											<input type="text" id="login-form-username" name="name" class="form-control not-dark" required="">
										</div>
										<div class="col_full">
											<label for="login-form-username">Description:</label>
											<textarea id="login-form-username" rows="5" name="description" class="form-control not-dark" required=""></textarea>
										</div>
										<div class="col_full">
											<label for="login-form-username">Starting On:</label>
											<input type="datetime-local" id="login-form-username" name="starting_time" class="form-control not-dark" required="">
										</div>
										<div class="col_full">
											<label for="login-form-username">Duration:</label>
											<input type="text" id="login-form-username" name="duration" class="form-control not-dark" required="">
										</div>									
										<div class="col_full">
											<label for="login-form-username">Location:</label>
											<input type="text" id="login-form-username" name="location" class="form-control not-dark" required="">
										</div>
										<div class="col_full">
											<label for="login-form-username">First Image:</label>
											<input type="file" id="login-form-username" name="uploaded_file_first" class="form-control not-dark">
										</div>
										<div class="col_full">
											<label for="login-form-username">Second Image:</label>
											<input type="file" id="login-form-username" name="uploaded_file_second" class="form-control not-dark">
										</div>
										<div class="col_full">
											<label for="login-form-username">Third Image:</label>
											<input type="file" id="login-form-username" name="uploaded_file_third" class="form-control not-dark">
										</div>
										<div class="col_full">
											<label for="login-form-username">Fees:</label>
											<input type="text" id="login-form-username" name="fees" class="form-control not-dark" required="">
										</div>		
										<div class="col_full">
											<label for="login-form-username">Videos:</label>
											<input type="text" id="login-form-username" name="videos" placeholder="Paste video URL" class="form-control not-dark" required="">
										</div>
											<input type="text" name="case" value="3" hidden="">

										<div class="col_full nobottommargin">
											<button type="submit" class="button button-3d button-black nomargin" id="login-form-submit" name="addevent">Create</button>
										</div>
										
									</form>
									</div>
									

								</div>
				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<!-- <div class="container">

				
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

				</div>

			</div> -->

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
