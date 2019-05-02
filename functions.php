<?php
/**
 * Description: Luxe Academy theme functions. Here theme name is 'capanova'
 * Author: ira.che
 * Date: 11/5/2018
 * Time: 11:44 AM
 */

// Sets up theme defaults and registers support for various WordPress features.
// Note that this function is hooked into the after_setup_theme hook, which
// runs before the init hook. The init hook is too late for some features, such
// indicating support for post thumbnails.

// update core jquery.js
function replace_core_jquery_version() {
    $path = get_template_directory_uri().'/html_templates/build/'; //local path to directory with styles and scripts
    wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', $path.'/js/vendors/jquery.min.js', array(), '3.1.1' );
}
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );

// theme setup
add_action( 'after_setup_theme', 'capanova_setup' );
function capanova_setup() {
    // Make theme available for translation.
    load_theme_textdomain('capanova');
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    // Let WordPress manage the document title. By adding theme support, we declare that this theme does not use
    // a hard-coded <title> tag in the document head, and expect WordPress to provide it for us.
    add_theme_support( 'title-tag' );
    // Enable support for Post Thumbnails on posts and pages.
//    add_theme_support('post-thumbnails');
//    add_image_size('capanova-featured-image', 1903, 242, true);
//    add_image_size('capanova-thumbnail-avatar', 170, 170, true);
    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'capanova'),
        'secondary' => __('Secondary Menu', 'capanova')
    ));

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Enable support for Post Formats.
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ) );

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 26,
        'width'       => 255,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ));

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Define and register starter content to showcase the theme on new sites.
    $starter_content = array(
        'widgets' => array(
            // Put core-defined widget in the footer area.
            'sidebar-footer-1' => array(
                'Social Links Widget',
            ),
        ),

        // Default to a static front page and assign the front and posts pages.
        'options' => array(
            'show_on_front' => 'page',
            'page_on_front' => '{{home}}',
            'page_for_posts' => '{{blog}}',
        ),

        // Set the front page section theme mods to the IDs of the core-registered pages.
        'theme_mods' => array(
            'panel_1' => '{{homepage-section}}',
            'panel_2' => '{{about}}',
            'panel_3' => '{{contact}}',
            'panel_4' => '{{blog}}',
        ),

        // Set up nav menus for each of the two areas registered in the theme.
        'nav_menus' => array(
            // Assign a menu to the "top" location.
            'primary' => array(
                'name' => __( 'Primary Menu', 'capanova' ),
                'items' => array(
                    'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
                    'page_about',
                    'page_contact',
                    'page_blog',
                ),
            ),
            'secondary' => array(
                'name' => __( 'Secondary Menu', 'capanova' ),
                'items' => array(
                    'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
                    'page_privacy-policy',
                    'page_about',
                ),
            ),
        ),
    );
    $starter_content = apply_filters( 'capanova_starter_content', $starter_content );
    add_theme_support( 'starter-content', $starter_content );
}

// Allow SVG through WordPress Media Uploader
add_filter('upload_mimes', 'cc_mime_types');
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
// Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
function capanova_excerpt_more( $link ) {
    if ( is_admin() ) {
        return $link;
    }
    $link = sprintf( '<p><a href="%1$s" class="blue-btn-style">%2$s</a></p>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Name of current post */
        sprintf( __( 'See more <span class="screen-reader-text"> "%s"</span>', 'capanova' ), get_the_title( get_the_ID() ) )
    );
    return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'capanova_excerpt_more' );

// Handles JavaScript detection. Adds a `js` class to the root `<html>` element when JavaScript is detected.
function capanova_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'capanova_javascript_detection', 0 );

// Add a pingback url auto-discovery header for singularly identifiable articles.
function capanova_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
    }
}
add_action( 'wp_head', 'capanova_pingback_header' );

