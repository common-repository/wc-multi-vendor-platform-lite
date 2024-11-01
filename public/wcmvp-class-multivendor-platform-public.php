<?php

/**
 * The public-specific functionality of the plugin.
 *
 * @link       www.codexinfra.com
 * @since      1.0.0
 *
 * @package    Wcmvp_Multivendor_Platform
 * @subpackage Wcmvp_Multivendor_Platform/public
 */

/**
 * The public-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-specific stylesheet and JavaScript.
 *
 * @package    Wcmvp_Multivendor_Platform
 * @subpackage Wcmvp_Multivendor_Platform/public
 * @author     CodexInfra <developers@codexinfra.com>
 */
class Wcmvp_Multivendor_Platform_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $wcmvp_plugin_name    The ID of this plugin.
	 */
	private $wcmvp_plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $wcmvp_version    The current version of this plugin.
	 */
	private $wcmvp_version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $wcmvp_plugin_name       The name of this plugin.
	 * @param      string    $wcmvp_version    The version of this plugin.
	 */
	public function __construct($wcmvp_plugin_name, $wcmvp_version)
	{
		$this->wcmvp_plugin_name = $wcmvp_plugin_name;
		$this->wcmvp_version = $wcmvp_version;
	}

	/**
	 * Register the stylesheets for the public area.
	 *
	 * @since    1.0.0
	 */
	public function wcmvp_enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the wcmvp_run() function
		 * defined in Wcmvm_Multivendor_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wcmvm_Multivendor_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$wcmvp_options = get_option("wcmvp_page_setting");
		wp_enqueue_style('select2_css', WCMVP_ASSETS_COMMON_CSS . 'select2.min.css', array(), $this->wcmvp_version, 'all');
		wp_register_style( 'jquery-ui', plugin_dir_url(__FILE__) . 'css/jquery-ui.min.css', array(), $this->wcmvp_version, 'all' );
		wp_enqueue_style( 'jquery-ui' ); 
		wp_enqueue_style( 'select2css' );
		wp_enqueue_style("wcmvp_time_picker", plugin_dir_url(__FILE__) . 'css/timepicker.min.css', array(), $this->wcmvp_version, 'all');
		wp_enqueue_style("wcmvp_font_awesome", plugin_dir_url(__FILE__) . 'css/font_awesome.css', array(), $this->wcmvp_version, 'all');
		wp_enqueue_style( 'woocommerce_style', get_template_directory_uri() . '/assets/css/woocommerce/woocommerce.css',array(), $this->wcmvp_version, 'all');
		if (!empty($wcmvp_options) && is_array($wcmvp_options)) {
			$wcmvp_title = $wcmvp_options['wcmvp_page_setting_dashboard'];
			$wcmvp_store = $wcmvp_options['wcmvp_page_store_listing'];
		} else {
			$wcmvp_title = "";
			$wcmvp_store = "";
		}
		global $wp_query;
		if ($wp_query->get_queried_object_id() == $wcmvp_title && (current_user_can("multivendor-platformr"))) {
			wp_enqueue_style( "wcmvp_bundleCSS", WCMVP_ASSETS_BUNDLE_JS . 'css/bundle.css', array(), $this->wcmvp_version, 'all' );
			wp_enqueue_style( "wcmvp_material-icons", 'https://fonts.googleapis.com/icon?family=Material+Icons' , array(), $this->wcmvp_version, 'all' );		// This file has the material design icons pack
			wp_enqueue_style('material-datatable-ajax', WCMVP_ASSETS_COMMON_CSS . 'material.min.css', array(), $this->wcmvp_version, 'all');
			wp_enqueue_style('material-datatables', WCMVP_ASSETS_COMMON_CSS . 'dataTables.material.min.css', array(), $this->wcmvp_version, 'all');
			wp_enqueue_style("wcmvp_lite_theme_css", plugin_dir_url(__FILE__) . 'css/wcmvp_lite_material_css.css', array(), $this->wcmvp_version, 'all');
			wp_enqueue_style("wcmvp_multivendor_platform_shortcode_page_css", plugin_dir_url(__FILE__) . 'css/wcmvp-multivendor-platform-shortcode-page.css', array(), $this->wcmvp_version, 'all');
			global $wp_styles;
			global $wp_themes;
			$wp_get_theme = wp_get_theme();
			$parent_theme = $wp_get_theme->get_stylesheet();
			foreach( $wp_styles->queue as $style ):
				$handle = $wp_styles->registered[$style]->handle;
				$wcmvp_css_exception = array(
					"wc_block" =>	"wc-block-style",
					"wp_block" =>	"wp-block-library",
					"wp_block_library" =>	"wp-block-library-theme",
					"admin_bar" =>	 "admin-bar",
					"wcmvp_bundle" =>	"wcmvp_bundleCSS",
					"wcmvp_material_icons" =>	 "wcmvp_material-icons" ,
					"wcmvp_material_datatable" =>	"material-datatable-ajax",
					"wcmvp_datatable" =>	 "material-datatables",
					"wcmvp_select2" =>	"select2_css",
					"wcmvp_date_picker" =>	"jquery-ui",
					"wcmvp_lite_theme" =>	"wcmvp_lite_theme_css",
					"wcmvp_vendor_shortcode" =>	"wcmvp_multivendor_platform_shortcode_page_css",
					"wcmvp_font_awesome" =>	"wcmvp_font_awesome",
					"wcmvp_woocommerce" =>	"woocommerce-inline",
					"media_view" =>	 "media-views",
					"wcmvp_jquery" =>	"wcmvp_jquery_css",
					"wcmvp_image" =>	"imgareaselect",
					"wcmvp_woocommerce_style" =>	 "woocommerce_style",
					"wcmvp_timepicker_style"	=>	"wcmvp_time_picker"
				);
				$wcmvp_css_exception = apply_filters("wcmvp_include_css",$wcmvp_css_exception );    
				if( !in_array( $handle, $wcmvp_css_exception ) ){
					wp_dequeue_style( $handle );
					wp_deregister_style( $handle );
				}
			endforeach;
		
		}
		$wcmvp_var  =  get_query_var('wcmvp_pagename');
		$wcmvp_options_array  =  get_option('wcmvp_general_setting');
		if (!empty($wcmvp_options_array) && is_array($wcmvp_options_array)) {
			$wcmvp_endpoint_page = $wcmvp_options_array['wcmvp_store_url'];
		} else {
			$wcmvp_endpoint_page = "";
		}
		$wcmvp_current_id =  $wp_query->get_queried_object_id();
		if ($wcmvp_var == $wcmvp_endpoint_page || $wcmvp_current_id == $wcmvp_store) {
			wp_enqueue_style( "wcmvp_bundleCSS", WCMVP_ASSETS_BUNDLE_JS . 'css/bundle.css', array(), $this->wcmvp_version, 'all' );
			wp_enqueue_style( "wcmvp_material-icons", 'https://fonts.googleapis.com/icon?family=Material+Icons' , array(), $this->wcmvp_version, 'all' );		// This file has the material design icons pack
			wp_enqueue_style("wcmvp_store_css", plugin_dir_url(__FILE__) . 'css/wcmvp_store.css', array(), $this->wcmvp_version, 'all');
		}
		$wcmvp_map_per = get_option('wcmvp_appearence_page');
		if (is_array($wcmvp_map_per)) {
			$wcmvp_map_show = $wcmvp_map_per['wcmvp_enable_map'];
		} else {
			$wcmvp_map_show = 0;
		}
		if ($wcmvp_map_show == 1) {
			$wcmvp_current_map = $wcmvp_map_per['wcmvp_current_using_map'];
			if ($wcmvp_current_map == "mapbox") {
				wp_enqueue_style("wcmvp_mapbox_css", plugin_dir_url(__FILE__) . 'css/mapbox.css', array(), $this->wcmvp_version, 'all');
			}
		}
		wp_enqueue_style("wcmvp_multivendor_platform_public_css", plugin_dir_url(__FILE__) . 'css/wcmvp-multivendor-platform-public.css', array(), $this->wcmvp_version, 'all');

	}

	/**
	 * Register the JavaScript for the public area.
	 *
	 * @since    1.0.0
	 */
	public function wcmvp_enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the wcmvp_run() function
		 * defined in Wcmvm_Multivendor_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wcmvm_Multivendor_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$wcmvp_var  =  get_query_var('wcmvp_pagename');
		$wcmvp_options = get_option("wcmvp_page_setting");
		global $wp;
		wp_enqueue_script( 'select2' );
		wp_enqueue_script( 'jquery-ui-datepicker');
		wp_enqueue_script("wcmvp_time_picker_js", plugin_dir_url(__FILE__) . 'js/jquery.timepicker.min.js', array('jquery'), $this->wcmvp_version, false);
		wp_enqueue_script('wcmvp_chart', WCMVP_ASSETS_COMMON_JS . 'Chart.min.js', array('jquery'), $this->wcmvp_version, false);
		wp_enqueue_script( "bundleJs", WCMVP_ASSETS_BUNDLE_JS . 'js/bundle.js', array(), $this->wcmvp_version, 'all' );
		wp_enqueue_script('material_dataTable_Js', WCMVP_ASSETS_COMMON_JS . "jquery.dataTables.min.js", array('jquery'), $this->wcmvp_version, 'all');
		wp_enqueue_script('material_dataTable_Js2', WCMVP_ASSETS_COMMON_JS . "dataTables.material.min.js", array('jquery',"material_dataTable_Js"), $this->wcmvp_version, 'all');
		wp_enqueue_script('nicescrolljs', WCMVP_ASSETS_COMMON_JS . 'jquery.nicescroll.min.js', array('jquery'), $this->wcmvp_version, 'all');
		wp_enqueue_script('notify', WCMVP_ASSETS_URL . '/notify.min.js', array('jquery'), $this->wcmvp_version, false);
		wp_localize_script(
			'wcmvp_public_js',
			'wcmvp_public_ajax',
			array('wcmvp_public_ajax_url' => admin_url('admin-ajax.php'),'wcmvp_translation' => $this->wcmvp_multivendor_platform_lite_translations(), 'wcmvp_public_ajax_nonce' => wp_create_nonce("wcmvp_multivendor_platform_check_nonce"))
		);
		if (!empty($wcmvp_options) && is_array($wcmvp_options)) {
			$wcmvp_title = $wcmvp_options['wcmvp_page_setting_dashboard'];
			$wcmvp_store = $wcmvp_options['wcmvp_page_store_listing'];
		} else {
			$wcmvp_title  =  "";
			$wcmvp_store  =  "";
		}
		$wcmvp_options_array  =  get_option('wcmvp_general_setting');
		if (!empty($wcmvp_options_array) && is_array($wcmvp_options_array)) {
			$wcmvp_endpoint_page = $wcmvp_options_array['wcmvp_store_url'];
		} else {
			$wcmvp_endpoint_page = "";
		}
		global $wp_query;
		if (($wp_query->get_queried_object_id() == $wcmvp_title && (current_user_can("multivendor-platformr")))) {
			wp_enqueue_script('ajax-script', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-public.js', array('jquery',"nicescrolljs","material_dataTable_Js2","select2","wcmvp_time_picker_js"), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp_product_all', plugin_dir_url(__FILE__) . 'js/wcmvp_product_all.js', array('jquery', 'ajax-script'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp_order_all', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform_order_all.js', array('jquery', 'ajax-script'), $this->wcmvp_version, false);
			wp_enqueue_media();
			wp_enqueue_script('wcmvp_mediajs', plugin_dir_url(__FILE__) . 'js/wcmvp_media.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp_store_setting', plugin_dir_url(__FILE__) . 'js/wcmvp_vendor_store_page.js', array('jquery', 'ajax-script','wcmvp_time_picker_js'), $this->wcmvp_version, false);
			wp_localize_script(
				'ajax-script',
				'wcmvp_ajax_object',
				array('wcmvp_ajax_url' => admin_url('admin-ajax.php'),	'wcmvp_translation' => $this->wcmvp_multivendor_platform_lite_translations(), 'wcmvp_ajax_nonce' => wp_create_nonce("wcmvp_multivendor_platform_check_nonce"))
			);
			wp_enqueue_script('wcmvp_withdraw_req', plugin_dir_url(__FILE__) . 'js/wcmvp_Withdraw_page.js', array('jquery', 'ajax-script'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp_payment_page', plugin_dir_url(__FILE__) . 'js/wcmvp_payments_page.js', array('jquery', 'ajax-script'), $this->wcmvp_version, false);
			$wcmvp_map_per = get_option('wcmvp_appearence_page');
			if (is_array($wcmvp_map_per)) {
				$wcmvp_map_show = $wcmvp_map_per['wcmvp_enable_map'];
			} else {
				$wcmvp_map_show = 0;
			}
			if ($wcmvp_map_show == 1) {
				$wcmvp_current_map = $wcmvp_map_per['wcmvp_current_using_map'];
				if ($wcmvp_current_map == "googlemap") {
					$wcmvp_vendor_map_key = get_user_meta(get_current_user_id(), "wcmvp_map_api_key", true);
					wp_enqueue_script('wcmvp_endpoint_map',  'https://maps.googleapis.com/maps/api/js?key=' . $wcmvp_vendor_map_key, array('jquery'), $this->wcmvp_version, false);		// This cdn is used for google maps which has the secret key attach to it
				} else {
					wp_enqueue_script(
						'wcmvp_mapbox',
						plugin_dir_url(__FILE__) . 'js/mapbox.js',
						array('jquery', 'ajax-script'),
						$this->wcmvp_version,
						false
					);
				}
			}
		}
		if ($wcmvp_var == $wcmvp_endpoint_page) {
			$wcmvp_var  =  get_query_var('wcmvp_nicename');
			$wcmvp_vendor_detail_obj  =  get_user_by('slug', $wcmvp_var);
			if (is_object($wcmvp_vendor_detail_obj)) {
				$wcmvp_vendor_id = $wcmvp_vendor_detail_obj->data->ID;
				$wcmvp_map_per = get_option('wcmvp_appearence_page');
				if (is_array($wcmvp_map_per)) {
					$wcmvp_map_show = $wcmvp_map_per['wcmvp_enable_map'];
				} else {
					$wcmvp_map_show = 0;
				}
				if ($wcmvp_map_show == 1) {
					$wcmvp_current_map = $wcmvp_map_per['wcmvp_current_using_map'];
					if ($wcmvp_current_map == "googlemap") {
						$wcmvp_vendor_map_key = get_user_meta($wcmvp_vendor_id, "wcmvp_map_api_key", true);
						if (!empty($wcmvp_vendor_map_key)) {
							wp_enqueue_script('wcmvp_endpoint_map',  'https://maps.googleapis.com/maps/api/js?key=' . $wcmvp_vendor_map_key, array('jquery'), $this->wcmvp_version, false);		// This cdn is used for google maps which has the secret key attach to it
						}
					} else {
						wp_enqueue_script(
							'wcmvp_mapbox',
							plugin_dir_url(__FILE__) . 'js/mapbox.js',
							array('jquery', 'ajax-script'),
							$this->wcmvp_version,
							false
						);
					}
				}
			}
			wp_enqueue_script('wcmvp_store_endpoint_js',  plugin_dir_url(__FILE__) . 'js/wcmvp_store_endpoint.js', array('jquery'), $this->wcmvp_version, false);
		}
		$wcmvp_acc_page = get_option('woocommerce_myaccount_page_id');
		if ($wp_query->get_queried_object_id() == (int) $wcmvp_store) {
			$wcmvp_map_key = get_option('wcmvp_appearence_page');
			if (is_array($wcmvp_map_key) && isset($wcmvp_map_key['wcmvp_google_map_value']) && !empty($wcmvp_map_key['wcmvp_google_map_value'])) {
				$wcmvp_key = $wcmvp_map_key['wcmvp_google_map_value'];
				wp_enqueue_script('wcmvp_store_listing_map',  'https://maps.googleapis.com/maps/api/js?key=' . $wcmvp_key, array('jquery'), $this->wcmvp_version, false);	// This cdn is used for google maps which has the secret key attach to it
			}
			wp_enqueue_script('wcmvp_store_listing',  plugin_dir_url(__FILE__) . 'js/wcmvp_store_listing.js', array('jquery'), $this->wcmvp_version, false);
			wp_localize_script(
				'wcmvp_store_listing',
				'wcmvp_ajax_object',
				array(
					'wcmvp_ajax_url' => admin_url('admin-ajax.php'),
					'wcmvp_translation' => $this->wcmvp_multivendor_platform_lite_translations(), 'wcmvp_ajax_nonce' => wp_create_nonce("wcmvp_multivendor_platform_check_nonce")
				)
			);
		}
		if ($wp_query->get_queried_object_id() == $wcmvp_acc_page) {
			wp_enqueue_script('wcmvp_registration_page_js',  plugin_dir_url(__FILE__) . 'js/wcmvp-registration-page.js', array('jquery'), $this->wcmvp_version, false);
		}
		wp_enqueue_script('wcmvp_img_pro',plugin_dir_url(__FILE__) . 'js/wcmvp_img_pro.js',array(),$this->wcmvp_version);
	}

	//=============   function for Store page woocommerce breadcrumb     ==========================//

function wcmvp_woocommerce_breadcrumb( $wcmvp_breadcrumbs ) {
	$wcmvp_var  =  get_query_var('wcmvp_pagename');
	$wcmvp_nicename  =  get_query_var('wcmvp_nicename');
	$wcmvp_options_array  =  get_option('wcmvp_general_setting');
	if (!empty($wcmvp_options_array) && is_array($wcmvp_options_array)) {
		$wcmvp_endpoint_page = $wcmvp_options_array['wcmvp_store_url'];
	} else {
		$wcmvp_endpoint_page = "";
	}
	if($wcmvp_var == $wcmvp_endpoint_page){
	 $wcmvp_breadcrumbs[1] = array(esc_html__($wcmvp_var,"wc-multi-vendor-platform-lite"),esc_url(home_url() . "/" . $wcmvp_endpoint_page));
	 $wcmvp_breadcrumbs[2] = array(esc_html__($wcmvp_nicename,"wc-multi-vendor-platform-lite"),"");
	}
	return $wcmvp_breadcrumbs;
}

	//=============   function for translation text     ==========================//

	function wcmvp_multivendor_platform_lite_translations()
	{
		$wcmvp_translation_array = require(WCMVP_PUBLIC_PARTIAL . "wcmvp_multivendor_platform_translations.php");
		return $wcmvp_translation_array;
	}

	//=============   function for vendor related attachments shown     ==========================//

	function wcmvp_manager($wcmvp_query)
	{
		$user_id = get_current_user_id();
		$wcmvp_query['author'] = $user_id;
		return $wcmvp_query;
	}

	//=============  function for commission      ==========================//

	function wcmvp_commission($wcmvp_author, $wcmvp_price)
	{
		$wcmvp_meta_commision = get_user_meta($wcmvp_author, 'wcmvp_admin_vendor_commssion', true);
		$wcmvp_meta_value = get_user_meta($wcmvp_author, 'wcmvp_vendor_admin_commision_value', true);
		if (!empty($wcmvp_meta_commision) && !empty($wcmvp_meta_value)) {
			$wcmvp_commision_type = $wcmvp_meta_commision;
			$wcmvp_commision = $wcmvp_meta_value;
		} else {
			$wcmvp_option  =   get_option('wcmvp_selling_page');
			if (isset($wcmvp_option['wcmvp_commission_type'])) {
				$wcmvp_commision_type  =   $wcmvp_option['wcmvp_commission_type'];
			}
			if (isset($wcmvp_option['wcmvp_comission_value'])) {
				$wcmvp_commision   =   $wcmvp_option['wcmvp_comission_value'];
			}
		}
		if (isset($wcmvp_commision_type) && $wcmvp_commision_type ==  "percentage") {
			$wcmvp_saving_commission   =   ((float)$wcmvp_price / 100) *  (float) $wcmvp_commision;
			$wcmvp_saving  =   $wcmvp_saving_commission;
		} elseif (isset($wcmvp_commision_type) && $wcmvp_commision_type == "flat") {
			$wcmvp_saving_commission   =  $wcmvp_commision;
			$wcmvp_saving  =   $wcmvp_saving_commission;
		}else{
			$wcmvp_saving  = 0;
		} 
		if (isset($wcmvp_saving) && isset($wcmvp_commision_type) && isset($wcmvp_price)) {
			$wcmvp_saving = apply_filters("wcmvp_commision_array", $wcmvp_saving, $wcmvp_commision_type, $wcmvp_price);
		}
		if (isset($wcmvp_saving) && isset($wcmvp_commision_type)) {
			$wcmvp_array = array($wcmvp_saving, $wcmvp_commision_type);
		} else {
			$wcmvp_array = array(0, "");
		}
		return $wcmvp_array;
	}

	//=============  function for order handling of multiple vendors     ==========================//

	function wcmvp_order_handler($wcmvp_order_id)
	{
		if ((!empty($wcmvp_order_id))) {
			$wcmvp_order = wc_get_order($wcmvp_order_id);
			$parent_order = $wcmvp_order->get_items();
			if (!empty($parent_order)) {
				foreach ($parent_order as $wcmvp_item) {
					$wcmvp_product_id = $wcmvp_item['product_id'];
					$wcmvp_item_id[] = $wcmvp_item['item_id'];
					$wcmvp_author_array[] = get_post_field('post_author', $wcmvp_product_id);
					$wcmvp_auth = get_post_field('post_author', $wcmvp_product_id);
					$wcmvp_array[$wcmvp_auth][] = $wcmvp_item;
				}
			}
			if (isset($wcmvp_array)) {
				if (count($wcmvp_array) < 2) {
					$wcmvp_order->update_meta_data('wcmvp_order_vendor', $wcmvp_author_array[0]);
					$wcmvp_price = $wcmvp_order->get_total();
					$wcmvp_commision_val = $this->wcmvp_commission($wcmvp_author_array[0], $wcmvp_price);
					$wcmvp_meta_commision = get_user_meta($wcmvp_author_array[0], 'wcmvp_admin_vendor_commssion', true);
					$wcmvp_meta_value = get_user_meta($wcmvp_author_array[0], 'wcmvp_vendor_admin_commision_value', true);
					$wcmvp_order->update_meta_data('wcmvp_admin_order_commision_for_vendor', $wcmvp_commision_val[0]);
					$wcmvp_order->save();
					do_action('wcmvp_commission_value_created', $wcmvp_order, $wcmvp_commision_val[0], $wcmvp_price);
					do_action('wcmvp_vendor_balance_statement', $wcmvp_order, $wcmvp_author_array[0]);
				} else {
					$wcmvp_order->update_meta_data('wcmvp_sub_order', true);
					$wcmvp_order->save();
					if (!empty($wcmvp_array)) {
						foreach ($wcmvp_array as $seller_id => $seller_products) {
							$this->wcmvp_order_distribution($wcmvp_order, $seller_id, $seller_products, $this);
						}
					}
				}
			}
		}
	}

		//=============  function for order distribution according to vendor    ==========================//

	function wcmvp_order_distribution( $wcmvp_parent_order, $wcmvp_seller_id, $wcmvp_seller_products,$class ) {
		include WCMVP_PUBLIC_ORDER_DISTRIBUTION . "wcmvp_order_distribution.php";	
    }


		//=============  function for order line item distribution according to vendor    ==========================//

    function wcmvp_add_line_items( $wcmvp_order_obj, $wcmvp_products ) { 
		include WCMVP_PUBLIC_ORDER_DISTRIBUTION . "wcmvp_add_line_items.php"; 
    }
   

			//=============  function for order shipping distribution according to vendor    ==========================//

    function wcmvp_add_shipping( $wcmvp_order_obj, $wcmvp_parent_order ,  $wcmvp_seller_id ) { 
		include WCMVP_PUBLIC_ORDER_DISTRIBUTION . "wcmvp_add_split_order_shipping.php";
		}


			//=============  function for order taxes distribution according to vendor     ==========================//

    function wcmvp_add_taxes( $wcmvp_order_obj, $wcmvp_parent_order, $wcmvp_products ) {
		include WCMVP_PUBLIC_ORDER_DISTRIBUTION . "wcmvp_add_split_taxes.php";
	}
	
    
			//=============  function for order coupons distribution according to vendor     ==========================//

    function wcmvp_add_coupons( $wcmvp_order_obj, $wcmvp_parent_order, $wcmvp_products ) {	
		include WCMVP_PUBLIC_ORDER_DISTRIBUTION . "wcmvp_add_coupons.php";
    }

	//=============  function for restore products ajax     ==========================//


	function restore_prod_ajax_cb()
	{
		if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {

			if (isset($_POST) && !empty($_POST)) {
				if (isset($_POST['wcmvp_data_ID']) && !empty($_POST['wcmvp_data_ID'])) {
					$this->wcmvp_count_function();

					$wcmvp_product_ID = sanitize_text_field(intval($_POST['wcmvp_data_ID']));

					$wcmvp_status  =  wp_untrash_post($wcmvp_product_ID);

					if (!empty($wcmvp_status)) {

						echo json_encode("restore successfully");
					}
				}
			}
		}
		wp_die();
	}

	//=============  function for delete product from product table     ==========================//


	function wcmvp_trash_delete_product()
	{
		if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {
			if (isset($_POST) && !empty($_POST)) {
				if (isset($_POST['wcmvp_data_ID']) && !empty($_POST['wcmvp_data_ID'])) {
					$wcmvp_product_ID = sanitize_text_field($_POST['wcmvp_prod_ID']);
					$wcmvp_status = wp_delete_post(intval($wcmvp_product_ID));
					if ($wcmvp_status != 0) {
						echo json_encode("deleted successfully");
					}
				}
			}
		}
		wp_die();
	}

	//=============  function for order table     ==========================//

	function wcmvp_order_all_datatable()
	{
		if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {
		 include_once WCMVP_PUBLIC_PARTIAL . "wcmvp_vendor_order_table.php";  
		}
		wp_die();
	}

	//=============  function for withdraw table      ==========================//


	function wcmvp_withdraw_all_table_cb()
	{
		if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {
			global $wpdb;
			$wcmvp_table = $wpdb->prefix . 'wcmvp_withdraw';
			$wcmvp_primaryKey = 'id';
			if (isset($_POST['cond'])) {
				$wcmvp_whithdraw_table_cond = sanitize_text_field($_POST['cond']);
			}

			$columns = array(
				array('db' => 'amount', 'dt' => 0, 'field' => 'amount'),
				array('db' => 'method', 'dt' => 1, 'field' => 'method'),
				array('db' => 'date',   'dt' => 2, 'field' => 'date'),
				array('db' => 'id',   'dt' => 3, 'field' => 'id'),
				array('db' => 'status',   'dt' => 4, 'field' => 'status'),
			);

			$sql_details = array(
				'user' => DB_USER,
				'pass' => DB_PASSWORD,
				'db'   => DB_NAME,
				'host' => DB_HOST
			);

			$where = "`user_id`=" . get_current_user_id();
			if (isset($wcmvp_whithdraw_table_cond)) {
				if ($wcmvp_whithdraw_table_cond == "request") {
					$equals2 = "`status`='pending'";
					$where .= ' AND ' . $equals2;
				} elseif ($wcmvp_whithdraw_table_cond == "approved") {
					$equals2 = "`status`='approved'";
					$where .= ' AND ' . $equals2;
				} elseif ($wcmvp_whithdraw_table_cond == "cancelled") {
					$equals2 = "`status`='cancelled'";
					$where .= ' AND ' . $equals2;
				}
			}

			include_once(WCMVP_ADMIN_PARTIAL . '/ssp/ssp.customized.class.php');

			if (!empty($wcmvp_whithdraw_table_cond)) {

				$wcmvp_withdraw_all_ssp   =	SSP::simple($_POST, $sql_details, $wcmvp_table, $wcmvp_primaryKey, $columns, "", $where);

				$i = 0;

				if (!empty($wcmvp_withdraw_all_ssp['data'])) {

					foreach ($wcmvp_withdraw_all_ssp['data'] as $wcmvp_withdraw_data) {
						
	
						$wcmvp_remove = "<div class='wcmvp_tooltip wcmvp_withdraw_cancel_button' data-id='" .$wcmvp_withdraw_data[3] . "'><span class='material-icons wcmvp_rem_withdraw'>
						clear</span><span class='wcmvp_tooltiptext wcmvp_withdraw_rem'>". esc_html__('Remove', 'wc-multi-vendor-platform-lite') . "</span></div>";
						$amount = wc_price($wcmvp_withdraw_data[0]);
						if($wcmvp_whithdraw_table_cond == "approved"){
							$wcmvprre_method_text = "<a href='#method' class='wcmvp-method-details' data-id='".$wcmvp_withdraw_data[3]."'>".apply_filters('wpml_translate_single_string', $wcmvp_withdraw_data[1] , 'wcmvp_payment_method context', 'wc-multi-vendor-platform-lite' )."</a>";
						}else{
							$wcmvprre_method_text = apply_filters('wpml_translate_single_string', $wcmvp_withdraw_data[1] , 'wcmvp_payment_method context', 'wc-multi-vendor-platform-lite' );
						}
						$wcmvp_withdraw_all_ssp['data'][$i][1] = $wcmvprre_method_text;
						$wcmvp_withdraw_all_ssp['data'][$i][2] = date("d-m-Y",strtotime($wcmvp_withdraw_data[2]));
						$wcmvp_withdraw_all_ssp['data'][$i][3] = $wcmvp_remove;

						$wcmvp_withdraw_all_ssp['data'][$i][4] =	"<span class='wcmvp_withdraw_".$wcmvp_withdraw_data[4]."'>".$wcmvp_withdraw_data[4]."</span>";

						$wcmvp_withdraw_all_ssp['data'][$i][0] = $amount;
						$i++;
					}
				}

				echo json_encode($wcmvp_withdraw_all_ssp);
			}
		}
		wp_die();
	}

	//=============  function for withdraw requests      ==========================//


	function withdraw_request_ajax_cb()
	{
		if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {
			if (isset($_POST) && !empty($_POST)) {

				if (isset($_POST['wcmvp_payment_meth']) && !empty($_POST['wcmvp_payment_meth'])) {
					
					$wcmvp_payment_meth = sanitize_text_field($_POST['wcmvp_payment_meth']);
					do_action( 'wpml_register_single_string','wcmvp_payment_method context', 'wc-multi-vendor-platform-lite', $wcmvp_payment_meth );
				}

				if (isset($_POST['wcmvp_amount_req']) && !empty($_POST['wcmvp_amount_req'])) {
					$wcmvp_amount_req = sanitize_text_field($_POST['wcmvp_amount_req']);
				}
				if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
					//check ip from share internet
					$wcmvp_ip = $_SERVER['HTTP_CLIENT_IP'];
				} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
					//to check ip is pass from proxy
					$wcmvp_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
					$wcmvp_ip = $_SERVER['REMOTE_ADDR'];
				}

				$wcmvp_store_name =	get_user_meta(get_current_user_id(), 'wcmvp_store_name', true);

				$wcmvp_email =	get_userdata(get_current_user_id())->data->user_email;

				global $wpdb;

				$wcmvp_query = "SELECT amount FROM " . $wpdb->prefix . "wcmvp_withdraw WHERE user_id=%d  AND status=%s ";

				$wcmvp_order_complete_count = $wpdb->get_results($wpdb->prepare($wcmvp_query, get_current_user_id(), 'pending'));

				$wcmvp_total = 0;
				foreach ($wcmvp_order_complete_count as $wcmvp_amount_obj) {
					$wcmvp_amount  =  $wcmvp_amount_obj->amount;
					$wcmvp_total = $wcmvp_amount + $wcmvp_total;
				}
				$wcmvp_vendor_amount =  floatval(get_user_meta(get_current_user_id(), 'wcmvp_total_amount', true));

				if ($wcmvp_total + $wcmvp_amount_req > $wcmvp_vendor_amount) {

					echo json_encode(esc_html__("Balance not available", "wc-multi-vendor-platform-lite"));
					wp_die();
				}

				if (isset($wcmvp_store_name)) {

					$query = "INSERT INTO `" . $wpdb->prefix . "wcmvp_withdraw` (user_id, wcmvp_vendor_store , amount , date , modified_date, status , method , wcmvp_vendor_email , ip)
					VALUES ( %d , %s , %f , %s%s ,%s, %s ,%s , %s , %s) ";

					$wcmvp_order_complete_count = $wpdb->get_results($wpdb->prepare($query, get_current_user_id(), $wcmvp_store_name, $wcmvp_amount_req, date("Y-m-d"), date("h:i:s"), date("Y-m-d h:i:s"), "pending", $wcmvp_payment_meth,  $wcmvp_email, $wcmvp_ip));

					$wcmvp_last_withdraw_effected_id = $wpdb->insert_id;

					if (isset($wcmvp_last_withdraw_effected_id)) {
						do_action('wcmvp_vend_stmt_for_withdraw_creation', $wcmvp_last_withdraw_effected_id, get_current_user_id(), $wcmvp_amount_req);
					}
					echo json_encode("successfull");
				}

				wp_die();
			}
		}
		wp_die();
	}

	//=============  function for withdraw request cancellation      ==========================//

	function withdraw_request_cancel_ajax_cb()
	{

		if (isset($_POST) && !empty($_POST)) {

			global $wpdb;

			if (isset($_POST['wcmvp_cancel_id']) && !empty($_POST['wcmvp_cancel_id'])) {

				$wcmvp_cancel_id = apply_filters("wcmvp_withdraw_cancel_request", sanitize_text_field($_POST['wcmvp_cancel_id']));
				$query = "SELECT * FROM " . $wpdb->prefix . "wcmvp_withdraw WHERE id=%d";
				$wcmvp_withdraw_sql = $wpdb->get_results($wpdb->prepare($query, $wcmvp_cancel_id));
			}

			if ($wcmvp_withdraw_sql[0]->status == "pending") {

				$query = "DELETE FROM " . $wpdb->prefix . "wcmvp_withdraw  WHERE id=%d";
				$wcmvp_withdraw_sql = $wpdb->get_results($wpdb->prepare($query, $wcmvp_cancel_id));
			} elseif ($wcmvp_withdraw_sql[0]->status == "approved") {

				$query = "UPDATE " . $wpdb->prefix . "wcmvp_withdraw SET status=%s WHERE id=%d;";

				$wcmvp_withdraw_sql = $wpdb->get_results($wpdb->prepare($query, "vendor_ad", $wcmvp_cancel_id));
			}

			echo json_encode(esc_html("request deleted successfully", "wc-multi-vendor-platform-lite"));

			wp_die();
		}
	}

	//=============  function for withdraw method details      ==========================//

	function wcmvprre_withdraw_method_detail_ajax_cb(){

		if (isset($_POST) && !empty($_POST) && isset($_POST['wcmvp_withdraw_id']) && !empty($_POST['wcmvp_withdraw_id'])) {

		global $wpdb;

		$query = "SELECT `payment_processed_stmt` FROM " . $wpdb->prefix . "wcmvp_withdraw  WHERE id=%d";
		$wcmvp_withdraw_sql = $wpdb->get_results($wpdb->prepare($query, sanitize_text_field($_POST['wcmvp_withdraw_id'])),ARRAY_A);

		$wcmvp_html = "<div class='wcmvp_method_detail_box'>";
		if(!empty($wcmvp_withdraw_sql)){
			foreach ($wcmvp_withdraw_sql as $key => $wcmvp_value) {
				$wcmvp_array = json_decode($wcmvp_value['payment_processed_stmt']);
				if(!empty($wcmvp_array	)){
					foreach ($wcmvp_array as $wcmvp_key => $wcmvp_value) {
						$wcmvp_heading = explode("_",$wcmvp_key);
						unset($wcmvp_heading[0]);
						$wcmvp_heading_complete = implode(" ",$wcmvp_heading);
						$wcmvp_html .= "<div class='wcmvp_detail_line'><label>".$wcmvp_heading_complete."</label>".$wcmvp_value."</div>";
					}
				}
				else{
					$wcmvp_html .= esc_html__("No details Found","wc-multi-vendor-platform-lite");
				}	
			}
		}else{
			$wcmvp_html .= esc_html__("No details Found","wc-multi-vendor-platform-lite");
		}
		$wcmvp_html .= "</div>";

		echo json_encode($wcmvp_html);

		wp_die();
		}
	}

	//=============   function for order details request     ==========================//

	function order_full_details_cb()
	{
		if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {
			if (isset($_POST) && !empty($_POST)) {

				if (isset($_POST['wcmvp_order_id']) && !empty($_POST['wcmvp_order_id'])) {
					$order_id = sanitize_text_field($_POST['wcmvp_order_id']);

					$order = new WC_Order(intval($order_id));

					$order_data = $order->get_items();
					if (!empty($order_data)) {
						foreach ($order_data as $item_id => $item) {

							$product_id = $item->get_product_id();
							$product = wc_get_product($product_id);

							$product_name[] = $item['name'];
							$product_quantity[] = $item['quantity'];


							if (is_object($product)) {
								$product_sku = $product->get_sku();
							} else {
								$product_sku =  "";
							}

							$product_thumb[] = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'thumbnail', TRUE)[0];
							$product_total[] = wc_format_decimal($order->get_line_subtotal($item, false, false));
						}
					}

					$wcmvp_subtotal = $order->get_subtotal();
					$wcmvp_payment_method = $order->get_payment_method_title();
					$wcmvp_total = wc_price($order->get_total());
					$wcmvp_billing_details = $order->get_formatted_billing_address();
					$wcmvp_shipping_details = $order->get_formatted_shipping_address();
					$wcmvp_order_status = $order->get_status();
					$wcmvp_order_date = date("d-m-Y", strtotime($order->get_date_created()));
					$wcmvp_author_id = get_current_user_id();
					$wcmvp_commision_val = $order->get_shipping_total();

					$wcmvp_past_commision = get_post_meta($order_id, "wcmvp_admin_order_commision_for_vendor", true);

					$wcmvp_Earning_From_Order	=	$order->get_total() - (float) $wcmvp_past_commision;

					$wcmvp_customer = $order->get_shipping_first_name() . $order->get_shipping_last_name();
					$wcmvp_email = $order->get_billing_email();
					$wcmvp_phone  =  $order->get_billing_phone();
					$wcmvp_IP = $order->get_customer_ip_address();

					$wcmvp_response = array($product_name, $product_quantity, $product_thumb, $product_total, $product_sku, $wcmvp_subtotal, $wcmvp_commision_val, $wcmvp_payment_method, $wcmvp_total, $wcmvp_billing_details, $wcmvp_shipping_details, $wcmvp_order_status, $wcmvp_order_date, $wcmvp_Earning_From_Order, $wcmvp_customer, $wcmvp_email, $wcmvp_phone, $wcmvp_IP);

					$response_data = apply_filters("wcmvp_vendor_order_details", $wcmvp_response);
					if (empty($response_data)) {
						echo json_encode(false);
						wp_die();
					}

					echo json_encode($response_data);
				}

				wp_die();
			}
		}
		wp_die();
	}

	//====================function is used to manage order payment for vendor on transition of order====================//

	function wcmvp_order_status_change_cb($wcmvp_order_id, $wcmvp_order_from, $wcmvp_order_to)
	{
		if( ($wcmvp_order_from == 'completed') && ($wcmvp_order_to != 'completed') )
		{
			$this->wcmvp_balance_substract($wcmvp_order_id);
		}
		else if(($wcmvp_order_from != 'completed') && ($wcmvp_order_to == 'completed'))
		{
			$this->wcmvp_balance_add($wcmvp_order_id);
		}
	}

	//=============  function for order status change on vendor panel      ==========================//


	function status_change_ajax_cb()
	{
		if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {

			if (isset($_POST) && !empty($_POST)) {

				if (isset($_POST['wcmvp_order_id']) && !empty($_POST['wcmvp_order_id'])) {

					$order_id = sanitize_text_field($_POST['wcmvp_order_id']);
				}

				if (isset($_POST['wcmvp_order_cond']) && !empty($_POST['wcmvp_order_cond'])) {

					$cond = sanitize_text_field($_POST['wcmvp_order_cond']);
				}

				if ($cond == "complete") {
					
					$wcmvp_status = "wc-completed";
				} elseif ($cond == "processing") {
					
					$wcmvp_status = "wc-processing";
				} elseif ($cond == "bulk") {

					$wcmvp_status = sanitize_text_field($_POST['status']);

					if (!empty($order_id)) {

						foreach ($order_id as $id) {
							$order  =  wc_get_order($id);
							$error  =  $order->update_status($wcmvp_status);
						}
					}

					if ($error != 0) {
						$this->wcmvp_count_function();
						echo json_encode("success");
					} else {
						echo json_encode("unsuccessfull");
					}

					wp_die();
				}
			}

			$order  =  wc_get_order($order_id);
			$error =  $order->update_status($wcmvp_status);

			$this->wcmvp_count_function();

			if ($error != 0) {
				echo json_encode("success");
			} else {
				echo json_encode("unsuccessfull");
			}
		}
		wp_die();
	}

	//=============  function for adding amount to vendor      ==========================//

	function wcmvp_balance_add($wcmvp_order)
	{
		$wcmvp_price = get_post_meta($wcmvp_order, '_order_total', true);

		$wcmvp_author_id = get_post_field('post_author', $wcmvp_order);

		$wcmvp_commision_val = $this->wcmvp_commission($wcmvp_author_id, $wcmvp_price);

		$wcmvp_saving	=	$wcmvp_price - $wcmvp_commision_val[0];
		
		$wcmvp_total  =	get_user_meta($wcmvp_author_id, 'wcmvp_total_amount', true);
		if (!empty($wcmvp_total)) {
			update_user_meta($wcmvp_author_id, 'wcmvp_total_amount', $wcmvp_saving + $wcmvp_total);
		} else {
			update_user_meta($wcmvp_author_id, 'wcmvp_total_amount', $wcmvp_saving);
		}
	}

	//=============  function for substracting amount from vendor      ==========================//

	function wcmvp_balance_substract($wcmvp_order)
	{
		$wcmvp_price = get_post_meta($wcmvp_order, '_order_total', true);

		$wcmvp_author_id = get_post_field('post_author', $wcmvp_order);

		$wcmvp_commision_val = $this->wcmvp_commission($wcmvp_author_id, $wcmvp_price);

		$wcmvp_saving	=	(float) $wcmvp_price - (float) $wcmvp_commision_val[0];

		$wcmvp_total  =	get_user_meta($wcmvp_author_id, 'wcmvp_total_amount', true);
		if (intval($wcmvp_total) > intval($wcmvp_saving)) {
			if (!empty($wcmvp_total)) {
				update_user_meta($wcmvp_author_id, 'wcmvp_total_amount', (float) $wcmvp_total - (float) $wcmvp_saving);
			} else {
				update_user_meta($wcmvp_author_id, 'wcmvp_total_amount', (float) $wcmvp_saving);
			}
		}
	}

	//=============  function for store page settings      ==========================//

	function wcmvp_store_setting_callback()
	{
		if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {
			if (!empty($_POST) && isset($_POST)) {
				$wcmvp_author_ID = get_current_user_id();

				if (isset($_POST['wcmvp_banner_id'])) {
					update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_store_img', sanitize_text_field($_POST['wcmvp_banner_id']));
				}
				if (isset($_POST['wcmvp_profile_id'])) {
					update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_profile_img', sanitize_text_field($_POST['wcmvp_profile_id']));
				}

				if (isset($_POST['wcmvp_ppp'])) {
					update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_prod_per_page', sanitize_text_field($_POST['wcmvp_ppp']));
				}

				if (isset($_POST['wcmvp_street'])) {
					update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_address1', sanitize_text_field($_POST['wcmvp_street']));
				}

				if (isset($_POST['wcmvp_street2t'])) {
					update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_address2', sanitize_text_field($_POST['wcmvp_street2t']));
				}

				if (isset($_POST['wcmvp_city'])) {
					update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_city', sanitize_text_field($_POST['wcmvp_city']));
				}

				if (isset($_POST['wcmvp_post_zip'])) {
					update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_zip', sanitize_text_field($_POST['wcmvp_post_zip']));
				}

				if (isset($_POST['wcmvp_country'])) {
					update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_country', sanitize_text_field($_POST['wcmvp_country']));
				}

				if (isset($_POST['wcmvp_state'])) {
					update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_state', sanitize_text_field($_POST['wcmvp_state']));
				}

				if (isset($_POST['wcmvp_phone'])) {
					update_user_meta($wcmvp_author_ID, 'wcmvp_phone', sanitize_text_field($_POST['wcmvp_phone']));
				}

				if (isset($_POST['wcmvp_show_email'])) {
					update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_show_email', sanitize_email($_POST['wcmvp_show_email']));
				}

				if (isset($_POST['wcmvp_show_more_tab'])) {
					update_user_meta($wcmvp_author_ID, 'wcmvp_show_more_tab', sanitize_text_field($_POST['wcmvp_show_more_tab']));
				}

				if (isset($_POST['wcmvp_map_api_key'])) {
					update_user_meta($wcmvp_author_ID, 'wcmvp_map_api_key', sanitize_text_field($_POST['wcmvp_map_api_key']));
				}

				if (isset($_POST['wcmvp_show_time_widget'])) {
					update_user_meta($wcmvp_author_ID, 'wcmvp_show_time_widget', sanitize_text_field($_POST['wcmvp_show_time_widget']));
				}

				if ($_POST['wcmvp_show_time_widget']) {

					if (!empty($_POST['wcmvp_sunday']) && isset($_POST['wcmvp_sunday'])) {
						$wcmvp_sun = sanitize_text_field($_POST['wcmvp_sunday']);
					} else {
						$wcmvp_sun = 'close';
					}
					if (!empty($_POST['wcmvp_monday']) && isset($_POST['wcmvp_monday'])) {
						$wcmvp_mon = sanitize_text_field($_POST['wcmvp_monday']);
					} else {
						$wcmvp_mon = 'open';
					}
					if (!empty($_POST['wcmvp_tuesday']) && isset($_POST['wcmvp_tuesday'])) {
						$wcmvp_tues = sanitize_text_field($_POST['wcmvp_tuesday']);
					} else {
						$wcmvp_tues = 'open';
					}
					if (!empty($_POST['wcmvp_wednesday']) && isset($_POST['wcmvp_wednesday'])) {
						$wcmvp_weds = sanitize_text_field($_POST['wcmvp_wednesday']);
					} else {
						$wcmvp_weds = 'open';
					}
					if (!empty($_POST['wcmvp_thursday']) && isset($_POST['wcmvp_thursday'])) {
						$wcmvp_thurs = sanitize_text_field($_POST['wcmvp_thursday']);
					} else {
						$wcmvp_thurs = 'open';
					}
					if (!empty($_POST['wcmvp_friday']) && isset($_POST['wcmvp_friday'])) {
						$wcmvp_fri = sanitize_text_field($_POST['wcmvp_friday']);
					} else {
						$wcmvp_fri = 'open';
					}
					if (!empty($_POST['wcmvp_saturday']) && isset($_POST['wcmvp_saturday'])) {
						$wcmvp_sat = sanitize_text_field($_POST['wcmvp_saturday']);
					} else {
						$wcmvp_sat = 'open';
					}
					if (!empty($_POST['wcmvp_store_open_notice']) && isset($_POST['wcmvp_store_open_notice'])) {
						$wcmvp_op_note = sanitize_text_field($_POST['wcmvp_store_open_notice']);
					} else {
						$wcmvp_op_note = 'Store is open';
					}
					if (!empty($_POST['wcmvp_store_close_notice']) && isset($_POST['wcmvp_store_close_notice'])) {
						$wcmvp_close_note = sanitize_text_field($_POST['wcmvp_store_close_notice']);
					} else {
						$wcmvp_close_note = 'Store is close';
					}

					if ($wcmvp_sun == 'open') {
						if (!empty($_POST['wcmvp_sunday_open_time']) && isset($_POST['wcmvp_sunday_open_time'])) {
							$wcmvp_sun_op = sanitize_text_field($_POST['wcmvp_sunday_open_time']);
						} else {
							$wcmvp_sun_op = '';
						}
						if (!empty($_POST['wcmvp_sunday_close_time']) && isset($_POST['wcmvp_sunday_close_time'])) {
							$wcmvp_sun_close = sanitize_text_field($_POST['wcmvp_sunday_close_time']);
						} else {
							$wcmvp_sun_close = '';
						}
					} else {
						$wcmvp_sun_op = '';
						$wcmvp_sun_close = '';
					}
					if ($wcmvp_mon == 'open') {
						if (!empty($_POST['wcmvp_monday_open_time']) && isset($_POST['wcmvp_monday_open_time'])) {
							$wcmvp_mon_op = sanitize_text_field($_POST['wcmvp_monday_open_time']);
						} else {
							$wcmvp_mon_op = '';
						}
						if (!empty($_POST['wcmvp_monday_close_time']) && isset($_POST['wcmvp_monday_close_time'])) {
							$wcmvp_mon_close = sanitize_text_field($_POST['wcmvp_monday_close_time']);
						} else {
							$wcmvp_mon_close = '';
						}
					} else {
						$wcmvp_mon_op = '';
						$wcmvp_mon_close = '';
					}
					if ($wcmvp_tues == 'open') {
						if (!empty($_POST['wcmvp_tuesday_open_time']) && isset($_POST['wcmvp_tuesday_open_time'])) {
							$wcmvp_tues_op = sanitize_text_field($_POST['wcmvp_tuesday_open_time']);
						} else {
							$wcmvp_tues_op = '';
						}
						if (!empty($_POST['wcmvp_tuesday_close_time']) && isset($_POST['wcmvp_tuesday_close_time'])) {
							$wcmvp_tues_close = sanitize_text_field($_POST['wcmvp_tuesday_close_time']);
						} else {
							$wcmvp_tues_close = '';
						}
					} else {
						$wcmvp_tues_op = '';
						$wcmvp_tues_close = '';
					}
					if ($wcmvp_weds == 'open') {
						if (!empty($_POST['wcmvp_wednesday_open_time']) && isset($_POST['wcmvp_wednesday_open_time'])) {
							$wcmvp_weds_op = sanitize_text_field($_POST['wcmvp_wednesday_open_time']);
						} else {
							$wcmvp_weds_op = '';
						}
						if (!empty($_POST['wcmvp_wednesday_close_time']) && isset($_POST['wcmvp_wednesday_close_time'])) {
							$wcmvp_weds_close = sanitize_text_field($_POST['wcmvp_wednesday_close_time']);
						} else {
							$wcmvp_weds_close = '';
						}
					} else {
						$wcmvp_weds_op = '';
						$wcmvp_weds_close = '';
					}
					if ($wcmvp_thurs == 'open') {
						if (!empty($_POST['wcmvp_thursday_open_time']) && isset($_POST['wcmvp_thursday_open_time'])) {
							$wcmvp_thurs_op = sanitize_text_field($_POST['wcmvp_thursday_open_time']);
						} else {
							$wcmvp_thurs_op = '';
						}
						if (!empty($_POST['wcmvp_thursday_close_time']) && isset($_POST['wcmvp_thursday_close_time'])) {
							$wcmvp_thurs_close = sanitize_text_field($_POST['wcmvp_thursday_close_time']);
						} else {
							$wcmvp_thurs_close = '';
						}
					} else {
						$wcmvp_thurs_op = '';
						$wcmvp_thurs_close = '';
					}

					if ($wcmvp_fri == 'open') {
						if (!empty($_POST['wcmvp_friday_open_time']) && isset($_POST['wcmvp_friday_open_time'])) {
							$wcmvp_fri_op = sanitize_text_field($_POST['wcmvp_friday_open_time']);
						} else {
							$wcmvp_fri_op = '';
						}
						if (!empty($_POST['wcmvp_friday_close_time']) && isset($_POST['wcmvp_friday_close_time'])) {
							$wcmvp_fri_close = sanitize_text_field($_POST['wcmvp_friday_close_time']);
						} else {
							$wcmvp_fri_close = '';
						}
					} else {
						$wcmvp_fri_op = '';
						$wcmvp_fri_close = '';
					}
					if ($wcmvp_sat == 'open') {
						if (!empty($_POST['wcmvp_saturday_open_time']) && isset($_POST['wcmvp_saturday_open_time'])) {
							$wcmvp_sat_op = sanitize_text_field($_POST['wcmvp_saturday_open_time']);
						} else {
							$wcmvp_sat_op = "";
						}
						if (!empty($_POST['wcmvp_saturday_close_time']) && isset($_POST['wcmvp_saturday_close_time'])) {
							$wcmvp_sat_close = sanitize_text_field($_POST['wcmvp_saturday_close_time']);
						} else {
							$wcmvp_sat_close = "";
						}
					} else {
						$wcmvp_sat_op = '';
						$wcmvp_sat_close = '';
					}
					$wcmvp_timing_array = array(
						'Sunday' => array(
							'status' => $wcmvp_sun,
							'store_open-time' => $wcmvp_sun_op,
							'store_close_time' => $wcmvp_sun_close,
						),
						'Monday' => array(
							'status' => $wcmvp_mon,
							'store_open-time' => $wcmvp_mon_op,
							'store_close_time' => $wcmvp_mon_close,
						),
						'Tuesday' => array(
							'status' => $wcmvp_tues,
							'store_open-time' => $wcmvp_tues_op,
							'store_close_time' => $wcmvp_tues_close,
						),
						'Wednesday' => array(
							'status' => $wcmvp_weds,
							'store_open-time' => $wcmvp_weds_op,
							'store_close_time' => $wcmvp_weds_close,
						),
						'Thursday' => array(
							'status' => $wcmvp_thurs,
							'store_open-time' => $wcmvp_thurs_op,
							'store_close_time' => $wcmvp_thurs_close,
						),
						'Friday' => array(
							'status' => $wcmvp_fri,
							'store_open-time' => $wcmvp_fri_op,
							'store_close_time' => $wcmvp_fri_close,
						),
						'Saturday' => array(
							'status' => $wcmvp_sat,
							'store_open-time' => $wcmvp_sat_op,
							'store_close_time' => $wcmvp_sat_close,
						),
						'Store_open_notice' => $wcmvp_op_note,
						'Store_close_notice' => $wcmvp_close_note,
					);
					update_user_meta($wcmvp_author_ID, 'wcmvp_store_time_widget',  $wcmvp_timing_array);
				}
				do_action("wcmvp_store_settings_data");

				echo json_encode("successfull");

				wp_die();
			}
		}
	}

	//=============  function for payment page details save      ==========================//

	function wcmvp_payment_ajax_cb()
	{

		if (!empty($_POST) && isset($_POST)) {
			$wcmvp_author_ID = get_current_user_id();
			if (isset($_POST['wcmvp_paypal_email'])) {
				update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_paypal_email', sanitize_email($_POST['wcmvp_paypal_email']));
			}
			if (isset($_POST['wcmvp_stripe_id'])) {
				update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_stripe_id', sanitize_text_field($_POST['wcmvp_stripe_id']));
			}
			if ( isset($_POST['wcmvp_account_name'])) {
				update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_bank_account_name', sanitize_text_field($_POST['wcmvp_account_name']));
			}
			if (isset($_POST['wcmvp_account_no'])) {
				update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_bank_account_no', sanitize_text_field($_POST['wcmvp_account_no']));
			}
			if (isset($_POST['wcmvp_bank_name'])) {
				update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_bank_name', sanitize_text_field($_POST['wcmvp_bank_name']));
			}
			if (isset($_POST['wcmvp_bank_place'])) {
				update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_bank_address', sanitize_text_field($_POST['wcmvp_bank_place']));
			}
			if (isset($_POST['wcmvp_routing_no'])) {
				update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_routing_number', sanitize_text_field($_POST['wcmvp_routing_no']));
			}
			if (isset($_POST['wcmvp_iban'])) {
				update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_bank_iban', sanitize_text_field($_POST['wcmvp_iban']));
			}
			if ( isset($_POST['wcmvp_iwcmvp_swift_codeban'])) {
				update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_bank_swift', sanitize_text_field($_POST['wcmvp_swift_code']));
			}

			if ( isset($_POST['wcmvp_cond'])) {
				if ($_POST['wcmvp_cond'] == "store_setup_request") {
					update_user_meta($wcmvp_author_ID, 'wcmvp_vendor_store_setup', true);
				}
			}

			do_action("wcmvp_payment_method_extra_data");

			echo json_encode("successfull");
			wp_die();
		}
	}

	//=============  function for adding custom template to the page list      ==========================//
	/**
	 * Add "Custom" template to page attirbute template section.
	 */

	function wcmvp_add_template_to_select($post_templates, $wp_theme, $post, $post_type)
	{
		$post_templates['wcmvp_vendor_dashboard_template.php'] = esc_html__('Vendor dashboard',"wc-multi-vendor-platform-lite");
		return $post_templates;
	}

	//=============  function for redirection of user to either home page or account page      ==========================//

	function wcmvp_redirect_to_Custom()
	{
		$data = get_userdata(get_current_user_id());
		$wcmvp_options = get_option("wcmvp_page_setting");
		if (!empty($wcmvp_options) && is_array($wcmvp_options)) {
			$wcmvp_title = $wcmvp_options['wcmvp_page_setting_dashboard'];
		}
		if (is_object($data)) {
			$current_user_caps = $data->allcaps;
		}
		if (array_key_exists("multivendor-platformr", $current_user_caps)) {
			return get_the_permalink($wcmvp_title);
		}
		return get_permalink(get_option('woocommerce_myaccount_page_id'));
	}

	//=============  function for adding custom field to the register page      ==========================//

	function wcmvp_extra_register_fields()
	{ ?>
		<?php update_option('woocommerce_registration_generate_password', 'no'); ?>

		<p class="form-row form-row-first">
			<label for="wcmvp-role">
				<input type="radio" class="input-radio wcmvp_show_radio" name="wcmvp-role" id="wcmvp-radio-vendor" value="vendor" />
				<?php esc_html_e('I am a Vendor', 'wc-multi-vendor-platform-lite'); ?>
			</label>
		</p>
		<p class="form-row form-row-last">
			<label for="wcmvp-radio-customer">
				<input type="radio" class="input-radio" name="wcmvp-role" id="wcmvp-radio-customer" value="customer" checked="checked" />
				<?php esc_html_e('I am a Customer', 'wc-multi-vendor-platform-lite'); ?>
			</label>
		</p>
		<div class="wcmvp-vendor-registration wcmvp-none">
			<p class="form-row form-row-wide">
				<label for="wcmvp_reg_first_name">
					<?php esc_html_e('First name', 'wc-multi-vendor-platform-lite'); ?>
					<span class="required">*</span>
				</label>
				<input type="text" class="input-text" name="wcmvp_first_name" id="wcmvp_reg_first_name" value="<?php if (!empty($_POST['wcmvp_first_name'])) esc_attr_e(sanitize_text_field($_POST['wcmvp_first_name'])); ?>" />
			</p>
			<p class="form-row form-row-wide">
				<label for="wcmvp_reg_last_name">
					<?php esc_html_e('Last name', 'wc-multi-vendor-platform-lite'); ?>
					<span class="required">*</span>
				</label>
				<input type="text" class="input-text" name="wcmvp_last_name" id="wcmvp_reg_last_name" value="<?php if (!empty($_POST['wcmvp_last_name'])) esc_attr_e(sanitize_text_field($_POST['wcmvp_last_name'])); ?>" />
			</p>
			<p class="form-row form-row-wide">
				<label for="wcmvp_reg_shop_name">
					<?php esc_html_e('Shop Name', 'wc-multi-vendor-platform-lite'); ?>
					<span class="required">*</span>
				</label>
				<input type="text" class="input-text" name="wcmvp_shop_names" id="wcmvp_reg_shop_name" value="<?php if (!empty($_POST['wcmvp_shop_names'])) esc_attr_e(sanitize_text_field($_POST['wcmvp_shop_names'])); ?>" />
			</p>
			<p class="form-row form-row-wide">
				<label for="wcmvp_reg_shop_url">
					<?php esc_html_e('Shop Url', 'wc-multi-vendor-platform-lite'); ?>
					<span class="required">*</span>
				</label>
				<input type="text" class="input-text" name="wcmvp_shop_url" id="wcmvp_reg_shop_url" value="<?php if (!empty($_POST['wcmvp_shop_url'])) esc_attr_e(sanitize_text_field($_POST['wcmvp_shop_url'])); ?>" />
			</p>
			<p class="form-row form-row-wide">
				<label for="wcmvp_reg_phone">
					<?php esc_html_e('Phone', 'wc-multi-vendor-platform-lite'); ?>
					<span class="required">*</span>
				</label>
				<input type="text" class="input-text" name="wcmvp_phone" id="wcmvp_reg_phone" value="<?php if (!empty($_POST['wcmvp_phone'])) esc_attr_e(sanitize_text_field($_POST['wcmvp_phone'])); ?>" />
			</p>
		</div>
		<div class="clear"></div>
		<?php
	}

	//=============  function for calculating records of every page on vendor dashboard      ==========================//

	function  wcmvp_count_function()
	{
		global $wpdb;

		$wcmvp_prod_auth_id  = get_current_user_id();

		$where = get_posts_by_author_sql('product');

		$query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = '%s' AND post_author = " . $wcmvp_prod_auth_id . " AND ( post_status = '%s' OR post_status = '%s' OR post_status = '%s' OR post_status = '%s' )";
		$wcmvp_prod_all_count = $wpdb->get_var($wpdb->prepare($query, 'product', 'publish', 'pending', 'draft', 'private'));

		$query = "SELECT COUNT(*) FROM $wpdb->posts $where AND post_author = %d";
		$wcmvp_prod_publish_count = $wpdb->get_var($wpdb->prepare($query, $wcmvp_prod_auth_id));

		$query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = '%s' AND post_type = 'product' AND post_author = " . $wcmvp_prod_auth_id . "";
		$wcmvp_prod_trash_count = $wpdb->get_var($wpdb->prepare($query, 'trash'));

		$query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = '%s' AND post_type = 'product' AND post_author = " . $wcmvp_prod_auth_id . "";
		$wcmvp_prod_pending_count = $wpdb->get_var($wpdb->prepare($query, 'pending'));

		$query = "SELECT COUNT(*) FROM " . $wpdb->prefix . "posts LEFT JOIN (SELECT post_id,
		MAX(CASE WHEN meta_key = 'wcmvp_order_vendor' THEN meta_value END) wcmvp_order_vendor_name
		FROM " . $wpdb->prefix . "postmeta GROUP BY post_id) wcmvp_selected_table ON " . $wpdb->prefix . "posts.`ID`= wcmvp_selected_table.`post_id`  WHERE wcmvp_order_vendor_name IS NOT NULL AND wcmvp_order_vendor_name='%s'";
		$wcmvp_order_all_count = $wpdb->get_var($wpdb->prepare($query, $wcmvp_prod_auth_id));


		$query = "SELECT COUNT(*) FROM " . $wpdb->prefix . "posts LEFT JOIN (SELECT post_id,
		MAX(CASE WHEN meta_key = 'wcmvp_order_vendor' THEN meta_value END) wcmvp_order_vendor_name
		FROM " . $wpdb->prefix . "postmeta GROUP BY post_id) wcmvp_selected_table ON " . $wpdb->prefix . "posts.`ID`= wcmvp_selected_table.`post_id`  
		WHERE wcmvp_order_vendor_name IS NOT NULL AND wcmvp_order_vendor_name='%s' AND post_status='%s'";

		$wcmvp_cond_array = ['wc-processing','wc-pending','wc-on-hold','wc-cancelled','wc-refunded','wc-failed','wc-completed'];
		$wcmvp_count_array = array();
		foreach($wcmvp_cond_array as $key=>$value){
			$wcmvp_count_array[] = $wpdb->get_var($wpdb->prepare($query, $wcmvp_prod_auth_id, $value));
		}

		$query = "SELECT COUNT(*) FROM " . $wpdb->prefix . "wcmvp_withdraw WHERE user_id=%d AND status=%s";
		$wcmvp_withdraw_pending_count = $wpdb->get_var($wpdb->prepare($query, $wcmvp_prod_auth_id, 'pending'));

		$query = "SELECT COUNT(*) FROM " . $wpdb->prefix . "wcmvp_withdraw WHERE user_id=%d AND ( status=%s OR status=%s )";
		$wcmvp_withdraw_approved_count = $wpdb->get_var($wpdb->prepare($query, $wcmvp_prod_auth_id, 'approved', 'admin_ad '));

		$query = "SELECT COUNT(*) FROM " . $wpdb->prefix . "wcmvp_withdraw WHERE user_id=%d AND ( status=%s OR status=%s )";
		$wcmvp_withdraw_cancelled_count = $wpdb->get_var($wpdb->prepare($query, $wcmvp_prod_auth_id, 'cancelled', 'admin_cd '));

		$wcmvp_prod_count_array = array(
			'wcmvp_prod_auth_id' => $wcmvp_prod_auth_id,
			'wcmvp_prod_all_count' => $wcmvp_prod_all_count,
			'wcmvp_prod_publish_count' => $wcmvp_prod_publish_count,
			'wcmvp_prod_trash_count' => $wcmvp_prod_trash_count,
			'wcmvp_prod_pending_count' => $wcmvp_prod_pending_count,
		);

		$wcmvp_order_count_array = array(
			'wcmvp_prod_auth_id' => $wcmvp_prod_auth_id,
			'wcmvp_order_all_count' => $wcmvp_order_all_count,
			'wcmvp_order_processing_count' => $wcmvp_count_array[0],
			'wcmvp_order_pending_count' => $wcmvp_count_array[1],
			'wcmvp_order_on_hold_count' => $wcmvp_count_array[2],
			'wcmvp_order_cancelled_count' => $wcmvp_count_array[3],
			'wcmvp_order_refunded_count' => $wcmvp_count_array[4],
			'wcmvp_order_failed_count' => $wcmvp_count_array[5],
			'wcmvp_order_complete_count' => $wcmvp_count_array[6],
		);

		$wcmvp_withdraw_count_array = array(
			'wcmvp_withdraw_pending_count' =>  $wcmvp_withdraw_pending_count,
			'wcmvp_withdraw_approved_count' =>  $wcmvp_withdraw_approved_count,
			'wcmvp_withdraw_cancelled_count' => $wcmvp_withdraw_cancelled_count,
		);

		$wcmvp_count_array = array(
			'wcmvp_prod_count_array' => $wcmvp_prod_count_array,
			'wcmvp_order_count_array' => $wcmvp_order_count_array,
			'wcmvp_withdraw_count_array' => $wcmvp_withdraw_count_array,
		);

		$wcmvp_array =  apply_filters("wcmvp_multivendor_platform_count", $wcmvp_count_array);

		update_user_meta($wcmvp_prod_auth_id, "wcmvp_counting_array", $wcmvp_array);

		return $wcmvp_array;
	}

	//=============  function for getting the data for charts     ==========================//

	function wcmvp_get_data_cb()
	{

		$wcmvp_total_sales = $this->wcmvp_order_and_sales("");

		$wcmvp_chart_data = array(
			"pie_chart" => $this->wcmvp_count_function(),
			"bar_graph" =>  $wcmvp_total_sales,
		);

		echo json_encode($wcmvp_chart_data);
		die();
	}

	//=============  function for sales and order data     ==========================//

	function wcmvp_order_and_sales($wcmvp_date)
	{

		global $wpdb;
		$date = date_create($wcmvp_date);
		if (empty($wcmvp_date)) {
			$wcmvp_current = Date('y-m-d h:i:s');
			$wcmvp_current_date = Date('y M d');
			$wcmvp_1st = Date('y-m-d h:i:s', strtotime("-27 days"));
			$wcmvp_1st_date = Date('y M d', strtotime("-27 days"));
			$wcmvp_2nd = Date('y-m-d h:i:s', strtotime("-24 days"));
			$wcmvp_2nd_date = Date('y M d', strtotime("-24 days"));
			$wcmvp_3rd = Date('y-m-d h:i:s', strtotime("-21 days"));
			$wcmvp_3rd_date = Date('y M d', strtotime("-21 days"));
			$wcmvp_4th = Date('y-m-d h:i:s', strtotime("-18 days"));
			$wcmvp_4th_date = Date('y M d', strtotime("-18 days"));
			$wcmvp_5th = Date('y-m-d h:i:s', strtotime("-15 days"));
			$wcmvp_5th_date = Date('y M d', strtotime("-15 days"));
			$wcmvp_6th = Date('y-m-d h:i:s', strtotime("-12 days"));
			$wcmvp_6th_date = Date('y M d', strtotime("-12 days"));
			$wcmvp_7th = Date('y-m-d h:i:s', strtotime("-9 days"));
			$wcmvp_7th_date = Date('y M d', strtotime("-9 days"));
			$wcmvp_8th = Date('y-m-d h:i:s', strtotime("-6 days"));
			$wcmvp_8th_date = Date('y M d', strtotime("-6 days"));
			$wcmvp_9th = Date('y-m-d h:i:s', strtotime("-3 days"));
			$wcmvp_9th_date = Date('y M d', strtotime("-3 days"));
		} else {
			$temp_date = $date;
			$wcmvp_current = date_format($temp_date, 'y-m-d h:i:s');
			$wcmvp_current_date = date_format($temp_date, 'y M d');

			$temp_date9 = $date;
			date_add($temp_date9, date_interval_create_from_date_string("-3 days"));
			$wcmvp_9th = date_format($temp_date9, 'y-m-d h:i:s');
			$wcmvp_9th_date = date_format($temp_date9, 'y M d');

			$temp_date8 = $date;
			date_add($temp_date8, date_interval_create_from_date_string("-3 days"));
			$wcmvp_8th = date_format($temp_date8, 'y-m-d h:i:s');
			$wcmvp_8th_date = date_format($temp_date8, 'y M d');

			$temp_date7 = $date;
			date_add($temp_date7, date_interval_create_from_date_string("-3 days"));
			$wcmvp_7th = date_format($temp_date7, 'y-m-d h:i:s');
			$wcmvp_7th_date = date_format($temp_date7, 'y M d');

			$temp_date6 = $date;
			date_add($temp_date6, date_interval_create_from_date_string("-3 days"));
			$wcmvp_6th = date_format($temp_date6, 'y-m-d h:i:s');
			$wcmvp_6th_date = date_format($temp_date6, 'y M d');

			$temp_date5 = $date;
			date_add($temp_date5, date_interval_create_from_date_string("-3 days"));
			$wcmvp_5th = date_format($temp_date5, 'y-m-d h:i:s');
			$wcmvp_5th_date = date_format($temp_date5, 'y M d');

			$temp_date4 = $date;
			date_add($temp_date4, date_interval_create_from_date_string("-3 days"));
			$wcmvp_4th = date_format($temp_date4, 'y-m-d h:i:s');
			$wcmvp_4th_date = date_format($temp_date4, 'y M d');

			$temp_date3 = $date;
			date_add($temp_date3, date_interval_create_from_date_string("-3 days"));
			$wcmvp_3rd = date_format($temp_date3, 'y-m-d h:i:s');
			$wcmvp_3rd_date = date_format($temp_date3, 'y M d');

			$temp_date2 = $date;
			date_add($temp_date2, date_interval_create_from_date_string("-3 days"));
			$wcmvp_2nd = date_format($temp_date2, 'y-m-d h:i:s');
			$wcmvp_2nd_date = date_format($temp_date2, 'y M d');

			$temp_date1 = $date;
			date_add($temp_date1, date_interval_create_from_date_string("-3 days"));
			$wcmvp_1st = date_format($temp_date1, 'y-m-d h:i:s');
			$wcmvp_1st_date = date_format($temp_date1, 'y M d');
		}
		$wcmvp_query = "SELECT * FROM " . $wpdb->prefix . "posts LEFT JOIN (SELECT post_id,
		MAX(CASE WHEN meta_key = 'wcmvp_order_vendor' THEN meta_value END) wcmvp_order_vendor_name
		FROM " . $wpdb->prefix . "postmeta GROUP BY post_id) wcmvp_selected_table ON " . $wpdb->prefix . "posts.`ID`= wcmvp_selected_table.`post_id` JOIN " . $wpdb->prefix . "wc_order_stats ON " . $wpdb->prefix . "posts.ID = " . $wpdb->prefix . "wc_order_stats.order_id WHERE   wcmvp_order_vendor_name IS NOT NULL AND wcmvp_order_vendor_name='%s' AND ( post_status='%s' OR post_status='%s') AND post_modified<%s GROUP BY CAST(post_date as DATE)";
		

		$wcmvp_date_time = array(
			[$wcmvp_1st,$wcmvp_1st_date],
			[$wcmvp_2nd,$wcmvp_2nd_date],
			[$wcmvp_3rd,$wcmvp_3rd_date],
			[$wcmvp_4th,$wcmvp_4th_date],
			[$wcmvp_5th,$wcmvp_5th_date],
			[$wcmvp_6th,$wcmvp_6th_date],
			[$wcmvp_7th,$wcmvp_7th_date],
			[$wcmvp_8th,$wcmvp_8th_date],
			[$wcmvp_9th,$wcmvp_9th_date],
			[$wcmvp_current,$wcmvp_current_date]
		);
		$wcmvp_total_sales = array();
		foreach($wcmvp_date_time as $key=>$date){

			$wcmvp_sales_array = $wpdb->get_results($wpdb->prepare($wcmvp_query, get_current_user_id(), 'wc-completed', 'wc-refunded', $date[0]));
			$wcmvp_total_sales[]  =   $this->wcmvp_sales_count($wcmvp_sales_array, $date[1]);

		}

		return $wcmvp_total_sales;
	}

	//=============   function for sales total     ==========================//

	function wcmvp_sales_count($wcmvp_array_order, $wcmvp_day)
	{

		if (!empty($wcmvp_array_order)) {
			$wcmvp_total_sales = 0;
			$wcmvp_order_count = 0;
			foreach ($wcmvp_array_order as $key => $wcmvp_value) {
				$wcmvp_total_sales = $wcmvp_value->net_total + (float) $wcmvp_total_sales;
				$wcmvp_order_count++;
			}

			$wcmvp_price = $wcmvp_total_sales;

			$wcmvp_author_id = get_current_user_id();

			$wcmvp_commision_val = $this->wcmvp_commission($wcmvp_author_id, $wcmvp_price);

			$wcmvp_saving	=	$wcmvp_price - $wcmvp_commision_val[0];
			$wcmvp_total_sales = array($wcmvp_total_sales, $wcmvp_saving, $wcmvp_order_count, $wcmvp_day);
		} else {
			$wcmvp_total_sales = array(0, 0, 0, $wcmvp_day);
		}
		return  $wcmvp_total_sales;
	}

	//=============  function for calling the view count function      ==========================//

	function wcmvp_update_count_cb()
	{

		if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {
			$wcmvp_count_array_all = $this->wcmvp_count_function();

			if (isset($_POST['wcmvp_cond']) && $_POST['wcmvp_cond'] == "wcmvp_order_page") {

				$wcmvp_total_balance  =	get_user_meta(get_current_user_id(), 'wcmvp_total_amount', true);

				$wcmvp_count_array_all['wcmvp_vendor_bal'] =  $wcmvp_total_balance;
			}

			echo json_encode($wcmvp_count_array_all, true);
		}
		wp_die();
	}

	//=============  function for validating extra fields      ==========================//

	function wcmvp_validate_extra_register_fields($username, $email, $wcmvp_validation_errors)
	{
		if (isset($_POST['wcmvp-role']) && $_POST['wcmvp-role'] == "vendor" && get_role("wcmvp-vendor") != "null") {
			if (isset($_POST['wcmvp_first_name']) && empty($_POST['wcmvp_first_name'])) {
				$wcmvp_validation_errors->add('first_name_error <strong>Error</strong>:', esc_html__('First name is required', 'wc-multi-vendor-platform-lite')."!");
			}
			if (isset($_POST['wcmvp_last_name']) && empty($_POST['wcmvp_last_name'])) {
				$wcmvp_validation_errors->add('last_name_error <strong>Error</strong>:', esc_html__('Last name is required', 'wc-multi-vendor-platform-lite')."!");
			}
			if (isset($_POST['wcmvp_shop_names']) && empty($_POST['wcmvp_shop_names'])) {
				$wcmvp_validation_errors->add('shop_names_error <strong>Error</strong>: ', esc_html__('Shop name is required', 'wc-multi-vendor-platform-lite')."!");
			}
			if (isset($_POST['wcmvp_shop_url']) && empty($_POST['wcmvp_shop_url'])) {
				$wcmvp_validation_errors->add('first_shop_url <strong>Error</strong>:', esc_html__('Shop url is required', 'wc-multi-vendor-platform-lite')."!");
			}
		}
		return $wcmvp_validation_errors;
	}

	//=============   function for saving the value of additional fields     ==========================//

	function wcmvp_save_extra_register_fields($customer_id)
	{

		if (isset($_POST['wcmvp-role'])) {
			
			update_user_meta($customer_id, 'wcmvp_email', sanitize_email($_POST['email']));

			if ($_POST['wcmvp-role'] == 'vendor') {

				$wcmvp_role_vendor = "wcmvp_vendor";
			} else {

				$wcmvp_role_vendor = sanitize_text_field($_POST['wcmvp-role']);
			}

			update_user_meta($customer_id, 'wcmvp_role', sanitize_text_field($wcmvp_role_vendor));

			if ($_POST['wcmvp-role'] == "vendor" && (get_role("vendor") != "null")) {

				$wcmvp_role = new WP_User($customer_id);
				$wcmvp_role->remove_role('customer');
				$wcmvp_role->add_role('wcmvp_vendor');

				$wcmvp_vendor_state = get_option("wcmvp_selling_page");
				if (is_array($wcmvp_vendor_state) &&   $wcmvp_vendor_state['wcmvp_allow_add_product'] == '1') {
					update_user_meta($customer_id, 'wcmvp_vendor_status', '1');
				} else {
					update_user_meta($customer_id, 'wcmvp_vendor_status', '0');
				}

				update_user_meta($customer_id, 'wcmvp_vendor_store_img', "");

				$wcmvp_wizzard = get_option("wcmvp_general_setting");
				if (is_array($wcmvp_wizzard) &&   $wcmvp_wizzard['wcmvp_welcome_wizard'] != '1') {
					update_user_meta($customer_id, 'wcmvp_vendor_store_setup', false);
				} else {
					update_user_meta($customer_id, 'wcmvp_vendor_store_setup', true);
				}

				if (isset($_POST['wcmvp_first_name'])) {

					update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['wcmvp_first_name']));
				}
				if (isset($_POST['wcmvp_last_name'])) {

					update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['wcmvp_last_name']));
				}
				if (isset($_POST['wcmvp_shop_names'])) {

					update_user_meta($customer_id, 'wcmvp_store_name', sanitize_text_field($_POST['wcmvp_shop_names']));
				}
				if (isset($_POST['wcmvp_shop_url'])) {


					update_user_meta($customer_id, 'wcmvp_store_url', sanitize_text_field($_POST['wcmvp_shop_url']));
				}
				if (isset($_POST['wcmvp_phone'])) {

					update_user_meta($customer_id, 'wcmvp_phone', sanitize_text_field($_POST['wcmvp_phone']));
				}
			}
		}
	}

	//=============  function for adding custom button to the woocommerce dashboard      ==========================//

	function wcmvp_action_woocommerce_account_dashboard()
	{
		$wcmvp_options = get_option("wcmvp_page_setting");

		if (!empty($wcmvp_options) && is_array($wcmvp_options)) {
			$wcmvp_title = $wcmvp_options['wcmvp_page_setting_dashboard'];
		} else {
			$wcmvp_title = '';
		}
		$wcmvp_permalink = get_permalink($wcmvp_title);
		$wcmvp_ID = get_the_ID();
		update_option("wcmvp_last_page_ID", $wcmvp_ID);
		$user = wp_get_current_user();
		$this->wcmvp_count_function();

		if (current_user_can("multivendor-platformr")) {
		?>
			<a href="<?php echo esc_url($wcmvp_permalink) ?>" class="wcmvp_Dashboard_button">
				<?php esc_html_e("Vendor dashboard", "wc-multi-vendor-platform-lite") ?>
			</a>
			<?php }
	}

	//=============  function for adding product      ==========================//

	function add_product_ajax()
	{
		include_once WCMVP_PUBLIC_PARTIAL . "wcmvp_product_page/wcmvp_add_product_cb.php";
	}

	//=============  function for product table      ==========================//

	function wcmvp_product_table()
	{
		include_once WCMVP_PUBLIC_PARTIAL . "wcmvp_product_page/wcmvp_product_datatable_cb.php";
	}

	//=============  function for editing  product      ==========================//

	function wcmvp_edit_product_ajax()
	{
		include_once WCMVP_PUBLIC_PARTIAL . "wcmvp_product_page/wcmvp_edit_product_cb.php";
	}

	//=============  function for delete product      ==========================//

	function wcmvp_delete_product_ajax()
	{
		if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {
			if (isset($_POST) && !empty($_POST)) {
				if (isset($_POST['wcmvp_prod_ID']) && !empty($_POST['wcmvp_prod_ID'])) {
					if(isset($_POST['wcmvp_condition']) && ($_POST["wcmvp_condition"] == "delete_permanent")){
						$wcmvp_product_ID = sanitize_text_field($_POST['wcmvp_prod_ID']);
					$wcmvp_status  =  wp_delete_post($wcmvp_product_ID);
					if (!empty($wcmvp_status)) {
						echo json_encode("Deleted successfully");
						wp_die();
					}
					}else{
						$wcmvp_product_ID = sanitize_text_field($_POST['wcmvp_prod_ID']);
					$wcmvp_status  =  wp_trash_post($wcmvp_product_ID);
					if (!empty($wcmvp_status)) {
						echo json_encode("trashed successfully");
					}
					}
				}
			}
		}
		wp_die();
	}

	//=============  function for searching user      ==========================//

	function wcmvp_search_reg_users_cb()
	{
		if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {
			$args = array(
				'role' => 'customer',
				'order' => 'ASC',
				'orderby' => 'display_name',
				'search' => '*' . esc_attr(sanitize_text_field($_POST["wcmvp_user_name"])) . '*',

			);


			$wp_user_query = new WP_User_Query($args);
			$authors = $wp_user_query->get_results();
			if (!empty($authors)) {
				$wcmvp_list = array();
				foreach ($authors as $author) {

					$author_info = get_userdata($author->ID);
					$wcmvp_list[$author->ID] = $author_info->data->user_nicename;
				}
				
				echo json_encode($wcmvp_list);
			}
			wp_die();
		}
	}

	//=============  function for sku check      ==========================//

	function check_if_sku_exists($wcmvp_check_sku = '')
	{
		global $wpdb;

		$wcmvp_sku = (empty($wcmvp_check_sku)) ? sanitize_text_field($_POST["wcmvp_sku_string"]) : $wcmvp_check_sku;

		$wcmvp_query = "SELECT * FROM `" . $wpdb->prefix . "postmeta` WHERE `meta_key` LIKE '_sku' AND `meta_value` LIKE %s ORDER BY `meta_key` DESC";
		$wcmvp_check_sku_result = $wpdb->get_var($wpdb->prepare($wcmvp_query, $wcmvp_sku));
		$wcmvp_results = (empty($wcmvp_check_sku_result)) ? false : true;
		if (empty($wcmvp_check_sku)) {
			echo json_encode($wcmvp_results);
			wp_die();
		} else {
			return $wcmvp_results;
		}
	}

	//=============  function for deleting product in bulk      ==========================//
	/*     callback function for deleting product in bulk      */

	function delete_product_bulk_ajax()
	{
		if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {
			
			$wcmvp_product_ID_array = isset($_POST['wcmvp_prod_ID_array']) ? $_POST['wcmvp_prod_ID_array'] : array(); // $_POST['wcmvp_prod_ID_array'] holds array
			
			if (!empty($wcmvp_product_ID_array)) {
				foreach ($wcmvp_product_ID_array as $wcmvp_product_ID) {
					if ($_POST['wcmvp_cond']  ==  'Trash_multiple') {

						$wcmvp_status  =  wp_trash_post(sanitize_text_field($wcmvp_product_ID));
					} elseif ($_POST['wcmvp_cond']  ==  'Delete_multiple') {

						$wcmvp_status = wp_delete_post(intval(sanitize_text_field($wcmvp_product_ID)));
					} elseif ($_POST['wcmvp_cond']  ==  'Restore_multiple') {

						$wcmvp_status = wp_untrash_post(intval(sanitize_text_field($wcmvp_product_ID)));
					}
				}
			}
			if (!empty($wcmvp_status)) {
				if ($_POST['wcmvp_cond']  ==  'Trash_multiple') {

					echo json_encode(1);
					wp_die();
				} elseif ($_POST['wcmvp_cond']  ==  'Delete_multiple') {

					echo json_encode(1);
					wp_die();
				} elseif ($_POST['wcmvp_cond']  ==  'Restore_multiple') {

					echo json_encode(1);
					wp_die();
				}
			}
		}
		wp_die();
	}

	//=============  function for endpoints      ==========================//


	function Vendor_store_endpoints()
	{
		include_once WCMVP_PUBLIC_PARTIAL . "wcmvp_Vendor_Store/wcmvp_Vendor_store_endpoints.php";
	}
	// function wcmvp_show_admin_area(){

	// 	$wcmvp_general_page_options1 = get_option('wcmvp_general_setting');
	// 	//print_r($wcmvp_general_page_options1['wcmvp_access_admin_area']);
	// 	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	// 	// print_r($actual_link); die;
	// 	//print_r($url);
	// 	if($actual_link==site_url().'/wp-admin' && $wcmvp_general_page_options1['wcmvp_access_admin_area']==1){
	// 		//$url = site_url().'/wp-admin';
	// 		$urls=site_url().'/vendor-dashboard';
	// 		//print_r($urls);die;
	// 		wp_redirect( $urls );
	// 		exit;

	// 	}
		
	
	// }

	//=============  function for adding endpoints      ==========================//

	function wcmvp_rewrite_endpoints()
	{
		$wcmvp_options_array  = get_option('wcmvp_general_setting');
		//print_r($wcmvp_options_array);
		if (!empty($wcmvp_options_array) && is_array($wcmvp_options_array)) {
			if ($wcmvp_options_array['wcmvp_access_admin_area'] == "1") {
				update_user_meta(get_current_user_id(), 'show_admin_bar_front', "false");
			} elseif ($wcmvp_options_array['wcmvp_access_admin_area'] == "0") {
				update_user_meta(get_current_user_id(), 'show_admin_bar_front', "true");
			}

			$wcmvp_endpoint_page = $wcmvp_options_array['wcmvp_store_url'];
		
			global $wp_rewrite; 

			$wp_rewrite->set_permalink_structure('/%postname%/'); 
			
			update_option( "rewrite_rules", FALSE ); 
			
			$wp_rewrite->flush_rules( true );

			add_rewrite_rule($wcmvp_endpoint_page . '/?$', 'index.php?', 'top');

			add_rewrite_rule($wcmvp_endpoint_page . '/([^/]+)/?$', 'index.php?wcmvp_pagename=' . $wcmvp_endpoint_page . '&wcmvp_nicename=$matches[1]', 'top');

			add_rewrite_rule($wcmvp_endpoint_page . '/([^/]+)/page/([1-9]|[1-9][0-9]|[1-9][0-9][0-9])/?$', 'index.php?wcmvp_pagename=' . $wcmvp_endpoint_page . '&wcmvp_nicename=$matches[1]&wcmvp_page=$matches[2]', 'top');

			add_rewrite_rule($wcmvp_endpoint_page . '/([^/]+)/([1-9]|[1-9][0-9]|[1-9][0-9][0-9])/?$', 'index.php?wcmvp_pagename=' . $wcmvp_endpoint_page . '&wcmvp_nicename=$matches[1]&wcmvp_cat_ids=$matches[2]', 'top');

			add_rewrite_rule($wcmvp_endpoint_page . '/([^/]+)/([1-9]|[1-9][0-9]|[1-9][0-9][0-9])/page/([1-9]|[1-9][0-9]|[1-9][0-9][0-9])/?$', 'index.php?wcmvp_pagename=' . $wcmvp_endpoint_page . '&wcmvp_nicename=$matches[1]&wcmvp_cat_ids=$matches[2]&wcmvp_page=$matches[3]', 'top');
		}
	}


	//=============  function for adding query vars      ==========================//

	function custom_endpoint($wcmvp_qvars)
	{

		$wcmvp_qvars[] = 'wcmvp_nicename';
		$wcmvp_qvars[] = 'wcmvp_pagename';
		$wcmvp_qvars[] = 'wcmvp_page';
		$wcmvp_qvars[] = 'wcmvp_cat_ids'; 
		return $wcmvp_qvars;
	}

	//=============  function for loading custom templates      ==========================//

	function wcmvp_load_plugin_template($template)
	{
		global $wp; 

		$wcmvp_options_array  =  get_option('wcmvp_general_setting');

		if (!empty($wcmvp_options_array) && is_array($wcmvp_options_array)) {
		
			$wcmvp_endpoint_page = $wcmvp_options_array['wcmvp_store_url'];
		}
		$wcmvp_vendor_slug  =  get_query_var('wcmvp_nicename');

		$wcmvp_options_page_array = get_option("wcmvp_page_setting");
		if (!empty($wcmvp_options_page_array) && is_array($wcmvp_options_page_array)) {
			
			$wcmvp_title = $wcmvp_options_page_array['wcmvp_page_setting_dashboard'];
		}
		$wcmvp_page_ID = get_the_ID();
		if (isset($wcmvp_title) && ($wcmvp_page_ID == $wcmvp_title)) {
			
				if (get_page_template_slug() === 'wcmvp_vendor_dashboard_template.php') {
					
					if ($theme_file = locate_template(array('wcmvp_vendor_dashboard_template.php'))) {
						$template = $theme_file;
					
					} else {
						$template = WCMVP_ASSETS . '/wcmvp_vendor_dashboard_template.php';
					}
				}
				return $template;
		}
		if (isset($wcmvp_endpoint_page) && isset($wcmvp_options_page_array['wcmvp_page_store_listing']) && ($wp->request  ==  $wcmvp_endpoint_page)) {
		
				wp_redirect(get_permalink($wcmvp_options_page_array['wcmvp_page_store_listing']));

		}

		$wcmvp_vendor_cond = (empty($wcmvp_vendor_slug))	?	0	:	1;
		if ($wcmvp_vendor_cond) {

			$template  =   WCMVP_PUBLIC_PARTIAL . "wcmvp_Vendor_Store/wcmvp_Vendor_store_endpoints.php";
		}
		return $template;
	}

	//=============  function for product category filtering     ==========================//

	function wcmvp_category_list_filter($output, $args)
	{
		$wcmvp_var  =  get_query_var('wcmvp_nicename');
		if (!empty($wcmvp_var)) {
			$wcmvp_vendor_detail_obj  =  get_user_by('slug', $wcmvp_var);
			if (is_object($wcmvp_vendor_detail_obj)) {
				$wcmvp_vendor_id = $wcmvp_vendor_detail_obj->data->ID;
			}
			$wcmvp_args = array(
				'author'        =>  $wcmvp_vendor_id,
				'post_type'     => 'product',
				'posts_per_page' => -1
			);

			$wcmvp_current_user_posts = get_posts($wcmvp_args);
			if (!empty($wcmvp_current_user_posts)) {
				$all_categories = array();
				foreach ($wcmvp_current_user_posts as $wcmvp_post) {
					$wcmvp_catergories =  wp_get_post_terms($wcmvp_post->ID, 'product_cat');
					foreach ($wcmvp_catergories as $wcmvp_cat) {
						if (!in_array($wcmvp_cat, $all_categories)) {
							$all_categories[] = $wcmvp_cat;
						}
					}
				}
				foreach ($all_categories as  $wcmvp_cats) {
					if ($wcmvp_cats->parent != 0) {
						$wcmvp_id[$wcmvp_cats->term_id] =   get_ancestors($wcmvp_cats->term_id, 'product_cat');
					} else {
						$wcmvp_id[$wcmvp_cats->term_id] = 0;
					}
				}
				$wcmvp_arr = array();
				foreach ($wcmvp_id as $id => $val) {
					if (!in_array($id, $wcmvp_arr)) {
						$wcmvp_arr[] = $id;
					}
					if (is_array($val)) {
						for ($i = count($val) - 1; $i >= 0; $i--) {
							if (!in_array($val[$i], $wcmvp_arr)) {
								$wcmvp_arr[] = $val[$i];
							}
						}
					}
				}
			}
			if (isset($wcmvp_arr)) {
				if (!in_array($args->term_id, $wcmvp_arr)) {
					$output = "";
					$args = "";
				}
			}
		}
		return $output;
	}

	//=============  function for views count of products      ==========================//

	function  wcmvp_views_update()
	{
		if (is_single()) {
			$wcmvp_post_id = get_the_ID();
			$wcmvp_id = [$wcmvp_post_id];

			$wcmvp_cookie = (isset($_COOKIE['wcmvp_single_prod_view']) && !empty($_COOKIE['wcmvp_single_prod_view'])) ?	sanitize_text_field(json_decode($_COOKIE['wcmvp_single_prod_view']))	:	array();
			if( is_array( $wcmvp_id ) && is_array( $wcmvp_cookie ) ) {
				if (isset($wcmvp_cookie) && !in_array($wcmvp_post_id, $wcmvp_cookie)) {

					$wcmvp_merged = array_merge($wcmvp_id, $wcmvp_cookie);
	
					array_unique($wcmvp_merged);
	
					setcookie("wcmvp_single_prod_view", json_encode($wcmvp_merged), time() + (86400 * 30));
	
					$wcmvp_prod_meta  =  get_post_meta($wcmvp_post_id, 'wcmvp_product_view_count', true);
	
					if (!empty($wcmvp_prod_meta)) {
	
						$wcmvp_count_update = $wcmvp_prod_meta + 1;
					} else {
	
						$wcmvp_count_update = 1;
					}
	
					update_post_meta($wcmvp_post_id, 'wcmvp_product_view_count', $wcmvp_count_update);
				}
			}
		}
		if (isset($_GET["wcmvp_order_id_csv"])) {
			$wcmvp_csv_orders = explode(",", sanitize_text_field($_GET["wcmvp_order_id_csv"]));
		}

		if (isset($wcmvp_csv_orders) && !empty($wcmvp_csv_orders)) {
			$this->wcmvp_create_csv($wcmvp_csv_orders);
		}
	}

	//=============  function for vendor store listing shortcode callback    ==========================//

	function Vendors_Store_cb()
	{
		global $wp_query;

		$wcmvp_options = get_option("wcmvp_page_setting");
		if (!empty($wcmvp_options) && is_array($wcmvp_options)) {
			$wcmvp_store = $wcmvp_options['wcmvp_page_store_listing'];
		}

		$wcmvp_current_id_page  =  $wp_query->get_queried_object_id();

		if ($wcmvp_current_id_page == $wcmvp_store) {

			include_once WCMVP_PUBLIC_PARTIAL . "wcmvp_Vendor_Store/wcmvp_Vendor_Store_shortcode_cb.php";
		}
	}

	//=============  function for store listing preview layout      ==========================//

	function wcmvp_store_listing_preview()
	{

		$wcmvp_cookie_name = "wcmvp_store_listing_view";

		$wcmvp_view = sanitize_text_field($_POST['wcmvp_looks']);

		setcookie($wcmvp_cookie_name, $wcmvp_view, time() - 3600, "/");

		setcookie($wcmvp_cookie_name, $wcmvp_view, time() + (86400 * 30), "/");

		wp_die();
	}

	//=============  function for adding custom tabs in single product page      ==========================//

	function wcmvp_action_woocommerce_after_single_product_summary($wcmvp_tabs)
	{

		$wcmvp_tabs['wcmvp_tab_info'] = array(
			'title'       => esc_html__(' Vendor info ', 'wc-multi-vendor-platform-lite'),
			'priority'    => 50,
			'callback'    => array($this, 'wcmvp_new_product_tab_content'),
		);

		$wcmvp_tabs['wcmvp_tab_list'] = array(
			'title'       => esc_html__(' More Products from Vendor ', 'wc-multi-vendor-platform-lite'),
			'priority'    => 60,
			'callback'    => array($this, 'wcmvp_product_list'),
		);
		return $wcmvp_tabs;
	}

	//=============  function for Vendor info tab content      ==========================//

	function wcmvp_new_product_tab_content()
	{

		$wcmvp_options_array  =  get_option('wcmvp_general_setting');
		$wcmvp_endpoint_page = (!empty($wcmvp_options_array) && is_array($wcmvp_options_array))	?	$wcmvp_options_array['wcmvp_store_url']	:	'';
		$wcmvp_author_url = (!empty($wcmvp_endpoint_page))	?	home_url() . '/' . $wcmvp_endpoint_page . '/' . get_the_author_meta('user_nicename')	:	home_url();
		$wcmvp_heading =  '<h2>' . esc_html__("Vendor Information", "wc-multi-vendor-platform-lite"). "</h2>";
		echo $wcmvp_heading;  // This variable holds html
		$wcmvp_vendor_link =  '<p>'	. esc_html__("Vendor", "wc-multi-vendor-platform-lite").':<a href=' . esc_url($wcmvp_author_url)	. '>';
		echo $wcmvp_vendor_link;	// This variable holds html
		the_author();
		$wcmvp_closing =  "</a></p>";
		echo $wcmvp_closing;	// This variable holds html
		$args_top_rating1 = array(
			'post_type' => 'product',
			'meta_key' => '_wc_average_rating',
			'orderby' => 'meta_value',
			'author'  =>  get_the_author_meta('ID'),
			'posts_per_page' => -1,
			'status' => 'publish',
			'catalog_visibility' => 'visible',
			'stock_status' => 'instock'
		);

		$top_rating = new WP_Query($args_top_rating1);

		$wcmvp_count = 0;
		$wcmvp_total_reviews = 0;
		$wcmvp_total_no_of_review = 0;
		while ($top_rating->have_posts()) : $top_rating->the_post();
			global $product;

			$urltop_rating = get_permalink($top_rating->post->ID);

			$rating_count = $product->get_rating_count();

			$average_rating = $product->get_average_rating();

			$wcmvp_total_reviews  =  $average_rating + $wcmvp_total_reviews;

			$wcmvp_total_no_of_review = $rating_count + $wcmvp_total_no_of_review;
			if (!empty($rating_count)) {
				$wcmvp_count++;
			}

		endwhile;
		if (!empty($wcmvp_count)) {
			$wcmvp_reviews = $wcmvp_total_reviews / $wcmvp_count;
			echo wc_get_rating_html($wcmvp_reviews, $wcmvp_total_no_of_review);
		} else {
			esc_html_e("The vendor is not rated yet", "wc-multi-vendor-platform-lite");
		}
	}

	//=============  function for More Products from Vendor tab content      ==========================//

	function wcmvp_product_list()
	{

		$wcmvp_opening_ul =  '<ul class="products">';
		echo $wcmvp_opening_ul;	// This variable holds html
		$args = array(
			'post_type' => 'product',
			'post__not_in' => array(get_the_ID()),
			'posts_per_page' => 6,
			'orderby' => 'rand',
			'author'  => get_the_author_meta('ID'),
		);
		$loop = new WP_Query($args);
		if ($loop->have_posts()) {
			while ($loop->have_posts()) : $loop->the_post();
				wc_get_template_part('content', 'product');
			endwhile;
		} else {
			esc_html_e('No products found',"wc-multi-vendor-platform-lite");
		}
		wp_reset_postdata();

		$wcmvp_closing_ul =  '</ul>';
		echo $wcmvp_closing_ul;	// This variable holds html
	}

	//=============  function for sending email to vendor      ==========================//

	function wcmvp_email_vendor()
	{
		if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {
			if (isset($_POST) && !empty($_POST)) {

				$wcmvp_user_name  =  sanitize_text_field($_POST['wcmvp_user_name']);
				$wcmvp_user_email  =  sanitize_email($_POST['wcmvp_user_email']);
				$wcmvp_user_message  =  sanitize_text_field($_POST['wcmvp_user_message']);
				$wcmvp_current_vendor_id  =  sanitize_text_field(intval($_POST['wcmvp_current_vendor_id']));
				$wcmvp_vendor_info = get_userdata($wcmvp_current_vendor_id)->data->user_email;
				$headers[] = 'From: ' . $wcmvp_user_name . ' <' . $wcmvp_user_email . '>';
				$wcmvp_mail_response  =  wp_mail($wcmvp_vendor_info, "Customer Reviews", $wcmvp_user_message, $headers, '');
				if ($wcmvp_mail_response) {
					echo json_encode("Sent successfully");
					wp_die();
				}
			}
		}
		wp_die();
	}

	//=============  function for vendor reviews according to its product reviews       ==========================//

	function wcmvp_vendor_reviews($wcmvp_vendor)
	{
		$args_top_rating1 = array(
			'post_type' => 'product',
			'meta_key' => '_wc_average_rating',
			'orderby' => 'meta_value',
			'author'  =>  get_the_author_meta('ID'),
			'posts_per_page' => -1,
			'status' => 'publish',
			'catalog_visibility' => 'visible',
			'stock_status' => 'instock'
		);

		$top_rating = new WP_Query($args_top_rating1);

		$wcmvp_count = 0;
		$wcmvp_total_reviews = 0;
		$wcmvp_total_no_of_review = 0;
		while ($top_rating->have_posts()) : $top_rating->the_post();
			global $product;

			$urltop_rating = get_permalink($top_rating->post->ID);

			$rating_count = $product->get_rating_count();

			$average_rating = $product->get_average_rating();

			$wcmvp_total_reviews  =  $average_rating + $wcmvp_total_reviews;

			$wcmvp_total_no_of_review = $rating_count + $wcmvp_total_no_of_review;
			if (!empty($rating_count)) {
				$wcmvp_count++;
			}

		endwhile;
		if (!empty($wcmvp_count)) {
			$wcmvp_reviews = $wcmvp_total_reviews / $wcmvp_count;
			update_user_meta(get_the_author_meta('ID'), "wcmvp_vendor_rating", wc_get_rating_html($wcmvp_reviews, $wcmvp_total_no_of_review));
		} else {
			update_user_meta(get_the_author_meta('ID'), "wcmvp_vendor_rating", wc_get_rating_html(0, 0));
		}
	}
	//=============  function for order csv      ==========================//

	function wcmvp_export_orders_cb()
	{

		global $wpdb;
		$query = "SELECT ID FROM " . $wpdb->prefix . "posts LEFT JOIN (SELECT post_id,
			MAX(CASE WHEN meta_key = 'wcmvp_order_vendor' THEN meta_value END) wcmvp_order_vendor_name
			FROM " . $wpdb->prefix . "postmeta GROUP BY post_id) wcmvp_selected_table ON " . $wpdb->prefix . "posts.`ID`= wcmvp_selected_table.`post_id`  WHERE wcmvp_order_vendor_name IS NOT NULL AND wcmvp_order_vendor_name='%s'";
		$wcmvp_order_all = $wpdb->get_results($wpdb->prepare($query, get_current_user_id()), ARRAY_A);
		$wcmvp_new = array();
		foreach ($wcmvp_order_all as $key => $value) {
			$wcmvp_new[] = $value["ID"];
		}
		$wcmvp_order_all = $wcmvp_new;

		echo json_encode($wcmvp_order_all);

		wp_die();
	}

	//=============  function for creating csv      ==========================//

	function wcmvp_create_csv($wcmvp_order_all)
	{
		$wcmvp_content_array = array();
		foreach ($wcmvp_order_all as $wcmvp_order_id) {
			$wcmvp_order_id = (int) $wcmvp_order_id;
			$order = new WC_Order(intval($wcmvp_order_id));

			$wcmvp_items_name = "";
			foreach ($order->get_items() as $key => $item) {
				if (!empty($wcmvp_items_name)) {
					$wcmvp_items_name .=  "," . $item->get_name();
				} else {
					$wcmvp_items_name .=  $item->get_name();
				}
			}

			$wcmvp_array_order = array(
				$order->get_order_number(),
				$wcmvp_items_name,
				$order->get_shipping_method(),
				$order->get_shipping_total(),
				$order->get_payment_method_title(),
				$order->get_total(),
				$order->get_status(),
				$order->get_date_created(),
				$order->get_billing_company(),
				$order->get_billing_first_name(),
				$order->get_billing_last_name(), $order->get_formatted_billing_full_name(), $order->get_billing_email(),
				$order->get_billing_phone(),
				$order->get_billing_address_1(),
				$order->get_billing_address_2(),
				$order->get_billing_city(),
				$order->get_billing_state(),
				$order->get_billing_postcode(),
				$order->get_billing_country(),
				$order->get_shipping_company(),
				$order->get_shipping_first_name(),
				$order->get_shipping_last_name(), $order->get_formatted_shipping_full_name(), $order->get_shipping_address_1(),
				$order->get_shipping_address_2(),
				$order->get_shipping_city(),
				$order->get_shipping_state(),
				$order->get_shipping_postcode(),
				$order->get_shipping_country(),
				$order->get_customer_ip_address(),
				$order->get_customer_note()
			);

			$wcmvp_content_array[] =  $wcmvp_array_order;
		}

		$wcmvp_csv_header = array(
			"Order No",
			"Order Items",
			"Shipping method",
			"Shipping Cost",
			"Payment method",
			"Order Total",
			"Order Status",
			"Order Date",
			"Billing Company",
			"Billing First Name",
			"Billing Last Name",
			"Billing Full Name",
			"Billing Email",
			"Billing Phone",
			"Billing Address 1",
			"Billing Address 2",
			"Billing City",
			"Billing State",
			"Billing Postcode",
			"Billing Country",
			"Shipping Company",
			"Shipping First Name",
			"Shipping Last Name",
			"Shipping Full Name",
			"Shipping Address 1",
			"Shipping Address 2",
			"Shipping City",
			"Shipping State",
			"Shipping Postcode",
			"Shipping Country",
			"Customer IP",
			"Customer Note"
		);

		$wcmvp_path 		= get_temp_dir();
		$wcmvp_filename 	= "wcmvp_multivendor_platform" . time() . ".csv";
		$wcmvp_full_path	= $wcmvp_path . $wcmvp_filename;

		$output = fopen($wcmvp_full_path, "w");

		fputcsv($output, $wcmvp_csv_header);

		foreach ($wcmvp_content_array as $wcmvp_key => $wcmvp_value) {
			fputcsv($output, $wcmvp_value);
		}
		fclose($output);
		header("Content-Type: text/csv");
		header("Content-Disposition: attachment; filename=" . $wcmvp_filename);
		readfile($wcmvp_full_path);
		die();
	}

