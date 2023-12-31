<?php
add_action('wp_enqueue_scripts', 'enqueue_tour_ajax');
function enqueue_tour_ajax()
{
    wp_enqueue_script('tour_ajax_scripts', get_template_directory_uri() . '/js/tour-filter-ajax-scripts.js', array('jquery'), 1.0, true);
    // wp_localize_script('tour_ajax_scripts', 'frontendajaxint', array(
    //     'ajaxurl' => admin_url('admin-ajax.php')
    // ));

    // Localize the script with new data
    $ajax_data = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('tour_ajax_scripts')
    );
    wp_localize_script('tour_ajax_scripts', 'ajax_object', $ajax_data);
}




function tour_ajax_filter_posts()
{
    $filters = $_POST['filters'];
    // var_dump($filters);
    $args = array(
        'post_type' => 'sargia_tour',  // Replace with your custom post type
        'posts_per_page' => -1,
        'tax_query' => array(
            'relation' => 'AND',  // Use 'AND' or 'OR' depending on your requirements
        ),
    );

    foreach ($filters as $taxonomy => $terms) {

        $args['tax_query'][] = array(
            'taxonomy' => $taxonomy,
            'field' => 'slug',
            'terms' => $terms,
        );
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
?>
        <div class="col-12">
            <h3 class="text-center
				">Recommended itineraries</h3>
        </div>
<?php
        while ($query->have_posts()) {

            $query->the_post();
            get_template_part('loop-templates/content', 'taxonomy');
        }
        wp_reset_postdata();
    } else {
        get_template_part('loop-templates/content', 'none');
    }

    $content = ob_get_clean();
    echo $content;

    exit;  // Ensure no further processing after generating content
}

add_action('wp_ajax_tour_ajax_filter_posts', 'tour_ajax_filter_posts');
add_action('wp_ajax_nopriv_tour_ajax_filter_posts', 'tour_ajax_filter_posts');
