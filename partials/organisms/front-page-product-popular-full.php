<?php
/**
 * Description: this part view 6 first by popularity Products on Front-Page
 */
// get all product with order by popularity
global $wp_query;
$args = array(
    'post_type' => 'product',
    'meta_key' => 'total_sales',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 4,
);
$loop = new WP_Query($args);
if ($loop->have_posts()): ?>
    <section class="content-line ">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="unsere-produkte ">
                        <h2><?php _e('Unsere Produkte haben Stil. Genau wie du.', 'capanova'); ?></h2>
                        <h3><?php _e('Entdecke die Welt von CAPANOVA und erfinde Männer-Hairstyling neu.', 'capanova'); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $number=0; while ($loop->have_posts()): $loop->the_post(); $number++; ?>
        <section class="content-line content-line--first content-line--padding-top-none">
            <div class="container" <?php wc_product_class(); ?>>
                <div class="row justify-content-center align-items-start align-items-lg-start <?php if($number % 2 == 0) echo 'flex-lg-row-reverse'; ?>">
                    <div class="col-12 col-sm-6 col-md-6">
                        <?php get_template_part('partials/molecules/single-product', 'image'); ?>
                    </div>
                    <div class="col-12 col-md-6">
                        <?php get_template_part('partials/organisms/single-product', 'sidebar'); ?>
                    </div>
                </div>
                <div class="devider"></div>
            </div>
        </section>
    <?php endwhile; ?>

<?php endif;
wp_reset_query();