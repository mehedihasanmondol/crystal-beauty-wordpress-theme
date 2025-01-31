<?php


add_shortcode('call-to-action', function () {
    ob_start();
    get_template_part('template-parts/home/call-to-action');
    return ob_get_clean();
});
