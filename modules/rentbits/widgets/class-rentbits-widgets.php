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
		 * Widget data to be sent to JS.
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
			add_action( 'wp_footer', array( $this, 'rb_enqueue' ) );
		}

		/**
		 * Handle multiple rb widgets js enqueues.
		 */
		public function rb_enqueue() {
			wp_enqueue_script( 'rb-widgets-js', plugins_url( 'rb-widgets.js', __FILE__ ), array( 'jquery' ), null, true );
			wp_localize_script( 'rb-widgets-js', 'rb_data', static::$rb_data );

		}

		/* Rentbits WIDGETS. */

		/**
		 * Get Rental Comparison Widget.
		 *
		 * @access public
		 * @param mixed $loc1 First Location.
		 * @param mixed $loc2 Second Location.
	 	 * @param mixed $loc3 Third Location.
		 * @param mixed $loc4 Fourth Location.
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
		 * @param mixed $loc Location.
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
