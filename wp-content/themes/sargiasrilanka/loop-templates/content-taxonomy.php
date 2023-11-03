<?php

/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// Get the custom image ID saved in the custom metabox
$tour_info_meta = get_post_meta($post->ID, 'tour_days', true);
// var_dump($tour_info_meta);
?>

<div <?php post_class('content-loader'); ?>>
	<div class="feature-comparison__list">
		<a href="<?php echo get_permalink($post->ID); ?>" class="feature-comparison__link">
			<div class="feature-comparison__img">
				<div class="feature-comparison__img_bg" style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>)"></div>
			</div>
			<div class="featured-comparison__content">
				<div class="featured-comparison__details">
					<div class="featured-comparison__title">
						<?php
						the_title(
							'<h3 class="entry-title">',
							'</h3>'
						);
						?>

						<div class="d-md-none">
							<p class="featured-comparison__tags">
								<?php
								$terms = get_the_terms(get_the_ID(), 'tours-by-interest');

								if ($terms && !is_wp_error($terms)) :

									$tours_by_interest = array();

									foreach ($terms as  $index => $term) {
										echo $term->name;
										if ($index < count($terms) - 1) {
											echo "<span class='divider--grey'> — </span>";
										}
									}
								endif;
								?>

							</p>
						</div>
					</div>

					<?php

					if (!empty($tour_info_meta) && isset($tour_info_meta['map_image_id'])) {
						$map_image_id = $tour_info_meta['map_image_id'];
						// Retrieve the image URL using the custom image ID
						$image_url = wp_get_attachment_url($map_image_id);
					?>
						<div class="featured-comparison__map" aria-hidden="true">

							<img src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>">
						</div>
					<?php }




					if (!empty($tour_info_meta)) :

						$terms_tours_by_interest = get_terms(array(
							'taxonomy'   => 'tours-by-interest',
							'hide_empty' => false,
						));

					?>
						<div class="d-none d-md-block w-100">
							<p class="featured-comparison__tags">
								<?php
								$terms = get_the_terms(get_the_ID(), 'tours-by-interest');

								if ($terms && !is_wp_error($terms)) :

									$tours_by_interest = array();

									foreach ($terms as  $index => $term) {
										echo $term->name;
										if ($index < count($terms) - 1) {
											echo "<span class='divider--grey'> — </span>";
										}
									}
								endif;
								?>

							</p>
						</div>


						<div class="featured-comparison__meta">
							<p class="featured-comparison__meta__length">
								<?php
								if (isset($tour_info_meta['total_days'])) {
									echo $tour_info_meta['total_days'] . ' Days <span class="divider--grey">—</span>';
								}
								if (isset($tour_info_meta['total_disatance'])) {
									echo '<span class="featured-comparison__meta__length--lower-case">' . $tour_info_meta['total_disatance'] . ' km</span>';
								}

								?>

							</p>
							<?php
							if (isset($tour_info_meta["total_stops"])) {
								$total_stops_array = explode(",", $tour_info_meta["total_stops"]);
							?>
								<p class="featured-comparison__meta__location">
									<?php foreach ($total_stops_array as $index => $stop) {

										echo 	$stop;
										// Check if it's not the last stop
										if ($index < count($total_stops_array) - 1) {
											echo "<span class='divider--grey'> &gt; </span>";
										}
									} ?>

								</p>
							<?php } ?>
						</div>
					<?php endif; ?>
					<div class="featured-comparison__description-container">
						<p class="feature-comparison__description">
							<?php echo wp_strip_all_tags(get_the_excerpt()); ?>
						</p>
					</div>
				</div>
			</div>
		</a>
	</div>
</div>