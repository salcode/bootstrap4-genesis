<?php
/**
 * Remove unused Superfish JavaScript.
 *
 * @package bootstrap4genesis
 */

add_action( 'wp_enqueue_scripts', 'bs4g_remove_unused_js', 100 );

function bs4g_remove_unused_js() {
	wp_dequeue_script( 'superfish' );
	wp_dequeue_script( 'superfish-args' );
}
