<?php
function crystalbeauty_enqueue_scripts()
{
    wp_enqueue_style('google_font', 'https://fonts.googleapis.com/css2?family=Herr+Von+Muellerhoff&family=Montserrat:wght@400;700&family=Open+Sans:wght@300;400;600;700&display=swap');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/plugins/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/plugins/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/plugins/animate/animate.css');
    wp_enqueue_style('default_css', get_template_directory_uri() . '/css/default.css');
    wp_enqueue_style('theme_style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('style', get_stylesheet_uri());



    wp_enqueue_script('jquery-custom', get_template_directory_uri() . '/plugins/jquery/jquery.min.js');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/plugins/bootstrap/js/bootstrap.bundle.min.js');
}
add_action('wp_enqueue_scripts', 'crystalbeauty_enqueue_scripts');
