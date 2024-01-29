<?php

/**
 * Template Name: Destination Page Template
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('sargiasrilanka_container_type');



$wrapper_id = 'full-width-page-wrapper';
if (is_page_template('page-templates/no-title.php')) {
    $wrapper_id = 'no-title-page-wrapper';
}
?>

<div class="wrapper destination-wrapper pt-0" id="<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. 
                                                    ?>">
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
    <div class="<?php echo esc_attr($container); ?> " id="content">


        <div class="row justify-content-center">

            <div class="col-md-10 content-area" id="primary">

                <main class="site-main" id="main" role="main">

                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part('loop-templates/content', 'destination');

                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) {
                            comments_template();
                        }
                    }
                    ?>

                </main>

            </div><!-- #primary -->

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. 
            ?> -->

<?php
get_footer();
