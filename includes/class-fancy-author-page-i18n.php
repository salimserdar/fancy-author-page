<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/salimserdar/
 * @since      1.0.0
 *
 * @package    Fancy_Author_Page
 * @subpackage Fancy_Author_Page/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Fancy_Author_Page
 * @subpackage Fancy_Author_Page/includes
 * @author     Salim Serdar Koksal <salimserdar@gmail.com>
 */
class Fancy_Author_Page_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'fancy-author-page',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
