<?php
/**
 * Move Nav inside Navbar.
 *
 * Move Primary nav from default position,
 * into navbar (.site-header).
 * @package bootstrap4genesis
 */

remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav' );
