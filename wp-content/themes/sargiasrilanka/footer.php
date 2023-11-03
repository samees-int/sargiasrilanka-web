<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('sargiasrilanka_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="d-none">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						<?php sargiasrilanka_site_info(); ?>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!-- col -->
			<div class="col-md-3">
				<div class="footer__utilities">
					<dl class="footer__utilities-item">
						<dt class="footer__utilities-title">
							Find us on
						</dt>
						<dd class="footer__utilities__content">
							<ul class="footer__utilities__list">
								<li class="footer__utilities__item">
									<a href="facebook.com">
										<i class="fa fa-facebook"></i> Facebook
									</a>
								</li>
								<li class="footer__utilities__item">
									<a href="facebook.com">
										<i class="fa fa-twitter"></i> Twitter
									</a>
								</li>
								<li class="footer__utilities__item">
									<a href="facebook.com">
										<i class="fa fa-instagram"></i> Instagram
									</a>
								</li>
								<li class="footer__utilities__item">
									<a href="facebook.com">
										<i class="fa fa-youtube"></i> Youtube
									</a>
								</li>
							</ul>
						</dd>
					</dl>
				</div>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-3"></div>
			<div class="col-md-3">

			</div>

		</div><!-- .row -->
		<div class="row">

		</div>
	</div><!-- .container(-fluid) -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<header>
						<?php
						$footer_logo = get_theme_mod('footer_logo');
						if (!empty($footer_logo)) {
							echo '<img src="' . esc_url($footer_logo) . '" alt="Footer Logo" class="footer-logo">';
						}
						$site_title = get_bloginfo('description');
						if (!empty($site_title)) {
						?>
							<p>"<?php echo $site_title = get_bloginfo('description'); ?>"</p>
						<?php }

						$facebook_link = get_theme_mod('facebook_link', '');
						$twitter_link = get_theme_mod('twitter_link', '');
						$instagram_link = get_theme_mod('instagram_link', '');

						// Define an array of social media links and their corresponding icon classes
						$social_links = array(
							'facebook_link' => 'fa-facebook',
							'instagram_link' => 'fa-instagram',
							'twitter_link' => 'fa-twitter',
							'youtube_link' => 'fa-youtube', // Assuming you have a YouTube link setting
						);
						?>

						<ul class='icons'>
							<?php
							foreach ($social_links as $link_setting => $icon_class) {
								$link = get_theme_mod($link_setting, ''); // Get the link based on the setting
								if (!empty($link)) {
									echo '<li>';
									echo '<a href="' . esc_url($link) . '" target="_blank"><i class="icon fa ' . esc_attr($icon_class) . '" name="logo-' . esc_attr($link_setting) . '"></i></a>';
									echo '</li>';
								}
							}

							?>
						</ul>
					</header>
				</div>
				<div class="col-md-8">
					<aside>
						<ul class='category'>
							<li>
								<h3>Project</h3>
							</li>
							<li>Houses</li>
							<li>Rooms</li>
							<li>Flats</li>
							<li>Apartments</li>
						</ul>
						<ul class='category'>
							<li>
								<h3>Company</h3>
							</li>
							<li>Objective</li>
							<li>Capital</li>
							<li>Security</li>
							<li>Selling</li>
						</ul>
						<ul class='category'>
							<li>
								<h3>Movement</h3>
							</li>
							<li>Movement</li>
							<li>Support us</li>
							<li>Pricing</li>
							<li>Renting</li>
						</ul>
						<ul class='category'>
							<li>
								<h3>Help</h3>
							</li>
							<li>Privacy</li>
							<li>Contact</li>
							<li>FAQs</li>
							<li>Blog</li>
						</ul>
					</aside>
				</div>
			</div>
		</div>


	</footer>

</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. 
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>