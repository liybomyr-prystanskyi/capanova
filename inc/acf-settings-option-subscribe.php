<?php
/**
 * Description: this file contains ACF fields settings for Subscribe form
 */
add_action('acf/init', 'register_acf_fields_subscribe_settings');
function register_acf_fields_subscribe_settings() {
    if( function_exists('acf_add_local_field_group') ):
        $field_subscibe = array(
            array (
                'key' => 'field_subscribe1',
                'label' => 'Form text',
                'name' => 'text',
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
                'placeholder' => __('add some more text here', 'capanova'),
                'default_value' => __('...', 'capanova'),
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            ),
            array (
                'key' => 'field_subscribe2',
                'label' => 'Form iframe',
                'name' => 'agree',
                'type' => 'textarea',
                'prefix' => '',
                'instructions' => '',
                'placeholder' => __('add text here', 'capanova'),
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => __('...', 'capanova'),
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            )
        );
        acf_add_local_field_group(array(
            'key' => 'group_subscr',
            'title' => 'Subscribe form settings',
            'fields' => $field_subscibe,
            'location' => array (
                array (
                    array (
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'theme-subscribe-settings',
                    ),
                ),
            ),
        ));
    endif;
}