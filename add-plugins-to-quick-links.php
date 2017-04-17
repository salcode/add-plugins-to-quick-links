<?php
/**
 * Plugin Name: Add Plugins to Quick Links
 * Plugin URI: https://salferrarello.com/add-plugins-to-quick-links-wordpress-plugin
 * Description: This plugin is a micro-optimization. When on a forward facing page (i.e. a non wp-admin page), it takes two page loads to get to the plugins page. This reduces it to one.
 * Version: 0.10.0
 * Author: Sal Ferrarello
 * Author URI: https://salferrarello.com/
 * Text Domain: add-plugins-to-quick-links
 * Domain Path: /languages
 *
 * @package add-plugins-to-quick-links
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'wp_before_admin_bar_render', 'fe_add_plugins_to_quick_links' );

/**
 * Add Plugins link to WP Admin bar.
 *
 * @global $wp_admin_bar
 */
function fe_add_plugins_to_quick_links() {
	global $wp_admin_bar;

	if ( ! is_user_logged_in() || ! current_user_can( 'edit_plugins' ) ) {
		return;
	}

	$wp_admin_bar->add_menu( array(
		'parent' => 'site-name',
		'title'  => __( 'Plugins' ),
		'href'   => admin_url( 'plugins.php' ),
	) );
}
