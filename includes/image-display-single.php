<?php
/**
 * Display Featured Image on single posts (pages, and custom post types).
 *
 * @package bootstrap4genesis
 */
add_action( 'genesis_entry_header', 'bs4g_single_featured_image', 5 );

/**
 * Output Featured Image on single post (pages, and custom post types).
 */
function bs4g_single_featured_image() {
	if ( ! is_singular() ) {
		return;
	}

	if ( ! has_post_thumbnail() ) {
		return;
	}

	the_post_thumbnail(
		'post-thumbnail',
		array(
			'class' => 'img-fluid attachment-post-thumbnail size-post-thumbnail',
		)
	);

}
