<?php

// This file contains the code for Splitting the order into suborder for vendors

$wcmvp_billing = WC()->countries->get_address_fields(WC()->countries->get_base_country(), 'billing_');
$wcmvp_shipping = WC()->countries->get_address_fields(WC()->countries->get_base_country(), 'shipping_');

$wcmvp_billing_and_shipping = array_merge(array_keys($wcmvp_billing),array_keys($wcmvp_shipping));

    $wcmvp_order_obj = new WC_Order();
    if(is_object($wcmvp_order_obj)){
    foreach ( $wcmvp_billing_and_shipping as $wcmvp_keys ) {
        if ( is_callable( array( $wcmvp_order_obj, "set_{$wcmvp_keys}" ) ) ) {
            $wcmvp_order_obj->{"set_{$wcmvp_keys}"}( $wcmvp_parent_order->{"get_{$wcmvp_keys}"}() );
        }
    }

    $this->wcmvp_add_line_items( $wcmvp_order_obj, $wcmvp_seller_products );
    $this->wcmvp_add_taxes( $wcmvp_order_obj, $wcmvp_parent_order, $wcmvp_seller_products );
    $this->wcmvp_add_coupons( $wcmvp_order_obj, $wcmvp_parent_order, $wcmvp_seller_products );
    $wcmvp_order_obj->set_created_via( 'wcmvp' );
    $wcmvp_order_obj->update_meta_data( 'wcmvp_order_vendor', $wcmvp_seller_id );
    $wcmvp_commision_val = $class->wcmvp_commission($wcmvp_seller_id,$wcmvp_order_obj->get_total());
    $wcmvp_order_obj->update_meta_data( 'wcmvp_admin_order_commision_for_vendor', $wcmvp_commision_val[0] );
    $wcmvp_order_obj->set_cart_hash( $wcmvp_parent_order->get_cart_hash() );
    $wcmvp_order_obj->set_customer_id( $wcmvp_parent_order->get_customer_id() );
    $wcmvp_order_obj->set_customer_note( $wcmvp_parent_order->get_customer_note() );
    $wcmvp_order_obj->set_prices_include_tax( $wcmvp_parent_order->get_prices_include_tax() );
    $wcmvp_order_obj->set_status( "wc-on-hold" );
    $wcmvp_order_obj->set_customer_user_agent( $wcmvp_parent_order->get_customer_user_agent() );
    $wcmvp_order_obj->set_customer_ip_address( $wcmvp_parent_order->get_customer_ip_address() );
    $wcmvp_order_obj->set_payment_method( $wcmvp_parent_order->get_payment_method() );
    $wcmvp_order_obj->set_payment_method_title( $wcmvp_parent_order->get_payment_method_title() );
    $wcmvp_order_obj->set_currency( $wcmvp_parent_order->get_currency() );
    $wcmvp_order_obj->calculate_totals();
    $wcmvp_price = $wcmvp_order_obj->get_total();
    $wcmvp_order_obj->set_parent_id( $wcmvp_parent_order->get_id() );
    $wcmvp_sub_id= $wcmvp_order_obj->get_id();
    $wcmvp_my_post = array(
    'ID'           =>  $wcmvp_sub_id,
    'post_author'  =>  $wcmvp_seller_id,
);
    wp_update_post($wcmvp_my_post, true);
    $wcmvp_order_obj->update_meta_data( 'is_suborder', 'yes' );
    $wcmvp_order_id = $wcmvp_order_obj->save();
    wc_update_total_sales_counts( $wcmvp_order_id );
    $this->wcmvp_add_shipping( $wcmvp_order_obj, $wcmvp_parent_order,$wcmvp_seller_id );
    do_action('wcmvp_commission_value_created',$wcmvp_order_obj,$wcmvp_commision_val[0],$wcmvp_price);
    do_action('wcmvp_vendor_balance_statement',$wcmvp_order_obj,$wcmvp_seller_id);
}else{
    return;
}