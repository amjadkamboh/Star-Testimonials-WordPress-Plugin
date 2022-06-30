<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       amjad.com
 * @since      1.0.0
 *
 * @package    Wp_testimonials_show
 * @subpackage Wp_testimonials_show/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_testimonials_show
 * @subpackage Wp_testimonials_show/admin
 * @author     Amjad Kamboh <amjad@gmail.com>
 */
class Wp_testimonials_show_Admin {

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
public function __construct( $plugin_name, $version ) {

	$this->plugin_name = $plugin_name;
	$this->version = $version;

}

/**
 * Register the stylesheets for the admin area.
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

	wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp_testimonials_show-admin.css', array(), $this->version, 'all' );

}

/**
 * Register the JavaScript for the admin area.
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

	wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp_testimonials_show-admin.js', array( 'jquery' ), $this->version, false );

}

}




/* Custom Post Type Start */
function create_posttype() {
register_post_type( 'star_wp_testimonials',
					// CPT Options
					array(
						'labels' => array(
							'name' => __( 'Star Testimonials' ),
							'singular_name' => __( 'testimonials' )
						),
						'public' => true,
						'has_archive' => false,
						'rewrite' => array('slug' => 'testimonials'),
						'supports'=> array( 'title', 'editor', 'thumbnail' ),
					)
					);
}
// hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


abstract class star_wp_testimonials_Meta_Box {

/**
 * Set up and add the meta box.
 */
public static function add() {
	$screens = [ 'star_wp_testimonials' ];
	foreach ( $screens as $screen ) {
		add_meta_box(
			'star_wp_testimonials_box_id',          // Unique ID
			'Reviewer Information', // Box title
			[ self::class, 'html' ],   // Content callback, must be of type callable
			$screen                  // Post type
		);
	}
}

/**
 * Save the meta box.
 *
 * @param int $post_id  The post ID.
 */
public static function save( int $post_id ) {
	if ( array_key_exists( 'star_wp_testimonials_field_name', $_POST ) ) {
		update_post_meta(
			$post_id,
			'_star_wp_testimonials_meta_key_name',
			$_POST['star_wp_testimonials_field_name']
		);
	}
	if ( array_key_exists( 'star_wp_testimonials_field_position', $_POST ) ) {
		update_post_meta(
			$post_id,
			'_star_wp_testimonials_meta_key_position',
			$_POST['star_wp_testimonials_field_position']
		);
	}
}

/**
 * Display the meta box HTML to the user.
 *
 * @param \WP_Post $post   Post object.
 */
public static function html( $post ) {
	$valuename = get_post_meta( $post->ID, '_star_wp_testimonials_meta_key_name', true );
	$valueposition = get_post_meta( $post->ID, '_star_wp_testimonials_meta_key_position', true );
?>
	<div class=col-meta-holder>
		<label for="star_wp_testimonials_field_name">Full Name</label>
		<input name="star_wp_testimonials_field_name" id="star_wp_testimonials_field_name"  value="<?php echo $valuename ?>" class="postbox">
	</div>
	<div class=col-meta-holder>
		<label for="star_wp_testimonials_field_position">Position or Identity</label>
		<input name="star_wp_testimonials_field_position" id="star_wp_testimonials_field_position"  value="<?php echo $valueposition ?>" class="postbox">
	</div>
<?php
}
}

add_action( 'add_meta_boxes', [ 'star_wp_testimonials_Meta_Box', 'add' ] );
add_action( 'save_post', [ 'star_wp_testimonials_Meta_Box', 'save' ] );


