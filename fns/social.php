<?php
function crystalbeauty_customize_social_links($wp_customize)
{
    // Social Media Section
    $wp_customize->add_section('social_links_section', array(
        'title'    => __('Social Media Links', 'crystal-beauty'),
        'priority' => 40,
    ));

    // Define Social Media Platforms
    $social_platforms = array(
        'twitter'    => __('Twitter', 'crystal-beauty'),
        'linkedin'   => __('LinkedIn', 'crystal-beauty'),
        'facebook'   => __('Facebook', 'crystal-beauty'),
        'skype'      => __('Skype', 'crystal-beauty'),
        'pinterest'  => __('Pinterest', 'crystal-beauty'),
    );

    // Loop through platforms to add fields
    foreach ($social_platforms as $key => $label) {
        $wp_customize->add_setting("social_$key", array(
            'default'   => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control("social_$key", array(
            'label'    => sprintf(__('Enter %s URL', 'crystal-beauty'), $label),
            'section'  => 'social_links_section',
            'type'     => 'url',
        ));
    }
}

add_action('customize_register', 'crystalbeauty_customize_social_links');
