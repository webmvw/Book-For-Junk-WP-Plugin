<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://webmkit.com
 * @since      1.0.0
 *
 * @package    Book_For_Junk
 * @subpackage Book_For_Junk/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Book_For_Junk
 * @subpackage Book_For_Junk/includes
 * @author     Md. Masud Rana <masudrana.bbpi@gmail.com>
 */
class Book_For_Junk_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

		global $wpdb;

		// delete page when plugin deactivate
		$get_data = $wpdb->get_row(
			$wpdb->prepare("SELECT ID FROM {$wpdb->prefix}posts WHERE post_name = %s", 'mts_junk_book')
		); 
		$page_id = $get_data->ID;
		if($page_id > 0){
			wp_delete_post($page_id, true);
		}

	}

}
