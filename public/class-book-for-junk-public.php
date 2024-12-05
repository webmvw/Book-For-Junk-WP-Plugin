<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://webmkit.com
 * @since      1.0.0
 *
 * @package    Book_For_Junk
 * @subpackage Book_For_Junk/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Book_For_Junk
 * @subpackage Book_For_Junk/public
 * @author     Md. Masud Rana <masudrana.bbpi@gmail.com>
 */
class Book_For_Junk_Public {

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
		 * defined in Book_For_Junk_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Book_For_Junk_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/book-for-junk-public.css', array(), $this->version, 'all' );

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
		 * defined in Book_For_Junk_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Book_For_Junk_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/book-for-junk-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( "mts-step-form", plugin_dir_url( __FILE__ ) . 'js/step-form.js', array( 'jquery' ), $this->version, false );

	}



	/**
	 * Junk book shortcode callback
	 *
	 * @since    1.0.0
	 */
	public function mts_junk_book_shortcode_callback(){

		ob_start();
		require_once( plugin_dir_path(__FILE__).'partials/book-for-junk-public-display.php' );
		$template = ob_get_contents();
		ob_clean();
		echo $template;

	}


	/**
	 * PostCode validation shortcode callback
	 *
	 * @since    1.0.0
	 */
	public function mts_postcode_validation_shortcode_callback(){

		ob_start();
		require_once( plugin_dir_path(__FILE__).'partials/postcode-validation-form.php' );
		$template = ob_get_contents();
		ob_clean();
		echo $template;

	}



}
