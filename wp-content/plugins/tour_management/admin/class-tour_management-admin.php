<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://interlective.com/
 * @since      1.0.0
 *
 * @package    Tour_management
 * @subpackage Tour_management/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tour_management
 * @subpackage Tour_management/admin
 * @author     samees sandaruwan <samees@interlective.com>
 */

class Tour_management_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tour_management_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tour_management_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/tour_management-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tour_management_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tour_management_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/tour_management-admin.js', array('jquery'), $this->version, false);

		wp_localize_script(
			$this->plugin_name,
			"ajax_loader_url",
			array(
				'name' => "sargia",
				'ajaxurl' => admin_url("admin-ajax.php"),
				'nonce' => wp_create_nonce('ajaxnonce')
			)
		);
	}

	function register_sargia_tours_post_type()
	{
		$labels = array(
			'name' => 'Sargia Tours',
			'singular_name' => 'Sargia Tour',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Sargia Tour',
			'edit_item' => 'Edit Sargia Tour',
			'new_item' => 'New Sargia Tour',
			'view_item' => 'View Sargia Tour',
			'search_items' => 'Search Sargia Tours',
			'not_found' => 'No Sargia Tours found',
			'not_found_in_trash' => 'No Sargia Tours found in Trash',
			'parent_item_colon' => 'Parent Sargia Tour:',
			'menu_name' => 'Sargia Tours',

		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'sargia-tours'),
			'menu_icon' => 'dashicons-palmtree', // Change the menu icon as needed
			'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
		);

		register_post_type('sargia_tour', $args);
	}


	function add_tour_days_meta_box()
	{
		// Tour Info 
		add_meta_box(
			'tour_days_meta_box',
			'Tour Itineraries',
			array($this, 'display_tour_days_meta_box'),
			'sargia_tour',
			'normal',
			'high'
		);
		//Map Image metabox
		add_meta_box(
			'tour_map_image_metabox',
			'Tour Map Image',
			array($this, 'render_tour_map_image_metabox'),
			'sargia_tour',  // Post type where the metabox should be displayed
			'side', // Position of the metabox (e.g., normal, side, advanced)
			'high'    // Priority of the metabox
		);
		//Tour Highlights metabox
		add_meta_box(
			'tour_highlight_metabox',
			'Tour Highlight',
			array($this, 'render_tour_highlight_metabox'),
			'sargia_tour',  // Post type where the metabox should be displayed
			'normal', // Position of the metabox (e.g., normal, side, advanced)
			'default'    // Priority of the metabox
		);

		//Tour Package Includes metabox
		add_meta_box(
			'tour_pkgIncludes_metabox',
			'Package Includes',
			array($this, 'render_tour_pkgIncludes_metabox'),
			'sargia_tour',  // Post type where the metabox should be displayed
			'normal', // Position of the metabox (e.g., normal, side, advanced)
			'default'    // Priority of the metabox
		);
		//Tour Package Excludes metabox
		add_meta_box(
			'tour_pkgExcludes_metabox',
			'Package Excludes',
			array($this, 'render_tour_pkgExcludes_metabox'),
			'sargia_tour',  // Post type where the metabox should be displayed
			'normal', // Position of the metabox (e.g., normal, side, advanced)
			'default'    // Priority of the metabox
		);
	}

	function cptui_register_my_taxes_tour_destination()
	{

		/**
		 * Taxonomy: Tour Destination.
		 */

		$labels = [
			"name" => esc_html__("Tour Destination", "sargiasrilanka"),
			"singular_name" => esc_html__("Tour Destination", "sargiasrilanka"),
			'menu_name' => esc_html__("Tour Destination", "sargiasrilanka"),
			'all_items' => esc_html__("All Tour Destination Terms", "sargiasrilanka"),
			'edit_item' => esc_html__("Edit Tour Destination Term", "sargiasrilanka"),
			'view_item' => esc_html__("View Tour Destination Term", "sargiasrilanka"),
			'add_new_item' => esc_html__("Add New Tour Destination Term", "sargiasrilanka"),
			'new_item_name' => esc_html__("New Tour Destination Term Name", "sargiasrilanka"),
			'search_items' => esc_html__("Search Tour Destination", "sargiasrilanka"),
			'popular_items' => esc_html__("Popular Tour Destination Terms", "sargiasrilanka"),
			'not_found' => esc_html__("No tour destination terms found", "sargiasrilanka"),
		];


		$args = [
			"label" => esc_html__("Tour Destination", "sargiasrilanka"),
			"labels" => $labels,
			"public" => true,
			"publicly_queryable" => true,
			"hierarchical" => true,
			"show_ui" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"query_var" => true,
			"rewrite" => ['slug' => 'tours-by-destination', 'with_front' => true,],
			"show_admin_column" => true,
			"show_in_rest" => true,
			"show_tagcloud" => false,
			"rest_base" => "tours-by-destination",
			"rest_controller_class" => "WP_REST_Terms_Controller",
			"rest_namespace" => "wp/v2",
			"show_in_quick_edit" => false,
			"sort" => false,
			"show_in_graphql" => false,
		];
		register_taxonomy("tours-by-destination", ["sargia_tour"], $args);
	}

	function register_tour_attribute_taxonomy()
	{
		/**
		 * Taxonomy: Tour Duration
		 */
		$labels = array(
			'name' => 'Tour Duration',
			'singular_name' => 'Tour Duration',
			'menu_name' => 'Tour Durations',
			'search_items' => 'Search Tour Durations',
			'all_items' => 'All Tour Durations',
			'edit_item' => 'Edit Tour Duration',
			'update_item' => 'Update Tour Duration',
			'add_new_item' => 'Add New Tour Duration',
			'new_item_name' => 'New Tour Duration Name',
			'not_found' => 'No Tour Durations found',
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
		);
		register_taxonomy('tours-by-duration', 'sargia_tour', $args);
	}
	function register_tour_interests_taxonomy()
	{
		/**
		 * Taxonomy: Tour Interests
		 */
		$labels = array(
			'name' => 'Tour Interest',
			'singular_name' => 'Tour Interest',
			'menu_name' => 'Tour Interests',
			'search_items' => 'Search Tour Interests',
			'all_items' => 'All Tour Interests',
			'edit_item' => 'Edit Tour Interest',
			'update_item' => 'Update Tour Interest',
			'add_new_item' => 'Add New Tour Interest',
			'new_item_name' => 'New Tour Interest Name',
			'not_found' => 'No Tour Interests found',
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
		);
		register_taxonomy('tours-by-interest', 'sargia_tour', $args);
	}

	function display_tour_days_meta_box($post)
	{
		// Retrieve existing tour days data
		$tour_days = get_post_meta($post->ID, 'tour_days', true);
		// Convert the stored JSON string to an array
		$tour_days = is_array($tour_days) ? $tour_days : array();

		// Display input fields for title, description, and images

		ob_start(); // start buffer

		// inculde template file
		include_once(TOUR_MANAGEMENT_PLUGIN_PATH . 'admin/partials/tmpl-tour-custom-filed.php');

		$template =  ob_get_contents(); // reading content
		ob_end_clean();
		echo $template;
	}

	function save_tour_days_meta_box($post_id)
	{
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

		if (!current_user_can('edit_post', $post_id)) return;
		// var_dump($_POST['tour_days']);
		// die;
		// Save tour days data
		if (isset($_POST['tour_days'])) {
			$tour_days_data = array(
				'total_days' => sanitize_text_field($_POST['tour_days']['total_days']),
				'total_disatance' => sanitize_text_field($_POST['tour_days']['total_disatance']),
				'tour_price' => sanitize_text_field($_POST['tour_days']['tour_price']),
				'total_stops' => sanitize_text_field($_POST['tour_days']['total_stops']),
				'map_image_id' => sanitize_text_field($_POST['tour_days']['map_image_id']),
				'repeater' => array(),
			);

			if (isset($_POST['tour_days']['repeater']) && is_array($_POST['tour_days']['repeater'])) {
				foreach ($_POST['tour_days']['repeater'] as $repeater_item) {
					$repeater_item_data = array(
						'tour_itineraies_item_title' => isset($repeater_item['tour_itineraies_item_title']) ? sanitize_text_field($repeater_item['tour_itineraies_item_title']) : '',
						'tour_itineraries_date_content' => isset($repeater_item['tour_itineraries_date_content']) ? wp_kses_post($repeater_item['tour_itineraries_date_content']) : '',
						'tour_itineraries_date_heightlight' => isset($repeater_item['tour_itineraries_date_heightlight']) ? wp_kses_post($repeater_item['tour_itineraries_date_heightlight']) : '',
						'tour_itineraries_date_image' => isset($repeater_item['tour_itineraries_date_image']) ? sanitize_text_field($repeater_item['tour_itineraries_date_image']) : '',
					);

					$tour_days_data['repeater'][] = $repeater_item_data;
				}
			}
			update_post_meta($post_id, 'tour_days', $tour_days_data);
		}
	}


	function render_tour_map_image_metabox($post)
	{
		$tour_meta = get_post_meta($post->ID, 'tour_days', true);

		$image_url = !empty($tour_meta["map_image_id"]) ? (wp_get_attachment_image_url($tour_meta["map_image_id"], 'medium')) : '';

		echo '<div class="custom-image-container">';
		echo '';
		$display = '';
		if (!empty($image_url)) {
			$display = 'block';
		} else {
			$display = 'none';
		}

		echo '<img src="' . esc_url($image_url) . '" alt="Map Image" style=" max-width:100%;  display : ' . $display    . '  "  id="map_img_preview" /><br>';
		echo '<div><a href="#" class="remove-map-image" style=" display : ' . $display    . '">Remove Image</a></div>';

		echo '<div id="map_image_btn" style ="display:' . (empty($image_url) ? "block" : "none") . '"><label for="custom_image_field">Upload or Select Map Image:</label> <br/>';
		echo '<input type="button" value="Select Image" class="button button-primary custom_image_upload_btn"></div>';
		$img_id = "";
		if (!empty($tour_meta["map_image_id"])) {
			$img_id = esc_attr($tour_meta["map_image_id"]);
		}
		echo '<input type="hidden" id="map_image_id" name="tour_days[map_image_id]" value="' . $img_id . '">';

		echo '</div>';
	}

	function render_tour_pkgIncludes_metabox($post)
	{
		$content = get_post_meta($post->ID, '_tour_pkgIncludes_content', true);
		wp_editor($content, 'tour_pkgIncludes_editor', array(
			'textarea_name' => '_tour_pkgIncludes_content',
			'editor_height' => 200,
			'textarea_rows' => 20
		));
	}

	function save_tour_pkgIncludes_metabox($post_id)
	{
		if (array_key_exists('_tour_pkgIncludes_content', $_POST)) {
			update_post_meta($post_id, '_tour_pkgIncludes_content', $_POST['_tour_pkgIncludes_content']);
		}
	}
	function render_tour_pkgExcludes_metabox($post)
	{
		$content = get_post_meta($post->ID, '_tour_pkgExcludes_content', true);
		wp_editor($content, 'tour_pkgExcludes_editor', array(
			'textarea_name' => '_tour_pkgExcludes_content',
			'editor_height' => 200,
			'textarea_rows' => 20
		));
	}

	function save_tour_pkgExcludes_metabox($post_id)
	{
		if (array_key_exists('_tour_pkgExcludes_content', $_POST)) {
			update_post_meta($post_id, '_tour_pkgExcludes_content', $_POST['_tour_pkgExcludes_content']);
		}
	}

	function render_tour_highlight_metabox($post)
	{
		$content = get_post_meta($post->ID, '_tour_highlight_content', true);
		wp_editor($content, 'tour_highlight_editor', array(
			'textarea_name' => '_tour_highlight_content',
			'editor_height' => 200,
			'textarea_rows' => 20
		));
	}

	function save_tour_highlight_metabox($post_id)
	{
		if (array_key_exists('_tour_highlight_content', $_POST)) {
			update_post_meta($post_id, '_tour_highlight_content', $_POST['_tour_highlight_content']);
		}
	}

	function tour_date_repeter_ajax()
	{
		// Get the newIndex value from the AJAX request
		$newIndex = isset($_POST['newIndex']) ? $_POST['newIndex'] : '';
		$editor_id = 'tour_itineraries_date_content_' . $newIndex;
		ob_start(); ?>

		<h4 class="tour-date-title">Day <?php echo $newIndex + 1; ?></h4>
		<div class="repeater-item-wrapper">
			<div class="repeater-item-content">
				<div class="tour-field">
					<div class="tour-label"><label for="tour_itineraries_date_title_<?php echo $newIndex; ?>">Title</label></div>
					<div class="tour-input"><input type="text" id="tour_itineraries_date_title_<?php echo $newIndex; ?>" name="tour_days[repeater][<?php echo $newIndex; ?>][tour_itineraies_item_title]" value=""></div>
				</div>

				<label for="tour_itineraries_date_content_<?php echo $newIndex; ?>">Content</label>
				<?php
				$content = '';
				$settings = array(
					'textarea_name' => "tour_days[repeater][$newIndex][tour_itineraries_date_content]",
					'editor_id' => $editor_id,
					'wpautop' => true, // Enable/disable wpautop (automatic paragraph formatting)
					'media_buttons' => true, // Show/hide the media buttons
					'teeny' => false, // Show minimal editor toolbars
					'tinymce' => true, // Load TinyMCE, can be used to load other WYSIWYG editor
				);
				$editor_id = 'tour_itineraries_date_content_' . $newIndex;
				wp_editor($content, $editor_id, $settings);

				?>

				<label for="tour_itineraries_date_heightlight_<?php echo $newIndex; ?>">Tour Higlight</label>
				<?php
				$content = '';
				$settings = array(
					'textarea_name' => "tour_days[repeater][$newIndex][tour_itineraries_date_heightlight]",
					'editor_id' => $editor_id,
					'wpautop' => true, // Enable/disable wpautop (automatic paragraph formatting)
					'media_buttons' => true, // Show/hide the media buttons
					'teeny' => false, // Show minimal editor toolbars
					'tinymce' => true, // Load TinyMCE, can be used to load other WYSIWYG editor
					'editor_height' => 200,
				);
				$editor_id = 'tour_itineraries_date_heightlight_' . $newIndex;
				wp_editor($content, $editor_id, $settings);

				?>
				<label for="tour_itineraries_date_image_<?php echo $newIndex; ?>">Image:</label>
				<div id="img-preview_<?php echo $newIndex; ?>"></div>
				<input type="text" id="tour_itineraries_date_image_<?php echo $newIndex; ?>" class="sub-field-image" name="tour_days[repeater][<?php echo $newIndex; ?>][tour_itineraries_date_image]" value="">
				<button class="upload-image-button" id="upload_image_button_<?php echo $newIndex; ?>">Upload Image</button>
			</div>
			<button class="remove-repeater-item">Remove</button>
		</div>

<?php



		//wp_editor($content, $editor_id, $args);
		$editor_html = ob_get_clean();

		echo $editor_html;

		wp_die();
	}

	// Enqueue necessary scripts and styles for wp_editor
	function enqueue_wp_editor_assets()
	{
		wp_enqueue_editor();
	}
}
