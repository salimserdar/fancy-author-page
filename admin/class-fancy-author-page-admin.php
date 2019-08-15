<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/salimserdar/
 * @since      1.0.0
 *
 * @package    Fancy_Author_Page
 * @subpackage Fancy_Author_Page/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Fancy_Author_Page
 * @subpackage Fancy_Author_Page/admin
 * @author     Salim Serdar Koksal <salimserdar@gmail.com>
 */
class Fancy_Author_Page_Admin {

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
		 * defined in Fancy_Author_Page_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fancy_Author_Page_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fancy-author-page-admin.css', array(), $this->version, 'all' );

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
		 * defined in Fancy_Author_Page_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fancy_Author_Page_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/fancy-author-page-admin.js', array( 'jquery' ), $this->version, false );

	}

	 /**
	 * Show custom user profile fields
	 * 
	 * @param  object $profileuser A WP_User object
	 * @return void
	 */
	public function custom_user_profile_fields($user){
		
		if(is_object($user)) {
			$facebook = esc_attr( get_the_author_meta( 'facebook', $user->ID ) );
			$twitter = esc_attr( get_the_author_meta( 'twitter', $user->ID ) );
			$instagram = esc_attr( get_the_author_meta( 'instagram', $user->ID ) ); }
		else {
			$facebook = null;
			$twitter = null;
			$instagram = null;
		}
		?>
		<h3>Extra profile information</h3>
		<table class="form-table">
			<tr>
				<th><label for="facebook">Facebook</label></th>
				<td>
					<input type="text" class="regular-text" name="facebook" value="<?php echo $facebook; ?>" id="facebook" /><br />
				</td>
			</tr>
			<tr>
				<th><label for="twitter">Twitter</label></th>
				<td>
					<input type="text" class="regular-text" name="twitter" value="<?php echo $twitter; ?>" id="twitter" /><br />
				</td>
			</tr>
			<tr>
				<th><label for="instagram">Instagram</label></th>
				<td>
					<input type="text" class="regular-text" name="instagram" value="<?php echo $instagram; ?>" id="instagram" /><br />
				</td>
			</tr>
		</table>
		<?php
	}

	public function save_custom_user_profile_fields($user_id){
		# again do this only if you can
		if(!current_user_can('manage_options'))
			return false;
	 
		# save my custom field
		update_user_meta($user_id, 'facebook', $_POST['facebook']);
		update_user_meta($user_id, 'twitter', $_POST['twitter']);
		update_user_meta($user_id, 'instagram', $_POST['instagram']);
	}

}
