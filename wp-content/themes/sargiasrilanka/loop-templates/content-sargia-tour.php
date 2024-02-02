<?php

/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$container = get_theme_mod('sargiasrilanka_container_type');
$post_img = get_the_post_thumbnail_url($post->ID, 'full');
$get_meta_val = get_post_meta($post->ID);
$tour_info_meta = get_post_meta($post->ID, 'tour_days', true);

?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="tour_img-wrapper" style="background-image:url(<?php echo $post_img ?>);">
		<div class="<?php echo $container; ?> tour_single_title">
			<div class="row">
				<div class="col-md-6">
					<?php the_title('<h1 class="tour_entry-title">', '</h1>'); ?>
				</div>
			</div>
		</div>

	</div>
	<div class="tour_main-content">
		<div class="<?php echo $container; ?>">
			<div class="roW">
				<div class="col-12">
					<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
						<ol class="breadcrumb mb-4">
							<li class="breadcrumb-item  text-light"><a class="text-white" href="<?php echo home_url(); ?>">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title(); ?></li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row">
				<?php
				$tour_days = !empty($tour_info_meta['total_days']) ? $tour_info_meta['total_days'] . ' Days' : '';
				$tour_distance = !empty($tour_info_meta['total_disatance']) ? $tour_info_meta['total_disatance'] . ' km' : '';

				if (!empty($tour_days) || !empty($tour_distance)) {

				?>
					<div class="col-md-4 border-end">

						<?php
						if (!empty($tour_days)) {
							echo '<p class="tour_meta_total_days">' . esc_html($tour_days) . '</p>';
						}
						if (!empty($tour_distance)) {
							echo '<p class="tour_meta_total_disatance">' . esc_html($tour_distance) . '</p>';
						}
						?>

					</div>
				<?php  } ?>
				<div class="col-md-4">
					<?php
					$tour_highlight_value = get_post_meta(get_the_ID(), '_tour_highlight_content', true);
					if (!empty($tour_highlight_value)) {
						echo $tour_highlight_value;
					}
					?>
				</div>
				<div class="col-md-4  text-end">
					<?php
					$tour_map_image_id = $tour_info_meta['map_image_id'];
					$tour_map_image_url = !empty($tour_map_image_id) ? (wp_get_attachment_image_url($tour_map_image_id, 'medium')) : '';
					// $tour_highlight_value = get_post_meta(get_the_ID(), '_tour_highlight_content', true);
					if (!empty($tour_map_image_id)) {
					?>
						<img src=<?php echo esc_url($tour_map_image_url); ?> />
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="<?php echo $container; ?>">
			<div class="row">

				<div class="col-md-12">
					<div class="tour-content mt-3">
						<?php
						the_content();
						sargiasrilanka_link_pages();
						?>
					</div>
				</div>

				<div class="col-md-6 mt-2">
					<?php
					$tour_pkgIncludes_value = get_post_meta(get_the_ID(), '_tour_pkgIncludes_content', true);
					if (!empty($tour_pkgIncludes_value)) {
						echo "<h4 class='pkgIncludes__title'>Package Includes</h4>";
						echo "<div class='pkgIncludes--content'>" . $tour_pkgIncludes_value . "</div>";
					}
					?>
				</div>
				<div class="col-md-6 mt-2">
					<?php
					$tour_pkgExcludes_value = get_post_meta(get_the_ID(), '_tour_pkgExcludes_content', true);
					if (!empty($tour_pkgExcludes_value)) {
						echo "<h4 class='pkgExcludes__title'>Package Excludes</h4>";
						echo "<div class='pkgIncludes--content'>" . $tour_pkgExcludes_value . "</div>";
					}
					?>
				</div>

			</div>
		</div>
	</div>
	<?php if (isset($tour_info_meta['repeater'])) { ?>
		<div class="tour-itineraries mb-4">
			<?php foreach ($tour_info_meta['repeater'] as $index => $tour_itineraries_item) {
				// var_dump($tour_itineraries_item);
			?>
				<div class="tour-itineraries__item">
					<div class="<?php echo $container; ?>">
						<div class="row">

							<div class="col-md-8 mx-auto">
								<h2 class="tour-itineraries__title">
									<?php
									echo isset($tour_itineraries_item['tour_itineraies_item_title']) ? $tour_itineraries_item['tour_itineraies_item_title'] : '';
									?>
								</h2>
							</div>
							<div class="col-md-8 <?php echo ($index % 2 == 0) ? "mx-auto" : ''; ?>">

								<?php
								if (!empty($tour_itineraries_item["tour_itineraries_date_image"])) {
								?>
									<div class="tour-itineraries-item__imgas">
										<!-- Carousel -->
										<div id="carousel_<?php echo $index; ?>" class="carousel slide carousel-fade" data-bs-ride="carousel">
											<!-- The slideshow/carousel -->
											<div class="carousel-inner">
												<?php
												$image_ids =  explode(",", $tour_itineraries_item['tour_itineraries_date_image']);

												foreach ($image_ids as $i => $image_id) {

													$img_url = wp_get_attachment_image_url($image_id, 'full');
													if ($img_url) {
														echo "<div class='carousel-item " . ($i == 0 ? "active" : '') . "'>";
														echo "<img src=\"$img_url\" class=\"d-block w-100\">";
														echo "</div>";
													}
												}
												// $image_url = !empty($tour_meta["tour_itineraries_date_image"]) ? (wp_get_attachment_image_url($tour_meta["tour_itineraries_date_image"], 'medium')) : '';
												?>
											</div>
											<!-- Left and right controls/icons -->
											<button class="carousel-control-prev" type="button" data-bs-target="#carousel_<?php echo $index; ?>" data-bs-slide="prev">
												<span class="carousel-control-prev-icon"></span>
											</button>
											<button class="carousel-control-next" type="button" data-bs-target="#carousel_<?php echo $index; ?>" data-bs-slide="next">
												<span class="carousel-control-next-icon"></span>
											</button>
										</div>
									</div>
								<?php
								}

								?>


								<div class="px-3 border-start tour-itineraries-item__highlights">
									<div class="col-md-8">
										<?php

										echo isset($tour_itineraries_item['tour_itineraries_date_heightlight']) ? $tour_itineraries_item['tour_itineraries_date_heightlight'] : '';
										?>
									</div>
								</div>
							</div>
							<div class="col-md-8 mx-auto">
								<div class="tour-itineraries__content">
									<?php
									echo isset($tour_itineraries_item['tour_itineraries_date_content']) ? $tour_itineraries_item['tour_itineraries_date_content'] : '';
									?>

								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>

		</div>
	<?php  } ?>
</div>