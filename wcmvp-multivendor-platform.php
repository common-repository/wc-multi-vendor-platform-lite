<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://codexinfra.com/bazaar
 * @since             1.0.0
 * @package           Wcmvp_Multivendor_Platform
 *
 * @wordpress-plugin
 * Plugin Name:       Bazaar - Multivendor Marketplace for WooCommerce
 * Plugin URI:        https://codexinfra.com/bazaar
 * Description:       Upgrade your Woocommerce into a MultiVendor MarketPlace, An Extension of Woocommerce that will convert your store into Multivendor Marketplace.
 * Version:           2.2.2
 * Author:            CodexInfra
 * Author URI:        https://codexinfra.com/bazaar/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wcmvp-multivendor-platform
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * Currently plugin version.wcmvp_run_multivendor-platform
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
if ( ! defined( 'WCMVP_MUTIVENDOR_PLATFORM_VERSION' ) ) {
define( 'WCMVP_MUTIVENDOR_PLATFORM_VERSION', '1.0.0' );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/wcmvp-class-multivendor-platform-activator.php
 */
function wcmvp_activate_multivendor_platform() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/wcmvp-class-multivendor-platform-activator.php';
	$wcmvp_multivendor_platform_activator = new Wcmvp_Multivendor_Platform_Activator();
	$wcmvp_multivendor_platform_activator->wcmvp_activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/wcmvp-class-multivendor-platform-deactivator.php
 */

register_activation_hook( __FILE__, 'wcmvp_activate_multivendor_platform' );/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/wcmvp-class-multivendor-platform.php';

//Plugin Constant
function wcmvp_constants(){
	if( ! defined('WCMVP_DIR')){
		define('WCMVP_DIR', plugin_dir_path( __FILE__ ) );
	}
	if( ! defined('WCMVP_ADMIN_PARTIAL')){
		define('WCMVP_ADMIN_PARTIAL', plugin_dir_path( __FILE__ ).'admin/partials/' );
	}
	if( ! defined('WCMVP_ADMIN_PARTIAL_MENU')){
		define('WCMVP_ADMIN_PARTIAL_MENU', plugin_dir_path( __FILE__ ).'admin/partials/menu/' );
	}
	if( ! defined('WCMVP_ADMIN_PARTIAL_SUBMENU')){
		define('WCMVP_ADMIN_PARTIAL_SUBMENU', plugin_dir_path( __FILE__ ).'admin/partials/sub-menu/' );
	}
	if( ! defined('WCMVP_URL')){
		define('WCMVP_URL', plugin_dir_url( __FILE__ ) );
	}
	if( ! defined('WCMVP_ADMIN_PARTIAL_MENU_URL')){
		define('WCMVP_ADMIN_PARTIAL_MENU_URL', plugin_dir_url( __FILE__ ).'admin/partials/menu/' );
	}
	if( ! defined('WCMVP_HOME')){
		define('WCMVP_HOME', home_url() );
	}
	if( ! defined('WCMVP_ASSETS')){
		define('WCMVP_ASSETS', plugin_dir_path( __FILE__ ).'assets' );
	}
	if( ! defined('WCMVP_ASSETS_URL')){
		define('WCMVP_ASSETS_URL', plugin_dir_url( __FILE__ ).'assets' );
	}

	if( ! defined('WCMVP_PUBLIC_PARTIAL')){
		define('WCMVP_PUBLIC_PARTIAL', plugin_dir_path( __FILE__ ).'public/partials/' );
	}
	
	if( ! defined('WCMVP_PUBLIC_ORDER_DISTRIBUTION')){
		define('WCMVP_PUBLIC_ORDER_DISTRIBUTION', plugin_dir_path( __FILE__ ).'public/partials/wcmvp_order_distribution/' );
	}
	
	if( ! defined('WCMVP_PUBLIC_PARTIAL_URL')){
		define('WCMVP_PUBLIC_PARTIAL_URL', plugin_dir_url( __FILE__ ).'public/partials/' );
	}


	if( ! defined('WCMVP_ADMIN_IMAGES')){
		define('WCMVP_ADMIN_IMAGES', plugin_dir_path( __FILE__ ).'admin/images/' );
	}
	
	if( ! defined('WCMVP_ADMIN_IMAGES_URL')){
		define('WCMVP_ADMIN_IMAGES_URL', plugin_dir_url( __FILE__ ).'admin/images/' );
	}

	
	if( ! defined('WCMVP_PUBLIC_IMAGES')){
		define('WCMVP_PUBLIC_IMAGES', plugin_dir_path( __FILE__ ).'public/images/' );
	}
	
	if( ! defined('WCMVP_PUBLIC_IMAGES_URL')){
		define('WCMVP_PUBLIC_IMAGES_URL', plugin_dir_url( __FILE__ ).'public/images/' );
	}
	if( ! defined('WCMVP_ASSETS_COMMON_JS')){
		define('WCMVP_ASSETS_COMMON_JS', plugin_dir_url( __FILE__ ).'assets/common-js/' );
	}
	if( ! defined('WCMVP_ASSETS_BUNDLE_JS')){
		define('WCMVP_ASSETS_BUNDLE_JS', plugin_dir_url( __FILE__ ).'assets/bundle/' );
	}
	if( ! defined('WCMVP_ASSETS_COMMON_CSS')){
		define('WCMVP_ASSETS_COMMON_CSS', plugin_dir_url( __FILE__ ).'assets/common-css/' );
	}
	if( ! defined('WCMVP_ASSETS_NICESCROLL')){
		define('WCMVP_ASSETS_NICESCROLL', plugin_dir_url( __FILE__ ).'assets/nicescroll/' );
	}
}

wcmvp_constants();
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function wcmvp_run_multivendor_platform() {

	$plugin = new Wcmvp_Multivendor_Platform();
	$plugin->wcmvp_run();

}
wcmvp_run_multivendor_platform();
