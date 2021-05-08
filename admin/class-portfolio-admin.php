<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://github.com/mdmuzaffer
 * @since      1.0.0
 *
 * @package    Portfolio
 * @subpackage Portfolio/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Portfolio
 * @subpackage Portfolio/admin
 * @author     Muzaffer <developerphp1995@gmail.com>
 */
class Portfolio_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 * @uses register_post_type()
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
		 * defined in Portfolio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Portfolio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/portfolio-admin.css', array(), $this->version, 'all' );

		$valid_page = array('portfolio-page', 'add-portfolio','tutorial','create-book-self','book-self-list','add-book','book-list');

		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";

		if(in_array($page, $valid_page)){

		wp_enqueue_style("bootstrap", PORTFOLIO_PLUGIN_URL . 'assets/css/bootstrap.min.css', array(), $this->version, 'all' );

		wp_enqueue_style("dataTables", PORTFOLIO_PLUGIN_URL . 'assets/css/jquery.dataTables.min.css', array(), $this->version, 'all' );

		wp_enqueue_style("sweetAlerts", PORTFOLIO_PLUGIN_URL . 'assets/css/sweetalert.css', array(), $this->version, 'all' );
		}

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
		 * defined in Portfolio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Portfolio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/portfolio-admin.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script("bootstrap-js", PORTFOLIO_PLUGIN_URL . 'assets/js/bootstrap.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script("dataTables-js", PORTFOLIO_PLUGIN_URL . 'assets/js/jquery.dataTables.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script("validate-js", PORTFOLIO_PLUGIN_URL . 'assets/js/jquery.validate.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script("sweetalert-js", PORTFOLIO_PLUGIN_URL . 'assets/js/sweetalert.min.js', array( 'jquery' ), $this->version, false );

		wp_localize_script($this->plugin_name, 'admin_ajax',  array(
			'name' =>'portfolio-muzaffer', 
			'author' =>'Muzaffer', 
			'adminajaxUrl' => admin_url('admin-ajax.php'),
		));
	}

	// create menu function for admin menu
	public function portfolio_menu(){
		//add menu page 
		add_menu_page( 'Custom Menu Page Title', 'Portfolio', 'manage_options', 'portfolio-page',  array($this, 'create_book_self'), 'dashicons-format-image', 23 );
		
		//add sub menu page(create book self)
		add_submenu_page('portfolio-page','Add book','Create Book Self','manage_options','create-book-self',array($this, 'create_book_self'));

		// Create book page self list
		add_submenu_page('portfolio-page','Book list','Book self list','manage_options','book-self-list',array($this, 'book_self_list'));
		// Add books
		add_submenu_page('portfolio-page','Add Book','Add Book','manage_options','add-book',array($this, 'add_book'));

		// Book list
		add_submenu_page('portfolio-page','Book list','Book list','manage_options','book-list',array($this, 'book_list'));

		add_submenu_page('portfolio-page','Add portfolo','Add Portfolio','manage_options', 'post-new.php?post_type=tutorial');

		add_submenu_page('portfolio-page','List portfolo','List Portfolio', 'manage_options', 'edit.php?post_type=tutorial');

	}

	public function book_self_list(){

		//echo"<h2> Welcome to portfolio dashboard 1</h3>";
		global $wpdb;
		//$user_email = $wpdb->get_var("select user_email from wp_users where ID =1");
		//$user_email = $wpdb->get_row("select * from wp_users where ID =1");
		//$user_email = $wpdb->get_row("select * from wp_users where ID =1", ARRAY_A);
		//$post_title = $wpdb->get_col("select post_title from wp_posts");
		//$post_title = $wpdb->get_results("select * from wp_posts");
		// this is the prepare statement 
		//$post_row = $wpdb->get_row($wpdb->prepare("select * from wp_posts where ID = %d",1));
		//echo"<pre>";
		//print_r($post_row);
		$table = $wpdb->prefix.'portfolio_book_self';
		$bookData = $wpdb->get_results($wpdb->prepare("select * from ". $table, ""));
		/*echo"<pre>";
		print_r($bookData);*/

		ob_start();
	    include_once(PORTFOLIO_PLUGIN_PATH."admin/partials/temp-book-self-list.php"); 
	    $temp_content = ob_get_contents();
	    ob_end_clean();
	    echo $temp_content;

	}

	// create book self
	public function create_book_self(){

		ob_start();
	    include_once(PORTFOLIO_PLUGIN_PATH."admin/partials/temp-add-book-self.php"); 
	    $temp_content = ob_get_contents();
	    ob_end_clean();
	    echo $temp_content;

	}
	
	   // Book list menu
	public function book_list(){
		global $wpdb;

		/*$table = $wpdb->prefix.'portfolio_books';
		$bookData = $wpdb->get_results($wpdb->prepare(
			"select * from ". $table, ""
		));*/
	
		$table = $wpdb->prefix.'portfolio_books';
		$table2 = $wpdb->prefix.'portfolio_book_self';

		/*$bookData = $wpdb->get_results($wpdb->prepare(
			"select * from ".$table." pb LEFT JOIN ".$table2." pbs on pbs.id = pb.self_id"
		));*/


		$bookData = $wpdb->get_results($wpdb->prepare(
			"select pb.*, pbs.self_name from ".$table." as pb LEFT JOIN ".$table2." as pbs on pbs.id = pb.self_id"
		));

	//select * from wp_user_reviews ur LEFT JOIN wp_users u on u.id = ur.wp_user_id
		ob_start();
	    include_once(PORTFOLIO_PLUGIN_PATH."admin/partials/tepm-book-list.php"); 
	    $temp_content = ob_get_contents();
	    ob_end_clean();
	    echo $temp_content;

	}

	// Add Book
	public function add_book(){

		global $wpdb;
		$table = $wpdb->prefix.'portfolio_book_self';
		$bookself = $wpdb->get_results($wpdb->prepare("select id, self_name from ". $table, ""));

		ob_start();
	    include_once(PORTFOLIO_PLUGIN_PATH."admin/partials/temp-add-book.php"); 
	    $temp_content = ob_get_contents();
	    ob_end_clean();
	    echo $temp_content;

	}

	// creating custom post in add_sub_menu option
	function njengah_tutorial_cpt(){
    	$labels = array(
           'name'               =>   _x('Tutorials', 'post type general name'),
           'singular_name'=>   _x('Tutorial', 'post type singular name'),
           'menu_name'          =>   _x('Portfolio', 'admin menu'),
           'name_admin_bar'     =>   _x('Tutorial', 'add new on admin bar'),
           'add_new'                    =>   _x('Add New', ''),
           'add_new_item'        =>   __('Add New tutorial'),
           'edit_item'           =>   __('Edit Tutorial'),
           'new_item'            =>   __('New Portfolio'),
           'all_items'           =>   __('All Portfolio'),
           'view_item'           =>   __('View Tutorial'),
           'search_items'        =>   __('Search Tutorials'),
           'not_found'           =>   __('No Tutorials found'),
           'not_found_in_trash' =>   __('No Tutorials found in Trash'),
           'parent_item_colon'  =>   __('Parent tutorials:'),                
     	 );

		$args = array(
	       'hierarchical'       =>  true,    
	       'labels'             =>  $labels,
	       'public'             =>  true,
	       'publicly_queryable' =>  true, 
	       'description'        => __('Description.'),
	       'show_ui'            =>  true,
	       'show_in_menu'       =>  true,
	       'show_in_nav_menus'  =>  true,                
	       'query_var'          =>  true,
	       'rewrite'            =>  true,
	       'query_var'          =>  true,
	       'rewrite'            =>  array('slug' => 'tutorial'),
	       'capability_type'    =>  'page',
	       'has_archive'        =>  true,
	       'icon_url'    => 'dashicons-format-image',
	       'menu_position'      =>   22,
	       'show_in_menu' => 'edit.php?post_type=tutorial',
	       'supports'           =>  array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'page-attributes', 'custom-fields' )
	 	);
    	register_post_type('tutorial', $args);
	

    }

