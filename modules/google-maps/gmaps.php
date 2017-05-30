<?php
/**
 * WP Google Maps API
 *
 * @package WP-Google-Maps-API
 */

/*
 * Plugin Name: WP Google Maps API
 * Plugin URI: https://github.com/wp-api-libraries/wp-google-maps-api
 * Description: Perform API requests to Google Maps API.
 * Author: WP API Libraries, sgarza
 * Version: 1.0.0
 * Author URI: https://wp-api-libraries.com
 * GitHub Plugin URI: https://github.com/wp-api-libraries/wp-google-maps-api
 * GitHub Branch: master
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! class_exists( 'WPAPI_GOOGLE_MAPS' ) ) {
	require_once( 'maps-widget.php' );

	/**
	 * Google Maps Class.
	 */
	class WPAPI_GOOGLE_MAPS {

		/**
		 * API Key.
		 *
		 * @var string
		 */
		static private $api_key;

		/**
		 * Output Type.
		 *
		 * @var string
		 */
		static private $output;

		/**
		 * Map data to be sent to JS.
		 *
		 * @var [Array]
		 */
		static private $map_data;

		/**
		 * Default map options.
		 *
		 * @var [Array]
		 */
		static public $defaults = array(
			'width'	 => '300px',
			'height' => '300px',
			'lat'		 => '-17.7134',
			'lng'		 => '178.0650',
			'info'	 => '',
			'style'	 => '[]',
			'zoom'	 => 14,
			'scrollwheel' => 0,
		);

		/**
		 * __construct function.
		 *
		 * @access public
		 * @param String $api_key : API Key.
		 */
		public function __construct( $api_key ) {
			static::$api_key = $api_key;

			add_action( 'wp_footer', array( $this, 'footer' ),  11 );
			add_action( 'widgets_init', array( $this, 'register_widgets' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
			add_shortcode( 'wp_google_maps', array( $this, 'shortcode' ) );
		}

		/**
		 * Enqueue JS.
		 */
		public function enqueue() {
			wp_enqueue_script( 'wpapi-google-maps', plugins_url( 'assets/js/google-maps.min.js', REPRO_PLUGIN_FILE ), array( 'jquery' ), null, true );
		}

		/**
		 * Handle multiple google maps js api enqueues on the footer.
		 */
		public function footer() {
			wp_localize_script( 'wpapi-google-maps', 'wpapi_gmaps', static::$map_data );

			// Only enqueue google maps API if yoast hasnt enqueued it already.
			if ( ! wp_script_is( 'maps-geocoder' ) ) {
				wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=' . static::$api_key, array(), null );
			}
		}

		/**
		 * Print dat map.
		 *
		 * @param  [Mixed] $map_data : Array of map data to send to js.
		 * @param  [Bool]  $echo     : If html should be returned or echoed, defaults to true.
		 */
		public static function print_map( $map_data, $echo = true ) {

			$map_data = apply_filters( 'wpapi_google_map_data', wp_parse_args( $map_data, static::$defaults ) );
			static::$map_data[] = $map_data;

			$index = count( static::$map_data ) - 1;

			$html = '<div id="wpapi-gmap-' . $index . '" style="width:' . esc_attr( $map_data['width'] ) . ';height:' . esc_attr( $map_data['height'] ) . '"></div>';

			if ( $echo ) {
				echo $html;
			} else {
				return $html;
			}
		}

		/**
		 * Shortcode for printing a single map.
		 *
		 * @param  [type] $atts : shortcode attributes.
		 */
		public function shortcode( $atts ) {
			// Set widget info.
			$atts = shortcode_atts( static::$defaults, $atts, 'wp_google_maps' );

			return static::print_map( $atts, false );

		}

		/**
		 * Register Google maps Widgets.
		 *
		 * @access public
		 * @return void
		 */
		public function register_widgets() {
			register_widget( 'WP_API_MAPS_WIDGET' );
		}
	}

}
