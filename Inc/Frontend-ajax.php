<?php
// Variable Product Add to cart
add_action("wp_ajax_quick_add_to_cart", "quick_add_to_cart");
add_action("wp_ajax_nopriv_quick_add_to_cart", "quick_add_to_cart");

function quick_add_to_cart()
{
    check_ajax_referer( 'quick_variable_nonce', 'variable_nonce', false );
    // Get the data from the AJAX request
    $product_id = isset($_POST["product_id"]) ? intval($_POST["product_id"]) : " ";
    $quantity = isset($_POST["quantity"]) ? intval($_POST["quantity"]) : " ";
    $variation_id = isset($_POST["variation_id"]) ? intval($_POST["variation_id"]) : " ";
    // Get the product object
    $product = wc_get_product($product_id);

    // Add to cart
    $added = WC()->cart->add_to_cart($product_id, $quantity, $variation_id);

    if ($added) {
        // Return success response
        wp_send_json_success();
    } else {
        // Return error response
        wp_send_json_error("Unable to add product to cart.");
    }
}
