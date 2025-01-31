<?php

add_shortcode('about-section', function () {
    add_action('wp_footer', function () {
        wp_enqueue_script('lazyload',);
    });


    ob_start();
    get_template_part('template-parts/home/about');
    return ob_get_clean();
});