function globa_path(){
    return get_template_directory_uri() . '/html_templates/build/';
}
// Enqueue scripts and styles.
add_action( 'wp_enqueue_scripts', 'capanova_scripts' );
function capanova_scripts() {
    // Theme stylesheet
    $path = get_template_directory_uri().'/html_templates/build/'; //local path to directory with styles and scripts
    $path_theme = get_template_directory_uri().'/js/'; //local path to directory with styles and scripts
    wp_enqueue_style( 'capanova-bootstrap-css', $path.'css/bootstrap.min.css', '', false, 'all' );
    wp_enqueue_style( 'capanova-slick-css', $path.'css/slick.css', 'capanova-bootstrap-css', false, 'all' );
    wp_enqueue_style( 'capanova-cookieconsent-css', $path.'css/cookieconsent.min.css', 'capanova-slick-css', false, 'all' );
    wp_enqueue_style( 'capanova-style', $path.'css/style.min.css', 'capanova-cookieconsent-css', false, 'all' );
    wp_enqueue_style( 'style', get_stylesheet_uri(), 'capanova-style' );
    // Load the html5 shiv.
    wp_enqueue_script( 'html5', get_theme_file_uri( '/js/html5.js' ), array(), '3.7.3' );
    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'capanova-slick-js', $path.'js/vendors/slick.min.js' , array('jquery'), false, true );
    wp_enqueue_script( 'capanova-cookieconsent-js', $path.'js/vendors/cookieconsent.min.js' , 'capanova-slick-js', false, true );
    wp_enqueue_script( 'capanova-matchheight-js', $path.'js/vendors/jquery.matchHeight-min.js' , 'capanova-cookieconsent-js', false, true );
    wp_enqueue_script( 'capanova-sticky-kit-js', $path.'js/vendors/sticky-kit.min.js' , 'capanova-matchheight-js', false, true );
    wp_enqueue_script( 'capanova-bootstrap-js', $path.'js/vendors/bootstrap.min.js' , 'capanova-sticky-kit-js', false, true );
    wp_register_script( 'capanova-js', $path.'js/script.js' , 'capanova-bootstrap-js', false, true );

    $ajax_url = admin_url( 'admin-ajax.php' );
