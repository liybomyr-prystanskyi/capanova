<?php
/**
 * Description: this file contain ACF extra fields settings for Beste Rohstoffe
 */
add_action('acf/init', 'register_acf_fields_beste_rohstoffe_settings');
function register_acf_fields_beste_rohstoffe_settings() {
    if( function_exists('acf_add_local_field_group') ):
        $fields_beste_rohstoffe = array(
            array (
                'key' => 'field_teasers',
                'label' => 'Teasers',
                'name' => 'teasers_array',
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
                'max' => '',
                'layout' => 'table',
                'button_label' => 'Add an element of banner',
                'sub_fields' => array (
                    array (
                        'key' => 'field_teaser1',
                        'label' => 'Image',
                        'name' => 'advantage_thumbnail',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
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
                        'key' => 'field_teaser2',
                        'label' => 'Title',
                        'name' => 'advantage_content',
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
            'key' => 'group__p',
            'title' => 'Beste Rohstoffe Settings',
            'fields' => $fields_beste_rohstoffe,
            'location' => array (
                array (
                    array (
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-beste-rohstoffe.php',
                    ),
                ),
            ),
        ));
    endif;
}