<?php
function get_categories_by_product_type($product_type)
{
    $args = array(
        'limit'   => -1,
        'type'    => $product_type, // e.g., 'package_service', 'simple', 'variable'
        'return'  => 'ids',
    );

    $products = wc_get_products($args);

    if (empty($products)) {
        return array(); // No products found
    }

    // Get category IDs from products
    $category_ids = array();
    foreach ($products as $product_id) {
        $terms = wp_get_post_terms($product_id, 'product_cat', array('fields' => 'ids'));
        $category_ids = array_merge($category_ids, $terms);
    }

    // Remove duplicates
    $category_ids = array_unique($category_ids);

    // Get category names
    $categories = get_terms(array(
        'taxonomy'   => 'product_cat',
        'include'    => $category_ids,
        'hide_empty' => false,
    ));

    return $categories;
}


function get_products_by_category_id($category_id, $product_type, $limit = -1)
{
    $args = array(
        'limit'      => $limit,  // -1 for all products, or set a number
        'return'     => 'objects', // Can be 'ids' for just product IDs
        'status'     => 'publish', // Only get published products
        'tax_query'  => array(
            array(
                'taxonomy' => 'product_cat', // WooCommerce product category taxonomy
                'field'    => 'term_id',    // Use 'term_id' to filter by category ID
                'terms'    => $category_id, // Category ID to filter products
            ),
        ),
        'type'       => $product_type, // Filter by product type "service"
    );

    return wc_get_products($args);
}


function get_offer_products($product_type, $limit = -1)
{
    $args = array(
        'limit'      => $limit,  // -1 for all products, or set a number
        'return'     => 'objects', // Can be 'ids' for just product IDs
        'status'     => 'publish', // Only get published products

        'meta_query' => array(
            array(
                'key'     => '_sale_price', // Sale price meta key
                'value'   => '', // Only get products that have a sale price
                'compare' => '!=', // Exclude products with no sale price
            ),
        ),
        'type'       => $product_type, // Filter by product type "service"
    );

    return wc_get_products($args);
}

function get_products($product_type, $limit = -1)
{
    $args = array(
        'limit'      => $limit,  // -1 for all products, or set a number
        'return'     => 'objects', // Can be 'ids' for just product IDs
        'status'     => 'publish', // Only get published products
        'type'       => $product_type, // Filter by product type "service"
    );

    return wc_get_products($args);
}


function send_mail($from_email, $to_email, $subject, $message, $reply_email, $from_name = "", $to_name = "", $reply_name, $success_message = "")
{
    $response = array(
        "status" => false,
        "message" => ""
    );

    // Include PHPMailer files

    require_once get_template_directory() . '/packages/vendor/phpmailer/phpmailer/src/Exception.php';
    require_once get_template_directory() . '/packages/vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require_once get_template_directory() . '/packages/vendor/phpmailer/phpmailer/src/SMTP.php';

    // Create a new PHPMailer instance
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {

        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = get_option('mailserver_url'); // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = get_option('mailserver_login');      // Mailtrap Username
        $mail->Password = get_option('mailserver_pass');      // Mailtrap Password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = get_option('mailserver_port');

        // Email Content
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->setFrom($from_email, $from_name);
        $mail->addAddress($to_email, $to_name);
        $mail->addReplyTo($reply_email, $reply_name);
        $mail->Subject = $subject;

        $mail->Body = $message;


        // Send the email
        $mail->send();
        $response = ['status' => 'true', 'message' => $success_message];
    } catch (\PHPMailer\PHPMailer\Exception $e) {
        $response = ['status' => 'false', 'message' => $error . ' Error: ' . $mail->ErrorInfo];
    }

    return $response;
}
