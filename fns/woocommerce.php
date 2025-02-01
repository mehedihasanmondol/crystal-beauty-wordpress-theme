<?php
function crystalbeauty_add_custom_woocommerce_section($wp_customize)
{
    // Check if WooCommerce is active before adding the section
    if (!class_exists('WooCommerce')) {
        return;
    }

    // Add New Section Inside WooCommerce Panel
    $wp_customize->add_section('woocommerce_cart_settings', array(
        'title'    => __('Cart Settings', 'crystal-beauty'),
        'panel'    => 'woocommerce', // Assigns to WooCommerce's existing panel
        'priority' => 10,
    ));

    // Add Cart Icon Visibility Setting
    $wp_customize->add_setting('woocommerce_cart_icon_visibility', array(
        'default'           => true,
        'sanitize_callback' => 'absint',
    ));

    // Add Control for Cart Icon Visibility
    $wp_customize->add_control('woocommerce_cart_icon_visibility', array(
        'label'    => __('Show Cart Icon', 'crystal-beauty'),
        'section'  => 'woocommerce_cart_settings', // Inside WooCommerce Panel
        'type'     => 'checkbox',
    ));
}

add_action('customize_register', 'crystalbeauty_add_custom_woocommerce_section');
