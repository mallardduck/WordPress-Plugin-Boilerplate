<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       http://example.tld
 * @since      1.0.0
 *
 * @package    Wp_Plugin_Bp
 * @subpackage Wp_Plugin_Bp\Lib
 */
namespace Wp_Plugin_Bp\Lib;

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Wp_Plugin_Bp
 * @subpackage Wp_Plugin_Bp\Lib
 * @author     Your Name <email@example.tld>
 */
class Wp_Plugin_Bp_Loader {

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $actions    The actions registered with WordPress to fire when the plugin loads.
	 */
	protected $actions;

	/**
	 * The array of filters registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $filters    The filters registered with WordPress to fire when the plugin loads.
	 */
	protected $filters;

	/**
	 *
	 * @since 1.0.0
	 * @access private
	 * @var object|\Wp_Plugin_Bp\Lib\Wp_Plugin_Bp_Loader
	 */
	private static $instance;

	/**
	 * Initialize the collections used to maintain the actions and filters.
	 *
	 * @since    1.0.0
	 * @access private
	 */
	private function __construct() {

		$this->actions = array();
		$this->filters = array();

	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $hook             The name of the WordPress action that is being registered.
	 * @param    object               $component        A reference to the instance of the object on which the action is defined.
	 * @param    string               $callback         The name of the function definition on the $component.
	 * @param    int                  $priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1.
	 */
	public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $hook             The name of the WordPress filter that is being registered.
	 * @param    object               $component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $callback         The name of the function definition on the $component.
	 * @param    int                  $priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1
	 */
	public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single
	 * collection.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param    array                $hooks            The collection of hooks that is being registered (that is, actions or filters).
	 * @param    string               $hook             The name of the WordPress filter that is being registered.
	 * @param    object               $component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $callback         The name of the function definition on the $component.
	 * @param    int                  $priority         The priority at which the function should be fired.
	 * @param    int                  $accepted_args    The number of arguments that should be passed to the $callback.
	 * @return   array                                  The collection of actions and filters registered with WordPress.
	 */
	private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {
		$hooks[ $this->hook_index( $hook, $component, $callback ) ] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args
		);

		return $hooks;

	}

	/**
	 * Remove a hook.
	 *
	 * Hook must have been added by this class for this remover to work.
	 *
	 * Usage Plugin_Name_Loader::get_instance()->remove( $hook, $component, $callback );
	 *
	 * @since      1.0.0
	 * @param      string               $hook             The name of the WordPress filter that is being registered.
	 * @param      object               $component        A reference to the instance of the object on which the filter is defined.
	 * @param      string               $callback         The name of the function definition on the $component.
	 */
	public function remove( $hook, $component, $callback ) {
		$index = $this->hook_index( $hook, $component, $callback );
		if( isset( $this->filters[ $index ]  ) ) {
			remove_filter( $this->filters[ $index ][ 'hook' ],  array( $this->filters[ $index ][ 'component' ], $this->filters[ $index ][ 'callback' ] ) );
		}

		if( isset( $this->actions[ $index ] ) ) {
			remove_action( $this->filters[ $index ][ 'hook' ],  array( $this->filters[ $index ][ 'component' ], $this->filters[ $index ][ 'callback' ] ) );
		}
	}

	/**
	 * Utility function for indexing $this->hooks
	 *
	 * @since       1.0.0
	 * @access      protected
	 * @param      string               $hook             The name of the WordPress filter that is being registered.
	 * @param      object               $component        A reference to the instance of the object on which the filter is defined.
	 * @param      string               $callback         The name of the function definition on the $component.
	 *
	 * @return string
	 */
	protected function hook_index( $hook, $component, $callback ) {
		return md5( $hook . get_class( $component ) . $callback );
	}


	/**
	 * Register the filters and actions with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {

		foreach ( $this->filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}


	}

	/**
	 * Get an instance of this class
	 *
	 * @since 1.0.0
	 * @return object|\Wp_Plugin_Bp\Lib\Wp_Plugin_Bp_Loader
	 */
	public static function get_instance() {
		if( is_null( self::$instance ) ) {
			self::$instance = new Wp_Plugin_Bp_Loader();
		}

		return self::$instance;

	}

}
