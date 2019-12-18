<?php

/**
 * By: Symatic Solutions <info@symaticsolutions.com>
 * Date: 21/1/17
 * Time: 2:43 PM
 * Website: http://www.symaticsolutions.com
 * Skype: symatic.solutions
 *
 * Fired during plugin activation
 *
 * @link       http://symaticsolutions.com
 * @since      1.0.0
 *
 * @package    Picsascii
 * @subpackage Picsascii/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Picsascii
 * @subpackage Picsascii/includes
 * @author     Symatic Solutions <info@symaticsolutions.com>
 */
class Picsascii_Activator {

	/**
	 * Runs while activating a plugin and adds default settings value.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		add_option('picsascii_font_size_x', '4');
		add_option('picsascii_font_size_y', '2');
		add_option('picsascii_remove_image', '1');
	}
}