<?php
function crystalbeauty_customize_footer_settings($wp_customize)
{
    // Footer Section
    $wp_customize->add_section('footer_section', array(
        'title'    => __('Footer Settings', 'crystal-beauty'),
        'priority' => 50,
    ));

    // Footer Text 1
    $wp_customize->add_setting('footer_text_1', array(
        'default'   => 'Default Footer Text 1',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_text_1', array(
        'label'    => __('Footer Text 1', 'crystal-beauty'),
        'section'  => 'footer_section',
        'type'     => 'text',
    ));

    // Footer Text 2
    $wp_customize->add_setting('footer_text_2', array(
        'default'   => 'Default Footer Text 2',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_text_2', array(
        'label'    => __('Footer Text 2', 'crystal-beauty'),
        'section'  => 'footer_section',
        'type'     => 'text',
    ));

    // Useful Links Heading
    $wp_customize->add_setting('useful_links_heading', array(
        'default'   => 'Useful Links',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('useful_links_heading', array(
        'label'    => __('Useful Links Heading', 'crystal-beauty'),
        'section'  => 'footer_section',
        'type'     => 'text',
    ));

    // Newsletter Heading
    $wp_customize->add_setting('newsletter_heading', array(
        'default'   => 'Subscribe to our Newsletter',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('newsletter_heading', array(
        'label'    => __('Newsletter Heading', 'crystal-beauty'),
        'section'  => 'footer_section',
        'type'     => 'text',
    ));

    // Newsletter Text
    $wp_customize->add_setting('newsletter_text', array(
        'default'   => 'Get the latest updates and offers.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('newsletter_text', array(
        'label'    => __('Newsletter Text', 'crystal-beauty'),
        'section'  => 'footer_section',
        'type'     => 'textarea',
    ));

    //copyright
    // $wp_customize->add_setting('copyright', array(
    //     'default'   => '&copy; 2023 Crystal Beauty. All rights reserved.',
    //     'sanitize_callback' => 'wp_kses_post_input',
    // ));
    // $wp_customize->add_control('copyright', array(
    //     'label'    => __('Copyright', 'crystal-beauty'),
    //     'section'  => 'footer_section',
    //     'type'     => 'text',
    // ));
}

add_action('customize_register', 'crystalbeauty_customize_footer_settings');
