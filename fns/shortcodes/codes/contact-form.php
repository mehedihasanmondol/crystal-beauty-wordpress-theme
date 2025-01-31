<?php

add_shortcode('contact-form', function () {

    add_action('wp_footer', function () {
        wp_enqueue_style('select_option_1');
        wp_enqueue_style('datepicker');


        wp_enqueue_script('selectbox');
        wp_enqueue_script('datepicker');
        wp_enqueue_script('custom');
        // Localize script to provide AJAX URL
        wp_localize_script('custom', 'ajaxurl', array(
            'contact_mail' => admin_url('admin-ajax.php'),
            'appointment_mail' => admin_url('admin-ajax.php')
        ));
    });


    ob_start();
    get_template_part('template-parts/home/contact-us');
    return ob_get_clean();
});
