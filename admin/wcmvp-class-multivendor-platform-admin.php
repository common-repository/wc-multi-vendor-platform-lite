<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.codexinfra.com
 * @since      1.0.0
 *
 * @package    Wcmvp_Multivendor_Platform
 * @subpackage Wcmvp_Multivendor_Platform/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wcmvp_Multivendor_Platform
 * @subpackage Wcmvp_Multivendor_Platform/admin
 * @author     CodexInfra <developers@codexinfra.com>
 */
class Wcmvp_Multivendor_Platform_Admin
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
	 * Register the stylesheets for the admin area.
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
		$wcmvp_current_screen = get_current_screen();

		if ($wcmvp_current_screen->id == "toplevel_page_wc-multi-vendor-platform-lite") {
			wp_enqueue_style('wcmvp-bundle-css', WCMVP_URL . 'assets/bundle/css/bundle.css', array(), $this->wcmvp_version, 'all');
			wp_enqueue_style('wcmvp-material_icon-css', "https://fonts.googleapis.com/icon?family=Material+Icons", array(), $this->wcmvp_version, 'all' );		// This file has the material design icons pack
			wp_enqueue_style('wcmvp-select2-cdn-css', WCMVP_ASSETS_COMMON_CSS."select2.min.css", array(), $this->wcmvp_version, 'all' );
			wp_enqueue_style($this->wcmvp_plugin_name, plugin_dir_url(__FILE__) . 'css/wcmvp-multivendor-platform-admin.css', array(), $this->wcmvp_version, 'all');
			wp_enqueue_style('wcmvp_admin-dashboard', plugin_dir_url(__FILE__) . 'css/wcmvp-multivendor-platform-admin-dashboard.css', array(), $this->wcmvp_version, 'all');
			wp_enqueue_style('wcmvp-material-datatable-ajax-css',plugin_dir_url(__FILE__) . 'css/material.min.css', array(), $this->wcmvp_version, 'all');
			wp_enqueue_style('wcmvp-material-datatables-css', plugin_dir_url(__FILE__) . 'css/dataTables.material.min.css', array(), $this->wcmvp_version, 'all');
			
		}
	}	/**
	 * Register the JavaScript for the admin area.
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
		//This Function is used to enqueue all js files 

		$wcmvp_current_screen = get_current_screen();
		
		if ($wcmvp_current_screen->id == "toplevel_page_wc-multi-vendor-platform-lite") {
			
			wp_enqueue_script('wcmvp-bundle-js', WCMVP_URL . 'assets/bundle/js/bundle.js', array(), $this->wcmvp_version, 'all');
			wp_enqueue_script( 'select2' );
			wp_enqueue_script('wcmvp-material-datatable-js', WCMVP_ASSETS_COMMON_JS . "dataTables.material.min.js", array(), $this->wcmvp_version, 'all');
			wp_enqueue_script($this->wcmvp_plugin_name, plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-admin.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_media();
			wp_enqueue_script('wcmvp-dashboard', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-dashboard.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-report', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-report.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-features', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-features.js', array('jquery'), $this->wcmvp_version, false);
			
			wp_enqueue_script('wcmvp-customer', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-customer.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-announcements', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-announcements.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-seller-verification', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-seller-verification.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-social-api-lite', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-social-api.js', array('jquery'), $this->wcmvp_version, false);
			
			wp_enqueue_script('wcmvp-vendor', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-vendor.js', array('jquery','select2'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-vendor_product', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-vendor_product.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-vendor_order', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-vendor_order.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-settings', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-settings.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-general-setting', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-general-setting.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-selling-option', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-selling-option.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-withdraw-option', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-withdraw-option.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-page-setting', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-page-setting.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-appearence', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-appearence.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-privacy-policy', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-privacy-policy.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('notice-js', WCMVP_ASSETS_URL . '/notify.min.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp_datatable_js', plugin_dir_url(__FILE__) . 'js/jquery.dataTables.min.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp_datatable_buttons', plugin_dir_url(__FILE__).'js/csv-button.min.js', array('jquery','wcmvp_datatable_js'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp_button_html', plugin_dir_url(__FILE__).'js/csv-button-datatable.min.js', array('jquery','wcmvp_datatable_js'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp_dashboard_chart_bundle_js', WCMVP_ASSETS_COMMON_JS . 'Chart.min.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-withdraw', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-withdraw.js', array('jquery'), $this->wcmvp_version, false);
			wp_enqueue_script('wcmvp-payment-gateway', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-payment-gateway.js', array('jquery'), $this->wcmvp_version, false);
			
			//================== this function used to send data through ajax request===============/// 

			wp_localize_script(
				'wcmvp-dashboard',
				'wcmvp_general_page_object',
				array('wcmvp_ajax_url' => admin_url('admin-ajax.php'), 'wcmvp_general_page_nonce' => wp_create_nonce("wcmvp-multivendor-platform-general"), 'wcmvp_translatable_js_strings'=> $this->wcmvp_multivendor_platform_translatable_js_strings())
			);

			wp_localize_script(
				'wcmvp-selling-option',
				'wcmvp_sellings_options_object',
				array( 'wcmvp_ajax_url' => admin_url( 'admin-ajax.php' ), 'wcmvp_sellings_option_nonce' => wp_create_nonce('wcmvp-multivendor-platform-selling') )
			);

			wp_localize_script(
				'wcmvp-withdraw-option',
				'wcmvp_withdraw_option_object',
				array( 'wcmvp_ajax_url' => admin_url( 'admin-ajax.php' ), 'wcmvp_withdraw_option_nonce' => wp_create_nonce('wcmvp-multivendor-platform-withdraw-option') )
			);

			wp_localize_script(
				'wcmvp-page-setting',
				'wcmvp_page_setting_object',
				array( 'wcmvp_ajax_url' => admin_url( 'admin-ajax.php' ), 'wcmvp_page_setting_nonce' => wp_create_nonce('wcmvp-page-settings') )
			);

			wp_localize_script(
				'wcmvp-appearence',
				'wcmvp_appearence_page_object',
				array( 'wcmvp_ajax_url' => admin_url( 'admin-ajax.php' ), 'wcmvp_appearence_nonce' => wp_create_nonce('wcmvp-appearence-nonce') )

			);

			wp_localize_script(
				'wcmvp-privacy-policy',
				'wcmvp_privacy_policy_object',
				array( 'wcmvp_ajax_url' => admin_url( 'admin-ajax.php' ), 'wcmvp_privacy_nonce' => wp_create_nonce('wcmvp-privacy-policy-nonce') )
			);

			wp_localize_script(
				'wcmvp-vendor',
				'wcmvp_vendor_object',
				array( 'wcmvp_ajax_url' => admin_url( 'admin-ajax.php' ), 'wcmvp_vendor_nonce' => wp_create_nonce('wcmvp-vendor-nonce') )
			);

			wp_localize_script(
				'wcmvp-feautres',
				'wcmvp_features_object',
				array( 'wcmvp_ajax_url' => admin_url( 'admin-ajax.php' ), 'wcmvp_features_nonce' => wp_create_nonce('wcmvp-features-nonce') )
			);

			wp_localize_script(
				'wcmvp-withdraw',
				'ajax_withdraw_object',
				array('wcmvp_ajax_url' => admin_url('admin-ajax.php'), 'wcmvp_withdraw_nonce' => wp_create_nonce('wcmvp-withdraw-nonce'))
			);


		}
	}


//================function is used to remove all notices from multivendor-platform dashboard=================//

	function wcmvp_remove_notice(){

		if(is_admin())
		{
			$wcmvp_current_screen = get_current_screen();

			if ($wcmvp_current_screen->id == "toplevel_page_wc-multi-vendor-platform-lite")
			{
				remove_all_actions( 'admin_notices' );
				remove_all_actions('all_admin_notices');
			}
		}
	}

/*=================  Function to add admin menu  ===================*/

	public function wcmvp_add_admin_menu()
	{
		if (current_user_can('manage_options') || is_admin()) {
			global $current_user, $submenu;
			$wcmvp_poosition = '17';
			add_menu_page(esc_html__('Bazaar', 'wc-multi-vendor-platform-lite'), esc_html__('Bazaar', 'wc-multi-vendor-platform-lite'), 'manage_options', 'wc-multi-vendor-platform-lite', array($this, 'wcmvp_display_admin_section'), WCMVP_ADMIN_IMAGES_URL.'multivendor-platform_icon.png', sanitize_text_field($wcmvp_poosition));
		}
	}

//============== Function to display admin dashboard area=============//

	function wcmvp_display_admin_section()
	{
		include_once(WCMVP_ADMIN_PARTIAL . 'wcmvp-multivendor-platform-admin-display.php');?>
		<div id="wcmvp-loader-image">
			<div class="wcmvp-loader-box">
				<div class="wcmvp-reload-loader-img-div">
					<img id="wcmvp-loader-image-tag" src="<?php echo esc_url(WCMVP_ADMIN_IMAGES_URL.'loader.gif'); ?>">
				</div>
			</div>
		</div>
		<?php
	}
	

//=============Function is used to translate strings/texts which used in javascript======//

	function wcmvp_multivendor_platform_translatable_js_strings()
	{
		$wcmvp_multivendor_platform_js_translatable_val =  include_once WCMVP_ADMIN_PARTIAL.'/js-translations/wcmvp-multivendor-platform-js-translations-string.php';
		return $wcmvp_multivendor_platform_js_translatable_val;
	}


//===================Function when display withdraw section at admin panel=============================//

	function wcmvp_admin_withdraw_cb()
	{
		if( check_ajax_referer('wcmvp-withdraw-nonce','wcmvp_withdraw_nonce_verify') )
		{
			include_once( WCMVP_ADMIN_PARTIAL.'/admin-includes/wcmvp-multivendor-platform-withdraw.php' );		
		}
	}

//=================Function is used to when withdraw status changed from withdraw status table===============//

	function wcmvp_withdraw_status_cb()
	{
		if( check_ajax_referer('wcmvp-withdraw-nonce','wcmvp_withdraw_status_nonce_verify') )
		{
			include_once( WCMVP_ADMIN_PARTIAL.'/admin-includes/wcmvp-multivendor-platform-withdraw-functionality.php' );
		}
	}

//===================Function to get data from withdraw table and shows in note msg===============//

	function wcmvp_withdraw_status_note_cb()
	{
		if( check_ajax_referer('wcmvp-withdraw-nonce','wcmvp_withdraw_status_nonce_verify') )
		{
			if( isset($_POST['wcmvp_withdraw_add_note_id']) && !empty($_POST['wcmvp_withdraw_add_note_id']) )
			{
				global $wpdb;
				
				$wcmvp_withdraw_note_query = "SELECT note FROM ".$wpdb->prefix."wcmvp_withdraw WHERE id=%d";
				if(isset($wcmvp_withdraw_note_query))
				{
					$wcmvp_withdraw_note_msg = $wpdb->get_results($wpdb->prepare($wcmvp_withdraw_note_query,sanitize_text_field($_POST['wcmvp_withdraw_add_note_id'])));
					if( isset($wcmvp_withdraw_note_msg) && is_array($wcmvp_withdraw_note_msg) )
					{
						if( isset($wcmvp_withdraw_note_msg[0]) )
						{
							if( is_object($wcmvp_withdraw_note_msg[0]) && isset($wcmvp_withdraw_note_msg[0]->note) )
							{
								$wcmvp_withdraw_note_msg = $wcmvp_withdraw_note_msg[0]->note;

								if( isset($wcmvp_withdraw_note_msg) ){
									do_action('wcmvp_withdraw_note_display');
									echo json_encode($wcmvp_withdraw_note_msg,'wc-multi-vendor-platform-lite');
								}
								wp_die();
							}
						}
					}
				}
			}
			wp_die();
		}
	}

//===============Function when display withdraw section's COUNT at admin panel=======================//

	function wcmvp_admin_withdraw_count_cb(){

		if( check_ajax_referer('wcmvp-withdraw-nonce','wcmvp_withdraw_nonce_verify') ) {

			global $wpdb;

			$wcmvp_wp_query = "SELECT COUNT(*) FROM ".$wpdb->prefix."wcmvp_withdraw WHERE `status`=%s";
			if( isset($wcmvp_wp_query) )
			{
				$wcmvp_withdraw_pending_count = $wpdb->get_var( $wpdb->prepare( $wcmvp_wp_query, 'pending' ) );
	
				$wcmvp_withdraw_approved_count = $wpdb->get_var( $wpdb->prepare( $wcmvp_wp_query, 'approved' ) );
				
				$wcmvp_withdraw_cancelled_count = $wpdb->get_var( $wpdb->prepare( $wcmvp_wp_query, 'cancelled' ) );
	
				if( isset($wcmvp_withdraw_pending_count) && isset($wcmvp_withdraw_approved_count) && isset($wcmvp_withdraw_cancelled_count) )
				{
					$wcmvp_withdraw_count = array(
						'wcmvp_withdraw_pending_count' => $wcmvp_withdraw_pending_count,
						'wcmvp_withdraw_approved_count' => $wcmvp_withdraw_approved_count,
						'wcmvp_withdraw_cancelled_count' => $wcmvp_withdraw_cancelled_count
					);
					do_action('wcmvp_withdraw_count',$wcmvp_withdraw_count);
					echo json_encode($wcmvp_withdraw_count);
				}
			}
		}
		wp_die();
	}

//===================== Function which used to ajax request callback of general page==========================//

	function wcmvp_general_page_cb()
	{
		if (check_ajax_referer('wcmvp-multivendor-platform-general', 'wcmvp_general_page_nonce_verify')) 
		{
			
			
			if (isset($_POST['wcmvp_general_settings']) && is_array($_POST['wcmvp_general_settings']) && !empty($_POST['wcmvp_general_settings'])) 
			{	
				$wcmvp_general_settings_page = $_POST['wcmvp_general_settings'];// $_POST['wcmvp_general_settings'] variable holds array		
				if ( isset($wcmvp_general_settings_page) && is_array($wcmvp_general_settings_page) && !empty($wcmvp_general_settings_page)) 
				{
					foreach ($wcmvp_general_settings_page as $wcmvp_key => $wcmvp_value) 
					{
						if(isset($wcmvp_value))
						{
							$wcmvp_value = sanitize_text_field($wcmvp_value);
							$wcmvp_general_settings_page[$wcmvp_key] = $wcmvp_value;
						}
					}
					if ( isset($wcmvp_general_settings_page['wcmvp_store_url'] ) && empty($wcmvp_general_settings_page['wcmvp_store_url'] )) {
						$wcmvp_general_settings_page['wcmvp_store_url'] =	'store';
					}
					if ( isset($wcmvp_general_settings_page['wcmvp_wizard_logo_id'] ) && empty($wcmvp_general_settings_page['wcmvp_wizard_logo_id'] )) {
						$wcmvp_general_settings_page['wcmvp_wizard_logo_id'] = get_bloginfo( 'name' );
					}
					update_option('wcmvp_general_setting', $wcmvp_general_settings_page);
					do_action('wcmvp_general_page_setting_data_save');
					echo json_encode(1);
					wp_die();
				}
			}
		}
	}
	
//===================This Function is callback function of selling options page ajax request===============//

	function wcmvp_selling_options_page_cb()
	{
		if( check_ajax_referer('wcmvp-multivendor-platform-selling' , 'wcmvp_sellings_option_nonce_verify' ))
		{
			
			if(isset($_POST['wcmvp_selling_options']) && is_array($_POST['wcmvp_selling_options']) && !empty($_POST['wcmvp_selling_options']))
			{
				$wcmvp_selling_options_page = $_POST['wcmvp_selling_options'];	// $_POST['wcmvp_selling_options'] variable holds array
				if( isset($wcmvp_selling_options_page) && is_array($wcmvp_selling_options_page) && !empty($wcmvp_selling_options_page) )
				{
					foreach( $wcmvp_selling_options_page as $wcmvp_key => &$wcmvp_value )
					{
						if(isset($wcmvp_value)){
							$wcmvp_value = sanitize_text_field($wcmvp_value);
							$wcmvp_selling_options_page[$wcmvp_key] = $wcmvp_value;
						}
					}
					if( isset($wcmvp_selling_options_page['wcmvp_comission_value']) && empty($wcmvp_selling_options_page['wcmvp_comission_value']) )
					{
						$wcmvp_selling_options_page['wcmvp_comission_value'] = 0;
					}
					update_option( 'wcmvp_selling_page', $wcmvp_selling_options_page );
					do_action('wcmvp_selling_option_page_setting_data_save');
					echo json_encode(1);
					wp_die();
				}
			}
		}		
	}

//==============This Function is used to manage ajax request of withdraw options tab========================//

	function wcmvp_withdraw_option_page_cb(){

		if( check_ajax_referer('wcmvp-multivendor-platform-withdraw-option','wcmvp_withdraw_page_nonce') )
		{
			if( isset($_POST['wcmvp_withdraw_option']) && is_array($_POST['wcmvp_withdraw_option']) && !empty($_POST['wcmvp_withdraw_option']) )
			{
				$wcmvp_withdraw_option_page = $_POST['wcmvp_withdraw_option'];	// $_POST['wcmvp_withdraw_option'] variable holds array
				if( isset($wcmvp_withdraw_option_page) && is_array($wcmvp_withdraw_option_page) && !empty($wcmvp_withdraw_option_page) )
				{
					foreach( $wcmvp_withdraw_option_page as $wcmvp_key => &$wcmvp_value )
					{
						if(isset($wcmvp_value)){
							$wcmvp_value = sanitize_text_field($wcmvp_value);
							$wcmvp_withdraw_option_page[$wcmvp_key] = $wcmvp_value;
						}
					}
					if( isset($wcmvp_withdraw_option_page['wcmvp_minimum_withdraw']) && empty($wcmvp_withdraw_option_page['wcmvp_minimum_withdraw']) )
					{
						$wcmvp_withdraw_option_page['wcmvp_minimum_withdraw'] = 0;
					}
					update_option( 'wcmvp_withdraw_option' , $wcmvp_withdraw_option_page );
					do_action('wcmvp_withdraw_option_page_setting_data_save');
					echo json_encode(1);
					wp_die();
				}
			}
		}
	}

