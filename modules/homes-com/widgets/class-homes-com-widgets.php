<?php
/**
 * Homes.com Widgets Class
 *
 * @package RE-PRO
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'HomesWidgets' ) ) {
	/**
	 * HomesWidgets class.
	 */
	class HomesWidgets {

		/**
		 * __construct function.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {
		}

		/**
		 * Homes_iframe_css function.
		 *
		 * @access public
		 * @return void
		 */
		public function homes_iframe_css() {
		?>

		<style>
			.homes-iframe {
				display:block;
				max-width:100%;
			}
		</style>

		<?php

		}

		/**
		 * Homes iframe ID Names.
		 *
		 * @access public
		 * @param string $iframe_id (default: '').
		 * @return string $iframe_id.
		 */
		public function homes_iframe_id( $iframe_id = '' ) {

			if ( '' !== $iframe_id  ) {
				return sanitize_html_class( $iframe_id ) . '-iframe';
			}

		}

		/**
		 * Homes iframe Class Names.
		 *
		 * @access public
		 * @param string $widget_name (default: '').
		 * @return string class name.
		 */
		public function homes_iframe_class( $widget_name = '' ) {

			if ( '' !== $widget_name ) {
				return 'homes homes-iframe homes-' . sanitize_html_class( $widget_name ) . '-iframe';
			} else {
				return 'homes homes-iframe';
			}

		}

		/* Homes WIDGETS. */

		/**
		 * Get Commute Time Widget.
		 *
		 * @access public
		 * @param string $iframe_id (default: '').
		 * @param mixed  $start_addr Start Address.
		 * @param mixed  $color Button Color.
		 * @return void
		 */
		public function get_commute_time_widget( $iframe_id = '', $start_addr, $color ) {

			echo '<div class="commute-time-widget">';
			echo '	<h1 style="color:#' . $color . '">Commute Time</h1>';
			echo '	<iframe id="'. $this->homes_iframe_id( $iframe_id ) .'" class="commute-time-frame '. $this->homes_iframe_class( 'commute-time-widget' ) .'" scrolling="no" title="'. __( 'Commute Time on Homes', 're-pro' ) .'" src="http://www.homes.com/widget/commute-time/frame/?show_only_destination=NO&text_color=%230054a0&direction_link=%2FHomesCom%2FInclude%2FListingDetail%2FMap%2FPrintDirections%2Ecfm%3FstartAddress%3D%25%25source%5Faddress%25%25%26endAddress%3D%25%25destination%5Faddress%25%25&button_color=%23' . $color .'&cobrand=&source_address=' . $start_addr . '"&property_id=" width="100%" seamless frameborder="0"></iframe>';
			echo '	<div class="footer">';
			echo '		<a href="http://www.homes.com/widgets/" title="Homes.com" class="logo">';
			echo '			Powered By Homes.com';
			echo '		</a>';
			echo '	</div>';
			echo '</div>';

		}

		/**
		 * Get Featured Listings Widget.
		 *
		 * @access public
		 * @param string $iframe_id (default: '').
		 * @param mixed  $location Location.
		 * @param mixed  $color Text Color.
		 * @param mixed  $status Listing Status.
		 * @return void
		 */
		public function get_featured_listings( $iframe_id = '', $location, $color, $status ) {

			if ( 'RENT' === $status ) {
				$showTitle = 'Rent';
			} else {
				$showTitle = 'Sale';
			}

			echo '<div class="featured-listings-widget">';
			echo '	<h1 style="color:#' . $color . '">Featured Homes for <span class="listing-stat">' . $showTitle . '</span></h1>';
			echo '	<iframe id="'. $this->homes_iframe_id( $iframe_id ) .'" class="featured-listings-frame '. $this->homes_iframe_class( 'featured-listings-widget' ) .'" scrolling="no" title="'. __( 'Featured Listings on Homes', 're-pro' ) .'" src="http://www.homes.com/widget/featured-listings/frame/?text_color=%23' . $color .'&listing_status=FOR%20' . $status .'&inner_color=%23' . $color .'&cobrand=&location=' . $location .'" width="100%" seamless frameborder="0"></iframe>';
			echo '	<a href="http://www.homes.com/widgets/" title="Homes.com" class="logo">';
			echo '		Powered By Homes.com';
			echo '	</a>';
			echo '</div>';

		}

		/**
		 * Get Home Values Widget.
		 *
		 * @access public
		 * @param string $iframe_id (default: '').
		 * @param mixed  $location Location.
		 * @param mixed  $firstColor Color 1.
		 * @param mixed  $secondColor Color 2.
		 * @param mixed  $average Average Value.
		 * @param mixed  $median Median Value.
		 * @return void
		 */
		public function get_home_values( $iframe_id = '', $location, $firstColor, $secondColor, $average, $median ) {

			$valueTypes = 'MEAN,MEDIAN';
			if ( $average && $median ) {
				$valueTypes = 'MEAN,MEDIAN';
			} else if ( $average ) {
				$valueTypes = 'MEAN';
			} else if ( $median ) {
				$valueTypes = 'MEDIAN';
			}

			echo '<div class="home-values-widget">';
			echo '	<h1 style="color:#' . $firstColor . '">Search Home Values</h1>';
			echo '	<iframe id="'. $this->homes_iframe_id( $iframe_id ) .'" class="home-values-frame '. $this->homes_iframe_class( 'home-values-widget' ) .'" scrolling="no" title="'. __( 'Home Values on Homes', 're-pro' ) .'"src="http://www.homes.com/widget/home-values/frame/?avm_types=' . $valueTypes .'&text_color=%23' . $firstColor .'&button_color=%23' . $secondColor .'&cobrand=&location=' . $location .'" width="100%" seamless frameborder="0"></iframe>';
			echo '	<div class="footer">';
			echo	'		<a href="http://www.homes.com/widgets/" title="Homes.com" class="logo">';
			echo '			Powered By Homes.com';
			echo '		</a>';
			echo '	</div>';
			echo '</div>';

		}

		/**
		 * Get Search Widget.
		 *
		 * @access public
		 * @param string $iframe_id (default: '').
		 * @param mixed  $location Location.
		 * @param mixed  $color Color.
		 * @param bool   $sale (default: true) For Sale homes.
		 * @param bool   $rent (default: true) For Rent homes.
		 * @return void
		 */
		public function get_search( $iframe_id = '', $location, $color, $sale, $rent ) {

			if ( ( empty( $sale ) && empty( $rent ) ) || ( $sale && $rent ) ) {
				$searchTypes = 'FOR SALE,FOR RENT';
				$showTitle = '';
			} else if ( $sale ) {
				$searchTypes = 'FOR SALE';
				$showTitle = 'for Sale';
			} else if ( $rent ) {
				$searchTypes = 'FOR RENT';
				$showTitle = 'for Rent';
			}

			echo '<div class="medium-search-widget">';
			echo '	<h1 style="color:#' . $color . '">Search Homes <span class="listing-stat">' . $showTitle . '</span> </h1>';
			echo '	<iframe id="'. $this->homes_iframe_id( $iframe_id ) .'" class="medium-search-frame '. $this->homes_iframe_class( 'search-widget' ) .'" scrolling="no" title="'. __( 'Search on Homes', 're-pro' ) .'"src="http://www.homes.com/widget/medium-search/frame/?text_color=%23' . $color .'&listing_status=' . $searchTypes .'&cobrand=&location=' . $location .'" width="100%" seamless frameborder="0"></iframe>';
			echo '	<a href="http://www.homes.com/widgets/" title="Homes.com" class="logo">';
			echo '		Powered By Homes.com';
			echo '	</a>';
			echo '</div>';

		}

		/**
		 * Get Mortgage Calculator Widget.
		 *
		 * @access public
		 * @param string $iframe_id (default: '').
		 * @param mixed  $color Color.
		 * @return void
		 */
		public function get_mortgage_calc( $iframe_id = '', $color ) {

			echo '<div class="mortgage-calculator-widget">';
			echo '	<h1 style="color:#' . $color . '">Mortgage Calculator</h1>';
			echo '	<a href="http://www.homes.com/widgets/" title="Homes.com" class="logo">';
			echo '		Powered By Homes.com';
			echo '	</a>';
			echo '	<iframe id="'. $this->homes_iframe_id( $iframe_id ) .'" class="mortgage-calculator-frame '. $this->homes_iframe_class( 'mortgage-calc-widget' ) .'" scrolling="no" title="'. __( 'Mortgage Calculator on Homes', 're-pro' ) .'"src="http://www.homes.com/widget/mortgage-calculator/frame/?text_color=%23' . $color .'&cobrand=" width="100%" seamless frameborder="0"></iframe>';
			echo '</div>';

		}

		/**
		 * Get Real Estate (Simple) Search Widget.
		 *
		 * @access public
		 * @param string $iframe_id (default: '').
		 * @param mixed  $location Location.
		 * @param mixed  $color Color.
		 * @param bool   $sale (default: true) For Sale homes.
		 * @param bool   $rent (default: true) For Rent homes.
		 * @return void
		 */
		public function get_simple_search( $iframe_id = '', $location, $color, $sale, $rent ) {

			if ( ( empty( $sale ) && empty( $rent ) ) || ( $sale && $rent ) ) {
				$searchTypes = 'FOR SALE,FOR RENT';
				$showTitle = '';
			} else if ( $sale ) {
				$searchTypes = 'FOR SALE';
				$showTitle = 'for Sale';
			} else if ( $rent ) {
				$searchTypes = 'FOR RENT';
				$showTitle = 'for Rent';
			}

			echo '<div class="simple-search-widget">';
			echo '<h1 style="color:#' . $color . '">Search Homes <span class="listing-stat">' . $showTitle . '</span></h1>';
			echo '	<iframe id="'. $this->homes_iframe_id( $iframe_id ) .'" class="simple-search-frame '. $this->homes_iframe_class( 'simple-search-widget' ) .'" scrolling="no" title="'. __( 'Simple Search on Homes', 're-pro' ) .'"src="http://www.homes.com/widget/simple-search/frame/?text_color=%23' . $color .'&listing_status=' . $searchTypes .'&cobrand=&location=' . $location .'" width="100%" seamless frameborder="0"></iframe>';
			echo '	<a href="http://www.homes.com/widgets/" title="Homes.com" class="logo">';
			echo '		Powered By Homes.com';
			echo '	</a>';
			echo '</div>';
		}

		/**
		 * Get Real Estate (Tall) Search Widget.
		 *
		 * @access public
		 * @param string $iframe_id (default: '').
		 * @param mixed  $location Location.
		 * @param mixed  $color Text Color.
		 * @param mixed  $status Listing Status.
		 * @return void
		 */
		public function get_tall_search( $iframe_id = '', $location, $color, $status ) {

			echo '<div class="tall-search-widget">';
			echo '	<h1 style="color:#' . $color . '">Search Homes</h1>';
			echo '	<iframe id="'. $this->homes_iframe_id( $iframe_id ) .'" class="tall-search-frame '. $this->homes_iframe_class( 'tall-search-widget' ) .'" scrolling="no" title="'. __( 'Tall Search on Homes', 're-pro' ) .'"src="http://www.homes.com/widget/tall-search/frame/?text_color=%23' . $color .'&listing_status=' . $status .'&cobrand=&location=' . $location .'" width="100%" seamless frameborder="0"></iframe>';
			echo '	<a href="http://www.homes.com/widgets/" title="Homes.com" class="logo">';
			echo '		Powered By Homes.com';
			echo '	</a>';
			echo '</div>';
		}
	}
}
