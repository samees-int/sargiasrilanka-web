<?php
function hotel_partner_shortcode()
{
    ob_start(); // Start output buffering

    $myterms = get_terms(array('taxonomy' => 'hotel_category', 'parent' => 0));

?>
    <div class="hotel_patner">
        <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
            <?php foreach ($myterms as $myterm) : ?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php echo ($myterm === reset($myterms)) ? 'active' : '' ?>" id="tab_<?php echo $myterm->slug; ?>" data-bs-toggle="tab" href="#<?php echo $myterm->slug; ?>" role="tab" aria-controls="<?php echo $myterm->slug; ?>" aria-selected="true"><?php echo $myterm->name; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="tab-content" id="ex1-content">
            <?php foreach ($myterms as $myterm) : ?>
                <div class="tab-pane fade <?php echo ($myterm === reset($myterms)) ? 'show active' : '' ?>" id="<?php echo $myterm->slug; ?>" role="tabpanel" aria-labelledby="tab_<?php echo $myterm->slug; ?>">
                    <?php
                    // Get child terms for the current parent term
                    $child_terms = get_terms(array('taxonomy' => 'hotel_category', 'parent' => $myterm->term_id));
                    // Loop through child terms
                    foreach ($child_terms as $child_term) : ?>
                        <div class="hotel_partiner__item">
                            <h5><?php echo $child_term->name; ?></h5>
                            <?php
                            $args = array(
                                'post_type' => 'partner_hotel',
                                'posts_per_page' => -1,
                                'tax_query'  => array(
                                    array(
                                        'taxonomy' => 'hotel_category',
                                        'field'    => 'slug',
                                        'terms'    => $child_term->slug,
                                    ),
                                ),
                            );

                            $wp_query = new WP_Query($args);

                            // Loop through posts under the current child term
                            ?>
                            <div class="hotel_patner__logo-wrapper d-flex flex-wrap">
                                <?php
                                while ($wp_query->have_posts()) : $wp_query->the_post();
                                    echo '<div class="hotel_patner__item">';
                                ?>
                                    <div class="hotel_patner__logo">
                                        <div class="">
                                            <div class="img--logo">
                                                <?php
                                                if (has_post_thumbnail()) {
                                                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                                                    <img width="300px" src="<?php echo $featured_img_url; ?>" alt="<?php echo get_the_title(); ?>">

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-0 mt-4"> <?php echo get_the_title(); ?> </p>
                                <?php
                                    echo  '</div>';
                                endwhile;
                                ?>
                            </div>
                        </div>
                    <?php
                        // Reset post data
                        wp_reset_postdata();
                    endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php

    return ob_get_clean(); // Return the buffered content
}

add_shortcode('hotel_partner', 'hotel_partner_shortcode');
