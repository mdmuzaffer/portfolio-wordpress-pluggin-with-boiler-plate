<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://github.com/mdmuzaffer
 * @since      1.0.0
 *
 * @package    Portfolio
 * @subpackage Portfolio/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Portfolio
 * @subpackage Portfolio/includes
 * @author     Muzaffer <developerphp1995@gmail.com>
 */
class Portfolio_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function deactivate() {
		global $wpdb;

		// delete table wp_portfolio_book_self when uninstall plugin
		if($wpdb->get_var("SHOW tables like'".$this->wp_portfolio_books_delete()."'") == $this->wp_portfolio_books_delete()) {
			$sql = "DROP TABLE IF EXISTS ".$this->wp_portfolio_books_delete();
		    $wpdb->get_var($sql);
		}

		// delete table wp_portfolio_book_self when uninstall plugin
		if($wpdb->get_var("SHOW tables like'".$this->wp_portfolio_book_self_delete()."'") == $this->wp_portfolio_book_self_delete()) {
			$sql = "DROP TABLE IF EXISTS ".$this->wp_portfolio_book_self_delete();
		    $wpdb->get_var($sql);
		}

		// Page delete when plugin dactive
		$page_query = $wpdb->get_row( 
			$wpdb->prepare("SELECT ID FROM ".$wpdb->prefix."posts WHERE post_name = %s", 'book_tool')
		);
		wp_delete_post($page_query->ID, True);

	}

	public function wp_portfolio_books_delete(){
		global $wpdb;
		return $wpdb->prefix."portfolio_books"; // $wpdb->prefix =wp_
	}

	public function wp_portfolio_book_self_delete(){
		global $wpdb;
		return $wpdb->prefix."portfolio_book_self"; // $wpdb->prefix =wp_
	}


}
