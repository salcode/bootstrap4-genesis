<?php
/**
 * Modify CSS classes.
 *
 * @package bootstrap4genesis
 */
add_filter( 'genesis_attr_site-header', 'bs4g_genesis_attr_css_modifications', 10, 3 );
add_filter( 'genesis_attr_title-area', 'bs4g_genesis_attr_css_modifications', 10, 3 );
add_filter( 'genesis_attr_site-inner', 'bs4g_genesis_attr_css_modifications', 10, 3 );
add_filter( 'genesis_attr_content-sidebar-wrap', 'bs4g_genesis_attr_css_modifications', 10, 3 );
add_filter( 'genesis_attr_content', 'bs4g_genesis_attr_css_modifications', 10, 3 );
add_filter( 'genesis_attr_sidebar-primary', 'bs4g_genesis_attr_css_modifications', 10, 3 );
add_filter( 'genesis_attr_entry', 'bs4g_genesis_attr_css_modifications', 10, 3 );
add_filter( 'genesis_attr_entry-header', 'bs4g_genesis_attr_css_modifications', 10, 3 );
add_filter( 'genesis_attr_entry-image', 'bs4g_genesis_attr_css_modifications', 10, 3 );
add_filter( 'genesis_attr_entry-title', 'bs4g_genesis_attr_css_modifications', 10, 3 );
add_filter( 'genesis_attr_entry-content', 'bs4g_genesis_attr_css_modifications', 10, 3 );
add_filter( 'genesis_attr_cpt-archive-description', 'bs4g_genesis_attr_css_modifications', 10, 3 );



/**
 * Modify Genesis Class Attributes.
 *
 * @param mixed[] $attr    Key/value array of attributes.
 * @param string  $context Context of the HTML element in question.
 * @param mixed[] $args    Configuration arguments.
 * @return mixed[] Updated $attr array with new class.
 */
function bs4g_genesis_attr_css_modifications( $attr, $context ) {
	$css_mapping = apply_filters( 'bootstrap4_genesis_css_mapping', array(
		// Context    => classname to add,
		'content' => '',
		'content-sidebar-wrap' => 'row justify-content-center',
		'entry' => 'pb-5 mb-5',
		'entry-title' => '',
		'entry-image' => 'img-fluid mb-3',
		'sidebar-primary' => '',
		'site-header' => 'navbar navbar-dark bg-dark navbar-expand-lg',
		'site-inner'  => 'container pt-3 pt-md-5',
		'title-area'  => 'navbar-brand',
	) );
	$attr['class'] .= ' ' . $css_mapping[ $context ] ?? '';
	return $attr;
}
