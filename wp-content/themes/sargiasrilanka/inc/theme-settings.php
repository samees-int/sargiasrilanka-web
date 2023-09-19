<?php
/**
 * Check and setup theme's default settings
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'sargiasrilanka_setup_theme_default_settings' ) ) {
	/**
	 * Store default theme settings in database.
	 */
	function sargiasrilanka_setup_theme_default_settings() {
		$defaults = sargiasrilanka_get_theme_default_settings();
		$settings = get_theme_mods();
		foreach ( $defaults as $setting_id => $default_value ) {
			// Check if setting is set, if not set it to its default value.
			if ( ! isset( $settings[ $setting_id ] ) ) {
				set_theme_mod( $setting_id, $default_value );
			}
		}
	}
}

if ( ! function_exists( 'sargiasrilanka_get_theme_default_settings' ) ) {
	/**
	 * Retrieve default theme settings.
	 *
	 * @return array
	 */
	function sargiasrilanka_get_theme_default_settings() {
		$defaults = array(
			'sargiasrilanka_posts_index_style' => 'default',   // Latest blog posts style.
			'sargiasrilanka_sidebar_position'  => 'right',     // Sidebar position.
			'sargiasrilanka_container_type'    => 'container', // Container width.
		);

		/**
		 * Filters the default theme settings.
		 *
		 * @param array $defaults Array of default theme settings.
		 */
		return apply_filters( 'sargiasrilanka_theme_default_settings', $defaults );
	}
}
