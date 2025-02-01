<?php

function crystalbeauty_customize_offer_section($wp_customize)
{
    // Offer Section
    $wp_customize->add_section('offer_section', array(
        'title'    => __('Offer Section', 'crystal-beauty'),
        'priority' => 45,
        'panel'    => get_customizer_homepage_panel_key(), // Adds to the Homepage Settings panel
    ));

    // On/Off Switch for Offer Section
    $wp_customize->add_setting('offer_section_visibility', array(
        'default'           => '1', // 1 = ON by default
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('offer_section_visibility', array(
        'label'    => __('Show Offer Section', 'crystal-beauty'),
        'section'  => 'offer_section',
        'type'     => 'checkbox', // Checkbox acts as an on/off switch
    ));
}

add_action('customize_register', 'crystalbeauty_customize_offer_section');
