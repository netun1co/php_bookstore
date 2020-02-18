<?php

if (isset($_GET['action'])) {

    if (isset($_GET['pid']) && $_GET['action'] == "wishlist") {
        $pid = intval($_GET['pid']);
        if (strlen($_SESSION['login']) == 0) {
            header('location:login.php');
        } else {
            $try = mysqli_query($con, "update users set wishlist = concat(wishlist, 'a', " .$_GET['pid'] . ") where id= '".$_SESSION['id']."'" );
            if ($try){
                echo "<script>alert('Product added to your wishlist');
                document.location = 'index.php'</script>";
            }else{
                echo"<script>alert('There was a problem with your wishlist, please login again');
                document.location = 'login.php'</script>";
            }
            
        }
    }

    // Shopping Cart Control =====================================================================
    /* 
Controls the items in the shopping cart
The cart variable, with all the items, are an SESSION value. It means it is only valid while the browser is open
Checks for any URL parameters called 'action' with the value 'add'
*/


    if ($_GET['action'] == "add") {

        if (isset($_GET['id'])) {

            //If it can find an ID together with the 'action' variable, it is stored
            $id = intval($_GET['id']);

            if (isset($_SESSION['cart'][$id])) {

                //if the product selected is already in the cart, it simply adds another 
                $_SESSION['cart'][$id]['quantity']++;
                $_SESSION['LAST_ACTIVITY'] = date("H:i:s");
            } else {

                //If the product is new to the cart, searches for it in the database
                $sql_p = "SELECT * FROM products WHERE id={$id}";
                $query_p = mysqli_query($con, $sql_p);

                if (mysqli_num_rows($query_p) != 0) {

                    $row_p = mysqli_fetch_array($query_p);
                    $_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['pprice']);
                    $_SESSION['LAST_ACTIVITY'] = date("H:i:s");
                } else {

                    $message = "Product ID is invalid";
                }
            }
        } else {
            $message = "Product not found (ID missing)";
        }
    }

    // End of shopping cart control ==========================================================
}