//=============  function returns the url of the dashboard page     ==========================//

	public function wcmvp_vendor_dashboard_url(){
		$wcmvp_options = get_option("wcmvp_page_setting");

		
		if (!empty($wcmvp_options) && is_array($wcmvp_options)) {
			$wcmvp_title = (int) $wcmvp_options['wcmvp_page_setting_dashboard'];
			return get_permalink(	$wcmvp_title	);
		} 
		else{
			return get_permalink( get_option('woocommerce_myaccount_page_id') );
		}
	}

	//=============  function returns the url of the store page     ==========================//

	public function wcmvp_vendor_store_url(){
		$wcmvp_options_array  =  get_option('wcmvp_general_setting');
		if (!empty($wcmvp_options_array) && is_array($wcmvp_options_array)) {
			$wcmvp_endpoint_page = $wcmvp_options_array['wcmvp_store_url'];
			$wcmvp_current_usr_nicename = wp_get_current_user()->user_nicename;
		return esc_url(home_url() . "/" . $wcmvp_endpoint_page . "/" . $wcmvp_current_usr_nicename)  ;
		} 
		else{
			return get_permalink( get_option('woocommerce_myaccount_page_id') );
		}
	}

	//=============  function for vendor page shortcode    ==========================//

	function Vendors_dashboards()
	{
		include_once WCMVP_PUBLIC_PARTIAL . "wcmvp_vendor_dashboard_shortcode.php";  
	}
	function wcmvprre_suborders($current_page){
		remove_action( 'woocommerce_account_orders_endpoint','woocommerce_account_orders');
		
		$current_page    = empty( $current_page ) ? 1 : absint( $current_page );
		$customer_orders = wc_get_orders(
			apply_filters(
				'woocommerce_my_account_my_orders_query',
				array(
					'customer' => get_current_user_id(),
					'page'     => $current_page,
					'paginate' => true,
				)
			)
		); ?>

		<?php

defined( 'ABSPATH' ) || exit; ?>
	<table class="woocommerce-orders-table-custom woocommerce-MyAccount-orders-custom shop_table shop_table_responsive my_account_orders account-orders-table">
		<thead>
			<tr>
				<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
				<th class="woocommerce-orders-table__header woocommerce-orders-table__header-<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
				<?php endforeach; ?>
			</tr>
		</thead>

		<tbody>
			<?php
				foreach ( $customer_orders->orders as $customer_order ) {
				$order = wc_get_order( $customer_order );
				$key_1_values = get_post_meta( $order->get_order_number(), 'is_suborder', true );
				if ($key_1_values != 'yes' ){
				 // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				$item_count = $order->get_item_count() - $order->get_item_count_refunded();
				?>
				<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order">
					<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
						<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name );
	
                         ?>">
                       
							<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

							<?php elseif ( 'order-number' === $column_id ) : ?>
								<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
									<?php echo esc_html( _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); ?>
								</a>

							<?php elseif ( 'order-date' === $column_id ) : ?>
								<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>

							<?php elseif ( 'order-status' === $column_id ) : ?>
								<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>

							<?php elseif ( 'order-total' === $column_id ) : ?>
								<?php
								/* translators: 1: formatted order total 2: total order items */
								echo wp_kses_post( sprintf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ) );
								?>

							<?php elseif ( 'order-actions' === $column_id ) : ?>
								<?php
								$actions = wc_get_account_orders_actions( $order );

								if ( ! empty( $actions ) ) {
									foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
										echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
									}
								}
								?>
							<?php endif; ?>
						</td>
					<?php endforeach; ?>
				</tr>
				<?php
				}
			}
		
			?>
		</tbody>
	</table>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers-custom woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button-custom" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders );
}
}
