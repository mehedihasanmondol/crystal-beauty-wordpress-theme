<?php

function crystalbeauty_contact_mail_settings($wp_customize)
{
    // Contact Mail Section
    $wp_customize->add_section('contact_mail_settings', array(
        'title'    => __('Contact Mail Settings', 'crystal-beauty'),
        'priority' => 50,
    ));

    // Admin Email
    $wp_customize->add_setting('contact_admin_email', array(
        'default'   => get_option('admin_email'),
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_admin_email', array(
        'label'    => __('Admin Email', 'crystal-beauty'),
        'section'  => 'contact_mail_settings',
        'type'     => 'email',
    ));

    // Via Email (From Address)
    $wp_customize->add_setting('contact_via_email', array(
        'default'   => 'noreply@yourdomain.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_via_email', array(
        'label'    => __('Send Via Email', 'crystal-beauty'),
        'section'  => 'contact_mail_settings',
        'type'     => 'email',
    ));

    // Email Subject (with Mustache Templating)
    $wp_customize->add_setting('contact_email_subject', array(
        'default'   => 'New Contact Form Submission from {{name}}',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_email_subject', array(
        'label'    => __('Email Subject (Use {{name}}, {{email}}, {{message}}, {{mobile}})', 'crystal-beauty'),
        'section'  => 'contact_mail_settings',
        'type'     => 'text',
    ));

    // Success Message (with Mustache Templating)
    $wp_customize->add_setting('contact_message', array(
        'default'   => 'You have received a new inquiry.

                        Name: {{name}}
                        Email: {{email}}
                        Mobile: {{mobile}}
                        Date & Time: {{date}} at {{time}}
                        Services Interested: {{services}}

                        Message:
                        {{message}}

                        Regards,
                        Your Website',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('contact_message', array(
        'label'    => __('Email Message (Use {{name}}, {{email}}, {{message}}, {{mobile}})', 'crystal-beauty'),
        'section'  => 'contact_mail_settings',
        'type'     => 'textarea',
    ));

    // Success Message (with Mustache Templating)
    $wp_customize->add_setting('contact_success_message', array(
        'default'   => 'Thank you your message has been sent successfully!',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('contact_success_message', array(
        'label'    => __('Success Message', 'crystal-beauty'),
        'section'  => 'contact_mail_settings',
        'type'     => 'textarea',
    ));
}

add_action('customize_register', 'crystalbeauty_contact_mail_settings');


function crystalbeauty_handle_contact_form()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once get_template_directory() . '/packages/vendor/mustache/mustache/src/Mustache/Autoloader.php';
        Mustache_Autoloader::register();

        $mustache = new Mustache_Engine;

        $name = isset($_POST["contact-form-name"]) ? htmlspecialchars($_POST["contact-form-name"]) : '';
        $email = isset($_POST["contact-form-email"]) ? filter_var($_POST["contact-form-email"], FILTER_VALIDATE_EMAIL) : '';
        $mobile = isset($_POST["contact-form-mobile"]) ? htmlspecialchars($_POST["contact-form-mobile"]) : '';
        $message = isset($_POST["contact-form-message"]) ? htmlspecialchars($_POST["contact-form-message"]) : '';


        // Get settings from the Customizer
        $admin_email = get_theme_mod('contact_admin_email', get_option('admin_email'));
        $via_email = get_theme_mod('contact_via_email', 'noreply@yourdomain.com');
        $email_subject_template = get_theme_mod('contact_email_subject', 'New Contact Form Submission from {{name}}');
        $message_template = get_theme_mod('contact_message', 'Thank you ');
        $success_message = get_theme_mod('contact_success_message', 'Thank you. Message has been sent successfully!');

        // Render email subject & success message using Mustache
        $data = array(
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'mobile' => $mobile,
        );
        $email_subject = $mustache->render($email_subject_template, $data);
        $message = $mustache->render($message_template, $data);

        $response = send_mail($via_email, $admin_email, $email_subject, $message, $email, $name, "", $name, $success_message);

        echo json_encode($response);
    }
    wp_die(); // 🚀 **Important: Ensures proper AJAX response termination**
}
add_action('wp_ajax_crystalbeauty_contact_form', 'crystalbeauty_handle_contact_form');
add_action('wp_ajax_nopriv_crystalbeauty_contact_form', 'crystalbeauty_handle_contact_form');
