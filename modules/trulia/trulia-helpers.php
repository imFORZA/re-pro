<?php

/**
 * Get Trulia RSS Listing Feed (https://www.trulia.com/tools/rss/).
 *
 * @access public
 * @param string $type (default: 'for_sale')
 * @param mixed $city
 * @param mixed $state
 * @param string $min_price (default: '')
 * @param string $max_price (default: '')
 * @param string $property_type (default: '')
 * @param string $min_bath (default: '')
 * @param string $max_bath (default: '')
 * @param string $min_sqft (default: '')
 * @param string $max_sqft (default: '')
 * @return void
 */
function get_trulia_rss_listing_feed( $type = 'for_sale', $city, $state, $min_price = '', $max_price = '', $property_type = '', $min_bath = '', $max_bath = '', $min_sqft = '', $max_sqft = '' ) {

	$url = esc_url( 'https://www.trulia.com/rss2/'. urlencode($type ).'/'. urlencode( $city ).','. urlencode( $state ).'/'  );

	return $url;


}
