<?php

/**
 * Fired during plugin activation
 *
 * @link       https://webmkit.com
 * @since      1.0.0
 *
 * @package    Book_For_Junk
 * @subpackage Book_For_Junk/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Book_For_Junk
 * @subpackage Book_For_Junk/includes
 * @author     Md. Masud Rana <masudrana.bbpi@gmail.com>
 */
class Book_For_Junk_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		/**
		 * Create page when plugin active
		 *
		 */
		$post_arr_data = array(
			'post_title' => 'MTS Junk Book',
			'post_name' => 'mts_junk_book',
			'post_content' => '[mts_junk_book]',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_type' => 'page'
		);
		wp_insert_post( $post_arr_data );

	}

}
