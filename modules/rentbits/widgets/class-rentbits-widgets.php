<?php
/**
 * Rentbits Widgets Class
 *
 * @package RE-PRO
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'RentbitsWidgets' ) ) {
	/**
	 * HomeFinderWidgets class.
	 */
	class RentbitsWidgets {

		/**
		 * Map data to be sent to JS.
		 *
		 * @var [Array]
		 */
		static private $rb_data;

		/**
		 * __construct function.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {
			add_action( 'wp_footer', array( $this, 'rb_enqueues' ),  11 );
		}

		/**
		 * Handle multiple rb widgets js enqueues.
		 */
		public function rb_enqueues() {
			wp_enqueue_script( 'rb-widgets-js', plugins_url( 'rb-widgets.js', __FILE__ ), array( 'jquery' ), null, true );
			wp_localize_script( 'rb-widgets-js', 'rb_data', static::$rb_data);

		}

		/**
		 * HomeFinder ID Names.
		 *
		 * @access public
		 * @param string $iframe_id (default: '').
		 * @return string $iframe_id.
		 */
		public function rentbits_id( $widget_id = '' ) {

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
		public function rentbits_class( $widget_name = '' ) {

			if ( '' !== $widget_name ) {
				return 'rentbits rentbits-widget rentbits-' . sanitize_html_class( $widget_name ) . '-widget';
			} else {
				return 'rentbits rentbits-widget';
			}

		}

		/* Rentbits WIDGETS. */

		/**
		 * Get Rental Comparison Widget.
		 *
		 * @access public
		 * @return void
		 */
		public function get_rental_comparison_widget( $loc1, $loc2, $loc3, $loc4 ) {

			$url = 'http://rentbits.com/rb/pageinc.do?p=widget-cmp-price&loc1=' . $loc1 . '&loc2=' . $loc2 . '&loc3=' . $loc3 . '&loc4=' . $loc4;

			$rb_data = array(
				'width' => '195px',
				'height' => '295px',
				'url' => $url,
			);
			static::$rb_data[] = $rb_data;

			$index = count( static::$rb_data ) - 1;
			echo '<div id="rb-widget-' . $index . '"></div>';

		}

		/**
		 * Get Average Rental Rates Widget.
		 *
		 * @access public
		 * @return void
		 */
		public function get_average_rental_rates_widget( $loc ) {

			$url = 'http://rentbits.com/rb/pageinc.do?p=widget-avg-price&loc=' . $loc;

			$rb_data = array(
				'width' => '330px',
				'height' => '365px',
				'url' => $url,
			);
			static::$rb_data[] = $rb_data;

			$index = count( static::$rb_data ) - 1;
			echo '<div id="rb-widget-' . $index . '"></div>';

		}


	}
}
