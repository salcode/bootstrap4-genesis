<?php
/**
 * Move Featured Image on archive pages from
 * content to header.
 *
 * @package bootstrap4genesis
 */

remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 8 );
