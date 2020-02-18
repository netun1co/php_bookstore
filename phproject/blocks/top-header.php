<div class="w3-sand w3-text-brown">
<div class="container w3-center">
	<div class="row">
		<?php if (isset($_SESSION['login']) && strlen($_SESSION['login'])) {   ?>
			<div class="col-xs-3 w3-padding-16"><a href="my-account.php"><i class="icon fa fa-user"></i>Welcome <?php echo htmlentities($_SESSION['username']); ?></a></div>
		<?php } else { ?>
			<div class="col-xs-3 w3-padding-16"><a href="my-account.php"><i class="icon fa fa-user"></i>My Account</a></div>
		<?php } ?>

		<div class="col-xs-3 w3-padding-16"><a href="my-wishlist.php"><i class="icon fa fa-heart"></i>Wishlist</a></div>
		<div class="col-xs-3 w3-padding-16"><a href="my-cart.php"><i class="icon fa fa-shopping-cart"></i>My Cart</a></div>
		<?php if (isset($_SESSION['login']) && strlen($_SESSION['login'])) {   ?>
			<div class="col-xs-3 w3-padding-16"><a href="logout.php"><i class="icon fa fa-sign-out"></i>Logout</a></div>
		<?php } else { ?>
			<div class="col-xs-3 w3-padding-16"><a href="login.php"><i class="icon fa fa-sign-in"></i>Login</a></div>
		<?php } ?>
	</div><!-- /.cnt-account -->
</div>
</div>