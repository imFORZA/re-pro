<?php
/**
 * WP Walkscore API
 *
 * @package WP-Walkscore-API
 */
/*
* Plugin Name: WP WalkScore API
* Plugin URI: https://github.com/wp-api-libraries/wp-walkscore-api
* Description: Perform API requests to Walkscore in WordPress.
* Author: WP API Libraries
* Version: 1.0.0
* Author URI: https://wp-api-libraries.com
* GitHub Plugin URI: https://github.com/wp-api-libraries/wp-walkscore-api
* GitHub Branch: master
*/
/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
/* Check if class exists. */
if ( ! class_exists( 'WalkscoreAPI' ) ) {
	/**
	 * Walkscore API Class.
	 */
	class WalkscoreAPI {
		/**
		 * API Key.
		 *
		 * @var string
		 */
		static private $wsapikey;
		/**
		 * Return format. XML or JSON.
		 *
		 * @var [string
		 */
		static private $output;
		/**
		 * URL to the API.
		 *
		 * @var string
		 */
		private $base_uri = 'http://api.walkscore.com';
		/**
		 * __construct function.
		 *
		 * @access public
		 * @param mixed $wsapikey API Key.
		 * @return void
		 */
		public function __construct( $wsapikey, $output = 'json' ) {
			static::$wsapikey = $wsapikey;
			static::$output = $output;
		}
		/**
		 * Fetch the request from the API.
		 *
		 * @access private
		 * @param mixed $request Request URL.
		 * @return $body Body.
		 */
		private function fetch( $request ) {
			$response = wp_remote_get( $request );
			$code = wp_remote_retrieve_response_code( $response );
			if ( 200 !== $code ) {
				return new WP_Error( 'response-error', sprintf( __( 'Server response code: %d', 'text-domain' ), $code ) );
			}
			$body = wp_remote_retrieve_body( $response );
			return json_decode( $body );
		}
		/**
		 * Get Walkscore (https://www.walkscore.com/professional/api.php)
		 *
		 * @access public
		 * @param mixed $wsapikey Your Walk Score API Key. Contact us to get one. Required.
		 * @param mixed $latitude The latitude of the requested location. Required.
		 * @param mixed $longitude The longitude of the requested location. Required.
		 * @param mixed $address The URL encoded address. Required.
		 * @param mixed $format Return results in XML or JSON (defaults to XML).
		 * @return void
		 */
		function get_walkscore( $latitude, $longitude, $address ) {
			if ( empty( $latitude ) || empty( $longitude ) || empty( $address ) ) {
				return new WP_Error( 'required-fields', __( 'Required fields are empty.', 'text-domain' ) );
			}
			$request = $this->base_uri . '/score?format=' . static::$output . '&wsapikey=' . static::$wsapikey . '&lat=' . $latitude . '&lon=' . $longitude . '&address=' . $address;
			return $this->fetch( $request );
		}
		/**
		 * get_transit_score function.
		 *
		 * @access public
		 * @param mixed $latitude
		 * @param mixed $longitude
		 * @param mixed $city
		 * @param mixed $state
		 * @param mixed $country
		 * @param mixed $research
		 * @return void
		 */
		function get_transit_score( $latitude, $longitude, $city, $state, $country, $research ) {
			if ( empty( $latitude ) || empty( $longitude ) || empty( $city ) || empty( $state ) ) {
				return new WP_Error( 'required-fields', __( 'Required fields are empty.', 'text-domain' ) );
			}
			$request = $this->base_uri . '/transit/score/?wsapikey=' . static::$wsapikey . '&lat=' . $latitude . '&lon=' . $longitude . '&city=' . $city . '&state=' . $state . '&format=' . $output;
			return $this->fetch( $request );
		}
		function get_transit_stop_search() {
		}
		function get_transit_network_search() {
		}
		function get_transit_stop_details() {
		}
		function get_transit_route_details() {
		}
		function get_transit_supported_cities() {
		}
		/**
		 * Response code message
		 *
		 * @param  [String] $code : Response code to get message from.
		 * @return [String]       : Message corresponding to response code sent in.
		 */
		public function response_code_msg( $code = '' ) {
			switch ( $code ) {
			case 1:
				$msg = __( 'Walk Score successfully returned.', 'text-domain' );
				break;
			case 2:
				$msg = __( 'Score is being calculated and is not currently available.', 'text-domain' );
				break;
			case 30:
				$msg = __( 'Invalid latitude/longitude.', 'text-domain' );
				break;
			case 31:
				$msg = __( 'Walk Score API internal error.', 'text-domain' );
				break;
			case 40:
				$msg = __( 'Your WSAPIKEY is invalid.', 'text-domain' );
				break;
			case 41:
				$msg = __( 'Your daily API quota has been exceeded.', 'text-domain' );
				break;
			case 42:
				$msg = __( 'Your IP address has been blocked.', 'text-domain' );
				break;
			default:
				$msg = __( 'Sorry, response code is unknown.', 'text-domain' );
				break;
			}
			return $msg;
		}
	}
}
