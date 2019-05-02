<?php
/**
 * Description: this file contains ACF fields settings for Product pages
 */

add_action('init', function () {
    register_taxonomy('product_tag', 'product', [
        'public' => false,
        'show_ui' => false,
        'show_admin_column' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    ]);
}, 100);

add_action('admin_init', function () {
    add_filter('manage_product_posts_columns', function ($columns) {
        unset($columns['product_tag']);
        return $columns;
    }, 100);
});

add_action('acf/init', 'register_acf_fields_product_settings');
function register_acf_fields_product_settings()
{
    if (function_exists('acf_add_local_field_group')):
        $fields_product_detail = array(
            array(
                array(
                    'key' => 'field_anwendung',
                    'label' => 'Anwendung',
                    'name' => 'field_anwendung',
                    'type' => 'wysiwyg',
                    'prefix' => '',
                    'instructions' => "In this area you can add anwendung",
                    'placeholder' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'default_value' => '',
                    'readonly' => 0,
                    'disabled' => 0,
                ),
                array(
                    'key' => 'field_das_spricht',
                    'label' => 'Das spricht',
                    'name' => 'field_das_spricht',
                    'type' => 'wysiwyg',
                    'prefix' => '',
                    'instructions' => "In this area you can add das spricht",
                    'placeholder' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'default_value' => '',
                    'readonly' => 0,
                    'disabled' => 0,
                ),
                array(
                    'key' => 'field_inhaltsstoffe',
                    'label' => 'Inhaltsstoffe',
                    'name' => 'field_inhaltsstoffe',
                    'type' => 'wysiwyg',
                    'prefix' => '',
                    'instructions' => "In this area you can add inhaltsstoffe",
                    'placeholder' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'default_value' => '',
                    'readonly' => 0,
                    'disabled' => 0,
                ),
            ),
        );

        $fields_product_img = array(
            array(
                array(
                    'key' => 'field_img_prev',
                    'label' => 'Prev',
                    'name' => 'product_img_prev',
                    'type' => 'image',
                    'prefix' => '',
                    'instructions' => "In this area you can add das spricht",
                    'placeholder' => '',
                    'preview_size' => 'medium',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'default_value' => '',
                    'readonly' => 0,
                    'disabled' => 0,
                ),
                array(
                    'key' => 'field_img_full',
                    'label' => 'Full',
                    'name' => 'product_img_full',
                    'type' => 'image',
                    'prefix' => '',
                    'instructions' => "In this area you can add inhaltsstoffe",
                    'placeholder' => '',
                    'preview_size' => 'medium',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'default_value' => '',
                    'readonly' => 0,
                    'disabled' => 0,
                ),
            ),
        );

        acf_add_local_field_group(
            array(
                'key' => 'group_prod_detail',
                'title' => 'Product Detail',
                'fields' => $fields_product_detail,
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'product',
                        ),
                    ),
                ))
        );

        acf_add_local_field_group(
            array(
                'key' => 'group_prod_img',
                'title' => 'Product Images',
                'fields' => $fields_product_img,
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'product',
                        ),
                    ),
                ),
                'position' => 'side',
            ));
    endif;
}