<?php
/**
 * Template Name: Front Page
 */
get_header(); ?>
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <!--- slider panel --->
        <?php get_template_part( 'partials/organisms/front-page', 'intro-baner' ); ?>
        <!--- end of slider panel --->
        <main class="bg-palms bg-palms--adaptive-home">
            <!--- die produkte panel --->
            <?php get_template_part( 'partials/organisms/front-page', 'die-produkte' ); ?>
            <!--- end of die produkte panel --->
            <!--- teaser panel --->
            <?php get_template_part( 'partials/organisms/front-page', 'teasers' ); ?>
            <!--- end teaser panel --->
            <!--- list of popular products --->
            <?php get_template_part( 'partials/organisms/front-page', 'product-popular' ); ?>
            <!--- end list of popular  products --->
            <!--- banner second --->
            <?php get_template_part( 'partials/organisms/banner','second' ); ?>
            <!--- end of banner second --->
            <!--- subscribers panel --->
            <?php get_template_part( 'partials/organisms/subscribers' ); ?>
            <!--- end of subscribers panel --->
    <?php endwhile;
endif;
get_footer(); ?>