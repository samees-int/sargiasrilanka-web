<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://interlective.com/
 * @since             1.0.0
 * @package           Tour_management
 *
 * @wordpress-plugin
 * Plugin Name:       Tour management Sam
 * Plugin URI:        https://interlective.com/
 * Description:       This is a description of the plugin.
 * Version:           1.0.0
 * Author:            samees sandaruwan
 * Author URI:        https://interlective.com//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tour_management
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('TOUR_MANAGEMENT_VERSION', '1.0.0');
define('TOUR_MANAGEMENT_PLUGIN_PATH', plugin_dir_path(__FILE__));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tour_management-activator.php
 */
function activate_tour_management()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-tour_management-activator.php';
	Tour_management_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tour_management-deactivator.php
 */
function deactivate_tour_management()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-tour_management-deactivator.php';
	Tour_management_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_tour_management');
register_deactivation_hook(__FILE__, 'deactivate_tour_management');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-tour_management.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tour_management()
{

	$plugin = new Tour_management();
	$plugin->run();
}
run_tour_management();
