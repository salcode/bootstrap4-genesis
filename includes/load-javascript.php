<?php
/**
 * Load JavaScript.
 *
 * @package bootstrap4genesis
 */

add_action( 'genesis_setup', 'bs4g_load_lib_files', 15 );
add_action( 'wp_enqueue_scripts', 'bs4g_enqueue_js' );

function bs4g_enqueue_js() {
	$version = wp_get_theme()->Version;

	// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
	// NOTE: this combined script is loading in the footer.
	wp_enqueue_script(
		'bs4g_js',
		get_stylesheet_directory_uri() . '/js/javascript.min.js',
		array( 'jquery' ),
		$version,
		true // Load in footer.
	);
}
