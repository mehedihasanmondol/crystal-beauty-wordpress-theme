<?php
// Exit if WooCommerce is not active
if (!class_exists('WooCommerce')) {
    return;
}


function crystalbeauty_customize_service_section($wp_customize)
{
    // Service Section
    $wp_customize->add_section('service_section', array(
        'title'    => __('Service Section', 'crystal-beauty'),
        'priority' => 35,
    ));

    // On/Off Switch for Service Heading
    $wp_customize->add_setting('service_section_visibility', array(
        'default'           => '1', // 1 = ON by default
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('service_section_visibility', array(
        'label'    => __('Show Service Section', 'crystal-beauty'),
        'section'  => 'service_section',
        'type'     => 'checkbox', // Checkbox acts as an on/off switch
    ));




    // Service Section Heading
    $wp_customize->add_setting('service_section_heading', array(
        'default'           => 'Discover',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('service_section_heading', array(
        'label'    => __('Service Heading', 'crystal-beauty'),
        'section'  => 'service_section',
        'type'     => 'text',
    ));

    // Service Section sub Heading
    $wp_customize->add_setting('service_section_sub_heading', array(
        'default'           => 'variety of spa',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('service_section_sub_heading', array(
        'label'    => __('Service sub heading', 'crystal-beauty'),
        'section'  => 'service_section',
        'type'     => 'text',
    ));

    // On/Off Switch for appointment button
    $wp_customize->add_setting('service_section_apointment_button', array(
        'default'           => '1', // 1 = ON by default
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('service_section_apointment_button', array(
        'label'    => __('Show Appointment button', 'crystal-beauty'),
        'section'  => 'service_section',
        'type'     => 'checkbox', // Checkbox acts as an on/off switch
    ));
}

add_action('customize_register', 'crystalbeauty_customize_service_section');


add_filter('product_type_selector', function ($types) {
    $types['service'] = __('Service', 'crystal-beauty');
    return $types;
});
class WC_Product_Service extends WC_Product
{
    public function __construct($product)
    {
        $this->product_type = 'service';
        parent::__construct($product);
    }
}
add_filter('woocommerce_product_class', function ($classname, $product_type) {
    if ($product_type === 'service') {
        return 'WC_Product_Service';
    }
    return $classname;
}, 10, 2);
add_action('woocommerce_product_data_tabs', function ($tabs) {
    $tabs['general']['class'][] = 'show_if_service';
    $tabs['general']['class'][] = 'show_if_simple';
    return $tabs;
});
add_action('woocommerce_product_data_panels', function () {
    echo '<script>
        jQuery(document).ready(function($) {
            $(".show_if_simple").addClass("show_if_service");

            if(!$(".general_options").is(":visible") && $("#product-type").val() == "service"){
                $("#product-type").val("service").trigger("change");
            }

        });
    </script>';
});


function custom_service_add_to_cart()
{
    global $product;
    if ($product->get_type() === 'service') {
        echo '<a href="' . esc_url($product->get_permalink()) . '" class="button">Book service</a>';
    }
}
// add_action('woocommerce_after_shop_loop_item', 'custom_service_add_to_cart', 10);