//==============================Function is used to manage ajax of payment gateway ppage===================//

	function wcmvp_payment_gateway_page_cb()
	{
		if( check_ajax_referer('wcmvp-multivendor-platform-withdraw-option','wcmvp_withdraw_page_nonce') )
		{
			
			
			if( isset($_POST['wcmvp_payment_gateway']) && is_array($_POST['wcmvp_payment_gateway']) && !empty($_POST['wcmvp_payment_gateway']) )
			{
				$wcmvp_payment_gateway_page = $_POST['wcmvp_payment_gateway'];// $_POST['wcmvp_payment_gateway'] variable holds array	
				if( isset($wcmvp_payment_gateway_page) && is_array($wcmvp_payment_gateway_page) && !empty($wcmvp_payment_gateway_page) )
				{
					foreach( $wcmvp_payment_gateway_page as $wcmvp_key => &$wcmvp_value )
					{
						if(isset($wcmvp_value)){
							$wcmvp_value = sanitize_text_field($wcmvp_value);
							$wcmvp_payment_gateway_page[$wcmvp_key] = $wcmvp_value;
						}
					}
					update_option( 'wcmvp_payment_gateway' , $wcmvp_payment_gateway_page );
					do_action('wcmvp_payment_gateway_page_setting_data_save');
					echo json_encode(1);
					wp_die();
				}
			}
		}
	}

//=====================This Function is used to manage ajax request of page setting tab======================//

	function wcmvp_page_setting_cb(){

		if( check_ajax_referer('wcmvp-page-settings','wcmvp_page_setting_nonce_verify') )
		{
			

			if(isset($_POST['wcmvp_page_setting']) && is_array($_POST['wcmvp_page_setting']) && !empty($_POST['wcmvp_page_setting']) )
			{	
				$wcmvp_page_setting_data = $_POST['wcmvp_page_setting'];// $_POST['wcmvp_page_setting'] variable holds array		

				if( isset($wcmvp_page_setting_data) && is_array($wcmvp_page_setting_data) && !empty($wcmvp_page_setting_data) )
				{
					foreach ($wcmvp_page_setting_data as $wcmvp_key => $wcmvp_value )
					{
						if(isset($wcmvp_value)){
							$wcmvp_value = sanitize_text_field($wcmvp_value);
							$wcmvp_page_setting_data[$wcmvp_key] = $wcmvp_value;
						}
					}
					update_option( 'wcmvp_page_setting' , $wcmvp_page_setting_data );
					do_action('wcmvp_page_setting_data_save');
					
					if(isset($wcmvp_page_setting_data["wcmvp_page_setting_dashboard"]) && !empty($wcmvp_page_setting_data["wcmvp_page_setting_dashboard"])){
						
						$wcmvp_create_dashboard_page = array(
							'ID'			=>	sanitize_text_field($wcmvp_page_setting_data["wcmvp_page_setting_dashboard"]),
							'post_content'  => '[Vendor_Dashboard]',
							'page_template'  => "wcmvp_vendor_dashboard_template.php"
						);
						wp_update_post( $wcmvp_create_dashboard_page );
					}
					if(isset($wcmvp_page_setting_data["wcmvp_page_store_listing"]) && !empty($wcmvp_page_setting_data["wcmvp_page_store_listing"])){
						$wcmvp_create_store_page = array(
							'ID'			=>	sanitize_text_field($wcmvp_page_setting_data["wcmvp_page_store_listing"]),
							'post_content'  => '[Vendor_Store]',
							'page_template'  => "Vendor-store.php"
						);
						wp_update_post( $wcmvp_create_store_page );
					}
					echo json_encode(1);
					wp_die();
				}
			}
		}
	}

//========================== function to manage ajax request of appearence page================================//

	function wcmvp_appearence_page_cb()
	{
		if( check_ajax_referer( 'wcmvp-appearence-nonce','wcmvp_appearence_nonce_verify' ) )
		{
				
			if( isset($_POST['wcmvp_appearence_page']) && is_array($_POST['wcmvp_appearence_page']) && !empty($_POST['wcmvp_appearence_page']) )
			{
				$wcmvp_appearence_page_data = $_POST['wcmvp_appearence_page'];	// $_POST['wcmvp_appearence_page'] variable holds array
				if( isset($wcmvp_appearence_page_data) && is_array($wcmvp_appearence_page_data) && !empty($wcmvp_appearence_page_data) )
				{
					foreach( $wcmvp_appearence_page_data as $wcmvp_key => $wcmvp_value )
					{
						if(isset($wcmvp_value)){
							$wcmvp_value = sanitize_text_field($wcmvp_value);
							$wcmvp_appearence_page_data[$wcmvp_key] = $wcmvp_value;
						}
					}
					update_option( 'wcmvp_appearence_page', $wcmvp_appearence_page_data );
					do_action('wcmvp_appearence_page_setting_data_save');
					echo json_encode(1);
					wp_die();
				}
			}
		}
	}

//===================== Function To manage ajax request from privacy policy page============================//

	function wcmvp_setting_privacy_cb(){
		if( check_ajax_referer('wcmvp-privacy-policy-nonce','wcmvp_privacy_policy_page_nonce_verify') )
		{
				
			if( isset($_POST['wcmvp_privacy_page']) && is_array($_POST['wcmvp_privacy_page']) && !empty($_POST['wcmvp_privacy_page']) )
			{
				$wcmvp_privacy_page_data = $_POST['wcmvp_privacy_page'];	// $_POST['wcmvp_privacy_page'] variable holds array
				if( isset($wcmvp_privacy_page_data) && is_array($wcmvp_privacy_page_data) && !empty($wcmvp_privacy_page_data) )
				{
					foreach( $wcmvp_privacy_page_data as $wcmvp_key => $wcmvp_value )
					{
						if(isset($wcmvp_value)){
							$wcmvp_value = sanitize_text_field($wcmvp_value);
							$wcmvp_privacy_page_data[$wcmvp_key] = $wcmvp_value;
						}
					}
					update_option( 'wcmvp_privacy_page', $wcmvp_privacy_page_data );
					do_action('wcmvp_privacy_policy_page_setting_data_save');
					
					if(isset($wcmvp_privacy_page_data["wcmvp_setting_privacy_page"]) && !empty($wcmvp_privacy_page_data["wcmvp_setting_privacy_page"])){
						$wcmvp_create_dashboard_page = array(
							'ID'			=>	sanitize_text_field($wcmvp_privacy_page_data["wcmvp_setting_privacy_page"]),
							'post_content'  => isset($wcmvp_privacy_page_data["wcmvp_setting_privacy_content"]) ? sanitize_text_field($wcmvp_privacy_page_data["wcmvp_setting_privacy_content"]) : "",
						);
						wp_update_post( $wcmvp_create_dashboard_page );
					}
					echo json_encode(1);
					wp_die();
				}
			}
		}
	}

//===================Function is used to display vendors list at admin panel.==========================//

	function wcmvp_vendors_table_cb() {

		if(check_ajax_referer('wcmvp-vendor-nonce','wcmvp_vendor_nonce_verify'))
		{
			include_once( WCMVP_ADMIN_PARTIAL.'/admin-includes/wcmvp-multivendor-platform-vendor-table.php');
		}	
	}

// =================Function to be used for showing vendor status active or not.========================//

	function wcmvp_vendor_status_cb() 
	{
		if(check_ajax_referer('wcmvp-vendor-nonce','wcmvp_vendor_nonce_verify'))
		{
			if(isset($_POST['wcmvp_vendor_status']) && isset($_POST['wcmvp_vendor_data_id']) )
			{
				$wcmvp_vendor_status = sanitize_text_field($_POST['wcmvp_vendor_status']);
				$wcmvp_vendor_data_id = sanitize_text_field($_POST['wcmvp_vendor_data_id']);
				if( isset($wcmvp_vendor_status) && isset($wcmvp_vendor_data_id) )
				{
					update_user_meta( $wcmvp_vendor_data_id, 'wcmvp_vendor_status' , $wcmvp_vendor_status );
					echo json_encode(1);
					do_action('wcmvp_multivendor_platform_vendor_status_changed');
					wp_die();
				}
			}
		}
	}

//============ Function to be used for applying bulk action on vendor's section at admin end====================//

	function wcmvp_vendor_bulk_cb()
	{
		if( check_ajax_referer( 'wcmvp-vendor-nonce','wcmvp_vendor_bulk_nonce_verify' ) )
		{
			
			if( isset( $_POST['wcmvp_vendor_array'] ) && isset( $_POST['wcmvp_vendor_bulk_action'] ) )
			{	
				$wcmvp_vendor_array = $_POST['wcmvp_vendor_array'];// $_POST['wcmvp_vendor_array'] hold array
				$wcmvp_vendor_bulk_action = sanitize_text_field($_POST['wcmvp_vendor_bulk_action']);
				
				if( is_array( $wcmvp_vendor_array ) && !empty( $wcmvp_vendor_array ) )
				{			
					foreach( $wcmvp_vendor_array as $wcmvp_key => $wcmvp_value )
					{
						if(isset($wcmvp_value))
						{
							$wcmvp_value = sanitize_text_field( $wcmvp_value );
							update_user_meta( $wcmvp_value, 'wcmvp_vendor_status', $wcmvp_vendor_bulk_action ) ;
						}
					}
					echo json_encode(1);
					do_action('wcmvp_multivendor_platform_vendor_status_changed');
					wp_die();
				}
			}
		}
	}

//================display data when click to Edit button from vendorlist section==================//

	function wcmvp_vendors_data_cb() {

		if( check_ajax_referer( 'wcmvp-vendor-nonce','wcmvp_vendors_data_verify' ) )
		{
			if( isset( $_POST['wcmvp_vendor_data_id'] ) )
			{
				$wcmvp_vendors_id = sanitize_text_field($_POST['wcmvp_vendor_data_id']);
				
				if( isset($wcmvp_vendors_id) && !empty($wcmvp_vendors_id) )
				{
					$wcmvp_vendors_data_db = get_user_meta($wcmvp_vendors_id);

					if(isset($wcmvp_vendors_data_db))
					{
						$wcmvp_vendor_store_img = $wcmvp_vendors_data_db['wcmvp_vendor_store_img'];
						
						if(isset($wcmvp_vendor_store_img[0]))
						{
							$wcmvp_vendors_data_db['wcmvp_vendor_store_img'] = wp_get_attachment_url( $wcmvp_vendor_store_img[0] );
						}
						if(isset($wcmvp_vendors_data_db['wcmvp_vendor_country'][0]))
						{
							$wcmvp_vendor_sel_country = $wcmvp_vendors_data_db['wcmvp_vendor_country'][0];
							$wcmvp_countries_value  = new WC_Countries();
							if(isset($wcmvp_vendor_sel_country) && isset($wcmvp_countries_value) && is_object($wcmvp_countries_value) )
							{
								$wcmvp_state = $wcmvp_countries_value->get_states($wcmvp_vendor_sel_country);
								
								if(isset($wcmvp_state))
								{
									$wcmvp_html = '';
									if(is_array($wcmvp_state) && !empty($wcmvp_state) )
									{
										$wcmvp_html = '<select class = wcmvp_vendor_state>';
										$wcmvp_html .= '<option value="">'.esc_html__( 'Select State', 'wc-multi-vendor-platform-lite' ).'</option>';
										foreach( $wcmvp_state as $wcmvp_key_states => $wcmvp_val_state )
										{
											$wcmvp_html .= '<option value="'.esc_attr( $wcmvp_key_states ).'">'.esc_html__( $wcmvp_val_state, 'wc-multi-vendor-platform-lite' ).'</option>';
										}
										$wcmvp_html .= '</select>';
									}
									if( isset($wcmvp_html) )
									{
										$wcmvp_vendors_data_db['wcmvp_vendor_all_state'] = $wcmvp_html;
									}
									if(isset($wcmvp_vendors_data_db))
									{
										do_action('wcmvp_country_changes_to_state');
										echo json_encode($wcmvp_vendors_data_db);
									}
									wp_die();
								}
							}
						}
					}
				}
			}
			wp_die();
		}
	}

//=========function used to select country and state in edit vendor details section at admin panel in vendor========//

	function wcmvp_vendor_selected_country_cb() {

		if( check_ajax_referer( 'wcmvp-vendor-nonce','wcmvp_vendor_sel_count_nonce' ) )
		{	
			if( isset($_POST['wcmvp_vendor_selected_country']) )
			{
				$wcmvp_vendor_sel_country = sanitize_text_field($_POST['wcmvp_vendor_selected_country']);
				$wcmvp_countries_value  = new WC_Countries();
				if( isset($wcmvp_vendor_sel_country) && isset($wcmvp_countries_value) )
				{
					$wcmvp_state = $wcmvp_countries_value->get_states($wcmvp_vendor_sel_country);

					$wcmvp_html = '';
	
					if(isset($wcmvp_state) && is_array($wcmvp_state) && !empty($wcmvp_state) )
					{
						$wcmvp_html = '<select class = wcmvp_vendor_state>';
						$wcmvp_html .= '<option value="">'.esc_html__( 'Select State', 'wc-multi-vendor-platform-lite' ).'</option>';
						foreach( $wcmvp_state as $states => $state )
						{
							$wcmvp_html .= '<option value="'.esc_attr( $states ).'">'.esc_html__( $state, 'wc-multi-vendor-platform-lite' ).'</option>';
						}
						$wcmvp_html .= '</select>';
					}
					do_action('wcmvp_country_changes_to_state');
					echo json_encode( $wcmvp_html );
				}
				wp_die();
			}
		}
	}

//=================== Function used when admin update any vendor's data from admin panel=======================//

	function wcmvp_edit_vendors_data_cb() {

		if( check_ajax_referer( 'wcmvp-vendor-nonce','wcmvp_vendors_data_verify' ) )
		{
			include_once( WCMVP_ADMIN_PARTIAL.'/admin-includes/wcmvp-multivendor-platform-vendor-edit.php' );
		}
	}

//===============Function views when product table gets Launch at admin dashboard========================//

	function wcmvp_vendors_product_cb() {

		if(check_ajax_referer('wcmvp-vendor-nonce','wcmvp_vendor_nonce_verify'))
		{					
			include_once( WCMVP_ADMIN_PARTIAL.'/admin-includes/wcmvp-multivendor-platform-product-table.php' );
		}	
	}

//==================================Fires when create an user form admin panel===============================//

	function wcmvp_user_register_cb($wcmvp_current_registerd_user) 
	{
		$wcmvp_current_registerd_user_data = get_userdata($wcmvp_current_registerd_user);

		if( isset($wcmvp_current_registerd_user_data) )
		{
			$wcmvp_current_registerd_user_role = $wcmvp_current_registerd_user_data->roles;
			if( isset($wcmvp_current_registerd_user_role[0]) )
			{
				if( $wcmvp_current_registerd_user_role[0] == 'administrator' || $wcmvp_current_registerd_user_role[0] == 'wcmvp_vendor' )
				{
					if( !empty(get_option('wcmvp_selling_page')) )
					{
						$wcmvp_selling_page = get_option('wcmvp_selling_page');

						if(isset($wcmvp_selling_page))
						{
							if( isset($wcmvp_selling_page['wcmvp_allow_add_product']) )
							{
								if( $wcmvp_selling_page['wcmvp_allow_add_product'] == 1 )
								{
									update_user_meta($wcmvp_current_registerd_user, 'wcmvp_vendor_status', 1);
								}
								else
								{
									update_user_meta($wcmvp_current_registerd_user, 'wcmvp_vendor_status', 0);
								}
							}
						}
					}
					do_action('wcmvp_creating_new_vendor');
					update_user_meta( $wcmvp_current_registerd_user, 'wcmvp_vendor_store_img', 0 );
					update_user_meta( $wcmvp_current_registerd_user, 'wcmvp_store_name', '(no name)' );
					update_user_meta( $wcmvp_current_registerd_user, 'wcmvp_role', 'wcmvp_vendor' );
				}
			}
		}

	}

