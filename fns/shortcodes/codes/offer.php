<?php

add_shortcode('offer', function () {

    add_action('wp_enqueue_scripts', function () {
        wp_enqueue_script('lazyload', get_template_directory_uri() . '/plugins/lazyestload/lazyestload.js');
        wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js');
    });

    ob_start();
    get_template_part('template-parts/home/offer');
    return ob_get_clean();
});
