<?php
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('lazyload', get_template_directory_uri() . '/plugins/lazyestload/lazyestload.js');
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js');
});

add_shortcode('about-section', function () {
    ob_start();
    get_template_part('template-parts/home/about');
    return ob_get_clean();
});
