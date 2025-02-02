<?php

function theme_customize_register($wp_customize)
{


    $wp_customize->add_section('about_section', array(
        'title' => __('About Section', 'crystal-beauty'),
        'priority' => 30,
        'panel'    => get_customizer_homepage_panel_key(), // Adds to the Homepage Settings panel
    ));

    // On/Off Switch for About Section
    $wp_customize->add_setting('about_section_visibility', array(
        'default'           => '1', // 1 = ON by default
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('about_section_visibility', array(
        'label'    => __('Show About Section', 'crystal-beauty'),
        'section'  => 'about_section',
        'type'     => 'checkbox', // Checkbox acts as an on/off switch
    ));

    $wp_customize->add_setting('about_title', array('default' => 'Angel luxury spa resort'));
    $wp_customize->add_control('about_title', array(
        'label' => __('Title', 'crystal-beauty'),
        'section' => 'about_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_subtitle', array('default' => 'Subtitle here'));
    $wp_customize->add_control('about_subtitle', array(
        'label' => __('Subtitle', 'crystal-beauty'),
        'section' => 'about_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('about_description', array('default' => 'Lorem ipsum text'));
    $wp_customize->add_control('about_description', array(
        'label' => __('Description', 'crystal-beauty'),
        'section' => 'about_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('about_image');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label' => __('Image', 'crystal-beauty'),
        'section' => 'about_section',
        'settings' => 'about_image',
    )));
}
add_action('customize_register', 'theme_customize_register');
