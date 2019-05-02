<?php
/**
 * Description: this file contain ACF extra fields settings for Front Page
 */
add_action('acf/init', 'register_acf_fields_front_page_settings');
function register_acf_fields_front_page_settings() {
    if( function_exists('acf_add_local_field_group') ):
        $fields_front_page = array(
            array (
                'key' => 'field_banners',
                'label' => 'Banners',
                'name' => 'banners_array',
                'type' => 'repeater',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => '',
                'max' => '4',
                'layout' => 'table',
                'button_label' => 'Add an element of banner',
                'sub_fields' => array (
                    array (
                        'key' => 'field_banner1',
                        'label' => 'Image',
                        'name' => 'advantage_thumbnail',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '15',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array (
                        'key' => 'field_banner_mob',
                        'label' => 'Image Table/Mob',
                        'name' => 'advantage_thumbnail_mob',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '15',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'url',
                        'preview_size' => 'medium',
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
                        'key' => 'field_banner2',
                        'label' => 'Content',
                        'name' => 'advantage_content',
                        'type' => 'wysiwyg',
                        'prefix' => '',
                        'instructions' => '',
                        'placeholder' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array(
                        'key' => 'field_banner3',
                        'label' => 'Content',
                        'name' => 'advantage_url',
                        'type' => 'link',
                        'prefix' => '',
                        'instructions' => '',
                        'placeholder' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                ),
            ),
        );
        acf_add_local_field_group(array(
            'key' => 'group_f_p',
            'title' => 'Banners Settings',
            'fields' => $fields_front_page,
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                ),
            ),
        ));
    endif;
}