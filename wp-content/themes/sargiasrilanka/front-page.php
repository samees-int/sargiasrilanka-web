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
<div id="page-wrapper">
	<!-- hero -->
	<div class="hero-wrapper">

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
						<p class="section_subtitle" data-aos="zoom-in-up">
							What Makes us Special
						</p>
						<h2 class="h2" data-aos="zoom-in-up" data-aos-anchor-placement="bottom-center">
							Why Sargia
						</h2>
					</div>
				</div>
				<div class="w-100"></div>
				<div class="col-md-4 order-md-3">
					<div class="why-sargia__sub-sec why-sargia__sub-sec--400">
						<h4 class="why-sargia__sub-sec--title" data-aos="fade-up">Our Passion</h4>
						<p class="why-sargia__sub-sec--content" data-aos="fade-up" data-aos-delay="100" data-aos-anchor=".why-sargia__sub-sec--title">
							At Sargia Sri Lanka, we believe that travel is not just about checking off a list of destinations or landmarks. It's about the experiences and emotions that come with it. It's about connecting with the people, their culture, and their way of life. We strive to design travel experiences that go beyond, immersing you in the heart of a destination and allowing you to truly understand and appreciate it.
						</p>
						<a href="#" class="why-sargia__sub-sec--readmore" data-aos="fade-up" data-aos-delay="200" data-aos-anchor=".why-sargia__sub-sec--content">Read more about us</a>
					</div>
				</div>
				<div class="col-md-3 order-md-1">
					<div class="why-sargia__sub-sec text-center" data-aos="fade-up">
						<div class="why-sargia__sub-sec--icon" data-aos="fade-up">
							<img src="<?php echo get_template_directory_uri() ?>/assets/icons/experience.svg">
						</div>
						<h4 class="why-sargia__sub-sec--title" data-aos="fade-up" data-aos-delay="100" data-aos-anchor=".why-sargia__sub-sec--icon">Bespoke Experiences </h4>
						<p class="why-sargia__sub-sec--content" data-aos="fade-up" data-aos-delay="200" data-aos-anchor=".why-sargia__sub-sec--title">
							we're offering travelers the opportunity to go beyond the typical tourist experience and truly immerse themselves in the destination
						</p>
					</div>
					<div class="why-sargia__sub-sec  text-center why-sargia__sub-sec--m100" data-aos="fade-up">
						<div class="why-sargia__sub-sec--icon" data-aos="fade-up">
							<img src="<?php echo get_template_directory_uri() ?>/assets/icons/unmatched-services.svg">
						</div>
						<h4 class="why-sargia__sub-sec--title" data-aos="fade-up" data-aos-delay="100" data-aos-anchor=".why-sargia__sub-sec--icon">Community Tourism Initiative</h4>
						<p class="why-sargia__sub-sec--content " data-aos="fade-up" data-aos-delay="200" data-aos-anchor=".why-sargia__sub-sec--title">
							building a network of locals who work closely with their respective communities to provide tourists with a genuine and enriching travel experience
						</p>
					</div>
				</div>


				<div class="col-md-5 order-md-2">
					<div class="why-sargia__images text-center">
						<div class="why-sargia__images-block">
							<span class="why-saria__image-1" data-aos="fade-up" data-aos-anchor=".why-sargia__sub-sec--icon"><img src="<?php echo  get_template_directory_uri() ?>/assets/why-sargia-2.jpg" alt=""></span>
							<span class="why-saria__image-2" data-aos="fade-up" data-aos-delay="200" data-aos-anchor=".why-sargia__sub-sec--icon"><img src="<?php echo  get_template_directory_uri() ?>/assets/why-sargia-4.jpg" alt=""></span>
							<span class="why-saria__image-3" data-aos="fade-up" data-aos-delay="300" data-aos-anchor=".why-sargia__sub-sec--icon"><img src="<?php echo  get_template_directory_uri() ?>/assets/why-sargia-3.jpg" alt=""></span>
						</div>
					</div>
					<div class="why-sargia__sub-sec text-center why-sargia__sub-sec--200 mx-auto mt-5" data-aos="fade-up-down">
						<div class="why-sargia__sub-sec--icon" data-aos="fade-up">
							<img src="<?php echo get_template_directory_uri() ?>/assets/icons/sustainbility.svg">
						</div>
						<h4 class="why-sargia__sub-sec--title" data-aos="fade-up" data-aos-delay="100ms" data-aos-anchor="why-sargia__sub-sec--icon">Discovering Hidden Gems</h4>
						<p class="why-sargia__sub-sec--content" data-aos="fade-up" data-aos-delay="200ms" data-aos-anchor="why-sargia__sub-sec--title">
							Engaging in immersive travel concepts with local hosts allows travelers to discover hidden gems and explore off-the-beaten locations
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
							<div class="col-md-8">
								<div class="tour-feature-slider__content">
									<div class="tour-feature-slider__subheading">
										Explore the best of the Island
									</div>
									<div class="tour-feature-slider__heading">
										<h2>West Cost</h2>
									</div>
									<div class="tour-feature-slider__paragraph">
										The western coast of Sri Lanka boasts bustling urban centers, rich colonial heritage, and stunning beaches that attract tourists seeking both cultural experiences and seaside relaxation. It's a vibrant region offering a mix of historical charm and modern amenities.
									</div>
									<div class="tour-feature-slider__attractions">
										<h4 class="tour-feature-slider__attractions--title"><i class="fa fa-map-marker me-2"></i>Top Attractions</h4>
										<ul class="tour-feature-slider__attractions--cities">
											<li class="tour-feature-slider__attractions--city">Kalpitiya</li>
											<li class="tour-feature-slider__attractions--city">Chillaw</li>
											<li class="tour-feature-slider__attractions--city">Negombo</li>
											<li class="tour-feature-slider__attractions--city">Colombo</li>
											<li class="tour-feature-slider__attractions--city">Mount Lavinia</li>
											<li class="tour-feature-slider__attractions--city">Kaluthara</li>
											<li class="tour-feature-slider__attractions--city">Beruwala</li>
										</ul>
									</div>
								</div>
								<div class="tour-feature-slider__action"></div>
							</div>
							<div class="col-md-4">
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
							<div class="col-md-8">
								<div class="tour-feature-slider__content">
									<div class="tour-feature-slider__subheading">
										Explore the best of the Island
									</div>
									<div class="tour-feature-slider__heading">
										<h2>Cultural Tringle</h2>
									</div>
									<div class="tour-feature-slider__paragraph">
										The Cultural Triangle in Sri Lanka is a treasure trove of ancient marvels,featuring UNESCO World Heritage Sites like Sigiriya, Polonnaruwa, and Anuradhapura, showcasing the country&#39;s rich historical and architectural heritage. This region offers an immersive journey into the island&#39;s ancient history, temples, and remarkable ruins, drawing history enthusiasts and curious travelers alike.
									</div>
									<div class="tour-feature-slider__attractions">
										<h4 class="tour-feature-slider__attractions--title"><i class="fa fa-map-marker me-2"></i>Top Attractions</h4>
										<ul class="tour-feature-slider__attractions--cities">
											<li class="tour-feature-slider__attractions--city">Anuradhapura</li>
											<li class="tour-feature-slider__attractions--city">Polonnaruwa</li>
											<li class="tour-feature-slider__attractions--city">Kavudulla</li>
											<li class="tour-feature-slider__attractions--city">Minneriya</li>
											<li class="tour-feature-slider__attractions--city">Sigiriya</li>
											<li class="tour-feature-slider__attractions--city">Dambulla</li>
										</ul>
									</div>
								</div>
								<div class="tour-feature-slider__action"></div>
							</div>
							<div class="col-md-4">
								<div class="tour-feature-slider__map">
									<img class="tour-feature-slider__map--img" src="<?php echo get_template_directory_uri() ?>/assets/map.png" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tour-feature-slider__background" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/tour-frature-bg-1.png);">
				<div class="tour-feature-slider__content-main">
					<div class="container ">
						<div class="row">
							<div class="col-md-8">
								<div class="tour-feature-slider__content">
									<div class="tour-feature-slider__subheading">
										Explore the best of the Island
									</div>
									<div class="tour-feature-slider__heading">
										<h2>North</h2>
									</div>
									<div class="tour-feature-slider__paragraph">
										The northern coast of Sri Lanka showcases a unique blend of cultural diversity and historical significance, shaped by its past and vibrant present. It's a region rich in heritage, with sites like Jaffna's iconic temples and forts, offering glimpses into the area's cultural tapestry.
									</div>
									<div class="tour-feature-slider__attractions">
										<h4 class="tour-feature-slider__attractions--title"><i class="fa fa-map-marker me-2"></i>Top Attractions</h4>
										<ul class="tour-feature-slider__attractions--cities">
											<li class="tour-feature-slider__attractions--city">Jaffna</li>
											<li class="tour-feature-slider__attractions--city">Kilinochchi</li>
											<li class="tour-feature-slider__attractions--city">Mannar</li>
											<li class="tour-feature-slider__attractions--city">Vavuniya</li>
											<li class="tour-feature-slider__attractions--city">Mullaitivu</li>
											<li class="tour-feature-slider__attractions--city">Point Pedro</li>
											<li class="tour-feature-slider__attractions--city">Chavakachcheri</li>
										</ul>
									</div>
								</div>
								<div class="tour-feature-slider__action"></div>
							</div>
							<div class="col-md-4">
								<div class="tour-feature-slider__map">
									<img class="tour-feature-slider__map--img" src="<?php echo get_template_directory_uri() ?>/assets/map.png" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tour-feature-slider__background" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/tour-frature-bg-1.png);">
				<div class="tour-feature-slider__content-main">
					<div class="container ">
						<div class="row">
							<div class="col-md-8">
								<div class="tour-feature-slider__content">
									<div class="tour-feature-slider__subheading">
										Explore the best of the Island
									</div>
									<div class="tour-feature-slider__heading">
										<h2>Down South</h2>
									</div>
									<div class="tour-feature-slider__paragraph">
										Down South in Sri Lanka captivates with its pristine beaches, idyllic coastal towns, and a relaxed atmosphere, making it a haven for beach lovers and those seeking a laid-back escape. The region's charm lies in its scenic landscapes, tranquil beaches, and opportunities for coastal exploration and relaxation.
									</div>
									<div class="tour-feature-slider__attractions">
										<h4 class="tour-feature-slider__attractions--title"><i class="fa fa-map-marker me-2"></i>Top Attractions</h4>
										<ul class="tour-feature-slider__attractions--cities">
											<li class="tour-feature-slider__attractions--city">Galle</li>
											<li class="tour-feature-slider__attractions--city">Weligama</li>
											<li class="tour-feature-slider__attractions--city">Hikkaduwa</li>
											<li class="tour-feature-slider__attractions--city">Mirissa</li>
											<li class="tour-feature-slider__attractions--city">Matara</li>
											<li class="tour-feature-slider__attractions--city">Tangalle</li>
											<li class="tour-feature-slider__attractions--city">Dickwella</li>
											<li class="tour-feature-slider__attractions--city">Yala</li>
											<li class="tour-feature-slider__attractions--city">Tissamaharama</li>
										</ul>
									</div>
								</div>
								<div class="tour-feature-slider__action"></div>
							</div>
							<div class="col-md-4">
								<div class="tour-feature-slider__map">
									<img class="tour-feature-slider__map--img" src="<?php echo get_template_directory_uri() ?>/assets/map.png" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tour-feature-slider__background" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/tour-frature-bg-1.png);">
				<div class="tour-feature-slider__content-main">
					<div class="container ">
						<div class="row">
							<div class="col-md-8">
								<div class="tour-feature-slider__content">
									<div class="tour-feature-slider__subheading">
										Explore the best of the Island
									</div>
									<div class="tour-feature-slider__heading">
										<h2>Central Hills</h2>
									</div>
									<div class="tour-feature-slider__paragraph">
										The Central Hills of Sri Lanka are a breathtaking expanse of lush tea plantations, misty mountains, and charming hill towns like Nuwara Eliya, offering a cool climate and stunning panoramas. This region is a haven for nature lovers and hikers, boasting scenic landscapes, cascading waterfalls, and a serene escape from the island's tropical heat.
									</div>
									<div class="tour-feature-slider__attractions">
										<h4 class="tour-feature-slider__attractions--title"><i class="fa fa-map-marker me-2"></i>Top Attractions</h4>
										<ul class="tour-feature-slider__attractions--cities">
											<li class="tour-feature-slider__attractions--city">Matale</li>
											<li class="tour-feature-slider__attractions--city">Kandy</li>
											<li class="tour-feature-slider__attractions--city">Nuwara Eliya</li>
											<li class="tour-feature-slider__attractions--city">Hatton</li>
											<li class="tour-feature-slider__attractions--city">Bandarawela</li>
											<li class="tour-feature-slider__attractions--city">Haputale</li>
											<li class="tour-feature-slider__attractions--city">Ella</li>
										</ul>
									</div>
								</div>
								<div class="tour-feature-slider__action"></div>
							</div>
							<div class="col-md-4">
								<div class="tour-feature-slider__map">
									<img class="tour-feature-slider__map--img" src="<?php echo get_template_directory_uri() ?>/assets/map.png" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tour-feature-slider__background" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/tour-frature-bg-1.png);">
				<div class="tour-feature-slider__content-main">
					<div class="container ">
						<div class="row">
							<div class="col-md-8">
								<div class="tour-feature-slider__content">
									<div class="tour-feature-slider__subheading">
										Explore the best of the Island
									</div>
									<div class="tour-feature-slider__heading">
										<h2>West Cost</h2>
									</div>
									<div class="tour-feature-slider__paragraph">
										The East Coast of Sri Lanka enchants with its pristine beaches, azure waters, and a more tranquil ambiance, perfect for relaxation and water-based activities like snorkeling and surfing. This region showcases a quieter charm, boasting untouched beauty and a serene coastal escape for travelers seeking a more laid-back experience.
									</div>
									<div class="tour-feature-slider__attractions">
										<h4 class="tour-feature-slider__attractions--title"><i class="fa fa-map-marker me-2"></i>Top Attractions</h4>
										<ul class="tour-feature-slider__attractions--cities">
											<li class="tour-feature-slider__attractions--city">Trincomalee</li>
											<li class="tour-feature-slider__attractions--city">Batticaloa</li>
											<li class="tour-feature-slider__attractions--city">Arugam Bay</li>
											<li class="tour-feature-slider__attractions--city">Passikudah</li>
										</ul>
									</div>
								</div>
								<div class="tour-feature-slider__action"></div>
							</div>
							<div class="col-md-4">
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
						<div data-aos="fade-up" class="travel-type__card--image" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/travel-type-1.jpg);">
							<div class="travel-type__card--title">
								<span class="fst-italic" data-aos="fade-up">family</span> travel
							</div>
						</div>
						<div class="travel-type__card--body" data-aos="fade-up" data-aos-offset="100" data-aos-anchor=".travel-type__card--title">
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
				<div class="col-md-4 travel-type__card__mt travel-type__card__bt" data-aos="fade-up" data-aos-delay="100">
					<div class="travel-type__card">
						<div class="travel-type__card--image" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/travel-type-2.jpg);">
							<div class="travel-type__card--title" data-aos="fade-up">
								<span class="fst-italic">private</span> travel
							</div>
						</div>
						<div class="travel-type__card--body" data-aos="fade-up" data-aos-anchor=".travel-type__card--title">
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
				<div class="col-md-4 travel-type__card__mt" data-aos="fade-up" data-aos-delay="200">
					<div class="travel-type__card">
						<div class="travel-type__card--image" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/travel-type-3.jpg);">
							<div class="travel-type__card--title">
								<span class="fst-italic">honeymoons</span>
							</div>
						</div>
						<div class="travel-type__card--body" data-aos="fade-up" data-aos-anchor=".travel-type__card--title">
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
