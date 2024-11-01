<?php

// This file contains the code for the adding the line item in suborders

if(!empty($wcmvp_products) && is_array($wcmvp_products)){
    foreach ( $wcmvp_products as $wcmvp_units ) {
        $wcmvp_prod_units = new WC_Order_Item_Product(); 
        $wcmvp_metadata = $wcmvp_units->get_meta_data();
        if ( $wcmvp_metadata ) {
            foreach ( $wcmvp_metadata as $wcmvp_meta ) {
                $wcmvp_prod_units->add_meta_data( $wcmvp_meta->wcmvp_keys, $wcmvp_meta->value );
            }
        }
        $wcmvp_prod_units->set_quantity( $wcmvp_units->get_quantity() );
        $wcmvp_prod_units->set_total( $wcmvp_units->get_total() );
        $wcmvp_prod_units->set_product_id( $wcmvp_units->get_product_id() );
        $wcmvp_prod_units->set_variation_id( $wcmvp_units->get_variation_id() );
        $wcmvp_prod_units->set_taxes( $wcmvp_units->get_taxes() );
        $wcmvp_prod_units->set_subtotal( $wcmvp_units->get_subtotal() );
        $wcmvp_prod_units->set_subtotal_tax( $wcmvp_units->get_subtotal_tax() );
        $wcmvp_prod_units->set_total_tax( $wcmvp_units->get_total_tax() ); 
        $wcmvp_prod_units->set_tax_class( $wcmvp_units->get_tax_class() );
        $wcmvp_prod_units->set_name( $wcmvp_units->get_name() );
        
        $wcmvp_order_obj->add_item( $wcmvp_prod_units );
    }
} 
$wcmvp_order_obj->save();