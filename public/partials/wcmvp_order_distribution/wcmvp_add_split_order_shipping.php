<?php

// This file contains the code for splitting the shipping of order according to the vendor

$wcmvp_shipping_method = $wcmvp_parent_order->get_shipping_methods();
$wcmvp_order_vendor_id  = $wcmvp_seller_id;
$applied_shipping_method = '';
if ($wcmvp_shipping_method && !empty($wcmvp_shipping_method)) {
    foreach ($wcmvp_shipping_method as $wcmvp_item_id => $wcmvp_shipping_obj) {
        $wcmvp_ship_vendor_id = wc_get_order_item_meta($wcmvp_item_id, 'seller_id', true);
        if ($wcmvp_order_vendor_id == $wcmvp_ship_vendor_id) {
            $applied_shipping_method = $wcmvp_shipping_obj;
            break;
        }
    }
}

$wcmvp_ship_mode = apply_filters('wcmvp_shipping_method', $applied_shipping_method, $wcmvp_order_obj->get_id(), $wcmvp_parent_order);

if (!$wcmvp_ship_mode) {
    return;
}

if (is_a($wcmvp_ship_mode, 'WC_Order_Item_Shipping')) {
    $wcmvp_item = new WC_Order_Item_Shipping();
    $wcmvp_metadata = $wcmvp_ship_mode->get_meta_data();
    if ($wcmvp_metadata && !empty($wcmvp_metadata)) {
        foreach ($wcmvp_metadata as $wcmvp_meta) {
            $wcmvp_item->add_meta_data($wcmvp_meta->wcmvp_keys, $wcmvp_meta->value);
        }
    }
    $wcmvp_item->set_props(array(
        'method_title' => $wcmvp_ship_mode->get_name(),
        'method_id'    => $wcmvp_ship_mode->get_method_id(),
        'total'        => $wcmvp_ship_mode->get_total(),
        'taxes'        => $wcmvp_ship_mode->get_taxes(),
    ));
    
    $wcmvp_order_obj->add_item($wcmvp_item);
    $wcmvp_order_obj->set_shipping_total($wcmvp_ship_mode->get_total());
    $wcmvp_order_obj->save();
}
