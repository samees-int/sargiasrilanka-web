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

<section class="site-footer">
	<div class="<?php echo $container ?>">
		<div class="row">
			<div class="col-md-3 col-lg-4">
				<div class="site-footer__info">
					<div class="site-footer__logo">
						<?php
						$footer_logo = get_theme_mod('footer_logo');
						if (!empty($footer_logo)) {
							echo '<img src="' . esc_url($footer_logo) . '" alt="Footer Logo" class="footer-logo">';
						}
						?>
					</div>
					<div class="site-footer__address">
						24A, Uswatte Lane 2, Moratuwa 10400, Sri Lanka
					</div>
					<div class="site-footer__social">
						<?php
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
					</div>
				</div>
			</div>
			<div class="col-md-2 col-lg-2">
				<div class="site-footer__menu">
					<div class="site-footer__title">
						ITINERARIES
					</div>
					<ul class="site-footer__menu--items">
						<li class="site-footer__menu--item">
							<a href="">3-7 days</a>
						</li>
						<li class="site-footer__menu--item">
							<a href="">8-15 days</a>
						</li>
						<li class="site-footer__menu--item">
							<a href="">15+ days</a>
						</li>
						<li class="site-footer__menu--item">
							<a href="">North trips</a>
						</li>
						<li class="site-footer__menu--item">
							Down south trips
						</li>
						<li class="site-footer__menu--item">
							East coast trips
						</li>
						<li class="site-footer__menu--item">
							Central hills trips
						</li>
						<li class="site-footer__menu--item">
							Colombo & Western trips
						</li>

					</ul>
				</div>
			</div>
			<div class="col-md-2 col-lg-2">
				<div class="site-footer__menu">
					<div class="site-footer__title">
						DESTINATIONS
					</div>
					<ul class="site-footer__menu--items">
						<li class="site-footer__menu--item">
							Western
						</li>
						<li class="site-footer__menu--item">
							East coast
						</li>
						<li class="site-footer__menu--item">
							Down south
						</li>
						<li class="site-footer__menu--item">
							Central hills
						</li>
						<li class="site-footer__menu--item">
							Colombo & Western
						</li>
						<li class="site-footer__menu--item">
							North
						</li>

					</ul>
				</div>
			</div>
			<div class="col-md-5 col-lg-4">
				<div class="site-footer__contact-info">
					<?php
					// Get Address
					$address = get_theme_mod('site_address');

					// Get Email
					$email = get_theme_mod('site_email');

					// Get Phone Number
					$phone = get_theme_mod('site_phone');
					if (!empty($phone)) {
					?>
						<div class="site-footer__contct--mobile ">
							<div class="site-footer__title">
								CALL US
							</div>
							<div class="site-footer__tel">
								<a href="tel:<?php echo  esc_html($phone); ?>"><?php echo  esc_html($phone); ?></a>
							</div>
						</div>
					<?php }
					// Check if Email is not empty
					if (!empty($email)) {
					?>
						<div class="site-footer__contct--email">
							<div class="site-footer__title">
								EMAIL US
							</div>
							<div class="site-footer__email">
								<a href="mailto:<?php echo esc_html($email); ?>"><?php echo esc_html($email); ?></a>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>

	</div>
	<div class="copyright">
		<div class="copyright-info">
			Copyright © <?php echo date('Y'); ?> Developed By <a href="https://interlective.com/" target="_blank">Interlective</a>
		</div>
	</div>
</section>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>