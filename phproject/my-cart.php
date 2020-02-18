<?php
include('blocks/databaselog.php');
error_reporting(0);
if (isset($_POST['submit'])) {
	if (!empty($_SESSION['cart'])) {
		foreach ($_POST['quantity'] as $key => $val) {
			if ($val == 0) {
				unset($_SESSION['cart'][$key]);
			} else {
				$_SESSION['cart'][$key]['quantity'] = $val;
			}
		}
		echo "<script>alert('Your Cart has been Updated');</script>";
	}
}
// Code for Remove a Product from Cart
if (isset($_POST['remove_code'])) {

	if (!empty($_SESSION['cart'])) {
		foreach ($_POST['remove_code'] as $key) {

			unset($_SESSION['cart'][$key]);
			if (empty($_SESSION['cart'])) {
				unset($_SESSION['cart']);
				$_SESSION['tp'] = 0;
				$_SESSION['qnty'] = 0;
			}
		}
		$_SESSION['LAST_ACTIVITY'] = date("H:i:s");
		echo "<script>alert('Your Cart has been Updated');</script>";
	}
}
// code for insert product in order table


if (isset($_POST['ordersubmit'])) {

	if (strlen($_SESSION['login']) == 0) {
		header('location:login.php');
	} else {
		if (isset($_SESSION['cart'])) {

			$costumer = $_SESSION['username'];
			$costumerid = $_SESSION['id'];
			$costumeremail = $_SESSION['login'];
			$listofprods = json_encode($_SESSION['cart']);
			$total = $_SESSION['tp'];
			$address = mysqli_query($con, "select * from users where id='$costumerid'");
			$address2 = mysqli_fetch_array($address);
			$costumeraddress = $address2['address'];
			$costumerzip = $address2['zipcode'];

			if (strlen($costumeraddress) == 0 or strlen($costumerzip) == 0) {
				echo "<script>alert('Please update your Address and Zipcode before the checkout');
				document.location = 'my-account.php'</script>";
			} else {
				$try = mysqli_query($con, "insert into orders(`costumer`, `costumerid`, `listofproducts`, `total`, `costumeremail`,`costumeraddress`, `costumerzipcode`) values('$costumer','$costumerid','$listofprods','$total','$costumeremail','$costumeraddress','$costumerzip')");
				if ($try) {
					unset($_SESSION['cart']);
					$_SESSION['qnty'] = 0;
					$_SESSION['tp'] = 0;
					echo "<script>alert('Thank you for your purchase');
				document.location = 'index.php';</script>";
				} else {
					echo "<script>alert('There was a problem with your checkout');</script>";
				}
			}
		} else {
			echo "<script>alert('Please add items to your cart before the checkout');
			document.location = 'index.php';
			</script>";
		}
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

	<title><?php echo $confirm ?></title>

	<link rel="stylesheet" type="text/css" href="css/phproject-style.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/w3.css" />

	<link href="https://fonts.googleapis.com/css?family=Marck+Script&display=swap" rel="stylesheet">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Marck+Script&display=swap');
	</style>
	<!-- font-family: 'Marck Script', cursive; -->
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
		<div class="row w3-sand w3-round w3-card w3-large w3-text-brown w3-center">
			<div class="col-sm-12">
				<h1>Your Cart</h1>
			</div>
			<?php
			if (!empty($_SESSION['cart'])) {
				foreach ($_SESSION['cart'] as $bookid => $values) {
					$query2 = mysqli_query($con, "select * from products where id='$bookid'");
					while ($row2 = mysqli_fetch_array($query2)) {

			?>

						<div class="col-sm-1">
							<a href="product-details.php?pid=<?php echo htmlentities($row2['id']); ?>">
								<img class="img-thumbnail" src="pictures/<?php echo htmlentities($row2['pimg1']); ?>">
							</a>
						</div>
						<div class="col-sm-5">
							<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row2['id']); ?>"><?php echo htmlentities($row2['ptitle']); ?></a></h3>
							<h5 class="name"><i><a href="index.php?aut=<?php echo htmlentities($row2['pauthor']); ?>"><?php echo htmlentities($row2['pauthor']); ?></a></i></h5>
							<h5 class="name"><?php echo htmlentities($row2['pisbn']); ?></h5>
						</div>
						<div class="col-sm-2">
							<p>Unit price:</p>
							<h4 class="price"> R$<?php echo htmlentities($row2['pprice']); ?>,00 </h4>
						</div>
						<div class="col-sm-2">
							<p>Quantity:</p>
							<h4 class="price"><?php echo $values['quantity'] ?></h4>
						</div>
						<div class="col-sm-2"><br>
							<form method="POST"><button type="submit" name="remove_code[]" value="<?php echo htmlentities($row2['id']); ?>" class="w3-tag w3-teal">Remove</button></form>

						</div>

			<?php

					}
				}
			}
			?>
			<div class="col-sm-6">
				<div class="col-sm-11 w3-round w3-card w3-large w3-teal w3-center">
					<h5>This session will expire at:
					<?php 

					$d = date_interval_create_from_date_string("30 minute");
					$current = date_create($_SESSION['LAST_ACTIVITY']);
					$expiry = date_add($current,$d);
					echo date_format($expiry,"H:i:s"); ?>
					</h5>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="col-sm-11 w3-round w3-card w3-large w3-teal w3-center">
					<div class="col-sm-4">
						<h4>Total price: R$<?php echo htmlentities($_SESSION['tp']) ?>,00</h4>
					</div>
					<div class="col-sm-4">
						<h4>Total items: <?php echo htmlentities($_SESSION['qnty']) ?></h4>
					</div>
					<div class="col-sm-4">
						<form method="POST"><button type="submit" name="ordersubmit" class="w3-tag w3-amber">Checkout</button></form>
					</div>
				</div>
			</div>

		</div>
	</div>

	<?php include('blocks/footer.php'); ?>

	


</html>