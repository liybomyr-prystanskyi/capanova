<?php if (get_field('hairstyle_guide_content')) { ?>
    <section class="content-line content-line--besterohstoffe pb-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-start flex-wrap">
                        <div class="p-0 col-12 col-md-6 col-lg-6 order-2 order-md-1 order-lg-1">
                            <?php the_field('hairstyle_guide_content'); ?>
                        </div>
                        <div class="p-0 col-12 col-md-6 col-lg-6 order-1 order-md-2 order-lg-2">
                            <div class="content-line__background-image ">
                                <img src="<?php echo globa_path(); ?>img/Rohstoffe_Guide.png"
                                     srcset="<?php echo globa_path(); ?>img/Rohstoffe_Guide.png 1x ,<?php echo globa_path(); ?>img/Rohstoffe_Guide@2x.png 2x"
                                     alt="guide">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="devider"></div>
        </div>
    </section>
<?php } ?>