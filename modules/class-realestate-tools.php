<?php

if ( ! class_exists( 'RealEstateTools' ) ) {

	/**
	 * RealEstateTools class.
	 */
	class RealEstateTools {

		/**
		 * __construct function.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {

		}

		/**
		 * extract_zipcode function.
		 *
		 * @access public
		 * @param mixed $address
		 * @return void
		 */
		public function extract_zipcode( $address ) {
			$zipcode = preg_match("/\b[A-Z]{2}\s+\d{5}(-\d{4})?\b/", $address, $matches);
			return $matches[0];
		}

		/**
		 * extract_bed_count function.
		 *
		 * @access public
		 * @param mixed $text
		 * @return void
		 */
		public function extract_bed_count( $text ) {
    		$beds = preg_match("/\d (beds|Beds|Bedrooms)/", $text, $matches);
			$beds_text = $matches[0];
			return $int = filter_var($beds_text, FILTER_SANITIZE_NUMBER_INT);
		}

		/**
		 * extract_bath_count function.
		 *
		 * @access public
		 * @param mixed $text
		 * @return void
		 */
		public function extract_bath_count( $text ) {
    		$baths = preg_match("/\d (bath|Baths|Bathrooms)/", $text, $matches);
			$baths_text = $matches[0];
			return $int = filter_var($beds_text, FILTER_SANITIZE_NUMBER_INT);
		}

		/**
		 * validate_usa_zipcode function.
		 *
		 * @access public
		 * @param mixed $zip_code
		 * @return void
		 */
		public function validate_usa_zipcode( $zip_code ) {
			if ( preg_match("/^([0-9]{5})(-[0-9]{4})?$/i", $zip_code) )
				return true;
			else
				return false;
		}


		/**
		 * is_valid_latitude function.
		 *
		 * @access public
		 * @param mixed $latitude
		 * @return void
		 */
		public function is_valid_latitude($latitude) {
			if ( preg_match("/^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}$/", $latitude) ) {
				return true;
			} else {
				return false;
			}
		}


		/**
		 * is_valid_longitude function.
		 *
		 * @access public
		 * @param mixed $longitude
		 * @return void
		 */
		public function is_valid_longitude($longitude) {
			if (preg_match("/^-?([1]?[1-7][1-9]|[1]?[1-8][0]|[1-9]?[0-9])\.{1}\d{1,6}$/",
					$longitude)) {
				return true;
			} else {
				return false;
			}
		}


	}
}
