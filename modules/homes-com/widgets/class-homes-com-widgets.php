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

			$color = repro_hex_color( $color );
			$src   = 'http://www.homes.com/widget/commute-time/frame/?show_only_destination=NO&text_color=%230054a0&direction_link=%2FHomesCom%2FInclude%2FListingDetail%2FMap%2FPrintDirections%2Ecfm%3FstartAddress%3D%25%25source%5Faddress%25%25%26endAddress%3D%25%25destination%5Faddress%25%25&button_color=%23' . rawurlencode( $color ) . '&cobrand=&source_address=' . rawurlencode( (string) $start_addr );

			echo '<div class="commute-time-widget">';
			echo '	<h1 style="color:#' . esc_attr( (string) $color ) . '">Commute Time</h1>';
			echo '	<iframe id="'. esc_attr( (string) $this->homes_iframe_id( $iframe_id ) ) .'" class="commute-time-frame '. esc_attr( (string) $this->homes_iframe_class( 'commute-time-widget' ) ) .'" scrolling="no" title="'. esc_attr__( 'Commute Time on Homes', 're-pro' ) .'" src="' . esc_url( $src ) . '"&property_id=" width="100%" seamless frameborder="0"></iframe>';
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

			$color = repro_hex_color( $color );
			$src   = repro_iframe_src(
				'http://www.homes.com/widget/featured-listings/frame/',
				array(
					'text_color'     => '#' . $color,
					'listing_status' => 'FOR ' . $status,
					'inner_color'    => '#' . $color,
					'cobrand'        => '',
					'location'       => $location,
				)
			);

			echo '<div class="featured-listings-widget">';
			echo '	<h1 style="color:#' . esc_attr( (string) $color ) . '">Featured Homes for <span class="listing-stat">' . esc_html( $showTitle ) . '</span></h1>';
			echo '	<iframe id="'. esc_attr( (string) $this->homes_iframe_id( $iframe_id ) ) .'" class="featured-listings-frame '. esc_attr( (string) $this->homes_iframe_class( 'featured-listings-widget' ) ) .'" scrolling="no" title="'. esc_attr__( 'Featured Listings on Homes', 're-pro' ) .'" src="' . esc_url( $src ) . '" width="100%" seamless frameborder="0"></iframe>';
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

			$firstColor  = repro_hex_color( $firstColor );
			$secondColor = repro_hex_color( $secondColor );
			$src         = repro_iframe_src(
				'http://www.homes.com/widget/home-values/frame/',
				array(
					'avm_types'    => $valueTypes,
					'text_color'   => '#' . $firstColor,
					'button_color' => '#' . $secondColor,
					'cobrand'      => '',
					'location'     => $location,
				)
			);

			echo '<div class="home-values-widget">';
			echo '	<h1 style="color:#' . esc_attr( (string) $firstColor ) . '">Search Home Values</h1>';
			echo '	<iframe id="'. esc_attr( (string) $this->homes_iframe_id( $iframe_id ) ) .'" class="home-values-frame '. esc_attr( (string) $this->homes_iframe_class( 'home-values-widget' ) ) .'" scrolling="no" title="'. esc_attr__( 'Home Values on Homes', 're-pro' ) .'" src="' . esc_url( $src ) . '" width="100%" seamless frameborder="0"></iframe>';
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

			$color = repro_hex_color( $color );
			$src   = repro_iframe_src(
				'http://www.homes.com/widget/medium-search/frame/',
				array(
					'text_color'     => '#' . $color,
					'listing_status' => $searchTypes,
					'cobrand'        => '',
					'location'       => $location,
				)
			);

			echo '<div class="medium-search-widget">';
			echo '	<h1 style="color:#' . esc_attr( (string) $color ) . '">Search Homes <span class="listing-stat">' . esc_html( $showTitle ) . '</span> </h1>';
			echo '	<iframe id="'. esc_attr( (string) $this->homes_iframe_id( $iframe_id ) ) .'" class="medium-search-frame '. esc_attr( (string) $this->homes_iframe_class( 'search-widget' ) ) .'" scrolling="no" title="'. esc_attr__( 'Search on Homes', 're-pro' ) .'" src="' . esc_url( $src ) . '" width="100%" seamless frameborder="0"></iframe>';
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

			$color = repro_hex_color( $color );
			$src   = repro_iframe_src(
				'http://www.homes.com/widget/mortgage-calculator/frame/',
				array(
					'text_color' => '#' . $color,
					'cobrand'    => '',
				)
			);

			echo '<div class="mortgage-calculator-widget">';
			echo '	<h1 style="color:#' . esc_attr( (string) $color ) . '">Mortgage Calculator</h1>';
			echo '	<a href="http://www.homes.com/widgets/" title="Homes.com" class="logo">';
			echo '		Powered By Homes.com';
			echo '	</a>';
			echo '	<iframe id="'. esc_attr( (string) $this->homes_iframe_id( $iframe_id ) ) .'" class="mortgage-calculator-frame '. esc_attr( (string) $this->homes_iframe_class( 'mortgage-calc-widget' ) ) .'" scrolling="no" title="'. esc_attr__( 'Mortgage Calculator on Homes', 're-pro' ) .'" src="' . esc_url( $src ) . '" width="100%" seamless frameborder="0"></iframe>';
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

			$color = repro_hex_color( $color );
			$src   = repro_iframe_src(
				'http://www.homes.com/widget/simple-search/frame/',
				array(
					'text_color'     => '#' . $color,
					'listing_status' => $searchTypes,
					'cobrand'        => '',
					'location'       => $location,
				)
			);

			echo '<div class="simple-search-widget">';
			echo '<h1 style="color:#' . esc_attr( (string) $color ) . '">Search Homes <span class="listing-stat">' . esc_html( $showTitle ) . '</span></h1>';
			echo '	<iframe id="'. esc_attr( (string) $this->homes_iframe_id( $iframe_id ) ) .'" class="simple-search-frame '. esc_attr( (string) $this->homes_iframe_class( 'simple-search-widget' ) ) .'" scrolling="no" title="'. esc_attr__( 'Simple Search on Homes', 're-pro' ) .'" src="' . esc_url( $src ) . '" width="100%" seamless frameborder="0"></iframe>';
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

			$color = repro_hex_color( $color );
			$src   = repro_iframe_src(
				'http://www.homes.com/widget/tall-search/frame/',
				array(
					'text_color'     => '#' . $color,
					'listing_status' => $status,
					'cobrand'        => '',
					'location'       => $location,
				)
			);

			echo '<div class="tall-search-widget">';
			echo '	<h1 style="color:#' . esc_attr( (string) $color ) . '">Search Homes</h1>';
			echo '	<iframe id="'. esc_attr( (string) $this->homes_iframe_id( $iframe_id ) ) .'" class="tall-search-frame '. esc_attr( (string) $this->homes_iframe_class( 'tall-search-widget' ) ) .'" scrolling="no" title="'. esc_attr__( 'Tall Search on Homes', 're-pro' ) .'" src="' . esc_url( $src ) . '" width="100%" seamless frameborder="0"></iframe>';
			echo '	<a href="http://www.homes.com/widgets/" title="Homes.com" class="logo">';
			echo '		Powered By Homes.com';
			echo '	</a>';
			echo '</div>';
		}
	}
}