//=============Function is used to product tab count at product table=======================///

	function wcmvp_prod_tab_count_cb() {
		
		if(check_ajax_referer('wcmvp-vendor-nonce','wcmvp_vendor_nonce_verify'))
		{	
			global $wpdb;

			if( isset( $_POST['wcmvp_product_author_id'] ) && !empty( $_POST['wcmvp_product_author_id'] ) )
            {		
				$wcmvp_prod_auth_id = sanitize_text_field($_POST['wcmvp_product_author_id']);

				if(isset($wcmvp_prod_auth_id))
				{
					$wcmvp_prod_query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = '%s' AND post_author = ".$wcmvp_prod_auth_id." AND (post_status = 'draft' OR post_status = 'private' OR post_status = 'publish' OR post_status = 'pending' ) " ;
					if( isset($wcmvp_prod_query) )
					{
						$wcmvp_prod_all_count = $wpdb->get_var( $wpdb->prepare( $wcmvp_prod_query, 'product' ) );
					}

					$wcmvp_prod_query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = '%s' AND post_type = 'product' AND post_author = ".$wcmvp_prod_auth_id."";
				}
			}
			else
			{
				$wcmvp_prod_query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = '%s' AND (post_status = 'draft' OR post_status = 'private' OR post_status = 'publish' OR post_status = 'pending' ) " ;
					if( isset($wcmvp_prod_query) )
					{
						$wcmvp_prod_all_count = $wpdb->get_var( $wpdb->prepare( $wcmvp_prod_query, 'product' ) );
					}

					$wcmvp_prod_query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = '%s' AND post_type = 'product'";
			}
				
				if( isset($wcmvp_prod_query ) )
				{
					$wcmvp_prod_publish_count = $wpdb->get_var( $wpdb->prepare( $wcmvp_prod_query, 'publish' ),0 );

					$wcmvp_prod_private_count = $wpdb->get_var( $wpdb->prepare( $wcmvp_prod_query, 'private' ),0 );
					
					$wcmvp_prod_draft_count = $wpdb->get_var( $wpdb->prepare( $wcmvp_prod_query, 'draft' ),0 );
					
					$wcmvp_prod_pending_count = $wpdb->get_var( $wpdb->prepare( $wcmvp_prod_query, 'pending' ),0 );

					$wcmvp_prod_trash_count = $wpdb->get_var( $wpdb->prepare( $wcmvp_prod_query, 'trash' ),0 );
					
					$wcmvp_prod_count_array = array(
						'wcmvp_prod_auth_id' => isset($wcmvp_prod_auth_id) ? $wcmvp_prod_auth_id : 0,
						'wcmvp_prod_all_count' => isset($wcmvp_prod_all_count) ? $wcmvp_prod_all_count : 0,
						'wcmvp_prod_publish_count' => isset($wcmvp_prod_publish_count) ? $wcmvp_prod_publish_count : 0,
						'wcmvp_prod_draft_count' => isset($wcmvp_prod_draft_count) ? $wcmvp_prod_draft_count : 0,
						'wcmvp_prod_pending_count' => isset($wcmvp_prod_pending_count) ? $wcmvp_prod_pending_count : 0,
						'wcmvp_prod_trash_count' => isset($wcmvp_prod_trash_count) ? $wcmvp_prod_trash_count : 0,
						'wcmvp_prod_private_count' => isset($wcmvp_prod_private_count) ? $wcmvp_prod_private_count : 0
					);

					update_option( 'wcmvp_prod_count_vend_id',$wcmvp_prod_count_array['wcmvp_prod_auth_id'] );
					do_action('wcmvp_product_counts',$wcmvp_prod_count_array);
					echo json_encode($wcmvp_prod_count_array);
				}
			wp_die();
		}

	}

//=================Function activates when admin clicks on product edit, to generate link for edit partiucular=======//	

	function wcmvp_prod_edit_cb() 
	{
		if(check_ajax_referer('wcmvp-vendor-nonce','wcmvp_vendor_nonce_verify'))
		{
			if( current_user_can('manage_options') )
			{
				if( isset($_POST['wcmvp_edit_prod_id']) && !empty($_POST['wcmvp_edit_prod_id'])) 
				{
					$wcmvp_edit_prod_id = sanitize_text_field($_POST['wcmvp_edit_prod_id']);
					
					if( isset($wcmvp_edit_prod_id) && !empty($wcmvp_edit_prod_id) )
					{
						$wcmvp_prod_edit_url = add_query_arg( array(
							'post' => $wcmvp_edit_prod_id,
							'action' => 'edit',
							'wcmvp_prod_hide' => 'true'
							),admin_url('post.php'));

						$wcmvp_edit_prod_author_id = get_post_field('post_author',$wcmvp_edit_prod_id);
						if( isset($wcmvp_edit_prod_author_id) && isset($wcmvp_prod_edit_url) )
						{
							$wcmvp_edit_prod_array = array(
								'wcmvp_prod_edit_url' => $wcmvp_prod_edit_url,
								'wcmvp_edit_prod_author_id' => $wcmvp_edit_prod_author_id
							);
							if( isset($wcmvp_edit_prod_array) )
							{
								do_action('wcmvp_edit_product_redirected_url',$wcmvp_edit_prod_array);
								echo json_encode($wcmvp_edit_prod_array);
							}
						}
						wp_die();
					}
				}
			}
		}
	}

//============================This function is used to enqueue css in iframes=========================//

	function wcmvp_add_meta_boxes_cb()
	{
		add_meta_box( 'wcmvp_meta_box','Assign To', array($this,'wcmvp_add_meta_cb' ),'product');

		if( isset($_GET['wcmvp_prod_hide']) && !empty($_GET['wcmvp_prod_hide']) )	
		{
			$wcmvp_hide_url = sanitize_text_field($_GET['wcmvp_prod_hide']);

			if( isset($wcmvp_hide_url) )
			{
				if($_GET['wcmvp_prod_hide'] == $wcmvp_hide_url)
				{
					wp_enqueue_style($this->wcmvp_plugin_name, plugin_dir_url(__FILE__) . 'css/wcmvp-multivendor-platform-admin-hide.css', array(), $this->wcmvp_version, 'all');
					wp_enqueue_script('wcmvp-vendor_product', plugin_dir_url(__FILE__) . 'js/wcmvp-multivendor-platform-vendor_product.js', array('jquery'), $this->wcmvp_version, false); 
				}
			}
		}
		do_action('wcmvp_add_meta_box_for_assigining_vendor_to_product');
	}

//============function used to assign product according to vendors while creating a new product==============//

	function wcmvp_add_meta_cb() {

		if( isset($_GET['wcmvp_assigning_vendor']) )
		{
			global $post;
		
			$wcmvp_meta_args = array(
				'role__in' => array( 'wcmvp_vendor','administrator' ),
				'id' => 'wcmvp_metaboxes_vend_id',
				'selected' => sanitize_text_field($_GET['wcmvp_assigning_vendor']),
				'name'	=> 'wcmvp_assigning_user'
			);
			wp_dropdown_users($wcmvp_meta_args);
		}
		else
		{
			global $post;
			
			$wcmvp_meta_args = array(
				'role__in' => array( 'wcmvp_vendor','administrator' ),
				'id' => 'wcmvp_metaboxes_vend_id',
				'selected' => $post->post_author,
				'name'	=> 'wcmvp_assigning_user'
			);
			wp_dropdown_users($wcmvp_meta_args);
		}
	}

//=============================This function triggers when admin clicks to add new product================//

	function wcmvp_prod_add_new_cb() 
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_vendor_nonce_verify') )
		{
			if( isset($_POST['wcmvp_assigning_vendor']) && !empty($_POST['wcmvp_assigning_vendor']) )
			{
				$wcmvp_prod_add_url = add_query_arg(array('post_type'=>'product','wcmvp_prod_hide' => 'true','wcmvp_assigning_vendor'=>sanitize_text_field($_POST['wcmvp_assigning_vendor'])),admin_url('post-new.php'));

				if( isset($wcmvp_prod_add_url) )
				{
					echo json_encode($wcmvp_prod_add_url);
				}
				wp_die();
			}
		}
	}

//=================Function activates when admin post product/ add new product from iframe=============//

	function wcmvp_multivendor_platform_redirect_post_location_cb($wcmvp_prod_location,$wcmvp_prod_id)
	{
		if( isset($_POST) && !empty($_POST) && is_array($_POST))
		{	
			if( isset($_POST['wcmvp_assigning_user']) && !empty($_POST['wcmvp_assigning_user']) )
			{
				if( isset($_POST['post_ID']) && !empty($_POST['post_ID']) )
				{
					$wcmvp_update_user = array(
						'ID' => sanitize_text_field($_POST['post_ID']),
						'post_author' => sanitize_text_field($_POST['wcmvp_assigning_user']),
					);
					
					wp_update_post($wcmvp_update_user);

				}
			}
		}
		if( !empty($_SERVER['HTTP_REFERER']) )
		{
			if( strstr($_SERVER['HTTP_REFERER'],'wcmvp_prod_hide=true') )
			{
				$wcmvp_prod_location = add_query_arg( array(
					'wcmvp_prod_hide' => 'true',
				), $wcmvp_prod_location) ;

				return $wcmvp_prod_location;
				
			}
			else
			{
				return $wcmvp_prod_location;
			}
		}
		else
		{
			return $wcmvp_prod_location;
		}
	}

//=========== This function is used to display data of quick edit section in product table page	=============//

	function wcmvp_prod_quick_edit_cb()
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_vendor_nonce_verify') )
		{
			if( isset($_POST['wcmvp_prod_quick_edit_id']) && !empty($_POST['wcmvp_prod_quick_edit_id']) )
			{
				$wcmvp_prod_quick_edit_id = sanitize_text_field($_POST['wcmvp_prod_quick_edit_id']);
				if( isset($wcmvp_prod_quick_edit_id) && !empty($wcmvp_prod_quick_edit_id) )
				{
					$wcmvp_prod_quick_post = get_post($wcmvp_prod_quick_edit_id);
					if( isset($wcmvp_prod_quick_post) && is_object($wcmvp_prod_quick_post) && !empty( $wcmvp_prod_quick_post ) )
					{
						$wcmvp_post_prod = array(
							'wcmvp_prod_post_title' => isset($wcmvp_prod_quick_post->post_title) ? $wcmvp_prod_quick_post->post_title : '',
							'wcmvp_prod_post_slug' => isset($wcmvp_prod_quick_post->post_name) ? $wcmvp_prod_quick_post->post_name : '',
							'wcmvp_prod_post_date' => date("j/m/Y", strtotime(isset($wcmvp_prod_quick_post->post_date) ? $wcmvp_prod_quick_post->post_date : '')),
							'wcmvp_prod_post_time' => date("h:i:s", strtotime(isset($wcmvp_prod_quick_post->post_date) ? $wcmvp_prod_quick_post->post_date : '')),
							'wcmvp_prod_post_password' => isset($wcmvp_prod_quick_post->post_password) ? $wcmvp_prod_quick_post->post_password : '',
							'wcmvp_prod_post_status' => isset($wcmvp_prod_quick_post->post_status) ? $wcmvp_prod_quick_post->post_status : '',
							'wcmvp_prod_comment_status' => isset($wcmvp_prod_quick_post->comment_status) ? $wcmvp_prod_quick_post->comment_status : ''
						);
					}

				$wcmvp_prod_tag = wp_get_post_terms( $wcmvp_prod_quick_edit_id, 'product_tag', array( 'fields' => 'names' )  );
									
					$wcmvp_prod_tag_val = "";

					if( is_array($wcmvp_prod_tag) && !empty($wcmvp_prod_tag) )
					{	
						
						foreach( $wcmvp_prod_tag as $wcmvp_name ) 
						{
							if( isset($wcmvp_name) && !empty($wcmvp_name) )
							{
								if( !empty($wcmvp_prod_tag_val) && ( !empty($wcmvp_name) ) ) 
								{
									$wcmvp_prod_tag_val .= ", ". $wcmvp_name;
								}
								else
								{
									$wcmvp_prod_tag_val = $wcmvp_name;
								}
							}
							
						}
					}

					$wcmvp_prod_shpping_class = wp_get_post_terms( $wcmvp_prod_quick_edit_id,'product_shipping_class',array( 'fields' => 'slugs' ) );

						if( isset($wcmvp_prod_shpping_class) && is_array($wcmvp_prod_shpping_class) && !empty($wcmvp_prod_shpping_class) )
						{
							if( isset($wcmvp_prod_shpping_class[0]) )
							{
								$wcmvp_prod_shpping_class_val = $wcmvp_prod_shpping_class[0];
							}
						}

					$wcmvp_prod_prod_visibility = wp_get_post_terms( $wcmvp_prod_quick_edit_id,'product_visibility',array( 'fields' => 'slugs' ) );

						if( isset($wcmvp_prod_prod_visibility) && empty($wcmvp_prod_prod_visibility) )
						{
							$wcmvp_prod_prod_visibile_slug = "visible";
						}
						if( count($wcmvp_prod_prod_visibility) == 1 )
						{
							if( isset($wcmvp_prod_prod_visibility[0]) && !empty($wcmvp_prod_prod_visibility[0]) )
							{
								if( $wcmvp_prod_prod_visibility[0] == 'outofstock' )
								{
									$wcmvp_prod_prod_visibile_slug = "visible";
								}
							}
						}
						if( isset($wcmvp_prod_prod_visibility) && !empty($wcmvp_prod_prod_visibility) )
						{
							if( in_array('exclude-from-search',$wcmvp_prod_prod_visibility) )
							{
								$wcmvp_prod_prod_visibile_slug = "catalog";
							}
							if( in_array('exclude-from-catalog',$wcmvp_prod_prod_visibility) )
							{
								$wcmvp_prod_prod_visibile_slug = "search";
							}
							if( (in_array('exclude-from-search',$wcmvp_prod_prod_visibility)) && (in_array('exclude-from-catalog',$wcmvp_prod_prod_visibility)) )
							{
								$wcmvp_prod_prod_visibile_slug = "hidden";
							}
							if( in_array( 'featured',$wcmvp_prod_prod_visibility ) )
							{
								$wcmvp_prod_prod_featured_slug = "featured";
							}
						}
					
					$wcmvp_prod_post_cat = wp_get_post_terms( $wcmvp_prod_quick_edit_id,'product_cat',array( 'fields' => 'names' ) );	

					$wcmvp_post_meta_prod = array(
						'wcmvp_prod_post_sku' => get_post_meta($wcmvp_prod_quick_edit_id,'_sku',true),
						'wcmvp_prod_post_reg_price' => get_post_meta($wcmvp_prod_quick_edit_id,'_regular_price',true),
						'wcmvp_prod_post_sale_price' => get_post_meta($wcmvp_prod_quick_edit_id,'_sale_price',true),
						'wcmvp_prod_post_stock_qty' => get_post_meta($wcmvp_prod_quick_edit_id,'_stock',true),
						'wcmvp_prod_post_stock_status' => get_post_meta($wcmvp_prod_quick_edit_id,'_stock_status',true),
						'wcmvp_prod_post_weight' => get_post_meta($wcmvp_prod_quick_edit_id,'_weight',true),
						'wcmvp_prod_post_length' => get_post_meta($wcmvp_prod_quick_edit_id,'_length',true),
						'wcmvp_prod_post_width' => get_post_meta($wcmvp_prod_quick_edit_id,'_width',true),
						'wcmvp_prod_post_height' => get_post_meta($wcmvp_prod_quick_edit_id,'_height',true),
						'wcmvp_prod_post_manage_stock' => get_post_meta($wcmvp_prod_quick_edit_id,'_manage_stock',true),
						'wcmvp_prod_post_backorders' => get_post_meta($wcmvp_prod_quick_edit_id,'_backorders',true),
						'wcmvp_prod_tag_val' => (isset($wcmvp_prod_tag_val) ? $wcmvp_prod_tag_val : ""),
						'wcmvp_prod_shpping_class_val' => (isset($wcmvp_prod_shpping_class_val) ? $wcmvp_prod_shpping_class_val : ""),
						'wcmvp_prod_prod_visibile_slug' => (isset($wcmvp_prod_prod_visibile_slug) ? $wcmvp_prod_prod_visibile_slug : ""),
						'wcmvp_prod_prod_featured_slug' => (isset($wcmvp_prod_prod_featured_slug) ? $wcmvp_prod_prod_featured_slug : ""),
						'wcmvp_prod_post_cat' => (isset($wcmvp_prod_post_cat) ? $wcmvp_prod_post_cat : "")
					);

					if( (isset($wcmvp_post_prod) && !empty($wcmvp_post_prod) ) && ( isset($wcmvp_post_meta_prod) && !empty($wcmvp_post_meta_prod) ) )
					{
						$wcmvp_post_prod_all = array_merge($wcmvp_post_prod,$wcmvp_post_meta_prod);
						if( isset($wcmvp_post_prod_all) && !empty($wcmvp_post_prod_all) )
						{	
							do_action('wcmvp_product_quick_edit_data',$wcmvp_post_prod_all);
							echo json_encode($wcmvp_post_prod_all);
							wp_die();
						}
					}	
				}
			}
		}
	}

