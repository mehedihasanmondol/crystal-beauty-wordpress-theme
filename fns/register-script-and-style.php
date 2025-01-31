<?php

add_action('wp_enqueue_scripts', function () {
    wp_register_style('select_option_1', get_template_directory_uri() . '/plugins/selectbox/select_option1.css');
    wp_register_style('owl_carousel', get_template_directory_uri() . '/plugins/owl-carousel/owl.carousel.min.css');
    wp_register_style('fancybox', get_template_directory_uri() . '/plugins/fancybox/jquery.fancybox.min.css');
    wp_register_style('isotope', get_template_directory_uri() . '/plugins/isotope/isotope.min.css');
    wp_register_style('datepicker', get_template_directory_uri() . '/plugins/datepicker/datepicker.min.css');




    wp_register_script('selectbox', get_template_directory_uri() . '/plugins/selectbox/jquery.selectbox-0.1.3.min.js');
    wp_register_script('owl_carousel', get_template_directory_uri() . '/plugins/owl-carousel/owl.carousel.min.js');
    wp_register_script('isotope', get_template_directory_uri() . '/plugins/isotope/isotope.min.js');
    wp_register_script('fancybox', get_template_directory_uri() . '/plugins/fancybox/jquery.fancybox.min.js');
    wp_register_script('isotop-trigger', get_template_directory_uri() . '/plugins/isotope/isotope-triger.min.js');
    wp_register_script('datepicker', get_template_directory_uri() . '/plugins/datepicker/bootstrap-datepicker.min.js');
    wp_register_script('lazyload', get_template_directory_uri() . '/plugins/lazyestload/lazyestload.js');
    wp_register_script('smooth-scroll', get_template_directory_uri() . '/plugins/smoothscroll/SmoothScroll.js');
    wp_register_script('custom', get_template_directory_uri() . '/js/custom.js');
});
