<?php
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('owl_caresol', get_template_directory_uri() . '/plugins/owl-carousel/owl.carousel.min.css');

    wp_enqueue_script('owlcaresol', get_template_directory_uri() . '/plugins/owl-carousel/owl.carousel.min.js');
    wp_enqueue_script('lazyload', get_template_directory_uri() . '/plugins/lazyestload/lazyestload.js');
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js');
});

add_shortcode('partner', function () {
    ob_start();
    get_template_part('template-parts/home/partner');
    return ob_get_clean();
});
