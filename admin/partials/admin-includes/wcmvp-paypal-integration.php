<?php 

/** This file contains code of php which used for integration of paypal */

    class Wcmvp_Paypal_Gateway{

        private $wcmvp_withdraw_method;
        private $wcmvp_withdraw_user;
        private $wcmvp_withdraw_amount;
        private $wcmvp_withdraw_id;
        private $wcmvp_paypal_client_id;
        private $wcmvp_paypal_secret_key;
        private $wcmvp_api_url;
        private $wcmvp_token_url;
        private $wcmvp_vendor_paypal_email;


        function wcmvp_process_payment($wcmvp_withdraw_method,$wcmvp_withdraw_user,$wcmvp_withdraw_amount,$wcmvp_withdraw_id)
        {
            if( $wcmvp_withdraw_method == 'paypal' )
            {
                $this->wcmvp_withdraw_method = $wcmvp_withdraw_method;
                $this->wcmvp_withdraw_user = $wcmvp_withdraw_user;
                $this->wcmvp_withdraw_amount = $wcmvp_withdraw_amount;
                $this->wcmvp_withdraw_id = $wcmvp_withdraw_id;
                $wcmvp_validate_return = $this->wcmvp_validate_request();
                return $wcmvp_validate_return;
            }
        }
        
        function wcmvp_validate_request()
        {
            if( !empty(get_option('wcmvp_payment_gateway')) )
            {
                $wcmvp_withdraw_option_data = get_option('wcmvp_payment_gateway');
                
                if(is_array($wcmvp_withdraw_option_data) && !empty($wcmvp_withdraw_option_data) )
                {
                    if(isset($wcmvp_withdraw_option_data['wcmvp_withdraw_paypal']))
                    {
                        $wcmvp_withdraw_paypal  = $wcmvp_withdraw_option_data['wcmvp_withdraw_paypal'];
                    }
                    if( isset($wcmvp_withdraw_option_data['wcmvp_paypal_client_id']) )
                    {
                        $this->wcmvp_paypal_client_id  = $wcmvp_withdraw_option_data['wcmvp_paypal_client_id'];
                    }
                    if( isset($wcmvp_withdraw_option_data['wcmvp_paypal_secret_key']) )
                    {
                        $this->wcmvp_paypal_secret_key  = $wcmvp_withdraw_option_data['wcmvp_paypal_secret_key'];
                    }
                    if( isset($wcmvp_withdraw_option_data['wcmvp_withdraw_paypal_test_box']) )
                    {
                        $wcmvp_withdraw_paypal_test_box  = $wcmvp_withdraw_option_data['wcmvp_withdraw_paypal_test_box'];
                    }
                    if( isset($wcmvp_withdraw_paypal) && !empty($wcmvp_withdraw_paypal) && ($wcmvp_withdraw_paypal == 1) )
                    {
                        if( isset($this->wcmvp_paypal_client_id) && !empty($this->wcmvp_paypal_client_id) && isset($this->wcmvp_paypal_secret_key) && !empty($this->wcmvp_paypal_secret_key) )
                        {
                            $this->wcmvp_api_url = 'https://api.paypal.com/v1/payments/payouts';
                            $this->wcmvp_token_url = 'https://api.paypal.com/v1/oauth2/token';
    
                            if( isset($wcmvp_withdraw_paypal_test_box) && !empty($wcmvp_withdraw_paypal_test_box) && ($wcmvp_withdraw_paypal_test_box == 1) )
                            {
                                $this->wcmvp_api_url = 'https://api.sandbox.paypal.com/v1/payments/payouts';
                                $this->wcmvp_token_url = 'https://api.sandbox.paypal.com/v1/oauth2/token';
                            }
                            $this->wcmvp_vendor_paypal_email = get_user_meta($this->wcmvp_withdraw_user,'wcmvp_vendor_paypal_email',true);
                            
                            if( isset($this->wcmvp_vendor_paypal_email) && !empty($this->wcmvp_vendor_paypal_email) )
                            {
                                $this->wcmvp_generate_access_token();
                                $wcmvp_payment_return =  $this->wcmvp_process_paypal_payment();
                                return $wcmvp_payment_return;
                            }
                            else
                            {
                                return('Please ask vendor to update his email address as mentioned in paypal to receive payment');
                            }
                        }
                        else
                        {
                            return('Please Configure PayPal to Send Payment to Vendors');
                        }
                    }
                    else
                    {
                        return('Please Enable PayPal from setting to Send Payment to Vendors');
                    }
                }
            }
        }

        function wcmvp_generate_access_token()
        {
            $wcmvp_curl_paypal = curl_init();
            curl_setopt($wcmvp_curl_paypal, CURLOPT_HEADER, false);
            curl_setopt($wcmvp_curl_paypal, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Accept-Language: en_US'));
            curl_setopt($wcmvp_curl_paypal, CURLOPT_VERBOSE, 1);
            curl_setopt($wcmvp_curl_paypal, CURLOPT_TIMEOUT, 30);
            curl_setopt($wcmvp_curl_paypal, CURLOPT_URL, $this->wcmvp_token_url);
            curl_setopt($wcmvp_curl_paypal, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($wcmvp_curl_paypal, CURLOPT_USERPWD, $this->wcmvp_paypal_client_id . ':' . $this->wcmvp_paypal_secret_key);
            curl_setopt($wcmvp_curl_paypal, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
            curl_setopt($wcmvp_curl_paypal, CURLOPT_SSLVERSION, 6);
            $wcmvp_curl_paypal_response = curl_exec($wcmvp_curl_paypal);
            curl_close($wcmvp_curl_paypal);
            $wcmvp_curl_paypal_response_array = json_decode($wcmvp_curl_paypal_response, true);
            $this->wcmvp_access_token = isset($wcmvp_curl_paypal_response_array['access_token']) ? $wcmvp_curl_paypal_response_array['access_token'] : '';
            $this->wcmvp_token_type = isset($wcmvp_curl_paypal_response_array['token_type']) ? $wcmvp_curl_paypal_response_array['token_type'] : '';
        }

        function wcmvp_process_paypal_payment()
        {
            $wcmvp_currency = get_woocommerce_currency();
            $wcmvp_api_authorization = "Authorization: {$this->wcmvp_token_type} {$this->wcmvp_access_token}";
            $wcmvp_paypal_note = sprintf( __('Payment recieved from %1$s as selling at %2$s on %3$s', 'wc-multi-vendor-platform-lite'), get_bloginfo('name'), date('H:i:s'), date('d-m-Y'));
            $wcmvp_request_params = '{
                                        "sender_batch_header": {
                                                "sender_batch_id":"' . uniqid() . '",
                                                "email_subject": "Payment Received",
                                                "recipient_type": "EMAIL"
                                        },
                                        "items": [
                                            {
                                                "recipient_type": "EMAIL",
                                                "amount": {
                                                    "value": ' . $this->wcmvp_withdraw_amount . ',
                                                    "currency": "' . $wcmvp_currency . '"
                                                },
                                                "receiver": "' . $this->wcmvp_vendor_paypal_email . '",
                                                "note": "' . $wcmvp_paypal_note . '",
                                                "sender_item_id": "' . $this->wcmvp_withdraw_user . '"
                                            }
                                        ]
                                    }';
                                    $wcmvp_curl_paypal = curl_init();
                                    curl_setopt($wcmvp_curl_paypal, CURLOPT_HEADER, false);
                                    curl_setopt($wcmvp_curl_paypal, CURLOPT_HTTPHEADER, array('Content-type:application/json', $wcmvp_api_authorization));
                                    curl_setopt($wcmvp_curl_paypal, CURLOPT_VERBOSE, 1);
                                    curl_setopt($wcmvp_curl_paypal, CURLOPT_TIMEOUT, 30);
                                    curl_setopt($wcmvp_curl_paypal, CURLOPT_URL, $this->wcmvp_api_url);
                                    curl_setopt($wcmvp_curl_paypal, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($wcmvp_curl_paypal, CURLOPT_POSTFIELDS, $wcmvp_request_params);
                                    curl_setopt($wcmvp_curl_paypal, CURLOPT_SSLVERSION, 6);
                                    $wcmvp_result = curl_exec($wcmvp_curl_paypal);
                                    curl_close($wcmvp_curl_paypal);
                                    $wcmvp_result_array = json_decode($wcmvp_result, true);
                                    $wcmvp_batch_status = $wcmvp_result_array['batch_header']['batch_status'];
    
                                    $wcmvp_payout_status = apply_filters('wcmvp_paypal_done_status', array('PENDING', 'PROCESSING', 'SUCCESS', 'NEW'));
                                    
                                    if(in_array($wcmvp_batch_status, $wcmvp_payout_status) )
                                    {
                                        $wcmvp_payment_processed_array = array(
                                            'wcmvp_payment_made_via' => 'paypal',
                                            'wcmvp_withdraw_amount' => $this->wcmvp_withdraw_amount,
                                            'wcmvp_receiver_email' => $this->wcmvp_vendor_paypal_email,
                                            'wcmvp_payment_currency' => $wcmvp_currency,
                                            'wcmvp_payout_batch_id' => $wcmvp_result_array['batch_header']['payout_batch_id'],
                                            'wcmvp_payout_batch_status' => $wcmvp_batch_status,
                                            'wcmvp_sender_batch_id' => $wcmvp_result_array['batch_header']['sender_batch_header']['sender_batch_id'],
                                        );
        
                                        global $wpdb;
        
                                        $wcmvp_withdraw_query = "UPDATE ".$wpdb->prefix."wcmvp_withdraw SET payment_processed_stmt=%s WHERE `id`=%d";
        
                                        $wpdb->get_var($wpdb->prepare( $wcmvp_withdraw_query,json_encode($wcmvp_payment_processed_array),$this->wcmvp_withdraw_status_id ));
        
                                        return('done');
                                    }
                                    else
                                    {
                                        return('Some Error Occurred');
                                    }
        }

    }

?>
