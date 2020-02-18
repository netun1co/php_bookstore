<?php
session_start();

include('blocks/databaselog.php');
// Code user Registration
if (isset($_POST['submit'])) {
	$name = $_POST['fullname'];
	$email = $_POST['emailid'];
	$password = md5($_POST['password']);
	$firsttry = mysqli_query($con, "select * from users where email='$email'");
	if ($firsttry) {
		echo "<script>alert('The email is already registered');</script>";
	} else {
		$query = mysqli_query($con, "insert into users(username,email,password) values('$name','$email','$password')");
		if ($query) {
			echo "<script>alert('You are successfully registered. Please login to continue');</script>";
		} else {
			echo "<script>alert('Not registered something went worng');</script>";
		}
	}
}
// Code for User login
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' and password='$password'");
	$num = mysqli_fetch_array($query);
	if ($num > 0) {
		$extra = "my-account.php";
		$_SESSION['login'] = $_POST['email'];
		$_SESSION['id'] = $num['id'];
		$_SESSION['username'] = $num['username'];
		$status = 1;
		$host = $_SERVER['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		exit();
	} else {
		$extra = "login.php";
		$email = $_POST['email'];
		$host  = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		$_SESSION['errmsg'] = "Invalid email id or Password";
		exit();
	}
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="keywords" content="MediaCenter, Template, eCommerce">
	<meta name="robots" content="all">

	<title> Login - <?php echo $confirm ?></title>

	<link rel="stylesheet" type="text/css" href="css/phproject-style.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/w3.css" />

	<link href="https://fonts.googleapis.com/css?family=Marck+Script&display=swap" rel="stylesheet">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Marck+Script&display=swap');
	</style>
	<!-- font-family: 'Marck Script', cursive; -->

	<script type="text/javascript">
		function valid() {
			if (document.register.password.value != document.register.confirmpassword.value) {
				alert("Password and Confirm Password Field do not match  !!");
				document.register.confirmpassword.focus();
				return false;
			}
			return true;
		}
	</script>

</head>

<body>
	<!-- Header -->
	<header class="header-style-1">
		<?php include('blocks/top-header.php'); ?>
		<?php include('blocks/main-header.php'); ?>
		<hr>
	</header>

	<!-- ============================================== HEADER : END ============================================== -->
	<div class="container">
		<div class="row">
			<!-- Sign-in -->
			<div class="col-md-6 col-sm-12 w3-sand w3-round w3-large w3-text-brown w3-center">
				<h4>Sign in</h4>
				<br>
				<form class="register-form outer-top-xs" method="post">
					<span style="color:red;">
						<?php
						echo htmlentities($_SESSION['errmsg']);
						?>
						<?php
						echo htmlentities($_SESSION['errmsg'] = "");
						?>
					</span>
					<div class="row">
						<label class="col-md-5" for="exampleInputEmail1">Email Address <span>*</span></label>
						<input type="email" name="email" class="col-md-6" id="exampleInputEmail1">
					</div>
					<div class="row">
						<label class="col-md-5" for="exampleInputPassword1">Password <span>*</span></label>
						<input type="password" name="password" class="col-md-6" id="exampleInputPassword1">
					</div>

					<button type="submit" class="w3-tag w3-teal" name="login">Login</button>
					<br>
					<a href="forgot-password.php">Forgot your Password?</a>
				</form>
			</div>
			<!-- Sign-in -->

			<!-- create a new account -->
			<div class="col-md-6 col-sm-12 w3-sand w3-round w3-large w3-text-brown w3-center">
				<h4 class="checkout-subtitle">Create a new account</h4>
				<p class="text title-tag-line">Create your own Shopping account.</p>
				<form class="register-form outer-top-xs" role="form" method="post" name="register" onSubmit="return valid();">
					<div class="row">
						<label class="col-md-5" for="fullname">Full Name <span>*</span></label>
						<input type="text" class="col-md-6" id="fullname" name="fullname" required="required">
					</div>


					<div class="row">
						<label class="col-md-5" for="exampleInputEmail2">Email Address <span>*</span></label>
						<input type="email" class="col-md-6" id="email" onBlur="userAvailability()" name="emailid" required>
						<span id="user-availability-status1" style="font-size:12px;"></span>
					</div>

					<div class="row">
						<label class="col-md-5" for="password">Password. <span>*</span></label>
						<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="col-md-6" id="password" name="password" required>
					</div>

					<div class="row">
						<label class="col-md-5" for="confirmpassword">Confirm Password. <span>*</span></label>
						<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="col-md-6" id="confirmpassword" name="confirmpassword" required>
					</div>
					<button type="submit" name="submit" class="w3-tag w3-teal" id="submit">Sign Up</button>
				</form>
				<div id="message" style="display: none">
					<h5>The password must contain at least one number, one uppercase and one lowercase letter, and at least 8 or more characters</h5>
				</div>
			</div>
			<!-- create a new account -->
		</div><!-- /.row -->
	</div>
	</div>
	</div>
	<?php include('blocks/footer.php'); ?>
	<script>
		var myInput = document.getElementById("password");
		myInput.onfocus = function() {
			document.getElementById("message").style.display = "block";
		}
	</script>

</body>

</html>