<?php

add_shortcode('offer', function () {

    add_action('wp_footer', function () {
        wp_enqueue_script('lazyload');
        wp_enqueue_script('custom');
    });

    ob_start();
    get_template_part('template-parts/home/offer');
    return ob_get_clean();
});
