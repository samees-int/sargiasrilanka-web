<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
// 
$container = get_theme_mod('sargiasrilanka_container_type');

?>

<div class="wrapper pt-0 page-wrapper" id="page-wrapper">

	<div class="destination-heading">
		<div class="destination-bg-image text-center" style="background-image:url(<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>)">
			<div class="section__title">
				<span class="destination-heading--suburb">Destination</span>

				<?php
				the_title(
					sprintf('<h2 class="h1">', ''),
					'</h2>'
				);
				?>
			</div>
		</div>
	</div>

	<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

		<div class="row">
			<main class="site-main" id="main">

				<?php
				while (have_posts()) {
					the_post();
					get_template_part('loop-templates/content', 'page');

					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) {
						comments_template();
					}
				}
				?>

			</main>
		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
