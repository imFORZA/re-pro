<?php
/**
 * WP GreatSchools API
 *
 * @package WP-GreatSchools-API
 */
 /*
* Plugin Name: WP GreatSchools API
* Plugin URI: https://github.com/wp-api-libraries/wp-greatschools-api
* Description: Perform API requests to GreatSchools in WordPress.
* Author: WP API Libraries
* Version: 1.0.0
* Author URI: https://wp-api-libraries.com
* GitHub Plugin URI: https://github.com/wp-api-libraries/wp-greatschools-api
* GitHub Branch: master
*/
/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! class_exists( 'GreatSchoolsAPI' ) ) {
	/**
	 * GreatSchools API Class.
	 */
	class GreatSchoolsAPI {
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
		 * BaseAPI Endpoint
		 *
		 * @var string
		 * @access public
		 */
		public $base_uri = 'http://api.greatschools.org/schools/';
		/**
		 * __construct function.
		 *
		 * @access public
		 * @param mixed $api_key API Key
		 * @param string $output (default: 'json') Output.
		 * @return void
		 */
		public function __construct( $api_key, $output = 'json' ) {
			static::$api_key = $api_key;
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
			return $body;
		}
		/**
		 * get_schools function.
		 *
		 * @access public
		 * @param mixed $state State.
		 * @param mixed $city City.
		 * @return void
		 */
		public function get_schools( $state, $city ) {
			$request = $this->base_uri . $state . '/' . $city . '?key=' . static::$api_key;
			$xml = simplexml_load_file( $request );
			$json = wp_json_encode( $xml );
			$results = json_decode( $json, true );
			return $results;
		}
		/**
		 * get_nearby_schools function.
		 *
		 * @access public
		 * @param mixed $state State.
		 * @param mixed $zip Zip.
		 * @param mixed $city City.
		 * @param mixed $address Address.
		 * @param mixed $latitude Latitude.
		 * @param mixed $longitude Longitude.
		 * @param mixed $school_type School Type.
		 * @param mixed $level_code Level Code.
		 * @param mixed $radius Radius.
		 * @param mixed $limit Limit.
		 * @return void
		 */
		public function get_nearby_schools( $state, $zip, $city, $address, $latitude, $longitude, $school_type, $level_code, $radius, $limit ) {
		}
		/**
		 * Returns a profile data for a specific school.
		 *
		 * @access public
		 * @param mixed $state State.
		 * @param mixed $school_id School ID.
		 * @return void
		 */
		public function get_school( $state, $school_id ) {
			$request = $this->base_uri . $state . '/'. $school_id .'?key=' . static::$api_key;
			$xml = simplexml_load_file( $request );
			$json = wp_json_encode( $xml );
			$results = json_decode( $json, true );
			return $results;
		}
		/**
		 * Returns a list of schools based on a search string.
		 *
		 * @access public
		 * @param mixed $state State.
		 * @param mixed $query_string Query String.
		 * @return void
		 */
		public function search_for_schools( $state, $query_string, $level_code, $sort, $limit ) {
			$request = $this->base_uri . '/search/schools?key=' . static::$api_key . '&state=' . $state . '&q='. $query_string .'&levelCode='. $level_code .'&sort='. $sort .'&limit=' . $limit;
			$xml = simplexml_load_file( $request );
			$json = wp_json_encode( $xml );
			$results = json_decode( $json, true );
			return $results;
		}
		/**
		 * Returns a list of the most recent reviews for a school or for any schools in a city.
		 *
		 * @access public
		 * @param mixed $state State.
		 * @param mixed $city City.
		 * @param mixed $school_id School ID.
		 * @param mixed $cutoffage Cut Off Age.
		 * @param mixed $limit Limit.
		 * @param mixed $topic_id Topic ID.
		 * @return void
		 */
		public function get_school_reviews( $state, $city, $school_id, $cutoffage, $limit, $topic_id ) {
			$request = $this->base_uri . '/reviews/school/' . $state . '/'. $school_id .'?key=' . static::$api_key . '&limit='. $limit .'&cutoffAge='. $cutoffage .'&topicId=' . $topic_id;
			$xml = simplexml_load_file( $request );
			$json = wp_json_encode( $xml );
			$results = json_decode( $json, true );
			return $results;
		}
		/**
		 * Returns a list of topics available for topical reviews.
		 *
		 * @access public
		 * @return void
		 */
		public function get_review_topics() {
			$request = $this->base_uri . '/reviews/reviewTopics?key=' . static::$api_key;
			$xml = simplexml_load_file( $request );
			$json = wp_json_encode( $xml );
			$results = json_decode( $json, true );
			return $results;
		}
		/**
		 * Returns test and rank data for a specific school.
		 *
		 * @access public
		 * @param mixed $state State.
		 * @param mixed $school_id School ID.
		 * @return void
		 */
		public function get_school_test_scores( $state, $school_id ) {
			$request = $this->base_uri . '/school/tests/' . $state . '/'. $school_id .'?key=' . static::$api_key;
			$xml = simplexml_load_file( $request );
			$json = wp_json_encode( $xml );
			$results = json_decode( $json, true );
			return $results;
		}
		/**
		 * Returns census and profile data for a school.
		 *
		 * @access public
		 * @param mixed $state State.
		 * @param mixed $school_id School ID.
		 * @return void
		 */
		public function get_school_census_data( $state, $school_id ) {
			$request = $this->base_uri . '/school/census/' . $state . '/'. $school_id .'?key=' . static::$api_key;
			$xml = simplexml_load_file( $request );
			$json = wp_json_encode( $xml );
			$results = json_decode( $json, true );
			return $results;
		}
		/**
		 * Returns information about a city.
		 *
		 * @access public
		 * @param mixed $state State.
		 * @param mixed $city City.
		 * @return void
		 */
		public function get_city_schools( $state, $city ) {
			$request = $this->base_uri . '/cities/' . $state . '/'. $city .'?key=' . static::$api_key;
			$xml = simplexml_load_file( $request );
			$json = wp_json_encode( $xml );
			$results = json_decode( $json, true );
			return $results;
		}
		/**
		 * Returns a list of cities near another city.
		 *
		 * @access public
		 * @param mixed $state State.
		 * @param mixed $city City.
		 * @param mixed $radius Radius.
		 * @param mixed $sort Sort.
		 * @return void
		 */
		public function get_nearby_cities( $state, $city, $radius, $sort = 'rating' ) {
			$request = $this->base_uri . '/cities/nearby/' . $state . '/'. $city .'?key=' . static::$api_key . '&radius='. $radius .'&sort=' . $sort;
			$xml = simplexml_load_file( $request );
			$json = wp_json_encode( $xml );
			$results = json_decode( $json, true );
			return $results;
		}
		/**
		 * get_districts function.
		 *
		 * @access public
		 * @param mixed $state State.
		 * @param mixed $city City.
		 * @return void
		 */
		public function get_districts( $state, $city ) {
			$request = $this->base_uri . '/districts/' . $state . '/'. $city .'?key=' . static::$api_key;
			$xml = simplexml_load_file( $request );
			$json = wp_json_encode( $xml );
			$results = json_decode( $json, true );
			return $results;
		}
	}
}
