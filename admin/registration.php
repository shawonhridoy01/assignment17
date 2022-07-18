
<?php
session_start();
if (basename(__DIR__)  != "admin") {
	$isInternal = true;
	$baseUrl = "../";
} else {
	$isInternal = false;
	$baseUrl = "";
}

 

include "./includes/config.php";


if($_POST){
	// fetching all data from registration form 
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
	$last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);	
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$phone = mysqli_real_escape_string($conn,$_POST['phone']);

	// securing password for inserting database 
	$spassword = password_hash($password,PASSWORD_BCRYPT);
	$sconfirm_password = password_hash($password,PASSWORD_BCRYPT);



	// showError variable will check is there any error in condition by default it will true after detect any error it will be false 
	$showError = true;

	// $exists function will check username already existis or not 
	$exists = false;
	$emailExists = false;
	$usernameSelect = "select * from registration where username = '{$username}'";
	$usernameSelectResult = mysqli_query($conn,$usernameSelect);

		// storing username and password in session 
		// $_SESSION["username"] = $username;
		// $_SESSION["email"] = $email;
		// $_SESSION["password"] = $password;
	if(mysqli_num_rows($usernameSelectResult) > 0){
		$exists = true;
	}
	$emailSelect = "select * from registration where email = '{$email}'";
	$emailSelectResult = mysqli_query($conn,$emailSelect);
	if(mysqli_num_rows($emailSelectResult) > 0){
		$emailExists = true;
	}


	if(empty($username) || empty($first_name) || empty($last_name) || empty($password) || empty($confirm_password) || empty($email) || empty($phone) ){
		// $msg = "All Field are required";
		// $showError = true;
		echo "All Field are required";
	}elseif(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
		echo "Enter a valid email";
	}elseif($emailExists == true){
		echo "Email already exists";
	}elseif(filter_var($phone,FILTER_VALIDATE_INT)){
		echo "Enter a valid phone number";
	}elseif($exists == true){
		echo $username."already exists";
	}else{
		if($password === $confirm_password){
			$passwordEncrpty = password_hash($password,PASSWORD_BCRYPT);
			$insertquery = "INSERT INTO registration(username, first_name, last_name, password, email, phone) VALUES ('{$username}','{$first_name}','{$last_name}','{$passwordEncrpty}','{$email}','{$phone}')";
		$insertqueryResult = mysqli_query($conn,$insertquery);
		if($insertqueryResult){
			
			header("location:login.php");
		}
		}else{
			echo "Password does not match";
		}
	}
	




}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form
	</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<!-- <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script> -->
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<!-- <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/login.js"></script> -->
	<!-- /theme JS files -->
	<?php include "includes/head.php"; ?>

</head>

<body>




	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Registration form -->
					<form action="<?php echo  htmlentities($_SERVER['PHP_SELF'])?>" method="post">
						<div class="row">
							<div class="col-lg-6 col-lg-offset-3">
								<div class="panel registration-form">
									<div class="panel-body">
										<div class="text-center">
											<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
											<h5 class="content-group-lg">Create account <small class="display-block">All fields are required</small></h5>
										</div>

										<div class="form-group has-feedback">
											<input type="text" class="form-control" placeholder="Choose username" name="username" >
											<div class="form-control-feedback">
												<i class="icon-user-plus text-muted"></i>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" placeholder="First name" name="first_name" ">
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" placeholder="Second name" name="last_name"> 
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
												</div>
											</div>
										</div>

										
								

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="password" class="form-control" placeholder="Create password" name="password">
													<div class="form-control-feedback">
														<i class="icon-user-lock text-muted" ></i>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="password" class="form-control" placeholder="Repeat password" name=confirm_password>
													<div class="form-control-feedback" >
														<i class="icon-user-lock text-muted"></i>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="email" class="form-control" placeholder="Your email" name="email">
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
												</div>
											</div>

											
										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="tel" class="form-control" placeholder="Your phone" name="phone" >
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
												</div>
											</div>

								

										<div class="text-right">
											<!-- <button type="submit" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Back to login form</button> -->
											<a href="./login.php" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i>Back to login form</a>
											<button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<!-- /registration form -->


					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2015. <a href="#">Web App</a> by <a href="https://shawonhridoy.com/" target="_blank">Shawon Hridoy</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
