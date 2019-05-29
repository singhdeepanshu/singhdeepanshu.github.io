<?php
	$i=1;
	foreach($events as $val){
	$today = date("Y-m-d H:i:s A");
	$data= date("Y-m-d H:i:s A",strtotime($val['starting_time']));
	if($data>=$today)	
	{
													
     ?>	
     <form id="login-form" name="login-form" class="nobottommargin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
		<div id="posts" class="events small-thumbs">
			<div class="entry clearfix">
			
			<?php ?>
				<div class="entry-image d-md-none d-lg-block">
					<input type="hidden" name="id" value="<?php echo $val['id']; ?>">
					<a href="#" onclick="return false">
						<img src="<?php echo substr($val['first_img'],1); ?>" alt="Events image">
						<div class="entry-date"><?php echo date("j", strtotime($val['starting_time'])); ?>
						<span><?php echo date("M",strtotime($val['starting_time'])); ?></span></div>
					</a>
				</div>
				<div class="entry-c">
					<div class="entry-title">
						<h2><a href="#" onclick="javascript:form.action='event-info.php'; document.login-form.submit();"><?php echo $val['name']; ?></a></h2>
					</div>
					<ul class="entry-meta clearfix">
						<li><span class="badge badge-warning">Private</span></li>
						<li><i class="icon-time"></i> <?php 						
															echo date("H:i:s A",strtotime($val['starting_time']));;
													   ?></li>
						<li><i class="icon-time"></i> <?php echo $val['duration']." hrs";?></li>
						<li><i class="icon-map-marker2"></i> <?php echo $val['location']; ?></li>
					</ul>
					<div class="entry-content">
						<p style="height:50px ; overflow:hidden;"><?php echo $val['description']; ?></p>
						<a href='#' class="button button-small button-circle button-border button-amber" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="icon-inbox"></i>Register</a> 
						  <?php 
						  
						  include 'register.php'; 
						  
						  ?>	
						 <input type="hidden" name="id" value="<?php echo $val['id']; ?>">
						<input type='submit' name='readmore' onclick="javascript:form.action='./event-info.php';" class="button button-small button-circle button-border button-green" value='Read More'>
					</div>
																																							
				</div>
			</div>
	<?php
	} //echo "<h4 style='color:grey; text-align:center;'> No Events in line </h4>";
	 //break;
	?>				
	<?php }
    if($val==null)
		echo "<h4 style='color:grey; text-align:center;'> No Events in line </h4>";

	?>	
		</div>
	</form>						