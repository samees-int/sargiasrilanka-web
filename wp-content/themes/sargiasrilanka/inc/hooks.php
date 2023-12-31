<?php
/**
 * Custom hooks
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'sargiasrilanka_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function sargiasrilanka_site_info() {
		do_action( 'sargiasrilanka_site_info' );
	}
}

add_action( 'sargiasrilanka_site_info', 'sargiasrilanka_add_site_info' );
if ( ! function_exists( 'sargiasrilanka_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function sargiasrilanka_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'https://wordpress.org/', 'sargiasrilanka' ) ),
			sprintf(
				/* translators: WordPress */
				esc_html__( 'Proudly powered by %s', 'sargiasrilanka' ),
				'WordPress'
			),
			sprintf(
				/* translators: 1: Theme name, 2: Theme author */
				esc_html__( 'Theme: %1$s by %2$s.', 'sargiasrilanka' ),
				$the_theme->get( 'Name' ), // @phpstan-ignore-line -- theme exists
				'<a href="' . esc_url( __( 'https://sargiasrilanka.com', 'sargiasrilanka' ) ) . '">sargiasrilanka.com</a>'
			),
			sprintf(
				/* translators: Theme version */
				esc_html__( 'Version: %s', 'sargiasrilanka' ),
				$the_theme->get( 'Version' ) // @phpstan-ignore-line -- theme exists
			)
		);

		// Check if customizer site info has value.
		if ( get_theme_mod( 'sargiasrilanka_site_info_override' ) ) {
			$site_info = get_theme_mod( 'sargiasrilanka_site_info_override' );
		}

		echo apply_filters( 'sargiasrilanka_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
}
