<?php
/**
 * Description: this area display Single post type Page
 */
get_header(); ?>
<?php
if ( have_posts() ) :
while ( have_posts() ) : the_post(); ?>
<main class="bg-palms">
    <!--- die produkte panel --->
    <?php get_template_part( 'partials/organisms/page', 'content' ); ?>
    <!--- end of die produkte panel --->

    <!--- subscribers panel --->
    <?php get_template_part( 'partials/organisms/subscribers' ); ?>
    <!--- end of subscribers panel --->
    <?php endwhile;
    endif;
    get_footer(); ?>
