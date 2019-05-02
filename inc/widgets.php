<?php
/**
 * Description: Here is Custom Widgets settings
 * Author: ira.che
 * Date: 11/5/2018
 * Time: 11:51 AM
 */


// Register widget area.
add_action( 'widgets_init', 'luxeacademy_widgets_init' );
function luxeacademy_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Header 1', 'luxeacademy' ),
        'id'            => 'sidebar-header-1',
        'description'   => __( 'Add widgets here to appear in your header info.', 'luxeacademy' ),
        'before_widget' => '<section id="%1$s" class="col-lg-5 widget header-info %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title hidden">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'luxeacademy' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'luxeacademy' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'luxeacademy' ),
        'id'            => 'sidebar-footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'luxeacademy' ),
        'before_widget' => '<div id="%1$s" class="footer-container__social justify-content-end d-flex widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}

/*custom widgets*/
if(!class_exists('SocLinksWidgets')) {
    class SocLinksWidgets extends WP_Widget {
        // Sets up the widgets name etc
        public function __construct() {
            $widget_ops = array(
                'classname' => 'widget_soclinks',
                'description' => 'Social Links Widget built with ACF Pro',
            );
            parent::__construct( 'SocLinks_widget', 'Social Links Widget', $widget_ops );
        }
        // Outputs the content of the widget
        public function widget( $args, $instance ) {
            // outputs the content of the widget
            $content = '';
            if(have_rows('soc_links', 'option')){
                $content .= $args['before_widget'];
                if( ! empty( $instance['title'] ) )
                    $content .= $args['before_title']. apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
                while( have_rows('soc_links', 'option') ) : the_row();
                    $name = get_sub_field("link_name");
                    $url = get_sub_field("link_url");
                    $icon = get_sub_field("link_icon");
                    $content .=  '<a href="'.$url.'" target="_blank" title="'.$name.'">'.$icon.'</a>';
                endwhile;
                $content .= $args['after_widget'];
            }
            echo $content;
        }
        // Outputs the options form on admin
        public function form( $instance ) {
            // outputs the options form on admin
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }
            $form = '<p><label for="'.$this->get_field_id("title").'">'.__("Title:", "luxeacademy").'</label>';
            $form .= '<input class="widefat" id="'.$this->get_field_id("title").'" name="'.$this->get_field_name("title").'" type="text" value="'.esc_attr($title).'"/></p>';
            echo $form;
        }
        // Processing widget options on save
        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
        }
    }
}
function register_SocLinks_widget(){
    register_widget( 'SocLinksWidgets' );
}
add_action( 'widgets_init', 'register_SocLinks_widget' );

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}
/*end of custom widgets*/