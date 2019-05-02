<?php
/**
 * Description: this file create Options pages, some groups of ACF fields
 */

/* add acf while theme setup */
// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
    $path = get_stylesheet_directory() . '/inc/acf-pro/'; // update path
    return $path;
}
// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/inc/acf-pro/'; // update path
    return $dir;
}
include_once( get_stylesheet_directory() . '/inc/acf-pro/acf.php' ); // 4. Include ACF

// create Options Pages
add_action('acf/init', 'register_options_pages');
function register_options_pages() {
    if( function_exists('acf_add_options_page') ){
        acf_add_options_page(array(
            'page_title' 	=> 'Theme General Settings',
            'menu_title'	=> 'Theme Settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));
//        acf_add_options_page(array(
//            'page_title' 	=> 'Shop Settings',
//            'menu_title'	=> 'Shop Settings',
//            'menu_slug' 	=> 'shop-general-settings',
//            'capability'	=> 'edit_posts',
//            'redirect'		=> false
//        ));
        acf_add_options_sub_page(array(
            'page_title' 	=> __('Contacts', 'luxeacademy'),
            'menu_title' 	=> __('Contacts', 'luxeacademy'),
            'parent_slug'	=> 'theme-general-settings',
            'menu_slug' 	=> 'theme-contact-settings',
        ));
        acf_add_options_sub_page(array(
            'page_title' 	=> __('Subscribe settings', 'luxeacademy'),
            'menu_title' 	=> __('Subscribe settings', 'luxeacademy'),
            'parent_slug'	=> 'theme-general-settings',
            'menu_slug' 	=> 'theme-subscribe-settings',
        ));
//        acf_add_options_sub_page(array(
//            'page_title' 	=> __('Advertising settings', 'luxeacademy'),
//            'menu_title' 	=> __('Advertising settings', 'luxeacademy'),
//            'parent_slug'	=> 'theme-general-settings',
//            'menu_slug' 	=> 'theme-adv-settings',
//        ));
//        acf_add_options_sub_page(array(
//            'page_title' 	=> __('Certificate settings', 'luxeacademy'),
//            'menu_title' 	=> __('Certificates', 'luxeacademy'),
//            'parent_slug'	=> 'theme-general-settings',
//            'menu_slug' 	=> 'theme-certificates-settings',
//        ));
    }
}

// add extra fields for theme setting
get_template_part( 'inc/acf-settings', 'theme-general' );

// add fields to configure contact information
get_template_part( 'inc/acf-settings', 'option-contact' );

// add fields for subscribe form setting
get_template_part( 'inc/acf-settings', 'option-subscribe' );

// add fields to customise advertising
//get_template_part( 'inc/acf-settings', 'option-advertising' );

// add front page extra fields
get_template_part( 'inc/acf-settings', 'front-page' );

// add beste rohstoffe extra fields
get_template_part( 'inc/acf-settings', 'beste-rohstoffe' );

// add hairstyle guide extra fields
get_template_part( 'inc/acf-settings', 'hairstyle-guide' );

// add user extra fields
//get_template_part( 'inc/acf-settings', 'user' );

// add product extra fields
get_template_part( 'inc/acf-settings', 'product' );

// add pages extra fields
get_template_part( 'inc/acf-settings', 'pages' );

// add setting for creating Certificate mail for every Course on site
//get_template_part( 'inc/acf-settings', 'certificates' );

add_action('acf/init', 'register_acf_fields_base_settings');
function register_acf_fields_base_settings() {
    if( function_exists('acf_add_local_field_group') ):

    endif;
}

add_action('acf/init', 'register_acf_fields');
function register_acf_fields() {
    if( function_exists('acf_add_local_field_group') ):

    endif;
}
/* end of add acf while theme setup */

// create custom get user avatar function
add_filter('get_avatar', 'acf_profile_avatar', 10, 5);
function acf_profile_avatar( $avatar, $id_or_email, $size, $default, $alt ) {
    $user = '';
    // Get user by id or email
    if ( is_numeric( $id_or_email ) ) {
        $id   = (int) $id_or_email;
        $user = get_user_by( 'id' , $id );
    } elseif ( is_object( $id_or_email ) ) {
        if ( ! empty( $id_or_email->user_id ) ) {
            $id   = (int) $id_or_email->user_id;
            $user = get_user_by( 'id' , $id );
        }
    } else {
        $user = get_user_by( 'email', $id_or_email );
    }
    if ( ! $user ) {
        return $avatar;
    }
    // Get the user id
    $user_id = $user->ID;
    // Get the file id
    $image_id = get_user_meta($user_id, 'user_avatar', true); // acf avatar field name
    // Bail if we don't have a local avatar
    if ( ! $image_id ) {
        return $avatar;
    }
    // Get the file size
    $image_url  = wp_get_attachment_image_src( $image_id, 'full' ); // Set image size by name
    // Get the file url
    $avatar_url = $image_url[0];
    // Get the img markup
    $avatar = '<img alt="' . $alt . '" src="' . $avatar_url . '" class="avatar avatar-' . $size . '" height="' . $size . '" width="' . $size . '"/>';
    // Return our new avatar
    return $avatar;
}