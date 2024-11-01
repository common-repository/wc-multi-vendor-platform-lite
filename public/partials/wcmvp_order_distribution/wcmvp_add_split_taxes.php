<?php

// This file Contains the code for splitting the taxes of order according to the vendor

$wcmvp_shipping  = $wcmvp_order_obj->get_items( 'wcmvp_shipping' );
$wcmvp_tax_total = 0;
if(!empty($wcmvp_products) && is_array($wcmvp_products)){
    foreach ( $wcmvp_products as $wcmvp_item ) {
        $wcmvp_tax_total += $wcmvp_item->get_total_tax();
    }
}
if(!empty($wcmvp_parent_order->get_taxes()) && is_array($wcmvp_parent_order->get_taxes())){
    foreach ( $wcmvp_parent_order->get_taxes() as $wcmvp_tax ) {
        $wcmvp_vendor_shipping = reset( $wcmvp_shipping );
        $wcmvp_item = new WC_Order_Item_Tax();
        $wcmvp_item->set_props( array(
            'rate_id'            => $wcmvp_tax->get_rate_id(),
            'label'              => $wcmvp_tax->get_label(),
            'compound'           => $wcmvp_tax->get_compound(),
            'rate_code'          => WC_Tax::get_rate_code( $wcmvp_tax->get_rate_id() ),
            'wcmvp_tax_total'          => $wcmvp_tax_total,
            'shipping_tax_total' => is_bool( $wcmvp_vendor_shipping ) ? '' : $wcmvp_vendor_shipping->get_total_tax()
        ) );
        $wcmvp_order_obj->add_item( $wcmvp_item );
    }
}
$wcmvp_order_obj->save();