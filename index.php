<?php

function crystalbeauty_enqueue_home_scripts()
{


    wp_enqueue_style('select_option_1', get_template_directory_uri() . '/plugins/selectbox/select_option1.css');
    wp_enqueue_style('owl_caresol', get_template_directory_uri() . '/plugins/owl-carousel/owl.carousel.min.css');
    wp_enqueue_style('fancybox', get_template_directory_uri() . '/plugins/fancybox/jquery.fancybox.min.css');
    wp_enqueue_style('isotop', get_template_directory_uri() . '/plugins/isotope/isotope.min.css');
    wp_enqueue_style('datepicker', get_template_directory_uri() . '/plugins/datepicker/datepicker.min.css');




    wp_enqueue_script('selectbox', get_template_directory_uri() . '/plugins/selectbox/jquery.selectbox-0.1.3.min.js');
    wp_enqueue_script('owlcaresol', get_template_directory_uri() . '/plugins/owl-carousel/owl.carousel.min.js');
    wp_enqueue_script('isotope', get_template_directory_uri() . '/plugins/isotope/isotope.min.js');
    wp_enqueue_script('fancybox', get_template_directory_uri() . '/plugins/fancybox/jquery.fancybox.min.js');
    wp_enqueue_script('isotop-trigger', get_template_directory_uri() . '/plugins/isotope/isotope-triger.min.js');
    wp_enqueue_script('datepicker', get_template_directory_uri() . '/plugins/datepicker/bootstrap-datepicker.min.js');
    wp_enqueue_script('lazyload', get_template_directory_uri() . '/plugins/lazyestload/lazyestload.js');
    wp_enqueue_script('smooth-scroll', get_template_directory_uri() . '/plugins/smoothscroll/SmoothScroll.js');
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js');
    // Localize script to provide AJAX URL
    wp_localize_script('custom', 'ajaxurl', array(
        'contact_mail' => admin_url('admin-ajax.php'),
        'appointment_mail' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'crystalbeauty_enqueue_home_scripts');

?>
<?php get_header(); ?>

<!-- MAIN SLIDER -->
<?php

// if switch visibity on

if (get_theme_mod('slider_section_visibility', 1)) {
    echo do_shortcode('[slider]');
}
?>

<!-- ABOUT SECTION -->
<?php
// if switch visibity on
if (get_theme_mod('about_section_visibility', 1)) {
    echo do_shortcode('[about-section]');
}
?>

<!-- VARIETY SECTION -->
<?php

// if switch visibity on

if (get_theme_mod('service_section_visibility', 1)) {
    echo do_shortcode('[service]');
}
?>


<!-- OFFERS SECTION -->
<?php echo do_shortcode('[offer]'); ?>
<!-- PRODUCT SECTION -->
<?php

// if switch visibity on

if (get_theme_mod('product_section_visibility', 1)) {
    echo do_shortcode('[simple-products]');
}
?>
<!-- REVIEW SECTION -->
<?php

// if switch visibity on

if (get_theme_mod('testimonial_section_visibility', 1)) {
    echo do_shortcode('[testimonials]');
}
?>

<!-- HOME GALLERY SECTION -->
<?php //get_template_part('template-parts/home/gallery'); 
?>

<!-- CALL TO ACTION SECTION -->
<?php
// if switch visibity on
if (get_theme_mod('cta_section_visibility', 1)) {
    echo do_shortcode('[call-to-action]');
}
?>

<!-- EXPERT SECTION -->
<?php

// if switch visibity on

if (get_theme_mod('expert_section_visibility', 1)) {
    echo do_shortcode('[experts]');
}
?>

<!-- PRICING SECTION -->
<?php

// if switch visibity on

if (get_theme_mod('package_service_section_visibility', 1)) {
    echo do_shortcode('[package-service]');
}
?>
<!-- CONTACT US SECTION -->
<?php

// if switch visibity on

if (get_theme_mod('contact_section_visibility', 1)) {
    echo do_shortcode('[contact-form]');
}

?>


<!-- PARTNER LOGO SECTION -->
<?php

// if switch visibity on

if (get_theme_mod('partner_section_visibility', 1)) {
    echo do_shortcode('[partner]');
}

?>






<?php get_footer(); ?>