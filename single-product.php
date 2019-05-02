<?php
/**
 * Description: this template display Single Product Page.
 *              It is a Single Course page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 * @version     1.6.5
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header(); ?>
<main class="bg-home bg-palms" id="product-<?php the_ID(); ?>">
    <!--- product content section --->
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <section class="content-line content-line--first content-line--padding-top-none">
                <div class="container" <?php wc_product_class(); ?>>
                    <div class="row justify-content-center align-items-start align-items-lg-start">
                        <div class="col-12 col-sm-6 col-md-6">
                            <?php get_template_part('partials/molecules/single-product', 'image'); ?>
                        </div>
                        <div class="col-12 col-md-6 ">
                            <?php get_template_part('partials/organisms/single-product', 'sidebar'); ?>
                        </div>
                    </div>
                </div>
            </section>
            <!--- content tabs --->
            <?php get_template_part('partials/organisms/single-product', 'tabs'); ?>
            <!--- end of content tabs --->
            <!--- related products panel --->
            <?php get_template_part('partials/organisms/related-products'); ?>
            <!--- end of related products panel --->
            <!--- subscribers panel --->
            <?php get_template_part('partials/organisms/subscribers'); ?>
            <!--- end of subscribers panel --->
        <?php endwhile; ?>
    <?php endif; ?>
    <!--- end of product content section --->
<?php
get_footer(); ?>