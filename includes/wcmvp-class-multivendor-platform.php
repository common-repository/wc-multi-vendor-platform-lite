<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       www.codexinfra.com
 * @since      1.0.0
 *
 * @package    Wcmvp_Multivendor_Platform
 * @subpackage Wcmvp_Multivendor_Platform/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Wcmvp_Multivendor_Platform
 * @subpackage Wcmvp_Multivendor_Platform/includes
 * @author     CodexInfra <developers@codexinfra.com>
 */
class Wcmvp_Multivendor_Platform
{

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Wcmvp_Multivendor_Platform_Loader    $wcmvp_loader    Maintains and registers all hooks for the plugin.
	 */
	protected $wcmvp_loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $wcmvp_plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $wcmvp_plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $wcmvp_version    The current version of the plugin.
	 */
	protected $wcmvp_version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct()
	{
		if (defined('WCMVP_MUTIVENDOR_PLATFORM_VERSION')) {
			$this->wcmvp_version = WCMVP_MUTIVENDOR_PLATFORM_VERSION;
		} else {
			$this->wcmvp_version = '1.0.0';
		}
		$this->wcmvp_plugin_name = 'multivendor-platform';

		$this->wcmvp_load_dependencies();
		$this->wcmvp_set_locale();
		$this->wcmvp_define_admin_hooks();
		$this->wcmvp_define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Wcmvp_Multivendor_Platform_Loader. Orchestrates the hooks of the plugin.
	 * - Wcmvp_Multivendor_Platform_i18n. Defines internationalization functionality.
	 * - Wcmvp_Multivendor_Platform_Admin. Defines all hooks for the admin area.
	 * - Wcmvp_Multivendor_Platform_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function wcmvp_load_dependencies()
	{

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/wcmvp-class-multivendor-platform-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/wcmvp-class-multivendor-platform-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/wcmvp-class-multivendor-platform-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/wcmvp-class-multivendor-platform-public.php';

		// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/wcmvp_functions.php';

		$this->wcmvp_loader = new Wcmvp_Multivendor_Platform_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Wcmvp_Multivendor_Platform_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function wcmvp_set_locale()
	{

		$wcmvp_plugin_i18n = new Wcmvp_Multivendor_Platform_i18n();

		$this->wcmvp_loader->wcmvp_add_action('plugins_loaded', $wcmvp_plugin_i18n, 'wcmvp_load_plugin_textdomain');
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function wcmvp_define_admin_hooks()
	{
		if (is_admin()) {
			$wcmvp_plugin_admin = new Wcmvp_Multivendor_Platform_Admin($this->wcmvp_get_plugin_name(), $this->wcmvp_get_version());
			$this->wcmvp_loader->wcmvp_add_action('admin_enqueue_scripts', $wcmvp_plugin_admin, 'wcmvp_enqueue_styles');
			$this->wcmvp_loader->wcmvp_add_action('admin_enqueue_scripts', $wcmvp_plugin_admin, 'wcmvp_enqueue_scripts');
			$this->wcmvp_loader->wcmvp_add_action('in_admin_header', $wcmvp_plugin_admin, 'wcmvp_remove_notice',1);
			$this->wcmvp_loader->wcmvp_add_action('admin_menu', $wcmvp_plugin_admin, 'wcmvp_add_admin_menu');
			$this->wcmvp_loader->wcmvp_add_action('admin_menu', $wcmvp_plugin_admin, 'wcmvp_store_setp_on_activation');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_admin_withdraw', $wcmvp_plugin_admin, 'wcmvp_admin_withdraw_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_admin_customer', $wcmvp_plugin_admin, 'wcmvp_admin_customer_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_general_page', $wcmvp_plugin_admin, 'wcmvp_general_page_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_selling_options_page', $wcmvp_plugin_admin, 'wcmvp_selling_options_page_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_withdraw_option_page', $wcmvp_plugin_admin, 'wcmvp_withdraw_option_page_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_payment_gateway_page', $wcmvp_plugin_admin, 'wcmvp_payment_gateway_page_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_page_setting', $wcmvp_plugin_admin, 'wcmvp_page_setting_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_appearence_page_action', $wcmvp_plugin_admin, 'wcmvp_appearence_page_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_setting_privacy', $wcmvp_plugin_admin, 'wcmvp_setting_privacy_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_vendors_table_action', $wcmvp_plugin_admin, 'wcmvp_vendors_table_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_vendor_status', $wcmvp_plugin_admin, 'wcmvp_vendor_status_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_vendor_bulk', $wcmvp_plugin_admin, 'wcmvp_vendor_bulk_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_vendors_data', $wcmvp_plugin_admin, 'wcmvp_vendors_data_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_vendor_selected_country', $wcmvp_plugin_admin, 'wcmvp_vendor_selected_country_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_edit_vendors_data', $wcmvp_plugin_admin, 'wcmvp_edit_vendors_data_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_vendors_product', $wcmvp_plugin_admin, 'wcmvp_vendors_product_cb');
			$this->wcmvp_loader->wcmvp_add_action('user_register', $wcmvp_plugin_admin, 'wcmvp_user_register_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_prod_tab_count', $wcmvp_plugin_admin, 'wcmvp_prod_tab_count_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_prod_edit', $wcmvp_plugin_admin, 'wcmvp_prod_edit_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_admin_withdraw_count', $wcmvp_plugin_admin, 'wcmvp_admin_withdraw_count_cb');
			$this->wcmvp_loader->wcmvp_add_action('add_meta_boxes', $wcmvp_plugin_admin, 'wcmvp_add_meta_boxes_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_prod_add_new', $wcmvp_plugin_admin, 'wcmvp_prod_add_new_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_prod_quick_edit', $wcmvp_plugin_admin, 'wcmvp_prod_quick_edit_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_prod_quick_edit_action', $wcmvp_plugin_admin, 'wcmvp_prod_quick_edit_action_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_prod_trash_action', $wcmvp_plugin_admin, 'wcmvp_prod_trash_action_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_prod_preview_action', $wcmvp_plugin_admin, 'wcmvp_prod_preview_action_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_prod_restore_action', $wcmvp_plugin_admin, 'wcmvp_prod_restore_action_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_prod_checkboxes_action', $wcmvp_plugin_admin, 'wcmvp_prod_checkboxes_action_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_prod_delete_action', $wcmvp_plugin_admin, 'wcmvp_prod_delete_action_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_duplicate_prod', $wcmvp_plugin_admin, 'wcmvp_duplicate_prod_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_empty_trash_action', $wcmvp_plugin_admin, 'wcmvp_empty_trash_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_fav_prod_action', $wcmvp_plugin_admin, 'wcmvp_fav_prod_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_vendors_count_action', $wcmvp_plugin_admin, 'wcmvp_vendors_count_action_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_add_new_vend_generate_pass_action', $wcmvp_plugin_admin, 'wcmvp_add_new_vend_generate_pass_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_addnew_vend_country_action', $wcmvp_plugin_admin, 'wcmvp_addnew_vend_country_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_withdraw_status_action', $wcmvp_plugin_admin, 'wcmvp_withdraw_status_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_withdraw_status_note_action', $wcmvp_plugin_admin, 'wcmvp_withdraw_status_note_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_order_table_action', $wcmvp_plugin_admin, 'wcmvp_order_table_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_order_count_action', $wcmvp_plugin_admin, 'wcmvp_order_count_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_edit_order_action', $wcmvp_plugin_admin, 'wcmvp_edit_order_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_view_order_action_1', $wcmvp_plugin_admin, 'wcmvp_view_order_cb_1');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_view_order_action_2', $wcmvp_plugin_admin, 'wcmvp_view_order_cb_2');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_process_order_request_action', $wcmvp_plugin_admin, 'wcmvp_process_order_request_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_order_checkboxes_action', $wcmvp_plugin_admin, 'wcmvp_order_checkboxes_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_show_sub_order_action', $wcmvp_plugin_admin, 'wcmvp_show_sub_order_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_chart_data_action', $wcmvp_plugin_admin, 'wcmvp_chart_data_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_dashboard_page_action', $wcmvp_plugin_admin, 'wcmvp_dashboard_page_cb');
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_setup_page_action', $wcmvp_plugin_admin, 'wcmvp_setup_page_cb');
			$this->wcmvp_loader->wcmvp_add_filter('admin_url', $wcmvp_plugin_admin, 'wcmvp_admin_url_cb', '', 3);
			$this->wcmvp_loader->wcmvp_add_filter('redirect_post_location', $wcmvp_plugin_admin, 'wcmvp_multivendor_platform_redirect_post_location_cb', '', 3);
			$this->wcmvp_loader->wcmvp_add_action('woocommerce_order_status_changed', $wcmvp_plugin_admin, 'wcmvp_order_status_changes_cb', 10, 3);
			$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_chart_data_action_for_product_stats', $wcmvp_plugin_admin, 'wcmvp_chart_data_action_for_product_stats_cb');
			$this->wcmvp_loader->wcmvp_add_action('woocommerce_new_order', $wcmvp_plugin_admin, 'wcmvp_wc_new_order');
			$this->wcmvp_loader->wcmvp_add_action( 'wp_loaded',$wcmvp_plugin_admin, 'wcmvp_show_admin_area' );

			//==============Public end functions get calls when order distributed and order updated=========////

			$wcmvp_plugin_public = new Wcmvp_Multivendor_Platform_Public($this->wcmvp_get_plugin_name(), $this->wcmvp_get_version());
			$this->wcmvp_loader->wcmvp_add_action('woocommerce_new_order', $wcmvp_plugin_public, 'wcmvp_order_handler', 10, 1);
		}
	}

	/**
	 * Register all of the hooks related to the public-facing functionality    
	 * of the plugin.
	 * 
	 * @since    1.0.0
	 * @access   private
	 */
	private function wcmvp_define_public_hooks()
	{

		$wcmvp_plugin_public = new Wcmvp_Multivendor_Platform_Public($this->wcmvp_get_plugin_name(), $this->wcmvp_get_version());

		add_shortcode('Vendor_Dashboard', array($wcmvp_plugin_public, 'Vendors_dashboards'));

		add_shortcode('Vendor_Store', array($wcmvp_plugin_public, 'Vendors_Store_cb'));

		$this->wcmvp_loader->wcmvp_add_filter('woocommerce_registration_redirect', $wcmvp_plugin_public, 'wcmvp_redirect_to_Custom', 2);

		$this->wcmvp_loader->wcmvp_add_filter('template_include', $wcmvp_plugin_public, 'wcmvp_load_plugin_template');

		$this->wcmvp_loader->wcmvp_add_filter('theme_page_templates', $wcmvp_plugin_public, 'wcmvp_add_template_to_select', 10, 4);

		$this->wcmvp_loader->wcmvp_add_filter('ajax_query_attachments_args', $wcmvp_plugin_public, 'wcmvp_manager',  10, 1);

		$this->wcmvp_loader->wcmvp_add_filter('query_vars', $wcmvp_plugin_public, 'custom_endpoint',  10, 1);

		$this->wcmvp_loader->wcmvp_add_filter('list_cats', $wcmvp_plugin_public, 'wcmvp_category_list_filter', 10, 2);
		
		$this->wcmvp_loader->wcmvp_add_filter('woocommerce_product_tabs', $wcmvp_plugin_public,  'wcmvp_action_woocommerce_after_single_product_summary', 10, 3);

		$this->wcmvp_loader->wcmvp_add_filter('woocommerce_get_breadcrumb', $wcmvp_plugin_public,  'wcmvp_woocommerce_breadcrumb');	

		$this->wcmvp_loader->wcmvp_add_action('wp_enqueue_scripts', $wcmvp_plugin_public, 'wcmvp_enqueue_styles', 100);
		
		$this->wcmvp_loader->wcmvp_add_action('wp_enqueue_scripts', $wcmvp_plugin_public, 'wcmvp_enqueue_scripts');

		$this->wcmvp_loader->wcmvp_add_action('init', $wcmvp_plugin_public, 'wcmvp_rewrite_endpoints');
		
		$this->wcmvp_loader->wcmvp_add_action('wp', $wcmvp_plugin_public, 'wcmvp_views_update');

		$this->wcmvp_loader->wcmvp_add_action('woocommerce_product_meta_end', $wcmvp_plugin_public, 'wcmvp_vendor_reviews');

		$this->wcmvp_loader->wcmvp_add_action('woocommerce_register_form', $wcmvp_plugin_public, 'wcmvp_extra_register_fields', 10, 0);

		$this->wcmvp_loader->wcmvp_add_action('woocommerce_register_post', $wcmvp_plugin_public, 'wcmvp_validate_extra_register_fields', 10, 3);

		$this->wcmvp_loader->wcmvp_add_action('woocommerce_created_customer', $wcmvp_plugin_public, 'wcmvp_save_extra_register_fields');

		$this->wcmvp_loader->wcmvp_add_action('woocommerce_account_dashboard', $wcmvp_plugin_public, 'wcmvp_action_woocommerce_account_dashboard', 10, 0);

		$this->wcmvp_loader->wcmvp_add_action('woocommerce_checkout_update_order_meta', $wcmvp_plugin_public, 'wcmvp_order_handler', 10, 1);
	
		$this->wcmvp_loader->wcmvp_add_action('woocommerce_order_status_changed', $wcmvp_plugin_public, 'wcmvp_order_status_change_cb', 10, 3);

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_add_product_ajax', $wcmvp_plugin_public, 'add_product_ajax');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_add_product_ajax', $wcmvp_plugin_public, 'add_product_ajax');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_product_table', $wcmvp_plugin_public, 'wcmvp_product_table');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_wcmvp_product_table', $wcmvp_plugin_public, 'wcmvp_product_table');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_edit_product_ajax', $wcmvp_plugin_public, 'wcmvp_edit_product_ajax');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_edit_product_ajax', $wcmvp_plugin_public, 'wcmvp_edit_product_ajax');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_delete_product_ajax', $wcmvp_plugin_public, 'wcmvp_delete_product_ajax');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_delete_product_ajax', $wcmvp_plugin_public, 'wcmvp_delete_product_ajax');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_delete_product_bulk_ajax', $wcmvp_plugin_public, 'delete_product_bulk_ajax');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_delete_product_bulk_ajax', $wcmvp_plugin_public, 'delete_product_bulk_ajax');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_delete_permanently_product_ajax', $wcmvp_plugin_public, 'wcmvp_trash_delete_product');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_delete_permanently_product_ajax', $wcmvp_plugin_public, 'wcmvp_trash_delete_product');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_order_all_table', $wcmvp_plugin_public, 'wcmvp_order_all_datatable');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_wcmvp_order_all_table', $wcmvp_plugin_public, 'wcmvp_order_all_datatable');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_status_change_ajax', $wcmvp_plugin_public, 'status_change_ajax_cb');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_status_change_ajax', $wcmvp_plugin_public, 'status_change_ajax_cb');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_restore_prod_ajax', $wcmvp_plugin_public, 'restore_prod_ajax_cb');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_restore_prod_ajax', $wcmvp_plugin_public, 'restore_prod_ajax_cb');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_withdraw_request_ajax', $wcmvp_plugin_public, 'withdraw_request_ajax_cb');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_withdraw_request_ajax', $wcmvp_plugin_public, 'withdraw_request_ajax_cb');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_view_order_full_details', $wcmvp_plugin_public, 'order_full_details_cb');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_view_order_full_details', $wcmvp_plugin_public, 'order_full_details_cb');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_withdraw_all_table', $wcmvp_plugin_public, 'wcmvp_withdraw_all_table_cb');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_wcmvp_withdraw_all_table', $wcmvp_plugin_public, 'wcmvp_withdraw_all_table_cb');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_withdraw_request_cancel_ajax', $wcmvp_plugin_public, 'withdraw_request_cancel_ajax_cb');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_withdraw_request_cancel_ajax', $wcmvp_plugin_public, 'withdraw_request_cancel_ajax_cb');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_store_setting', $wcmvp_plugin_public, 'wcmvp_store_setting_callback');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_wcmvp_store_setting', $wcmvp_plugin_public, 'wcmvp_store_setting_callback');
		
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_payment_ajax', $wcmvp_plugin_public, 'wcmvp_payment_ajax_cb');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_wcmvp_payment_ajax', $wcmvp_plugin_public, 'wcmvp_payment_ajax_cb');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_update_count', $wcmvp_plugin_public, 'wcmvp_update_count_cb');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_wcmvp_update_count', $wcmvp_plugin_public, 'wcmvp_update_count_cb');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_store_listing_preview', $wcmvp_plugin_public, 'wcmvp_store_listing_preview');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_store_listing_preview', $wcmvp_plugin_public, 'wcmvp_store_listing_preview');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_endpoint_email', $wcmvp_plugin_public, 'wcmvp_email_vendor');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_wcmvp_endpoint_email', $wcmvp_plugin_public, 'wcmvp_email_vendor');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_get_data', $wcmvp_plugin_public, 'wcmvp_get_data_cb');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_wcmvp_get_data', $wcmvp_plugin_public, 'wcmvp_get_data_cb');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_export_orders', $wcmvp_plugin_public, 'wcmvp_export_orders_cb');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_wcmvp_export_orders', $wcmvp_plugin_public, 'wcmvp_export_orders_cb');

		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvp_search_reg_users', $wcmvp_plugin_public, 'wcmvp_search_reg_users_cb');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_wcmvp_search_reg_users', $wcmvp_plugin_public, 'wcmvp_search_reg_users_cb');$this->wcmvp_loader->wcmvp_add_action('wp_ajax_check_if_sku_exists', $wcmvp_plugin_public, 'check_if_sku_exists');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_check_if_sku_exists', $wcmvp_plugin_public, 'check_if_sku_exists');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_wcmvprre_withdraw_method_detail_ajax', $wcmvp_plugin_public, 'wcmvprre_withdraw_method_detail_ajax_cb');
		$this->wcmvp_loader->wcmvp_add_action('wp_ajax_nopriv_wcmvprre_withdraw_method_detail_ajax', $wcmvp_plugin_public, 'wcmvprre_withdraw_method_detail_ajax_cb');
		$this->wcmvp_loader->wcmvp_add_action('woocommerce_account_orders_endpoint', $wcmvp_plugin_public, 'wcmvprre_suborders', 99 );
	}	
	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin on init.
	 * 
	 * @since    1.0.0
	 * @access   private
	 */
	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function wcmvp_run()
	{
		$this->wcmvp_loader->wcmvp_run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function wcmvp_get_plugin_name()
	{
		return $this->wcmvp_plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Wcmvm_Multivendor_Loader    Orchestrates the hooks of the plugin.
	 */
	public function wcmvp_get_loader()
	{
		return $this->wcmvp_loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function wcmvp_get_version()
	{
		return $this->wcmvp_version;
	}
}
