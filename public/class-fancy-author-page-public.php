<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/salimserdar/
 * @since      1.0.0
 *
 * @package    Fancy_Author_Page
 * @subpackage Fancy_Author_Page/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Fancy_Author_Page
 * @subpackage Fancy_Author_Page/public
 * @author     Salim Serdar Koksal <salimserdar@gmail.com>
 */
class Fancy_Author_Page_Public {

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
		 * defined in Fancy_Author_Page_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fancy_Author_Page_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fancy-author-page-public.css', array(), $this->version, 'all' );

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
		 * defined in Fancy_Author_Page_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fancy_Author_Page_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/fancy-author-page-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the shortcodes.
	 *
	 * @since    1.0.0
	 */
	public function register_shortcodes() {
		add_shortcode( 'fancy-author', array( $this, 'fancy_author_page_shortcode') );
	}

	public function fancy_author_page_shortcode() {

 
		$args = array( 'role'=> 'author' );

		$authors = get_users( $args );
	
		foreach ($authors as $author) {

			$all_meta_for_user = get_user_meta( $author->ID );

			$author_page_url = get_author_posts_url( $author->ID, $author->nickname );

			echo "<a href=\"$author_page_url\">";
	
			echo '<span class="user-name">' .  $author->display_name . '</span>';

			echo '</a>';

			echo '<span class="user-email">' . $author->user_email . '</span>';
	
			echo '<div class="social-media">';
	
			if ( isset($all_meta_for_user["facebook"][0]) ) {
				echo '<span class="facebook">' . $all_meta_for_user["facebook"][0] . '</span>';
			}

			if ( isset($all_meta_for_user["twitter"][0]) ) {
				echo '<span class="twitter">' . $all_meta_for_user["twitter"][0] . '</span>';
			}

			if ( isset($all_meta_for_user["instagram"][0]) ) {
				echo '<span class="instagram">' . $all_meta_for_user["instagram"][0] . '</span>';
			}
			
			echo '</div>';
			
		}
	
	}

	function author_page( $template ) {

		if ( is_author() ) {  
			$new_template = plugin_dir_path( __DIR__ ) . 'page-template/authour-page-template.php';
			if ( !empty( $new_template ) ) {
				return $new_template;
			}
		}

		return $template;
	}



}
