<?php

// Shortcode function
add_shortcode('slider', function () {
    add_action('wp_footer', function () {
        wp_enqueue_style('owl_carousel');

        wp_enqueue_script('owl_carousel');
        wp_enqueue_script('lazyload');
        wp_enqueue_script('custom');
        // Localize script to provide AJAX URL
        wp_localize_script('custom', 'ajaxurl', array(
            'contact_mail' => admin_url('admin-ajax.php'),
            'appointment_mail' => admin_url('admin-ajax.php')
        ));
    });

    ob_start();
    get_template_part('template-parts/home/slider');
    return ob_get_clean();
});
