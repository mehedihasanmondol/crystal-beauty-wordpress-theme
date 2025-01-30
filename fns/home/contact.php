<?php

function crystalbeauty_customize_contact_section($wp_customize)
{
    // Contact Section
    $wp_customize->add_section('contact_section', array(
        'title'    => __('Contact us Section', 'crystal-beauty'),
        'priority' => 40,
    ));

    // On/Off Switch for Get in Touch Heading
    $wp_customize->add_setting('contact_section_visibility', array(
        'default'           => '1', // 1 = ON by default
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('contact_section_visibility', array(
        'label'    => __('Show Contact us', 'crystal-beauty'),
        'section'  => 'contact_section',
        'type'     => 'checkbox', // Checkbox acts as an on/off switch
    ));

    // Get in Touch Section Heading
    $wp_customize->add_setting('contact_section_heading', array(
        'default'           => 'Get in Touch',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_section_heading', array(
        'label'    => __('Contact us Heading', 'crystal-beauty'),
        'section'  => 'contact_section',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'crystalbeauty_customize_contact_section');

function crystal_beauty_contact_form_submit()
{
    // Check nonce for security (if needed)
    // if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'angel_contact_form')) {
    //     wp_send_json(array('status' => 'false', 'message' => 'Security check failed.'));
    // }

    $name    = sanitize_text_field($_POST['name']);
    $email   = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json(array('status' => 'false', 'message' => 'All fields are required.'));
    }

    // Example: Send an email (customize as needed)
    $to      = get_option('admin_email'); // Send to site admin
    $subject = 'New Contact Form Submission';
    $headers = array('Content-Type: text/html; charset=UTF-8', 'From: ' . $name . ' <' . $email . '>');

    $mail_sent = wp_mail($to, $subject, $message, $headers);

    if ($mail_sent) {
        wp_send_json(array('status' => 'true', 'message' => 'Your message has been sent successfully.'));
    } else {
        wp_send_json(array('status' => 'false', 'message' => 'Failed to send message. Please try again later.'));
    }

    wp_die();
}
add_action('wp_ajax_crystal_beauty_contact_form_submit', 'crystal_beauty_contact_form_submit');
