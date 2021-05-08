<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://github.com/mdmuzaffer
 * @since      1.0.0
 *
 * @package    Portfolio
 * @subpackage Portfolio/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Portfolio
 * @subpackage Portfolio/public
 * @author     Muzaffer <developerphp1995@gmail.com>
 */
class Portfolio_Public {

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
		 * defined in Portfolio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Portfolio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/portfolio-public.css', array(), $this->version, 'all' );

		wp_enqueue_style("bootstrap", PORTFOLIO_PLUGIN_URL . 'assets/css/bootstrap.min.css', array(), $this->version, 'all' );

		wp_enqueue_style("dataTables", PORTFOLIO_PLUGIN_URL . 'assets/css/jquery.dataTables.min.css', array(), $this->version, 'all' );

		wp_enqueue_style("sweetAlerts", PORTFOLIO_PLUGIN_URL . 'assets/css/sweetalert.css', array(), $this->version, 'all' );

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
		 * defined in Portfolio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Portfolio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/portfolio-public.js', array( 'jquery' ), $this->version, false );

		wp_localize_script($this->plugin_name, 'request_ajax_public',  array(
			'name' =>'portfolio-muzaffer', 
			'author' =>'Muzaffer', 
			'publicajaxUrl' => admin_url('admin-ajax.php')
		));

	}

	public function custom_page_template(){
		//require_once plugin_dir_path( __FILE__ ) . 'partials/test11.php';//short code form
		global $post;

		if($post->post_name == "book_tool"){
			$page_template = PORTFOLIO_PLUGIN_PATH."/public/partials/book-tool-layout.php";
		}
	
		return $page_template;
	}

	// added template of the short code
	public function template_content_shortcode(){
		ob_start();
	    include_once(PORTFOLIO_PLUGIN_PATH."public/partials/temp-content-shortcode.php"); 
	    $temp_content = ob_get_contents();
	    ob_end_clean();
	    echo $temp_content;
	}

	public function handel_ajax_request_public(){

		// Helder all ajax requert for admin
    	$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : "";

    	if(!empty($param)){
    		if($param =="first_ajax_request"){
    			echo json_encode(array(
    				"statu" =>1,
    				"message"=>"First Ajax Request for public", 
    				"data"=> array(
    					"name" =>"Muzaffer",
    					"auther" =>"Khan sir public"
    				)
    			));

    		}
    	}
    	wp_die();

	}

}

