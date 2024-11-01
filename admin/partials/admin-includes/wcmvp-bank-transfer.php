<?php 

/** This file contains code of php which used for integration of bank transfer */

    class Wcmvp_Bank_Transfer{

        function wcmvp_process_payment($wcmvp_withdraw_method,$wcmvp_withdraw_user,$wcmvp_withdraw_amount,$wcmvp_withdraw_id)
        {
            if( $wcmvp_withdraw_method == 'bank_transfer' )
            {
                $wcmvp_currency = get_woocommerce_currency();
                
                $wcmvp_payment_processed_array = array(
                    'wcmvp_payment_made_via' => 'bank_transfer',
                    'wcmvp_withdraw_amount' => $wcmvp_withdraw_amount,
                    'wcmvp_payment_currency' => $wcmvp_currency
                );
                
                global $wpdb;
                
                $wcmvp_withdraw_query = "UPDATE ".$wpdb->prefix."wcmvp_withdraw SET payment_processed_stmt=%s WHERE `id`=%d";
                
                $wpdb->get_var($wpdb->prepare( $wcmvp_withdraw_query,json_encode($wcmvp_payment_processed_array),$wcmvp_withdraw_id ));
                
                return 'done';
                
            }
        }

    }

?>