<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       www.codexinfra.com
 * @since      1.0.0
 *
 * @package    Wcmvp_Multivendor_Platform
 * @subpackage Wcmvp_Multivendor_Platform/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Wcmvp_Multivendor_Platform
 * @subpackage Wcmvp_Multivendor_Platform/includes
 * @author     CodexInfra <developers@codexinfra.com>
 */
class Wcmvp_Multivendor_Platform_Loader {

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $wcmvp_actions    The actions registered with WordPress to fire when the plugin loads.
	 */
	protected $wcmvp_actions;

	/**
	 * The array of filters registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $wcmvp_filters    The filters registered with WordPress to fire when the plugin loads.
	 */
	protected $wcmvp_filters;

	/**
	 * Initialize the collections used to maintain the actions and filters.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->wcmvp_actions = array();
		$this->wcmvp_filters = array();

	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $wcmvp_hook             The name of the WordPress action that is being registered.
	 * @param    object               $wcmvp_component        A reference to the instance of the object on which the action is defined.
	 * @param    string               $wcmvp_callback         The name of the function definition on the $wcmvp_component.
	 * @param    int                  $wcmvp_priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $wcmvp_accepted_args    Optional. The number of arguments that should be passed to the $wcmvp_callback. Default is 1.
	 */
	public function wcmvp_add_action( $wcmvp_hook, $wcmvp_component, $wcmvp_callback, $wcmvp_priority = 10, $wcmvp_accepted_args = 1 ) {
		$this->wcmvp_actions = $this->wcmvp_add( $this->wcmvp_actions, $wcmvp_hook, $wcmvp_component, $wcmvp_callback, $wcmvp_priority, $wcmvp_accepted_args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 * 
	 * @since    1.0.0
	 * @param    string               $wcmvp_hook             The name of the WordPress filter that is being registered.
	 * @param    object               $wcmvp_component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $wcmvp_callback         The name of the function definition on the $wcmvp_component.
	 * @param    int                  $wcmvp_priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $wcmvp_accepted_args    Optional. The number of arguments that should be passed to the $wcmvp_callback. Default is 1
	 */
	public function wcmvp_add_filter( $wcmvp_hook, $wcmvp_component, $wcmvp_callback, $wcmvp_priority = 10, $wcmvp_accepted_args = 1 ) {
		$this->wcmvp_filters = $this->wcmvp_add( $this->wcmvp_filters, $wcmvp_hook, $wcmvp_component, $wcmvp_callback, $wcmvp_priority, $wcmvp_accepted_args );
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single
	 * collection.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param    array                $wcmvp_hooks            The collection of hooks that is being registered (that is, actions or filters).
	 * @param    string               $wcmvp_hook             The name of the WordPress filter that is being registered.
	 * @param    object               $wcmvp_component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $wcmvp_callback         The name of the function definition on the $component.
	 * @param    int                  $wcmvp_priority         The priority at which the function should be fired.
	 * @param    int                  $wcmvp_accepted_args    The number of arguments that should be passed to the $wcmvp_callback.
	 * @return   array                                  The collection of actions and filters registered with WordPress.
	 */
	private function wcmvp_add( $wcmvp_hooks, $wcmvp_hook, $wcmvp_component, $wcmvp_callback, $wcmvp_priority, $wcmvp_accepted_args ) {

		$wcmvp_hooks[] = array(
			'hook'          => $wcmvp_hook,
			'component'     => $wcmvp_component,
			'callback'      => $wcmvp_callback,
			'priority'      => $wcmvp_priority,
			'accepted_args' => $wcmvp_accepted_args
		);

		return $wcmvp_hooks;

	}

	/**
	 * Register the filters and actions with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function wcmvp_run() {

		foreach ( $this->wcmvp_filters as $wcmvp_hook ) {
			add_filter( $wcmvp_hook['hook'], array( $wcmvp_hook['component'], $wcmvp_hook['callback'] ), $wcmvp_hook['priority'], $wcmvp_hook['accepted_args'] );
		}

		foreach ( $this->wcmvp_actions as $wcmvp_hook ) {
			add_action( $wcmvp_hook['hook'], array( $wcmvp_hook['component'], $wcmvp_hook['callback'] ), $wcmvp_hook['priority'], $wcmvp_hook['accepted_args'] );
		}
		
	}

}