// Ajax requert call

    public function hendel_ajax_requests_admin(){
    	global $wpdb;
    	$table = $wpdb->prefix.'portfolio_book_self';
    	// Helder all ajax requert for admin
    	$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : "";

    	if(!empty($param)){

    		if($param =="first_simple_ajax"){
    			echo json_encode(array(
    				"statu" =>1,
    				"message"=>"First Ajax Request", 
    				"data"=> array(
    					"name" =>"Muzaffer",
    					"auther" =>"Khan sir"
    				)
    			));

    		}elseif($param =="create-book-self"){
    			//Get all form data
    			//print_r($_REQUEST);
    			$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
    			$capacity = isset($_REQUEST['capacity']) ? $_REQUEST['capacity'] : "";
    			$location = isset($_REQUEST['location']) ? $_REQUEST['location'] : "";
    			$status = isset($_REQUEST['status']) ? $_REQUEST['status'] : "";

    			$wpdb->insert($table, array(
    				'self_name' => $name, 
    				'capacity' => $capacity, 
    				'self_location' => $location, 
    				'status' => $status
    			));

    			if($wpdb->insert_id >0){

	    			echo json_encode(array(
	    				"status" =>1,
	    				"message"=>"Book create self successfully"
	    			));
    			}else{

	    		echo json_encode(array(
	    				"status" =>0,
	    				"message"=>"Book fail to create self"
	    			));
    			}
    		}elseif($param == "self_book_delete") {
    			$book_id = isset($_REQUEST['self_book_id']) ? intval($_REQUEST['self_book_id']): 0;

    			if($book_id >0){

    				$wpdb->delete($table, array( 'id' =>$book_id));
    				echo json_encode(array(
	    				"status" =>1,
	    				"message"=>"Book self deleted successfully"
	    			));
    			}else{
    				echo json_encode(array(
	    				"status" =>0,
	    				"message"=>"Yur Book not deleted"
	    			));
    			}
    		}

    		// added books detail query 

    		if($param == "add_book_details"){

    			$table = $wpdb->prefix.'portfolio_books';

    			$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
    			$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
    			$publication = isset($_REQUEST['publication']) ? $_REQUEST['publication'] : "";
    			$amount = isset($_REQUEST['cost']) ? $_REQUEST['cost'] : "";
    			$description = isset($_REQUEST['description']) ? $_REQUEST['description'] : "";
    			$self_book_id = isset($_REQUEST['self_book']) ? $_REQUEST['self_book'] : "";
    			$image_url = isset($_REQUEST['image_url']) ? $_REQUEST['image_url'] : "";
    			$status = isset($_REQUEST['status']) ? $_REQUEST['status'] : "";

    			//Insert query
    			$wpdb->insert($table, array(
    				'name' => $name, 
    				'amount' => $amount, 
    				'description' => $description, 
    				'self_id' => $self_book_id, 
    				'book_image' => $image_url,
    				'publication' => $publication,
    				'email' => $email, 
    				'status' => $status
    			));

    			if($wpdb->insert_id >0){
	    			echo json_encode(array(
	    				"status" =>1,
	    				"message"=>"Added Book details successfully"
	    			));
    			}else{
	    		echo json_encode(array(
	    				"status" =>0,
	    				"message"=>"Book fail to add"
	    			));
    			}

    		}
    		// delete book list 

    		if($param == "book_list_delete") {
    		$table = $wpdb->prefix.'portfolio_books';
    		$booklist_id = isset($_REQUEST['book_list_id']) ? intval($_REQUEST['book_list_id']): 0;

    			if($booklist_id >0){

    				$wpdb->delete($table, array( 'id' =>$booklist_id));
    				echo json_encode(array(
	    				"status" =>1,
	    				"message"=>"Book list deleted successfully"
	    			));
    			}else{
    				echo json_encode(array(
	    				"status" =>0,
	    				"message"=>"Yur Book list not deleted"
	    			));
    			}
    		}


    	}
    	wp_die();
    }



}
