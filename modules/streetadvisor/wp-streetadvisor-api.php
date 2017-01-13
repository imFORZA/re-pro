<?php
/**
 * WP StreetAdvisor API
 *
 * @package WP-StreetAdvisor-API
 */
/*
* Plugin Name: WP Street Advisor API
* Plugin URI: https://github.com/wp-api-libraries/wp-streetadvisor-api
* Description: Perform API requests to streetadvisor.com in WordPress.
* Author: WP API Libraries
* Author URI: https://wp-api-libraries.com
* Version: 1.0.0
* Author URI: https://www.imforza.com
* GitHub Plugin URI: https://github.com/wp-api-libraries/wp-streetadvisor-api
* GitHub Branch: master
*/
/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) { exit; }
/* Check if Class Exists. */
if ( ! class_exists( 'StreetAdvisorAPI' ) ) {
	/**
	 * StreetAdvisor API Class.
	 */
	class StreetAdvisorAPI {
		/**
		 * API Key.
		 *
		 * @var string
		 */
		static private $api_key;
		/**
		 * URL to the API.
		 *
		 * @var string
		 */
		private $base_uri = 'https://web-api-legacy.streetadvisor.com';
		/**
		 * __construct function.
		 *
		 * @access public
		 * @param mixed $api_key API Key.
		 * @return void
		 */
		public function __construct( $api_key ) {
			static::$api_key = $api_key;
			$this->args['headers'] = array(
				'Content-Type' => 'application/json',
				'Authorization' => $api_key,
			);
		}
		/**
		 * Fetch the request from the API.
		 *
		 * @access private
		 * @param mixed $request Request URL.
		 * @return $body Body.
		 */
		private function fetch( $request ) {
			$response = wp_remote_get( $request, $this->args );
			$code = wp_remote_retrieve_response_code( $response );
			if ( 200 !== $code ) {
				return new WP_Error( 'response-error', sprintf( __( 'Server response code: %d', 'text-domain' ), $code ) );
			}
			$body = wp_remote_retrieve_body( $response );
			return json_decode( $body, true );
		}
		/**
		 * Get Location Data.
		 *
		 * @access public
		 * @param mixed $latitude Latitude.
		 * @param mixed $longitude Longitude.
		 * @param mixed $level Level.
		 * @return void
		 */
		public function get_location_data( $latitude, $longitude, $level ) {
			$request = $this->base_uri . '/locations/overview/'.$latitude.'/'.$longitude.'/'.$level;
			return $this->fetch( $request );
		}
		/**
		 * Get Location Reviews.
		 *
		 * @access public
		 * @param mixed $latitude Latitude.
		 * @param mixed $longitude Longitude.
		 * @param mixed $level Level.
		 * @param int $review_count (default: 5) Total # of Reviews to display.
		 * @return void
		 */
		public function get_location_reviews( $latitude, $longitude, $level, $review_count = '5' ) {
			$request = $this->base_uri . '/reviews/'.$latitude.'/'.$longitude.'/'.$level . '?take='. $review_count;
			return $this->fetch( $request );
		}
	}
}
