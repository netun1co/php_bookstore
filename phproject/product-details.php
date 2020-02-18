<?php
include('blocks/databaselog.php');
include('blocks/displaycontrol.php');
include('blocks/actioncontrol.php');
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
		<br>
		<?php include('blocks/bigode.php'); ?>
		<hr>
	</header>

	<!-- ============================================== HEADER : END ============================================== -->
	<div class="container">
		<div class="row">
			<!--Sidebar -->
			<div class="col-xs-12 col-sm-12 col-md-2">
				<?php include('blocks/side-menu.php'); ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-10">
				<?php
				$row = $result;
				?>
				<div class="col-xs-12 col-sm-12 col-md-7 w3-center">
					<a data-title="<?php echo htmlentities($row['ptitle']); ?>" href="pictures/<?php echo htmlentities($row['pimg1']); ?>">
						<img class="img-thumbnail" src="pictures/<?php echo htmlentities($row['pimg1']); ?>" />
					</a>
				</div>

				<div class='col-xs-12 col-sm-12 col-md-5'>
					<div class="row col-md-12 w3-teal w3-card w3-round w3-large w3-tag w3-text-sand">
						<div class="col-sm-3">
							<span class="label">Title: </span>
						</div>
						<div class="col-sm-9">
							<span class="value"><?php echo htmlentities($row['ptitle']); ?></span>
						</div>
					</div><!-- /.row -->
					<div class="row col-md-12 w3-teal w3-card w3-round w3-large w3-tag w3-text-sand">
						<div class="col-sm-3">
							<span class="label">Author: </span>
						</div>
						<div class="col-sm-9">
							<span class="value"><?php echo htmlentities($row['pauthor']); ?></span>
						</div>
					</div><!-- /.row -->
					<div class="row col-md-12 w3-teal w3-card w3-round w3-large w3-tag w3-text-sand">
						<div class="col-sm-3">
							<span class="label">ISBN: </span>
						</div>
						<div class="col-sm-9">
							<span class="value"><?php echo htmlentities($row['pisbn']); ?></span>
						</div>
					</div><!-- /.row -->


			
						<div class="row col-md-12 w3-teal w3-card w3-round w3-large w3-tag w3-text-sand">
								<div class="price-box">
									<span class="price">R$ <?php echo htmlentities($row['pprice']); ?>,00</span>
								</div>

						</div><!-- /.row -->



						<div class="col-sm-12 w3-sand w3-card w3-tag w3-round w3-large w3-text-brown ">
							<a href="product-details.php?action=add&id=<?php echo $row['id']; ?>&pid=<?php echo $row['id']; ?>">
								<span class="w3-xlarge">ADD TO CART  </span><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
									<path style="fill: #44B3C2 " d="M4.559 7l4.701-4.702c.198-.198.459-.298.72-.298.613 0 1.02.505 1.02 1.029 0 .25-.092.504-.299.711l-3.26 3.26h-2.882zm12 0h2.883l-4.702-4.702c-.198-.198-.459-.298-.72-.298-.613 0-1.02.505-1.02 1.029 0 .25.092.504.299.711l3.26 3.26zm3.703 4l-.016.041-3.598 8.959h-9.296l-3.597-8.961-.016-.039h16.523zm3.738-2h-24v2h.643c.535 0 1.021.304 1.256.784l4.101 10.216h12l4.102-10.214c.234-.481.722-.786 1.256-.786h.642v-2zm-14 5c0-.552-.447-1-1-1s-1 .448-1 1v3c0 .552.447 1 1 1s1-.448 1-1v-3zm3 0c0-.552-.447-1-1-1s-1 .448-1 1v3c0 .552.447 1 1 1s1-.448 1-1v-3zm3 0c0-.552-.447-1-1-1s-1 .448-1 1v3c0 .552.447 1 1 1s1-.448 1-1v-3z" /></svg>
							</a>
						</div>
						<div class="col-sm-12 w3-sand w3-card w3-tag w3-round w3-large w3-text-brown">
							<a title="Wishlist" href="product-details.php?action=wishlist&pid=<?php echo htmlentities($row['id']) ?>">
							<span class="w3-xlarge">ADD TO WISHLIST  </span><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
										<path style="fill:red" d="M18 1l-6 4-6-4-6 5v7l12 10 12-10v-7z" /></svg>
								</a>
						</div>


				</div><!-- /.product-info -->
			</div><!-- /.col-sm-7 -->
		</div><!-- /.row -->
		<br>
			<hr>
		<div class="row">
			
			<div class="col-sm-12 w3 col-md-12 w3-sand w3-card w3-round-large w3-text-brown w3-center"><h2>You may also like:</h2></div>
		<?php 
		$category = $row ['pcategory'];
		$query2 = mysqli_query($con, "select * from products where pcategory='$category'");
					while ($row2 = mysqli_fetch_array($query2)) {
						?>
                        <div class="col-md-2 w3-sand w3-hover-amber w3-card w3-tag w3-round-large w3-text-brown" style="text-align: center;">
                            </br>
                            <a href="product-details.php?pid=<?php echo htmlentities($row2['id']); ?>">
                                <img height = '200px' src="pictures/<?php echo htmlentities($row2['pimg1']); ?>">
                            </a>
                            <h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row2['id']); ?>"><?php echo htmlentities($row2['ptitle']); ?></a></h3>
                            <h5 class="name"><i><a href="index.php?aut=<?php echo htmlentities($row2['pauthor']); ?>"><?php echo htmlentities($row2['pauthor']); ?></a></i></h5>
                            </br>
                        </div><!-- /.product-info -->
                    </li>


					<?php } ?>
		</div>
	</div><!-- /.row -->


	<?php include('blocks/footer.php'); ?>
</body>

</html>