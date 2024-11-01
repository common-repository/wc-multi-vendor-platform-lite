<?php 

/**This File contains methods of payment gateways and thier initial class */

class Wcmvp_Payment_Gateways
{

    public function __construct() {

        include_once(WCMVP_ADMIN_PARTIAL.'admin-includes/wcmvp-paypal-integration.php');
        include_once(WCMVP_ADMIN_PARTIAL.'admin-includes/wcmvp-stripe-integration.php');
        include_once(WCMVP_ADMIN_PARTIAL.'admin-includes/wcmvp-bank-transfer.php');
        do_action('wcmvp_load_payment_classes');
    }
    
    public function wcmvp_load_avail_method($wcmvp_withdraw_approve_method,$wcmvp_withdraw_approve_user,$wcmvp_withdraw_approve_amount,$wcmvp_withdraw_status_id)
    {
        $wcmvp_load_gateways = array(
            'Wcmvp_Paypal_Gateway',
            'Wcmvp_Stripe_Gateway',
            'Wcmvp_Bank_Transfer'
        );

        $wcmvp_load_gateways = apply_filters( 'wcmvp_add_custom_payment_gateways', $wcmvp_load_gateways );

        foreach ( $wcmvp_load_gateways as $wcmvp_gateway ) {
			if ( is_string( $wcmvp_gateway ) && class_exists( $wcmvp_gateway ) ) {
                $wcmvp_gateway = new $wcmvp_gateway();
                $wcmvp_return_msg = $wcmvp_gateway->wcmvp_process_payment($wcmvp_withdraw_approve_method,$wcmvp_withdraw_approve_user,$wcmvp_withdraw_approve_amount,$wcmvp_withdraw_status_id);
                if( isset($wcmvp_return_msg) && !empty($wcmvp_return_msg) )
                {
                    return $wcmvp_return_msg;
                }
            }
        }
    }
}


?>