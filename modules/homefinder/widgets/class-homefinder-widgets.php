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
	 * Widget data to be sent to JS.
	 *
	 * @var [Array]
	 */
	static private $hf_data;

		/**
		 * __construct function.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {
			add_action( 'wp_footer', array( $this, 'hf_enqueue' ) );

		}

		/**
		 * Enqueue JS on footer and handle multiple widgets.
		 */
		public function hf_enqueue() {
			wp_enqueue_script( 'hf-widget-loader', 'http://www.homefinder.com/widgets/js/widgetLoader.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'hf-widgets-js', plugins_url( 'homefinder-widgets.js', __FILE__ ), array( 'jquery' ), null, true );
			wp_localize_script( 'hf-widgets-js', 'hf_data', static::$hf_data);

		}

		/**
		 * HomeFinder ID Names.
		 *
		 * @access public
		 * @param string $iframe_id (default: '').
		 * @return string $iframe_id.
		 */
		public function homefinder_id( $widget_id = '' ) {

			if ( '' !== $widget_id  ) {
				return sanitize_html_class( $widget_id );
			}

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
		public function get_homes_for_sale_widget( $widget_id ) {

			echo '<div id="'. $this->homefinder_id( $widget_id ) .'" class="'. $this->homefinder_class( 'homes-for-sale' ) .'"></div>';
			echo '<script src="https://www.homefinder.com/widgets/js/widgetLoader.js?ver=887bb2d54cbc812a0d20eb52dc1ba8db"></script>';
			echo '<script type="text/javascript">';
	  	echo 'var hfWidget = [ {type: "homeSearch", container: "'. $this->homefinder_id( $widget_id ) .'"}];';
	    echo 'HomeFinder.widgetLoader.getWidgets(hfWidget);';
			echo '</script>';

		}

		/**
		 * Get Open House Widget.
		 *
		 * @access public
		 * @return void
		 */
		public function get_open_house_widget( $widget_id ) {

			echo '<div id="'. $this->homefinder_id( $widget_id ) .'" class="'. $this->homefinder_class( 'open-house' ) .'"></div>';
			echo '<script src="https://www.homefinder.com/widgets/js/widgetLoader.js?ver=887bb2d54cbc812a0d20eb52dc1ba8db"></script>';
			echo '<script type="text/javascript">';
			echo 'var hfWidget = [ {type: "openHouseSearch", container: "'. $this->homefinder_id( $widget_id ) .'"} ];';
			echo 'HomeFinder.widgetLoader.getWidgets(hfWidget);';
			echo '</script>';

		}

		/**
		 * Get Foreclosure Homes Widget.
		 *
		 * @access public
		 * @return void
		 */
		public function get_foreclosure_homes_widget( $widget_id ) {

			echo '<div id="'. $this->homefinder_id( $widget_id ) .'" class="'. $this->homefinder_class( 'foreclosure-homes' ) .'"></div>';
			echo '<script src="https://www.homefinder.com/widgets/js/widgetLoader.js?ver=887bb2d54cbc812a0d20eb52dc1ba8db"></script>';
			echo '<script type="text/javascript">';
      echo 'var hfWidget = [ {type: "foreclosureSearch", container: "'. $this->homefinder_id( $widget_id ) .'"} ];';
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

			$search_data['type'] = 'search';
			static::$hf_data[] = $search_data;

			$index = count( static::$hf_data ) - 1;
			echo '<div id="searchPreview-' . $index . '" class="'. $this->homefinder_class( 'affiliate-search' ) .'"><div>';

		}

		/**
		 * Get Advertiser Directory Widget.
		 *
		 * @access public
		 * @return void
		 */
		public function get_advertiser_directory_widget( $directory_data ) {

			$directory_data['type'] = 'directory';
			static::$hf_data[] = $directory_data;

			$index = count( static::$hf_data ) - 1;
			echo '<div id="directoryPreview-' . $index . '" class="'. $this->homefinder_class( 'adveritser-directory' ) .'"></div>';

		}


	}
}
