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
			// This is where we add taxonomies to our CPT
			// "taxonomies" => ["category", "post_tag"],
			'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
		);

		register_post_type('sargia_tour', $args);
	}
	// add_action('init', 'register_sargia_tours_post_type');
	function add_tour_days_meta_box()
	{
		add_meta_box(
			'tour_days_meta_box',
			'Tour Days',
			array($this, 'display_tour_days_meta_box'),
			'sargia_tour',
			'normal',
			'high'
		);
	}
	function display_tour_days_meta_box($post)
	{
		// Retrieve existing tour days data
		$tour_days = get_post_meta($post->ID, 'tour_days', true);
		// Convert the stored JSON string to an array
		$tour_days = is_array($tour_days) ? $tour_days : array();

		ob_start(); // start buffer

		// inculde template file
		include_once(TOUR_MANAGEMENT_PLUGIN_PATH . 'admin/partials/tmpl-tour-custom-filed.php');

		$template =  ob_get_contents(); // reading content

		ob_end_clean();
		echo $template;





		// Display input fields for title, description, and images
?>

		<!-- <div class="tour-field">
			<div class="tour-label"><label for="tour_days_title">Title:</label></div>
			<div class="tour-input"><input type="text" id="tour_days_title" name="tour_days[title]" value="<?php echo isset($tour_days['title']) ? esc_attr($tour_days['title']) : ''; ?>"></div>
		</div>
		<div class="tour-field">
			<div class="tour-label"><label for="tour_days_description">Description:</label></div>
			<div class="tour-input"><textarea id="tour_days_description" name="tour_days[description]"><?php echo isset($tour_days['description']) ? esc_html($tour_days['description']) : ''; ?></textarea></div>
		</div>

		<div class="tour-field">
			<div class="tour-label"><label for="tour_days_images">Images:</label></div>
			<div class="tour-input"><input type="text" id="tour_days_images" name="tour_days[images]" value="<?php echo isset($tour_days['images']) ? esc_attr($tour_days['images']) : ''; ?>"></div>
			<small>Enter image URLs separated by commas.</small>
		</div> -->





		<script>
			// JavaScript to handle adding and removing repeater items
			// document.addEventListener('click', function(event) {
			// 	if (event.target.id === 'add-repeater-item') {
			// 		event.preventDefault(); // Prevent form submission

			// 		const wrapper = document.getElementById('repeater-fields');
			// 		const newIndex = wrapper.children.length;
			// 		const item = document.createElement('div');
			// 		item.className = 'repeater-item';
			// 		// Create a JavaScript object with the data to send
			// 		const data = {
			// 			action: 'my_custom_action',
			// 			newIndex: newIndex
			// 		};

			// 		// Send an AJAX request to the server
			// 		jQuery.post(ajaxurl, data, function(response) {

			// 			console.log('Response from server:', response);
			// 			item.innerHTML = response;
			// 			// const responseElement = document.getElementById('sub_field_2_' + newIndex);
			// 			// if (responseElement) {
			// 			// 	responseElement.innerHTML = response;
			// 			// }

			// 			// Reinitialize the editor: Remove the editor then add it back
			// 			tinymce.execCommand('mceRemoveEditor', false, 'tdmessagereply');
			// 			tinymce.execCommand('mceAddEditor', false, 'tdmessagereply');
			// 		});




			// 		wrapper.appendChild(item);
			// 	}
			// 	if (event.target.classList.contains('remove-repeater-item')) {
			// 		event.preventDefault(); // Prevent form submission

			// 		event.target.closest('.repeater-item').remove();
			// 	}
			// });

			// // Function to handle image upload
			// function handleImageUpload(index) {
			// 	let customUploader = wp.media({
			// 		title: 'Choose Image',
			// 		button: {
			// 			text: 'Choose Image'
			// 		},
			// 		multiple: false
			// 	});

			// 	customUploader.on('select', function() {
			// 		// console.log('click' + index);
			// 		let attachment = customUploader.state().get('selection').first().toJSON();
			// 		// console.log(attachment.url);
			// 		document.getElementById('sub_field_image_' + index).value = attachment.url;
			// 		const wrapper = document.getElementById('img-preview_' + index);
			// 		// console.log(attachment.url);
			// 		const item = document.createElement('div');

			// 		item.innerHTML = `<img src=${attachment.url} width="100px">`;
			// 		wrapper.appendChild(item);
			// 	});

			// 	customUploader.open();
			// }

			// // Event listener for image upload buttons
			// document.addEventListener('click', function(event) {

			// 	if (event.target.classList.contains('upload-image-button')) {
			// 		event.preventDefault(); // Prevent form submission

			// 		let index = event.target.id.split('_')[3];
			// 		handleImageUpload(index);
			// 		// /console.log(index)
			// 	}
			// });
		</script>
	<?php
	}

	function save_tour_days_meta_box($post_id)
	{
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

		if (!current_user_can('edit_post', $post_id)) return;

		// Save tour days data
		if (isset($_POST['tour_days'])) {
			$tour_days_data = array(
				'title' => sanitize_text_field($_POST['tour_days']['title']),
				'description' => wp_kses_post($_POST['tour_days']['description']),
				'images' => sanitize_text_field($_POST['tour_days']['images']),
				'repeater' => array(),
			);

			if (isset($_POST['tour_days']['repeater']) && is_array($_POST['tour_days']['repeater'])) {
				foreach ($_POST['tour_days']['repeater'] as $repeater_item) {
					$repeater_item_data = array(
						'sub_field_1' => isset($repeater_item['sub_field_1']) ? sanitize_text_field($repeater_item['sub_field_1']) : '',
						'sub_field_2' => isset($repeater_item['sub_field_2']) ? sanitize_text_field($repeater_item['sub_field_2']) : '',
						'sub_field_image' => isset($repeater_item['sub_field_image']) ? esc_url($repeater_item['sub_field_image']) : '',
					);

					$tour_days_data['repeater'][] = $repeater_item_data;
				}
			}
			update_post_meta($post_id, 'tour_days', $tour_days_data);
		}
	}




	function tour_date_repeter_ajax()
	{
		// Get the newIndex value from the AJAX request
		$newIndex = isset($_POST['newIndex']) ? $_POST['newIndex'] : '';
		$editor_id = 'sub_field_2_' . $newIndex;
		ob_start(); ?>

		<h4 class="tour-date-title">Day <?php echo $newIndex + 1; ?></h4>
		<div class="repeater-item-wrapper">
			<div class="repeater-item-content">
				<div class="tour-field">
					<div class="tour-label"><label for="sub_field_1_<?php echo $newIndex; ?>">Title</label></div>
					<div class="tour-input"><input type="text" id="sub_field_1_<?php echo $newIndex; ?>" name="tour_days[repeater][<?php echo $newIndex; ?>][sub_field_1]" value=""></div>
				</div>

				<label for="sub_field_2_<?php echo $newIndex; ?>">Content</label>
				<?php
				$content = '';
				$editor_id = 'sub_field_2_' . $newIndex;
				wp_editor($content, $editor_id, array(
					'textarea_name' => "tour_days[repeater][$newIndex][sub_field_2]",
				));

				?>
				<label for="sub_field_image_<?php echo $newIndex; ?>">Image:</label>
				<div id="img-preview_<?php echo $newIndex; ?>"></div>
				<input type="text" id="sub_field_image_<?php echo $newIndex; ?>" class="sub-field-image" name="tour_days[repeater][<?php echo $newIndex; ?>][sub_field_image]" value="">
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
}
