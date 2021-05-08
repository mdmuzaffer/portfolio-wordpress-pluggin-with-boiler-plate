<?php

/**
 * Fired during plugin activation
 *
 * @link       http://github.com/mdmuzaffer
 * @since      1.0.0
 *
 * @package    Portfolio
 * @subpackage Portfolio/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Portfolio
 * @subpackage Portfolio/includes
 * @author     Muzaffer <developerphp1995@gmail.com>
 */
class Portfolio_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

	public function activate() {
		global $wpdb;
		
		if($wpdb->get_var("SHOW tables like'".$this->wp_portfolio_books()."'") != $this->wp_portfolio_books()){

		//dynamic table generate code
		$table_query ="CREATE TABLE `".$this->wp_portfolio_books()."` (
						 `id` int(11) NOT NULL AUTO_INCREMENT,
						 `name` varchar(150) DEFAULT NULL,
						 `amount` int(150) DEFAULT NULL,
						 `description` text DEFAULT NULL,
						 `self_id` tinyint(11) DEFAULT NULL,
						 `book_image` varchar(150) DEFAULT NULL,
						 `email` varchar(150) DEFAULT NULL,
						 `status` tinyint(4) NOT NULL DEFAULT 1,
						 `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
						 PRIMARY KEY (`id`)
						) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

		require_once(ABSPATH.'wp-admin/includes/upgrade.php');
		dbDelta($table_query);
		}

		// Create other portfolio self book
		if($wpdb->get_var("SHOW tables like'".$this->wp_portfolio_book_self()."'") != $this->wp_portfolio_book_self()){
			$table_query_self ="CREATE TABLE `wp_portfolio_book_self` (
				 `id` int(11) NOT NULL AUTO_INCREMENT,
				 `self_name` varchar(250) NOT NULL,
				 `capacity` int(150) NOT NULL,
				 `self_location` varchar(250) NOT NULL,
				 `status` int(11) NOT NULL DEFAULT 1,
				 `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
				 PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
			require_once(ABSPATH.'wp-admin/includes/upgrade.php');

			dbDelta($table_query_self);

			// insert dummy data when plugin active
			$ooks_insert = "INSERT INTO ".$this->wp_portfolio_book_self()."(
			self_name, capacity, self_location, status) VALUES
			('Math', 100, 'Right corner', 1),
			('Chemistry', 150, 'Left corner', 1),
			('Physic', 200, 'Middle', 1)";
			$wpdb->query($ooks_insert);

		}
		//Create page when active plugin active

		$pageData = $wpdb->get_row( 
			$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."posts WHERE post_name = %s", 'book_tool')
		);
		if(!empty($pageData)){
			//Already page created
			//print_r($pageData);
			//die('gggggggggggggg');
		}else{
			//Page new create when active
			$post_array_data = array(
				'post_name' 			=> 'book_tool',
		        'post_title'            => 'Book toole',
		        'post_content'          => 'This is the page content of book toole',
		        'post_status'           => 'publish',
		        'post_type'             => 'page',
		        'post_author'           => 1
			);
			// Insert the post into the database.
			wp_insert_post( $post_array_data );
		}

	}

	public function wp_portfolio_books(){
		global $wpdb;
		return $wpdb->prefix."portfolio_books"; // $wpdb->prefix =wp_
	}

	public function wp_portfolio_book_self(){
		global $wpdb;
		return $wpdb->prefix."portfolio_book_self"; // $wpdb->prefix =wp_
	}

}
