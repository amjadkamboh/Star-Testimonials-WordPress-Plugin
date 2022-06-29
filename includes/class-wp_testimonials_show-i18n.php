<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       amjad.com
 * @since      1.0.0
 *
 * @package    Wp_testimonials_show
 * @subpackage Wp_testimonials_show/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_testimonials_show
 * @subpackage Wp_testimonials_show/includes
 * @author     Amjad Kamboh <amjad@gmail.com>
 */
class Wp_testimonials_show_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp_testimonials_show',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
