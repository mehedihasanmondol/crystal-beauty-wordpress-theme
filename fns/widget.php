<?php

function crystalbeauty_widgets_init()
{
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
