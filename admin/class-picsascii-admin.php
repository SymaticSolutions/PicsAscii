<?php
/**
 * Plugin By: Symatic Solutions <info@symaticsolutions.com>
 * Date: 21/1/17
 * Time: 2:43 PM
 * Website: http://www.symaticsolutions.com
 * Skype: symatic.solutions
 *
 * The admin-specific functionality of the plugin.
 *
 * @link       http://symaticsolutions.com
 * @since      1.0.0
 *
 * @package    Picsascii
 * @subpackage Picsascii/admin
 *
 * Code By: Jason Page <pagetelegram@gmail.com>
 * Date: 20/1/17
 * Website: http://bondfires.cc
 */

/**
 * @package    Picsascii
 * @subpackage Picsascii/admin
 * @author     Symatic Solutions <info@symaticsolutions.com>
 */
class Picsascii_Admin {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		// load font awesome from cdn
		wp_enqueue_style( PICSASCII_NAME . "-fa", 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), PICSASCII_VERSION, 'all' );
	}

	/**
	 * Registers setting variables
	 *
	 * @since	1.0.0
	 */
	function register_setting(){
		register_setting( 'picsascii-settings-group', 'picsascii_font_size_x' );
		register_setting( 'picsascii-settings-group', 'picsascii_font_size_y' );
		register_setting( 'picsascii-settings-group', 'picsascii_remove_image' );
	}

	/**
	 * Add menu item to admin menu.
	 *
	 * @since	1.0.0
	 */
	function setup_menu(){
		add_menu_page( 'PicsAscii Page', 'PicsAscii', 'manage_options', 'picsascii', array($this, 'picsascii_settings_page') );
	}

	/**
	 * Settings page
	 *
	 * @since	1.0.0
	 */
	function picsascii_settings_page(){
		require_once PICSASCII_DIR_PATH . 'admin/partials/picsascii-admin-display.php';
	}
}