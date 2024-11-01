<?php 

use Stripe\Stripe;
use Stripe\Transfer;

/** This file contains code of php which used for integration of stripe */

    class Wcmvp_Stripe_Gateway{

        private $wcmvp_withdraw_method;
        private $wcmvp_withdraw_user;
        private $wcmvp_withdraw_amount;
        private $wcmvp_withdraw_id;
        private $wcmvp_stripe_client_id;
        private $wcmvp_stripe_secret_key;
        private $wcmvp_stripe_publishable_key;
        private $wcmvp_api_url;
        private $wcmvp_token_url;
        private $wcmvp_vendor_paypal_email;

        function wcmvp_process_payment($wcmvp_withdraw_method,$wcmvp_withdraw_user,$wcmvp_withdraw_amount,$wcmvp_withdraw_id)
        {
            if( $wcmvp_withdraw_method == 'stripe' )
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
            if( !empty(get_option('wcmvp_payment_gateway')))
            {
                $wcmvp_withdraw_option_data = get_option('wcmvp_payment_gateway');
                
                if(is_array($wcmvp_withdraw_option_data) && !empty($wcmvp_withdraw_option_data) )
                {
                    if(isset($wcmvp_withdraw_option_data['wcmvp_withdraw_stripe']) )
                    {
                        $wcmvp_withdraw_stripe  = $wcmvp_withdraw_option_data['wcmvp_withdraw_stripe'];
                    }
                    if( isset($wcmvp_withdraw_option_data['wcmvp_stripe_client_id']) )
                    {
                        $this->wcmvp_stripe_client_id  = $wcmvp_withdraw_option_data['wcmvp_stripe_client_id'];
                    }
                    if( isset($wcmvp_withdraw_option_data['wcmvp_stripe_secret_key']) )
                    {
                        $this->wcmvp_stripe_secret_key  = $wcmvp_withdraw_option_data['wcmvp_stripe_secret_key'];
                    }
                    if( isset($wcmvp_withdraw_option_data['wcmvp_withdraw_stripe_test_box']) )
                    {
                        $wcmvp_withdraw_stripe_test_box  = $wcmvp_withdraw_option_data['wcmvp_withdraw_stripe_test_box'];
                    }
                    if( isset($wcmvp_withdraw_option_data['wcmvp_stripe_publishable_key']) )
                    {
                        $this->wcmvp_stripe_publishable_key  = $wcmvp_withdraw_option_data['wcmvp_stripe_publishable_key'];
                    }
                    if( isset($wcmvp_withdraw_stripe) && !empty($wcmvp_withdraw_stripe) && ($wcmvp_withdraw_stripe == 1) )
                    {
                        if( isset($this->wcmvp_stripe_client_id) && !empty($this->wcmvp_stripe_client_id) && isset($this->wcmvp_stripe_secret_key) && !empty($this->wcmvp_stripe_secret_key) && isset($this->wcmvp_stripe_publishable_key) && !empty($this->wcmvp_stripe_publishable_key) )
                        {
                            if( isset($wcmvp_withdraw_stripe_test_box) && !empty($wcmvp_withdraw_stripe_test_box) && ($wcmvp_withdraw_stripe_test_box == 1) )
                            {
                                $wcmvp_stripe_test_mode = 'true';
                            }
                            
                            $this->wcmvp_vendor_stripe_id = get_user_meta($this->wcmvp_withdraw_user,'wcmvp_vendor_stripe_id',true);
                            
                            if( isset($this->wcmvp_vendor_stripe_id) && !empty($this->wcmvp_vendor_stripe_id) )
                            {
                                $wcmvp_generate_return = $this->wcmvp_stripe_payment_process();
                                
                                return $wcmvp_generate_return;
                            }
                            else
                            {
                                return('Please ask vendor to update his stripe id as mentioned in Stripe to receive payment');
                            }
                        }
                        else
                        {
                            return('Please Configure Stripe to Send Payment to Vendors');
                        }
                    }
                    else
                    {
                        return('Please Enable Stripe from setting to Send Payment to Vendors');
                    }
                }
            }
        }
    
        function wcmvp_stripe_payment_process()
        {
            if( !class_exists("Stripe\Stripe") ) {
                require_once( WCMVP_ASSETS.'/sdk/Stripe/init.php');
            }

            Stripe::setApiKey($this->wcmvp_stripe_secret_key);

            $this->wcmvp_currency = get_woocommerce_currency();
            
                try {
                    Stripe::setApiKey($this->wcmvp_stripe_secret_key);
        
                    $wcmvp_transfer_args = array(
                            'amount'              => $this->wcmvp_calculate_stripe_amount($this->wcmvp_currency,$this->wcmvp_withdraw_amount),
                            'currency'            => $this->wcmvp_currency,
                            'destination'         => $this->wcmvp_vendor_stripe_id,
                            'description'         => esc_html__('Payout for withdrawal ID #', 'wc-multi-vendor-platform-lite') . sprintf( '%06u', $this->wcmvp_withdraw_id )
                    );
        
                    $wcmvp_transfer = Transfer::create($wcmvp_transfer_args);
                    $result_array = $wcmvp_transfer->jsonSerialize();
        
                    $wcmvp_payment_processed_array = array(
                        'wcmvp_payment_made_via' => 'stripe',
                        'wcmvp_withdraw_amount' => $this->wcmvp_withdraw_amount,
                        'wcmvp_payment_currency' => $this->wcmvp_currency,
                        'wcmvp_transaction_id' => $result_array['id'],
                        'wcmvp_sender_batch_id' => $result_array['balance_transaction'],
                    );
        
                    global $wpdb;
        
                    $wcmvp_withdraw_query = "UPDATE ".$wpdb->prefix."wcmvp_withdraw SET payment_processed_stmt=%s WHERE `id`=%d";
        
                    $wpdb->get_var($wpdb->prepare( $wcmvp_withdraw_query,json_encode($wcmvp_payment_processed_array),$this->wcmvp_withdraw_id ));
        
                    $wcmvp_stripe_response = 'done';
        
                } catch (\Stripe\Error\InvalidRequest $e) {
                    $wcmvp_stripe_response = sprintf( 'Failed : %s', $e->getMessage() );
                    
                } catch (\Stripe\Error\Authentication $e) {
                    $wcmvp_stripe_response = sprintf( 'Failed : %s', $e->getMessage() );
                    
                } catch (\Stripe\Error\ApiConnection $e) {
                    $wcmvp_stripe_response = sprintf( 'Failed : %s', $e->getMessage() );
        
                } catch (\Stripe\Error\Base $e) {
                    $wcmvp_stripe_response = sprintf( 'Failed : %s', $e->getMessage() );
        
                } catch (Exception $e) {
                    $wcmvp_stripe_response = sprintf( 'Failed : %s', $e->getMessage() );
                }
            
            return $wcmvp_stripe_response;
        }

        function wcmvp_calculate_stripe_amount() {

            switch( strtoupper( $this->wcmvp_currency ) ) {
                
                case 'BIF' :
                case 'CLP' :
                case 'DJF' :
                case 'GNF' :
                case 'JPY' :
                case 'KMF' :
                case 'KRW' :
                case 'MGA' :
                case 'PYG' :
                case 'RWF' :
                case 'VND' :
                case 'VUV' :
                case 'XAF' :
                case 'XOF' :
                case 'XPF' :
                    $wcmvp_amount_to_be_paid = absint( $this->wcmvp_withdraw_amount );
                    break;
                default :
                    $wcmvp_amount_to_be_paid = round( $this->wcmvp_withdraw_amount, 2 ) * 100;
                    break;
            }
            return $wcmvp_amount_to_be_paid;
        }

    }

?>