<?php
/*
 * Plugin Name: Add Plugins to Quick Links
 * Plugin URI: 
 * Description: Adds plugins to the Quick Links on the public facing admin bar for users with the ability to view the plugins screen
 * Version: 0.9.0
 * Author: Sal Ferrarello
 * Author URI: http://salferrarello.com/
 * Text Domain: add-plugins-to-quick-links
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

add_action( 'wp_before_admin_bar_render', 'fe_add_plugins_to_quick_links' );

function fe_add_plugins_to_quick_links() {
	global $wp_admin_bar;

	if ( 
		is_admin() ||
		!current_user_can( 'edit_plugins' )
	) {
		return;
	}

	$wp_admin_bar->add_menu( array(
		'parent' => 'site-name',
		'title'   => __('Plugins'),
		'href'  => admin_url( 'plugins.php' ),
	) );

}
