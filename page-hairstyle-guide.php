<?php
/**
 * Template Name: Hairstyle Guide
 */
get_header(); ?>
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

        <main class="content-lines-wrapper content-lines-wrapper--margin-top bg-palms">

        <section class="content-line content-line--padding-bottom-none">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title-and-text ">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--- teaser panel --->
        <?php get_template_part( 'partials/organisms/front-page', 'teasers' ); ?>
        <!--- end teaser panel --->

        <!--- subscribers panel --->
        <?php get_template_part( 'partials/organisms/subscribers' ); ?>
        <!--- end of subscribers panel --->

    <?php endwhile;
endif;
get_footer(); ?>