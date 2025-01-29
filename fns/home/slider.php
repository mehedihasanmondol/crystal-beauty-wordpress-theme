<?php
add_theme_support('post-thumbnails');
function crystalbeauty_register_slider()
{
    register_post_type('slider', array(
        'labels'      => array(


            'name'               => __('Sliders', 'crystal-beauty'),
            'singular_name'      => __('Slider', 'crystal-beauty'),
            'menu_name'          => __('Sliders', 'crystal-beauty'),
            'name_admin_bar'     => __('Slider', 'crystal-beauty'),
            'add_new'            => __('Add New', 'crystal-beauty'),
            'add_new_item'       => __('Add New Slider', 'crystal-beauty'),
            'new_item'           => __('New Slider', 'crystal-beauty'),
            'edit_item'          => __('Edit Slider', 'crystal-beauty'),
            'view_item'          => __('View Slider', 'crystal-beauty'),
            'all_items'          => __('All Sliders', 'crystal-beauty'),
            'search_items'       => __('Search Sliders', 'crystal-beauty'),
            'parent_item_colon'  => __('Parent Slider:', 'crystal-beauty'),
            'not_found'          => __('No sliders found.', 'crystal-beauty'),
            'not_found_in_trash' => __('No sliders found in Trash.', 'crystal-beauty'),


        ),
        'public'      => true,
        'has_archive' => false,
        'supports'    => array('title', 'excerpt', 'editor', 'thumbnail'),
        'menu_icon'   => 'dashicons-images-alt2',
        // 'hierarchical' => true, // Makes it behave like pages
        // 'show_in_rest' => true, // Enables Gutenberg
    ));
}
add_action('init', 'crystalbeauty_register_slider');


function crystalbeauty_add_slider_style_meta_box()
{
    add_meta_box(
        'slider_style_option',
        __('Slider Style', 'crystal-beauty'),
        'crystalbeauty_slider_style_meta_box_callback',
        'slider',
        'side'
    );
}
add_action('add_meta_boxes', 'crystalbeauty_add_slider_style_meta_box');

function crystalbeauty_slider_style_meta_box_callback($post)
{
    $slider_style = get_post_meta($post->ID, '_slider_style', true);
?>
    <label for="slider_style"><?php _e('Select Slider Style:', 'crystal-beauty'); ?></label>
    <select name="slider_style" id="slider_style">
        <option value="slide-inner1" <?php selected($slider_style, 'slide-inner1'); ?>>Style 1</option>
        <option value="slide-inner2" <?php selected($slider_style, 'slide-inner2'); ?>>Style 2</option>
        <option value="slide-inner3" <?php selected($slider_style, 'slide-inner3'); ?>>Style 3</option>
        <option value="slide-inner4" <?php selected($slider_style, 'slide-inner4'); ?>>Style 4</option>
    </select>
<?php
}

function crystalbeauty_save_slider_style_meta($post_id)
{
    if (isset($_POST['slider_style'])) {
        update_post_meta($post_id, '_slider_style', sanitize_text_field($_POST['slider_style']));
    }
}
add_action('save_post', 'crystalbeauty_save_slider_style_meta');
