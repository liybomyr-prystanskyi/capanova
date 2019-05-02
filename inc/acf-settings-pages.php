<?php
/**
 * Description: this file contains ACF extra fields settings for all pages, posts and other pages exclude Front Page AND for specific pages
 */
// add extra fields settings for all pages, posts and other pages exclude Front Page
// field1: Top background image for pages and posts
add_action('acf/init', 'register_acf_fields_general_page_settings');
function register_acf_fields_general_page_settings() {
    if( function_exists('acf_add_local_field_group') ):
        $fields_image = array (
            array(
                'key' => 'field_def_img1',
                'label' => 'Top background image for pages and posts',
                'name' => 'def_top_bg_img',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'large',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_def_content',
                'label' => 'Content for top background image for pages and posts',
                'name' => 'def_top_bg_content',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        );
        acf_add_local_field_group(array(
            'key' => 'group_settings',
            'title' => 'Page Settings',
            'fields' => $fields_image,
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'post',
                    ),
                ),
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                ),
                array (
                    array (
                        'param' => 'page_type',
                        'operator' => '!=',
                        'value' => 'front_page',
                    ),
                ),
            ),
            'order' => 0
        ));
    endif;
}