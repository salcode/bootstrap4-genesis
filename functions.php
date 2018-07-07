<?php
/**
 * Bootstrap4 Genesis
 *
 * @package bootstrap4genesis
 */

add_action( 'genesis_setup', 'bs4g_load_lib_files', 15 );

/**
 * Load Files from /lib directory.
 */
function bs4g_load_lib_files() {
	foreach ( glob( dirname( __FILE__ ) . '/lib/*.php' ) as $file ) {
		include $file;
	}
}
