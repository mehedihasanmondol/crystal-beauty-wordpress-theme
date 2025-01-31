<?php

add_shortcode('simple-products', function ($atts) {
    add_action('wp_footer', function () {
        wp_enqueue_style('owl_carousel');

        wp_enqueue_script('owl_carousel');
        wp_enqueue_script('lazyload');

        wp_enqueue_script('custom');
    });

    $atts = shortcode_atts(
        array(
            'main-heading'    => esc_html(get_theme_mod('product_section_heading', 'Natural')),
            'sub-heading'    => esc_html(get_theme_mod('product_section_subheading', 'Our Products')),
            'heading-visibility' => 1
        ),
        $atts,
        'simple-products'
    );

    // Pass attributes to the template
    set_query_var('simple_products_atts', $atts);

    ob_start();
    get_template_part('template-parts/home/products');
    return ob_get_clean();
});
