<?php
session_start();
error_reporting(0);
include('blocks/databaselog.php');
include('blocks/actioncontrol.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:login.php');
} else {
	// Code forProduct deletion from  wishlist	

	if (isset($_GET['del'])) {
		$wid = intval($_GET['del']);
		$query = mysqli_query($con, "UPDATE users SET wishlist = REPLACE(wishlist, '$wid', '')");
		if ($query) {
			echo "<script> alert('Your wishlist has been updated');
			document.location = 'my-wishlist.php';</script>";
		} else {
			echo "<script> alert('Error updating your wishlist, please refresh the page');</script>";
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

			<?php
			$userid = $_SESSION['id'];
			$query = mysqli_query($con, "select wishlist from users where id='$userid'");
			$row = mysqli_fetch_array($query);
			$wishlist = $row['wishlist'];
			if (strlen($wishlist) <= 0) {
				echo '<div class="row w3-sand w3-round w3-hover-amber w3-card w3-large w3-text-brown w3-center">
				<h2>Your Wishlist is Empty</h2></div>';
			} else {
				$wisharray = explode("a",$wishlist);
				foreach (array_unique($wisharray) as $book) {
					$query2 = mysqli_query($con, "select * from products where id='$book'");
					while ($row2 = mysqli_fetch_array($query2)) {

			?>
						<div class="row w3-sand w3-round w3-hover-amber w3-card w3-large w3-text-brown w3-center">
							<div class="col-sm-1">
								<a href="product-details.php?pid=<?php echo htmlentities($row2['id']); ?>">
									<img class="img-thumbnail" src="pictures/<?php echo htmlentities($row2['pimg1']); ?>">
								</a>
							</div>
							<div class="col-sm-6">
								<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row2['id']); ?>"><?php echo htmlentities($row2['ptitle']); ?></a></h3>
								<h5 class="name"><i><a href="index.php?aut=<?php echo htmlentities($row2['pauthor']); ?>"><?php echo htmlentities($row2['pauthor']); ?></a></i></h5>
								<h5 class="name"><?php echo htmlentities($row2['pisbn']); ?></h5>
							</div>
							<div class="col-sm-2">
								<p>Price:</p>
								<h4 class="price"> R$<?php echo htmlentities($row2['pprice']); ?>,00 </h4>
							</div>
							<div class="col-sm-3">
								<p><a href="my-wishlist.php?action=add&id=<?php echo $row2['id']; ?>" class="lnk btn btn-primary">Add to Cart</a></p>
								<p><a href="my-wishlist.php?del=<?php echo $row2['id']; ?>">Remove from Wishlist</a></p>

							</div>
						</div>

			<?php }
				}
			}
			?>

		</div>

		<?php include('blocks/footer.php'); ?>

	</body>

	</html>
<?php } ?>