<?php

// This file has the function for adding coupon to the suborder

$wcmvp_redeemed_vouchers = $wcmvp_parent_order->get_items( 'coupon' );
        $wcmvp_product_ids = array_map( function( $wcmvp_item ) {
            return $wcmvp_item->get_product_id();
        }, $wcmvp_products );
        if ( ! $wcmvp_redeemed_vouchers ) {
            return;
        }
        if(!empty($wcmvp_redeemed_vouchers) && (is_array($wcmvp_redeemed_vouchers)  ||  is_object($wcmvp_redeemed_vouchers))){
           foreach ( $wcmvp_redeemed_vouchers as $wcmvp_item ) {
           $wcmvp_coupon = new WC_Coupon( $wcmvp_item->get_code() );  
           if ( $wcmvp_coupon && !is_wp_error( $wcmvp_coupon ) && array_intersect( $wcmvp_product_ids, $wcmvp_coupon->get_product_ids() ) ) {
            $wcmvp_new_item = new WC_Order_Item_Coupon();
            $wcmvp_new_item->set_props( array(
                'code'         => $wcmvp_item->get_code(),
                'discount'     => $wcmvp_item->get_discount(),
                'discount_tax' => $wcmvp_item->get_discount_tax(),
            ) );
            $wcmvp_new_item->add_meta_data( 'coupon_data', $wcmvp_coupon->get_data() );
            $wcmvp_order_obj->add_item( $wcmvp_new_item );
            }
            }
        } 
       
        $wcmvp_order_obj->save();