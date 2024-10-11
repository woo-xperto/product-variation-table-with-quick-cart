<?php
add_action('wp_ajax_quickAdminAjaxHandler', 'quickAdminAjaxHandler');
add_action('wp_ajax_nopriv_quickAdminAjaxHandler', 'quickAdminAjaxHandler');

function quickAdminAjaxHandler() {
    // Verify nonce
    check_ajax_referer('quick_admin_nonce', 'nonce', false);

    // Check if the data is being sent
    if (isset($_POST['identifier']) && ($_POST['identifier']) == "adminSetting") {
        if (isset($_POST['variable_data']) && !empty($_POST['variable_data'])) {
            $jsonData = wp_unslash($_POST['variable_data']); 
            $jsonData = sanitize_text_field($jsonData);

            // Decode the JSON data
            $dataArray = json_decode($jsonData, true);

            // Check for JSON errors
            if (json_last_error() === JSON_ERROR_NONE) {
                $storeVariableFields = update_option('variable_all_checked', $dataArray);
                if ($storeVariableFields) {
                    echo "true";
                } else {
                    echo "false";
                }
            } else {
                echo "false"; 
            }
        } else {
            echo "false"; 
        }
    }
    
    wp_die(); 
}
