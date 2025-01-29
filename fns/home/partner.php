<?php

function crystalbeauty_register_partners()
{
    $labels = array(
        'name'               => __('Partners', 'crystal-beauty'),
        'singular_name'      => __('Partner', 'crystal-beauty'),
        'menu_name'          => __('Partners', 'crystal-beauty'),
        'name_admin_bar'     => __('Partner', 'crystal-beauty'),
        'add_new'            => __('Add New', 'crystal-beauty'),
        'add_new_item'       => __('Add New Partner', 'crystal-beauty'),
        'new_item'           => __('New Partner', 'crystal-beauty'),
        'edit_item'          => __('Edit Partner', 'crystal-beauty'),
        'view_item'          => __('View Partner', 'crystal-beauty'),
        'all_items'          => __('All Partners', 'crystal-beauty'),
        'search_items'       => __('Search Partners', 'crystal-beauty'),
        'not_found'          => __('No partners found.', 'crystal-beauty'),
        'not_found_in_trash' => __('No partners found in Trash.', 'crystal-beauty'),
    );

    register_post_type('partners', array(
        'labels'      => $labels,
        'public'      => true,
        'has_archive' => false,
        'supports'    => array('title', 'thumbnail', 'editor'),
        'menu_icon'   => 'dashicons-images-alt2',
    ));
}
add_action('init', 'crystalbeauty_register_partners');
