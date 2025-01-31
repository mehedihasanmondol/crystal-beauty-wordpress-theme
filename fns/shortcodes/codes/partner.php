<?php


add_shortcode('partner', function () {

    add_action('wp_footer', function () {
        wp_enqueue_style('owl_carousel');

        wp_enqueue_script('owl_carousel');
        wp_enqueue_script('lazyload');
        wp_enqueue_script('custom');
    });

    ob_start();
    get_template_part('template-parts/home/partner');
    return ob_get_clean();
});