//================Function came into action when admin click to quick edit section of product page=============//

	function wcmvp_prod_quick_edit_action_cb() {

		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_prod_quick_edit_nonce_verify') )
		{
			if( isset($_POST['wcmvp_prod_quick_edit']) && is_array($_POST['wcmvp_prod_quick_edit']) && !empty($_POST['wcmvp_prod_quick_edit']) )
			{
				if( isset($_POST['wcmvp_prod_quick_edit']['wcmvp_quick_edit_update']) && !empty($_POST['wcmvp_prod_quick_edit']['wcmvp_quick_edit_update']) )
				{
					$wcmvp_quick_edit_update_id = sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_quick_edit_update']);
					if( isset($wcmvp_quick_edit_update_id) && !empty($wcmvp_quick_edit_update_id) )
					{
						if( (isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_title']) && !empty($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_title'])) && (isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_slug'])) && (isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_publish_date'])) )
						{
							$wcmvp_prod_publish_date = str_replace("/","-", sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_publish_date']));
							$wcmvp_prod_publish_date_last = date("Y-m-j h:i:s", strtotime($wcmvp_prod_publish_date));

							do_action('wcmvp_quick_edit_section_updatation');

							$rwmer_prod_quick_edit_post = array(
								'ID' => sanitize_text_field($wcmvp_quick_edit_update_id),
								'post_title' => sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_title']),
								'post_name' => sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_slug']),
								'post_date' => (isset($wcmvp_prod_publish_date_last) ? $wcmvp_prod_publish_date_last : "0000-00-00 00:00:00")
							);

							wp_update_post($rwmer_prod_quick_edit_post);
						}

						if( isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_private']) && !empty($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_private']) )
						{
							$wcmvp_prod_status = array(
								'ID' => sanitize_text_field($wcmvp_quick_edit_update_id),
								'post_status' => sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_private']),
							);
							wp_update_post($wcmvp_prod_status);
						}

						if( isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_password']) )
						{
							$wcmvp_prod_pass = array(
								'ID' => sanitize_text_field($wcmvp_quick_edit_update_id),
								'post_password' => sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_password']),
							);
							wp_update_post($wcmvp_prod_pass);
						}

						if( isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_tag']) && !empty($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_tag']) )
						{
							wp_set_object_terms($wcmvp_quick_edit_update_id, sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_tag']), 'product_tag');
						}

						if( isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_enable_reviews']) && !empty($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_enable_reviews']) )
						{
							$wcmvp_prod_reviews = array(
								'ID' => sanitize_text_field($wcmvp_quick_edit_update_id),
								'comment_status' => sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_enable_reviews']),
							);
							wp_update_post($wcmvp_prod_reviews);
						}
						if( isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_status']) && !empty($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_status']) )
						{
							$wcmvp_prod_reviews = array(
								'ID' => sanitize_text_field($wcmvp_quick_edit_update_id),
								'post_status' => sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_status']),
							);
							wp_update_post($wcmvp_prod_reviews);
						}

						if( isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_sku']) && isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_reg_price']) && isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_sale_price']) && isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_weight']) && isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_length']) && isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_width']) && isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_height']) )
						{
							update_post_meta( $wcmvp_quick_edit_update_id,'_sku',sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_sku'] ));
							update_post_meta( $wcmvp_quick_edit_update_id,'_regular_price',sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_reg_price'] ));
							update_post_meta( $wcmvp_quick_edit_update_id,'_sale_price',sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_sale_price'] ));
							update_post_meta( $wcmvp_quick_edit_update_id,'_weight',sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_weight'] ));
							update_post_meta( $wcmvp_quick_edit_update_id,'_length',sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_length'] ));
							update_post_meta( $wcmvp_quick_edit_update_id,'_width',sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_width'] ));
							update_post_meta( $wcmvp_quick_edit_update_id,'_height',sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_height'] ));
						}

						if( (isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_sale_price']) && !empty($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_sale_price']) ) )
						{
							update_post_meta( $wcmvp_quick_edit_update_id,'_price',sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_sale_price'] ));
						}
						else
						{
							update_post_meta( $wcmvp_quick_edit_update_id,'_price',sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_reg_price'] ));
						}

						if( isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_visibility_array']) )
						{
							wp_set_object_terms( $wcmvp_quick_edit_update_id, sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_visibility_array']), 'product_visibility' );
						}

						if( isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_shipping_class']) && !empty($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_shipping_class']) )
						{
							wp_set_object_terms( $wcmvp_quick_edit_update_id, sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_shipping_class']),'product_shipping_class' );
						}

						if( ( isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_stock_status']) && !empty($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_stock_status']) ) && isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_stock_qty']) && isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_backorders']) )
						{
							update_post_meta( $wcmvp_quick_edit_update_id,'_stock_status',sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_stock_status'] ));
							update_post_meta( $wcmvp_quick_edit_update_id,'_stock',sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_stock_qty'] ));
							update_post_meta( $wcmvp_quick_edit_update_id,'_backorders',sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_backorders'] ));
							update_post_meta( $wcmvp_quick_edit_update_id,'_manage_stock',sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_backorders'] ));
						}

						if( isset($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_post_cat_array']) && !empty($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_post_cat_array']) )
						{
							wp_set_object_terms( $wcmvp_quick_edit_update_id, sanitize_text_field($_POST['wcmvp_prod_quick_edit']['wcmvp_prod_post_cat_array']),'product_cat' );
						}

						$wcmvp_quick_edit_author_id = get_post_field('post_author',$wcmvp_quick_edit_update_id);
						if( isset($wcmvp_quick_edit_author_id) )
						{
							do_action('wcmvp_product_quick_edit_update');
							echo json_encode($wcmvp_quick_edit_author_id);
						}
					}
					wp_die();
				}
			}
		}
	}

//===================== Function is used to trash posts from admin panel============================//

	function wcmvp_prod_trash_action_cb() 
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_prod_trash_verify') )
		{
			if( isset($_POST['wcmvp_prod_trash_id']) && !empty($_POST['wcmvp_prod_trash_id']) )
			{
				$wcmvp_prod_trash_id = sanitize_text_field($_POST['wcmvp_prod_trash_id']);
				if( isset($wcmvp_prod_trash_id) && !empty($wcmvp_prod_trash_id) )
				{
					do_action('wcmvp_product_before_send_to_trash');
					wp_trash_post($wcmvp_prod_trash_id);
					do_action('wcmvp_product_after_send_to_trash');
					$wcmvp_trash_post_author = get_post_field( 'post_author',$wcmvp_prod_trash_id );
					if( isset($wcmvp_trash_post_author) && !empty($wcmvp_trash_post_author) )
					{
						echo json_encode($wcmvp_trash_post_author);
					}
					wp_die();
				}
			}
		}
	}

//============ Function is used to display preivew of products from product page=======//

	function wcmvp_prod_preview_action_cb() 
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_prod_preview_verify') )
		{	
			if( isset($_POST['wcmvp_prod_preview_id']) && !empty($_POST['wcmvp_prod_preview_id']) )
			{
				$wcmvp_prod_preview_id = sanitize_text_field($_POST['wcmvp_prod_preview_id']);
				if( isset($wcmvp_prod_preview_id) && !empty($wcmvp_prod_preview_id) )
				{
					$wcmvp_prod_preview_url = add_query_arg( array(
						'post_type' => 'product',
						'p'	=> $wcmvp_prod_preview_id,
						'preview' => 'true'
					), site_url().'/' );
					if(isset($wcmvp_prod_preview_url))
					{
						do_action('wcmvp_redirect_for_prod_preview',$wcmvp_prod_preview_url);
						echo json_encode($wcmvp_prod_preview_url);
					}
					wp_die();
				}
			}
		}
	}

//===================== Function is used to trash posts from admin panel============================//

	function wcmvp_prod_restore_action_cb() 
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_prod_restore_verify') )
		{
			if( isset($_POST['wcmvp_prod_restore_id']) && !empty($_POST['wcmvp_prod_restore_id']) )
			{
				$wcmvp_prod_restore_id = sanitize_text_field($_POST['wcmvp_prod_restore_id']);
				if( isset($wcmvp_prod_restore_id) && !empty($wcmvp_prod_restore_id) )
				{
					wp_untrash_post($wcmvp_prod_restore_id);
					do_action('wcmvp_product_restored_from_trash');
					$wcmvp_restore_post_author = get_post_field( 'post_author',$wcmvp_prod_restore_id );
					if( isset($wcmvp_restore_post_author) && !empty($wcmvp_restore_post_author) )
					{
						echo json_encode($wcmvp_restore_post_author);
					}
					wp_die();
				}
			}
		}
	}

//===================== Function is used to Delete Permanentaly from admin panel============================//

	function wcmvp_prod_delete_action_cb() 
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_prod_delete_verify') )
		{
			if( isset($_POST['wcmvp_prod_delete_id']) && !empty($_POST['wcmvp_prod_delete_id']) )
			{
				$wcmvp_prod_delete_id = sanitize_text_field($_POST['wcmvp_prod_delete_id']);
				if( isset($wcmvp_prod_delete_id) && !empty($wcmvp_prod_delete_id) )
				{
					$wcmvp_delete_post_author = get_post_field( 'post_author',$wcmvp_prod_delete_id );
					if( isset($wcmvp_delete_post_author) && !empty($wcmvp_delete_post_author) )
					{
						echo json_encode($wcmvp_delete_post_author);
					}
					do_action('wcmvp_product_delete');
					wp_delete_post($wcmvp_prod_delete_id);
					wp_die();
				}
			}
		}
	}

//===================== Function is used to apply bulk action from product table============================//

	function wcmvp_prod_checkboxes_action_cb() 
	{	
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_prod_checkboxes_verify') )
		{
			if( isset($_POST['wcmvp_prod_bulk_action_val']) && !empty($_POST['wcmvp_prod_bulk_action_val']) )
			{
				$wcmvp_prod_bulk_action_val = sanitize_text_field($_POST['wcmvp_prod_bulk_action_val']);
				if( isset($wcmvp_prod_bulk_action_val) && !empty($wcmvp_prod_bulk_action_val) )
				{
					if( isset($_POST['wcmvp_prod_checkboxes']) && !empty($_POST['wcmvp_prod_checkboxes']) )
					{
						$wcmvp_prod_checkboxes = $_POST['wcmvp_prod_checkboxes'];	// $_POST['wcmvp_prod_checkboxes'] variable holds array	
						if( isset($wcmvp_prod_checkboxes) && is_array($wcmvp_prod_checkboxes) && !empty($wcmvp_prod_checkboxes) )
						{
							$wcmvp_checkboxes_post_author = get_post_field( 'post_author',sanitize_text_field($wcmvp_prod_checkboxes[0]) );
							if( isset($wcmvp_checkboxes_post_author) && !empty($wcmvp_checkboxes_post_author) )
							{
								echo json_encode($wcmvp_checkboxes_post_author);
							}
							foreach( $wcmvp_prod_checkboxes as $checkbox )
							{
								if( isset($checkbox) && !empty($checkbox) )
								{
									$checkbox = sanitize_text_field($checkbox);
									
									if( $wcmvp_prod_bulk_action_val == 'wcmvp_bulk_trash_prod' )
									{
										do_action('wcmvp_product_before_send_to_trash');
										wp_trash_post($checkbox);
										do_action('wcmvp_product_after_send_to_trash');
									}
									if( $wcmvp_prod_bulk_action_val == 'wcmvp_bulk_restore_prod' )
									{
										wp_untrash_post($checkbox);
										do_action('wcmvp_product_restored_from_trash');
									}
									if( $wcmvp_prod_bulk_action_val == 'wcmvp_bulk_delete_prod' )
									{
										do_action('wcmvp_product_delete');
										wp_delete_post($checkbox);
									}
								}
							}
						}
					}
					wp_die();
				}
			}
		}
	}

//=============Function is used when duppliacte product gets created from iframe section======================//

	function wcmvp_admin_url_cb($wcmvp_admin_url,$wcmvp_admin_path,$wcmvp_admin_blog_id) 
	{	
		if( isset($wcmvp_admin_url) )
		{
			if( strstr($wcmvp_admin_url,'action=edit') )
			{
				if( isset($_GET['wcmvp_prod_hide']) && !empty($_GET['wcmvp_prod_hide']) )
				{
					if( $_GET['wcmvp_prod_hide'] == 'true' )
					{
						if( isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) )
						{
							if(strstr($_SERVER['HTTP_REFERER'],'wc-multi-vendor-platform-lite'))
							{
								$wcmvp_admin_url = add_query_arg(array(
									'wcmvp_prod_hide' => 'true',
								),$wcmvp_admin_url);
								return $wcmvp_admin_url;
							}
						}
					}
				}
				if( isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) )
				{
					if(strstr($_SERVER['HTTP_REFERER'],'wcmvp_prod_hide=true'))
					{
						$wcmvp_admin_url = add_query_arg(array(
							'wcmvp_prod_hide' => 'true',
						),$wcmvp_admin_url);
						return $wcmvp_admin_url;
					}
					else
					{
						return $wcmvp_admin_url;
					}
				}
				else
				{
					return $wcmvp_admin_url;
				}
				
			}
			else
			{
				return $wcmvp_admin_url;
			}
		}
	}

//====================When activates when click on to create duplicate product from product table===========///

	function wcmvp_duplicate_prod_cb()
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_duplicate_nonce_verify') )
		{
			if( isset($_POST['wcmvp_prod_dupplicate_id']) && !empty($_POST['wcmvp_prod_dupplicate_id']) )
			{
				$wcmvp_prod_duplicate_author = get_post_field( 'post_author',sanitize_text_field($_POST['wcmvp_prod_dupplicate_id']));
				if( isset($wcmvp_prod_duplicate_author) && !empty($wcmvp_prod_duplicate_author) )
				{
					$wcmvp_wc_dup_prod = new WC_Admin_Duplicate_Product;
					$wcmvp_dup_prod = $wcmvp_wc_dup_prod->product_duplicate( wc_get_product( sanitize_text_field($_POST['wcmvp_prod_dupplicate_id'] )) );
					if( isset($wcmvp_dup_prod) && is_object($wcmvp_dup_prod) && isset($wcmvp_dup_prod->id) )
					{
						$wcmvp_duplicate_post = array(
							'ID'  => sanitize_text_field($wcmvp_dup_prod->id),
							'post_author' => sanitize_text_field($wcmvp_prod_duplicate_author)
						);
						wp_update_post( $wcmvp_duplicate_post );
						
						$wcmvp_prod_dup_add_url = add_query_arg(

							array(
							'action' => 'edit',
							'post' => $wcmvp_dup_prod->id,
							'wcmvp_prod_hide' => 'true',
							),admin_url('post.php'));

						if(isset($wcmvp_prod_dup_add_url))
						{
							do_action('wcmvp_duplicate_product_creation',$wcmvp_prod_dup_add_url);
							echo json_encode($wcmvp_prod_dup_add_url);
						}
						wp_die();
					}
				}

			} 
		}
	}

//=================Function is going to call when, empty trash button activates from product listing page=========//
	
	function wcmvp_empty_trash_cb() {

		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_empty_trash_nonce') )
		{
			$wcmvp_trash_post = array(
				'numberposts' => -1,
				'post_type' => 'product',
				'post_status' => 'trash',
				'fields' => 'ids'
			);
			$wcmvp_trash_post_id = get_posts($wcmvp_trash_post);

			if( isset($wcmvp_trash_post_id) && is_array($wcmvp_trash_post_id) && !empty($wcmvp_trash_post_id) )
			{
				if( isset($wcmvp_trash_post_id[0]) && !empty($wcmvp_trash_post_id[0]) )
				{
					$wcmvp_del_post_author = get_post_field( 'post_author',$wcmvp_trash_post_id[0] );
					foreach( $wcmvp_trash_post_id as $trash )
					{
						if( isset($trash) && !empty($trash) )
						{
							do_action('wcmvp_product_empty_trash');
							wp_delete_post($trash);
						}
					}
					if( isset($wcmvp_del_post_author) )
					{
						echo json_encode($wcmvp_del_post_author);
					}
				}
			}
			wp_die();
		}

	}

//=========================Function Goes when product set featured from product table page===============//

	function wcmvp_fav_prod_cb() {

		if( check_ajax_referer( 'wcmvp-vendor-nonce','wcmvp_fav_prod_data_nonce' ) )
		{
			if( isset($_POST['wcmvp_fav_prod']) && (isset( $_POST['wcmvp_fav_prod_id'] ) && !empty($_POST['wcmvp_fav_prod_id'])) )
			{
				wp_set_object_terms( sanitize_text_field($_POST['wcmvp_fav_prod_id']), sanitize_text_field($_POST['wcmvp_fav_prod']),'product_visibility' );
				echo json_encode(1);
				wp_die();
			}
		}
	}

//====================Function is used to get count of vendors according their status=====================//
	
	function wcmvp_vendors_count_action_cb() 
	{
		if( check_ajax_referer( 'wcmvp-vendor-nonce','wcmvp_vendors_count_nonce' ) )	
		{
			global $wpdb;

			$wcmvp_query = "SELECT COUNT(*) FROM  $wpdb->users as m LEFT JOIN (SELECT user_id,
			MAX(CASE WHEN meta_key='wcmvp_vendor_status' THEN meta_value END) wcmvp_vendor_status
			FROM $wpdb->usermeta GROUP BY user_id) wcmvp_vendor_table ON m.`ID` = wcmvp_vendor_table.`user_id`
			WHERE (wcmvp_vendor_status = %d)";
			if( isset($wcmvp_query) )
			{
				$wcmvp_approved_vendors = $wpdb->get_var( $wpdb->prepare( $wcmvp_query, 1 ),0);
				$wcmvp_disabled_vendors = $wpdb->get_var( $wpdb->prepare( $wcmvp_query, 0 ),0);
	
				if( isset($wcmvp_approved_vendors) && isset($wcmvp_disabled_vendors) )
				{
					$wcmvp_vendor_status = array(
						'wcmvp_all_vendors' => $wcmvp_approved_vendors + $wcmvp_disabled_vendors,
						'wcmvp_approved_vendors' => $wcmvp_approved_vendors,
						'wcmvp_disabled_vendors' => $wcmvp_disabled_vendors
					);
				}

				do_action('wcmvp_vendors_with_thier_status');

				if( isset($wcmvp_vendor_status) && is_array($wcmvp_vendor_status) )
				{
					echo json_encode($wcmvp_vendor_status);
				}
			}
			wp_die();
		}
	}

//====================Function is used to generate password when any vendor gets created===============///

	function wcmvp_add_new_vend_generate_pass_cb() 
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_add_new_vend_generate_pass_nonce') )
		{
			$wcmvp_wcmvp_add_new_vend_generate_pass = wp_generate_password(34,'','true');
			if( isset($wcmvp_wcmvp_add_new_vend_generate_pass) && !empty($wcmvp_wcmvp_add_new_vend_generate_pass) )
			{
				do_action('wcmvp_generate_password_for_new_vendor');
				echo json_encode($wcmvp_wcmvp_add_new_vend_generate_pass);
				wp_die();
			}
		}
	}

