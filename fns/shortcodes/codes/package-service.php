<?php

add_shortcode('package-service', function ($atts) {

    $atts = shortcode_atts(
        array(
            'main-heading'    => esc_html(get_theme_mod('package_service_section_heading', 'Amazing')),
            'sub-heading'    => esc_html(get_theme_mod('package_service_section_sub_heading', 'Services Pricing')),
            'heading-visibility' => 1
        ),
        $atts,
        'package-service'
    );

    // Pass attributes to the template
    set_query_var('package_service_atts', $atts);


    add_action('wp_footer', function () {
        wp_enqueue_script('masonry');
    });

    ob_start();



    get_template_part('template-parts/home/pricing');
    return ob_get_clean();
});
