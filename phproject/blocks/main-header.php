<?php
if (isset($_Get['action'])) {
    if (!empty($_SESSION['cart'])) {
        foreach ($_POST['quantity'] as $key => $val) {
            if ($val == 0) {
                unset($_SESSION['cart'][$key]);
            } else {
                $_SESSION['cart'][$key]['quantity'] = $val;
            }
        }
    }
}
?>
<div class="w3-teal">
    <br>
    <div class="container w3-text-sand">
        <div class="w3-auto">
            <div class="w3-cell-row w3-center">
                <div class="w3-cell w3-cell-middle">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <a href="index.php">
                        <div class="logo">
                            <svg style="margin-bottom:-25px;" xmlns="http://www.w3.org/2000/svg" width="150" height="120" viewBox="0 0 24 24">
                                <path style="fill: #F2EDD8" d="M17.944 5c-1.138 0-2.376.129-3.394.491-2.283.828-2.792.838-5.103 0-1.015-.362-2.256-.491-3.392-.491-1.971 0-4.17.387-6.055.878v1.789c.847.255 1.068.627 1.203 1.493.381 2.443 1.255 4.84 5.068 4.84 3.037 0 4.051-2.259 4.722-4.345.341-1.06 1.663-1.087 2.009-.015.673 2.089 1.682 4.36 4.725 4.36 3.814 0 4.689-2.397 5.069-4.841.135-.866.356-1.237 1.204-1.492v-1.789c-1.887-.491-4.085-.878-6.056-.878zm-7.682 3.814c-.518 2.174-1.36 4.186-3.991 4.186-3.301 0-3.974-1.903-4.275-4.973-.072-.747.092-1.04.221-1.195.947-1.134 5.952-1.088 7.611-.092.475.285.783.601.434 2.074zm11.74-.787c-.301 3.07-.975 4.973-4.275 4.973-2.629 0-3.472-2.012-3.989-4.186-.351-1.473-.042-1.789.434-2.074 1.665-1 6.667-1.038 7.611.092.129.156.293.449.219 1.195zm-4.838-1.121c1.539-.234 3.318-.03 3.791.537.104.124.234.358.176.956-.031.316-.067.616-.112.9-.41-1.487-1.457-2.283-3.855-2.393zm-14.184 2.393c-.045-.284-.082-.584-.113-.9-.058-.598.073-.832.177-.956.474-.567 2.253-.771 3.792-.537-2.398.11-3.445.906-3.856 2.393zm16.02 7.764c-1.15 2.869-6.031 2.166-7 .369-.97 1.797-5.85 2.5-7-.369.578.506 1.565.669 2.318.559 2.22-.325 2.042-2.423 3.594-2.423.425 0 .81.177 1.088.464.278-.287.662-.464 1.087-.464 1.552 0 1.375 2.099 3.594 2.423.753.11 1.74-.053 2.319-.559z" /></svg>
                            <span class="w3-xxlarge" style="font-family: 'Marck Script', cursive;"><br>Le Libre Livre</span>
                        </div>
                    </a>
                </div>
                <div class="w3-cell w3-cell-middle">
                    <div class="search-area">
                        <form method="get" action="index.php">
                            <div class="control-group">

                                <input class="w3-text-brown" placeholder="Search here..." name="searchinput" required="required" />

                                <button class="search-button w3-text-brown" type="submit">Search</button>

                            </div>
                        </form>
                    </div><!-- /.search-area -->

                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div><!-- /.top-search-holder -->

                <div class="w3-cell w3-cell-middle">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                    <?php
                    if (!empty($_SESSION['cart'])) {
                        $sql = "SELECT * FROM products WHERE id IN(";
                        foreach ($_SESSION['cart'] as $id => $value) {
                            $sql .= $id . ",";
                        }
                        $sql = substr($sql, 0, -1) . ") ORDER BY id ASC";
                        $query = mysqli_query($con, $sql);
                        $totalprice = 0;
                        $totalqunty = 0;
                        while ($row = mysqli_fetch_array($query)) {
                        $quantity = $_SESSION['cart'][$row['id']]['quantity'];
                        $subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['pprice'];
                        $totalprice += $subtotal;
                        $_SESSION['qnty'] = $totalqunty += $quantity;
                        $_SESSION['tp']="$totalprice";
                    }
                        
                    ?>
                        <div>
                            <a href="my-cart.php" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                                <div class="items-cart-inner">
                                    <div class="total-price-basket">
                                        <div class="w3-badge w3-sand"><?php echo $_SESSION['qnty']; ?></div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24">
                                            <path style="fill: #F2EDD8" d="M4.559 7l4.701-4.702c.198-.198.459-.298.72-.298.613 0 1.02.505 1.02 1.029 0 .25-.092.504-.299.711l-3.26 3.26h-2.882zm12 0h2.883l-4.702-4.702c-.198-.198-.459-.298-.72-.298-.613 0-1.02.505-1.02 1.029 0 .25.092.504.299.711l3.26 3.26zm3.703 4l-.016.041-3.598 8.959h-9.296l-3.597-8.961-.016-.039h16.523zm3.738-2h-24v2h.643c.535 0 1.021.304 1.256.784l4.101 10.216h12l4.102-10.214c.234-.481.722-.786 1.256-.786h.642v-2zm-14 5c0-.552-.447-1-1-1s-1 .448-1 1v3c0 .552.447 1 1 1s1-.448 1-1v-3zm3 0c0-.552-.447-1-1-1s-1 .448-1 1v3c0 .552.447 1 1 1s1-.448 1-1v-3zm3 0c0-.552-.447-1-1-1s-1 .448-1 1v3c0 .552.447 1 1 1s1-.448 1-1v-3z" /></svg>
                                        <span class="sign">R$</span>
                                        <span class="value"><?php echo $_SESSION['tp']. ",00"; ?></span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div><!-- /.dropdown-cart -->
                    <?php } else { ?>
                        <a href="my-cart.php" data-toggle="dropdown">
                            <div class="w3-badge w3-sand">0</div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24">
                                <path style="fill: #F2EDD8" d="M4.559 7l4.701-4.702c.198-.198.459-.298.72-.298.613 0 1.02.505 1.02 1.029 0 .25-.092.504-.299.711l-3.26 3.26h-2.882zm12 0h2.883l-4.702-4.702c-.198-.198-.459-.298-.72-.298-.613 0-1.02.505-1.02 1.029 0 .25.092.504.299.711l3.26 3.26zm3.703 4l-.016.041-3.598 8.959h-9.296l-3.597-8.961-.016-.039h16.523zm3.738-2h-24v2h.643c.535 0 1.021.304 1.256.784l4.101 10.216h12l4.102-10.214c.234-.481.722-.786 1.256-.786h.642v-2zm-14 5c0-.552-.447-1-1-1s-1 .448-1 1v3c0 .552.447 1 1 1s1-.448 1-1v-3zm3 0c0-.552-.447-1-1-1s-1 .448-1 1v3c0 .552.447 1 1 1s1-.448 1-1v-3zm3 0c0-.552-.447-1-1-1s-1 .448-1 1v3c0 .552.447 1 1 1s1-.448 1-1v-3z" /></svg>
                            <span class="total-price">
                                <span class="sign">R$</span>
                                <span class="value">00,00</span>
                            </span>
                        </a>
                    <?php } ?>




                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div><!-- /.top-cart-row -->
            </div><!-- /.row -->

        </div><!-- /.container -->

    </div>
    <br>
</div>