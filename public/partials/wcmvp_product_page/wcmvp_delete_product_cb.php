<?php

// This file contains the code for making product trash

if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {
    if (isset($_POST) && !empty($_POST)) {   
        if(isset($_POST['wcmvp_prod_ID'])){
            $wcmvp_product_ID=sanitize_text_field(intval($_POST['wcmvp_prod_ID']));
        $wcmvp_status  =  wp_trash_post( $wcmvp_product_ID );
        $wcmvp_counter  =    $this->wcmvp_count_function();
        if (!empty($wcmvp_status)) {
            echo json_encode("trashed successfully");
        }
    }
        wp_die();
    }
}
wp_die();
