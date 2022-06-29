<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       amjad.com
 * @since      1.0.0
 *
 * @package    Wp_testimonials_show
 * @subpackage Wp_testimonials_show/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_testimonials_show
 * @subpackage Wp_testimonials_show/public
 * @author     Amjad Kamboh <amjad@gmail.com>
 */
class Wp_testimonials_show_Public {

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
public function __construct( $plugin_name, $version ) {

	$this->plugin_name = $plugin_name;
	$this->version = $version;

}

/**
 * Register the stylesheets for the public-facing side of the site.
 *
 * @since    1.0.0
 */
public function enqueue_styles() {

	/**
	 * This function is provided for demonstration purposes only.
	 *
	 * An instance of this class should be passed to the run() function
	 * defined in Wp_testimonials_show_Loader as all of the hooks are defined
	 * in that particular class.
	 *
	 * The Wp_testimonials_show_Loader will then create the relationship
	 * between the defined hooks and the functions defined in this
	 * class.
	 */

	wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp_testimonials_show-public.css', array(), $this->version, 'all' );

}

/**
 * Register the JavaScript for the public-facing side of the site.
 *
 * @since    1.0.0
 */
public function enqueue_scripts() {

	/**
	 * This function is provided for demonstration purposes only.
	 *
	 * An instance of this class should be passed to the run() function
	 * defined in Wp_testimonials_show_Loader as all of the hooks are defined
	 * in that particular class.
	 *
	 * The Wp_testimonials_show_Loader will then create the relationship
	 * between the defined hooks and the functions defined in this
	 * class.
	 */

	wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp_testimonials_show-public.js', array( 'jquery' ), $this->version, false );

}

}


// function that runs when shortcode is called
function star_wp_testimonial() { 
	$args = array(  
		'post_type' => 'star_wp_testimonials',
		'posts_per_page' => -1, 
	);

	$loop = new WP_Query( $args ); 
	$dotml = '';
	$dotml .= '<div class="star-testimonials-simp-section">';
	if( $loop->have_posts() ) {
		while ( $loop->have_posts() ) : $loop->the_post(); 
		$valuename_public = get_post_meta( get_the_ID() , '_star_wp_testimonials_meta_key_name');
		$valuepostion_public = get_post_meta( get_the_ID() , '_star_wp_testimonials_meta_key_position');

		$dotml .= '<div class="star-testimonials-single-l">';
			$dotml .= '<div class="star-testimonials-text">';
			$dotml .= '<h2>'. get_the_title() .'</h2>';
			$dotml .= ''. get_the_content() .'</div>';
			$dotml .= '<div  class="star-testimonials-img-wrap"><div class="single-img-lis">'. get_the_post_thumbnail() .'</div>';
			$dotml .= '<div class="star-testimonials-author-box">';
				$dotml .= ' <span class="name_author"> '.$valuename_public[0].'</span>';
				$dotml .= ' <span class="name_position"> '.$valuepostion_public[0].'</span>';
			$dotml .= '</div>';
			$dotml .= '</div>';
		$dotml .= '</div>';
		endwhile;

		wp_reset_postdata(); 
	}
	$dotml .= '</div>';
	return $dotml;


}
// register shortcode
add_shortcode('star_testimonial', 'star_wp_testimonial');