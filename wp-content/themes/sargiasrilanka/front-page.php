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
		<div class="hero__main-images">
			<img src="<?php echo get_template_directory_uri() ?>/assets/hero-main.png" alt="" class="d-block img-fluid w-100">
			<img src="<?php echo get_template_directory_uri() ?>/assets/footer-clouds.png" alt="" class="img-fluid w-100 hero__main-cloud" />
		</div>
		<div class="hero-wrapper--content">
			<div class="container">
				<div class="row">

					<div class="col-md-6 col-lg-5 order-md-2">
						<div class="hero__main-content">
							<p class="hero__title-sub-head">YOUR JOURNEY WITH ENDLESS EXPERIENCES</p>
							<h1>Unforgettable travel experience on the <span class="fst-italic">heaven</span> on earth </h1>
						</div>
					</div>
					<div class="col-md-5 col-lg-4 order-md-1">
						<div class="hero__video">
							<div class="hero__video-play">
								<i class="fa fa-play-circle fa-3x"></i>
							</div>
							<div class="hero__video-info">
								<div class="hero__video-info--title"><i class="fa fa-map-marker color-primary-40"></i>&nbsp; Sigiriya, North Central Province</div>
								<div class="hero__video-info--user">© Charith Kodagoda</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
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
							<i class="fa fa-user"></i>
						</div>
						<h4 class="why-sargia__sub-sec--title">Our Experience</h4>
						<p class="why-sargia__sub-sec--content">
							You can expect a personalised and original experience that caters to your interests and preferences
						</p>
					</div>
					<div class="why-sargia__sub-sec  text-center why-sargia__sub-sec--m100">
						<div class="why-sargia__sub-sec--icon">
							<i class="fa fa-user"></i>
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
							<i class="fa fa-user"></i>
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
