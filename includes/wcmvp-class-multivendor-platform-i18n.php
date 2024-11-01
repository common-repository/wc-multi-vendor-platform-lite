<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.codexinfra.com
 * @since      1.0.0
 *
 * @package    Wcmvp_Multivendor_Platform
 * @subpackage Wcmvp_Multivendor_Platform/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wcmvp_Multivendor_Platform
 * @subpackage Wcmvp_Multivendor_Platform/includes
 * @author     CodexInfra <developers@codexinfra.com>
 */
class Wcmvp_Multivendor_Platform_i18n {	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function wcmvp_load_plugin_textdomain() {

		load_plugin_textdomain(
			'wc-multi-vendor-platform-lite',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}
}
