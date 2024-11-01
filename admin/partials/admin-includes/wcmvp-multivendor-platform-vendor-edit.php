<?php

//==================File includes When Update vendor after click to edit section of vendors===========//    

    if( isset($_POST['wcmvp_edit_vendors_data']) )
    {
        $wcmvp_edit_vendors_data = $_POST['wcmvp_edit_vendors_data'];  // $_POST['wcmvp_edit_vendors_data'] holds array
        
        if( is_array($wcmvp_edit_vendors_data) && isset($wcmvp_edit_vendors_data) && !empty($wcmvp_edit_vendors_data) )
        {
            foreach($wcmvp_edit_vendors_data as $data)
            {
                if(isset($data))
                {
                    $data = sanitize_text_field($data);
                }
            }
            if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_check_before_update']) && !empty($wcmvp_edit_vendors_data['wcmvp_vendor_check_before_update']) )	
            {
                if( $wcmvp_edit_vendors_data['wcmvp_vendor_check_before_update'] == 'wcmvp_addnew_vendor' )
                {
                    $wcmvp_addnew_vend = array(
                        'first_name' 	=> 	isset($wcmvp_edit_vendors_data['wcmvp_add_new_vend_fname']) ? $wcmvp_edit_vendors_data['wcmvp_add_new_vend_fname'] : "",
                        'last_name' 	=> 	isset($wcmvp_edit_vendors_data['wcmvp_add_new_vend_lname']) ? $wcmvp_edit_vendors_data['wcmvp_add_new_vend_lname'] : "",
                        'user_email' 	=> 	isset($wcmvp_edit_vendors_data['wcmvp_add_new_vend_email']) ? $wcmvp_edit_vendors_data['wcmvp_add_new_vend_email'] : "",
                        'user_login' 	=> 	isset($wcmvp_edit_vendors_data['wcmvp_add_new_vend_uname']) ? $wcmvp_edit_vendors_data['wcmvp_add_new_vend_uname'] : "",
                        'user_pass' 	=> 	isset($wcmvp_edit_vendors_data['wcmvp_add_new_vend_passwrd']) ? $wcmvp_edit_vendors_data['wcmvp_add_new_vend_passwrd'] : "",
                        'role'			=> 	'wcmvp_vendor',
                        'show_admin_bar_front' => 0,
                    );

                    $wcmvp_newly_created_vend_id = wp_insert_user($wcmvp_addnew_vend);
                    
                    if( isset($wcmvp_newly_created_vend_id) && !empty($wcmvp_newly_created_vend_id) )
                    {
                        if( !empty(get_option('wcmvp_notifications')) && is_array(get_option('wcmvp_notifications')))
                        {
                            $wcmvp_notifications = get_option('wcmvp_notifications');
                            if(isset($wcmvp_notifications) )
                            {
                                array_push($wcmvp_notifications,esc_html__('Recently, A New Vendor Created','wc-multi-vendor-platform-lite'));
                                update_option('wcmvp_notifications',$wcmvp_notifications);
                            }
                        }
                        else
                        {
                            $wcmvp_notifications[] = esc_html__('Recently, A New Vendor Created','wc-multi-vendor-platform-lite');
                            update_option('wcmvp_notifications',$wcmvp_notifications);
                        }

                        do_action('wcmvp_creating_new_vendor',$wcmvp_newly_created_vend_id);

                        $wcmvp_edit_vend_id = $wcmvp_newly_created_vend_id;

                        if( isset( $wcmvp_edit_vend_id ) && !empty( $wcmvp_edit_vend_id ) )
                        {
                            if(isset($wcmvp_edit_vendors_data['wcmvp_addnew_vend_paypal_email']))
                            {
                                update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_paypal_email',sanitize_email($wcmvp_edit_vendors_data['wcmvp_addnew_vend_paypal_email'] ));
                            }
                            if(isset($wcmvp_edit_vendors_data['wcmvp_addnew_vend_stripe_id']))
                            {
                                update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_stripe_id',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_addnew_vend_stripe_id'] ));
                            }
                            if( isset($wcmvp_edit_vendors_data['wcmvp_add_new_vend_email']) && $wcmvp_edit_vendors_data['wcmvp_add_new_vend_uname'] )
                            {
                                $to 		= 	sanitize_email($wcmvp_edit_vendors_data['wcmvp_add_new_vend_email']);
                                $subject 	= 	esc_html__('Notification about your vendor account','wc-multi-vendor-platform-lite');
                                $message 	=   esc_html__('Dear','wc-multi-vendor-platform-lite'). ' ' .sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_add_new_vend_uname']). ' ' .esc_html__(', Your Vendor Account created with','wc-multi-vendor-platform-lite'). ' ' .get_bloginfo('name'). ' ' .esc_html__(',Please Contact Administrator for further reference','wc-multi-vendor-platform-lite');
    
                                wp_mail( $to, $subject, $message );
                            }
                        }
                    }
                }
                if( $wcmvp_edit_vendors_data['wcmvp_vendor_check_before_update'] == 'wcmvp_edit_vendor' )
                {
                    if( !empty(get_option('wcmvp_notifications')) && is_array(get_option('wcmvp_notifications')))
                    {
                        $wcmvp_notifications = get_option('wcmvp_notifications');
                        if(isset($wcmvp_notifications) )
                        {
                            array_push($wcmvp_notifications,esc_html__('Recently, A Vendor Updated','wc-multi-vendor-platform-lite'));
                            update_option('wcmvp_notifications',$wcmvp_notifications);
                        }
                    }
                    else
                    {
                        $wcmvp_notifications[] = esc_html__('Recently, A Vendor Updated','wc-multi-vendor-platform-lite');
                        update_option('wcmvp_notifications',$wcmvp_notifications);
                    }

                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_data_id']) )
                    {
                        $wcmvp_edit_vend_id = sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_data_id']);
                        
                        if( isset( $wcmvp_edit_vend_id ) && !empty( $wcmvp_edit_vend_id ) )
                        {
                            if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_facebook']) )
                            {
                                update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_facebook',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_facebook'] ));
                                
                                do_action('wcmvp_editing_vendor',$wcmvp_edit_vend_id);
                            }
                            if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_google_plus']) )
                            {
                                update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_google_plus',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_google_plus'] ));
                            }
                            if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_twitter']) )
                            {
                                update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_twitter',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_twitter'] ));
                            }
                            if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_pinterest']) )
                            {
                                update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_pinterest',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_pinterest'] ));
                            }
                            if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_linkedin']) )
                            {
                                update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_linkedin',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_linkedin'] ));
                            }
                            if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_youtube']) )
                            {
                                update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_youtube',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_youtube'] ));
                            }
                            if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_instagram']) )
                            {
                                update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_instagram',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_instagram'] ));
                            }
                            if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_flickr']) )
                            {
                                update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_flickr',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_flickr'] ));
                            }
                            if( isset($wcmvp_edit_vendors_data['wcmvp_admin_vendor_commssion']) )
                            {
                                update_user_meta( $wcmvp_edit_vend_id,'wcmvp_admin_vendor_commssion',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_admin_vendor_commssion'] ));
                            }
                            if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_admin_commision_value']) )
                            {
                                update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_admin_commision_value',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_admin_commision_value'] ));
                            }
                            if(isset($wcmvp_edit_vendors_data['wcmvp_addnew_vend_paypal_email']))
                            {
                                update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_paypal_email',sanitize_email($wcmvp_edit_vendors_data['wcmvp_addnew_vend_paypal_email'] ));
                            }
                            if(isset($wcmvp_edit_vendors_data['wcmvp_addnew_vend_stripe_id']))
                            {
                                update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_stripe_id',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_addnew_vend_stripe_id'] ));
                            }
                        }
                    }
                }
                if( isset( $wcmvp_edit_vend_id ) && !empty( $wcmvp_edit_vend_id ) )
                {
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_img_id']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_store_img',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_img_id'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_store_name1']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_store_name',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_store_name1'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_store_url']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_store_url',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_store_url'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_store_phone']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_phone',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_store_phone'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_store_address1']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_address1',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_store_address1'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_store_address2']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_address2',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_store_address2'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_town_city']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_city',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_town_city'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_zip_code']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_zip',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_zip_code'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_selected_country']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_country',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_selected_country'] ));
                    }
                    if(isset($wcmvp_edit_vendors_data['wcmvp_vendor_selected_state']))
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_state',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_selected_state'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_bank_name']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_bank_name',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_bank_name'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_bank_account_no']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_bank_account_no',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_bank_account_no'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_bank_address']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_bank_address',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_bank_address'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_routing_number']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_routing_number',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_routing_number'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_bank_iban']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_bank_iban',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_bank_iban'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_bank_swift']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_bank_swift',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_bank_swift'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_enable_selling']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_status',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_enable_selling'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_publishing_product']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_publishing_product',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_publishing_product'] ));
                    }
                    if( isset($wcmvp_edit_vendors_data['wcmvp_vendor_admin_featured_vendor']) )
                    {
                        update_user_meta( $wcmvp_edit_vend_id,'wcmvp_vendor_admin_featured_vendor',sanitize_text_field($wcmvp_edit_vendors_data['wcmvp_vendor_admin_featured_vendor'] ));
                    }

                    echo json_encode(1);
                    wp_die();
                }
            }
        }
    }