//    wp_localize_script( 'capanova-js', 'ajax_url', $ajax_url);
    wp_localize_script( 'capanova-js', 'wpData', array(
        'ajax_url' => $ajax_url,
        'html_template_directory' => get_template_directory_uri().'/html_templates/build/'
    ));
    wp_enqueue_script( 'capanova-js' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

// Use front-page.php when Front page displays is set to a static page.
add_filter( 'frontpage_template',  'capanova_front_page_template' );
function capanova_front_page_template( $template ) {
    return is_home() ? '' : $template;
}

//  add custom widgets settings
get_template_part( 'inc/widgets', 'widgets' );
// end of add custom widgets settings

// Add class to LI element of .primary-menu
function tps_primary_menu_li_class($objects, $args) {
    if($args->theme_location == "primary"){
        foreach($objects as $key => $item) {
            $objects[$key]->classes[] = 'nav-item';
        }
    }
    return $objects;
}
add_filter('wp_nav_menu_objects', 'tps_primary_menu_li_class', 10, 2);
/*end of setting display primary-menu*/

// add theme settings fields with acf
get_template_part( 'inc/acf-settings', 'acf-settings' );
// end of add theme settings fields with acf

/* detect post views count and store it as a custom field for each post */
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
/* end of detect post views count and store it as a custom field for each post */

/* posts custom pagination */
function custom_pagination( $pages = '', $range = 2 ){
    global $paged; //pagination page number
    if( empty($paged) )
        $paged = 1;
    $show_items = ($range * 2) + 1;
    if($pages == '') {
        global $wp_query;
        $pages = ( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
    }
    if($pages != 1){
        $links = array();
        $p1 = ($paged + $range + 1);
        $p2 = ($paged - $range - 1);
        if($paged > 1 && $show_items < $pages)
            array_push($links, "<a href='".get_pagenum_link($paged - 1)."'><</a>");
        for ($i = 1; $i <= $pages; $i++){
            if( $i > $p2 && $i < $p1 || $pages <= $show_items ){
                $link = ($paged == $i) ? "<span class='current'>".$i."</span>" : "<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
                array_push($links, $link);
            }
        }
        if ($paged < $pages && $show_items < $pages)
            array_push($links, "<a href='".get_pagenum_link($paged + 1)."'>></a>");

        $content = '<div class="pagi-posts">';
        $content .= '<ul>';
        foreach($links as $link)
            $content .= '<li>'.$link.'</li>';
        $content .= '</ul>';
        $content .= '</div>';
        echo $content;
    }
}
/* end of posts custom pagination */

/* woocommerce settings */
add_filter( 'woocommerce_register_post_type_product', 'custom_post_type_label_woo' );
function custom_post_type_label_woo( $args ){
    $labels = array(
        'name'               => __( 'Products', 'capanova' ),
        'singular_name'      => __( 'Product', 'capanova' ),
        'menu_name'          => _x( 'Products', 'Admin menu name', 'capanova' ),
        'add_new'            => __( 'Add Product', 'capanova' ),
        'add_new_item'       => __( 'Add New Product', 'capanova' ),
        'edit'               => __( 'Edit Product', 'capanova' ),
        'edit_item'          => __( 'Edit Product', 'capanova' ),
        'new_item'           => __( 'New Product', 'capanova' ),
        'view'               => __( 'View Product', 'capanova' ),
        'view_item'          => __( 'View Product', 'capanova' ),
        'search_items'       => __( 'Search Products', 'capanova' ),
        'not_found'          => __( 'No Products found', 'capanova' ),
        'not_found_in_trash' => __( 'No Products found in trash', 'capanova' ),
        'parent'             => __( 'Parent Product', 'capanova' )
    );
    $args['labels'] = $labels;
    $args['description'] = __( 'This is where you can add new Products to your store.', 'capanova' );
    return $args;
}

add_theme_support( 'woocommerce' );

// check if product is added to card
function woo_in_cart($product_id) {
    global $woocommerce;
    foreach($woocommerce->cart->get_cart() as $key => $val ) {
        $_product = $val['data'];
        if($product_id == $_product->id )
            return true;
    }
    return false;
}

add_filter( 'woocommerce_checkout_fields' , 'custom_checkout_billing_fields', 20, 1 );
function custom_checkout_billing_fields( $fields ){

    // Remove billing address 2
        // Change class
        $fields['billing']['billing_first_name']['class']   = array('form-row-wide');
        $fields['billing']['billing_last_name']['class']   = array('form-row-wide');
    return $fields;
}

//add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// remove woocommerce default fields Billing Details (most of them are required for Checkout page)
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
//    unset($fields['billing']['billing_first_name']);
//    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
//    unset($fields['billing']['billing_email']);
//    unset($fields['billing']['billing_address_1']);
//    unset($fields['billing']['billing_address_2']);
//    unset($fields['billing']['billing_city']);
//    unset($fields['billing']['billing_postcode']);
//    unset($fields['billing']['billing_country']);
//    unset($fields['billing']['billing_state']);
//    unset($fields['billing']['billing_phone']);
    unset($fields['order']['order_comments']);

    return $fields;

    // Change class
    $fields['billing']['billing_phone']['class']   = array('form-row-wide');
    $fields['billing']['billing_email']['class']   = array('form-row-wide');
}

// customize coupon displaying (on base function wc_cart_totals_coupon_html( $coupon ))
function theme_wc_cart_totals_coupon_html( $coupon ) {
    if ( is_string( $coupon ) ) {
        $coupon = new WC_Coupon( $coupon );
    }
    $discount_amount_html = '';
    if ( $amount = WC()->cart->get_coupon_discount_amount( $coupon->get_code(), WC()->cart->display_cart_ex_tax ) ) {
        $discount_amount_html = '-' . wc_price( $amount );
    } elseif ( $coupon->get_free_shipping() ) {
        $discount_amount_html = __( 'Free shipping coupon', 'woocommerce' );
    }
    $discount_amount_html = apply_filters( 'woocommerce_coupon_discount_amount_html', $discount_amount_html, $coupon );
    $coupon_html          = $discount_amount_html . ' <a href="' . esc_url( add_query_arg( 'remove_coupon', urlencode( $coupon->get_code() ), defined( 'WOOCOMMERCE_CHECKOUT' ) ? wc_get_checkout_url() : wc_get_cart_url() ) ) . '" class="woocommerce-remove-coupon" data-coupon="' . esc_attr( $coupon->get_code() ) . '">' . __( 'Remove', 'woocommerce' ) . '</a>';
    echo wp_kses( apply_filters( 'woocommerce_cart_totals_coupon_html', $coupon_html, $coupon, $discount_amount_html ), array_replace_recursive( wp_kses_allowed_html( 'post' ), array( 'a' => array( 'data-coupon' => true ) ) ) );
}
/* end of woocommerce settings */

/* customize woocommerce hooks */
add_action( 'action_name', 'your_function_name' );
function your_function_name() {
// Your code
}
/* end of customize woocommerce hooks */

//  add custom user settings
get_template_part( 'inc/user-settings', 'user-settings' );
// end of add custom user settings

/* setting my account page woo hooks */
// change menu order in account page
function my_account_menu_order() {
    $menuOrder = array(
        'dashboard'          => __( 'Dashboard', 'woocommerce' ),
        'orders'             => __( 'Orders', 'woocommerce' ),
//        'downloads'          => __( 'Download', 'woocommerce' ),
//        'edit-address'       => __( 'Addresses', 'woocommerce' ),
        'edit-account'    	=> __( 'Account Details', 'woocommerce' ),
        'customer-logout'    => __( 'Logout', 'woocommerce' ),
    );
    return $menuOrder;
}
add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );

