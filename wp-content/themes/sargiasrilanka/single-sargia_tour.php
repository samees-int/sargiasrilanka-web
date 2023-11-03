<?php

/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

?>

<div class="tour-single" id="single-wrapper">
	<div id="content" tabindex="-1">
		<?php
		while (have_posts()) {
			the_post();
			get_template_part('loop-templates/content', 'sargia-tour');
			sargiasrilanka_post_nav();

			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) {
				comments_template();
			}
		}
		?>
	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
