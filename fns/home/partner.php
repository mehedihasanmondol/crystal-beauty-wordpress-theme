<?php
function crystalbeauty_customize_partner_section($wp_customize)
{
    // Partner Section
    $wp_customize->add_section('partner_section', array(
        'title'    => __('Partner Section', 'crystal-beauty'),
        'priority' => 35,
        'panel'    => get_customizer_homepage_panel_key(), // Adds to the Homepage Settings panel
    ));

    // On/Off Switch for Partner Section
    $wp_customize->add_setting('partner_section_visibility', array(
        'default'           => '1', // 1 = ON by default
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('partner_section_visibility', array(
        'label'    => __('Show Partner Section', 'crystal-beauty'),
        'section'  => 'partner_section',
        'type'     => 'checkbox', // Checkbox acts as an on/off switch
    ));

    // Partner Section Heading
    $wp_customize->add_setting('partner_section_heading', array(
        'default'           => 'Our Trusted Partners',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('partner_section_heading', array(
        'label'    => __('Partner Section Heading', 'crystal-beauty'),
        'section'  => 'partner_section',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'crystalbeauty_customize_partner_section');

function crystalbeauty_register_partners()
{
    $labels = array(
        'name'               => __('Partners', 'crystal-beauty'),
        'singular_name'      => __('Partner', 'crystal-beauty'),
        'menu_name'          => __('Partners', 'crystal-beauty'),
        'name_admin_bar'     => __('Partner', 'crystal-beauty'),
        'add_new'            => __('Add New', 'crystal-beauty'),
        'add_new_item'       => __('Add New Partner', 'crystal-beauty'),
        'new_item'           => __('New Partner', 'crystal-beauty'),
        'edit_item'          => __('Edit Partner', 'crystal-beauty'),
        'view_item'          => __('View Partner', 'crystal-beauty'),
        'all_items'          => __('All Partners', 'crystal-beauty'),
        'search_items'       => __('Search Partners', 'crystal-beauty'),
        'not_found'          => __('No partners found.', 'crystal-beauty'),
        'not_found_in_trash' => __('No partners found in Trash.', 'crystal-beauty'),
    );

    register_post_type('partners', array(
        'labels'      => $labels,
        'public'      => true,
        'has_archive' => false,
        'supports'    => array('title', 'thumbnail', 'editor'),
        'menu_icon'   => 'dashicons-images-alt2',
    ));
}
add_action('init', 'crystalbeauty_register_partners');
