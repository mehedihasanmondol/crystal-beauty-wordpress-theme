<?php

function crystalbeauty_customize_contact_section($wp_customize)
{
    // Contact Section
    $wp_customize->add_section('contact_section', array(
        'title'    => __('Contact us Section', 'crystal-beauty'),
        'priority' => 40,
    ));

    // On/Off Switch for Get in Touch Heading
    $wp_customize->add_setting('contact_section_visibility', array(
        'default'           => '1', // 1 = ON by default
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('contact_section_visibility', array(
        'label'    => __('Show Contact us', 'crystal-beauty'),
        'section'  => 'contact_section',
        'type'     => 'checkbox', // Checkbox acts as an on/off switch
    ));

    // Get in Touch Section Heading
    $wp_customize->add_setting('contact_section_heading', array(
        'default'           => 'Get in Touch',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_section_heading', array(
        'label'    => __('Contact us Heading', 'crystal-beauty'),
        'section'  => 'contact_section',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'crystalbeauty_customize_contact_section');
