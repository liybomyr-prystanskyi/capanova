<?php
/**
 * Description: this area shows only Add current Product To Card button or View The Card if user has added current product to his card.
 */
global $woocommerce;
// user is Logged in.
?>
<div class="mt-3">
    <div class="row align-items-center">
        <div class="col-8 col-sm-6 col-md-12 col-lg-6">
            <?php if(is_single()) { ?>
            <div class="counter">
                <a href="#" class="counter__ctrl counter__ctrl--less">-</a>
                <input type="text" value="1">
                <a href="#" class="counter__ctrl counter__ctrl--more">+</a>
            </div>
            <?php } else { ?>
                <a href="<?php the_permalink(); ?>" class="btn btn--default mb-0 w-100"><?php _e('Mehr erfahren','capanova'); ?></a>
            <?php } ?>
        </div>
        <div class="col-12 col-sm-6 col-md-12 col-lg-6 mt-4 mt-sm-0 mt-md-4 mt-lg-0">
            <?php if (wc_customer_bought_product($current_user->user_email, $current_user->ID, get_the_ID()) || woo_in_cart(get_the_ID())):
                ?>
                <a class="btn btn--default-details mb-0 w-100"
                   href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><?php _e("view it in card", "capanova"); ?></a>
            <?php else: ?>
                <a href="<?php echo do_shortcode('[add_to_cart_url id="' . get_the_ID() . '"]'); ?>"
                   class="btn btn--default-details mb-0 w-100"><?php _e('In den Warenkorb', 'capanova'); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>