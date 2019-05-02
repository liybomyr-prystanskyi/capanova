<?php if (have_rows('field_banners', get_the_ID())) { ?>
    <section class="content-line content-line--padding-top-none">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <?php $l = 0;
                    while (have_rows('field_banners', get_the_ID())) : the_row();
                        $l++; ?>
                        <?php
                        if (isMobile()) {
                            if (get_sub_field('field_banner_mob')) {
                                $banner_photo = get_sub_field('field_banner_mob');
                            } else {
                                $banner_photo = get_sub_field('field_banner1');
                            }
                        } else {
                            $banner_photo = get_sub_field('field_banner1');
                        }
                        ?>
                        <a href="<?php echo get_sub_field('advantage_url')['url']; ?>"
                           class="teaser <?php if ($l > 1) echo 'small-teaser'; ?> teaser--2"
                           style="background-image:url(<?php echo $banner_photo; ?>);<?php if (!is_front_page()) {
                               echo 'background-position: top right;';
                           } ?>">
                            <div>
                                <?php echo get_sub_field('field_banner2'); ?>
                            </div>
                        </a>
                        <?php if ($l == 1) echo '</div><div class="col-12 col-lg-6">'; ?>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="devider"></div>
        </div>
    </section>
<?php } ?>