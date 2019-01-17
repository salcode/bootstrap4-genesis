Bootstrap 4 Genesis
===================

WordPress [Genesis Child Theme](https://my.studiopress.com/themes/genesis/) using [Bootstrap 4](https://getbootstrap.com/docs/4.1/getting-started/introduction/).


## Build Process

This projects uses a build process to:

- convert Sass (`.scss`) into CSS
- combine and compress CSS files

### Initial Setup

Before using this project's build process for the first time you need to run

```
npm install
```

to install all of the necessary dependencies.

### Development

During development, you should run

```
npm run watch
```

which will watch for changes in the project and run the necessary build process steps when these changes occur.

#### LiveReload in Development

During development you can use the [LiveReload](http://livereload.com/) functionality to automatically reload your page when you make any changes to SCSS or JavaScript.

To enable this feature add the following to an **mu-plugin** (preferred) or in `functions.php`.

On my development sites, I add this code at `wp-content/mu-plugins/livereload.php`

```
<?php
/**
 * Add LiveReload snippet.
 *
 * For DEVELOPMENT only.
 */
add_action( 'genesis_after', function() {
	// phpcs:disable WordPress.WP.EnqueuedResources.NonEnqueuedScript
	echo '<script src="http://localhost:35729/livereload.js?snipver=1"></script>';
} );
```

### Build Process for Production

When you files are ready for deployment, you should run

```
npm run build
```

to build all the necessary files and compress them where approriate.

## Customization

### CSS

Do **not** modify `style.css`, this file is generated from the Sass files.
If you modify `style.css` and then run the build process, it will overwrite
`style.css` and you will lose your changes.

Instead, please make your changes to the Sass files (in `/sass`).

The primary entry point for Sass is `/sass/custom.scss` (which is set in
`Gulpfile.js`). All other Sass files are loaded from the `custom.scss` file.

Generally, adding new Sass files (e.g. `/sass/_footer.scss`) and then importing
that file in `custom.scss` is my preferred way to add new CSS.

```
@import "footer";
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
