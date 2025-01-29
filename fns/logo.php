<?php

function crystalbeauty_logo_register($wp_customize)
{
    // Logo Setting
    $wp_customize->add_setting('site_logo', array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'site_logo', array(
        'label'    => __('Logo', 'crystal-beauty'),
        'section'  => 'title_tagline',
        'settings' => 'site_logo',
    )));
}

add_action('customize_register', 'crystalbeauty_logo_register');
