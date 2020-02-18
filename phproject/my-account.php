<?php
session_start();
error_reporting(0);
include('blocks/databaselog.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:login.php');
} else {
	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$ad = $_POST['address'];
		$zip = $_POST['zipcode'];
		$query = mysqli_query($con, "update users set username='$name',email='$email', address='$ad',  zipcode='$zip' where id='" . $_SESSION['id'] . "'");
		if ($query) {
			echo "<script>alert('Your info has been updated');</script>";
		}
	}

	$currentTime = date('d-m-Y h:i:s A', time());


	if (isset($_POST['submit'])) {
		$sql = mysqli_query($con, "SELECT password FROM  users where password='" . md5($_POST['cpass']) . "' && id='" . $_SESSION['id'] . "'");
		$num = mysqli_fetch_array($sql);
		if ($num > 0) {
			$con = mysqli_query($con, "update users set password='" . md5($_POST['newpass']) . "' where id='" . $_SESSION['id'] . "'");
			echo "<script>alert('Password Changed Successfully !!');
			document.location = 'my-account.php';
			</script>";
		} else {
			echo "<script>alert('Current Password not match !!');</script>";
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

		<title> Home Page - <?php echo $confirm ?></title>

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
				if (document.chngpwd.cpass.value == "") {
					alert("Current Password Filed is Empty !!");
					document.chngpwd.cpass.focus();
					return false;
				} else if (document.chngpwd.newpass.value == "") {
					alert("New Password Filed is Empty !!");
					document.chngpwd.newpass.focus();
					return false;
				} else if (document.chngpwd.cnfpass.value == "") {
					alert("Confirm Password Filed is Empty !!");
					document.chngpwd.cnfpass.focus();
					return false;
				} else if (document.chngpwd.newpass.value != document.chngpwd.cnfpass.value) {
					alert("Password and Confirm Password Field do not match  !!");
					document.chngpwd.cnfpass.focus();
					return false;
				}
				return true;
			}
		</script>

	</head>

	<body class="cnt-home">
		<!-- Header -->
		<header class="header-style-1">
			<?php include('blocks/top-header.php'); ?>
			<?php include('blocks/main-header.php'); ?>
			<hr>
		</header>
		<!-- ============================================== HEADER : END ============================================== -->

		<div class="container">
			<div class="row">
				<?php
				$userid = $_SESSION['id'];
				$query = mysqli_query($con, "select * from users where id='$userid'");

				while ($row = mysqli_fetch_array($query)) {
				?>
					<div class="col-md-6 w3-sand w3-round w3-large w3-text-brown w3-center">
						
						<h4>Update Info</h4>
						<form class="register-form" role="form" method="post">
							<div class="row w3-padding-16">
								<label class="col-md-5" for="name">Name<span>*</span></label>
								<input type="text" class="col-md-6" id="name" name="name" required="required" value="<?php echo $row['username']; ?>">
							</div>

							<div class="row w3-padding-16">
								<label class="col-md-5" for="exampleInputEmail1">Email Address <span>*</span></label>
								<input type="email" class="col-md-6" id="email" name="email" required="required" value="<?php echo $row['email']; ?>">
							</div>
							<div class="row w3-padding-16">
								<label class="col-md-5" for="exampleInputEmail1">Address <span>*</span></label>
								<input type="text" class="col-md-6" id="address" name="address" required="required" value="<?php echo $row['address']; ?>">
							</div>
							<div class="row w3-padding-16">
								<label class="col-md-5" for="exampleInputEmail1">Zip Code <span>*</span></label>
								<input type="text" class="col-md-6" id="zipcode" name="zipcode" required="required" value="<?php echo $row['zipcode']; ?>">
							</div>
							<button type="submit" name="update" class="w3-tag w3-teal">Update</button>
						</form>
						<h4> Change Password</h4>
						<form class="register-form" role="form" method="post" name="chngpwd" onSubmit="return valid();">
							<div class="row w3-padding-16">
								<label class="col-md-5" for="Current Password">Current Password<span>*</span></label>
								<input type="password" class="col-md-6" id="cpass" name="cpass" required="required">
							</div>
							<div class="row w3-padding-16">
								<label class="col-md-5" for="New Password">New Password <span>*</span></label>
								<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="col-md-6" id="newpass" name="newpass">
							</div>
							<div class="row w3-padding-16">
								<label class="col-md-5" for="Confirm Password">Confirm Password <span>*</span></label>
								<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="col-md-6" id="cnfpass" name="cnfpass" required="required">
							</div>
							<button type="submit" name="submit" class="w3-tag w3-teal">Change </button>
							<div id="message" style="display: none"><h5>The password must contain at least one number, one uppercase and one lowercase letter, and at least 8 or more characters</h5>
				</div>
						</form>
					</div>
					<div class="col-md-6 w3-teal w3-round w3-large w3-text-sand w3-center">
						<h4>Registered Info</h4>
						<div class="row w3-padding-16">
							<label class="col-md-5">Name</label>
							<span><?php echo $row['username']; ?></span>
						</div>

						<div class="row w3-padding-16">
							<label class="col-md-5">Email Address </label>
							<span><?php echo $row['email']; ?></span>
						</div>
						<div class="row w3-padding-16">
							<label class="col-md-5">Address</label>
							<span><?php echo $row['address']; ?></span>
						</div>
						<div class="row w3-padding-16">
							<label class="col-md-5">Zip Code</label>
							<span><?php echo $row['zipcode']; ?></span>
						</div>
						<div class="row w3-padding-16">
							<span class="col-sm-12"><?php echo "Created on: " . $row['ucreation'] ?> </span>
						</div>
					</div>
					<!-- already-registered-login -->
			</div>
		<?php } ?>
		<div class="row">
			<div class="col-md-6 w3-sand w3-round w3-large w3-text-brown w3-center">





			</div>
		</div>
		</div>
		<!-- checkout-step-02  -->
		<?php include('blocks/footer.php'); ?>
		<script>
		var myInput = document.getElementById("newpass");
		myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}
	</script>

	</html>
<?php } ?>