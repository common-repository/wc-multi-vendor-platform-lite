<?php 

// This file contains the code for edit product

if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {
	$wcmvp_edit_product_ID = sanitize_text_field($_POST['wcmvp_data_ID']);
	$wcmvp_product_data = wc_get_product($wcmvp_edit_product_ID);
	$wcmvp_temp_attach_id =  $wcmvp_product_data->get_image_id();
	if(wp_get_attachment_image_src($wcmvp_temp_attach_id)){
		$wcmvp_temp_attach_src = wp_get_attachment_image_src($wcmvp_temp_attach_id)[0];
	}else{
		$wcmvp_temp_attach_src = "";
	}
	$wcmvp_temp_name  =  $wcmvp_product_data->get_name();
	$wcmvp_temp_reg_price  =  $wcmvp_product_data->get_regular_price();
	$wcmvp_temp_sale_price  =  $wcmvp_product_data->get_sale_price();
	$wcmvp_temp_cat  =  $wcmvp_product_data->get_category_ids();
	$wcmvp_temp_tag  =  $wcmvp_product_data->get_tag_ids();
	$wcmvp_temp_desc   =  $wcmvp_product_data->get_description();
	$wcmvp_temp_short_desc = $wcmvp_product_data->get_short_description();
	$wcmvp_temp_sku = $wcmvp_product_data->get_sku();
	$wcmvp_is_downloadable = $wcmvp_product_data->get_downloadable();
	$wcmvp_temp_downloadable = $wcmvp_product_data->get_downloads();
	$wcmvp_temp_stock_status = $wcmvp_product_data->get_stock_status();
	$wcmvp_down_name = array();
	$wcmvp_down_path = array();
	$wcmvp_down_id = array();
	global $wpdb;
	$wp_query = "SELECT ID FROM $wpdb->posts WHERE guid='%s'";
	if(!empty($wcmvp_temp_downloadable) && is_array($wcmvp_temp_downloadable)){
		foreach ($wcmvp_temp_downloadable as $key => $value) {
			$attachment = $wpdb->get_col($wpdb->prepare($wp_query, $value->get_file() ));
			$attachment = (!empty($attachment))? $attachment[0]: 0;
			$wcmvp_down_name[] = array($value->get_name(),$value->get_file(),$attachment);
		}
	}
	$wcmvp_prod_array = array(
		'temp_attach_id' => $wcmvp_temp_attach_id,
		'temp_name' => esc_html__($wcmvp_temp_name,"wc-multi-vendor-platform-lite"),
		'temp_reg_price' => esc_html__($wcmvp_temp_reg_price,"wc-multi-vendor-platform-lite"), 
		'temp_sale_price' => esc_html__($wcmvp_temp_sale_price,"wc-multi-vendor-platform-lite"),
		'temp_cat' => $wcmvp_temp_cat,
		'wcmvp_temp_tag'	=>	$wcmvp_temp_tag,
		'temp_desc' => esc_html__($wcmvp_temp_desc,"wc-multi-vendor-platform-lite"),
		'temp_short_desc' => esc_html__($wcmvp_temp_short_desc,"wc-multi-vendor-platform-lite"),
		'temp_sku' => esc_html__($wcmvp_temp_sku,"wc-multi-vendor-platform-lite"),
		'temp_stock_status' =>  esc_html__($wcmvp_temp_stock_status,"wc-multi-vendor-platform-lite"),
		'temp_attach_src' =>  $wcmvp_temp_attach_src,
		'wcmvp_temp_downloadable' =>  $wcmvp_down_name,
		'wcmvp_is_downloadable'=>$wcmvp_is_downloadable,
	);
	$wcmvp_detail_array = apply_filters("wcmvp_vendor_edit_request",$wcmvp_prod_array,$wcmvp_edit_product_ID);
	echo json_encode($wcmvp_detail_array);
}
wp_die();
