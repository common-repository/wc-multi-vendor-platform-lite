<?php 

//===========================This file is used to process order request==================//

    if( isset($_POST['wcmvp_process_order_request_id']) && !empty($_POST['wcmvp_process_order_request_id']) )
    {
        if( isset($_POST['wcmvp_process_order_request_value']) && !empty($_POST['wcmvp_process_order_request_value']) )
        {
            if( $_POST['wcmvp_process_order_request_value'] == 'send_payment' )
            {
                $wcmvp_children_post_args = array(
                    'post_parent'	=> 	sanitize_text_field($_POST['wcmvp_process_order_request_id']),
                    'post_type'		=>	'shop_order',
                    'post_status'	=>	'-1'
                );
                $wcmvp_order_children = get_children( $wcmvp_children_post_args );

                if($wcmvp_order_children)
                {
                    $wcmvp_process_main_order = wc_get_order(sanitize_text_field($_POST['wcmvp_process_order_request_id']));
                    if( isset($wcmvp_process_main_order) && is_object($wcmvp_process_main_order) )
                    {
                        if($wcmvp_process_main_order->get_status() != 'completed')
                        {
                            echo json_encode(esc_html__('Order Status should be completd to Tranfer amount to vendors.','wc-multi-vendor-platform-lite'));
                            wp_die();
                        }
                        if($wcmvp_process_main_order->get_status() == 'completed')
                        {
                            foreach($wcmvp_order_children as $children)
                            {
                                if(isset($children->ID))
                                {
                                    $wcmvp_process_order = wc_get_order($children->ID);

                                    if( isset($wcmvp_process_order) && is_object($wcmvp_process_order) )
                                    {
                                        if($wcmvp_process_order->get_status() != 'completed')
                                        {
                                            echo json_encode(esc_html__('Each sub Order Status should be completd to Tranfer amount to vendors.','wc-multi-vendor-platform-lite'));
                                            wp_die();
                                        }
                                        if($wcmvp_process_order->get_status() == 'completed')
                                        {
                                            if( !empty(get_option('wcmvp_withdraw_option')) )
                                            {
                                                if(isset(get_option('wcmvp_withdraw_option')['wcmvp_withdraw_to_vendor']))
                                                {
                                                    if(get_option('wcmvp_withdraw_option')['wcmvp_withdraw_to_vendor'] == 'wcmvp_after_admin_approval')
                                                    {
                                                        $wcmvp_order_total = $wcmvp_process_order->get_total();
                                                        $wcmvp_order_total_main = $wcmvp_process_main_order->get_total();
                                                        $wcmvp_order_vendor_id = get_post_meta( $children->ID,'wcmvp_order_vendor',true );
            
                                                        if( isset ($wcmvp_order_vendor_id))
                                                        {
                                                            if( !empty(get_post_meta($children->ID,'wcmvp_vendor_payment_after_admin_approvale' )) )
                                                            {
                                                                if( isset($wcmvp_order_total_main) )
                                                                {
                                                                    if($wcmvp_order_total_main == 0)
                                                                    {
                                                                        echo json_encode(esc_html__('Amount Should be Greater than 0','wc-multi-vendor-platform-lite'));
                                                                        wp_die();
                                                                    }
                                                                }
                                                                if(get_post_meta($children->ID,'wcmvp_vendor_payment_after_admin_approvale',true ) == 'true')
                                                                {
                                                                    $wcmvp_response_for_already_transferred = esc_html__("Request are neglected whom you already assgined balance, else are approved.",'wc-multi-vendor-platform-lite');
                                                                }
                                                                else
                                                                {
                                                                    $wcmvp_admin_order_commision_for_vendor = get_post_meta($children->ID,'wcmvp_admin_order_commision_for_vendor',true );
                                                                    if( isset($wcmvp_admin_order_commision_for_vendor) )
                                                                    {
                                                                        do_action('wcmvp_send_order_balance_to_vendor');

                                                                        update_user_meta( $wcmvp_order_vendor_id,'wcmvp_total_amount',intval(get_user_meta($wcmvp_order_vendor_id,'wcmvp_total_amount',true)) + ($wcmvp_order_total - $wcmvp_admin_order_commision_for_vendor));
                                                                        update_post_meta($children->ID,'wcmvp_vendor_payment_after_admin_approvale','true' );
                                                                        $wcmvp_request_done = 1;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    if( isset($wcmvp_response_for_already_transferred) && !empty($wcmvp_response_for_already_transferred) )
                    {
                        echo json_encode(2);
                    }
                    else
                    {
                        echo json_encode(1);
                    }
                    wp_die();
                }
                else
                {
                    $wcmvp_process_order = wc_get_order(sanitize_text_field($_POST['wcmvp_process_order_request_id']));
                    if( isset($wcmvp_process_order) && is_object($wcmvp_process_order) )
                    {
                        if($wcmvp_process_order->get_status() != 'completed')
                        {
                            echo json_encode(esc_html__('Order Status should be completd to Tranfer amount to vendor.','wc-multi-vendor-platform-lite'));
                            wp_die();
                        }
                        if($wcmvp_process_order->get_status() == 'completed')
                        {
                            if( !empty(get_option('wcmvp_withdraw_option')) )
                            {
                                if(isset(get_option('wcmvp_withdraw_option')['wcmvp_withdraw_to_vendor']))
                                {
                                    if(get_option('wcmvp_withdraw_option')['wcmvp_withdraw_to_vendor'] == 'wcmvp_after_admin_approval')
                                    {
                                        $wcmvp_order_total = $wcmvp_process_order->get_total();
                                        $wcmvp_order_vendor_id = get_post_meta( sanitize_text_field($_POST['wcmvp_process_order_request_id']),'wcmvp_order_vendor',true );

                                        if( isset ($wcmvp_order_vendor_id))
                                        {
                                            if( !empty(get_post_meta($_POST['wcmvp_process_order_request_id'],'wcmvp_vendor_payment_after_admin_approvale' )) )
                                            {
                                                if( isset($wcmvp_order_total) )
                                                {
                                                    if($wcmvp_order_total == 0)
                                                    {
                                                        echo json_encode(esc_html__('Amount Should be Greater than 0','wc-multi-vendor-platform-lite'));
                                                        wp_die();
                                                    }
                                                }
                                                if(get_post_meta($_POST['wcmvp_process_order_request_id'],'wcmvp_vendor_payment_after_admin_approvale',true ) == 'true')
                                                {
                                                    echo json_encode(esc_html__('Amount Already Transferred for this order','wc-multi-vendor-platform-lite'));
                                                    wp_die();
                                                }
                                            }

                                            if( null !== (get_post_meta($_POST['wcmvp_process_order_request_id'],'wcmvp_admin_order_commision_for_vendor',true ) ) )
                                            {
                                                $wcmvp_admin_order_commision_for_vendor = sanitize_text_field(get_post_meta($_POST['wcmvp_process_order_request_id'],'wcmvp_admin_order_commision_for_vendor',true ) );
                                                if( isset($wcmvp_admin_order_commision_for_vendor) )
                                                {
                                                    do_action('wcmvp_send_order_balance_to_vendor');

                                                    update_user_meta( $wcmvp_order_vendor_id,'wcmvp_total_amount',intval(get_user_meta($wcmvp_order_vendor_id,'wcmvp_total_amount',true)) + ($wcmvp_order_total - $wcmvp_admin_order_commision_for_vendor));
                                                    update_post_meta(sanitize_text_field($_POST['wcmvp_process_order_request_id']),'wcmvp_vendor_payment_after_admin_approvale','true' );
                                                    echo json_encode(1);
                                                    wp_die();
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            wp_die();
                        }
                    }
                }
            }
            $wcmvp_children_post_args = array(
                'post_parent'	=> 	sanitize_text_field($_POST['wcmvp_process_order_request_id']),
                'post_type'		=>	'shop_order',
                'post_status'	=>	'-1'
            );
            $wcmvp_order_children = get_children( $wcmvp_children_post_args );
            if( $wcmvp_order_children )
            {
                foreach($wcmvp_order_children as $children)
                {
                    if(isset($children->ID))
                    {
                        if( $_POST['wcmvp_process_order_request_value'] == 'trash' )
                        {
                            do_action('wcmvp_send_order_to_trash');
                            wp_trash_post( $children->ID );
                            wp_trash_post( sanitize_text_field($_POST['wcmvp_process_order_request_id']) );
                            $wcmvp_order_vendor_id = get_post_meta( $children->ID[0],'wcmvp_order_vendor',true );
    
                            if( isset($wcmvp_order_vendor_id) && !empty($wcmvp_order_vendor_id) )
                            {
                                echo json_encode($wcmvp_order_vendor_id);
                            }
                        }
                        if( $_POST['wcmvp_process_order_request_value'] == 'restore' )
                        {
                            do_action('wcmvp_send_order_to_restore');
                            wp_untrash_post( $children->ID );
                            wp_untrash_post( sanitize_text_field($_POST['wcmvp_process_order_request_id']) );
                            $wcmvp_order_vendor_id = get_post_meta( $children->ID[0],'wcmvp_order_vendor',true );
    
                            if( isset($wcmvp_order_vendor_id) && !empty($wcmvp_order_vendor_id) )
                            {
                                echo json_encode($wcmvp_order_vendor_id);
                            }
                        }
                        if( $_POST['wcmvp_process_order_request_value'] == 'delete' )
                        {
                            do_action('wcmvp_send_order_to_delete');
                            $wcmvp_order_vendor_id = get_post_meta( $children->ID[0],'wcmvp_order_vendor',true );
                            if( isset($wcmvp_order_vendor_id) && !empty($wcmvp_order_vendor_id) )
                            {
                                echo json_encode($wcmvp_order_vendor_id);
                            }
                            wp_delete_post( $children->ID );
                            wp_delete_post( sanitize_text_field($_POST['wcmvp_process_order_request_id']) );
                        }
                    }
                }
                wp_die();
            }
            else
            {
                if( $_POST['wcmvp_process_order_request_value'] == 'trash' )
                {
                    do_action('wcmvp_send_order_to_trash');
                    wp_trash_post( sanitize_text_field($_POST['wcmvp_process_order_request_id']) );
                    $wcmvp_order_vendor_id = get_post_meta( sanitize_text_field($_POST['wcmvp_process_order_request_id']),'wcmvp_order_vendor',true );

                    if( isset($wcmvp_order_vendor_id) && !empty($wcmvp_order_vendor_id) )
                    {
                        echo json_encode($wcmvp_order_vendor_id);
                        wp_die();
                    }
                }
                if( $_POST['wcmvp_process_order_request_value'] == 'restore' )
                {
                    do_action('wcmvp_send_order_to_restore');
                    wp_untrash_post( sanitize_text_field($_POST['wcmvp_process_order_request_id']) );
                    $wcmvp_order_vendor_id = get_post_meta( sanitize_text_field($_POST['wcmvp_process_order_request_id']),'wcmvp_order_vendor',true );

                    if( isset($wcmvp_order_vendor_id) && !empty($wcmvp_order_vendor_id) )
                    {
                        echo json_encode($wcmvp_order_vendor_id);
                        wp_die();
                    }
                }
                if( $_POST['wcmvp_process_order_request_value'] == 'delete' )
                {
                    do_action('wcmvp_send_order_to_delete');
                    $wcmvp_order_vendor_id = get_post_meta( sanitize_text_field($_POST['wcmvp_process_order_request_id']),'wcmvp_order_vendor',true );
                    if( isset($wcmvp_order_vendor_id) && !empty($wcmvp_order_vendor_id) )
                    {
                        echo json_encode($wcmvp_order_vendor_id);
                    }
                    wp_delete_post( sanitize_text_field($_POST['wcmvp_process_order_request_id']) );
                    wp_die();
                }
                wp_die();
            }
        }
    }

?>