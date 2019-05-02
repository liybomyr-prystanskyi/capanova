<?php
$img = (get_field('def_top_bg_img', get_the_ID())) ? get_field('def_top_bg_img', get_the_ID()) : get_field('default_bg_image', 'option');
$label = get_field('field_def_label', 'option');
?>
<section class="intro-baner mobile-background-image" <?php if($img){ echo 'style="background-image:url('.$img.');"'; } ?>>
    <div class="container h-100">
        <div class="row justify-content-end align-items-end h-100">
            <div class="col-12 col-sm-7 col-lg-8 text-center h-auto d-none d-sm-block">
                <?php echo get_field('field_def_content'); ?>
                <?php if($label) { ?>
                    <div class="image text-right">
                        <img src="<?php echo $label['url']; ?>" alt="<?php echo $label['alt']; ?>">
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="wrapper-main">
        <div class="container d-block d-sm-none">
            <div class="row">
                <div class="col-12 col-sm-7 col-lg-8 text-center h-auto ">
                    <div class="mobile-baner">
                        <div class="mobile-baner__main">
                            <div class="mobile-baner__main__title">
                                <h3>Maximales Styling. Maximale Pflege.</h3>
                            </div>
                            <div class="mobile-baner__main__image text-right">
                                <img src="<?php echo globa_path(); ?>img/Startseite_Icon_Natrue.png" alt="img-1">
                            </div>
                        </div>
                        <h4>CAPANOVA bedeutet Revolution!</h4>
                        <a href="<?php echo get_page_link(38); ?>" class="btn btn--default-intro-baner mobile-baner__btn">Mehr zu den Produkten</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn--down text-center scrollTo">
        <img src="<?php echo globa_path(); ?>img/btn-down.png" alt="down">
    </a>
</section>