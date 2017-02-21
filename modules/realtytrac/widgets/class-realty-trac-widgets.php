<?php
/**
 * RealtyTrac Widgets Class
 *
 * @package RE-PRO
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'RealtyTracWidgets' ) ) {
	/**
	 * RealtyTracWidgets class.
	 */
	class RealtyTracWidgets {

		/**
		 * __construct function.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {
		}

		/**
		 * RealtyTrac ID Names.
		 *
		 * @access public
		 * @param string $widget_id (default: '')
		 * @return void
		 */
		public function realtytrac_id( $widget_id = '' ) {

			if( '' !== $widget_id  ) {
				return sanitize_html_class( $widget_id );
			}

		}

		/* RealtyTrac WIDGETS. */

		/**
		 * Get Real Estate Trends Ticker Widget.
		 *
		 * @access public
		 * @param mixed $loc Location.
		 * @param mixed $size Size.
		 * @return void
		 */
		public function get_trends_ticker_widget( $loc, $size ) {

			echo '<script src="http://www.realtytrac.com/UI/jscript/tickerwidgetinit.js?guid=39a69bb5-fc2b-42ab-7bec-17c08c7e57d5&state=' . $loc . '&size=' . $size . '" type="text/javascript"></script>';
			echo '<div id="rtTickerWidgetContainer"></div>';

		}

		/**
		 * Get Foreclosure Search Widget.
		 *
		 * @access public
		 * @param mixed $loc Location.
		 * @return void
		 */
		public function get_foreclosure_search_widget( $type, $loc ) {

			echo '<script src="http://www.realtytrac.com/UI/jscript/widgetinit.js?widgetType=' . $type . '&location=' . $loc . '" type="text/javascript"></script>';
			echo '<div id="rtTickerWidgetContainer"></div>';

		}


	}
}
