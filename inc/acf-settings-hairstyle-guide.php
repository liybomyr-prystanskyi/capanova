<?php
/**
 * Description: this file contain ACF extra fields settings for Beste Rohstoffe
 */
add_action('acf/init', 'register_acf_fields_hairstyle_guide_settings');
function register_acf_fields_hairstyle_guide_settings()
{
    if (function_exists('acf_add_local_field_group')):
        $fields_hairstyle_guide = array(
            array(
                'key' => 'field_hairstyle_guide',
                'label' => 'Image',
                'name' => 'hairstyle_guide_thumbnail',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
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
                'key' => 'field_hairstyle_guide_2',
                'label' => 'Description',
                'name' => 'hairstyle_guide_content',
                'type' => 'wysiwyg',
                'prefix' => '',
                'instructions' => '',
                'placeholder' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
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

        );
        acf_add_local_field_group(array(
            'key' => 'group_hairstyle_guide',
            'title' => 'Full width banner',
            'fields' => $fields_hairstyle_guide,
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                ),
            ),
        ));
    endif;
}