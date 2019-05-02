<?php
$product = wc_get_product(get_the_ID());
$view = $product->get_attribute( 'view' );
$volume = $product->get_attribute( 'volume' );
if($view) $volume = ', ' . $volume;
$value_text = $product->get_attribute( 'value-text' );

?>
<div class="main-title">
    <?php if(is_single()) {
        echo '<h1>' . get_the_title() . '</h1>';
    } else {
        echo '<h2>' . get_the_title() . '</h2>';
    } ?>
</div>
<div class="pricing-block">
    <div class="text-left mb-5 mb-lg-3">
        <?php echo '<span>' . $view . '' . $volume . '</span>'; ?>
    </div>
    <div class="description">
        <?php the_content(); ?>
    </div>
    <div class="pricing-block__sending flex-column">
        <div class="d-flex align-items-end">
            <?php get_template_part( 'partials/molecules/single-product','price' ); ?>
        </div>
        <div class="price-description">
            <?php
            echo '<p>' . $value_text . '</p>';
            echo '<p>' . __("Einzelpreis inkl. MwSt. zzgl. Versandkosten") . '</p>';
            ?>
        </div>
        <?php get_template_part( 'partials/molecules/single-product','addtocart' ); ?>
    </div>
</div>