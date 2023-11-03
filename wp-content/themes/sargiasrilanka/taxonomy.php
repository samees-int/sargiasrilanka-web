<?php

/**
 * The template for displaying archive pages
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('sargiasrilanka_container_type');
$current_taxonomy = get_queried_object();
?>

<div class="wrapper p-0 " id="archive-wrapper">
	<?php
	if (have_posts()) {
	?>
		<div class="tour-type-header bg-black text-light	">
			<div class="<?php echo esc_attr($container); ?>">
				<div class="row">
					<div class="col-md-12">

						<nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="/">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?php echo $current_taxonomy->name; ?></li>
							</ol>
						</nav>
					</div>
					<div class="col-md-12">

						<?php
						echo '<h1 class="itineraries--page-title text-uppercase">' . single_cat_title('', false) . ' itineraries
					  </h1>';

						the_archive_description('<div class="taxonomy-description">', '</div>');
						?>
					</div>
					<div class="col-md-12">
						<div class="d-flex flex-column flex-md-row itineraries__filter__container">
							<div class="itineraries__filter__intro intro">
								Refine your selection to find the perfect itinerary
							</div>

							<div class="itineraries-filters">
								<?php
								$taxonomy = 'tours-by-destination';  // Replace with your custom taxonomy slug
								$terms = get_terms(array(
									'taxonomy' => $taxonomy,
									'hide_empty' => false,  // Set to true to hide terms with no posts
								));
								// 
								if (!empty($terms) && !is_wp_error($terms)) {
								?>
									<div class="filters__option-set filters__option-set--small">
										<p class="mb-2">Destination</p>
										<?php

										// var_dump($terms);
										foreach ($terms as $term) {
										?>

										<?php }
										foreach ($terms as $term) {
										?> <div class="filters__option">
												<input type="checkbox" class="form-check-input" id="filter_<?php echo $term->slug; ?>" name="fav_language" value="<?php echo $term->name; ?>" data-taxonomy="<?php echo $taxonomy; ?>" <?php echo ($current_taxonomy->slug === $term->slug) ? "checked" : ""; ?>>
												<label for="filter_<?php echo $term->slug; ?>" class="form-check-label"><?php echo $term->name; ?></label>
											</div>
										<?php  } ?>

									</div>
								<?php }
								$taxonomy = 'tours-by-duration';  // Replace with your custom taxonomy slug
								$terms = get_terms(array(
									'taxonomy' => $taxonomy,
									'hide_empty' => false,  // Set to true to hide terms with no posts
								));

								if (!empty($terms) && !is_wp_error($terms)) {
								?>
									<div class="filters__option-set filters__option-set--small">
										<p class="mb-2">Duration</p>
										<?php
										foreach ($terms as $term) {
										?>
											<div class="filters__option">
												<input class="form-check-input" type="checkbox" name="filter_<?php echo $term->slug; ?>" id="filter_<?php echo $term->slug; ?>" <?php echo ($current_taxonomy->slug === $term->slug) ? "checked" : ""; ?> data-taxonomy="<?php echo $taxonomy; ?>">
												<label class="form-check-label" for="filter_<?php echo $term->slug; ?>">
													<?php echo $term->name; ?>
												</label>
											</div>
										<?php } ?>
									</div>
								<?php
								}
								$taxonomy = 'tours-by-interest';  // Replace with your custom taxonomy slug
								$terms = get_terms(array(
									'taxonomy' => $taxonomy,
									'hide_empty' => false,  // Set to true to hide terms with no posts
								));

								if (!empty($terms) && !is_wp_error($terms)) {
								?>

									<div class="filters__option-set">
										<p class="mb-2">Interests</p>
										<?php
										foreach ($terms as $term) {
										?>
											<div class="filters__option">
												<input class="form-check-input" type="checkbox" name="filter_<?php echo $term->slug; ?>" id="filter_<?php echo $term->slug; ?>" <?php echo ($current_taxonomy->slug === $term->slug) ? "checked" : ""; ?> data-taxonomy="<?php echo $taxonomy; ?>">
												<label class="form-check-label" for="filter_<?php echo $term->slug; ?>">
													<?php echo $term->name; ?>
												</label>
											</div>
										<?php } ?>
									</div>
								<?php  } ?>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div><!-- .page-header -->
	<?php } ?>
	<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

		<div class="row">



			<?php
			// Get the current taxonomy and term
			$current_taxonomy = get_queried_object();
			$term_id = $current_taxonomy->term_id;

			$args = array(  // Replace with your custom post type
				'post_type' => 'sargia_tour',
				'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' => $current_taxonomy->taxonomy,
						'field' => 'term_id',
						'terms' => $term_id,
					),
				),
			);

			$query = new WP_Query($args);

			if ($query->have_posts()) {
			?>
				<div class="col-12">
					<h3 class="text-center
				">Recommended itineraries</h3>
				</div>
			<?php
				// Start the loop.
				while ($query->have_posts()) {
					$query->the_post();

					/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
					get_template_part('loop-templates/content', 'taxonomy');
				}
			} else {
				get_template_part('loop-templates/content', 'none');
			}
			?>



			<?php
			// Display the pagination component.
			sargiasrilanka_pagination();

			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();
