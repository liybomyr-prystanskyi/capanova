<?php
/*
 * Description: the Footer for all pages
 * */
?>
<!--- footer panel --->
<footer class="footer">
    <div class="footer__bg">
        <img src="<?php echo globa_path(); ?>img/footer-bg.png " alt="footer background">
    </div>
    <div class="footer__content">
        <div class="container">
            <div class="row justify-content-center align-items-end">
                <div class="footer__content__line col-5 col-sm-4  order-1">
                    <img src="<?php echo globa_path(); ?>img/Footer_Icon_Natrue.jpg"
                         srcset="<?php echo globa_path(); ?>img/Footer_Icon_Natrue.jpg 1x , <?php echo globa_path(); ?>img/Footer_Icon_Natrue@2x.png 2x "
                         alt="footer logo" class="img-fluid"></div>
                <div class="footer__content__line col-12 col-xl-3 order-3 order-xl-2 text-center">
                    <?php if (get_field('copyright_text', 'option'))
                        echo "<p>" . get_field('copyright_text', 'option') . "</p>"; ?>
                </div>
                <div class="footer__content__line col-12 col-xl-5 text-center text-xl-right order-2 order-xl-3">
                    <?php
                    $args = array(
                        'theme_location' => 'secondary',
                        'menu' => '',
                        'container' => '',
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => '',
                        'menu_id' => '',
                        'echo' => true,
                        'depth' => 0,
                        'fallback_cb' => '__return_empty_string',
                        'items_wrap' => '<ul>%3$s</ul>',
                    );
                    wp_nav_menu($args);
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>
</main>
<!--- end of footer panel --->
<?php the_field('cookie','option'); ?>
<?php wp_footer(); ?>
</body>
</html>