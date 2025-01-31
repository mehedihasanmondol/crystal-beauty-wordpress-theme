<?php
function crystalbeauty_register_gallery_post_type()
{
    $labels = array(
        'name'               => __('Gallery', 'crystal-beauty'),
        'singular_name'      => __('Gallery Item', 'crystal-beauty'),
        'menu_name'          => __('Gallery', 'crystal-beauty'),
        'add_new'            => __('Add New', 'crystal-beauty'),
        'add_new_item'       => __('Add New Gallery Item', 'crystal-beauty'),
        'edit_item'          => __('Edit Gallery Item', 'crystal-beauty'),
        'new_item'           => __('New Gallery Item', 'crystal-beauty'),
        'view_item'          => __('View Gallery Item', 'crystal-beauty'),
        'search_items'       => __('Search Gallery', 'crystal-beauty'),
        'not_found'          => __('No gallery items found', 'crystal-beauty'),
        'not_found_in_trash' => __('No gallery items found in trash', 'crystal-beauty'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-format-gallery',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'rewrite'            => array('slug' => 'gallery'),
    );

    register_post_type('gallery', $args);
}
add_action('init', 'crystalbeauty_register_gallery_post_type');
function crystalbeauty_register_gallery_taxonomy()
{
    register_taxonomy('gallery_category', 'gallery', array(
        'label'        => __('Gallery Categories', 'crystal-beauty'),
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite'      => array('slug' => 'gallery-category'),
    ));
}
add_action('init', 'crystalbeauty_register_gallery_taxonomy');

function crystalbeauty_customize_gallery_section($wp_customize)
{
    // Gallery Section
    $wp_customize->add_section('gallery_section', array(
        'title'    => __('Gallery Section', 'crystal-beauty'),
        'priority' => 40,
    ));

    // On/Off Switch for gallery Section
    $wp_customize->add_setting('gallery_section_visibility', array(
        'default'           => '1', // 1 = ON by default
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('gallery_section_visibility', array(
        'label'    => __('Show Gallery Section', 'crystal-beauty'),
        'section'  => 'gallery_section',
        'type'     => 'checkbox', // Checkbox acts as an on/off switch
    ));

    // Gallery Heading
    $wp_customize->add_setting('gallery_section_heading', array(
        'default'           => 'Explore',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('gallery_section_heading', array(
        'label'    => __('Gallery Section Heading', 'crystal-beauty'),
        'section'  => 'gallery_section',
        'type'     => 'text',
    ));

    // Gallery Subheading
    $wp_customize->add_setting('gallery_section_subheading', array(
        'default'           => 'Our gallery',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('gallery_section_subheading', array(
        'label'    => __('Gallery Section Subheading', 'crystal-beauty'),
        'section'  => 'gallery_section',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'crystalbeauty_customize_gallery_section');
