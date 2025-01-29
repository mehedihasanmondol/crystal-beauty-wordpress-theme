<?php
function theme_testimonial_heading_register($wp_customize)
{
    // Add a Section in Customizer
    $wp_customize->add_section('testimonial_section', array(
        'title'    => __('Testimonials headings', 'crystal-beauty'),
        'priority' => 30,
    ));

    // Setting for Main Title
    $wp_customize->add_setting('testimonial_main_title', array(
        'default'   => 'Testimonials',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonial_main_title', array(
        'label'   => __('Main Title', 'crystal-beauty'),
        'section' => 'testimonial_section',
        'type'    => 'text',
    ));

    // Setting for Subtitle
    $wp_customize->add_setting('testimonial_subtitle', array(
        'default'   => 'Customer testimonials',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonial_subtitle', array(
        'label'   => __('Subtitle', 'crystal-beauty'),
        'section' => 'testimonial_section',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'theme_testimonial_heading_register');



function custom_post_type_testimonials()
{
    $labels = array(
        'name'                  => __('Testimonials', 'crystal-beauty'),
        'singular_name'         => __('Testimonial', 'crystal-beauty'),
        'menu_name'             => __('Testimonials', 'crystal-beauty'),
        'name_admin_bar'        => __('Testimonial', 'crystal-beauty'),
        'archives'              => __('Testimonial Archives', 'crystal-beauty'),
        'attributes'            => __('Testimonial Attributes', 'crystal-beauty'),
        'parent_item_colon'     => __('Parent Testimonial:', 'crystal-beauty'),
        'all_items'             => __('All Testimonials', 'crystal-beauty'),
        'add_new_item'          => __('Add New Testimonial', 'crystal-beauty'),
        'add_new'               => __('Add New', 'crystal-beauty'),
        'new_item'              => __('New Testimonial', 'crystal-beauty'),
        'edit_item'             => __('Edit Testimonial', 'crystal-beauty'),
        'update_item'           => __('Update Testimonial', 'crystal-beauty'),
        'view_item'             => __('View Testimonial', 'crystal-beauty'),
        'view_items'            => __('View Testimonials', 'crystal-beauty'),
        'search_items'          => __('Search Testimonial', 'crystal-beauty'),
        'not_found'             => __('No testimonials found', 'crystal-beauty'),
        'not_found_in_trash'    => __('No testimonials found in Trash', 'crystal-beauty'),

    );

    $args = array(
        'label'               => __('Testimonials', 'crystal-beauty'),
        'description'         => __('Customer testimonials and testimonial', 'crystal-beauty'),
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'testimonials'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_icon'           => 'dashicons-star-filled', // Star icon in admin menu
        'supports'            => array('title', 'editor', 'excerpt', 'thumbnail'),
        'show_in_rest'        => true, // Enables Gutenberg support
    );

    register_post_type('testimonial', $args);
}
add_action('init', 'custom_post_type_testimonials');
