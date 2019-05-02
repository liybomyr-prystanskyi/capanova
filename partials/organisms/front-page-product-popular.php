<?php
/**
 * Description: this part view 6 first by popularity Products on Front-Page
 */
// get all product with order by popularity
global $wp_query;
$args = array(
    'post_type'         => 'product',
    'meta_key'          => 'total_sales',
    'orderby' => 'date',
    'order'   => 'DESC',
    'posts_per_page'    => 4,
);
$loop = new WP_Query( $args );
if($loop-> have_posts()): ?>
<section class="content-line ">
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <div class="unsere-produkte ">
                    <h2><?php _e('Unsere Produkte haben Stil. Genau wie du.','capanova'); ?></h2>
                    <h3><?php _e('Entdecke die Welt von CAPANOVA und erfinde Männer-Hairstyling neu.','capanova'); ?></h3>
                </div>
            </div>
        </div>
        <div class="pb-5 row justify-content-between ">
            <?php while ( $loop-> have_posts() ): $loop->the_post();
                echo '<div class="col-12 col-sm-6 col-md-3 col-lg-3">';
                include get_template_directory().'/partials/molecules/product-item.php';
                echo '</div>';
            endwhile; ?>
        </div>
        <?php if(!is_front_page()) echo '<div class="devider"></div>'; ?>
    </div>
</section>
<?php endif;
wp_reset_query();