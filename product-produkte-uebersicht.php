<?php
/**
 * Template Name: Produkte uebersicht Page
 */
get_header(); ?>
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <main class="bg-palms">
            <!--- die produkte panel --->
            <?php get_template_part( 'partials/organisms/front-page', 'die-produkte' ); ?>
            <!--- end of die produkte panel --->
            <!--- list of popular products --->
            <?php get_template_part( 'partials/organisms/front-page', 'product-popular-full' ); ?>
            <!--- end list of popular  products --->
            <!--- subscribers panel --->
            <?php get_template_part( 'partials/organisms/subscribers' ); ?>
            <!--- end of subscribers panel --->
    <?php endwhile;
endif;
get_footer(); ?>