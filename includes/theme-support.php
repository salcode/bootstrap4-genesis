<?php
/**
 * Add Genesis Theme Support configuration
 *
 * @package bootstrap4genesis
 */

/**
 * 'html5': Use HTML5 markup.
 */
add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form' ] );


/**
 * Add responsive viewport meta tag.
 */
add_theme_support( 'genesis-responsive-viewport' );


/**
 * Add Genesis accessiblity features.
 *
 * @see https://genesis-accessible.org/
 */
add_theme_support(
	'genesis-accessibility',
	array(
		'404-page',
		'headings',
		'rems',
		'search-form',
		'skip-links',
	)
);


/**
 * 'menus": Add Theme Support for Genesis Menus.
 */
add_theme_support( 'genesis-menus', array(
	'primary' => __( 'Primary Navigation Menu', 'bootstrap4-genesis' ),
	// 'secondary' => __( 'Secondary Navigation Menu', 'bootstrap4-genesis' ),
	// 'header'    => __( 'Header Navigation Menu', 'bootstrap4-genesis' ),
) );


/**
 * 'structural-wraps': Add Theme Support for Genesis Structural Wraps.
 *
 * Missing (commented out) entries, remove theme support.
 *
 * @see https://my.studiopress.com/documentation/snippets/structural-wraps/add-structural-wraps/
 */
add_theme_support( 'genesis-structural-wraps', array(
	// 'header',
	// 'menu-primary',
	// 'menu-secondary',
	// 'site-inner',
	// 'footer-widgets',
	// 'footer'
) );


/**
 * 'after-entry-widget-area': Add Theme Support for Genesis Widget Area.
 *
 * @see https://sridharkatakam.com/display-entry-widget-area-pages-genesis/
 */
// add_theme_support( 'genesis-after-entry-widget-area' );


/**
 * 'footer-widgets': Add support for a given number of footer widgets.
 */
// add_theme_support( 'genesis-footer-widgets', 4 );


/** 'custom-header': Add support for a custom header.
 * While Genesis has their own ("custom-header" theme option, we're using
 * the WordPress Core functionality.
 *
 * @see https://developer.wordpress.org/themes/functionality/custom-headers/
 */
// add_theme_support( 'custom-header', array(
// 	// Default Header Image to display
// 	'default-image'          => get_template_directory_uri() . '/images/headers/default.jpg',
// 	// Display the header text along with the image
// 	'header-text'            => false,
// 	// Header text color default
// 	'default-text-color'     => '000',
// 	// Header image width (in pixels)
// 	'width'                  => 1000,
// 	// Header image height (in pixels)
// 	'height'                 => 198,
// 	// Header image random rotation default
// 	'random-default'         => false,
// 	// Enable upload of image file in admin
// 	'uploads'                => false,
// 	// function to be called in theme head section
// 	// 'wp-head-callback'       => 'wphead_cb',
// 	//  function to be called in preview page head section
// 	// 'admin-head-callback'    => 'adminhead_cb',
// 	// function to produce preview markup in the admin screen
// 	// 'admin-preview-callback' => 'adminpreview_cb',
// ));


/**
 * 'style-selector': Add support for choosing from multiple color palettes.
 *
 * @see https://scottdeluzio.com/add-custom-color-styles-genesis/
 */
// add_theme_support( 'genesis-style-selector', array(
// 	'theme-name-dark'    => __( 'Dark', 'bootstrap4-genesis' ),
// 	'theme-name-rainbox' => __( 'Rainbow', 'bootstrap4-genesis' ),
// ));


/**
 * 'admin-menu': Remove Genesis admin menu item in dashboard.
 */
// remove_theme_support( 'genesis-admin-menu' );
//


/**
 * 'archive-layouts': Remove Genesis Layout Settings from Archive settings.
 */
// remove_theme_support( 'genesis-archive-layouts' );


/**
 * 'import-export-menu': Remove Genesis admin menu item child "Import/Export".
 */
// remove_theme_support( 'genesis-import-export-menu' );


/**
 * 'inpost-layouts': Remove Genesis Layout Settings from Editor.
 */
// remove_theme_support( 'genesis-inpost-layouts' );


/**
 * 'seo-settings-menu': Remove Genesis admin menu item child "SEO Settings".
 */
// remove_theme_support( 'genesis-seo-settings-menu' );
