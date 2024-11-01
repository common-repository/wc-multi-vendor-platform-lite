<?php

/**
 * Fired during plugin activation
 *
 * @link       www.codexinfra.com
 * @since      1.0.0
 *
 * @package    Wcmvp_Multivendor_Platform
 * @subpackage Wcmvp_Multivendor_Platform/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wcmvp_Multivendor_Platform
 * @subpackage Wcmvp_Multivendor_Platform/includes
 * @author     CodexInfra <developers@codexinfra.com>
 */
class Wcmvp_Multivendor_Platform_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description. 
	 *
	 * @since    1.0.0
	 */
	function wcmvp_activate() {

		$this->wcmvp_check_woocommerce_active();

	}

//=================Check wheather woocommerce is active or not?==================//

	function wcmvp_check_woocommerce_active()
	{
		if ( class_exists( 'WooCommerce' ) )
		{
			$this->wcmvp_vendor_dashboard_page();

			$this->wcmvp_vendor_store_page();

			$this->wcmvp_vendor_privacy_policy_page();
	
			$this->wcmvp_add_vendor_role();
	
			$this->wcmvp_add_usermeta();
	
			$this->wcmvp_add_cap_for_admin();
	
			$this->wcmvp_create_withdraw_table();
	
			$this->wcmvp_create_setup_page();

			do_action('wcmvp_multivendor_platform_activator_hook');
		}
		else
		{
			exit(esc_html__('Woocommerce must be actived to install this plugin','wc-multi-vendor-platform-lite'));
		}
	}

//=========Function to add vendor dashboard page & Store page================//

	function wcmvp_vendor_dashboard_page() {
		
		if(!post_exists("Vendor Dashboard")){
			$wcmvp_create_dashboard_page = array(

				'post_title'    => wp_strip_all_tags( "Vendor Dashboard"),
				'post_content'  => '[Vendor_Dashboard]',
				'post_status'   => 'publish',
				'post_author'   => 1,
				'post_type'     => 'page',
				'page_template'  => "wcmvp_vendor_dashboard_template.php"
			);
			  
			$vendordashboard_id = wp_insert_post( $wcmvp_create_dashboard_page );
          
			$register_options = array(
				'wcmvp_page_setting_dashboard' => $vendordashboard_id,
			);
			update_option('wcmvp_page_setting', $register_options);
		}

	}

	function wcmvp_vendor_store_page() {
		
		if(!post_exists("Vendor Store")){
			$wcmvp_create_dashboard_page = array(

				'post_title'    => wp_strip_all_tags( "Vendor Store"),
				'post_content'  => '[Vendor_Store]',
				'post_status'   => 'publish',
				'post_author'   => 1,
				'post_type'     => 'page',
			);
			  
			wp_insert_post( $wcmvp_create_dashboard_page );
		}

	}

	function wcmvp_vendor_privacy_policy_page() {
		
		if(!post_exists("Store Privacy Policy")){
			$wcmvp_create_dashboard_page = array(

				'post_title'    => wp_strip_all_tags("Store Privacy Policy"),
				'post_content'  => esc_html__('Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our Multi Vendor Platform For WooCommerce  Privacy & Policy','wc-multi-vendor-platform-lite'),
				'post_status'   => 'publish',
				'post_author'   => 1,
				'post_type'     => 'page',
			);
			  
			wp_insert_post( $wcmvp_create_dashboard_page );
		}

	}

//============= Function to add vendor role================================//

	function wcmvp_add_vendor_role() {
	
		add_role('wcmvp_vendor', 'Vendor', array(
			'read'                      => true,
            'publish_posts'             => true,
            'edit_posts'                => true,
            'manage_categories'         => true,
            'upload_files'              => true,
            'edit_shop_orders'          => true,
            'edit_products'             => true,
            'publish_products'          => true,
            'manage_product_terms'      => true,
			'delete_product_terms'      => true,
			'multivendor-platformr'					=> true,
		));

		do_action('wcmvp_multivendor_platform_add_vendor_role_to_wp');

	}

//========================Function to add usermeta for admin to show as a vendor========================//

	function wcmvp_add_usermeta() {

		$wcmvp_admin_usermata = get_users('role=administrator');

		if( isset($wcmvp_admin_usermata) && is_array($wcmvp_admin_usermata) )
		{
			foreach( $wcmvp_admin_usermata as $keys ) 
			{
				if( isset($keys) && isset($keys->ID) && isset($keys->user_email) )
				{
					$wcmvp_admins_id = $keys->ID;
		
					$wcmvp_admins_email = $keys->user_email;

					if( isset($wcmvp_admins_id) && isset($wcmvp_admins_email) )
					{
						update_user_meta( $wcmvp_admins_id,'wcmvp_email',$wcmvp_admins_email );
			
						update_user_meta( $wcmvp_admins_id,'wcmvp_store_name','(no name)' );
				
						update_user_meta( $wcmvp_admins_id,'wcmvp_vendor_status',0 );
				
						update_user_meta( $wcmvp_admins_id,'wcmvp_role','wcmvp_vendor' );
				
						update_user_meta( $wcmvp_admins_id, 'wcmvp_vendor_store_img', 0 );
				
						do_action('wcmvp_multivendor_platform_add_previous_admin_as_vendor');
					}
				}
			}
		}
	}

//===================Function to add extra capability for admin=============================//

	function wcmvp_add_cap_for_admin() {

		$wcmvp_add_cap_admin = get_role( 'administrator' );

		if( isset($wcmvp_add_cap_admin) && is_object($wcmvp_add_cap_admin) )
		{
			$wcmvp_add_cap_admin->add_cap('multivendor-platformr');
			do_action('wcmvp_multivendor_platform_adding_extra_cap_to_admin_and_vendor');
		}

	}

//=====================function is used to create withdraw table into db================//	

	function wcmvp_create_withdraw_table() {

		global $wpdb;

		$table_name = $wpdb->prefix . "wcmvp_withdraw";

		$charset_collate = $wpdb->get_charset_collate();

		if( isset($table_name) && isset($charset_collate) )
		{
			$sql = "CREATE TABLE $table_name (
				id int(55) NOT NULL AUTO_INCREMENT,
				user_id int NOT NULL,
				wcmvp_vendor_store varchar(255),
				amount float NOT NULL,
				date timestamp DEFAULT '0000-00-00 00:00:00' NOT NULL,
				modified_date timestamp DEFAULT '0000-00-00 00:00:00' NOT NULL,
				status varchar(55),
				method varchar(155),
				wcmvp_vendor_email varchar(255),
				note text,
				payment_processed_stmt text,
				ip varchar(255) DEFAULT '' NOT NULL,
				PRIMARY KEY  (id)
			  ) $charset_collate;";
	
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			
			if( isset($sql) )
			{
				dbDelta( $sql );
			}
		}
	}

//========================This Function is used to setup store page========================//
	
	function wcmvp_create_setup_page()
	{
		add_option('wcmvp_plugin_activated_for_store_setup','wcmvp_yes');
	}

}
