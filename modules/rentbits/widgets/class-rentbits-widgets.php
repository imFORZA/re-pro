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
		 * __construct function.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {
			//add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
			wp_enqueue_script( 'rb-widget-loader', 'http://rentbits.com/rb/common/rb_widget.js', array( 'jquery' ), null, true );


		}

		/**
		 * Enqueue JS.
		 */
		public function enqueue() {
			wp_enqueue_script( 'rb-widget-loader', 'http://rentbits.com/rb/common/rb_widget.js', array( 'jquery' ), null, true );
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
			?>
			<div id="rb_swt"></div>
			<script type="text/javascript">
				var loc1 = "<?php echo $loc1 ?>";
				var loc2 = "<?php echo $loc2 ?>";
				var loc3 = "<?php echo $loc3 ?>";
				var loc4 = "<?php echo $loc4 ?>";
				var rbw_width = "195px";
				var rbw_height = "295px";
				var rbw_url = "http://rentbits.com/rb/pageinc.do?p=widget-cmp-price&loc1="+loc1+"&loc2="+loc2+"&loc3="+loc3+"&loc4="+loc4+"";
			</script>
			<?php
			//wp_enqueue_script( 'rb-widget-loader', 'http://rentbits.com/rb/common/rb_widget.js', array( 'jquery' ), null, true );

		}

		/**
		 * Get Average Rental Rates Widget.
		 *
		 * @access public
		 * @return void
		 */
		public function get_average_rental_rates_widget( $loc ) {
			?>
			<div id="rb_swt"></div>
			<script type="text/javascript">
				var loc = "<?php echo $loc ?>";
				var rbw_height = "365px";
				var rbw_width = "330px";
				var rbw_url = "http://rentbits.com/rb/pageinc.do?p=widget-avg-price&loc="+loc+"";
			</script>
			<?php

		}


	}
}