//=======================Function is used to get countries state from add new vendor section==============//

	function wcmvp_addnew_vend_country_cb()
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_addnew_vend_selected_country_nonce') )
		{
			if( isset($_POST['wcmvp_addnew_vend_selected_country']) && !empty($_POST['wcmvp_addnew_vend_selected_country']) )
			{
				$wcmvp_vendor_sel_country = sanitize_text_field($_POST['wcmvp_addnew_vend_selected_country']);
				$wcmvp_countries_value  = new WC_Countries();
				if( isset($wcmvp_vendor_sel_country) && isset($wcmvp_countries_value) )
				{
					$wcmvp_state = $wcmvp_countries_value->get_states($wcmvp_vendor_sel_country);
					$wcmvp_html = '';
					if(isset($wcmvp_state) && is_array($wcmvp_state) && !empty($wcmvp_state) )
					{
						$wcmvp_html = '<select class = wcmvp_vendor_state>';
						$wcmvp_html .= '<option value="">'.esc_html__( 'Select State', 'wc-multi-vendor-platform-lite' ).'</option>';
						foreach( $wcmvp_state as $states => $state )
						{
							$wcmvp_html .= '<option value="'.esc_attr( $states ).'">'.esc_html__( $state, 'wc-multi-vendor-platform-lite' ).'</option>';
						}
						$wcmvp_html .= '</select>';
					}
					$wcmvp_addnew_vendors_data = $wcmvp_html;

					if( isset($wcmvp_addnew_vendors_data) )
					{
						do_action('wcmvp_country_changes_to_state');
						echo json_encode($wcmvp_addnew_vendors_data);
					}
				}
				wp_die();
			}
		}
	}

//=========================Function is used to create datatable for order section=========================//

	function wcmvp_order_table_cb()
	{
		if( check_ajax_referer( 'wcmvp-vendor-nonce','wcmvp_orders_nonce_verify' ) )
		{ 
			include_once( WCMVP_ADMIN_PARTIAL.'/admin-includes/wcmvp-multivendor-platform-order-table.php' );
		}
	}

//===================Function is used to display count of orders at order table===================//

	function wcmvp_order_count_cb() 
	{
		if( check_ajax_referer( 'wcmvp-vendor-nonce','wcmvp_orders_nonce_verify' ) )
		{
			if( isset($_POST['wcmvp_order_vendor_id']) && !empty($_POST['wcmvp_order_vendor_id']) )
			{
				$wcmvp_order_vendor_id = sanitize_text_field($_POST['wcmvp_order_vendor_id']);
				if( isset($wcmvp_order_vendor_id) && !empty($wcmvp_order_vendor_id) )
				{
					global $wpdb;

					$wcmvp_order_count_query = "SELECT COUNT(*) FROM $wpdb->posts as m LEFT JOIN (SELECT post_id,
						MAX(CASE WHEN meta_key='wcmvp_order_vendor' THEN meta_value END) wcmvp_order_vendor_id
						FROM $wpdb->postmeta GROUP BY post_id) wcmvp_order_count_table ON 
						m.`ID`=wcmvp_order_count_table.`post_id` WHERE (wcmvp_order_vendor_id = %d AND `post_type`=%s AND `post_status`!=%s AND `post_status`!=%s)";
					if( isset($wcmvp_order_count_query ))
					{
						$wcmvp_all_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,$wcmvp_order_vendor_id,'shop_order','trash','auto-draft'),0 );
					}

					$wcmvp_order_count_query = "SELECT COUNT(*) FROM $wpdb->posts as m LEFT JOIN (SELECT post_id,
					MAX(CASE WHEN meta_key='wcmvp_order_vendor' THEN meta_value END) wcmvp_order_vendor_id
					FROM $wpdb->postmeta GROUP BY post_id) wcmvp_order_count_table ON 
					m.`ID`=wcmvp_order_count_table.`post_id` WHERE (wcmvp_order_vendor_id = %d AND `post_type`=%s AND `post_status`=%s)";

					if( isset($wcmvp_order_count_query) )
					{
						$wcmvp_pending_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,$wcmvp_order_vendor_id,'shop_order','wc-pending'),0 );

						$wcmvp_processing_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,$wcmvp_order_vendor_id,'shop_order','wc-processing'),0 ); 

						$wcmvp_on_hold_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,$wcmvp_order_vendor_id,'shop_order','wc-on-hold'),0 ); 

						$wcmvp_completed_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,$wcmvp_order_vendor_id,'shop_order','wc-completed'),0 );

						$wcmvp_refunded_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,$wcmvp_order_vendor_id,'shop_order','wc-refunded'),0 ); 

						$wcmvp_failed_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,$wcmvp_order_vendor_id,'shop_order','wc-failed'),0 );

						$wcmvp_cancelled_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,$wcmvp_order_vendor_id,'shop_order','wc-cancelled'),0 );

						$wcmvp_trash_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,$wcmvp_order_vendor_id,'shop_order','trash'),0 );

						$wcmvp_draft_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,$wcmvp_order_vendor_id,'shop_order','draft'),0 );

						$wcmvp_orders_count = array(
							'wcmvp_all_orders_count'			=>	isset($wcmvp_all_orders_count) ? $wcmvp_all_orders_count : 0,
							'wcmvp_pending_orders_count'		=>	isset($wcmvp_pending_orders_count) ? $wcmvp_pending_orders_count : 0,
							'wcmvp_processing_orders_count'		=>	isset($wcmvp_processing_orders_count) ? $wcmvp_processing_orders_count : 0,
							'wcmvp_completed_orders_count'		=>	isset($wcmvp_completed_orders_count) ? $wcmvp_completed_orders_count : 0,
							'wcmvp_on_hold_orders_count'		=>	isset($wcmvp_on_hold_orders_count) ? $wcmvp_on_hold_orders_count : 0,
							'wcmvp_refunded_orders_count'		=>	isset($wcmvp_refunded_orders_count) ? $wcmvp_refunded_orders_count : 0,
							'wcmvp_cancelled_orders_count'		=>	isset($wcmvp_cancelled_orders_count) ? $wcmvp_cancelled_orders_count : 0,
							'wcmvp_failed_orders_count'			=>	isset($wcmvp_failed_orders_count) ? $wcmvp_failed_orders_count : 0,
							'wcmvp_trash_orders_count'			=>	isset($wcmvp_trash_orders_count) ? $wcmvp_trash_orders_count : 0,
							'wcmvp_draft_orders_count'			=>	isset($wcmvp_draft_orders_count) ? $wcmvp_draft_orders_count : 0,
						);
							
						if(isset($wcmvp_orders_count))
						{
							do_action('wcmvp_all_orders_count_from_db');
							echo json_encode($wcmvp_orders_count);
						}
					}
					wp_die();
				}
			}
			else
			{
				global $wpdb;

					$wcmvp_order_count_query = "SELECT COUNT(*) FROM $wpdb->posts as m LEFT JOIN (SELECT post_id,
						MAX(CASE WHEN meta_key='wcmvp_order_vendor' THEN meta_value END) wcmvp_order_vendor_id
						FROM $wpdb->postmeta GROUP BY post_id) wcmvp_order_count_table ON 
						m.`ID`=wcmvp_order_count_table.`post_id` WHERE (`post_type`=%s AND `post_status`!=%s AND `post_status`!=%s)";
					if( isset($wcmvp_order_count_query) )
					{
						$wcmvp_all_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,'shop_order','trash','auto-draft'),0 );
					}

					$wcmvp_order_count_query = "SELECT COUNT(*) FROM $wpdb->posts as m LEFT JOIN (SELECT post_id,
					MAX(CASE WHEN meta_key='wcmvp_order_vendor' THEN meta_value END) wcmvp_order_vendor_id
					FROM $wpdb->postmeta GROUP BY post_id) wcmvp_order_count_table ON 
					m.`ID`=wcmvp_order_count_table.`post_id` WHERE (`post_type`=%s AND `post_status`=%s)";

					if( isset($wcmvp_order_count_query) )
					{
						$wcmvp_pending_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,'shop_order','wc-pending'),0 );
	
						$wcmvp_processing_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,'shop_order','wc-processing'),0 ); 
	
						$wcmvp_on_hold_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,'shop_order','wc-on-hold'),0 ); 
	
						$wcmvp_completed_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,'shop_order','wc-completed'),0 );
	
						$wcmvp_refunded_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,'shop_order','wc-refunded'),0 ); 
	
						$wcmvp_failed_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,'shop_order','wc-failed'),0 );
	
						$wcmvp_cancelled_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,'shop_order','wc-cancelled'),0 );
	
						$wcmvp_trash_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,'shop_order','trash'),0 );
	
						$wcmvp_draft_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,'shop_order','draft'),0 );
						
						$wcmvp_orders_count = array(
							'wcmvp_all_orders_count'			=>	isset($wcmvp_all_orders_count) ? $wcmvp_all_orders_count : 0,
							'wcmvp_pending_orders_count'		=>	isset($wcmvp_pending_orders_count) ? $wcmvp_pending_orders_count : 0,
							'wcmvp_processing_orders_count'		=>	isset($wcmvp_processing_orders_count) ? $wcmvp_processing_orders_count : 0,
							'wcmvp_completed_orders_count'		=>	isset($wcmvp_completed_orders_count) ? $wcmvp_completed_orders_count : 0,
							'wcmvp_on_hold_orders_count'		=>	isset($wcmvp_on_hold_orders_count) ? $wcmvp_on_hold_orders_count : 0,
							'wcmvp_refunded_orders_count'		=>	isset($wcmvp_refunded_orders_count) ? $wcmvp_refunded_orders_count : 0,
							'wcmvp_cancelled_orders_count'		=>	isset($wcmvp_cancelled_orders_count) ? $wcmvp_cancelled_orders_count : 0,
							'wcmvp_failed_orders_count'			=>	isset($wcmvp_failed_orders_count) ? $wcmvp_failed_orders_count : 0,
							'wcmvp_trash_orders_count'			=>	isset($wcmvp_trash_orders_count) ? $wcmvp_trash_orders_count : 0,
							'wcmvp_draft_orders_count'			=>	isset($wcmvp_draft_orders_count) ? $wcmvp_draft_orders_count : 0
						);
							
						if(isset($wcmvp_orders_count))
						{
							do_action('wcmvp_all_orders_count_from_db');
							echo json_encode($wcmvp_orders_count);
						}
					}
					wp_die();
			}
		}
	}

///==========================Function is used to get the link of edit order===================//


	function wcmvp_edit_order_cb() 
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_edit_order_nonce_verify') )
		{
			if( isset($_POST['wcmvp_edit_order_id']) && !empty($_POST['wcmvp_edit_order_id']) )
			{
				$wcmvp_edit_order_link = add_query_arg(array(
					'post' => sanitize_text_field($_POST['wcmvp_edit_order_id']),
					'action' => 'edit',
					'wcmvp_prod_hide'=>'true',
					), admin_url('post.php')
				);
				if( isset($wcmvp_edit_order_link) && !empty($wcmvp_edit_order_link) )
				{
					do_action('wcmvp_edit_order_link_redirect',$wcmvp_edit_order_link);
					echo json_encode($wcmvp_edit_order_link);
				}
				wp_die();
			}
			else
			{
				$wcmvp_edit_order_link = add_query_arg(array(
					'post_type' => 'shop_order',
					'wcmvp_prod_hide'=>'true',
					), admin_url('post-new.php')
				);
				if( isset($wcmvp_edit_order_link) && !empty($wcmvp_edit_order_link) )
				{
					do_action('wcmvp_add_order_link_redirect',$wcmvp_edit_order_link);
					echo json_encode($wcmvp_edit_order_link);
				}
				wp_die();
			}
		}
	}

//=======================Function is used to display order details at order section========================.//

	function wcmvp_view_order_cb_1()
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_view_order_nonce_verify') )
		{
			if( isset($_POST['wcmvp_view_order_id']) && !empty($_POST['wcmvp_view_order_id']) )
			{
				$wcmvp_view_order = new WC_Order( sanitize_text_field($_POST['wcmvp_view_order_id']) );
				
				if( isset($wcmvp_view_order) && !empty($wcmvp_view_order) && is_object($wcmvp_view_order) )
				{
					$wcmvp_order_status = $wcmvp_view_order->get_status();
					$wcmvp_billing_first_name = $wcmvp_view_order->get_billing_first_name();
					$wcmvp_billing_last_name = $wcmvp_view_order->get_billing_last_name();
					$wcmvp_billing_company = $wcmvp_view_order->get_billing_company();
					$wcmvp_billing_address1 = $wcmvp_view_order->get_billing_address_1();
					$wcmvp_billing_address2 = $wcmvp_view_order->get_billing_address_2();
					$wcmvp_billing_city = $wcmvp_view_order->get_billing_city();
					$wcmvp_billing_state = $wcmvp_view_order->get_billing_state();
					$wcmvp_billing_postcode = $wcmvp_view_order->get_billing_postcode();
					$wcmvp_billing_country = $wcmvp_view_order->get_billing_country();
					$wcmvp_billing_email = $wcmvp_view_order->get_billing_email();
					$wcmvp_billing_phone = $wcmvp_view_order->get_billing_phone();
					$wcmvp_shipping_first_name = $wcmvp_view_order->get_shipping_first_name();
					$wcmvp_shipping_last_name = $wcmvp_view_order->get_shipping_last_name();
					$wcmvp_shipping_company = $wcmvp_view_order->get_shipping_company();
					$wcmvp_shipping_address1 = $wcmvp_view_order->get_shipping_address_1();
					$wcmvp_shipping_address2 = $wcmvp_view_order->get_shipping_address_2();
					$wcmvp_shipping_city = $wcmvp_view_order->get_shipping_city();
					$wcmvp_shipping_state = $wcmvp_view_order->get_shipping_state();
					$wcmvp_shipping_postcode = $wcmvp_view_order->get_shipping_postcode();
					$wcmvp_shipping_country = $wcmvp_view_order->get_shipping_country();
					$wcmvp_payment_method_title = $wcmvp_view_order->get_payment_method_title();
					$wcmvp_shipping_method = $wcmvp_view_order->get_shipping_method();
					$wcmvp_customer_note = $wcmvp_view_order->get_customer_note();

					$wcmvp_order_details = array(
						'wcmvp_order_id'				=>	isset($_POST['wcmvp_view_order_id']) ? sanitize_text_field($_POST['wcmvp_view_order_id']) : '',
						'wcmvp_order_status'			=>	isset($wcmvp_order_status) ? $wcmvp_order_status : '',
						'wcmvp_billing_first_name'		=>	isset($wcmvp_billing_first_name) ? $wcmvp_billing_first_name : '',
						'wcmvp_billing_last_name'		=>	isset($wcmvp_billing_last_name) ? $wcmvp_billing_last_name : '',
						'wcmvp_billing_company'			=>	isset($wcmvp_billing_company) ? $wcmvp_billing_company : '',
						'wcmvp_billing_address1'		=>	isset($wcmvp_billing_address1) ? $wcmvp_billing_address1 : '',
						'wcmvp_billing_address2'		=>	isset($wcmvp_billing_address2) ? $wcmvp_billing_address2 : '',
						'wcmvp_billing_city'			=>	isset($wcmvp_billing_city) ? $wcmvp_billing_city : '',
						'wcmvp_billing_state'			=>	isset($wcmvp_billing_state) ? $wcmvp_billing_state : '',
						'wcmvp_billing_postcode'		=>	isset($wcmvp_billing_postcode) ? $wcmvp_billing_postcode : '',
						'wcmvp_billing_country'			=>	isset($wcmvp_billing_country) ? $wcmvp_billing_country : '',
						'wcmvp_billing_email'			=>	isset($wcmvp_billing_email) ? $wcmvp_billing_email : '',
						'wcmvp_billing_phone'			=>	isset($wcmvp_billing_phone) ? $wcmvp_billing_phone : '',
						'wcmvp_shipping_first_name'		=>	isset($wcmvp_shipping_first_name) ? $wcmvp_shipping_first_name : '',
						'wcmvp_shipping_last_name'		=>	isset($wcmvp_shipping_last_name) ? $wcmvp_shipping_last_name : '',
						'wcmvp_shipping_company'		=>	isset($wcmvp_shipping_company) ? $wcmvp_shipping_company : '',
						'wcmvp_shipping_address1'		=>	isset($wcmvp_shipping_address1) ? $wcmvp_shipping_address1 : '',
						'wcmvp_shipping_address2'		=>	isset($wcmvp_shipping_address2) ? $wcmvp_shipping_address2 : '',
						'wcmvp_shipping_city'			=>	isset($wcmvp_shipping_city) ? $wcmvp_shipping_city : '',
						'wcmvp_shipping_state'			=>	isset($wcmvp_shipping_state) ? $wcmvp_shipping_state : '',
						'wcmvp_shipping_postcode'		=>	isset($wcmvp_shipping_postcode) ? $wcmvp_shipping_postcode : '',
						'wcmvp_shipping_country'		=>	isset($wcmvp_shipping_country) ? $wcmvp_shipping_country : '',
						'wcmvp_payment_method_title'	=>	isset($wcmvp_payment_method_title) ? $wcmvp_payment_method_title : '',
						'wcmvp_shipping_method'			=> isset($wcmvp_shipping_method) ? $wcmvp_shipping_method : '',
						'wcmvp_customer_note'			=>	isset($wcmvp_customer_note) ? $wcmvp_customer_note : ''
					);
					do_action('wcmvp_view_order');
					echo json_encode($wcmvp_order_details);	
				}
				wp_die();
			}
		} 
	}

