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

$container = get_theme_mod('sargiasrilanka_container_type');

?>

<div class="" id="page-wrapper">
	<!-- hero -->
	<div class="hero-wrapper">
		<div class="hero__main-images d-none">
			<img src="<?php echo get_template_directory_uri() ?>/assets/hero-main.png" alt="" class="d-block img-fluid w-100">
			<img src="<?php echo get_template_directory_uri() ?>/assets/footer-clouds.png" alt="" class="img-fluid w-100 hero__main-cloud" />
		</div>
		<div class="hero-wrapper--content">
			<div class="container z-index-1">
				<div class="row">

					<div class="col-md-12 col-lg-12 ">
						<div class="hero__main-content">
							<p class="hero__title-sub-head">YOUR JOURNEY WITH ENDLESS EXPERIENCES</p>
							<h1>Unforgettable travel experience on the <span class="fst-italic">heaven</span> on earth </h1>
						</div>
					</div>
					<div class="col-md-12 col-lg-12 ">
						<div class="hero__video">
							<div class="hero__video-play">
								<img src="<?php echo get_template_directory_uri() ?>/assets/icons/video.svg">
							</div>
							<div class="hero__video-info">
								<div class="hero__video-info--title"><img src="<?php echo get_template_directory_uri() ?>/assets/icons/mappin.svg">&nbsp; Sigiriya, North Central Province</div>
								<div class="hero__video-info--user">© Charith Kodagoda</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Why Sargia Section -->
	<div class="why-sargia-wrapper section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__title text-center why-sargia__title">
						<p class="section_subtitle">
							What Makes us Special
						</p>
						<h2 class="h2">
							Why Sargia
						</h2>
					</div>
				</div>
				<div class="w-100"></div>
				<div class="col-md-4 order-md-3">
					<div class="why-sargia__sub-sec why-sargia__sub-sec--400">
						<h4 class="why-sargia__sub-sec--title">Our Passion</h4>
						<p class="why-sargia__sub-sec--content">
							At Sargia, we believe that travel is not just about checking off a list of destinations or landmarks. It's about the experiences and emotions that come with it. It's about connecting with the people, their culture, and their way of life. We strive to design travel experiences that goes beyond, immersing you in the heart of a destination and allowing you to truly understand and appreciate it.
						</p>
						<a href="#" class="why-sargia__sub-sec--readmore">Read more about us</a>
					</div>
				</div>
				<div class="col-md-3 order-md-1">
					<div class="why-sargia__sub-sec text-center">
						<div class="why-sargia__sub-sec--icon">
							<img src="<?php echo get_template_directory_uri() ?>/assets/icons/experience.svg">
						</div>
						<h4 class="why-sargia__sub-sec--title">Our Experience</h4>
						<p class="why-sargia__sub-sec--content">
							You can expect a personalised and original experience that caters to your interests and preferences
						</p>
					</div>
					<div class="why-sargia__sub-sec  text-center why-sargia__sub-sec--m100">
						<div class="why-sargia__sub-sec--icon">
							<img src="<?php echo get_template_directory_uri() ?>/assets/icons/unmatched-services.svg">
						</div>
						<h4 class="why-sargia__sub-sec--title">Unmatched Services</h4>
						<p class="why-sargia__sub-sec--content ">
							You can expect a personalised and original experience that caters to your interests and preferences
						</p>
					</div>
				</div>


				<div class="col-md-5 order-md-2">
					<div class="why-sargia__images text-center">
						<div class="why-sargia__images-block">
							<img src="<?php echo  get_template_directory_uri() ?>/assets/why-sargia-2.jpg" alt="" class="why-saria__image-1">
							<img src="<?php echo  get_template_directory_uri() ?>/assets/why-sargia-4.jpg" alt="" class="why-saria__image-2">
							<img src="<?php echo  get_template_directory_uri() ?>/assets/why-sargia-3.jpg" alt="" class="why-saria__image-3">
						</div>
					</div>
					<div class="why-sargia__sub-sec text-center why-sargia__sub-sec--200 mx-auto mt-5">
						<div class="why-sargia__sub-sec--icon">
							<img src="<?php echo get_template_directory_uri() ?>/assets/icons/sustainbility.svg">
						</div>
						<h4 class="why-sargia__sub-sec--title">Our commitment
							to sustainability</h4>
						<p class="why-sargia__sub-sec--content">
							to ensure that our travel experiences have a positive impact on the environment and the local communities we visit
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Sargia Discover Slider -->
	<section class="sargia_discover">
		<div class="sargia_discover__title d-md-none">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section__title text-center sargia_discover__title--text ">
							<h2 class="h2">
								Discover
								Sri Lanka
							</h2>
							<p class="section_subtitle">
								Sri Lanka truly is a destination that offers something for every type of traveller, from its rich cultural heritage to its stunning natural landscapes and delicious cuisine.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="sargia_discover--slider">
			<div class="sargia_discover--slider-item text-only d-none d-md-inline-block">
				<div class="sargia_discover--slider-content">
					<div class="sargia_discover--slider-text">
						Sri Lanka truly is a destination that offers something for every type of traveller, from its rich cultural heritage to its stunning natural landscapes and delicious cuisine.
					</div>
					<div class="sargia_discover--slider-title">
						<h2 class="h2">Discover
							Sri Lanka</h2>
					</div>
				</div>
			</div>

			<?php
			$args = array(
				'post_type' => 'sargia_tour',
				'posts_per_page' => 10
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();
				// echo "saaa<br/>";
				// the_title();
				// var_dump($loop->the_post());
				$tour_info_meta = get_post_meta(get_the_ID(), 'tour_days', true);
				// var_dump($tour_info_meta['total_days']);
				if (has_post_thumbnail()) {
			?>

					<div class="sargia_discover--slider-item">
						<!-- <img src="<?php echo get_template_directory_uri() ?>/assets/slider/slider- 1.jpg" alt=""> -->
						<div class="sargia_discover--slider-item-bg" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
							<a href="<?php echo get_permalink(get_the_ID()); ?>" class="sargia_discover--slider-item__link"></a>
							<div class="sargia_discover--slider-content">
								<?php
								if (!empty($tour_info_meta['total_days'])) {
								?>
									<div class="sargia_discover--slider-days">
										<?php echo $tour_info_meta['total_days']; ?> Days
									</div>
								<?php  } ?>
								<div class="sargia_discover--slider-title">
									<h3 class="h3"><?php the_title() ?></h3>
								</div>
								<div class="sargia_discover--slider-text">
									<?php the_excerpt(); ?>
								</div>
								<div class="sargia_discover--slider--action">
									<div class="sargia_discover--slider-readmore">
										<a href="" class=""> More Details</a>
									</div>
									<?php if (!empty($tour_info_meta['tour_price'])) { ?>
										<div class="sargia_discover--slider-tour-price">
											<?php echo $tour_info_meta['tour_price']; ?>
										</div>
									<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>
			<?php
				}
			endwhile;
			?>
			<div class="sargia_discover--slider-item">
				<!-- <img src="<?php echo get_template_directory_uri() ?>/assets/slider/slider-1.jpg" alt=""> -->
				<div class="sargia_discover--slider-item-bg" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/slider/slider-1.jpg');">
					<div class="sargia_discover--slider-content">
						<div class="sargia_discover--slider-days">
							3 Days
						</div>
						<div class="sargia_discover--slider-title">
							<h3 class="h3">Sun sand in south coast</h3>
						</div>
						<div class="sargia_discover--slider-text">
							So whether you're interested in exploring ancient ruins, spotting wildlife in a national park
						</div>
						<div class="sargia_discover--slider-readmore">
							<a href="" class=""> More Details</a>
						</div>
					</div>
				</div>
			</div>
			<div class="sargia_discover--slider-item">
				<!-- <img src="<?php echo get_template_directory_uri() ?>/assets/slider/slider-1.jpg" alt=""> -->
				<div class="sargia_discover--slider-item-bg" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/slider/slider-1.jpg');">
					<div class="sargia_discover--slider-content">
						<div class="sargia_discover--slider-days">
							4 Days
						</div>
						<div class="sargia_discover--slider-title">
							<h3 class="h3">Sun sand in south coast</h3>
						</div>
						<div class="sargia_discover--slider-text">
							So whether you're interested in exploring ancient ruins, spotting wildlife in a national park
						</div>
						<div class="sargia_discover--slider-readmore">
							<a href="" class=""> More Details</a>
						</div>
					</div>
				</div>
			</div>
			<div class="sargia_discover--slider-item">
				<!-- <img src="<?php echo get_template_directory_uri() ?>/assets/slider/slider-1.jpg" alt=""> -->
				<div class="sargia_discover--slider-item-bg" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/slider/slider-1.jpg');">
					<div class="sargia_discover--slider-content">
						<div class="sargia_discover--slider-days">
							5 Days
						</div>
						<div class="sargia_discover--slider-title">
							<h3 class="h3">Sun sand in south coast</h3>
						</div>
						<div class="sargia_discover--slider-text">
							So whether you're interested in exploring ancient ruins, spotting wildlife in a national park
						</div>
						<div class="sargia_discover--slider-readmore">
							<a href="" class=""> More Details</a>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- <div class="slider-nav">
			<div class="container">
				<div class="row">
					<div class="slider-arrows">
						<div class="slider-preview">
							<img src="<?php echo get_template_directory_uri() ?>/assets/arrowright.svg" alt="">
						</div>
						<div class="slider-next">
							<img src="<?php echo get_template_directory_uri() ?>/assets/arrowleft.svg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</section>

	<section class="tour-frature-wrapper">
		<div class="tour-frature-slider">
			<div class="tour-feature-slider__background" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/tour-frature-bg-1.png);">

				<div class="tour-feature-slider__content-main">
					<div class="container ">
						<div class="row">
							<div class="col-md-6">
								<div class="tour-feature-slider__content">
									<div class="tour-feature-slider__subheading">
										Explore the best of the Island
									</div>
									<div class="tour-feature-slider__heading">
										<h2>Down South</h2>
									</div>
									<div class="tour-feature-slider__paragraph">
										Sri Lanka truly is a destination that offers something for every type of traveller, from its rich cultural heritage to its stunning natural landscapes and delicious cuisine.
									</div>
									<div class="tour-feature-slider__attractions">
										<h4 class="tour-feature-slider__attractions--title"><i class="fa fa-map-marker me-2"></i>Top Attractions</h4>
										<ul class="tour-feature-slider__attractions--cities">
											<li class="tour-feature-slider__attractions--city">Hikkaduwa</li>
											<li class="tour-feature-slider__attractions--city">Weligama</li>
											<li class="tour-feature-slider__attractions--city">Galle</li>
											<li class="tour-feature-slider__attractions--city">Galle Fort</li>
											<li class="tour-feature-slider__attractions--city">Hambanthota</li>
										</ul>
									</div>
								</div>
								<div class="tour-feature-slider__action">

								</div>
							</div>
							<div class="col-md-6">
								<div class="tour-feature-slider__map">
									<img class="tour-feature-slider__map--img" src="<?php echo get_template_directory_uri() ?>/assets/map.png" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tour-feature-slider__background" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/tour-frature-bg-2.jpg);">
				<div class="tour-feature-slider__content-main">
					<div class="container ">
						<div class="row">
							<div class="col-md-6">
								<div class="tour-feature-slider__content">
									<div class="tour-feature-slider__subheading">
										Explore the best of the Island
									</div>
									<div class="tour-feature-slider__heading">
										<h2>Down South</h2>
									</div>
									<div class="tour-feature-slider__paragraph">
										Sri Lanka truly is a destination that offers something for every type of traveller, from its rich cultural heritage to its stunning natural landscapes and delicious cuisine.
									</div>
									<div class="tour-feature-slider__attractions">
										<h4 class="tour-feature-slider__attractions--title"><i class="fa fa-map-marker me-2"></i>Top Attractions</h4>
										<ul class="tour-feature-slider__attractions--cities">
											<li class="tour-feature-slider__attractions--city">Hikkaduwa</li>
											<li class="tour-feature-slider__attractions--city">Weligama</li>
											<li class="tour-feature-slider__attractions--city">Galle</li>
											<li class="tour-feature-slider__attractions--city">Galle Fort</li>
											<li class="tour-feature-slider__attractions--city">Hambanthota</li>
										</ul>
									</div>
								</div>
								<div class="tour-feature-slider__action">

								</div>
							</div>
							<div class="col-md-6">
								<div class="tour-feature-slider__map">
									<img class="tour-feature-slider__map--img" src="<?php echo get_template_directory_uri() ?>/assets/map.png" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="tour-frature-slider__dots">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="tour-frature-slider__dots--list">

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="travel-type">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__title text-center">
						<p class="section_subtitle">
							bespoke travel experiences
						</p>
						<h2 class="h2">
							<i>Handcrafted</i><br />
							travel ideas
						</h2>
					</div>
				</div>
				<div class="col-md-4 travel-type__card__mt">
					<div class="travel-type__card">
						<div class="travel-type__card--image" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/travel-type-1.jpg);">
							<div class="travel-type__card--title">
								<span class="fst-italic">family</span> travel
							</div>
						</div>
						<div class="travel-type__card--body">
							<div class="travel-type__card--content">
								Sri Lanka truly is a destination that offers something for every type of traveller, from its rich cultural heritage to its stunning natural landscapes and delicious cuisine.
							</div>
							<div class="travel-type__card--action">
								<a href="" class="btn btn-outline-primary">
									Explore
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 travel-type__card__mt travel-type__card__bt">
					<div class="travel-type__card">
						<div class="travel-type__card--image" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/travel-type-2.jpg);">
							<div class="travel-type__card--title">
								<span class="fst-italic">private</span> travel
							</div>
						</div>
						<div class="travel-type__card--body">
							<div class="travel-type__card--content">
								Sri Lanka truly is a destination that offers something for every type of traveller, from its rich cultural heritage to its stunning natural landscapes and delicious cuisine.
							</div>
							<div class="travel-type__card--action">
								<a href="" class="btn btn-outline-primary btn-rounded">
									Explore
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 travel-type__card__mt">
					<div class="travel-type__card">
						<div class="travel-type__card--image" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/travel-type-3.jpg);">
							<div class="travel-type__card--title">
								<span class="fst-italic">honeymoons</span>
							</div>
						</div>
						<div class="travel-type__card--body">
							<div class="travel-type__card--content">
								Sri Lanka truly is a destination that offers something for every type of traveller, from its rich cultural heritage to its stunning natural landscapes and delicious cuisine.
							</div>
							<div class="travel-type__card--action">
								<a href="" class="btn btn-outline-primary">
									Explore
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="talk-to-us">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="section__title talk-to-us__title">
						<p class="section_subtitle">
							WE ARE AT YOUR SERVICE
						</p>
						<h2 class="h2">
							talk to a
							travel specialist
						</h2>
					</div>
				</div>
				<div class="col-md-3">
					<div class="talk-to-us__list talk-to-us__phone text-center">
						<div class="talk-to-us__list--content">
							<i class="fa fa-phone"></i>
							<br />
							Call Us <br />
							+94 773 717 933
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="talk-to-us__list talk-to-us__email text-center">
						<div class="talk-to-us__list--content">
							<i class="fa fa-envelope"></i><br />
							Send an<br />
							inquiery
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
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
