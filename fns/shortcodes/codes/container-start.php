<?php

add_shortcode('container-start', function ($atts) {
    ob_start();
    get_template_part('template-parts/structure/container-start');
    return ob_get_clean();
});
