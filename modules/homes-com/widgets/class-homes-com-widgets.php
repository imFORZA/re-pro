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

			// wp_enqueue_scripts( 'commute-time', 'http://www.homes.com/widget/commute-time/remote.js?show_only_destination=NO&text_color=%230054a0&direction_link=%2FHomesCom%2FInclude%2FListingDetail%2FMap%2FPrintDirections%2Ecfm%3FstartAddress%3D%25%25source%5Faddress%25%25%26endAddress%3D%25%25destination%5Faddress%25%25&button_color=%23' . $color . '&cobrand=&source_address=' . $start_addr . '&property_id=', array( 'jquery' ), null, true);

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
			//echo '<script src="http://www.homes.com/widget/featured-listings/remote.js?text_color=%230054a0&amp;listing_status=FOR%20SALE&amp;inner_color=%230054a0&amp;cobrand=&amp;location=El%20Segundo" type="text/javascript"></script>';

			echo '<div class="featured-listings-widget">';
			echo '	<h1 style="color:#' . $color . '">Featured Homes for <span class="listing-stat">' . $status . '</span></h1>';
			echo '	<iframe id="'. $this->homes_iframe_id( $iframe_id ) .'" class="featured-listings-frame '. $this->homes_iframe_class( 'featured-listings-widget' ) .'" scrolling="no" title="'. __( 'Featured Listings on Homes', 're-pro' ) .'" src="http://www.homes.com/widget/featured-listings/frame/?text_color=%23' . $color .'&listing_status=' . $status .'&inner_color=%23' . $color .'&cobrand=&location=' . $location .'" width="100%" seamless frameborder="0"></iframe>';
			echo '	<a href="http://www.homes.com/widgets/" title="Homes.com" class="logo">';
			echo '		Powered By Homes.com';
			echo '	</a>';
			echo '</div>';

		}
	}
}
