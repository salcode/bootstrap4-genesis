<?php
/**
 * ????
 *
 * @package bootstrap4genesis
 */

/**
 * Remove website description from header.
 */
add_filter( 'genesis_seo_description', '__return_null' );


add_filter( 'genesis_seo_title', function( $title, $inside, $wrap ) {

	// Update $inside to be image.
	$inside = sprintf( '<a href="%s">%s</a>',
		trailingslashit( home_url() ),
		apply_filters( 'bootstrap4_genesis_site_title_content', get_bloginfo( 'name' ) )
	);

	$title = genesis_markup( array(
		'open'    => sprintf( "<{$wrap} %s>", genesis_attr( 'site-title' ) ),
		'close'   => "</{$wrap}>",
		'content' => $inside,
		'context' => 'site-title',
		'echo'    => false,
		'params'  => array(
			'wrap' => $wrap,
		),
	) );

	return $title;
}, 10, 3 );
