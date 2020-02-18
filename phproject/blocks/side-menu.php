<!--
This file acts as a filter for the categories of product

The categories are first queried from the database in alphabetical order,
then all the different categories are output in a list <li> item with a link <a>

The link redirects the page to itself with a GET variable called 'cat' in the URL

Check CATEGORY CONTROL in the index.php page to continue

-->

<div class="side-menu animate-dropdown outer-bottom-xs w3-text-brown">
    <div class="head"><i>
            <h4>Choose your style:</h4>
        </i></div>
    <nav class="yamm megamenu-horizontal" role="navigation">
        <a href="index.php">
            <div class="col-md-12 w3-sand w3-hover-amber w3-card w3-round w3-large w3-tag w3-text-brown">
                All categories
            </div>
        </a>

        <?php $sql = mysqli_query($con, "select id,pcategory  from products order by pcategory");
        $categoria = '';
        while ($row = mysqli_fetch_array($sql)) {
            if ($row['pcategory'] != $categoria) {
                $categoria = $row['pcategory'];
        ?>
                <a href="index.php?cat=<?php echo $categoria; ?>">
                    <div class="col-md-12 w3-sand w3-hover-amber w3-card w3-round w3-large w3-tag w3-text-brown">
                        <?php echo $categoria; ?>
                    </div>
                </a>

                <!-- Here is the part where the URL with 'cat' variable is created -->

        <?php }
        } ?>


        </ul>
    </nav>
</div>