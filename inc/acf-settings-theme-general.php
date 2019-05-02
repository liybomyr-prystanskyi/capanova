<?php
/**
 * Description: this file contains ACF fields settings for Theme General Settings
 * Group names: 'group_img', 'group_them'
 * Fields:
 *      Default images settings:                            group 'group_img':
 *              Top background image for pages and posts:   key   'field_def_img1',   name 'def_top_bg_img',
 *              Post thumbnail image:                       key   'field_def_img2',   name 'def_post_img',
 *              Thumbnail image for Course Programs:        key   'field_def_img3',   name 'def_cat_img',
 *              Thumbnail image for Course:                 key   'field_def_img4',   name 'def_prod_img',
 *
 *      Footer settings:                                    group 'group_them'
 *              Copyright text:                             key   'field_footer1',    name 'copyright_text',
 */
add_action('acf/init', 'register_acf_fields_theme_settings');
function register_acf_fields_theme_settings() {
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
                'preview_size' => 'luxeacademy-featured-image',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
//            array(
//                'key' => 'field_def_img2',
//                'label' => 'Post thumbnail image',
//                'name' => 'def_post_img',
//                'type' => 'image',
//                'instructions' => 'The best sizes for such images is 320px X 236px',
//                'required' => 0,
//                'conditional_logic' => 0,
//                'wrapper' => array (
//                    'width' => '',
//                    'class' => '',
//                    'id' => '',
//                ),
//                'return_format' => 'url',
//                'preview_size' => 'full',
//                'library' => 'all',
//                'min_width' => '',
//                'min_height' => '',
//                'min_size' => '',
//                'max_width' => '',
//                'max_height' => '',
//                'max_size' => '',
//                'mime_types' => '',
//            ),
//            array(
//                'key' => 'field_def_img3',
//                'label' => 'Thumbnail image for Course Programs',
//                'name' => 'def_cat_img',
//                'type' => 'image',
//                'instructions' => 'For best result give such images square form.',
//                'required' => 0,
//                'conditional_logic' => 0,
//                'wrapper' => array (
//                    'width' => '',
//                    'class' => '',
//                    'id' => '',
//                ),
//                'return_format' => 'url',
//                'preview_size' => 'full',
//                'library' => 'all',
//                'min_width' => '',
//                'min_height' => '',
//                'min_size' => '',
//                'max_width' => '',
//                'max_height' => '',
//                'max_size' => '',
//                'mime_types' => '',
//            ),
//            array(
//                'key' => 'field_def_img4',
//                'label' => 'Thumbnail image for Course',
//                'name' => 'def_prod_img',
//                'type' => 'image',
//                'instructions' => 'For best result give such images size 340px X 198px.',
//                'required' => 0,
//                'conditional_logic' => 0,
//                'wrapper' => array (
//                    'width' => '',
//                    'class' => '',
//                    'id' => '',
//                ),
//                'return_format' => 'url',
//                'preview_size' => 'full',
//                'library' => 'all',
//                'min_width' => '',
//                'min_height' => '',
//                'min_size' => '',
//                'max_width' => '',
//                'max_height' => '',
//                'max_size' => '',
//                'mime_types' => '',
//            ),
            array(
                'key' => 'field_def_label',
                'label' => 'Main Label',
                'name' => 'def_prod_label',
                'type' => 'image',
                'instructions' => 'Add glogal site label',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'preview_size' => 'full',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            )
        );
        acf_add_local_field_group(array(
            'key' => 'group_img',
            'title' => 'Default images settings',
            'fields' => $fields_image,
            'location' => array (
                array (
                    array (
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'theme-general-settings',
                    ),
                ),
            ),
            'order' => 0
        ));
        $fields_footer = array (
            array(
                'key' => 'field_footer1',
                'label' => 'Copyright text',
                'name' => 'copyright_text',
                'type' => 'text',
                'prefix' => '',
                'instructions' => '',
                'placeholder' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'Copyright © 2018 Luxe Academy',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            ),
            array(
                'key' => 'field_cookie',
                'label' => 'Cookie',
                'name' => 'cookie',
                'type' => 'textarea',
                'prefix' => '',
                'instructions' => '',
                'placeholder' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            )
        );
        acf_add_local_field_group(array(
            'key' => 'group_them',
            'title' => 'Footer settings',
            'fields' => $fields_footer,
            'location' => array (
                array (
                    array (
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'theme-general-settings',
                    ),
                ),
            ),
            'order' => 1
        ));
    endif;
}