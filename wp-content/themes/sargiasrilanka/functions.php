<?php

/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// UnderStrap's includes directory.
$sargiasrilanka_inc_dir = 'inc';

// Array of files to include.
$sargiasrilanka_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/sargiasrilanka/sargiasrilanka/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/ajax-filter/tour-ajax-filter.php',
);

// Load WooCommerce functions if WooCommerce is activated.
if (class_exists('WooCommerce')) {
	$sargiasrilanka_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if (class_exists('Jetpack')) {
	$sargiasrilanka_includes[] = '/jetpack.php';
}

// Include files.
foreach ($sargiasrilanka_includes as $file) {
	require_once get_theme_file_path($sargiasrilanka_inc_dir . $file);
}



function member_add_meta_box()
{
	//this will add the metabox for the member post type
	$screens = array('tour_package');

	foreach ($screens as $screen) {

		add_meta_box(
			'member_sectionid',
			__('Member Details', 'member_textdomain'),
			'member_meta_box_callback',
			$screen
		);
	}
}
add_action('add_meta_boxes', 'member_add_meta_box');

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function member_meta_box_callback($post)
{

	// Add a nonce field so we can check for it later.
	wp_nonce_field('member_save_meta_box_data', 'member_meta_box_nonce');

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta($post->ID, '_my_meta_value_key', true);

?>
	<div class="repeater-wrapper">
		<label for="repeater_field">Repeater Field</label>
		<div class="repeater-fields">
			<?php
			if (!empty($repeater_data)) {
				foreach ($repeater_data as $index => $repeater_item) {
			?>
					<div class="repeater-item">
						<input type="text" name="repeater_field[<?php echo $index; ?>][sub_field_1]" value="<?php echo esc_attr($repeater_item['sub_field_1']); ?>" placeholder="Sub Field 1">
						<input type="text" name="repeater_field[<?php echo $index; ?>][sub_field_2]" value="<?php echo esc_attr($repeater_item['sub_field_2']); ?>" placeholder="Sub Field 2">
						<button class="remove-repeater-item">Remove</button>
					</div>
			<?php
				}
			}
			?>
		</div>
		<button class="add-repeater-item">Add Item</button>
	</div>

	<script>
		// JavaScript to handle adding and removing repeater items
		// You'll need to add your custom JavaScript logic here
		// For simplicity, a basic implementation is provided below
		document.addEventListener('click', function(event) {
			if (event.target.classList.contains('add-repeater-item')) {
				const wrapper = document.querySelector('.repeater-fields');
				const item = document.querySelector('.repeater-item:first-child').cloneNode(true);
				wrapper.appendChild(item);
			}
			if (event.target.classList.contains('remove-repeater-item')) {
				event.target.closest('.repeater-item').remove();
			}
		});
	</script>
<?php
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function member_save_meta_box_data($post_id)
{

	if (!isset($_POST['member_meta_box_nonce'])) {
		return;
	}

	if (!wp_verify_nonce($_POST['member_meta_box_nonce'], 'member_save_meta_box_data')) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	// Check the user's permissions.
	if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {

		if (!current_user_can('edit_page', $post_id)) {
			return;
		}
	} else {

		if (!current_user_can('edit_post', $post_id)) {
			return;
		}
	}

	if (!isset($_POST['member_new_field'])) {
		return;
	}

	$my_data = sanitize_text_field($_POST['member_new_field']);

	update_post_meta($post_id, '_my_meta_value_key', $my_data);
}
add_action('save_post', 'member_save_meta_box_data');


remove_filter('get_the_excerpt', 'wp_trim_excerpt');
