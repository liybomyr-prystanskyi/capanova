<?php
/**
 * Description: this file contain ACF fields settings for Advertising
 * Groups: 'group_adv1', 'group_adv2'
 * Fields:
 *                          group name 'group_adv1'
 *      Advertising text:   key 'field_adv1',   name 'adv_text'
 *      Button link:        key 'field_adv2',   name 'link_url'
 *      Button text:        key 'field_adv3',   name 'link_text'
 *
 *                                                      group name 'group_adv2'
 *      Advertising title:                              key 'field_adv4',   name 'adv_title',
 *      Advertising content:                            key 'field_adv5',   name 'adv_content'
 *      Button link:                                    key 'field_adv6',   name 'adv_link_url'
 *      Button text:                                    key 'field_adv7',   name 'adv_link_text'
 *      Background image for bottom advertise block:    key 'field_adv8',   name 'adv_bg_image'
 */
add_action('acf/init', 'register_acf_fields_advertising_settings');
function register_acf_fields_advertising_settings() {
    if( function_exists('acf_add_local_field_group') ):
        $fields_top = array(
            array (
                'key' => 'field_adv1',
                'label' => 'Advertising text',
                'name' => 'adv_text',
                'type' => 'text',
                'prefix' => '',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'please write advertise text here',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            ),
            array (
                'key' => 'field_adv2',
                'label' => 'Button link',
                'name' => 'link_url',
                'type' => 'page_link',
                'prefix' => '',
                'instructions' => 'if you want to add button, write the url here or choose page in dropdown list',
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
            ),
            array (
                'key' => 'field_adv3',
                'label' => 'Button text',
                'name' => 'link_text',
                'type' => 'text',
                'prefix' => '',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placeholder' => 'add your text to button',
                'default_value' => 'Shop now',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            ),
        );
        acf_add_local_field_group(
            array(
                'key' => 'group_adv1',
                'title' => 'Advertising on Top popup window',
                'fields' => $fields_top,
                'location' => array (
                    array (
                        array (
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'theme-adv-settings',
                        ),
                    ),
                ),
            )
        );
        $fields_bottom = array(
            array (
                'key' => 'field_adv4',
                'label' => 'Advertising title',
                'name' => 'adv_title',
                'type' => 'text',
                'prefix' => '',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'please write advertise title here',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            ),
            array (
                'key' => 'field_adv5',
                'label' => 'Advertising content',
                'name' => 'adv_content',
                'type' => 'wysiwyg',
                'prefix' => '',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'please write advertise content here',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            ),
            array (
                'key' => 'field_adv6',
                'label' => 'Button link',
                'name' => 'adv_link_url',
                'type' => 'page_link',
                'prefix' => '',
                'instructions' => 'if you want to add button, write the url here or choose page in dropdown list',
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
            ),
            array (
                'key' => 'field_adv7',
                'label' => 'Button text',
                'name' => 'adv_link_text',
                'type' => 'text',
                'prefix' => '',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placeholder' => 'add your text to button',
                'default_value' => 'View Courses',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            ),
            array (
                'key' => 'field_adv8',
                'label' => 'Background image for bottom advertise block',
                'name' => 'adv_bg_image',
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
                'preview_size' => 'full',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        );
        acf_add_local_field_group(
            array(
                'key' => 'group_adv2',
                'title' => 'Advertising on Bottom part of page',
                'fields' => $fields_bottom,
                'location' => array (
                    array (
                        array (
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'theme-adv-settings',
                        ),
                    ),
                ),
            )
        );
    endif;
}