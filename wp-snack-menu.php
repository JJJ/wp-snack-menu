<?php

/**
 * Plugin Name: WP Snack Menu
 * Plugin URI:  http://wordpress.org/extend/plugins/wp-snack-menu/
 * Description: Put the WordPress admin menu in your admin toolbar
 * Author:      John James Jacoby
 * Author URI:  http://jjj.me
 * Version:     1.1.0
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * WP Snack Menu
 *
 * @since 1.0.0
 *
 * @global array  $menu
 * @global array  $submenu
 * @global WP_Admin_Bar $wp_admin_bar
 *
 * @param array $args Custom menu arguments (title|href|parent|id|meta)
 */
function wp_snack_menu( $args = array() ) {

	// Easy showing and hiding of menus (based on user caps, etc...)
	if ( apply_filters( 'wp_snack_menu_bail', false ) ) {
		return;
	}

	// Globals
	global $menu, $submenu, $wp_admin_bar;

	// Include admin files
	require_once( ABSPATH . '/wp-admin/includes/update.php' );
	require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
	require_once( ABSPATH . '/wp-admin/menu.php' );

	// Allow special filtering of menus
	$snack_menu    = apply_filters( 'wp_snack_menu_top_level', $menu    );
	$snack_submenu = apply_filters( 'wp_snack_menu_sub_level', $submenu );

	// We have menus
	if ( empty( $snack_menu ) ) {
		return;
	}

	// Root level menu item
	$root = wp_parse_args( $args, array(
		'title'  => __( 'Snack Menu', 'wp-snack-menu' ),
		'href'   => admin_url(),
		'parent' => false,
		'id'     => 'snack-menu'
	) );

	// Add the top level menus
	$wp_admin_bar->add_menu( $root );

	// Loop through top level menus
	foreach ( $snack_menu as $top_level => $top_menu ) {

		// Item is not a separator
		if ( ! empty( $top_menu[4] ) && ( 'wp-menu-separator' !== $top_menu[4] ) ) {

			// Add the root level menus
			$wp_admin_bar->add_menu( array(
				'title'  => strip_tags( $top_menu[0] ),
				'href'   => admin_url( $top_menu[2] ),
				'parent' => $root['id'],
				'id'     => sanitize_title( strtolower( $top_menu[2] ) )
			) );
		}
	}

	// We have sub menus
	if ( ! empty( $snack_submenu ) ) {

		// Loop through sub sections
		foreach ( $snack_submenu as $sub => $sub_menus ) {

			// Loop through single sub menus
			foreach ( $sub_menus as $sub2 => $single_sub ) {

				// Add the sub menus
				$wp_admin_bar->add_menu( array(
					'title'  => strip_tags( $single_sub[0] ),
					'href'   => admin_url( $single_sub[2] ),
					'parent' => sanitize_title( strtolower( $sub                  ) ),
					'id'     => sanitize_title( strtolower( $sub . $single_sub[0] ) )
				) );
			}
		}
	}
}
add_action( 'admin_bar_menu', 'wp_snack_menu', 100 );
