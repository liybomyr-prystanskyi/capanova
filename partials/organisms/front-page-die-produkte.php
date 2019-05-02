<section class="content-line content-line--first">
    <div class="container">
        <div class="row">
            <div class="col-12 content-area <?php if (!is_front_page()) echo 'content-area--with-icon-at-bg'; ?> title-and-text list-info">
                <?php $the_content = get_the_content();
                if (!empty($the_content)): ?>
                    <?php the_content(); ?>
                <?php endif; ?>
            </div>
        </div>
        <?php if (!is_front_page()) { ?>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="list-info__button">
                        <a href="<?php echo esc_url( get_page_link( 48 ) ); ?>" class="btn btn--default"><?php _e('Mehr zu den Rohstoffen','capanova'); ?></a>
                        <a href="<?php echo esc_url( get_page_link( 82 ) ); ?>" class="btn btn--default"><?php _e('Zum Hairstyle Guide','capanova'); ?></a>
                    </div>
                </div>
            </div>
            <div class="devider"></div>
        <?php } ?>
    </div>
</section>