<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              amjad.com
 * @since             1.0.0
 * @package           Wp_testimonials_show
 *
 * @wordpress-plugin
 * Plugin Name:       Star Testimonials WordPress Plugin
 * Plugin URI:        amjad.com
 * Description:       Star Testimonials is the Best Testimonials Plugin to display testimonials, customer reviews, or quotes.
 * Version:           1.0.0
 * Author:            Amjad Kamboh
 * Author URI:        amjad.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp_testimonials_show
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_TESTIMONIALS_SHOW_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp_testimonials_show-activator.php
 */
function activate_wp_testimonials_show() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp_testimonials_show-activator.php';
	Wp_testimonials_show_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp_testimonials_show-deactivator.php
 */
function deactivate_wp_testimonials_show() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp_testimonials_show-deactivator.php';
	Wp_testimonials_show_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_testimonials_show' );
register_deactivation_hook( __FILE__, 'deactivate_wp_testimonials_show' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp_testimonials_show.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_testimonials_show() {

	$plugin = new Wp_testimonials_show();
	$plugin->run();

}
run_wp_testimonials_show();

require_once plugin_dir_path( __FILE__ ) . 'admin/partials/wp_testimonials_show-admin-display.php';
