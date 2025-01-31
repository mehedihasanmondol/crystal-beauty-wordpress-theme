<?php

function crystalbeauty_appointment_mail_settings($wp_customize)
{
    // Appointment Mail Section
    $wp_customize->add_section('appointment_mail_settings', array(
        'title'    => __('Appointment Mail Settings', 'crystal-beauty'),
        'priority' => 50,
    ));

    // Admin Email
    $wp_customize->add_setting('appointment_admin_email', array(
        'default'   => get_option('admin_email'),
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('appointment_admin_email', array(
        'label'    => __('Admin Email', 'crystal-beauty'),
        'section'  => 'appointment_mail_settings',
        'type'     => 'email',
    ));

    // Via Email (From Address)
    $wp_customize->add_setting('appointment_via_email', array(
        'default'   => 'noreply@yourdomain.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('appointment_via_email', array(
        'label'    => __('Send Via Email', 'crystal-beauty'),
        'section'  => 'appointment_mail_settings',
        'type'     => 'email',
    ));

    // Email Subject (with Mustache Templating)
    $wp_customize->add_setting('appointment_email_subject', array(
        'default'   => 'New Appointment Form Submission from {{name}}',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('appointment_email_subject', array(
        'label'    => __('Email Subject (Use {{name}}, {{email}}, {{message}}, {{mobile}}, {{date}} , {{time}}, {{services}})', 'crystal-beauty'),
        'section'  => 'appointment_mail_settings',
        'type'     => 'text',
    ));

    // Message (with Mustache Templating)
    $wp_customize->add_setting('appointment_message', array(
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
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('appointment_message', array(
        'label'    => __('Email Message (Use {{name}}, {{email}}, {{message}}, {{mobile}}, {{address}}, {{date}} , {{time}}, {{services}})', 'crystal-beauty'),
        'section'  => 'appointment_mail_settings',
        'type'     => 'textarea',
    ));

    // Success Message (with Mustache Templating)
    $wp_customize->add_setting('appointment_success_message', array(
        'default'   => 'Thank you your message has been sent successfully!',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('appointment_success_message', array(
        'label'    => __('Success Message', 'crystal-beauty'),
        'section'  => 'appointment_mail_settings',
        'type'     => 'textarea',
    ));
}

add_action('customize_register', 'crystalbeauty_appointment_mail_settings');


function crystalbeauty_handle_appointment_form()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once get_template_directory() . '/packages/vendor/mustache/mustache/src/Mustache/Autoloader.php';
        Mustache_Autoloader::register();

        $mustache = new Mustache_Engine;

        $date = htmlspecialchars($_POST["appointment-form-date"] ?? '');
        $services = $_POST["appointment-form-services"] ?? [];
        $time = htmlspecialchars($_POST["appointment-form-time"] ?? '');
        $name = htmlspecialchars($_POST["appointment-form-name"] ?? '');
        $email = filter_var($_POST["appointment-form-email"] ?? '', FILTER_SANITIZE_EMAIL);
        $phone = htmlspecialchars($_POST["appointment-form-mobile"] ?? '');
        $message = htmlspecialchars($_POST["appointment-form-message"] ?? '');
        $address = htmlspecialchars($_POST["appointment-form-address"] ?? '');
        $servicesList = !empty($services) ? implode(', ', array_map('htmlspecialchars', $services)) : 'No services selected.';

        // Get settings from the Customizer
        $admin_email = get_theme_mod('appointment_admin_email', get_option('admin_email'));
        $via_email = get_theme_mod('appointment_via_email', 'noreply@yourdomain.com');
        $email_subject_template = get_theme_mod('appointment_email_subject', 'New Appointment Form Submission from {{name}}');
        $message_template = get_theme_mod('appointment_message', 'Thank you ');
        $success_message = get_theme_mod('appointment_success_message', 'Thank you. Message has been sent successfully!');

        // Render email subject & success message using Mustache
        $data = array(
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'mobile' => $phone,
            'address' => $address,
            'time' => $time,
            'date' => $date,
            'services' => $servicesList,
        );
        $email_subject = $mustache->render($email_subject_template, $data);
        $message = $mustache->render($message_template, $data);

        $response = send_mail($via_email, $admin_email, $email_subject, $message, $email, $name, "", $name, $success_message);

        echo json_encode($response);
    }
    wp_die(); // 🚀 **Important: Ensures proper AJAX response termination**
}
add_action('wp_ajax_crystalbeauty_appointment_form', 'crystalbeauty_handle_appointment_form');
add_action('wp_ajax_nopriv_crystalbeauty_appointment_form', 'crystalbeauty_handle_appointment_form');
