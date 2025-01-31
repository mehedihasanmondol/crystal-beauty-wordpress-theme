<?php

add_shortcode('container-end', function ($atts) {
    ob_start();
    get_template_part('template-parts/structure/container-end');
    return ob_get_clean();
});
