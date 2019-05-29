<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-body">
									<div class="modal-content">
										<div class="modal-header text-center">
											<h4 class="modal-title" id="myModalLabel">Register</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<div class="modal-body">

											<form id="login-form" name="login-form" class="nobottommargin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" method="post">
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="name">Name</label>
														<input type="text" class="form-control" name="name" id="name" placeholder="Name">
													</div>
													<div class="form-group col-md-6">
														<label for="email">Email</label>
														<input type="email" class="form-control" name="email" id="email" placeholder="Email">
													</div>
												</div>
												<div class="form-group">
													<label for="address">Address</label>
													<input type="text" class="form-control" id="address" name="address" placeholder="Address">
												</div>
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="dob">Date of Birth</label>
														<input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
													</div>
													<div class="form-group col-md-6">
														<label for="birthplace">Birth Place</label>
														<input type="text" class="form-control" id="birthplace" name="birthplace" placeholder="Birth Place">
													</div>
												</div>	
												<div class="form-group">
													<label for="phone">Phone</label>
													<input type="text" pattern="[0-9]{10}" class="form-control" name="phone" id="phone" placeholder="Mobile">
												</div>	
														
												<button type="submit" name="user-register" class="btn btn-primary">Register</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						