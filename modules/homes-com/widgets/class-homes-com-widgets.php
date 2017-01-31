<?php

/* Exit if accessed directly. */
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
		 * homes_iframe_css function.
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
		 * homes Iframe ID Names.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @return void
		 */
		public function homes_iframe_id( $iframe_id = '' ) {

			if( '' !== $iframe_id  ) {
				return sanitize_html_class( $iframe_id ) . '-iframe';
			}

		}

		/**
		 * Homes Iframe Class Names.
		 *
		 * @access public
		 * @param string $widget_name (default: '')
		 * @return void
		 */
		public function homes_iframe_class( $widget_name = '' ) {

			if( '' !== $widget_name ) {
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
		 * @param string $iframe_id (default: '')
		 * @param mixed $street_addr
		 * @return void
		 */
		public function get_commute_time_widget( $iframe_id = '', $street_addr = '', $color= '0054a0' ) {

		?>

		<style>
		.HOMES-commute-time-widget{
			color: #484848;
			padding: 7px 10px 10px;
			overflow: hidden;
			clear:both;
		}
		.HOMES-commute-time-widget::before,
		.HOMES-commute-time-widget::after {
			content: '';
			display: table;
			width:100%;
			clear:both;
		}
		.HOMES-commute-time-widget h1 {
			color:#0054a0;
			font-weight:400;
			font-size: 17px;
			line-height: 20px;
			margin: .3em 0 .7em;
		}
		.HOMES-commute-time-widget .commute-time-frame {
			border:0;
			border-bottom: 1px solid #eeeae9;
			margin: 0 0 .5em;
			overflow: hidden;
			height: 200px;
		}
		.HOMES-commute-time-widget a {
			font-weight: 700;
			color: #0054a0;
			text-decoration: none;
			font-size: .75em;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
		}
		.HOMES-commute-time-widget a:hover {
			text-decoration: underline;
		}
		.HOMES-commute-time-widget .logo {
			background: transparent url(http://cdn1.static-homes.com/media/portalimgcache/widget/builder/logo-widget.png) 0 0 no-repeat;
			width: 139px;
			height: 22px;
			overflow: hidden;
			direction: ltr;
			text-indent: -3000px;
			float: right;
		}
		.HOMES-commute-time-widget .footer a {
			margin: 0;
		}
		.HOMES-commute-time-widget .footer .link {
			max-width: 50%;
			display: block;
		}
	</style>

		<?php

				echo '<div class="HOMES-commute-time-widget">';
				echo '<h1>Commute Time</h1>';
				echo '<iframe class="commute-time-frame" id="'. $this->homes_iframe_id( $iframe_id ) .'" class="'. $this->homes_iframe_class( 'listings' ) .'" scrolling="no" title="'. __( 'Commute Time on Homes', 're-pro' ) .'" src="http://www.homes.com/widget/commute-time/frame/?show_only_destination=NO&text_color=%230054a0&direction_link=%2FHomesCom%2FInclude%2FListingDetail%2FMap%2FPrintDirections%2Ecfm%3FstartAddress%3D%25%25source%5Faddress%25%25%26endAddress%3D%25%25destination%5Faddress%25%25&button_color=%23' . $color .'&cobrand=&source_address=' . $street_addr . '"&property_id=" width="100%" seamless frameborder="0"></iframe>';

				echo '<div class="footer">';
				echo '<a href="http://www.homes.com/widgets/" title="Homes.com" class="logo">';
				echo 'Powered By Homes.com';
				echo '</a>';
				echo '</div>';

				// TO DO : Use wp_enqueue
				echo '<script src="http://www.homes.com/widget/commute-time/remote.js?show_only_destination=NO&text_color=%230054a0&direction_link=%2FHomesCom%2FInclude%2FListingDetail%2FMap%2FPrintDirections%2Ecfm%3FstartAddress%3D%25%25source%5Faddress%25%25%26endAddress%3D%25%25destination%5Faddress%25%25&button_color=%23' . $color . '&cobrand=&source_address=' . $street_addr . '&property_id=" type="text/javascript"></script>';
				echo '</div>';

		}
	}
}
