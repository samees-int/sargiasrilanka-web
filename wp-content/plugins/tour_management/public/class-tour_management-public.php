<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://interlective.com/
 * @since      1.0.0
 *
 * @package    Tour_management
 * @subpackage Tour_management/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Tour_management
 * @subpackage Tour_management/public
 * @author     samees sandaruwan <samees@interlective.com>
 */
class Tour_management_Public
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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/tour_management-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/tour_management-public.js', array('jquery'), $this->version, false);
	}

	public function load_tour_info()
	{
		ob_start();
		include_once TOUR_MANAGEMENT_PLUGIN_PATH . '/public/partials/tmpl-load-tour-info.php';
		$template = ob_get_contents();
		ob_end_clean();
		echo $template;
	}
}
