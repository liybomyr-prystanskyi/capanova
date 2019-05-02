<?php
$product = wc_get_product();
$view = $product->get_attribute( 'view' );
$volume = $product->get_attribute( 'volume' );
?>
<div class="d-flex align-items-end">
    <h4><?php echo $product->get_regular_price(); ?> EUR</h4>
    <p>pro <?php echo $volume; ?></p>
</div>