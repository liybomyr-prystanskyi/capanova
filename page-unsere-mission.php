<?php
/**
 * Template Name: Unsere Mission Page
 *  * Description: Unsere Mission
 */
get_header(); ?>
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <!--- die produkte panel --->
        <?php get_template_part( 'partials/organisms/banner', 'main' ); ?>
        <!--- end of die produkte panel --->
        <main class="content-lines-wrapper">
            <div class="bg-palms">
                <section class="content-line pb-5" style="background-image:url('<?php echo globa_path(); ?>img/Mission_Hintergrund_Zeichnung@2x.png');">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="polaroids">
                                    <?php
                                    $first_content_area = get_field('first_content_area');
                                    if( $first_content_area ):
                                        $first_image = $first_content_area['images'];
                                    ?>
                                    <div class="polaroids__block polaroids__block--1">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-block d-lg-none">
                                                    <?php if($first_image) echo '<img src="' . $first_image['sizes']['large'] . '" alt="' . $first_image['alt'] . '" class="polaroid-img">'; ?>
                                                </div>
                                                <?php echo $first_content_area['content']; ?>
                                            </div>
                                        </div>
                                        <div class="d-none d-lg-block">
                                            <?php if($first_image) echo '<img src="' . $first_image['sizes']['large'] . '" alt="' . $first_image['alt'] . '" class="polaroid-img">'; ?>
                                        </div>
                                    </div>
                                    <?php
                                    endif;
                                    $second_content_area = get_field('second_content_area');
                                    if( $second_content_area ):
                                        $second_image = $second_content_area['images'];
                                    ?>
                                    <div class="polaroids__block polaroids__block--2">
                                        <div class="row align-items-center justify-content-start">
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <?php if($second_image) echo '<img src="' . $second_image['sizes']['large'] . '"  alt="' . $second_image['alt'] . '" class="polaroid-img">'; ?>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-8 mt-4 mt-md-0">
                                                <?php echo $second_content_area['content']; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif;
                                    $third_content_area = get_field('third_content_area');
                                    if( $third_content_area ):
                                    ?>
                                    <div class="polaroids__block polaroids__block--3">
                                        <div class="row justify-content-center">
                                            <div class="col-12 col-md-10 col-lg-8">
                                                <?php echo $third_content_area['content']; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="devider"></div>
                    </div>
                </section>
            </div>
        <!--- subscribers panel --->
        <?php get_template_part( 'partials/organisms/subscribers' ); ?>
        <!--- end of subscribers panel --->
    <?php endwhile;
endif;
get_footer(); ?>