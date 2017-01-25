<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://symaticsolutions.com
 * @since             1.0.0
 * @package           Picsascii
 *
 * @wordpress-plugin
 * Plugin Name:       PicsAscii
 * Plugin URI:        http://lab.symaticsolutions.com/wordpress/plugins/picsascii
 * Description:       This plugin converts images to their ASCII representation. Useful for quick conversion for ASCII profile images.
 * Version:           1.0.0
 * Author:            Symatic Solutions
 * Author URI:        http://symaticsolutions.com
 * Auther Email:	  info@symaticsolutions.com
 * Auther Skype:	  symatic.solutions
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       picsascii
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-picsascii-activator.php
 */
function activate_picsascii() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-picsascii-activator.php';
	Picsascii_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-picsascii-deactivator.php
 */
function deactivate_picsascii() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-picsascii-deactivator.php';
	Picsascii_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_picsascii' );
register_deactivation_hook( __FILE__, 'deactivate_picsascii' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-picsascii.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_picsascii() {

	$plugin = new Picsascii();
	$plugin->run();

}

run_picsascii();