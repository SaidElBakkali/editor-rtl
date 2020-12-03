<?php
/**
 * Plugin's functions file.
 *
 * @package Editor_RTL_Fixes
 * @author Said El Bakkali <contact@saidelbakkali.com>
 * @license GPL-2.0-or-later
 * @since 1.0.0
 */

if ( ! defined( 'WPINC' ) ) {
	exit; // Exit if accessed directly.
}

// Enqueue block editor RTL style.
add_action(
	'enqueue_block_editor_assets',
	function () {

		if ( ! is_rtl() ) {
			return;
		}

		wp_enqueue_style( 'editor-rtl-fixes', EDTOR_RTL_FIXES_URL . 'assets/css/style.css', array(), EDTOR_RTL_FIXES_VERSION );
	}
);
