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
			wp_localize_script( 'hf-widgets-js', 'hf_data', static::$hf_data );

		}

		/**
		 * HomeFinder ID Names.
		 *
		 * @access public
		 * @param string $widget_id (default: '').
		 * @return string $widget_id.
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
		public function get_homes_for_sale_widget() {

			$widget_data = array(
				'type' => 'homeSearch',
				'container' => 'homeSearchWidget',
			);
			static::$hf_data[] = $widget_data;

			$index = count( static::$hf_data ) - 1;

			echo '<div id="homeSearchWidget-'. $index .'" class="'. $this->homefinder_class( 'homes-for-sale' ) .'"></div>';

		}

		/**
		 * Get Open House Widget.
		 *
		 * @access public
		 * @return void
		 */
		public function get_open_house_widget() {

			$widget_data = array(
				'type' => 'openHouseSearch',
				'container' => 'openHouseSearchWidget',
			);
			static::$hf_data[] = $widget_data;

			$index = count( static::$hf_data ) - 1;

			echo '<div id="openHouseSearchWidget-'. $index .'" class="'. $this->homefinder_class( 'open-house' ) .'"></div>';

		}

		/**
		 * Get Foreclosure Homes Widget.
		 *
		 * @access public
		 * @return void
		 */
		public function get_foreclosure_homes_widget() {

			$widget_data = array(
				'type' => 'foreclosureSearch',
				'container' => 'foreclosureSearchWidget',
			);
			static::$hf_data[] = $widget_data;

			$index = count( static::$hf_data ) - 1;

			echo '<div id="foreclosureSearchWidget-'. $index .'" class="'. $this->homefinder_class( 'foreclosure-homes' ) .'"></div>';

		}

		/**
		 * Get HomeFinder Widget.
		 *
		 * @access public
		 * @param string  $type Widget Type.
		 * @param  [Mixed] $widget_data : Array of widget data to send to js.
		 * @return void
		 */
		public function get_affiliates_widget( $type, $widget_data ) {

			$widget_data['type'] = $type;
			static::$hf_data[] = $widget_data;

			$index = count( static::$hf_data ) - 1;

			if ( 'search' === $type ) {
				echo '<div id="searchPreview-' . $index . '" class="'. $this->homefinder_class( 'affiliate-search' ) .'"><div>';
			} else if ( 'directory' === $type ) {
				echo '<div id="directoryPreview-' . $index . '" class="'. $this->homefinder_class( 'adveritser-directory' ) .'"></div>';
			}

		}
	}
}
