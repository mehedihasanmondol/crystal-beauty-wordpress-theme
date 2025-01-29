<?php

function crystal_call_to_action_register($wp_customize)
{
    // Add a Section in Customizer
    $wp_customize->add_section('cta_section', array(
        'title'    => __('Call to Action', 'crystal-beauty'),
        'priority' => 30,
    ));

    // Setting for CTA Text
    $wp_customize->add_setting('cta_text', array(
        'default'           => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum sed ut perspiciatis.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('cta_text', array(
        'label'   => __('CTA Description', 'crystal-beauty'),
        'section' => 'cta_section',
        'type'    => 'textarea',
    ));

    // Setting for CTA Button Text
    $wp_customize->add_setting('cta_button_text', array(
        'default'           => 'View Packages',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_button_text', array(
        'label'   => __('Button Text', 'crystal-beauty'),
        'section' => 'cta_section',
        'type'    => 'text',
    ));

    // Setting for CTA Button URL
    $wp_customize->add_setting('cta_button_url', array(
        'default'           => 'pricing.html',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('cta_button_url', array(
        'label'   => __('Button Link', 'crystal-beauty'),
        'section' => 'cta_section',
        'type'    => 'url',
    ));
}
add_action('customize_register', 'crystal_call_to_action_register');
