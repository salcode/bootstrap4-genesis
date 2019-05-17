<?php
/**
 * Add Searchbox to Primary nav using bs4g_genesis_do_nav_content filter.
 *
 * @package bootstrap4genesis
 */

add_filter( 'bs4g_genesis_do_nav_content', function( $nav, $args ) {
	return $nav .
		'<form role="search" method="get" class="search-form form-inline my-2 my-md-0" action="' . esc_url( home_url( '/' ) ) . '">
			<label>
				<span class="screen-reader-text">' . _x( 'Search for:', 'label' ) . '</span>
				<input type="search" class="form-control search-field" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder' ) . '" value="' . get_search_query() . '" name="s" />
			</label>
			<input type="submit" class="screen-reader-text search-submit btn btn-primary" value="' . esc_attr_x( 'Search', 'submit button' ) . '" />
		</form>';
}, 20, 2 );
