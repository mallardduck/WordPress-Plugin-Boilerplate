<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.tld
 * @since      1.0.0
 *
 * @package    Wp_Plugin_Bp
 * @subpackage Wp_Plugin_Bp\Admin\Wp_Plugin_Bp_Admin
 */
 namespace Wp_Plugin_Bp\Admin;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Plugin_Bp
 * @subpackage Wp_Plugin_Bp\Admin\Wp_Plugin_Bp_Admin
 * @author     Your Name <email@example.tld>
 */
class Wp_Plugin_Bp_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

    /**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-plugin-bp-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-plugin-bp-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * Register the options page for the admin area.
     *
     * @since    1.0.0
     */
    public function register_admin_pages()
    {
        add_menu_page('WordPress Plugin Boilerplate', 'WordPress Plugin Boilerplate', 'manage_options', $this->plugin_name, [$this, 'main_options_page']);
        add_submenu_page($this->plugin_name, 'WordPress Plugin Boilerplate Subpage', 'Subpage Options', 'manage_options', $this->plugin_name."-subpage", [$this, 'options_sub_page']);
    }

    /**
     * Create the options page for the admin area.
     *
     * @since    1.0.0
     */
    public function main_options_page()
    {
        require __DIR__ . '/partials/'.$this->plugin_name.'-admin-display.php';
    }

    /**
    * Create the options page for the admin area.
    *
    * @since    1.0.0
    */
    public function options_sub_page()
    {
        require __DIR__ . '/partials/'.$this->plugin_name.'-admin-display.php';
    }

}