//===============Same working as of above function======================

	function wcmvp_view_order_cb_2()
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_view_order_nonce_verify') )
		{
			if( isset($_POST['wcmvp_view_order_id']) && !empty($_POST['wcmvp_view_order_id']) )
			{
				$wcmvp_view_order = new WC_Order( sanitize_text_field($_POST['wcmvp_view_order_id'] ));
				
				if( isset($wcmvp_view_order) && !empty($wcmvp_view_order) && is_object($wcmvp_view_order) )
				{
					$wcmvp_get_items = $wcmvp_view_order->get_items();
					
					if( isset($wcmvp_get_items) && is_array($wcmvp_get_items) && !empty($wcmvp_get_items) )
					{
						foreach($wcmvp_get_items as $key)
						{ 
							if( isset($key['name']) )
							{
								$wcmvp_get_product_name = $key['name'];
							}
							$wcmvp_get_product_quantity = $key->get_quantity();
							$wcmvp_get_product_total = $key->get_total();

							if( isset($wcmvp_get_product_name) && isset($wcmvp_get_product_quantity) && isset($wcmvp_get_product_total) )
							{
								$wcmvp_order_product_data = array(
									'wcmvp_get_product_name'		=> $wcmvp_get_product_name,
									'wcmvp_get_product_quantity'	=> $wcmvp_get_product_quantity,
									'wcmvp_get_product_total'		=> $wcmvp_get_product_total,
								);
								$wcmvp_order_product_val[]=$wcmvp_order_product_data;
							}
						}
						if( isset($wcmvp_order_product_val) && is_array($wcmvp_order_product_val) )
						{
							do_action('wcmvp_view_order');
							echo json_encode($wcmvp_order_product_val);
						}
					}
				}
				wp_die();
			}
		}
	}

//=================Function is used to process balance to vendor or send order to trash/Delete============//

	function wcmvp_process_order_request_cb()
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_process_orders_nonce_verify') )
		{
			include_once( WCMVP_ADMIN_PARTIAL.'/admin-includes/wcmvp-multivendor-platform-order-functionality.php' );
		}
	}

//=================Function is about to apply bulk action at orders table==========================//	

	function wcmvp_order_checkboxes_cb()
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_order_checkboxes_verify') )
		{

			if( (isset($_POST['wcmvp_order_bulk_action_val']) && !empty($_POST['wcmvp_order_bulk_action_val'])) && (isset($_POST['wcmvp_order_checkboxes']) && !empty($_POST['wcmvp_order_checkboxes'])) )
			// $_POST['wcmvp_order_checkboxes'] hold array
			{
				if( is_array($_POST['wcmvp_order_checkboxes']))
				{
					if( isset($_POST['wcmvp_order_checkboxes'][0]) )
					{
						$wcmvp_order_vendor_id = get_post_meta( sanitize_text_field($_POST['wcmvp_order_checkboxes'][0]),'wcmvp_order_vendor',true );

						if( isset($wcmvp_order_vendor_id) && !empty($wcmvp_order_vendor_id) )
						{
							echo json_encode($wcmvp_order_vendor_id);
						}

						foreach( $_POST['wcmvp_order_checkboxes'] as $key )
						{
							$wcmvp_children_post_args = array(
								'post_parent'	=> 	sanitize_text_field($key),
								'post_type'		=>	'shop_order',
								'post_status'	=>	'-1'
							);
							$wcmvp_order_children = get_children( $wcmvp_children_post_args );
							if( $wcmvp_order_children )
							{
								foreach($wcmvp_order_children as $children)
								{
									if(isset($children->ID))
									{
										if( $_POST['wcmvp_order_bulk_action_val'] == 'wcmvp_bulk_trash_order' )
										{
											do_action('wcmvp_send_order_to_trash');
											wp_trash_post( sanitize_text_field($key) );
											wp_trash_post( $children->ID );
										}
										if( $_POST['wcmvp_order_bulk_action_val'] == 'wcmvp_bulk_delete_order' )
										{
											do_action('wcmvp_send_order_to_delete');
											wp_delete_post( sanitize_text_field($key) );
											wp_delete_post( $children->ID );
										}
										if( $_POST['wcmvp_order_bulk_action_val'] == 'wcmvp_bulk_restore_order' )
										{
											do_action('wcmvp_send_order_to_restore');
											wp_untrash_post( sanitize_text_field($key) );
											wp_untrash_post( $children->ID );
										}
										if( ($_POST['wcmvp_order_bulk_action_val'] == 'processing') || ($_POST['wcmvp_order_bulk_action_val'] == 'on-hold') || ($_POST['wcmvp_order_bulk_action_val'] == 'completed')  )
										{
											$wcmvp_order_status_chng = 'wc_';
											$wcmvp_order_status_chng .= (sanitize_text_field($_POST['wcmvp_order_bulk_action_val']));
											if( isset($wcmvp_order_status_chng) )
											{
												$wcmvp_order_obj = wc_get_order( sanitize_text_field($key) );

												if( isset($wcmvp_order_obj) && is_object($wcmvp_order_obj) )
												{
													$wcmvp_update_status = $wcmvp_order_obj->update_status(sanitize_text_field($_POST['wcmvp_order_bulk_action_val']));
													$wcmvp_order_obj = wc_get_order( $children->ID );
													$wcmvp_update_status = $wcmvp_order_obj->update_status(sanitize_text_field($_POST['wcmvp_order_bulk_action_val']));
												}
											}
										}
									}
								}
							}
							else
							{
								if( $_POST['wcmvp_order_bulk_action_val'] == 'wcmvp_bulk_trash_order' )
								{
									do_action('wcmvp_send_order_to_trash');
									wp_trash_post( sanitize_text_field($key) );
								}
								if( $_POST['wcmvp_order_bulk_action_val'] == 'wcmvp_bulk_delete_order' )
								{
									do_action('wcmvp_send_order_to_delete');
									wp_delete_post( sanitize_text_field($key) ); 
								}
								if( $_POST['wcmvp_order_bulk_action_val'] == 'wcmvp_bulk_restore_order' )
								{
									do_action('wcmvp_send_order_to_restore');
									wp_untrash_post( sanitize_text_field($key) );
								}
								if( ($_POST['wcmvp_order_bulk_action_val'] == 'processing') || ($_POST['wcmvp_order_bulk_action_val'] == 'on-hold') || ($_POST['wcmvp_order_bulk_action_val'] == 'completed')  )
								{
									$wcmvp_order_status_chng = 'wc_';
									$wcmvp_order_status_chng .= (sanitize_text_field($_POST['wcmvp_order_bulk_action_val']));
									if( isset($wcmvp_order_status_chng) )
									{
										$wcmvp_order_obj = wc_get_order( sanitize_text_field($key) );
										$wcmvp_update_status = $wcmvp_order_obj->update_status(sanitize_text_field($_POST['wcmvp_order_bulk_action_val']));
									}
								}
							}
						}
						wp_die();
					}
				}
			}
		}
	}

//=======================Function is used to get count of orders======================

	function wcmvp_chart_data_cb()
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_chart_data_nonce_verify') )
		{
			global $wpdb;
			$wcmvp_list_prod_start_date = strtotime(date('Y-m', current_time('timestamp')) . '-1 midnight');
			$wcmvp_list_end_date = strtotime('+1month', $wcmvp_list_prod_start_date) - 86400;
			if( isset($wcmvp_list_prod_start_date) && isset($wcmvp_list_end_date) )
			{
				$wcmvp_query = "SELECT COUNT(*) AS wcmvp_count_orders_by_date,post_date FROM ".$wpdb->prefix."posts WHERE post_type='%s' AND post_status='%s' AND post_parent=%d AND post_date >= '%s' AND post_date < '%s' GROUP BY CAST(post_date AS DATE)";
				if( isset($wcmvp_query) )
				{
					$wcmvp_total_orders_val_count = $wpdb->get_results( $wpdb->prepare($wcmvp_query,'shop_order','wc-completed',0,date("Y-m-d",$wcmvp_list_prod_start_date), date("Y-m-d",$wcmvp_list_end_date)) );
					
					if( isset($wcmvp_total_orders_val_count) && is_array($wcmvp_total_orders_val_count) && !empty($wcmvp_total_orders_val_count) )
					{
						foreach($wcmvp_total_orders_val_count as $count)
						{
							if(isset($count) && isset($count->wcmvp_count_orders_by_date) && isset($count->post_date))
							{
								$wcmvp_count_orders_by_date_array[] = $count->wcmvp_count_orders_by_date;
								$wcmvp_post_date = substr($count->post_date, 0,10);
								if( isset($wcmvp_post_date) )
								{
									$wcmvp_post_date_array_last = substr($wcmvp_post_date, 8);
									if( isset($wcmvp_post_date_array_last) )
									{
										if(substr($wcmvp_post_date_array_last,0,1) == 0)
										{
											$wcmvp_post_date_array[] = substr($wcmvp_post_date_array_last, 1);
										}
										else
										{
											$wcmvp_post_date_array[] = $wcmvp_post_date_array_last;
										}
									}
								}
							}
						}
						if( isset($wcmvp_post_date_array) && is_array($wcmvp_post_date_array) && isset($wcmvp_count_orders_by_date_array) && is_array($wcmvp_count_orders_by_date_array) )
						{
							$wcmvp_count_values_datewise = array_combine($wcmvp_post_date_array,$wcmvp_count_orders_by_date_array);
						}
						
						$wcmvp_key_exsist = 1;

						$wcmvp_last_date = date("Y-m-d",$wcmvp_list_end_date);
						if(isset($wcmvp_last_date))
						{
							$wcmvp_last_date_two_val = substr($wcmvp_last_date,8);
						}

						if( isset($wcmvp_last_date_two_val) && isset($wcmvp_count_values_datewise) && is_array($wcmvp_count_values_datewise) && isset($wcmvp_key_exsist) )
						{
							for( $i=1; $i <= $wcmvp_last_date_two_val; $i++ )
							{
								if(array_key_exists($wcmvp_key_exsist,$wcmvp_count_values_datewise))
								{
									$wcmvp_order_count_main_array[] = $wcmvp_count_values_datewise[$wcmvp_key_exsist];
								}
								else
								{
									$wcmvp_order_count_main_array[] = 0;
								}
								$wcmvp_key_exsist = $wcmvp_key_exsist + 01;
							}
							do_action('wcmvp_dashboard_order_counts',$wcmvp_order_count_main_array);
						}
					}
				}
			}			
			
			$wcmvp_list_prod_start_date = strtotime(date('Y-m', current_time('timestamp')) . '-1 midnight');

			$wcmvp_list_end_date = strtotime('+1month', $wcmvp_list_prod_start_date) - 86400;
			
			if( isset($wcmvp_list_prod_start_date) && isset($wcmvp_list_end_date) )
			{
				$wcmvp_query = "SELECT COUNT(*) AS wcmvp_count_products_by_date,post_date FROM ".$wpdb->prefix."posts WHERE post_type='%s' AND post_status!='%s' AND post_date >= '%s' AND post_date < '%s' GROUP BY CAST(post_date AS DATE)";

				if( isset($wcmvp_query) )
				{
					$wcmvp_get_monthly_created_product = $wpdb->get_results( $wpdb->prepare($wcmvp_query,'product','auto-draft',date("Y-m-d",$wcmvp_list_prod_start_date),date("Y-m-d",$wcmvp_list_end_date)) );
	
					if( isset($wcmvp_get_monthly_created_product) && is_array($wcmvp_get_monthly_created_product) && !empty($wcmvp_get_monthly_created_product) )
					{
						foreach($wcmvp_get_monthly_created_product as $prod_count)
						{
							if( isset($prod_count) && isset($prod_count->wcmvp_count_products_by_date) && isset($prod_count->post_date) )
							{
								$wcmvp_count_products_by_date_array[] = $prod_count->wcmvp_count_products_by_date;

								$wcmvp_order_post_date = substr($prod_count->post_date, 0,10);

								if( isset($wcmvp_order_post_date) )
								{
									$wcmvp_prod_post_date_last = substr($wcmvp_order_post_date, 8);

									if( isset($wcmvp_prod_post_date_last) )
									{
										if(substr($wcmvp_prod_post_date_last,0,1) == 0)
										{
											$wcmvp_prod_post_date_array[] = substr($wcmvp_prod_post_date_last, 1);
										} 
										else
										{
											$wcmvp_prod_post_date_array[] = $wcmvp_prod_post_date_last;
										}
									}
								}	
							}
						}
						if( isset($wcmvp_prod_post_date_array) && is_array($wcmvp_prod_post_date_array) && isset($wcmvp_count_products_by_date_array) && is_array($wcmvp_count_products_by_date_array) )
						{
							$wcmvp_count_prod_values_datewise = array_combine($wcmvp_prod_post_date_array,$wcmvp_count_products_by_date_array);
						}
						if(isset($wcmvp_list_end_date))
						{
							$wcmvp_last_date = date("Y-m-d",$wcmvp_list_end_date);
							if( isset($wcmvp_last_date) )
							{
								$wcmvp_last_date_two_val = substr($wcmvp_last_date,8);
							}
						}
			
						$wcmvp_prod_key_exsist = 1;
						
						if( isset($wcmvp_count_prod_values_datewise) && is_array($wcmvp_count_prod_values_datewise) && isset($wcmvp_prod_key_exsist) && isset($wcmvp_last_date_two_val) )
						{
							for( $i=1; $i <= $wcmvp_last_date_two_val; $i++ )
							{
								if(array_key_exists($wcmvp_prod_key_exsist,$wcmvp_count_prod_values_datewise))
								{
									$wcmvp_product_count_main_array[] = $wcmvp_count_prod_values_datewise[$wcmvp_prod_key_exsist];
								}
								else
								{
									$wcmvp_product_count_main_array[] = 0;
								}
								$wcmvp_prod_key_exsist = $wcmvp_prod_key_exsist + 01;
							}
							do_action('wcmvp_dashboard_product_counts',$wcmvp_product_count_main_array);
						}
					}
				}
			
				$wcmvp_query = "SELECT wcmvp_admin_order_commision_for_vendor,post_date FROM ".$wpdb->prefix."posts as m LEFT JOIN(SELECT post_id,
				MAX(CASE WHEN meta_key='wcmvp_admin_order_commision_for_vendor' THEN meta_value END) wcmvp_admin_order_commision_for_vendor
				FROM ".$wpdb->prefix."postmeta GROUP by post_id) wcmvp_admin_commission_table ON m.ID = wcmvp_admin_commission_table.post_id WHERE `post_type`=%s AND post_status='%s' AND post_date >= '%s' AND post_date < '%s'";

				if( isset($wcmvp_query) )
				{
					$wcmvp_admin_commission_monthly = $wpdb->get_results( $wpdb->prepare($wcmvp_query, 'shop_order','wc-completed',date("Y-m-d",$wcmvp_list_prod_start_date),date("Y-m-d",$wcmvp_list_end_date)) );
					
					if( isset($wcmvp_admin_commission_monthly) && !empty($wcmvp_admin_commission_monthly) && is_array($wcmvp_admin_commission_monthly) )
					{
						$wcmvp_order_count_array1 = array();

						foreach($wcmvp_admin_commission_monthly as $key => $value) 
						{
							if( isset( $value ) && isset($value->post_date) && isset($value->wcmvp_admin_order_commision_for_vendor) && isset($wcmvp_order_count_array1) )
							{
								$wcmvp_date_by_order  =  date('d', strtotime($value->post_date));

								if( isset($wcmvp_date_by_order) )
								{
									if( empty($wcmvp_order_count_array1))
									{
									$wcmvp_order_count_array1[$wcmvp_date_by_order] = $value->wcmvp_admin_order_commision_for_vendor;
									}
									else
									{
										if(array_key_exists($wcmvp_date_by_order, $wcmvp_order_count_array1 ))
										{
												$wcmvp_order_count_array1[$wcmvp_date_by_order]  =  (int)$wcmvp_order_count_array1[$wcmvp_date_by_order] + (int)$value->wcmvp_admin_order_commision_for_vendor;
										}else
										{
											$wcmvp_order_count_array1[$wcmvp_date_by_order] = $value->wcmvp_admin_order_commision_for_vendor;
										}        
									}
								}
							}
						}

						$wcmvp_commission_key_exsist = 1;
							
						if( isset( $wcmvp_last_date_two_val ) && isset($wcmvp_commission_key_exsist) && isset($wcmvp_order_count_array1) && is_array($wcmvp_order_count_array1) )
						{
							foreach( $wcmvp_order_count_array1 as $day_count => $day_value )
							{
								if( substr( $day_count,0,1 ) == 0 )
								{
									$wcmvp_day_count[] = substr($day_count, 1);
								}
								else
								{
									$wcmvp_day_count[] = $day_count;
								}
								$wcmvp_day_count_value[] = $day_value;
							}

							if( isset( $wcmvp_day_count ) && is_array($wcmvp_day_count) && isset($wcmvp_day_count_value) && is_array($wcmvp_day_count_value) )
							{
								$wcmvp_order_count_array2  = array_combine($wcmvp_day_count,$wcmvp_day_count_value);
							}
						
							if( isset($wcmvp_order_count_array2) && is_array($wcmvp_order_count_array2) )
							{
								for( $i=1; $i <= $wcmvp_last_date_two_val; $i++ )
								{
									if(array_key_exists($wcmvp_commission_key_exsist,$wcmvp_order_count_array2))
									{
										$wcmvp_commision_count_main_array[] = $wcmvp_order_count_array2[$wcmvp_commission_key_exsist];
									}
									else
									{
										$wcmvp_commision_count_main_array[] = 0;
									}
									$wcmvp_commission_key_exsist = $wcmvp_commission_key_exsist + 01;
								}
								do_action('wcmvp_dashboard_commission_counts',$wcmvp_commision_count_main_array);
							}
						}
					}
				}
			}

			global $wpdb;

			$wcmvp_order_count_query = "SELECT COUNT(*) FROM $wpdb->posts as m LEFT JOIN (SELECT post_id,
			MAX(CASE WHEN meta_key='wcmvp_order_vendor' THEN meta_value END) wcmvp_order_vendor_id
			FROM $wpdb->postmeta GROUP BY post_id) wcmvp_order_count_table ON 
			m.`ID`=wcmvp_order_count_table.`post_id` WHERE (`post_type`=%s AND `post_status`=%s)";

			if( isset($wcmvp_order_count_query) )
			{
				$wcmvp_pending_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,'shop_order','wc-pending'),0 );

				$wcmvp_processing_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,'shop_order','wc-processing'),0 ); 

				$wcmvp_on_hold_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,'shop_order','wc-on-hold'),0 );

				$wcmvp_failed_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,'shop_order','wc-failed'),0 );

				$wcmvp_cancelled_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_order_count_query,'shop_order','wc-cancelled'),0 );
				
				$wcmvp_orders_count = array(
					'wcmvp_pending_orders_count'		=>	isset($wcmvp_pending_orders_count) ? $wcmvp_pending_orders_count : 0,
					'wcmvp_processing_orders_count'		=>	isset($wcmvp_processing_orders_count) ? $wcmvp_processing_orders_count : 0,
					'wcmvp_on_hold_orders_count'		=>	isset($wcmvp_on_hold_orders_count) ? $wcmvp_on_hold_orders_count : 0,
					'wcmvp_cancelled_orders_count'		=>	isset($wcmvp_cancelled_orders_count) ? $wcmvp_cancelled_orders_count : 0,
					'wcmvp_failed_orders_count'			=>	isset($wcmvp_failed_orders_count) ? $wcmvp_failed_orders_count : 0,
				);
			}

			if( is_array(get_option('wcmvp_notifications')) && !empty(get_option('wcmvp_notifications')))
			{
				$wcmvp_notifications = get_option('wcmvp_notifications');
			}

			$wcmvp_order_product_count = array(
				'wcmvp_product_count'	=>	isset($wcmvp_product_count_main_array) ? $wcmvp_product_count_main_array : 0,
				'wcmvp_order_count'		=>	isset($wcmvp_order_count_main_array) ? $wcmvp_order_count_main_array : 0,
				'wcmvp_commission_count'=> isset($wcmvp_commision_count_main_array) ? $wcmvp_commision_count_main_array : 0,
				'wcmvp_orders_count' 	=> isset($wcmvp_orders_count) ? $wcmvp_orders_count : 0,
				'wcmvp_notifications' 	=> isset($wcmvp_notifications) ? $wcmvp_notifications : 0,
			);

			do_action('wcmvp_dashboard_count_chart',$wcmvp_order_product_count);

			echo json_encode($wcmvp_order_product_count);
			
			wp_die();
		}
	}
	
