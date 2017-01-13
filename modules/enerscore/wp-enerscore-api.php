<?php
/**
 * WP Enerscore API (http://map.enerscore.com/#/api)
 *
 * @package WP-Enerscore-API
 */
/*
Plugin Name: WP Enerscore API
Plugin URI: https://github.com/wp-api-libraries/wp-enerscore-api
Description: Perform API requests to enerscore.com in WordPress.
Author: imFORZA
Version: 1.0.0
Author URI: https://www.imforza.com
GitHub Plugin URI: https://github.com/wp-api-libraries/wp-enerscore-api
GitHub Branch: master
*/
/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) { exit; }
/* Check if class exists. */
if ( ! class_exists( 'EnerscoreAPI' ) ) {
	/**
	 * EnerscoreAPI class.
	 */
	class EnerscoreAPI {
		 /**
		 * URL to the API.
		 *
		 * @var string
		 */
		private $base_uri = 'http://api-alpha.enerscore.com/api/address/neighbors/';
		/**
		 * __construct function.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {
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
		 * Get Energy Score for Address.
		 *
		 * @access public
		 * @param mixed $address Address.
		 * @return void
		 */
		public function get_enerscore( $address ) {
			if ( empty( $address ) ) {
				return new WP_Error( 'required-fields', __( 'Required fields are empty.', 'text-domain' ) );
			}
			$request = $this->base_uri . $address;
			return $this->fetch( $request );
		}
	}
}
