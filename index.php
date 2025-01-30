<?php get_header(); ?>
<!-- MAIN SLIDER -->
<?php

// if switch visibity on

if (get_theme_mod('slider_section_visibility', 1)) {
    get_template_part('template-parts/home/slider');
}
?>

<!-- ABOUT SECTION -->
<?php
// if switch visibity on
if (get_theme_mod('about_section_visibility', 1)) {

    get_template_part('template-parts/home/about');
}
?>

<!-- VARIETY SECTION -->
<?php

// if switch visibity on

if (get_theme_mod('service_section_visibility', 1)) {
    get_template_part('template-parts/home/variety');
}
?>


<!-- OFFERS SECTION -->
<?php get_template_part('template-parts/home/offer'); ?>
<!-- PRODUCT SECTION -->
<?php

// if switch visibity on

if (get_theme_mod('product_section_visibility', 1)) {
    get_template_part('template-parts/home/products');
}
?>
<!-- REVIEW SECTION -->
<?php

// if switch visibity on

if (get_theme_mod('testimonial_section_visibility', 1)) {
    get_template_part('template-parts/home/review');
}
?>

<!-- HOME GALLERY SECTION -->
<?php get_template_part('template-parts/home/gallery'); ?>

<!-- CALL TO ACTION SECTION -->
<?php
// if switch visibity on
if (get_theme_mod('cta_section_visibility', 1)) {
    get_template_part('template-parts/home/call-to-action');
}
?>

<!-- EXPERT SECTION -->
<?php

// if switch visibity on

if (get_theme_mod('expert_section_visibility', 1)) {
    get_template_part('template-parts/home/expert');
}
?>

<!-- PRICING SECTION -->
<?php

// if switch visibity on

if (get_theme_mod('package_service_section_visibility', 1)) {
    get_template_part('template-parts/home/pricing');
}
?>
<!-- CONTACT US SECTION -->
<?php

// if switch visibity on

if (get_theme_mod('contact_section_visibility', 1)) {
    get_template_part('template-parts/home/contact-us');
}
?>


<!-- PARTNER LOGO SECTION -->
<?php

// if switch visibity on

if (get_theme_mod('partner_section_visibility', 1)) {
    get_template_part('template-parts/home/partner');
}
?>






<?php get_footer(); ?>