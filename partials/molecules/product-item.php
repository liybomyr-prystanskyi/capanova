<?php
/**
 * Description: this part shows short version Single Product in Custom Loop
 */
$product = wc_get_product(get_the_ID());
$view = $product->get_attribute( 'view' );
$volume = $product->get_attribute( 'volume' );
if($view) $volume = ', ' . $volume;
$img_prev = get_field('field_img_prev');
$img_prev_2x = $img_prev['url'];
$img_prev_1x = $img_prev['sizes']['medium'];
?>
<div class="teaser teaser--1 ">
    <a href="<?php the_permalink(); ?>" class="teaser--1__thumbnail" data-mh="teaser--1__thumbnail">
        <?php if ($img_prev) echo '<img src="'.$img_prev_2x.'" alt="'.$img_prev['alt'].'" srcset="'.$img_prev_2x.', '.$img_prev_1x.'">'; ?>
    </a>
    <div class="teaser--1__title">
        <?php the_title('<h4><a class="h4" href="'. get_the_permalink() .'">', '</a></h4>'); ?>
        <?php if (!is_single()) {
            echo '<span>' . $view . '' . $volume . '</span>';
        } else { ?>
            <a href="<?php the_permalink(); ?>" class="link link--more"><?php _e('Weitere produkte', 'capanova'); ?></a>
        <?php } ?>
    </div>
    <?php if (!is_single()) { ?>
        <div class="teaser--1__desc">
            <p><?php the_excerpt(); ?></p>
        </div>
        <a href="<?php the_permalink(); ?>" class="link link--more"><?php _e('Mehr zum Produkt', 'capanova'); ?></a>
    <?php } ?>
</div>