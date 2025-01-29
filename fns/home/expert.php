<?php

function crystalbeauty_expert_headings_register($wp_customize)
{
    // Section for expert Titles
    $wp_customize->add_section('expert_titles', array(
        'title'    => __('Expert headings', 'crystal-beauty'),
        'priority' => 30,
    ));

    // Field for "Meet"
    $wp_customize->add_setting('expert_main_title', array(
        'default'   => 'Meet',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('expert_main_title', array(
        'label'    => __('Main title', 'crystal-beauty'),
        'section'  => 'expert_titles',
        'type'     => 'text',
    ));

    // Field for "our experts"
    $wp_customize->add_setting('expert_sub_title', array(
        'default'   => 'our experts',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('expert_sub_title', array(
        'label'    => __('sub title', 'crystal-beauty'),
        'section'  => 'expert_titles',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'crystalbeauty_expert_headings_register');


function crystal_beauty_custom_post_type_experts()
{
    $labels = array(
        'name'                  => _x('Experts', 'Post Type General Name', 'crystal-beauty'),
        'singular_name'         => _x('Expert', 'Post Type Singular Name', 'crystal-beauty'),
        'menu_name'             => __('Experts', 'crystal-beauty'),
        'name_admin_bar'        => __('Expert', 'crystal-beauty'),
        'archives'              => __('Expert Archives', 'crystal-beauty'),
        'attributes'            => __('Expert Attributes', 'crystal-beauty'),
        'parent_item_colon'     => __('Parent Expert:', 'crystal-beauty'),
        'all_items'             => __('All Experts', 'crystal-beauty'),
        'add_new_item'          => __('Add New Expert', 'crystal-beauty'),
        'add_new'               => __('Add New', 'crystal-beauty'),
        'new_item'              => __('New Expert', 'crystal-beauty'),
        'edit_item'             => __('Edit Expert', 'crystal-beauty'),
        'update_item'           => __('Update Expert', 'crystal-beauty'),
        'view_item'             => __('View Expert', 'crystal-beauty'),
        'view_items'            => __('View Experts', 'crystal-beauty'),
        'search_items'          => __('Search Expert', 'crystal-beauty'),
        'not_found'             => __('No experts found', 'crystal-beauty'),
        'not_found_in_trash'    => __('No experts found in Trash', 'crystal-beauty'),
        'featured_image'        => __('Expert Profile Image', 'crystal-beauty'),
        'set_featured_image'    => __('Set profile image', 'crystal-beauty'),
        'remove_featured_image' => __('Remove profile image', 'crystal-beauty'),
        'use_featured_image'    => __('Use as profile image', 'crystal-beauty'),
        'insert_into_item'      => __('Insert into expert', 'crystal-beauty'),
        'uploaded_to_this_item' => __('Uploaded to this expert', 'crystal-beauty'),
        'items_list'            => __('Experts list', 'crystal-beauty'),
        'items_list_navigation' => __('Experts list navigation', 'crystal-beauty'),
        'filter_items_list'     => __('Filter experts list', 'crystal-beauty'),
    );

    $args = array(
        'label'               => __('Experts', 'crystal-beauty'),
        'description'         => __('Team experts with social media links', 'crystal-beauty'),
        'labels'              => $labels,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-businessperson', // Icon for Experts
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'rewrite'             => array('slug' => 'experts'),
        'supports'            => array('title', 'editor', 'excerpt', 'thumbnail'),
        'show_in_rest'        => true, // Enables Gutenberg support
    );

    register_post_type('expert', $args);
}
add_action('init', 'crystal_beauty_custom_post_type_experts');

function crystal_beauty_expert_meta_boxes()
{
    add_meta_box(
        'expert_social_links',
        __('Social Media Links', 'crystal-beauty'),
        'crystal_beauty_expert_social_links_callback',
        'expert',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'crystal_beauty_expert_meta_boxes');

function crystal_beauty_expert_social_links_callback($post)
{
    $facebook  = get_post_meta($post->ID, 'expert_facebook', true);
    $twitter   = get_post_meta($post->ID, 'expert_twitter', true);
    $linkedin  = get_post_meta($post->ID, 'expert_linkedin', true);

    wp_nonce_field('crystal_beauty_save_expert_meta', 'crystal_beauty_expert_nonce');

?>
    <p>
        <label for="expert_facebook"><?php _e('Facebook URL:', 'crystal-beauty'); ?></label>
        <input type="url" name="expert_facebook" id="expert_facebook" value="<?php echo esc_url($facebook); ?>" class="widefat">
    </p>
    <p>
        <label for="expert_twitter"><?php _e('Twitter URL:', 'crystal-beauty'); ?></label>
        <input type="url" name="expert_twitter" id="expert_twitter" value="<?php echo esc_url($twitter); ?>" class="widefat">
    </p>
    <p>
        <label for="expert_linkedin"><?php _e('LinkedIn URL:', 'crystal-beauty'); ?></label>
        <input type="url" name="expert_linkedin" id="expert_linkedin" value="<?php echo esc_url($linkedin); ?>" class="widefat">
    </p>
<?php
}

function crystal_beauty_save_expert_meta($post_id)
{
    if (!isset($_POST['crystal_beauty_expert_nonce']) || !wp_verify_nonce($_POST['crystal_beauty_expert_nonce'], 'crystal_beauty_save_expert_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['expert_facebook'])) {
        update_post_meta($post_id, 'expert_facebook', esc_url($_POST['expert_facebook']));
    }
    if (isset($_POST['expert_twitter'])) {
        update_post_meta($post_id, 'expert_twitter', esc_url($_POST['expert_twitter']));
    }
    if (isset($_POST['expert_linkedin'])) {
        update_post_meta($post_id, 'expert_linkedin', esc_url($_POST['expert_linkedin']));
    }
}
add_action('save_post', 'crystal_beauty_save_expert_meta');
