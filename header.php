<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?php (wp_title("", false)) ? wp_title("") : bloginfo('name'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link rel="shortcut icon" type="image/x-icon" sizes="36x36" href="<?php echo globa_path(); ?>img/favicons/favicon.ico">
    <link rel="icon" type="image/png" sizes="36x36" href="<?php echo globa_path(); ?>img/favicons/apple-icon-36x36.png">
    <link rel="icon" type="image/png" sizes="48x48" href="<?php echo globa_path(); ?>img/favicons/apple-icon-48x48.png">
    <link rel="icon" type="image/png" sizes="72x72" href="<?php echo globa_path(); ?>img/favicons/apple-icon-72x72.png">
    <link rel="icon" type="image/png" sizes="144x144"
          href="<?php echo globa_path(); ?>img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo globa_path(); ?>img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo globa_path(); ?>img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo globa_path(); ?>img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo globa_path(); ?>img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo globa_path(); ?>img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo globa_path(); ?>img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo globa_path(); ?>img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo globa_path(); ?>img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo globa_path(); ?>img/favicons/apple-icon-180x180.png">
    <meta name="msapplication-square70x70logo" content="<?php echo globa_path(); ?>img/favicons/ms-icon-70x70.png">
    <meta name="msapplication-square144x144logo" content="<?php echo globa_path(); ?>img/favicons/ms-icon-144x144.png">
    <meta name="msapplication-square150x150logo" content="<?php echo globa_path(); ?>img/favicons/ms-icon-150x150.png">
    <meta name="msapplication-square310x310logo" content="<?php echo globa_path(); ?>img/favicons/ms-icon-310x310.png">
    <?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> <?php if (is_admin_bar_showing()) echo 'data-admin="is-admin"'; ?>>
<div id='toTop'><img src="<?php echo globa_path(); ?>img/btn-down.png" alt="top"></div>
<header class="header" data-js="header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 col-lg-3">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $custom_logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
                if (has_custom_logo())
                    echo '<a href="' . get_home_url() . '" class="logo"><img src="' . $custom_logo_image[0] . '" alt="' . get_bloginfo('name') . '" class="img-fluid" /></a>';
                else
                    echo '<h1 class="h1"><a href="' . get_home_url() . '">' . get_bloginfo('name') . '</a></h1>';
                ?>
            </div>
            <div class="col-6 d-lg-none text-right">
                <a href="<?php echo wc_get_cart_url(); ?>" class="basket d-inline-block d-lg-none">
                    <span class="items-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                </a>
                <a href="#" class="btn btn--burger">
                    <span></span>
                </a>
            </div>
            <div class="col-12 col-lg-9">
                <div class="text-right d-flex align-items-center justify-content-end">
                    <nav class="main-nav">
                        <?php
                        $args = array(
                            'theme_location' => 'primary',
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
                        <a href="<?php echo wc_get_cart_url(); ?>" class="basket d-none d-lg-inline-block">
                            <span class="items-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        </a>
                        <?php
                        if (have_rows('soc_links', 'option')) {
                            echo '<ul class="social-list">';
                            while (have_rows('soc_links', 'option')) : the_row();
                                $name = get_sub_field("link_name");
                                $url = get_sub_field('link_url', 'option');
                                $icon = get_sub_field('link_icon', 'option');
                                echo '<li class="social ' . $icon . '"><a href="' . $url . '" target="_blank" title="' . $name . '"></a></li>';
                            endwhile;
                            echo '</ul>';
                        }
                        ?>
                    </nav>
                </div>
            </div>
        </div>
</header>