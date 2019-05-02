<?php if (get_field('hairstyle_guide_content')) { ?>
    <section class="baner baner--2 baner--2--margin-bottom-less" style="background-image:url('<?php echo globa_path(); ?>img/Mission_Header@2x.jpg');">
        <div class="container h-100">
            <div class="row h-100 justify-content-flex-start align-items-center">
                <div class="col-12 h-auto">
                    <?php the_field('hairstyle_guide_content'); ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>