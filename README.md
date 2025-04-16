Bootstrap 4 Genesis
===================

WordPress [Genesis Child Theme](https://my.studiopress.com/themes/genesis/) using [Bootstrap 4](https://getbootstrap.com/docs/4.1/getting-started/introduction/).


## Build Process

This project uses a build process to:

- convert Sass (`.scss`) into CSS and combine it into a single file (`style.css`)
- combine the JS files into a single file (`js/javascript.min.js`)

### Initial Setup

1. Make sure you're using the correct version of node (this is documented in `.nvmrc` for ease of use with the [nvm](https://github.com/nvm-sh/nvm) command)
2. Install the dependencies by running

```
npm install
```

### Development

During development, you should run

```
npm run build
```

which will generate updated versions of the new files.

## Customization

### PHP

Any PHP files added to the `includes/` directory, will be run on the `genesis_setup` action hook. Adding new files for each modification is a good way to keep your changes modular.

### CSS

Do **not** modify `style.css`, this file is generated from the Sass files.
If you modify `style.css` and then run the build process, it will overwrite
`style.css` and you will lose your changes.

Instead, please make your changes to the Sass files (in `/sass`).

The primary entry point for Sass is `/sass/custom.scss`. All other Sass files are loaded from the `custom.scss` file.

Generally, adding new Sass files (e.g. `/sass/_footer.scss`) and then importing
that file in `custom.scss` is my preferred way to add new CSS.

```
@import "footer";
```

### Add a Google Font

#### Load the Font

Add a file to the `includes/` directory, which will be automatically run (e.g. `includes/google-fonts.php`). The file should contain the code to enqueue the Google font, e.g.

```
<?php

add_action( 'wp_enqueue_scripts', 'my_bs4g_enqueue_fonts' );

function my_bs4g_enqueue_fonts() {
	wp_register_style(
		'open-sans-font',
		'https://fonts.googleapis.com/css?family=Open+Sans',
		array(),
		false,
		'all'
	);
	wp_enqueue_style( 'open-sans-font' );
}
```

#### Use the Font

Modify your CSS to use the new font, e.g. in `sass/_variables.scss`

```
$font-family-sans-serif: 'Open Sans', sans-serif;
```

### Available Custom WordPress Filters

This is a starter theme which is meant to be modified.  As a Genesis child theme important updates should come at the parent theme level (as Genesis updates).

Sometimes it is easier to make a modification via a WordPress hook then
modify Bootstrap 4 Genesis directly.

#### bootstrap4_genesis_css_mapping

The `bootstrap4_genesis_css_mapping` is a key/value array where each key is a Genesis **context** and the value is a string containing the class that should be added to the context (multiple classes can be added by providing a string of the classes, where each class is separated by a space).

#### bootstrap4_genesis_site_title_content

The `bootstrap4_genesis_site_title_content` is a string of the content displayed inside the site link found in the header (by default the content is the site title, i.e. `get_bloginfo( 'name' )`).

To replace the site title with an image.

```
<?php
/**
 * Replace Site Title Text with an Image
 * Bootstrap4 Genesis Modification
 *
 * Replace the site title in the header with an image.
 * https://github.com/salcode/bootstrap4-genesis
 */

add_filter( 'bootstrap4_genesis_site_title_content', function() {
	return '<img
		src="https://secure.gravatar.com/avatar/f7bea39ff77df472cc4e3c29e40d3e46?s=52&d=mm&r=g"
		alt="Sal Ferrarello">';
} );
```

#### bs4g_genesis_do_nav_content

The `bs4g_genesis_do_nav_content` is the `genesis_do_nav` content that appears between the opening and closing `<nav>` tags in the header. This is used internally (in `includes/nav-add-search-box.php`) to add our search field to the navbar.

## Departure from Bootstrap 4 Styles

Overall the goal of this project is to apply Bootstrap 4 styles to a Genesis child theme as a starting point for development. There are rare cases where the styles in this theme depart from the default Bootstrap 4 styles.

### Blockquotes

I find the [Bootstrap v4.x blockquote style](https://getbootstrap.com/docs/4.0/content/typography/#blockquotes) to blend in with the rest of the content too much. I have added a gray left border to blockquotes so they stand out more clearly. This is similar to the [Bootstrap v3.x blockquote style](https://getbootstrap.com/docs/3.3/css/#type-blockquotes).

### Inline Code and Code Blocks

I disagree with the choices made for the official [Bootstrap Code styles](https://getbootstrap.com/docs/4.2/content/code/) and therefore have modified these styles in this theme.