//=======================================Function is used load dashboard on click===================================//
	
	function wcmvp_dashboard_page_cb()
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_dashboard_page_nonce_verify') )
		{
			global $woocommerce, $wpdb, $product;
			
			$wcmvp_list_prod_start_date = strtotime(date('Y-m', current_time('timestamp')) . '-1 midnight');
			$wcmvp_list_end_date = strtotime('+1month', $wcmvp_list_prod_start_date) - 86400;
			
			$wcmvp_query = "SELECT id FROM ".$wpdb->prefix."posts WHERE post_parent=%d AND `post_type`=%s AND post_status='%s' AND post_date >= '%s' AND post_date < '%s'";
			
			if( isset($wcmvp_query) )
			{
				$wcmvp_sold_products_previous = $wpdb->get_results( $wpdb->prepare($wcmvp_query,0,'shop_order','wc-completed',date("Y-m-d",$wcmvp_list_prod_start_date),date("Y-m-d",$wcmvp_list_end_date)) );

				if( empty($wcmvp_sold_products_previous) )
				{
					$wcmvp_sold_products[] = (object)[
						'product_id' 		=> 0,
						'wcmvp_quantity'	=> 0,
						'wcmvp_gross' 		=> 0,
						'wcmvp_total' 		=> 0,
					];
				}
			}
			if( isset($wcmvp_sold_products_previous) && is_array($wcmvp_sold_products_previous) && !empty($wcmvp_sold_products_previous) )
			{
				$wcmvp_prod_id_qun_array = array();
				
				foreach ($wcmvp_sold_products_previous as $order_id) 
				{
					if( isset($order_id) && isset($order_id->id) )
					{
						$wcmvp_sold_prod_order_obj = wc_get_order($order_id->id);
							
						if( isset($wcmvp_sold_prod_order_obj) && is_object($wcmvp_sold_prod_order_obj) )
						{
								$wcmvp_sold_prods_obj = $wcmvp_sold_prod_order_obj->get_items();
							}
							if( isset($wcmvp_sold_prods_obj) && is_array($wcmvp_sold_prods_obj) && !empty($wcmvp_sold_prods_obj) )
							{	
								foreach($wcmvp_sold_prods_obj as $wcmvp_items)
								{
									$wcmvp_product_id = $wcmvp_items->get_product_id();
									$wcmvp_product_qty = $wcmvp_items->get_quantity();
									$wcmvp_product_total = $wcmvp_items->get_total();
								
									if( isset($wcmvp_product_id) && isset($wcmvp_product_qty) && isset($wcmvp_product_total) )
									{
										if( empty($wcmvp_prod_id_qun_array) && isset($wcmvp_prod_id_qun_array) )
										{
											$wcmvp_prod_id_qun_array[] = $wcmvp_product_id;

											$wcmvp_sold_products[] = (object)[
												'product_id' 		=> $wcmvp_product_id,
												'wcmvp_quantity' 	=> $wcmvp_product_qty,
												'wcmvp_gross' 		=> $wcmvp_product_total,
												'wcmvp_total' 		=> $wcmvp_product_total,
											];
										}
										else
										{
											if( in_array($wcmvp_product_id,$wcmvp_prod_id_qun_array) )
											{
												$wcmvp_prev_order_key = array_search($wcmvp_product_id,$wcmvp_prod_id_qun_array);
												if( isset($wcmvp_prev_order_key) )
												{
													if( isset($wcmvp_sold_products[$wcmvp_prev_order_key]->wcmvp_quantity) && isset($wcmvp_sold_products[$wcmvp_prev_order_key]->wcmvp_total) )
													{
														$wcmvp_sold_products[$wcmvp_prev_order_key]->wcmvp_quantity += $wcmvp_product_qty;
														$wcmvp_sold_products[$wcmvp_prev_order_key]->wcmvp_total += $wcmvp_product_total;

														$wcmvp_sold_products[$wcmvp_prev_order_key] = (object)[
															'product_id' 		=> $wcmvp_product_id,
															'wcmvp_quantity' 	=> $wcmvp_sold_products[$wcmvp_prev_order_key]->wcmvp_quantity,
															'wcmvp_gross' 		=> $wcmvp_sold_products[$wcmvp_prev_order_key]->wcmvp_total,
															'wcmvp_total' 		=> $wcmvp_sold_products[$wcmvp_prev_order_key]->wcmvp_total,
														];
													}
												}
												
											}
											else
											{
												$wcmvp_prod_id_qun_array[] = $wcmvp_product_id;
												$wcmvp_product_qty = $wcmvp_product_qty;
												$wcmvp_product_total = $wcmvp_product_total;
												
												$wcmvp_sold_products[] = (object)[
													'product_id' 		=> $wcmvp_product_id,
													'wcmvp_quantity' 	=> $wcmvp_product_qty,
													'wcmvp_gross' 		=> $wcmvp_product_total,
													'wcmvp_total' 		=> $wcmvp_product_total,
												];
											}
										}
									}
								}
							}	
						}
					}
				}
				
				if(isset($wcmvp_sold_products) && is_array($wcmvp_sold_products)) 
				{
					$wcmvp_total_sold_product = 0;
                    $wcmvp_total_sold_product_amount = 0; 
                    foreach ($wcmvp_sold_products as $product) {
                        if(isset($product))
                        {
                            if(isset($product->wcmvp_quantity))
                            {
                                $wcmvp_total_sold_product = $wcmvp_total_sold_product + $product->wcmvp_quantity;
                            }
                            if(isset($product->wcmvp_gross))
                            {
                                $wcmvp_total_sold_product_amount = $wcmvp_total_sold_product_amount + $product->wcmvp_gross;
                            }
                            if( isset($product->product_id) )
                            {
                                $post = get_post($product->product_id);
                                if( is_object($post) )
                                {
                                    $post->post_author;
                                    if( isset($post->post_author) )
                                    {
                                        $wcmvp_top_selling_vendors[] = $post->post_author;
                                    }
                                }
                            }
                        }
					}
					$wcmvp_query = "SELECT COUNT(*) FROM ".$wpdb->prefix."posts WHERE post_type='%s' AND post_status!='%s' AND post_date >= '%s' AND post_date < '%s'";
                    if( isset($wcmvp_query) )
                    {
                        $wcmvp_get_monthly_created_product = $wpdb->get_var( $wpdb->prepare($wcmvp_query,'product','auto-draft',date("Y-m-d",$wcmvp_list_prod_start_date),date("Y-m-d",$wcmvp_list_end_date)) );
                    }

                    $wcmvp_query = "SELECT COUNT(*) FROM ".$wpdb->prefix."users as m LEFT JOIN(SELECT user_id,
                    MAX(CASE WHEN meta_key='wcmvp_role' THEN meta_value END) wcmvp_role
                    FROM ".$wpdb->prefix."usermeta GROUP by user_id) wcmvp_vendor_role_table ON m.ID = wcmvp_vendor_role_table.user_id WHERE `wcmvp_role`=%s AND user_registered >= '%s' AND user_registered < '%s'";
                    if( isset($wcmvp_query) )
                    {
                        $wcmvp_get_monthly_created_vendor = $wpdb->get_var( $wpdb->prepare($wcmvp_query,'wcmvp_vendor',date("Y-m-d",$wcmvp_list_prod_start_date),date("Y-m-d",$wcmvp_list_end_date)) );
                    }

                    $wcmvp_query = "SELECT COUNT(*) FROM ".$wpdb->prefix."users as m LEFT JOIN(SELECT user_id,
                    MAX(CASE WHEN meta_key='wcmvp_vendor_status' THEN meta_value END) wcmvp_vendor_status
                    FROM $wpdb->usermeta GROUP BY user_id) wcmvp_unapproved_vendor_table ON m.`ID` = wcmvp_unapproved_vendor_table.`user_id` WHERE wcmvp_vendor_status=%d";
                    if( isset($wcmvp_query) )
                    {
                        $wcmvp_unapproved_vendors = $wpdb->get_var( $wpdb->prepare( $wcmvp_query,0 ) );
                    }

                    $wcmvp_query = "SELECT COUNT(*) FROM ".$wpdb->prefix."wcmvp_withdraw WHERE `status`=%s";
                    if(isset($wcmvp_query))
                    {
                        $wcmvp_unapproved_withdraw_requests = $wpdb->get_var( $wpdb->prepare( $wcmvp_query,'pending' ) );
                    }

                    $wcmvp_query = "SELECT COUNT(*) FROM ".$wpdb->prefix."posts WHERE post_type='%s' AND post_status='%s' AND post_parent=%d AND post_date >= '%s' AND post_date < '%s'";
                    if( isset($wcmvp_query) )
                    {
                        $wcmvp_total_orders_count = $wpdb->get_var( $wpdb->prepare($wcmvp_query,'shop_order','wc-completed',0,date("Y-m-d",$wcmvp_list_prod_start_date),date("Y-m-d",$wcmvp_list_end_date)) );
                    }

                    $wcmvp_query = "SELECT wcmvp_admin_order_commision_for_vendor FROM ".$wpdb->prefix."posts as m LEFT JOIN(SELECT post_id,
                    MAX(CASE WHEN meta_key='wcmvp_admin_order_commision_for_vendor' THEN meta_value END) wcmvp_admin_order_commision_for_vendor
                    FROM ".$wpdb->prefix."postmeta GROUP by post_id) wcmvp_admin_commission_table ON m.ID = wcmvp_admin_commission_table.post_id WHERE `post_type`=%s AND post_status='%s' AND post_date >= '%s' AND post_date < '%s'";

                    if( isset($wcmvp_query) )
                    {
                        $wcmvp_admin_commission_monthly = $wpdb->get_results( $wpdb->prepare($wcmvp_query, 'shop_order','wc-completed',date("Y-m-d",$wcmvp_list_prod_start_date),date("Y-m-d",$wcmvp_list_end_date)) );
                        
                        if( isset($wcmvp_admin_commission_monthly) && !empty($wcmvp_admin_commission_monthly) && is_array($wcmvp_admin_commission_monthly) )
                        {
                            $wcmvp_admin_commission_value = 0;

                            foreach($wcmvp_admin_commission_monthly as $commission)
                            {
                                if(isset($commission) && isset($commission->wcmvp_admin_order_commision_for_vendor))
                                {   
                                    $wcmvp_admin_commission_value += $commission->wcmvp_admin_order_commision_for_vendor;
                                }
                            }
                        }
					}

					$i = 0; 

					usort($wcmvp_sold_products, array($this, 'wcmvp_order_sort'));

					?>

					<?php foreach ($wcmvp_sold_products as $product) {

						if( isset($product) )
						{
							$wcmvp_product_title = (isset($product->product_id) ? (get_the_title($product->product_id)) : "" );
							?>
								<?php
								if( isset($product->wcmvp_gross) )
								{
									$price = $product->wcmvp_gross;
									if(isset($price) )
									{
										$product_price = ($price);
									}
								}
								if( isset($product->product_id) )
								{
									$post = get_post($product->product_id);
									if( is_object($post) ) 
									{
										$post->post_author;
										if( isset($post->post_author) )
										{
											$wcmvp_user_store_name = get_user_meta($post->post_author,'wcmvp_store_name',true);
										}
									}
								}
							$wcmvp_user_store_name = (isset($wcmvp_user_store_name) ? ($wcmvp_user_store_name) : "" );
							$wcmvp_product_quantity = (isset(($product->wcmvp_quantity)) ? ($product->wcmvp_quantity) : 0);
							$wcmvp_product_price = isset($product_price) ? $product_price : 0;;
							$i++;
							if( $i == 5 ) break; 
						}
						$wcmvp_top_selling_products = array(
							'wcmvp_product_title' => isset($wcmvp_product_title) ? $wcmvp_product_title : '',
							'wcmvp_user_store_name' => isset($wcmvp_user_store_name) ? $wcmvp_user_store_name : '',
							'wcmvp_product_quantity' => isset($wcmvp_product_quantity) ? $wcmvp_product_quantity : '',
							'wcmvp_product_price' => get_woocommerce_currency_symbol(). isset($wcmvp_product_price) ? $wcmvp_product_price : 0
						);
						$wcmvp_top_selling_products_array[] = $wcmvp_top_selling_products;

						do_action('wcmvp_top_selling_products');

					}

					$wcmvp_dashboard_report_section_data = array(
						'wcmvp_total_sold_product_amount' => isset($wcmvp_total_sold_product_amount) ? $wcmvp_total_sold_product_amount : 0,
						'wcmvp_get_monthly_created_product' => isset($wcmvp_get_monthly_created_product) ? $wcmvp_get_monthly_created_product : 0,
						'wcmvp_get_monthly_created_vendor' => isset($wcmvp_get_monthly_created_vendor) ? $wcmvp_get_monthly_created_vendor : 0,
						'wcmvp_unapproved_vendors' => isset($wcmvp_unapproved_vendors) ? $wcmvp_unapproved_vendors : 0,
						'wcmvp_unapproved_withdraw_requests' => isset($wcmvp_unapproved_withdraw_requests) ? $wcmvp_unapproved_withdraw_requests : 0,
						'wcmvp_admin_commission_value' => isset($wcmvp_admin_commission_value) ? $wcmvp_admin_commission_value : 0,
						'wcmvp_total_sold_product' => isset($wcmvp_total_sold_product) ? $wcmvp_total_sold_product : 0,
						'wcmvp_total_orders_count' => isset($wcmvp_total_orders_count) ? $wcmvp_total_orders_count : 0,
					);

					do_action('wcmvp_dashboard_report_section_data');

					$i = 0; ?>

					<?php if( isset($wcmvp_top_selling_vendors) && is_array($wcmvp_top_selling_vendors) )
						{
							if( !empty($wcmvp_top_selling_vendors) )
							{
								foreach( array_unique($wcmvp_top_selling_vendors) as $vendors )
								{
									if( isset($vendors) )
									{
										$wcmvp_user_store_name = get_user_meta($vendors,'wcmvp_store_name',true);
										
										$wcmvp_query = "SELECT post_id FROM ".$wpdb->prefix."posts as m LEFT JOIN(SELECT post_id,
										MAX(CASE WHEN meta_key='wcmvp_order_vendor' THEN meta_value END) wcmvp_order_vendor
										FROM ".$wpdb->prefix."postmeta GROUP by post_id) wcmvp_vendor_role_table ON m.ID = wcmvp_vendor_role_table.post_id WHERE `wcmvp_order_vendor`=%d AND `post_type`=%s AND post_status='%s' AND post_date >= '%s' AND post_date < '%s'";
										if( isset($wcmvp_query) )
										{
											$wcmvp_number_of_orders_by_vendors = $wpdb->get_results( $wpdb->prepare($wcmvp_query, $vendors, 'shop_order','wc-completed',date("Y-m-d",$wcmvp_list_prod_start_date),date("Y-m-d",$wcmvp_list_end_date)) );
											if( isset($wcmvp_number_of_orders_by_vendors) && is_array($wcmvp_number_of_orders_by_vendors) )
											{
												$wcmvp_number_of_orders_by_vendors_count = count($wcmvp_number_of_orders_by_vendors);	
											}
										}
										if( isset($wcmvp_number_of_orders_by_vendors) && !empty($wcmvp_number_of_orders_by_vendors) && is_array($wcmvp_number_of_orders_by_vendors) )
										{
											$wcmvp_item_count_by_top_sellers_data = 0;
											foreach($wcmvp_number_of_orders_by_vendors as $post_id_array)
											{
												if( isset($post_id_array) && isset($post_id_array->post_id) )
												{
													$wcmvp_order_details_by_top_sellers = wc_get_order( $post_id_array->post_id );
													$wcmvp_item_count_by_top_sellers = $wcmvp_order_details_by_top_sellers->get_item_count();
													if( isset($wcmvp_item_count_by_top_sellers) )
													{
														$wcmvp_item_count_by_top_sellers_data += $wcmvp_item_count_by_top_sellers;
													}
												}
											}
											$wcmvp_top_sellers = array(
												'wcmvp_user_store_name' => isset($wcmvp_user_store_name) ? ($wcmvp_user_store_name) : "" ,
												'wcmvp_number_of_orders_by_vendors_count' => isset($wcmvp_number_of_orders_by_vendors_count) ? ($wcmvp_number_of_orders_by_vendors_count) : 0,
												'wcmvp_item_count_by_top_sellers_data' => isset($wcmvp_item_count_by_top_sellers_data) ? $wcmvp_item_count_by_top_sellers_data : 0,
											);
											$wcmvp_top_sellers_array[] = $wcmvp_top_sellers;

											do_action('wcmvp_top_sellers');
										}
									}
								}
							} 
						}
									
						$wcmvp_dashboard_report_page = array(
							'wcmvp_top_selling_products_array' => isset($wcmvp_top_selling_products_array) ? ($wcmvp_top_selling_products_array) : 0,
							'wcmvp_dashboard_report_section_data' => isset($wcmvp_dashboard_report_section_data) ? ($wcmvp_dashboard_report_section_data) : 0,
							'wcmvp_top_sellers' => isset($wcmvp_top_sellers_array) ? ($wcmvp_top_sellers_array) : 0
						);

						do_action('wcmvp_dashboard_report_page',$wcmvp_dashboard_report_page);

						echo json_encode($wcmvp_dashboard_report_page);

					wp_die();
			}
		}
	}

