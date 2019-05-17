<?php
/**
 * Nav use Custom Walker.
 *
 * @package bootstrap4genesis
 */

// filter menu args for bootstrap walker and other settings
add_filter( 'wp_nav_menu_args', 'bs4g_wp_nav_menu_args' );

function bs4g_wp_nav_menu_args( $args ) {
	if (
		'primary' === $args['theme_location']
		|| 'secondary' === $args['theme_location']
	) {
		$args['depth']  = 2;
		$args['before'] = '';
		$args['menu_class'] = 'navbar-nav mr-auto ' . $args['menu_class'];
		$args['walker'] = new BS4G_Nav_Walker();
	}
	return $args;
}
