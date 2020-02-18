<div class="container w3-sand w3-round-xlarge">
    <span class="w3-text-brown w3-animate-input">
        <?php if (isset($cat)) {
            $subtitle = "<h1>Category: $cat</h1>";
        } elseif (isset($user)) {
            $subtitle = "<h1>Results for: $user</h1>";
        } elseif (isset($aut)) {
            $subtitle = "<h1>Author: $aut</h1>";
        } elseif (isset($name)) {
            $subtitle = "<h1>$name</h1>";
        } else {
            $subtitle = "<h3><cite><q>Lisons et dansons - deux amusements qui ne feront jamais n'importe quel mal au monde.</q> Voltaire</cite><h3>";
        }
        echo "<div style='text-align:center'>$subtitle</div>"
        ?>
    </span>

</div>