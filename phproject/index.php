<?php
//Includes the script to connect to the database
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

    <title> Home Page - <?php echo $confirm ?></title>

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

    <!-- Body of the page -->
    <div class="container">
        <!--Sidebar -->
        <div class="col-xs-12 col-sm-12 col-md-2">
            <?php include('blocks/side-menu.php'); ?>
        </div>

        <!-- Products -->
        <div class="col-xs-12 col-sm-12 col-md-10">
            <ul class="row">
                <?php
                while ($row = mysqli_fetch_array($search)) {
                ?>
                    <li class="item col-xs-12 col-sm-6 col-md-4 w3-text-brown">
                        <div class="col-md-12 w3-sand w3-hover-amber w3-card w3-round-large w3-text-brown" style="text-align: center;">
                            </br>
                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                <img class="img-thumbnail" src="pictures/<?php echo htmlentities($row['pimg1']); ?>">
                            </a>
                            <h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['ptitle']); ?></a></h3>
                            <h5 class="name"><i><a href="index.php?aut=<?php echo htmlentities($row['pauthor']); ?>"><?php echo htmlentities($row['pauthor']); ?></a></i></h5>
                            <div class="product-price">
                                <span class="price"> R$<?php echo htmlentities($row['pprice']); ?>,00 </span>
                            </div><!-- /.product-price -->
                            <div class="w3-padding-16"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                            <path style="fill: #44B3C2 " d="M4.559 7l4.701-4.702c.198-.198.459-.298.72-.298.613 0 1.02.505 1.02 1.029 0 .25-.092.504-.299.711l-3.26 3.26h-2.882zm12 0h2.883l-4.702-4.702c-.198-.198-.459-.298-.72-.298-.613 0-1.02.505-1.02 1.029 0 .25.092.504.299.711l3.26 3.26zm3.703 4l-.016.041-3.598 8.959h-9.296l-3.597-8.961-.016-.039h16.523zm3.738-2h-24v2h.643c.535 0 1.021.304 1.256.784l4.101 10.216h12l4.102-10.214c.234-.481.722-.786 1.256-.786h.642v-2zm-14 5c0-.552-.447-1-1-1s-1 .448-1 1v3c0 .552.447 1 1 1s1-.448 1-1v-3zm3 0c0-.552-.447-1-1-1s-1 .448-1 1v3c0 .552.447 1 1 1s1-.448 1-1v-3zm3 0c0-.552-.447-1-1-1s-1 .448-1 1v3c0 .552.447 1 1 1s1-.448 1-1v-3z" /></svg>
                                        </a></div>
                            <div><a title="Wishlist" href="index.php?action=wishlist&pid=<?php echo htmlentities($row['id']) ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path style="fill:red" d="M18 1l-6 4-6-4-6 5v7l12 10 12-10v-7z" /></svg>
                                </a></div>
                            </br>
                        </div><!-- /.product-info -->
                    </li>


                <?php } ?>

            </ul>
        </div>

    </div>
    </br>
    <!-- Footer -->

    <?php include('blocks/footer.php'); ?>

</body>

</html>