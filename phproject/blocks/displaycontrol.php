<?php // Category Control ==========================================================================
/*
This script searches for any 'cat' variable passed by GET in the URL.
If there is one, it filters the database search accordingly (SQL code)
If there isn't, it gets all the items
*/
if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
    //SQL filtered search
    $search = mysqli_query($con, "select * from products where pcategory='$cat'");
}
// End of Category Control ===================================================================

// Author Control ============================================================================
/*
Similar to category control, but for the variable 'aut' searching authors
*/ elseif (isset($_GET['aut'])) {
    $aut = $_GET['aut'];
    //SQL filtered search
    $search = mysqli_query($con, "select * from products where pauthor like '%$aut%'");
}
// End of Author Control =====================================================================
// Product Control ============================================================================
/*
Similar to category control, but for the variable 'prod' for specific products
*/ elseif (isset($_GET['pid'])) {
    $prod = $_GET['pid'];
    //SQL filtered search
    $search = mysqli_query($con, "select * from products where id='$prod'");
    $result = mysqli_fetch_array($search);
    $name = $result['ptitle'] . ' <i>by</i> ' . $result['pauthor'];
}
// End of Product Control =====================================================================

// Search Control ============================================================================
/*
This script receives a variable from the search bar and tries to find anything similar to it
in the database, either title, author or ISBN
*/ elseif (isset($_GET['searchinput'])) {
    $user = $_GET['searchinput'];
    $search = mysqli_query($con, "select * from products WHERE ptitle like '%$user%' OR pauthor like '%$user%' OR pisbn like '%$user%' OR pcategory like '%$user%'");
} else {
    $search = mysqli_query($con, "select * from products");
}
// End of Search Control =====================================================================
