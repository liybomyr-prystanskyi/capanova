<?php
/**
 * Description: this template part display background full-width image on top part current page.
 *              If there is no custom image for this page only, get default image from option page "Theme settings" ACF field 'default_bg_image'.
 */
$img = (get_field('def_top_bg_img', get_the_ID())) ? get_field('def_top_bg_img', get_the_ID()) : get_field('default_bg_image', 'option');
if ($img) { ?>
    <section class="baner baner--margin-bottom" style="background-image:url('<?php echo $img; ?>');">
        <?php if (get_field('field_def_content')) { ?>
            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-12 col-lg-10 h-auto">
                        <?php echo get_field('field_def_content'); ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
<?php }

