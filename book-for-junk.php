<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://webmkit.com
 * @since             1.0.0
 * @package           Book_For_Junk
 *
 * @wordpress-plugin
 * Plugin Name:       Book for Junk
 * Plugin URI:        https://webmkit.com/mts_book_for_junk
 * Description:       Book for Junk is a versatile WordPress plugin designed to help you efficiently manage and organize your junk removal business. With features like automated booking systems, customizable service options, and easy client communication, you can streamline your operations and enhance customer satisfaction. Simplify your workflow and turn clutter into cash with Book for Junk!
 * Version:           1.0.0
 * Author:            Md. Masud Rana
 * Author URI:        https://webmkit.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       book-for-junk
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BOOK_FOR_JUNK_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-book-for-junk-activator.php
 */
function activate_book_for_junk() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-book-for-junk-activator.php';
	Book_For_Junk_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-book-for-junk-deactivator.php
 */
function deactivate_book_for_junk() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-book-for-junk-deactivator.php';
	Book_For_Junk_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_book_for_junk' );
register_deactivation_hook( __FILE__, 'deactivate_book_for_junk' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-book-for-junk.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_book_for_junk() {

	$plugin = new Book_For_Junk();
	$plugin->run();

}
run_book_for_junk();
