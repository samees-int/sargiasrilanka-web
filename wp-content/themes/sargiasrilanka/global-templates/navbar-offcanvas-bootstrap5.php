<?php

/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 * @since 1.1.0
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('sargiasrilanka_container_type');
$class = "";
if (is_front_page() || is_page_template('page-templates/destinations.php') ) {
	$class = "fixed-top navbar-dark bg-home-gradient";
} else {
	$class = " navbar-light bg-black";
}
if (is_page_template('page-templates/fullwidthpage-white.php')) {
	$class = " navbar-white";
}
?>

<nav id="main-nav" class="navbar navbar-expand-md  <?php echo $class; ?>" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e('Main Navigation', 'sargiasrilanka'); ?>
	</h2>


	<div class="<?php echo esc_attr($container); ?>">

		<!-- Your site branding in the menu -->
		<?php get_template_part('global-templates/navbar-branding'); ?>

		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e('Open menu', 'sargiasrilanka'); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="navbarNavOffcanvas">

			<div class="offcanvas-header justify-content-end">
				<button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="<?php esc_attr_e('Close menu', 'sargiasrilanka'); ?>"></button>
			</div><!-- .offcancas-header -->

			<!-- The WordPress Menu goes here -->
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => 'offcanvas-body',
					'container_id'    => '',
					'menu_class'      => 'navbar-nav justify-content-end flex-grow-1',
					'fallback_cb'     => '',
					'menu_id'         => 'main-menu',
					'depth'           => 2,
					'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				)
			);
			?>
		</div><!-- .offcanvas -->

	</div><!-- .container(-fluid) -->

</nav><!-- #main-nav -->