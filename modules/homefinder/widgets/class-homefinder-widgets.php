<?php
/**
 * HomeFinder Widgets Class
 *
 * @package RE-PRO
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'HomeFinderWidgets' ) ) {
	/**
	 * HomeFinderWidgets class.
	 */
	class HomeFinderWidgets {

		/**
		 * __construct function.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {
		}

		/**
		 * HomeFinder div Class Names.
		 *
		 * @access public
		 * @param string $widget_name (default: '').
		 * @return string class name.
		 */
		public function homefinder_class( $widget_name = '' ) {

			if ( '' !== $widget_name ) {
				return 'homefinder homefinder-widget homefinder-' . sanitize_html_class( $widget_name ) . '-widget';
			} else {
				return 'homefinder homefinder-widget';
			}

		}

		/* HomeFinder WIDGETS. */

		/**
		 * Get Homes For Sale Widget.
		 *
		 * @access public
		 * @return void
		 */
		public function get_homes_for_sale_widget() {

			echo '<div id="homeSearchWidget" class="'. $this->homefinder_class( 'homes-for-sale' ) .'"></div>';
			echo '<script src="https://www.homefinder.com/widgets/js/widgetLoader.js?ver=887bb2d54cbc812a0d20eb52dc1ba8db"></script>';
			echo '<script type="text/javascript">';
	  	echo 'var hfWidget = [ {type: "homeSearch", container: "homeSearchWidget"}];';
	    echo 'HomeFinder.widgetLoader.getWidgets(hfWidget);';
			echo '</script>';

		}

		/**
		 * Get Open House Widget.
		 *
		 * @access public
		 * @return void
		 */
		public function get_open_house_widget() {

			echo '<div id="openHouseSearchWidget"' . $this->homefinder_class( 'open-house' ) .'"></div>';
			echo '<script src="https://www.homefinder.com/widgets/js/widgetLoader.js?ver=887bb2d54cbc812a0d20eb52dc1ba8db"></script>';
			echo '<script type="text/javascript">';
			echo 'var hfWidget = [ {type: "openHouseSearch", container: "openHouseSearchWidget"} ];';
			echo 'HomeFinder.widgetLoader.getWidgets(hfWidget);';
			echo '</script>';

		}

		/**
		 * Get Foreclosure Homes Widget.
		 *
		 * @access public
		 * @return void
		 */
		public function get_foreclosure_homes_widget() {

			echo '<div id="foreclosureSearchWidget"' . $this->homefinder_class( 'foreclosure-homes' ) .'"></div>';
			echo '<script src="https://www.homefinder.com/widgets/js/widgetLoader.js?ver=887bb2d54cbc812a0d20eb52dc1ba8db"></script>';
			echo '<script type="text/javascript">';
      echo 'var hfWidget = [ {type: "foreclosureSearch", container: "foreclosureSearchWidget"} ];';
      echo 'HomeFinder.widgetLoader.getWidgets(hfWidget);';
  		echo '</script>';

		}

		/**
		 * Get Affiliate Search Widget.
		 *
		 * @access public
		 * @return void
		 */
		public function get_affiliate_search_widget( $search_data ) {
		?>
		<div id="searchPreview"><div>
		<script src="http://www.homefinder.com/widgets/js/widgetLoader.js"></script>
		<?php
			wp_enqueue_script( 'hf-affiliate-search', plugins_url( 'affiliate-search.js', __FILE__ ), array( 'jquery' ), null, true );
			wp_localize_script( 'hf-affiliate-search', 'widget_data', $search_data);

		}


	}
}
