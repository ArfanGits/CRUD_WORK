<?php

?>
<section>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-7">
			<div class="head .pl-1"style="border-bottom: 1px black solid;">
					<h3>REGISTER ACCOUNT</h3>
					<p>If you already have an account with us please login at the login page</p>
					<h3>YOUR PERSONAL DETAILS</h3>
			</div>
			<form method="post" action="<?=$webroot;?>admin/Users/signup_form_store.php" enctype="multipart/form-data">
						<div class="mb-3 row">
							<label for="inputId" class="col-md-3 col-form-label"></label>
							<div class="col-md-9">
								<input
									type="hidden"
									class="form-control"
									id="inputId"
									name="id"
									value=""
								>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="inputFullName" class="col-md-3 col-form-label">Full Name:</label>
							<div class="col-md-9">
								<input
									type="text"
									class="form-control"
									id="inputFullName"
									name="full_name"
									value=""
									placeholder="Enter Your Full Name"
								>
							</div>
						</div>
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
							<label for="inputEmail" class="col-md-3 col-form-label">Email:</label>
							<div class="col-md-9">
								<input
									type="email"
									class="form-control"
									id="inputEmail"
									name="email"
									value=""
									placeholder="Enter Your Email Address"
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
						<div class="mb-3 row">
							<label for="inputFile" class="col-md-3 col-form-label">Picture:</label>
							<div class="col-md-9">
								<input
										type="file"
										class="form-control"
										id="inputFile"
										name="picture"
										value=""
								>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="inputPhoneNumber" class="col-md-3 col-form-label">Phone Number:</label>
							<div class="col-md-9">
								<input
										type="text"
										class="form-control"
										id="inputPhoneNumber"
										name="phone_number"
										value=""
										placeholder="Enter Your Number"
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


		<!-- <div class="container row" >
			<div class="col-md-10">
				<div class="head .pl-1"style="border-bottom: 1px black solid;">
					<h3>REGISTER ACCOUNT</h3>
					<p>if you already have an account with us please login at the login page</p>
					<h3>YOUR PERSONAL DETAILS</h3>
				</div>
				<div class="mb-3 mt-3 row">
					<div class="col-md-2">
  						<label for="exampleFormControlInput1" class="form-label">*First Name</label>
				  	</div>
				  	<div class="col md-10">
  						<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
				  	</div>
				</div>

				<div class="mb-3 mt-3 row">
					<div class="col-md-2">
  						<label for="exampleFormControlInput1" class="form-label">*Last Name</label>
				  	</div>
				  	<div class="col md-10">
  						<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
				  	</div>
				</div>

				<div class="mb-3 mt-3 row">
					<div class="col-md-2">
  						<label for="exampleFormControlInput1" class="form-label">*Email</label>
				  	</div>
				  	<div class="col md-10">
  						<input type="text" class="form-control" id="email" name="email" placeholder="email@gmail.com">
				  	</div>
				</div>

				<div class="mb-3 mt-3 row">
					<div class="col-md-2">
  						<label for="exampleFormControlInput1" class="form-label">*Fax</label>
				  	</div>
				  	<div class="col md-10">
  						<input type="text" class="form-control" id="fax" name="fax" placeholder="Fax">
				  	</div>
				</div>
				<h3>YOUR PASSWORD</h3>
                    <hr>
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="password" class="form-label">*Password</label>
                        </div>
                        <div class="col-md-10">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="password" class="form-label">*Confirm Password</label>
                        </div>
                        <div class="col-md-10">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Continue</button>

			</div>

			<div class="col-md-2">


			</div>


		</div> -->
</section>