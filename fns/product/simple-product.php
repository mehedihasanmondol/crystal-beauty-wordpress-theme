<?php
function crystal_beauty_product_section_customize_register($wp_customize)
{
    // Add Section for Product Section Settings
    $wp_customize->add_section('product_section_settings', array(
        'title'    => __('Product Section', 'crystal-beauty'),
        'priority' => 30,
    ));

    // Add Setting for Toggle Switch (Show/Hide Section)
    $wp_customize->add_setting('product_section_visibility', array(
        'default'   => true,
        'sanitize_callback' => 'absint',
    ));

    // Add Control for Toggle Switch
    $wp_customize->add_control('product_section_visibility', array(
        'label'    => __('Show Product Section', 'crystal-beauty'),
        'section'  => 'product_section_settings',
        'type'     => 'checkbox',
    ));

    // Add Setting for Heading
    $wp_customize->add_setting('product_section_heading', array(
        'default'   => __('Natural', 'crystal-beauty'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add Control for Heading
    $wp_customize->add_control('product_section_heading', array(
        'label'    => __('Section Heading', 'crystal-beauty'),
        'section'  => 'product_section_settings',
        'type'     => 'text',
    ));

    // Add Setting for Subheading
    $wp_customize->add_setting('product_section_subheading', array(
        'default'   => __('Our Products', 'crystal-beauty'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add Control for Subheading
    $wp_customize->add_control('product_section_subheading', array(
        'label'    => __('Section Subheading', 'crystal-beauty'),
        'section'  => 'product_section_settings',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'crystal_beauty_product_section_customize_register');
