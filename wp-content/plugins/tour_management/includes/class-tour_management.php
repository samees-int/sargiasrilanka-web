<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://interlective.com/
 * @since      1.0.0
 *
 * @package    Tour_management
 * @subpackage Tour_management/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Tour_management
 * @subpackage Tour_management/includes
 * @author     samees sandaruwan <samees@interlective.com>
 */
class Tour_management
{

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Tour_management_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct()
	{
		if (defined('TOUR_MANAGEMENT_VERSION')) {
			$this->version = TOUR_MANAGEMENT_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'tour_management';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Tour_management_Loader. Orchestrates the hooks of the plugin.
	 * - Tour_management_i18n. Defines internationalization functionality.
	 * - Tour_management_Admin. Defines all hooks for the admin area.
	 * - Tour_management_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies()
	{

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-tour_management-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-tour_management-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-tour_management-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-tour_management-public.php';

		$this->loader = new Tour_management_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Tour_management_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale()
	{

		$plugin_i18n = new Tour_management_i18n();

		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks()
	{

		$plugin_admin = new Tour_management_Admin($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');


		// $this->loader->add_action('admin_menu', $plugin_admin, 'tour_management_cpt');
		$this->loader->add_action('init', $plugin_admin, 'register_sargia_tours_post_type');
		$this->loader->add_action('init', $plugin_admin, 'cptui_register_my_taxes_tour_destination');
		$this->loader->add_action('add_meta_boxes', $plugin_admin, 'add_tour_days_meta_box');
		$this->loader->add_action('save_post', $plugin_admin, 'save_tour_days_meta_box');
		$this->loader->add_action('wp_ajax_tour_date_repeter_ajax',  $plugin_admin, 'tour_date_repeter_ajax');
		$this->loader->add_action('wp_ajax_nopriv_tour_date_repeter_ajax',  $plugin_admin, 'tour_date_repeter_ajax');
		// $this->loader->add_action('add_meta_boxes',  $plugin_admin, 'add_map_image');
		$this->loader->add_action('init', $plugin_admin, 'register_tour_attribute_taxonomy');
		$this->loader->add_action('init', $plugin_admin, 'register_tour_interests_taxonomy');
		$this->loader->add_action('save_post', $plugin_admin, 'save_tour_highlight_metabox');
		$this->loader->add_action('save_post', $plugin_admin, 'save_tour_pkgIncludes_metabox'); // save  tour_pkg Includes 
		$this->loader->add_action('save_post', $plugin_admin, 'save_tour_pkgExcludes_metabox'); // save  tour_pkg Includes 
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_wp_editor_assets');
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks()
	{

		$plugin_public = new Tour_management_Public($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');

		add_shortcode('render-tour-info', array($plugin_public, "load_tour_info"));
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run()
	{
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Tour_management_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}
}
