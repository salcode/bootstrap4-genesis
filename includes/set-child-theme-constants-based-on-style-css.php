<?php
/**
 * Based on values defined in the header of style.css, define:
 * - CHILD_THEME_NAME    used in default footer
 * - CHILD_THEME_URL     used in default footer
 * - CHILD_THEME_VERSION used as `ver` URL param for style.css when loaded
 */

$bs4g_theme = wp_get_theme();
if ( ! $bs4g_theme->exists() ) {
	// Theme information does not exist. Exit early.
	return;
}

if ( ! defined( 'CHILD_THEME_NAME' ) ) {
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedConstantFound
	define( 'CHILD_THEME_NAME', $bs4g_theme->get( 'Name' ) );
}

if ( ! defined( 'CHILD_THEME_URL' ) ) {
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedConstantFound
	define( 'CHILD_THEME_URL', $bs4g_theme->get( 'ThemeURI' ) );
}

if ( ! defined( 'CHILD_THEME_VERSION' ) ) {
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedConstantFound
	define( 'CHILD_THEME_VERSION', $bs4g_theme->get( 'Version' ) );
}
