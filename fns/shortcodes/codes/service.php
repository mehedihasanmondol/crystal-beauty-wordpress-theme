<?php

add_shortcode('service', function ($atts) {

    add_action('wp_footer', function () {
        wp_enqueue_style('select_option_1');
        wp_enqueue_style('datepicker');


        wp_enqueue_script('selectbox');
        wp_enqueue_script('datepicker');
        wp_enqueue_script('lazyload');
        wp_enqueue_script('custom');
        // Localize script to provide AJAX URL
        wp_localize_script('custom', 'ajaxurl', array(
            'contact_mail' => admin_url('admin-ajax.php'),
            'appointment_mail' => admin_url('admin-ajax.php')
        ));
    });

    $atts = shortcode_atts(
        array(
            'main-heading'    => esc_html(get_theme_mod('service_section_heading', 'Discover')),
            'sub-heading'    => esc_html(get_theme_mod('service_section_sub_heading', 'variety of spa')),
            'heading-visibility' => 1
        ),
        $atts,
        'service'
    );

    // Pass attributes to the template
    set_query_var('service_atts', $atts);


    ob_start();



    get_template_part('template-parts/home/variety');
    return ob_get_clean();
});
