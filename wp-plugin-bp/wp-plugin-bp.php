<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.tld
 * @since             1.0.0
 * @package           Wp_Plugin_Bp
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Plugin Boilerplate
 * Plugin URI:        https://wordpress.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.tld/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-plugin-bp
 * Domain Path:       /languages
 */
namespace Wp_Plugin_Bp;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Include the autoloader so we can dynamically include the rest of the classes.
require_once(trailingslashit(dirname(__FILE__)) . 'includes/autoloader.php');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-plugin-bp-activator.php
 */
function activate_wp_plugin_bp() {
	Lib\Wp_Plugin_Bp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-plugin-bp-deactivator.php
 */
function deactivate_wp_plugin_bp() {
	Lib\Wp_Plugin_Bp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, __NAMESPACE__ . '\\activate_wp_plugin_bp' );
register_deactivation_hook( __FILE__, __NAMESPACE__ . '\\deactivate_wp_plugin_bp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
add_action('plugins_loaded', __NAMESPACE__ . '\\run_plugin_name');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_name() {

	$plugin = new Lib\Wp_Plugin_Bp();
	$plugin->run();

}
