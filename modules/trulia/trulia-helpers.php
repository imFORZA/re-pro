<?php

/**
 * Get Trulia RSS Listing Feed.
 *
 * @access public
 * @param string $type (default: 'for_sale') Choose Type, for_sale or for_rent.
 * @param mixed $city City.
 * @param mixed $state State.
 * @return void
 */
function get_trulia_rss_listing_feed( $type = 'for_sale', $city, $state ) {

	return 'https://www.trulia.com/rss2/'.$type.'/'.$city.','.$state.'/';

}
