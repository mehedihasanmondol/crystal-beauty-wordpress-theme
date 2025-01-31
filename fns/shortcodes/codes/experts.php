<?php

add_shortcode('experts', function ($atts) {
    add_action('wp_footer', function () {
        wp_enqueue_style('owl_carousel');

        wp_enqueue_script('owl_carousel');
        wp_enqueue_script('lazyload');
        wp_enqueue_script('custom');
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
