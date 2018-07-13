<?php
/**
 * Title Area Modifications.
 *
 * @package bootstrap4genesis
 */

/**
 * Remove site description from title area.
 */
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

/**
 * Replace site title with new markup.
 *
 * Includes filter 'bootstrap4_genesis_site_title_content',
 * which can be used to replace the title with an image.
 */
add_filter( 'genesis_seo_title', 'bs4g_genesis_seo_title' );

function bs4g_genesis_seo_title() {

	return genesis_markup( array(
		'open'    => sprintf(
			'<a href="%s" %s>',
			trailingslashit( home_url() ),
			genesis_attr( 'site-title' )
		),
		'close'   => '</a>',
		'content' => apply_filters( 'bootstrap4_genesis_site_title_content', get_bloginfo( 'name' ) ),
		'context' => 'site-title',
		'echo'    => false,
		'params'  => array(
			'wrap' => 'a',
		),
	) );
}
