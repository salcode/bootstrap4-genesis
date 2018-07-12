<?php
/**
 * Modify CSS classes.
 *
 * @package bootstrap4genesis
 */
add_filter( 'genesis_attr_site-header', 'bs4g_genesis_attr_css_modifications', 10, 3 );

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
	) );
	$attr['class'] .= ' ' . $css_mapping[ $context ] ?? '';
	return $attr;
}
