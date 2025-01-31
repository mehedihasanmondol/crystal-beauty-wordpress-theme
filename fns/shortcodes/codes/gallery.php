<?php

add_shortcode('gallery', function ($atts) {
    add_action('wp_footer', function () {
        wp_enqueue_style('fancybox');
        wp_enqueue_style('isotope');

        wp_enqueue_script('isotope');
        wp_enqueue_script('fancybox');
        wp_enqueue_script('isotop-trigger');
        wp_enqueue_script('lazyload');
    });

    $atts = shortcode_atts(
        array(
            'main-heading'    => esc_html(get_theme_mod('gallery_section_heading', 'Explore')),
            'sub-heading'    => esc_html(get_theme_mod('gallery_section_subheading', 'Our gallery')),
            'heading-visibility' => 1
        ),
        $atts,
        'gallery'
    );

    // Pass attributes to the template
    set_query_var('gallery_atts', $atts);

    ob_start();
    get_template_part('template-parts/home/gallery');
    return ob_get_clean();
});
