<?php
function crystalbeauty_enqueue_scripts() {
    wp_enqueue_style('google_font','https://fonts.googleapis.com/css2?family=Herr+Von+Muellerhoff&family=Montserrat:wght@400;700&family=Open+Sans:wght@300;400;600;700&display=swap');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/plugins/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/plugins/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/plugins/animate/animate.css');
    wp_enqueue_style('select_option_1', get_template_directory_uri() . '/plugins/selectbox/select_option1.css');
    wp_enqueue_style('owl_caresol', get_template_directory_uri() . '/plugins/owl-carousel/owl.carousel.min.css');
    wp_enqueue_style('fancybox', get_template_directory_uri() . '/plugins/fancybox/jquery.fancybox.min.css');
    wp_enqueue_style('isotop', get_template_directory_uri() . '/plugins/isotope/isotope.min.css');
    wp_enqueue_style('datepicker', get_template_directory_uri() . '/plugins/datepicker/datepicker.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('default_css', get_template_directory_uri() . '/css/default.css');


    wp_enqueue_script('jquery-custom', get_template_directory_uri() . '/plugins/jquery/jquery.min.js');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/plugins/bootstrap/js/bootstrap.bundle.min.js');
    wp_enqueue_script('selectbox', get_template_directory_uri() . '/plugins/selectbox/jquery.selectbox-0.1.3.min.js');
    wp_enqueue_script('owlcaresol', get_template_directory_uri() . '/plugins/owl-carousel/owl.carousel.min.js');
    wp_enqueue_script('isotope', get_template_directory_uri() . '/plugins/isotope/isotope.min.js');
    wp_enqueue_script('fancybox', get_template_directory_uri() . '/plugins/fancybox/jquery.fancybox.min.js');
    wp_enqueue_script('isotop-trigger', get_template_directory_uri() . '/plugins/isotope/isotope-triger.min.js');
    wp_enqueue_script('datepicker', get_template_directory_uri() . '/plugins/datepicker/bootstrap-datepicker.min.js');
    wp_enqueue_script('lazyload', get_template_directory_uri() . '/plugins/lazyestload/lazyestload.js');
    wp_enqueue_script('smooth-scroll', get_template_directory_uri() . '/plugins/smoothscroll/SmoothScroll.js');
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js');
}
add_action('wp_enqueue_scripts', 'crystalbeauty_enqueue_scripts');

// Register Menus
function crystalbeauty_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'crystal-beauty'),
    ));
}
add_action('init', 'crystalbeauty_register_menus');

function crystalbeauty_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'crystal-beauty'),
        'id' => 'sidebar-1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'crystalbeauty_widgets_init');


function crystalbeauty_customize_register($wp_customize) {
    // Section for Contact Info
    $wp_customize->add_section('contact_info_section', array(
        'title'    => __('Contact Info', 'crystal-beauty'),
        'priority' => 30,
    ));

    // Email Setting
    $wp_customize->add_setting('contact_email', array(
        'default'   => 'info@yourdomain.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email', array(
        'label'    => __('Email Address', 'crystal-beauty'),
        'section'  => 'contact_info_section',
        'type'     => 'email',
    ));

    // Phone Setting
    $wp_customize->add_setting('contact_phone', array(
        'default'   => '+1 234 567 8900',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_phone', array(
        'label'    => __('Phone Number', 'crystal-beauty'),
        'section'  => 'contact_info_section',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'crystalbeauty_customize_register');


?>
