<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'TruliaWidgets' ) ) {

	/**
	 * TruliaWidgets class.
	 */
	class TruliaWidgets {

		/**
		 * __construct function.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {
		}


		/**
		 * trulia_iframe_css function.
		 *
		 * @access public
		 * @return void
		 */
		public function trulia_iframe_css() {

		?>

		<style>
			.trulia-iframe {
				display:block;
				max-width:100%;
			}
		</style>

		<?php

		}

		/**
		 * Trulia Iframe ID Names.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @return void
		 */
		public function trulia_iframe_id( $iframe_id = '' ) {

			if( '' !== $iframe_id  ) {
				return sanitize_html_class( $iframe_id ) . '-iframe';
			}

		}

		/**
		 * Trulia Iframe Class Names.
		 *
		 * @access public
		 * @param string $widget_name (default: '')
		 * @return void
		 */
		public function trulia_iframe_class( $widget_name = '' ) {

			if( '' !== $widget_name ) {
				return 'trulia trulia-iframe trulia-' . sanitize_html_class( $widget_name ) . '-iframe';
			} else {
				return 'trulia-iframe';
			}

		}

		/**
		 * get_community_advice_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $display_answers
		 * @param mixed $title
		 * @param string $email (default: '')
		 * @return void
		 */
		public function get_community_advice_widget( $iframe_id = '', $display_answers, $title, $email = '' ) {
			echo '<iframe id="'. $this->trulia_iframe_id( $iframe_id ) .'" class="'. $this->trulia_iframe_class( 'community-advice' ) .'" src="https://synd.trulia.com/tools/expert-community-advice/embedded?params%5Bwhose_answer%5D=&params%5Bdisplay_answers%5D=true&params%5Btitle%5D=Expert+Community+Advice&params%5Bcolor%5D=grey&params%5Bemail%5D=&params%5Buser_url%5D=&params%5Bwidth%5D=300&params%5Bheight%5D=350&params%5Bguid%5D=58237a792f772"></iframe>';
		}

		/**
		 * get_rent_buy_calc_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $location
		 * @param mixed $width
		 * @param mixed $height
		 * @param string $email (default: '')
		 * @return void
		 */
		public function get_rent_buy_calc_widget( $iframe_id = '', $location, $width, $height, $email = '' ) {
			echo '<iframe id="'. $this->trulia_iframe_id( $iframe_id ) .'" class="'. $this->trulia_iframe_class( 'rent-buy-calc' ) .'" src="https://synd.trulia.com/tools/rent-vs-buy-calculator/embedded?params%5Btool_metro_area%5D=31084&params%5Btitle%5D=Rent+vs.+Buy+Calculator&params%5Bcolor%5D=grey&params%5Bemail%5D=&params%5Buser_url%5D=&params%5Bwidth%5D=600&params%5Bheight%5D=300&params%5Bguid%5D=582379f9264e8"></iframe>';
		}

		/**
		 * get_rental_market_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $location
		 * @param mixed $width
		 * @param mixed $height
		 * @param string $email (default: '')
		 * @return void
		 */
		public function get_rental_market_widget( $iframe_id = '', $location, $width, $height, $email = '' ) {

			echo '<iframe id="'. $this->trulia_iframe_id( $iframe_id ) .'" class="'. $this->trulia_iframe_class( 'rental-market' ) .'" src="https://synd.trulia.com/tools/rental-market-monitor/embedded?params%5Blocation%5D=Los+Angeles%2C+CA&params%5BlocationId%5D=22637&params%5Bcolor%5D=grey&params%5Bemail%5D=&params%5Buser_url%5D=&params%5Btitle%5D=Rental+Market+Monitor&params%5Bwidth%5D=300&params%5Bheight%5D=250&params%5Bguid%5D=582379637cf2e"></iframe>';

		}


		/**
		 * get_map_search_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $location
		 * @param mixed $width
		 * @param mixed $height
		 * @param string $email (default: '')
		 * @return void
		 */
		public function get_map_search_widget( $iframe_id = '', $location, $width, $height, $email = '' ) {
			echo '<iframe id="'. $this->trulia_iframe_id( $iframe_id ) .'" class="'. $this->trulia_iframe_class( 'map-search' ) .'" src="https://synd.trulia.com/tools/map-search/embedded?params%5Blocation%5D=West+Hills%2C+CA&params%5BlocationId%5D=39307&params%5Bagent_id%5D=&params%5Bproperty_status%5D=for+sale&params%5Btitle%5D=Map+Search&params%5Bcolor%5D=grey&params%5Bemail%5D=&params%5Buser_url%5D=&params%5Bwidth%5D=600&params%5Bheight%5D=300&params%5Bguid%5D=582378f4c0432"></iframe>';
		}

		/**
		 * get_home_gallery_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $location
		 * @param mixed $width
		 * @param mixed $height
		 * @param string $email (default: '')
		 * @return void
		 */
		public function get_home_gallery_widget( $iframe_id = '', $location, $width, $height, $email = '' ) {
			echo '<iframe id="'. $this->trulia_iframe_id( $iframe_id ) .'" class="'. $this->trulia_iframe_class( 'home-gallery' ) .'" src="https://synd.trulia.com/tools/home-gallery/embedded?params%5Blocation%5D=Los+Angeles%2C+CA&params%5BlocationId%5D=22637&params%5Bmin_price%5D=&params%5Bmax_price%5D=&params%5Bnum_beds%5D=&params%5Bnum_baths%5D=&params%5Bagent_id%5D=&params%5Bspeed%5D=5000&params%5Btitle%5D=Home+Gallery&params%5Bcolor%5D=green&params%5Bemail%5D=&params%5Buser_url%5D=&params%5Bwidth%5D=300&params%5Bheight%5D=300&params%5Bguid%5D=582371b703b0d&params%5Bslides_per_page%5D=3&city=Los Angeles&state_code=CA"></iframe>';
		}

		/**
		 * get_home_showcase_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $location
		 * @param mixed $width
		 * @param mixed $height
		 * @param string $email (default: '')
		 * @return void
		 */
		public function get_home_showcase_widget( $iframe_id = '', $location, $width, $height, $email = '' ) {
			echo '<iframe id="'. $this->trulia_iframe_id( $iframe_id ) .'" class="'. $this->trulia_iframe_class( 'home-showcase' ) .'" src="https://synd.trulia.com/tools/home-showcase/embedded?params%5Blocation%5D=Los+Angeles%2C+CA&params%5BlocationId%5D=22637&params%5Bmin_price%5D=&params%5Bmax_price%5D=&params%5Bnum_beds%5D=&params%5Bnum_baths%5D=&params%5Bagent_id%5D=&params%5Bspeed%5D=5000&params%5Btitle%5D=My+Listings&params%5Bcolor%5D=grey&params%5Bemail%5D=&params%5Buser_url%5D=&params%5Bwidth%5D=300&params%5Bheight%5D=350&params%5Bguid%5D=582370ce64073"></iframe>';
		}

		/**
		 * get_homefinder_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $location
		 * @param mixed $width
		 * @param mixed $height
		 * @param string $email (default: '')
		 * @return void
		 */
		public function get_homefinder_widget( $iframe_id = '', $location, $width, $height, $email = '' ) {
			echo '<iframe id="'. $this->trulia_iframe_id( $iframe_id ) .'" class="'. $this->trulia_iframe_class( 'homefinder' ) .'"  src="https://synd.trulia.com/tools/home-finder/embedded?params%5Blocation%5D=&params%5BlocationId%5D=&params%5Bcolor%5D=green&params%5Bemail%5D=&params%5Buser_url%5D=&params%5Btitle%5D=Home+Finder&params%5Bwidth%5D=300&params%5Bheight%5D=350&params%5Bguid%5D=58236f71d7732"></iframe>';
		}

		/**
		 * get_market_monitor_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $location
		 * @param mixed $width
		 * @param mixed $height
		 * @param string $email (default: '')
		 * @return void
		 */
		public function get_market_monitor_widget( $iframe_id = '', $location, $width, $height, $email = '' ) {

			echo '<iframe id="'. $this->trulia_iframe_id( $iframe_id ) .'" class="'. $this->trulia_iframe_class( 'market-monitor' ) .'" src="https://synd.trulia.com/tools/market-monitor/embedded?params%5Blocation%5D=Los+Angeles%2C+CA&params%5BlocationId%5D=22637&params%5Blisting_price_type%5D=average&params%5Bshow_inventory%5D=1&params%5Btitle%5D=Market+Monitor&params%5Bcolor%5D=grey&params%5Bemail%5D=&params%5Buser_url%5D=&params%5Bwidth%5D=300&params%5Bheight%5D=250&params%5Bguid%5D=58236e004595a"></iframe>';
		}

		/**
		 * get_affordability_calc_widget function. (https://www.trulia.com/tools/affordability-calculator/)
		 *
		 * @access public
		 * @param mixed $color
		 * @param mixed $title
		 * @param mixed $email
		 * @param mixed $width
		 * @param mixed $height
		 * @return void
		 */
		public function get_affordability_calc_widget( $iframe_id = '', $color, $title, $width, $height, $email = '' ) {

		echo '<iframe id="'. $this->trulia_iframe_id( $iframe_id ) .'" class="'. $this->trulia_iframe_class( 'affordability-calc' ) .'" src="https://synd.trulia.com/tools/affordability-calculator/embedded?params%5Bcolor%5D=grey&params%5Bemail%5D=&params%5Buser_url%5D=&params%5Btitle%5D=Affordability+Calculator&params%5Bwidth%5D=600&params%5Bheight%5D=300&params%5Bguid%5D=58236d0b501ae"></iframe>';

		}

	}
}
