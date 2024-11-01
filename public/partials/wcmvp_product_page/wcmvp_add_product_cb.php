<?php
/*          Ajax Request callback for the addition of products                 */
if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {
    $wcmvp_user_permision = get_user_meta(get_current_user_id(), 'wcmvp_vendor_status', true);
    if ($wcmvp_user_permision == "1") {
        $wcmvp_permission = true;
    } else {
        $wcmvp_permission = false;
    }
    if ($wcmvp_permission) {
        if ((isset($_POST) && !empty($_POST))) {
            if (empty($_POST['pname']) && (empty($_POST['pprice']) || (empty($_POST['dprice'])))) {
                echo json_encode("unsuccessful");
                wp_die();
            }
            if ((!empty($_POST['pname']) && isset($_POST['pname']))) {
                if(isset($_POST['wcmvp_id']) && !empty($_POST['wcmvp_id'])){
                   $wcmvp_product_array = array(
                    'ID' =>  sanitize_text_field($_POST['wcmvp_id']) ,
                    'post_type'  => 'product',
                    'post_status' => 'pending',
                    'post_title' =>  sanitize_text_field($_POST['pname']),
                    'post_author'   => get_current_user_id(),
                    'post_content' => sanitize_text_field($_POST['desc']),
                    'post_date_gmt' => gmdate("Y-m-d H:i:s"),
                    'post_modified_gmt' => gmdate("Y-m-d H:i:s")
                );
           }else{
               $wcmvp_product_array = array(
                'post_type'  => 'product',
                'post_status' => 'pending',
                'post_title' =>  sanitize_text_field($_POST['pname']),
                'post_author'   => get_current_user_id(),
                'post_content' => sanitize_text_field($_POST['desc']),
                'post_date_gmt' => gmdate("Y-m-d H:i:s"),
                'post_modified_gmt' => gmdate("Y-m-d H:i:s")
            );
           }               
                $wcmvp_post_id = wp_insert_post($wcmvp_product_array);
            }
            $wcmvp_term = get_terms(array(
                'taxonomy' => 'product_tag',
                'hide_empty' => false,
            ));
            $term_array = array();
            if (!empty($wcmvp_term) && !is_wp_error($wcmvp_term)) {
                foreach ($wcmvp_term as $term) {    
                    $term_array[] = $term->term_id;
                }
            }
            $wcmvp_tags_array = array();
            $wcmvp_not_tag = array(); 
            if(isset($_POST['tags']) && !empty($_POST['tags'])){
                foreach ($_POST['tags'] as $key => $tags) {
                    if( !empty($tags) && in_array( $tags , $term_array)){
                        $wcmvp_tags_array[] = sanitize_text_field($tags);
                    }
                }
            }
            $wcmvp_prod_obj = wc_get_product($wcmvp_post_id);
            $wcmvp_prod_obj->set_tag_ids(array_merge($wcmvp_tags_array));
            $wcmvp_prod_obj->save();
            if (!empty($_POST['pprice']) && isset($_POST['pprice'])) {
                update_post_meta($wcmvp_post_id, '_price', sanitize_text_field($_POST['pprice']));
            }
            if (!empty($_POST['image']) && isset($_POST['image'])) {
                update_post_meta($wcmvp_post_id, '_thumbnail_id', sanitize_text_field($_POST['image']));
            }
            if (!empty($_POST['wcmvp_schedule_from']) && isset($_POST['wcmvp_schedule_from'])) {
                update_post_meta($wcmvp_post_id, '_sale_price_dates_from', sanitize_text_field(strtotime($_POST['wcmvp_schedule_from'])));
            }
            if (!empty($_POST['wcmvp_schedule_to']) && isset($_POST['wcmvp_schedule_to'])) {
                update_post_meta($wcmvp_post_id, '_sale_price_dates_to', sanitize_text_field(strtotime($_POST['wcmvp_schedule_to'])));
            }
            if (!empty($_POST['pprice']) && isset($_POST['pprice'])) {
                update_post_meta($wcmvp_post_id, '_regular_price', sanitize_text_field($_POST['pprice']));
            }
            if (!empty($_POST['dprice']) && isset($_POST['dprice'])) {
                update_post_meta($wcmvp_post_id, '_sale_price', sanitize_text_field($_POST['dprice']));
            }
            if (!empty($_POST['category']) && isset($_POST['category'])) {
             $product = wc_get_product($wcmvp_post_id); 
             $product->set_category_ids(sanitize_text_field($_POST['category']));
             $product->save();
            }
            if ($_POST['cond'] == 'add_detailed') {
                if (!empty($_POST['sku']) && isset($_POST['sku'])) {
                    update_post_meta($wcmvp_post_id, '_sku', sanitize_text_field($_POST['sku']));
                }
                if (!empty($_POST['virtual_product']) && isset($_POST['virtual_product'])) {
                    update_post_meta($wcmvp_post_id, '_virtual', sanitize_text_field($_POST['virtual_product']));
                }
                if (!empty($_POST['download_product']) && isset($_POST['download_product'])) {
                    update_post_meta($wcmvp_post_id, '_downloadable', sanitize_text_field($_POST['download_product']));
                }
                if (!empty($_POST['stock_status']) && isset($_POST['stock_status'])) {
                    update_post_meta($wcmvp_post_id, '_stock_status', sanitize_text_field($_POST['stock_status']));
                }
                if (!empty($_POST['stock_manage']) && isset($_POST['stock_manage'])) {
                    update_post_meta($wcmvp_post_id, '_manage_stock', sanitize_text_field($_POST['stock_manage']));
                }                
                if(!empty($_POST['wcmvp_download_prod_array']) && isset($_POST['wcmvp_download_prod_array'])){
                    foreach ($_POST['wcmvp_download_prod_array'] as $key => $wcmvp_val) {
                        $wcmvp_id = sanitize_text_field($wcmvp_val[0]); 
                        $wcmvp_file_name = sanitize_text_field($wcmvp_val[1]);
                        $wcmvp_file_url  = sanitize_text_field($wcmvp_val[2]);
                        $wcmvp_download_ids = md5( sanitize_text_field($wcmvp_file_url) );
                        $wcmvp_download_obj = new WC_Product_Download();
                        $wcmvp_download_obj->set_id( sanitize_text_field($wcmvp_download_ids) );
                        $wcmvp_download_obj->set_name( sanitize_text_field($wcmvp_file_name) );
                        $wcmvp_download_obj->set_file( sanitize_text_field($wcmvp_file_url) );
                        $product = wc_get_product( $wcmvp_post_id ); 
                        $wcmvp_downloads = $product->get_downloads();
                        $wcmvp_downloads[$wcmvp_download_ids] = $wcmvp_download_obj;
                        $product->set_downloads($wcmvp_downloads);
                        $product->save();
                    }
                }
                if(!empty($_POST['wcmvp_prod_download_limit']) && isset($_POST['wcmvp_prod_download_limit'])){
                 update_post_meta($wcmvp_post_id, '_download_limit', sanitize_text_field($_POST['wcmvp_prod_download_limit']));
             }
             if(!empty($_POST['wcmvp_prod_download_expiry']) && isset($_POST['wcmvp_prod_download_expiry'])){
                 update_post_meta($wcmvp_post_id, '_download_expiry', sanitize_text_field($_POST['wcmvp_prod_download_expiry']));
             }
             if (!empty($_POST['wcmvp_single_product_permission']) && isset($_POST['wcmvp_single_product_permission'])) {
                update_post_meta($wcmvp_post_id, '_sold_individually', sanitize_text_field($_POST['wcmvp_single_product_permission']));
            }
            if (!empty($_POST['purchase_note_field']) && isset($_POST['purchase_note_field'])) {
                update_post_meta($wcmvp_post_id, '_purchase_note', sanitize_text_field($_POST['purchase_note_field']));
            }
            if (!empty($_POST['pname']) && (!empty($_POST['short_description'])) && (!empty($_POST['product_reviews']))) {
                $wcmvp_product_details = array(
                    'ID' =>   $wcmvp_post_id,
                    'post_title' => sanitize_text_field($_POST['pname']),
                    'post_excerpt' => sanitize_text_field($_POST['short_description']),
                    'comment_status' => sanitize_text_field($_POST['product_reviews']),
                );
                wp_update_post($wcmvp_product_details);
            }
        }
        $wcmvp_post_id = apply_filters("wcmvp_vendor_product_extra_data",$wcmvp_post_id);
        echo json_encode('success');
        wp_die();

    } else {
        echo json_encode(esc_html__('unsuccessful',"wc-multi-vendor-platform-lite"));
        wp_die();
    }
}
else{
    echo json_encode(esc_html__("You are not allowed to add products","wc-multi-vendor-platform-lite"));
}
}
wp_die();
