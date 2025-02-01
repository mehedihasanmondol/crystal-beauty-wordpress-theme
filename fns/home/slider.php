<?php

function crystalbeauty_customize_slider_section($wp_customize)
{
    // Slider Section
    $wp_customize->add_section('slider_section', array(
        'title'    => __('Slider Section', 'crystal-beauty'),
        'priority' => 25,
    ));

    // On/Off Switch for Slider Heading
    $wp_customize->add_setting('slider_section_visibility', array(
        'default'           => '1', // 1 = ON by default
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('slider_section_visibility', array(
        'label'    => __('Show Slider Heading', 'crystal-beauty'),
        'section'  => 'slider_section',
        'type'     => 'checkbox', // Checkbox acts as an on/off switch
    ));

    // Slider Section Heading
    $wp_customize->add_setting('slider_section_heading', array(
        'default'           => 'Welcome to Our Spa',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('slider_section_heading', array(
        'label'    => __('Slider Section Heading', 'crystal-beauty'),
        'section'  => 'slider_section',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'crystalbeauty_customize_slider_section');



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
    $button_text = get_post_meta($post->ID, '_slider_button_text', true);
    $button_link = get_post_meta($post->ID, '_slider_button_link', true);
    $display_mode   = get_post_meta($post->ID, '_slider_display_mode', true);

?>
    <p>
        <label for="slider_display_mode"><?php _e('Slider Display Mode:', 'crystal-beauty'); ?></label>
        <select name="slider_display_mode" id="slider_display_mode">
            <option value="Computer" <?php selected($display_mode, 'Computer'); ?>>Computer</option>
            <option value="Mobile" <?php selected($display_mode, 'Mobile'); ?>>Mobile</option>
        </select>
    </p>
    <p>
        <label for="slider_style"><?php _e('Select Slider Style:', 'crystal-beauty'); ?></label>
        <select name="slider_style" id="slider_style">
            <option value="slide-inner1" <?php selected($slider_style, 'slide-inner1'); ?>>Style 1</option>
            <option value="slide-inner2" <?php selected($slider_style, 'slide-inner2'); ?>>Style 2</option>
            <option value="slide-inner3" <?php selected($slider_style, 'slide-inner3'); ?>>Style 3</option>
            <option value="slide-inner4" <?php selected($slider_style, 'slide-inner4'); ?>>Style 4</option>
        </select>
    </p>



    <p>
        <label for="slider_button_text"><?php _e('Button Text:', 'crystal-beauty'); ?></label>
        <input type="text" name="slider_button_text" id="slider_button_text" value="<?php echo esc_attr($button_text); ?>" class="widefat">
    </p>

    <p>
        <label for="slider_button_link"><?php _e('Button Link:', 'crystal-beauty'); ?></label>
        <input type="url" name="slider_button_link" id="slider_button_link" value="<?php echo esc_url($button_link); ?>" class="widefat">
    </p>
<?php
}


function crystalbeauty_save_slider_style_meta($post_id)
{
    if (isset($_POST['slider_style'])) {
        update_post_meta($post_id, '_slider_style', sanitize_text_field($_POST['slider_style']));
    }

    if (isset($_POST['slider_button_text'])) {
        update_post_meta($post_id, '_slider_button_text', sanitize_text_field($_POST['slider_button_text']));
    }

    if (isset($_POST['slider_button_link'])) {
        update_post_meta($post_id, '_slider_button_link', esc_url_raw($_POST['slider_button_link']));
    }
    if (isset($_POST['slider_display_mode'])) {
        update_post_meta($post_id, '_slider_display_mode', sanitize_text_field($_POST['slider_display_mode']));
    }
}
add_action('save_post', 'crystalbeauty_save_slider_style_meta');
