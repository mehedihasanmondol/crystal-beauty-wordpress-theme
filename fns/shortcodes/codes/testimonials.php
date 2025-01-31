<?php

add_shortcode('testimonials', function ($atts) {


    $atts = shortcode_atts(
        array(
            'main-heading'    => esc_html(get_theme_mod('testimonial_main_title', 'Testimonials')),
            'sub-heading'    => esc_html(get_theme_mod('testimonial_subtitle', 'Customer reviews')),
            'heading-visibility' => 1
        ),
        $atts,
        'testimonials'
    );

    // Pass attributes to the template
    set_query_var('testimonials_atts', $atts);


    ob_start();



    get_template_part('template-parts/home/review');
    return ob_get_clean();
});