/* add first_name and last_name fields to registration form */
// validation
add_filter( 'woocommerce_registration_errors', 'bbloomer_validate_name_fields', 10, 3 );
function bbloomer_validate_name_fields( $errors, $username, $email ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
    }
    return $errors;
}

// save fields
add_action( 'woocommerce_created_customer', 'bbloomer_save_name_fields' );
function bbloomer_save_name_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']) );
    }
}
/* end of add first_name and last_name fields to registration form */
/* end of setting my account page woo hooks */

/* edit primary menu format */
// change link name: if user not Logged In, change "My Account" link title to "Log In"
function update_menu_link($items){
    //look through the menu for items with Label "Link Title"
    if(!is_user_logged_in()){
        foreach($items as $item){
            if($item->url === get_permalink( wc_get_page_id( 'myaccount' ))){ // this is the link for woo My Account page
                $item->title = __("Log In", "capanova"); //this is the new link title
            }
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'update_menu_link', 10,2);

// add custom CSS class for My Account link in Nav Menu to hide dropdown menu (card and checkout page links for not logged n users)
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
    if(!is_user_logged_in()){
        if($item->url === get_permalink( wc_get_page_id( 'myaccount' ))){
            $classes[] = 'hide-submenu';
        }
    }
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'current ';
    }
    if (in_array('current_page_parent', $classes) ){
        $classes[] = 'current ';
    }
    return $classes;
}
/* end of edit primary menu format */
/* end of enable comment reply */

/* disable posts */
function remove_posts_menu() {
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_posts_menu');
/* end disable post */

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

/**
 * @snippet       Automatically Update Cart on Quantity Change - WooCommerce
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=73470
 * @author        Rodolfo Melogli
 * @compatible    Woo 3.5.1
 */

add_action( 'wp_footer', 'bbloomer_cart_refresh_update_qty' );

function bbloomer_cart_refresh_update_qty() {
    if (is_cart()) {
        ?>
        <script type="text/javascript">
            jQuery('div.woocommerce').on('click', 'input.qty', function(){
                jQuery("[name='update_cart']").trigger("click");
            });
        </script>
        <?php
    }
}