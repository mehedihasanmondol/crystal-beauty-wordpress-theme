<?php

add_shortcode('experts', function ($atts) {
    add_action('wp_enqueue_scripts', function () {
        wp_enqueue_style('owl_caresol', get_template_directory_uri() . '/plugins/owl-carousel/owl.carousel.min.css');

        wp_enqueue_script('owlcaresol', get_template_directory_uri() . '/plugins/owl-carousel/owl.carousel.min.js');
        wp_enqueue_script('lazyload', get_template_directory_uri() . '/plugins/lazyestload/lazyestload.js');
        wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js');
    });

    $atts = shortcode_atts(
        array(
            'main-heading'    => esc_html(get_theme_mod('expert_main_title', 'Meet')),
            'sub-heading'    => esc_html(get_theme_mod('expert_sub_title', 'our experts')),
            'heading-visibility' => 1
        ),
        $atts,
        'experts'
    );

    // Pass attributes to the template
    set_query_var('experts_atts', $atts);

    ob_start();
    get_template_part('template-parts/home/expert');
    return ob_get_clean();
});
