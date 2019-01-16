<?php
/**
 * Bootstrap 4 Nav Walker
 *
 * @author Sal Ferrarello (@salcode)
 * @url https://github.com/salcode/bootstrap4-genesis
 *
 * @package bootstrap4genesis
 */

class BS4G_Nav_Walker extends Walker_Nav_Menu {

	/**
	 * Starts the list before the elements are added.
	 *
	 * This is NOT called for the top level items, therefore
	 * we know this must be a Bootstrap dropdown menu.
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= $this->get_indent( $depth + 1, $args );
		/**
		 * Filters the CSS class(es) applied to a menu list element.
		 *
		 * @since WP Core 4.8.0
		 *
		 * @param array    $classes The CSS classes that are applied to the menu `<ul>` element.
		 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join(
			'',
			// nav_menu_submenu_css_class is a WordPress core filter.
			// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
			apply_filters( 'nav_menu_submenu_css_class', array( 'dropdown-menu' ), $args, $depth )
		);
		$output .= sprintf(
			'<div class="dropdown-menu" aria-labelledby="navbarDropdown">',
			esc_attr( $clas_names )
		);
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @see Walker::end_lvl()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= $this->get_indent( $depth + 1, $args );
		$output .= '</div>';
	}

	/**
	 * Start Element output.
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @param int      $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		if ( $depth > 1 ) {
			// Bootstrap 4 Nav does not support tertiary nav items.
			return;
		}

		$output .= $this->get_indent( $depth * 2, $args );

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$has_children = in_array( 'menu-item-has-children', $item->classes, true );

		/**
		 * Filters the arguments for a single nav menu item.
		 *
		 * @since WP Core 4.4.0
		 *
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param WP_Post  $item  Menu item data object.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		// nav_menu_item_args is a WordPress core filter.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		if ( 0 === $depth ) {
			if ( $has_children ) {
				$classes[] = 'dropdown';
			}
			$classes[] = 'nav-item';
		}
		/**
		 * Filters the CSS class(es) applied to a menu item's list item element.
		 *
		 * @since WP Core 3.0.0
		 * @since WP Core 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array    $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param WP_Post  $item    The current menu item.
		 * @param stdClass $args    An object of wp_nav_menu() arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		// nav_menu_css_class is a WordPress core filter.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filters the ID applied to a menu item's list item element.
		 *
		 * @since WP Core 3.0.1
		 * @since WP Core 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param WP_Post  $item    The current menu item.
		 * @param stdClass $args    An object of wp_nav_menu() arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		// nav_menu_item_id is a WordPress core filter.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		if ( 0 === $depth ) {
			$output .= sprintf(
				'<li %s %s>',
				$id,
				$class_names
			);
		}

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']  = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href'] = ! empty( $item->url ) ? $item->url : '';
		$atts_classes = array();

		if ( 0 === $depth ) {
			$atts_classes[] = 'nav-link';
			if ( $has_children ) {
				$atts['data-toggle'] = 'dropdown';
				$atts['aria-haspopup'] = 'true';
				$atts['aria-expanded'] = 'false';
				$atts_classes[] = 'dropdown-toggle';
				// Bootstrap does not support toggle links with href values.
				$atts['href'] = '#';
			}
		} elseif ( 1 === $depth ) {
			$atts_classes[] = 'dropdown-item';
		}

		/**
		 * Filters the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since WP Core 3.6.0
		 * @since WP Core 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title  Title attribute.
		 *     @type string $target Target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param WP_Post  $item  The current menu item.
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		// nav_menu_link_attributes is a WordPress core filter.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		$attributes = ' class="' . esc_attr( join( ' ', $atts_classes ) ) . '" ' . $attributes;

		/** This filter is documented in wp-includes/post-template.php */
		// the_title is a WordPress core filter.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		/**
		 * Filters a menu item's title.
		 *
		 * @since WP Core 4.4.0
		 *
		 * @param string   $title The menu item's title.
		 * @param WP_Post  $item  The current menu item.
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		// nav_menu_item_title is a WordPress core filter.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		/**
		 * Filters a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since WP Core 3.0.0
		 *
		 * @param string   $item_output The menu item's starting HTML output.
		 * @param WP_Post  $item        Menu item data object.
		 * @param int      $depth       Depth of menu item. Used for padding.
		 * @param stdClass $args        An object of wp_nav_menu() arguments.
		 */
		// walker_nav_menu_start_el is a WordPress core filter.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @since WP Core 3.0.0
	 *
	 * @see Walker::end_el()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param WP_Post  $item   Page data object. Not used.
	 * @param int      $depth  Depth of page. Not Used.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	// phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.Found
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		if ( 0 === $depth ) {
			$output .= $this->get_indent( $depth * 2, $args ) . '</li>';
		}
	}

	/**
	 * Has indentation
	 *
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @return bool This Nav Menu should be indented.
	 */
	protected function has_indentation( $args ) {
		return ! ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing );
	}

	/**
	 * Get Indentation string
	 *
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @return string A string of tabs for the appropriate indentation.
	 */
	protected function get_indent( $depth, $args ) {
		if ( $this->has_indentation( $args ) ) {
			return "\n" . str_repeat( "\t", $depth + 1 );
		}
		return '';
	}
}
