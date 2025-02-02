<?php

// Exit if WooCommerce is not active
if (!class_exists('WooCommerce')) {
    return;
}


function crystalbeauty_customize_package_service_section($wp_customize)
{
    // Package_service Section
    $wp_customize->add_section('package_service_section', array(
        'title'    => __('Package service Section', 'crystal-beauty'),
        'priority' => 35,
        'panel'    => get_customizer_homepage_panel_key(), // Adds to the Homepage Settings panel
    ));

    // On/Off Switch for Package_service Heading
    $wp_customize->add_setting('package_service_section_visibility', array(
        'default'           => '1', // 1 = ON by default
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('package_service_section_visibility', array(
        'label'    => __('Show Package service', 'crystal-beauty'),
        'section'  => 'package_service_section',
        'type'     => 'checkbox', // Checkbox acts as an on/off switch
    ));

    // Package_service Section Heading
    $wp_customize->add_setting('package_service_section_heading', array(
        'default'           => 'Amazing',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('package_service_section_heading', array(
        'label'    => __('Package service Heading', 'crystal-beauty'),
        'section'  => 'package_service_section',
        'type'     => 'text',
    ));

    // Package_service Section sub Heading
    $wp_customize->add_setting('package_service_section_sub_heading', array(
        'default'           => 'Services Pricing',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('package_service_section_sub_heading', array(
        'label'    => __('Package service sub heading', 'crystal-beauty'),
        'section'  => 'package_service_section',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'crystalbeauty_customize_package_service_section');


add_filter('product_type_selector', function ($types) {
    $types['package_service'] = __('Package service', 'crystal-beauty');
    return $types;
});
class WC_Product_Package_service extends WC_Product
{
    public function __construct($product)
    {
        $this->product_type = 'package_service';
        parent::__construct($product);
    }
}
add_filter('woocommerce_product_class', function ($classname, $product_type) {
    if ($product_type === 'package_service') {
        return 'WC_Product_Package_service';
    }
    return $classname;
}, 10, 2);
add_action('woocommerce_product_data_tabs', function ($tabs) {
    $tabs['general']['class'][] = 'show_if_package_service';
    $tabs['general']['class'][] = 'show_if_simple';
    return $tabs;
});
add_action('woocommerce_product_data_panels', function () {
    echo '<script>
        jQuery(document).ready(function($) {
            $(".show_if_simple").addClass("show_if_package_service");

            if(!$(".general_options").is(":visible") && $("#product-type").val() == "package_service"){
                $("#product-type").val("package_service").trigger("change");
            }

        });
    </script>';
});


function custom_package_service_add_to_cart()
{
    global $product;
    if ($product->get_type() === 'package_service') {
        echo '<a href="' . esc_url($product->get_permalink()) . '" class="button">Book package service</a>';
    }
}
// add_action('woocommerce_after_shop_loop_item', 'custom_package_service_add_to_cart', 10);


function add_appointment_button_for_package_service()
{
    global $product;


    // Check if the product type is 'service'
    if ($product->get_type() === 'package_service') {
        add_action('wp_footer', function () {
            wp_enqueue_style('selectize');
            wp_enqueue_style('datepicker');


            wp_enqueue_script('selectize');
            wp_enqueue_script('custom');
            wp_enqueue_script('datepicker');
            // Localize script to provide AJAX URL
            wp_localize_script('custom', 'ajaxurl', array(
                'contact_mail' => admin_url('admin-ajax.php'),
                'appointment_mail' => admin_url('admin-ajax.php')
            ));
        });


        echo '<div class="" style="margin-bottom:2em;margin-top:2em">';
        echo '<a data-toggle="modal" href="javascript:void(0)" data-target="#' . get_appointment_modal_id($product->get_id()) . '" class="button book-appointment">' . __('Book an Appointment', 'crystal-beauty') . '</a>';
        echo '</div>';
        generate_appointment_modal($product->get_id(), $product->get_name());
    }
}
add_action('woocommerce_single_product_summary', 'add_appointment_button_for_package_service', 25);
