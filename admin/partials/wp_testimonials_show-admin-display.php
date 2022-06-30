<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       amjad.com
 * @since      1.0.0
 *
 * @package    Wp_testimonials_show
 * @subpackage Wp_testimonials_show/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php
add_action( 'admin_menu', 'rstar_wp_testimonials_plugin_menu_page' );

function rstar_wp_testimonials_plugin_menu_page() {
add_submenu_page(
	'edit.php?post_type=star_wp_testimonials',
	__( 'Settings', 'menu-test' ),
	__( 'Settings', 'menu-test' ),
	'manage_options',
	'testimonials-Settings',
	'star_wp_testimonials_plugin_page'
);
}


function star_wp_testimonials_plugin_page(){
	?>
	<div class="wpt-wrap-deah">
		<div class="welcome-text-wrap wrap banner-padd">
			<h2>Getting started with <strong>Star Testimonials WordPress Plugin</strong></h2>
			<p>Most customizable,Developer-friendly. Manage and display testimonials with an easy blocks and simple Shortcode Generator.</p>
		</div>
		<div class="Available-text-wrap wrap banner-padd">
		<h2 class="section-head-adk black-000">Layout options Available in Star Testimonials WordPress Plugin</h2>
		<div class="Available-block-here-akd">
		    <h3>List</h3>
		</div>
		<div class="Available-block-here-akd">
		    <h3>Grid</h3>
		</div>
        <div class="Available-block-here-akd">
		    <h3>Masonry</h3>
		</div>
        <div class="Available-block-here-akd">
		    <h3>Slider</h3>
		</div>
		</div>
	<?php
	}