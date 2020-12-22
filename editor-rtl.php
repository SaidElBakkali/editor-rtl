<?php
/**
 * Plugin Name:       Editor RTL Fixes
 *
 * @package           Editor_RTL
 * @author            Said El Bakkali <contact@saidelbakkali.com>
 * @license           GPLv3
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin URI:        https://github.com/SaidElBakkali/editor-rtl
 * Description:       This is a simple plugin that fixes some minor issues in certain blocks of the new block editor to improve the user experience on RTL sites.
 * Author:            Said El Bakkali
 * Author URI:        https://saidelbakkali.com/
 * Text Domain:       editor-rtl
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path:       /locales
 * Version:           1.0.2
 * Requires at least: 5.5
 * Requires PHP:      5.6
 */

if ( ! defined( 'WPINC' ) ) {
	exit; // Exit if accessed directly.
}

// Define plugin constants.
define( 'EDTOR_RTL_VERSION', '1.0.2' );
define( 'EDTOR_RTL_DIR', plugin_dir_path( __FILE__ ) );
define( 'EDTOR_RTL_URL', plugin_dir_url( __FILE__ ) );

// Load functions file.
require EDTOR_RTL_DIR . 'includes/functions.php';
