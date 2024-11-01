<?php 

//========================This File is used to withdraw table functionality========================//

    if( (isset($_POST['wcmvp_withdraw_status']) && !empty($_POST['wcmvp_withdraw_status']) ) && (isset($_POST['wcmvp_withdraw_status_id']) && !empty($_POST['wcmvp_withdraw_status_id'])) )
    {
        $wcmvp_withdraw_status = sanitize_text_field($_POST['wcmvp_withdraw_status']);
        $wcmvp_withdraw_status_id = sanitize_text_field($_POST['wcmvp_withdraw_status_id']);
        if( (isset($wcmvp_withdraw_status) && !empty($wcmvp_withdraw_status)) && (isset($wcmvp_withdraw_status_id) && !empty($wcmvp_withdraw_status_id)) )
        {
            global $wpdb;
            
            if( $wcmvp_withdraw_status == 'delete' )
            {
                $wcmvp_withdraw_query = "DELETE FROM ".$wpdb->prefix."wcmvp_withdraw WHERE `id`=%d";
                $wpdb->get_var($wpdb->prepare( $wcmvp_withdraw_query,$wcmvp_withdraw_status_id ));
                do_action('wcmvp_withdraw_delete_request');
                echo json_encode(1);
                wp_die();
            }
            else if( $wcmvp_withdraw_status == 'add_note' )
            {
                if( isset($_POST['wcmvp_withdraw_add_note_msg']) )
                {
                    $wcmvp_withdraw_query = "UPDATE ".$wpdb->prefix."wcmvp_withdraw SET note=%s WHERE id=%d";
                    $wpdb->get_var($wpdb->prepare( $wcmvp_withdraw_query,sanitize_text_field($_POST['wcmvp_withdraw_add_note_msg']),$wcmvp_withdraw_status_id ));
                }
                do_action('wcmvp_withdraw_add_note_request');
                echo json_encode(1);
                wp_die();
            }
            else if( $wcmvp_withdraw_status == 'approved' )
            {
                $wcmvp_withdraw_query = "SELECT user_id,amount,method FROM ".$wpdb->prefix."wcmvp_withdraw WHERE id=%d";
                $wcmvp_withdraw_approve_data = $wpdb->get_results($wpdb->prepare($wcmvp_withdraw_query,$wcmvp_withdraw_status_id));
                
                if( isset($wcmvp_withdraw_approve_data) && is_array($wcmvp_withdraw_approve_data) )
                {
                    if( isset($wcmvp_withdraw_approve_data[0]) )
                    {
                        if( is_object($wcmvp_withdraw_approve_data[0]) && isset($wcmvp_withdraw_approve_data[0]->user_id) && isset($wcmvp_withdraw_approve_data[0]->amount) && isset($wcmvp_withdraw_approve_data[0]->method) )
                        {
                            $wcmvp_withdraw_approve_user = $wcmvp_withdraw_approve_data[0]->user_id;
                            $wcmvp_withdraw_approve_amount = $wcmvp_withdraw_approve_data[0]->amount;
                            $wcmvp_withdraw_approve_method = $wcmvp_withdraw_approve_data[0]->method;
                            
                            if( isset($wcmvp_withdraw_approve_user) && isset($wcmvp_withdraw_approve_amount) && isset($wcmvp_withdraw_approve_method) )
                            {
                                $wcmvp_vendor_amount = get_user_meta($wcmvp_withdraw_approve_user,'wcmvp_total_amount',true);
                                
                                if( isset($wcmvp_vendor_amount) && !empty($wcmvp_vendor_amount) )
                                {
                                    $wcmvp_withdraw_approve_amount = round($wcmvp_withdraw_approve_amount,2);

                                    if( $wcmvp_vendor_amount >= $wcmvp_withdraw_approve_amount )
                                    {
                                        require_once(WCMVP_ADMIN_PARTIAL.'admin-includes/wcmvp-load-payment-method.php');

                                        $wcmvp_payment_obj = new Wcmvp_Payment_Gateways;
                                        $wcmvp_payement_msg = $wcmvp_payment_obj->wcmvp_load_avail_method($wcmvp_withdraw_approve_method,$wcmvp_withdraw_approve_user,$wcmvp_withdraw_approve_amount,$wcmvp_withdraw_status_id);

                                        if($wcmvp_payement_msg == 'done')
                                        {
                                            $wcmvp_withdraw_query = "UPDATE ".$wpdb->prefix."wcmvp_withdraw SET status=%s, modified_date=%s WHERE `id`=%d";
                                            
                                            $wpdb->get_var($wpdb->prepare( $wcmvp_withdraw_query,$wcmvp_withdraw_status, date("Y-m-d H:i:s"), $wcmvp_withdraw_status_id ));
                                            
                                            do_action('wcmvp_withdraw_stmt_for_vand',$wcmvp_withdraw_status_id,$wcmvp_withdraw_status);
                                            
                                            update_user_meta( $wcmvp_withdraw_approve_user,'wcmvp_total_amount',($wcmvp_vendor_amount - $wcmvp_withdraw_approve_amount) );
                                            
                                            echo json_encode(1);
                                            wp_die();
                                        }
                                        else
                                        {
                                            echo json_encode($wcmvp_payement_msg);
                                            wp_die();
                                        }
                                    }
                                    else
                                    {
                                        echo json_encode(esc_html__('withdrawl Amount should be greater than Vendor balance'),'wc-multi-vendor-platform-lite');
                                        wp_die();
                                    }
                                    do_action('wcmvp_withdraw_approve_request');
                                }
                            }
                        }
                    }
                }
            }
            else
            {
                $wcmvp_withdraw_query = "UPDATE ".$wpdb->prefix."wcmvp_withdraw SET status=%s, modified_date=%s WHERE `id`=%d";
                $wpdb->get_var($wpdb->prepare( $wcmvp_withdraw_query,$wcmvp_withdraw_status, date("Y-m-d H:i:s"), $wcmvp_withdraw_status_id ));
                do_action('wcmvp_withdraw_stmt_for_vand',$wcmvp_withdraw_status_id,$wcmvp_withdraw_status);
                echo json_encode(1);
                wp_die();
            }
        }
    }

    // Code goes when request come for bulk action

    if( (isset($_POST['wcmvp_withdraw_status']) && !empty($_POST['wcmvp_withdraw_status']) ) && (isset($_POST['wcmvp_withdraw_status_id_array']) && !empty($_POST['wcmvp_withdraw_status_id_array'])) )
    {
        $wcmvp_withdraw_status = sanitize_text_field($_POST['wcmvp_withdraw_status']);
        $wcmvp_withdraw_status_id = $_POST['wcmvp_withdraw_status_id_array'];     // $_POST['wcmvp_withdraw_status_id_array'] holds array
       
        if( (isset($wcmvp_withdraw_status) && !empty($wcmvp_withdraw_status)) && (isset($wcmvp_withdraw_status_id) && is_array($wcmvp_withdraw_status_id)) )
        {
            foreach($wcmvp_withdraw_status_id as $id)
            {
                $id = sanitize_text_field($id);
                global $wpdb;

                if( $wcmvp_withdraw_status == 'delete' )
                {
                    $wcmvp_withdraw_query = "DELETE FROM ".$wpdb->prefix."wcmvp_withdraw WHERE `id`=%d";
                    $wpdb->get_var($wpdb->prepare($wcmvp_withdraw_query,$id));
                    do_action('wcmvp_withdraw_delete_request');
                }
                else if( $wcmvp_withdraw_status == 'approved' )
                {
                    $wcmvp_withdraw_query = "SELECT user_id,amount,method FROM ".$wpdb->prefix."wcmvp_withdraw WHERE id=%d";
                    $wcmvp_withdraw_approve_data = $wpdb->get_results($wpdb->prepare($wcmvp_withdraw_query,$id));

                    if( isset($wcmvp_withdraw_approve_data) && is_array($wcmvp_withdraw_approve_data) )
                    {
                        if( isset($wcmvp_withdraw_approve_data[0]) )
                        {
                            if( is_object($wcmvp_withdraw_approve_data[0]) && isset($wcmvp_withdraw_approve_data[0]->user_id) && isset($wcmvp_withdraw_approve_data[0]->amount) && isset($wcmvp_withdraw_approve_data[0]->method) )
                            {
                                $wcmvp_withdraw_approve_user = $wcmvp_withdraw_approve_data[0]->user_id;
                                $wcmvp_withdraw_approve_amount = $wcmvp_withdraw_approve_data[0]->amount;
                                $wcmvp_withdraw_approve_method = $wcmvp_withdraw_approve_data[0]->method;

                                if( isset($wcmvp_withdraw_approve_user) && isset($wcmvp_withdraw_approve_amount) && isset
                                ($wcmvp_withdraw_approve_method) )
                                {
                                    $wcmvp_withdraw_approve_amount = round($wcmvp_withdraw_approve_amount,2);
                                    
                                    $wcmvp_vendor_amount = get_user_meta($wcmvp_withdraw_approve_user,'wcmvp_total_amount',true);

                                    if( isset($wcmvp_vendor_amount) && !empty($wcmvp_vendor_amount) )
                                    {
                                        if( $wcmvp_vendor_amount > $wcmvp_withdraw_approve_amount )
                                        {
                                            require_once(WCMVP_ADMIN_PARTIAL.'admin-includes/wcmvp-load-payment-method.php');                             
                                            $wcmvp_payment_obj = new Wcmvp_Payment_Gateways;
                                            $wcmvp_payement_msg = $wcmvp_payment_obj->wcmvp_load_avail_method($wcmvp_withdraw_approve_method,$wcmvp_withdraw_approve_user,$wcmvp_withdraw_approve_amount,$id);

                                            if( $wcmvp_payement_msg == 'done')
                                            {
                                                $wcmvp_withdraw_query = "UPDATE ".$wpdb->prefix."wcmvp_withdraw SET status=%s, modified_date=%s WHERE `id`=%d";
                                                
                                                $wpdb->get_var($wpdb->prepare( $wcmvp_withdraw_query,$wcmvp_withdraw_status,date("Y-m-d H:i:s"),$id ));
    
                                                update_user_meta( $wcmvp_withdraw_approve_user,'wcmvp_total_amount',($wcmvp_vendor_amount - $wcmvp_withdraw_approve_amount) );
    
                                                do_action('wcmvp_withdraw_stmt_for_vand',$id,$wcmvp_withdraw_status);
                                            }
                                            else
                                            {
                                                $wcmvp_withdraw_error = $wcmvp_payement_msg;
                                            }
                                        }
                                        else
                                        {
                                            $wcmvp_withdraw_error = esc_html__('Only sufficient requests are accepted else are neglected','wc-multi-vendor-platform-lite');
                                        }
                                        do_action('wcmvp_withdraw_approve_request');
                                    }
                                }
                            }
                        }
                    }
                }
                else
                {
                    $wcmvp_withdraw_query = "UPDATE ".$wpdb->prefix."wcmvp_withdraw SET status=%s, modified_date=%s WHERE `id`=%d";                        
                    $wpdb->get_var($wpdb->prepare( $wcmvp_withdraw_query,$wcmvp_withdraw_status,date("Y-m-d H:i:s"),$id ));
                    do_action('wcmvp_withdraw_stmt_for_vand',$id,$wcmvp_withdraw_status);
                }
            }
            
            if( isset($wcmvp_withdraw_error) && !empty($wcmvp_withdraw_error) )
            {
                echo json_encode($wcmvp_withdraw_error);
            }
            else
            {
                echo json_encode(1);
            }
            wp_die();
        }
    }