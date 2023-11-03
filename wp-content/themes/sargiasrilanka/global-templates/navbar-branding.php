<?php

/**
 * Navbar branding
 *
 * @package Understrap
 * @since 1.2.0
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!has_custom_logo()) { ?>

	<?php if (is_front_page() && is_home()) : ?>

		<h1 class="navbar-brand mb-0">
			<a rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url">
				<?php bloginfo('name'); ?>
			</a>
		</h1>

	<?php else : ?>

		<a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url">
			<?php bloginfo('name'); ?>
		</a>

	<?php endif; ?>

<?php
} else {
	the_custom_logo('logo');

	echo get_secondary_logo();
	// // echo get_footer_logo();
	// $footer_logo = get_footer_logo();

	// if ($footer_logo) {
	// 	echo '<img src="' . esc_url($footer_logo) . '" alt="Footer Logo">';
	// }
	// echo $footer_logo = get_theme_mod('footer_logo', '');
	// $html = sprintf(
	// 	'<a href="%1$s" class="custom-logo-link" rel="home" >%2$s</a>',
	// 	esc_url(home_url('/')),
	// 	$footer_logo
	// );
	// echo $html;
?>
	<!-- <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand custom-logo-link">

	</a> -->

<?php
}
