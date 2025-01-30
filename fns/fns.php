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