//================function is used to sort an array in descending order=============//	

	function wcmvp_order_sort($wcmvp_order_obj, $wcmvp_order_obj1)
	{
		if($wcmvp_order_obj->wcmvp_quantity==$wcmvp_order_obj1->wcmvp_quantity) return 0;
    	return $wcmvp_order_obj->wcmvp_quantity < $wcmvp_order_obj1->wcmvp_quantity?1:-1;
	}
	
//================This function included store setup working, when plugin installed for very first time================//	

	function wcmvp_store_setp_on_activation()
	{
		if( !empty(get_option('wcmvp_plugin_activated_for_store_setup')) )
		{
			if( get_option('wcmvp_plugin_activated_for_store_setup') == 'wcmvp_yes' )
			{
				$wcmvp_setup_store_url = add_query_arg( array(
					'page' => 'wc-multi-vendor-platform-lite',
					'wcmvp_action' => 'wcmvp_store_setup'
				),admin_url('admin.php'));

				if( isset($wcmvp_setup_store_url) )
				{
					do_action('wcmvp_multivendor_platform_redirect_to_store_page',$wcmvp_setup_store_url);

					wp_redirect($wcmvp_setup_store_url);
				}

				update_option('wcmvp_plugin_activated_for_store_setup','wcmvp_done');
			}
		}
	}

//======================This function return multivendor-platform home page url=========================//	

	function wcmvp_setup_page_cb()
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_setup_page_nonce_verify') )
		{
			$wcmvp_multivendor_platform_home_url = add_query_arg( array(
				'page' => 'wc-multi-vendor-platform-lite#dashboard'
			),admin_url('admin.php'));

			echo json_encode($wcmvp_multivendor_platform_home_url);

			do_action('wcmvp_redirect_dashboard_from_setup_page');

			wp_die();
		}
	}

//==Function came into when order staus change, this function is only used for manage admin end order and balance transfer=//

	function wcmvp_order_status_changes_cb( $wcmvp_order_id, $wcmvp_prev_order_staus, $wcmvp_new_order_status )
	{
		if( isset($wcmvp_order_id) && isset($wcmvp_prev_order_staus) && isset($wcmvp_new_order_status) )
		{
			$wcmvp_order_object = wc_get_order($wcmvp_order_id);

			$wcmvp_order_parent_id = wc_get_order($wcmvp_order_id)->get_parent_id();
	
			if( isset($wcmvp_order_parent_id) && !empty($wcmvp_order_parent_id) )
			{
				$wcmvp_order_parent_object = wc_get_order($wcmvp_order_parent_id);

				if( isset($wcmvp_order_parent_object) && is_object($wcmvp_order_parent_object) )
				{
					if($wcmvp_order_parent_object->get_status() == 'completed')
					{			
						$my_post = array(
							'ID'           => $wcmvp_order_parent_id,
							'post_status'   => 'wc-'.$wcmvp_new_order_status,
						);
						wp_update_post( $my_post );
					}
					else
					{
						$this->wcmvp_order_status_manage_on_change($wcmvp_order_parent_id);
					}
				}
			}
	
			$wcmvp_admin_order_commision_for_vendor = get_post_meta($wcmvp_order_id,'wcmvp_admin_order_commision_for_vendor',true );
	
			$wcmvp_order_vendor_id = get_post_meta( $wcmvp_order_id,'wcmvp_order_vendor',true );
			
			if( isset($wcmvp_order_object) && is_object($wcmvp_order_object) )
			{
				$wcmvp_order_total = $wcmvp_order_object->get_total();
			}
			if( !empty(get_option('wcmvp_withdraw_option')) )
			{
				if(isset(get_option('wcmvp_withdraw_option')['wcmvp_withdraw_to_vendor']))
				{
					if(get_option('wcmvp_withdraw_option')['wcmvp_withdraw_to_vendor'] == 'wcmvp_order_completed')
					{
						if( ($wcmvp_prev_order_staus != 'completed') && ($wcmvp_new_order_status == 'completed') )
						{
							if( isset($wcmvp_admin_order_commision_for_vendor) && isset($wcmvp_order_vendor_id) && isset($wcmvp_order_total) )
							{
								if(get_post_meta($wcmvp_order_id,'wcmvp_vendor_payment_after_admin_approvale',true ) != 'true')
								{
									update_user_meta( $wcmvp_order_vendor_id,'wcmvp_total_amount',intval(get_user_meta($wcmvp_order_vendor_id,'wcmvp_total_amount',true)) + ($wcmvp_order_total - $wcmvp_admin_order_commision_for_vendor));
	
									update_post_meta($wcmvp_order_id,'wcmvp_vendor_payment_after_admin_approvale','true' );
								}
							}
						}
						else if( ($wcmvp_prev_order_staus == 'completed') && ($wcmvp_new_order_status != 'completed') )
						{
							if( isset($wcmvp_admin_order_commision_for_vendor) && (isset($wcmvp_order_vendor_id)) && (isset($wcmvp_order_total)) )
							{
								update_post_meta($wcmvp_order_id,'wcmvp_vendor_payment_after_admin_approvale','false' );
	
								update_user_meta( $wcmvp_order_vendor_id,'wcmvp_total_amount',intval(get_user_meta($wcmvp_order_vendor_id,'wcmvp_total_amount',true)) - ($wcmvp_order_total - $wcmvp_admin_order_commision_for_vendor));
							}
						}
					}
					else if(get_option('wcmvp_withdraw_option')['wcmvp_withdraw_to_vendor'] == 'wcmvp_order_processing')
					{
						if( ($wcmvp_prev_order_staus != 'processing') && ($wcmvp_new_order_status == 'processing') )
						{
							if( isset($wcmvp_admin_order_commision_for_vendor) && isset($wcmvp_order_vendor_id) && isset($wcmvp_order_total) )
							{
								if(get_post_meta($wcmvp_order_id,'wcmvp_vendor_payment_after_admin_approvale',true ) != 'true')
								{
									update_user_meta( $wcmvp_order_vendor_id,'wcmvp_total_amount',intval(get_user_meta($wcmvp_order_vendor_id,'wcmvp_total_amount',true)) + ($wcmvp_order_total - $wcmvp_admin_order_commision_for_vendor));
	
									update_post_meta($wcmvp_order_id,'wcmvp_vendor_payment_after_admin_approvale','true' );
								}
							}
						}
						else if( ($wcmvp_prev_order_staus == 'processing') && ($wcmvp_new_order_status != 'processing') )
						{
							if( isset($wcmvp_admin_order_commision_for_vendor) && (isset($wcmvp_order_vendor_id)) && (isset($wcmvp_order_total)) )
							{
								update_post_meta($wcmvp_order_id,'wcmvp_vendor_payment_after_admin_approvale','false' );
	
								update_user_meta( $wcmvp_order_vendor_id,'wcmvp_total_amount',intval(get_user_meta($wcmvp_order_vendor_id,'wcmvp_total_amount',true)) - ($wcmvp_order_total - $wcmvp_admin_order_commision_for_vendor));
							}
						}
					}
					else if(get_option('wcmvp_withdraw_option')['wcmvp_withdraw_to_vendor'] == 'wcmvp_after_admin_approval')
					{
						
						if( ($wcmvp_prev_order_staus == 'completed') && ($wcmvp_new_order_status != 'completed') && (get_post_meta($wcmvp_order_id,'wcmvp_vendor_payment_after_admin_approvale',true ) == 'true') )
						{
							if( isset($wcmvp_admin_order_commision_for_vendor) && (isset($wcmvp_order_vendor_id)) && (isset($wcmvp_order_total)) )
							{
								update_post_meta($wcmvp_order_id,'wcmvp_vendor_payment_after_admin_approvale','false' );
	
								update_user_meta( $wcmvp_order_vendor_id,'wcmvp_total_amount',intval(get_user_meta($wcmvp_order_vendor_id,'wcmvp_total_amount',true)) - ($wcmvp_order_total - $wcmvp_admin_order_commision_for_vendor));
							}
						}
					}
				}
			}
		}
	}

//=========================function is used to manage orders on changing of their orders==================///

	function wcmvp_order_status_manage_on_change($wcmvp_order_parent_id)
	{
		if(isset($wcmvp_order_parent_id))
		{
			$wcmvp_children_post_args = array(
				'post_parent'	=> 	$wcmvp_order_parent_id,
				'post_type'		=>	'shop_order',
				'post_status'	=>	'-1'
			);
			$wcmvp_order_children = get_children( $wcmvp_children_post_args );

			if( isset($wcmvp_order_children) && !empty($wcmvp_order_children) && is_array($wcmvp_order_children) )
			{
				foreach($wcmvp_order_children as $key)
				{
					$wcmvp_each_sub_order_id = $key->ID;

					$wcmvp_each_sub_order_object = wc_get_order($wcmvp_each_sub_order_id);

					$wcmvp_each_sub_order_status[] = $wcmvp_each_sub_order_object->get_status();

					$wcmvp_each_sub_order_status_unique = array_unique($wcmvp_each_sub_order_status);
					if( count($wcmvp_each_sub_order_status_unique) == 1 )
					{
						$my_post = array(
							'ID'           => $wcmvp_order_parent_id,
							'post_status'   => 'wc-'.($wcmvp_each_sub_order_status_unique[0]),
						);
						wp_update_post( $my_post );
					}
				}
			}	
		}
	}



//======================Function is used to display product stats and vendor's data a pie in report section========//

	function wcmvp_chart_data_action_for_product_stats_cb()
	{
		if( check_ajax_referer('wcmvp-vendor-nonce','wcmvp_chart_data_nonce_verify') )
		{
			global $wpdb;

			$wcmvp_list_prod_start_date = strtotime(date('Y-m', current_time('timestamp')) . '-1 midnight');

			$wcmvp_list_end_date = strtotime('+1month', $wcmvp_list_prod_start_date) - 86400;

			$wcmvp_query = "SELECT COUNT(*) FROM ".$wpdb->prefix."posts WHERE post_type='%s' AND post_status!='%s' AND post_status='%s' AND post_date >= '%s' AND post_date < '%s'";

			if( isset($wcmvp_query) )
			{
				$wcmvp_get_online_products = $wpdb->get_var( $wpdb->prepare($wcmvp_query,'product','auto-draft','publish',date("Y-m-d",$wcmvp_list_prod_start_date),date("Y-m-d",$wcmvp_list_end_date)) );
				$wcmvp_get_draft_products = $wpdb->get_var( $wpdb->prepare($wcmvp_query,'product','auto-draft','draft',date("Y-m-d",$wcmvp_list_prod_start_date),date("Y-m-d",$wcmvp_list_end_date)) );
				$wcmvp_get_pending_products = $wpdb->get_var( $wpdb->prepare($wcmvp_query,'product','auto-draft','pending',date("Y-m-d",$wcmvp_list_prod_start_date),date("Y-m-d",$wcmvp_list_end_date)) );
			}
			$wcmvp_query_for_all = "SELECT COUNT(*) FROM ".$wpdb->prefix."posts WHERE post_type='%s' AND post_status!='%s' AND post_date >= '%s' AND post_date < '%s'";

			if( isset($wcmvp_query_for_all) )
			{
				$wcmvp_get_total_products = $wpdb->get_var( $wpdb->prepare($wcmvp_query_for_all,'product','auto-draft',date("Y-m-d",$wcmvp_list_prod_start_date),date("Y-m-d",$wcmvp_list_end_date)) );
			}

			if( isset($wcmvp_get_online_products) && isset($wcmvp_get_draft_products) && isset($wcmvp_get_total_products) && isset($wcmvp_get_pending_products) )
			{
				$wcmvp_product_stats = array($wcmvp_get_online_products,$wcmvp_get_draft_products,$wcmvp_get_pending_products,$wcmvp_get_total_products);
			}

			$wcmvp_query_for_vendors = "SELECT COUNT(*) FROM ".$wpdb->prefix."users as m LEFT JOIN(SELECT user_id,
			MAX(CASE WHEN meta_key='wcmvp_vendor_status' THEN meta_value END) wcmvp_vendor_status
			FROM $wpdb->usermeta GROUP BY user_id) wcmvp_unapproved_vendor_table ON m.`ID` = wcmvp_unapproved_vendor_table.`user_id` WHERE wcmvp_vendor_status=%d";

			if( isset($wcmvp_query_for_vendors) )
			{
				$wcmvp_approved_vendoors = $wpdb->get_var( $wpdb->prepare($wcmvp_query_for_vendors,1) );
				$wcmvp_unapproved_vendoors = $wpdb->get_var( $wpdb->prepare($wcmvp_query_for_vendors,0) );

				if( isset($wcmvp_approved_vendoors) && isset($wcmvp_unapproved_vendoors) )
				{
					$wcmvp_total_vendors_no = $wcmvp_approved_vendoors + $wcmvp_unapproved_vendoors;
					if( isset($wcmvp_total_vendors_no) )
					{
						$wcmvp_total_vendoors = array($wcmvp_approved_vendoors,$wcmvp_unapproved_vendoors);
					}
				}
			}

			if( isset($wcmvp_product_stats) && isset($wcmvp_total_vendoors) ) 
			{
				$wcmvp_vendors_and_product_stats = array(
					'wcmvp_product_stats' => $wcmvp_product_stats,
					'wcmvp_total_vendoors' => $wcmvp_total_vendoors
				);
				if( isset($wcmvp_vendors_and_product_stats) )
				{
					do_action('wcmvp_vendors_and_product_stats_from_db',$wcmvp_vendors_and_product_stats);
					echo json_encode($wcmvp_vendors_and_product_stats);
				}
				wp_die();
			}
			wp_die();
		}
	}
//====function is used store notification of new order ====//
	function wcmvp_wc_new_order()
	{
		if( !empty(get_option('wcmvp_notifications')) && is_array(get_option('wcmvp_notifications')))
		{
			$wcmvp_notifications = get_option('wcmvp_notifications');
			if(isset($wcmvp_notifications) )
			{
				array_push($wcmvp_notifications,esc_html__('A New Order has been Received','wc-multi-vendor-platform-lite'));
				update_option('wcmvp_notifications',$wcmvp_notifications);
			}
		}
		else
		{
			$wcmvp_notifications[] = esc_html__('A New Order has been Received','wc-multi-vendor-platform-lite');
			update_option('wcmvp_notifications',$wcmvp_notifications);
		}
	}
//====function is used admin area ====//
	function wcmvp_show_admin_area(){
		$wcmvp_general_page_options1 = get_option('wcmvp_general_setting');
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if($actual_link==site_url().'/wp-admin/' && $wcmvp_general_page_options1['wcmvp_access_admin_area']==1){
			$urls=site_url().'/vendor-dashboard';
			wp_safe_redirect($urls);
			exit;

		}
		
	
	}

}