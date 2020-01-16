<?php
/**
 * Plugin Name: Atomicon Blocks
 * Plugin URI: https://leanderlindahl.se
 * Description: This is a plugin demonstrating how to register new blocks for the Gutenberg editor.
 * Version: 1.0
 * Author: Leander Lindahl <leander@leanderlindahl.se>
 *
 * @package atomicon-blocks
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook translations into init
 */
add_action( 'init', 'atomicon_blocks_load_textdomain' );

/**
 * Load all translations from the MO file.
 */
function atomicon_blocks_load_textdomain() {
	load_plugin_textdomain( 'atomicon-blocks', false, basename( __DIR__ ) . '/languages' );
}

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in the corresponding context.
 *
 * Passes translations to JavaScript.
 */
function atomicon_blocks_register_block() {
	// Automatically load dependencies and version.
	$asset_file = include plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

	wp_register_script(
		'atomicon-blocks',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);

	register_block_type( 'atomicon-blocks/atomicon-1', array( 'editor_script' => 'atomicon-blocks' ) );

	if ( function_exists( 'wp_set_script_translations' ) ) {
		wp_set_script_translations( 'atomicon-blocks', 'atomicon-blocks' );
	}
}
add_action( 'init', 'atomicon_blocks_register_block' );
