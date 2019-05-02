<?php if (have_rows('field_teasers', get_the_ID())) { ?>
    <section class="content-line ">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                </div>
            </div>
            <div class="pb-5 row justify-content-between ">
                <div class="col-12">
                    <div class="carousel" data-carousel-speed="5000">
                        <?php while (have_rows('field_teasers', get_the_ID())) : the_row(); ?>
                            <div class="carousel__slide">
                                <div class="teaser teaser--1 teaser--teaser-title">
                                    <?php if (get_sub_field('field_teaser1')) {
                                        $img_prev = get_sub_field('field_teaser1');
                                        $img_prev_2x = $img_prev['url'];
                                        $img_prev_1x = $img_prev['sizes']['medium'];
                                        echo '<div class="teaser--1__thumbnail" data-mh="teaser--1__thumbnail"><img src="'.$img_prev_2x.'" alt="'.$img_prev['alt'].'" srcset="'.$img_prev_2x.', '.$img_prev_1x.'" /></div>';
                                    }
                                    ?>
                                    <?php if (get_sub_field('field_teaser2')) { ?>
                                        <div class="teaser--1__desc">
                                            <p><?php echo get_sub_field('field_teaser2'); ?></p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <div class="devider"></div>
        </div>
    </section>
<?php } ?>