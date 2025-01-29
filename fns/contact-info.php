<?php


function crystalbeauty_contact_info_register($wp_customize)
{
    // Section for Contact Info
    $wp_customize->add_section('contact_info_section', array(
        'title'    => __('Contact Info', 'crystal-beauty'),
        'priority' => 30,
    ));

    // Email Setting
    $wp_customize->add_setting('contact_email', array(
        'default'   => 'info@yourdomain.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email', array(
        'label'    => __('Email Address', 'crystal-beauty'),
        'section'  => 'contact_info_section',
        'type'     => 'email',
    ));

    // Phone Setting
    $wp_customize->add_setting('contact_phone', array(
        'default'   => '+1 234 567 8900',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_phone', array(
        'label'    => __('Phone Number', 'crystal-beauty'),
        'section'  => 'contact_info_section',
        'type'     => 'text',
    ));

    // Address Setting
    $wp_customize->add_setting('contact_address', array(
        'default'   => '123 Main Street, City, Country',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_address', array(
        'label'    => __('Address', 'crystal-beauty'),
        'section'  => 'contact_info_section',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'crystalbeauty_contact_info_register');
