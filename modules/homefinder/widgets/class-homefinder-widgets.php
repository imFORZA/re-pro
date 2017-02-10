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
	 * HomesWidgets class.
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

		/* Homes WIDGETS. */

		/**
		 * Get Homes For Sale Widget.
		 *
		 * @access public
		 * @param string $iframe_id (default: '').
		 * @param mixed  $start_addr Start Address.
		 * @param mixed  $color Button Color.
		 * @return void
		 */
		public function get_homes_for_sale_widget() {
			?>
			<div id="homeSearchWidget" style="width: 300px; height: 250px;"></div>
			<script src="https://www.homefinder.com/widgets/js/widgetLoader.js?ver=887bb2d54cbc812a0d20eb52dc1ba8db" ></script>
			<script type="text/javascript">
	  		var hfWidget = [ {type: 'homeSearch', container: 'homeSearchWidget'}];
	    	HomeFinder.widgetLoader.getWidgets(hfWidget);
			</script>


			<?php


		}


	}
}
