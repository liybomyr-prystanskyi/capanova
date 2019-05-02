<?php
/**
 * Template Name: Beste Rohstoffe Page
 *  * Description: Beste Rohstoffe
 */
get_header(); ?>
<?php
if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <!--- die produkte panel --->
        <?php get_template_part('partials/organisms/banner', 'main'); ?>
        <!--- end of die produkte panel --->
        <main class="content-lines-wrapper content-lines-wrapper--margin-top">
        <div class="bg-palms bg-palms--pt-0">
            <section class="content-line">
                <div class="container pt-5 pt-lg-0">
                    <div class="row pt-5 pt-lg-0">
                        <div class="col-12 pt-5 pt-lg-0">
                            <div class="title-and-image">
                                <div class="row">
                                    <div class="col-12 col-lg-8">
                                        <h1>CAPANOVA ist anders. <br> Und die Rohstoffe gleich mit.</h1>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class=" d-flex justify-content-end">
                                            <img src="<?php echo globa_path(); ?>img/ProdukteUebersicht_Icon_Natrue.png"
                                                 srcset="<?php echo globa_path(); ?>img/ProdukteUebersicht_Icon_Natrue.png 1x , <?php echo globa_path(); ?>img/ProdukteUebersicht_Icon_Natrue@2x.png 2x"
                                                 alt="natrue">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </section>

            <!--- teasers panel --->
            <?php get_template_part('partials/organisms/best-rohstoffe','teasers'); ?>
            <!--- end of teasers panel --->

            <!--- hairstyle-guide section --->
            <?php get_template_part('partials/organisms/best-rohstoffe','hairstyle-guide'); ?>
            <!--- end hairstyle guide section --->

            <!--- subscribers panel --->
            <?php get_template_part('partials/organisms/subscribers'); ?>
            <!--- end of subscribers panel --->
        </div>
    <?php endwhile;
endif;
get_footer(); ?>