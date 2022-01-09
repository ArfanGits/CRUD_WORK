<?php
?>
<section>
   <div class="container">
	   <div class="row">
		   <div class="col-md-6">
			   <h4>ACCOUNT LOGIN</h4>
			   <h6>NEW CUSTOMER</h6>
			   <p>Register Account</p>

			   <p>By creating an account you will be able to shop faster, be up to date on an order's status, and
				   keep
				   track of the orders you have previously made.</p>
			   <button type="submit" class="btn btn-danger">CONTINUE</button>
		   </div>
		   <div class="col-md-6">
		   <div class="head mt-3">
				   <h4>RETURNIG CUSTOMER</h4>
				   <p>I am a returning customer</p>
			   </div>
		   <form method="post" action="<?=$webroot;?>admin/Users/loginprocessor.php" enctype="multipart/form-data">
						<div class="mb-3 row">
							<label for="inputUserName" class="col-md-3 col-form-label">User Name:</label>
							<div class="col-md-9">
								<input
									type="text"
									class="form-control"
									id="inputUserName"
									name="user_name"
									value=""
									placeholder="Enter Your User Name"
								>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="inputPassword" class="col-md-3 col-form-label">Password:</label>
							<div class="col-md-9">
								<input
										type="password"
										class="form-control"
										id="inputPassword"
										name="password"
										value=""
										placeholder="Enter Your Password"
								>
							</div>
						</div>
						<div class="col-auto">
								<button type="submit" class="btn btn-primary mb-3">Submit</button>
							</div>
						</div>
			</form>
		   </div>
	   </div>
   </div>
</section>