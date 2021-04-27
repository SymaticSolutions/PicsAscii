<?php

/**
 *
 * @link              http://symaticsolutions.com
 * @since             1.0.0
 * @package           Picsascii
 *
 * @wordpress-plugin
 * Plugin Name:       PicsAscii
 * Plugin URI:        https://github.com/SymaticSolutions/PicsAscii
 * Description:       This plugin converts images to their ASCII representation. Useful for quick conversion for ASCII profile images.
 * Version:           1.0.1
 * Author:            Symatic Solutions
 * Author URI:        http://symaticsolutions.com
 * Auther Email:	  info@symaticsolutions.com
 * Auther Skype:	  symatic.solutions
 * License:           GPL-3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       picsascii
 * Domain Path:       /languages
 *
 * PicsAscii is distributed under the terms of the GNU GPL 3.0
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
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
