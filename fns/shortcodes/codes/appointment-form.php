<?php
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('select_option_1', get_template_directory_uri() . '/plugins/selectbox/select_option1.css');
    wp_enqueue_style('datepicker', get_template_directory_uri() . '/plugins/datepicker/datepicker.min.css');


    wp_enqueue_script('selectbox', get_template_directory_uri() . '/plugins/selectbox/jquery.selectbox-0.1.3.min.js');
    wp_enqueue_script('datepicker', get_template_directory_uri() . '/plugins/datepicker/bootstrap-datepicker.min.js');
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js');
    // Localize script to provide AJAX URL
    wp_localize_script('custom', 'ajaxurl', array(
        'contact_mail' => admin_url('admin-ajax.php'),
        'appointment_mail' => admin_url('admin-ajax.php')
    ));
});

add_shortcode('appointment-form', function () {
    ob_start();
    get_template_part('template-parts/appointment');
    return ob_get_clean();
});
