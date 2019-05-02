<?php
global $wp_query;
$args = array(
    'post_type' => 'product',
    'post__not_in' => array(get_the_ID()),
    'orderby' => 'date',
    'order'   => 'DESC',
    'order' => 'DESC',
    'posts_per_page' => 3,
);
$loop = new WP_Query($args);
if ($loop->have_posts()): ?>
<section class="content-line ">
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <div class="unsere-produkte ">
                    <h3><?php _e('Weitere Produkte', 'capanova'); ?></h3>
                </div>
            </div>
        </div>
        <div class="pb-5 row justify-content-between ">
            <?php while ($loop->have_posts()): $loop->the_post();
                echo '<div class="col-12 col-sm-6 col-md-3 col-lg-3">';
                include get_template_directory() . '/partials/molecules/product-item.php';
                echo '</div>';
            endwhile; ?>
        </div>
        <div class="devider"></div>
    </div>
</section>
<?php endif;
wp_reset_query();