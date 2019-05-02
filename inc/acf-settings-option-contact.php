<?php
/**
 * Description: this file contains ACF fields settings for Contact Options Page
 * Group name: 'group_contacts'
 * Fields:
 *                          group name 'group_contacts'
 *      Social links:       key 'field_contact1',   name 'soc_links'
 *          Link text:      key 'field_contact2',   name 'link_name'
 *          Link URL:       key 'field_contact3',   name 'link_url'
 *          Link icon:      key 'field_contact4',   name 'link_icon'
 *          Link image:     key 'field_contact5',   name 'link_image'
 */
add_action('acf/init', 'register_acf_fields_contacts_settings');
function register_acf_fields_contacts_settings() {
    if( function_exists('acf_add_local_field_group') ):
        // add fields for social share icon
        $fields_soc = array(
            array(
                'key' => 'field_contact1',
                'label' => 'Social links',
                'name' => 'soc_links',
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
                'button_label' => 'Add Social link',
                'sub_fields' => array (
                    array (
                        'key' => 'field_contact2',
                        'label' => 'Link text',
                        'name' => 'link_name',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                    array (
                        'key' => 'field_contact3',
                        'label' => 'Link URL',
                        'name' => 'link_url',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                    array (
                        'key' => 'field_contact4',
                        'label' => 'Link icon',
                        'name' => 'link_icon',
                        'type' => 'text',
                        'placeholder' => '<i class="fa fa-custom"></i>',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                    array (
                        'key' => 'field_contact5',
                        'label' => 'Link image (for products)',
                        'name' => 'link_image',
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
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                ),
            )
        );
        acf_add_local_field_group(array(
            'key' => 'group_contacts',
            'title' => 'Social links',
            'fields' => $fields_soc,
            'location' => array (
                array (
                    array (
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'theme-contact-settings',
                    ),
                ),
            ),
        ));

        $fields_contact_info = array(
            array(
                'key' => 'field_cont21',
                'label' => '',
                'name' => 'array_cont_info',
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
                'button_label' => 'Add Contact info',
                'sub_fields' => array (
                    array (
                        'key' => 'field_cont211',
                        'label' => 'Title',
                        'name' => 'cont_title',
                        'type' => 'text',
                        'placeholder' => 'Please add column title',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                    array(
                        'key' => 'field_cont212',
                        'label' => 'Content',
                        'name' => 'cont_content',
                        'type' => 'flexible_content',
                        'instructions' => "You can choose information type for best results",
                        'layouts' => array(
                            array (
                                'label' => 'Email',
                                'name' => 'grid_email',
                                'display' => 'table',
                                'min' => '',
                                'max' => '',
                                'sub_fields' => array(
                                    array (
                                        'key' => 'field_cont21211',
                                        'label' => 'Business email',
                                        'name' => 'url_email',
                                        'type' => 'email',
                                        'prepend' => '',
                                        'append' => '',
                                        'placeholder' => 'please add email address here',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array (
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                    ),
                                    array (
                                        'key' => 'field_cont21212',
                                        'label' => 'Link text (by default displaying email url)',
                                        'name' => 'url_text',
                                        'type' => 'text',
                                        'prepend' => '',
                                        'append' => '',
                                        'placeholder' => 'please add link text here',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array (
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                    ),
                                )
                            ),
                            array (
                                'label' => 'Physical address',
                                'name' => 'grid_addr',
                                'display' => 'row',
                                'min' => '',
                                'max' => '',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_cert2122',
                                        'label' => 'Paste your addresses here',
                                        'name' => 'addr',
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
                                        'placeholder' => 'please write addresses here',
                                        'prepend' => '',
                                        'append' => '',
                                        'maxlength' => '',
                                        'readonly' => 0,
                                        'disabled' => 0,
                                    ),
                                )
                            ),
                            array (
                                'label' => 'Custom contact info type',
                                'name' => 'grid_custom',
                                'display' => 'row',
                                'min' => '',
                                'max' => '',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_cert21231',
                                        'label' => 'Paste your text here',
                                        'name' => 'custom_content',
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
                                        'placeholder' => 'please write contact text here',
                                        'prepend' => '',
                                        'append' => '',
                                        'maxlength' => '',
                                        'readonly' => 0,
                                        'disabled' => 0,
                                    ),
                                    array (
                                        'key' => 'field_cont21232',
                                        'label' => 'link URL',
                                        'name' => 'url_link',
                                        'type' => 'email',
                                        'prepend' => '',
                                        'append' => '',
                                        'placeholder' => 'please add link url here',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array (
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                    ),
                                    array (
                                        'key' => 'field_cont21233',
                                        'label' => 'Link text (by default displaying link url)',
                                        'name' => 'url_text',
                                        'type' => 'text',
                                        'prepend' => '',
                                        'append' => '',
                                        'placeholder' => 'please add link text here',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array (
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_cont213',
                        'label' => "Custom Icon",
                        'name' => 'cont_icon',
                        'type' => 'image',
                        'instructions' => "Add image here if you don't want to use theme icons",
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                )
            )
        );
        acf_add_local_field_group(array(
            'key' => 'group_contacts1',
            'title' => 'Main Contact Info:',
            'fields' => $fields_contact_info,
            'location' => array (
                array (
                    array (
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'theme-contact-settings',
                    ),
                ),
            ),
        ));

        $fields_page_contact = array(
            array(
                'key' => 'field_cont31',
                'label' => '',
                'name' => 'array_cont_info',
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
                'button_label' => 'Add Contact info',
                'sub_fields' => array (
                    array (
                        'key' => 'field_cont311',
                        'label' => 'Title',
                        'name' => 'cont_title',
                        'type' => 'text',
                        'placeholder' => 'Please add column title',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                    array(
                        'key' => 'field_cert312',
                        'label' => 'Content',
                        'name' => 'cont_content',
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
                        'placeholder' => 'please write contact text here',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array(
                        'key' => 'field_cont313',
                        'label' => 'Add button',
                        'name' => 'cont_btn',
                        'type' => 'flexible_content',
                        'instructions' => "You can choose button type for best results",
                        'layouts' => array(
                            array (
                                'label' => 'Email',
                                'name' => 'grid_email',
                                'display' => 'table',
                                'min' => '',
                                'max' => '',
                                'sub_fields' => array(
                                    array (
                                        'key' => 'field_cont31311',
                                        'label' => 'Email address',
                                        'name' => 'email_url',
                                        'type' => 'email',
                                        'prepend' => '',
                                        'append' => '',
                                        'placeholder' => 'please add email address here',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array (
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                    ),
                                    array (
                                        'key' => 'field_cont31312',
                                        'label' => 'Button text',
                                        'name' => 'btn_text',
                                        'type' => 'text',
                                        'prepend' => '',
                                        'append' => '',
                                        'placeholder' => 'please add button text here',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array (
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                    ),
                                )
                            ),
                            array (
                                'label' => 'Page link',
                                'name' => 'grid_page_link',
                                'display' => 'row',
                                'min' => '',
                                'max' => '',
                                'sub_fields' => array(
                                    array (
                                        'key' => 'field_cont31321',
                                        'label' => 'Choose page',
                                        'name' => 'page',
                                        'type' => 'post_object',
                                        'post_type' => '',
                                        'return_format' => 'id',
                                        'prefix' => '',
                                        'instructions' => 'choose page in dropdown list',
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
                                        'key' => 'field_cont31322',
                                        'label' => 'Button text',
                                        'name' => 'btn_text',
                                        'type' => 'text',
                                        'prepend' => '',
                                        'append' => '',
                                        'placeholder' => 'please add button text here',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array (
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                    ),
                                )
                            ),
                            array (
                                'label' => 'Extra link',
                                'name' => 'grid_ext_link',
                                'display' => 'row',
                                'min' => '',
                                'max' => '',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_cont31331',
                                        'label' => 'Add url',
                                        'name' => 'link_url',
                                        'type' => 'url',
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
                                    array (
                                        'key' => 'field_cont31332',
                                        'label' => 'Button text',
                                        'name' => 'btn_text',
                                        'type' => 'text',
                                        'prepend' => '',
                                        'append' => '',
                                        'placeholder' => 'please add button text here',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array (
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        );
        acf_add_local_field_group(array(
            'key' => 'group_contacts2',
            'title' => 'Contact columns:',
            'fields' => $fields_page_contact,
            'location' => array (
                array (
                    array (
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-contact.php',
                    ),
                ),
            ),
        ));
    endif;
}