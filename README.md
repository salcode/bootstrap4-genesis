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
npm watch
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
npm build
```

to build all the necessary files and compress them where approriate.

## Customization

This is a starter theme which is meant to be modified.  As a Genesis child theme important updates should come at the parent theme level (as Genesis updates).

Nevertheless, there are times a modification makes sense via a WordPress hook.

### Available Filters

#### bootstrap4_genesis_css_mapping

The `bootstrap4_genesis_css_mapping` is a key/value array where each key is a Genesis **context** and the value is a string containing the class that should be added to the context (multiple classes can be added by providing a string of the classes, where each class is separated by a space).
