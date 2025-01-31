<?php

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