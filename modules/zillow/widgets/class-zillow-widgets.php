<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'ZillowWidgets' ) ) {

	/**
	 * ZillowWidgets class.
	 */
	class ZillowWidgets {

		/**
		 * __construct function.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {
		}


		/**
		 * zillow_iframe_css function.
		 *
		 * @access public
		 * @return void
		 */
		public function zillow_iframe_css() {

		?>

		<style>
			.zillow-iframe {
				display:block;
				max-width:100%;
			}
		</style>

		<?php

		}

		/**
		 * Zillow Iframe ID Names.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @return void
		 */
		public function zillow_iframe_id( $iframe_id = '' ) {

			if( '' !== $iframe_id  ) {
				return sanitize_html_class( $iframe_id ) . '-iframe';
			}

		}

		/**
		 * Zillow Iframe Class Names.
		 *
		 * @access public
		 * @param string $widget_name (default: '')
		 * @return void
		 */
		public function zillow_iframe_class( $widget_name = '' ) {

			if( '' !== $widget_name ) {
				return 'zillow zillow-iframe zillow-' . sanitize_html_class( $widget_name ) . '-iframe';
			} else {
				return 'zillow zillow-iframe';
			}

		}

		/**
		 * Get Review Widget (https://www.zillow.com/webtools/widgets/review-widget/).
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $zuid
		 * @param mixed $screenname
		 * @param string $size (default: 'wide')
		 * @param string $zmod (default: 'true')
		 * @param mixed $width
		 * @param mixed $height
		 * @return void
		 */
		public function get_review_widget( $iframe_id = '', $zuid, $screenname, $size = 'wide', $zmod = 'true', $width, $height ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'reviews' ) .'" scrolling="yes" title="'. __( 'My Reviews on Zillow', 're-pro' ) .'" src="https://www.zillow.com/widgets/reputation/Rating.htm?did=rw-widget-container&ezuid=' . $zuid .'&scrnname=' . $screenname . '&size=' .$size . '&type=iframe&zmod='. $zmod .'" width="'. $width .'" height="'. $height .'" frameborder="0"></iframe>';

		}

		/**
		 * get_past_listings_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $zuid
		 * @param string $format (default: 'normalWidget')
		 * @return void
		 */
		public function get_past_listings_widget( $iframe_id = '', $zuid, $format = 'normalWidget' ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'past-listings' ) .'" scrolling="no" title="'. __( 'My Sales on Zillow', 're-rpo' ) .'" src="https://www.zillow.com/widgets/profile/PastSalesListingWidget.htm?aid='. $zuid .'&newVersion=true&widgetFormat='. $format .'" width="500" height="250" frameborder="0" style="width:100%;"></iframe>';

		}


		/**
		 * get_affordability_calc_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @return void
		 */
		public function get_affordability_calc_widget( $iframe_id = '' ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'affordability-calc' ) .'" scrolling="no" title="'. __( 'Zillow Affordability Calculator', 're-rpo' ) .'" src="https://www.zillow.com/mortgage/widgets/AffordabilityCalculatorWidget.htm" width="688" height="700" frameborder="0" style="width:100%;min-height:700px;"></iframe>';

		}

		/**
		 * get_contact_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $email
		 * @return void
		 */
		public function get_contact_widget( $iframe_id = '', $email ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'contact' ) .'" scrolling="no" title="'. __( 'Contact me on Zillow', 're-rpo' ) .'" src="https://www.zillow.com/widgets/contact/ContactFormWidget.htm?email='. antispambot( sanitize_email( $email ) ) .'&size=wide" width="350" height="250" frameborder="0" style="width:100%;"></iframe>';

		}

		/**
		 * get_expensive_homes_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $location
		 * @param string $type (default: 'iframe')
		 * @param string $size (default: ' wide')
		 * @return void
		 */
		public function get_expensive_homes_widget( $iframe_id = '', $location, $type = 'iframe', $size = ' wide' ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'expensive-homes' ) .'" scrolling="no" title="'. __( 'Zillow Most Expensive Homes', 're-rpo' ) .'" src="http://www.zillow.com/widgets/fmr/FMRWidget.htm?did=meh-large-iframe-widget-container&type='. $type .'&size='.$size.'&rn='. $location .'&widgettype=meh" width="287" height="121" frameborder="0" style="width:100%;"></iframe>';

		}


		/**
		 * get_listings_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $zuid
		 * @param string $format (default: 'normalWidget')
		 * @return void
		 */
		public function get_listings_widget( $iframe_id = '', $zuid, $format = 'normalWidget' ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'listings' ) .'" scrolling="no" title="'. __( 'My Listings on Zillow', 're-rpo' ) .'" src="https://www.zillow.com/widgets/profile/NewListingsWidget.htm?aid='. $zuid .'&newVersion=true&widgetFormat='. $format .'" width="500" height="250" frameborder="0" style="width:100%;"></iframe>';

		}

		/**
		 * get_monthlypay_calc_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @return void
		 */
		public function get_monthlypay_calc_widget( $iframe_id = '' ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'listings' ) .'" scrolling="no" title="'. __( 'Monthly Payment Calculator', 're-rpo' ) .'" src="https://www.zillow.com/mortgage/MortgageCalculatorWidgetLarge.htm" width="688" height="700" frameborder="0" style="width:100%;min-height:700px;"></iframe>';

		}

		/**
		 * get_mortgage_calc_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param string $orientation (default: 'verticalWidget')
		 * @return void
		 */
		public function get_mortgage_calc_widget( $iframe_id = '', $orientation = 'verticalWidget' ) {

			if ( 'verticalWidget' === $orientation ) {
				$height = '470';
				$width = '200';
			} else {
				$height = '235';
				$width = '352';
			}

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'mortgage-calc' ) .'" scrolling="no" title="'. __( 'Zillow Mortgage Calculator', 're-rpo' ) .'" src="https://www.zillow.com/mortgage/SmallMortgageLoanCalculatorWidget.htm?widgetOrientationType='. $orientation .'" width="'. $width .'" height="'. $height .'" frameborder="0" style="width:100%;"></iframe>';

		}

		/**
		 * get_mortgage_rate_table_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $textcolor
		 * @param mixed $screenname
		 * @param mixed $region
		 * @return void
		 */
		public function get_mortgage_rate_table_widget( $iframe_id = '', $textcolor, $screenname, $region ) {

			?>
			<style>
			.zillow-mortage-rate-table {
				overflow:hidden;
				text-align:center;
				margin:0 auto;
				text-transform:none;
				line-height:normal;
			}
			.zillow-mortage-rate-table .header-labels {
				margin:5px 0 1px;
			}
			.zillow-mortage-rate-table .current-label {
				padding-left:137px;
				color:#<?php echo $textcolor; ?>;
			}
			.zillow-mortage-rate-table .lastweek-label {
				padding-left:23px;
				color:#<?php echo $textcolor; ?>;
			}
			.zillow-mortage-rate-table .rate-label-row {
				box-sizing:content-box;
				height:29px;
				border-bottom:1px solid #ccc;
			}
			.zillow-mortage-rate-table .rate-labels-wrapper {
				box-sizing:content-box;
				width:50%;
				float:left;
			}
			.zillow-mortage-rate-table .rate-label {
				box-sizing:content-box;
				padding:9px 0 0 8px;
				text-align:left;
			}
		</style>

	<div id="" class="zillow-mortage-rate-table">


		<div class="header-labels">
			<span class="current-label"><?php _e( 'Current', 're-pro' ); ?></span><span class="lastweek-label"><?php _e( 'Last Week', 're-pro' ); ?></span>
		</div>

		<div>
			<div class="rate-labels-wrapper">
				<div id="30-year-label-row" class="rate-label-row">
					<div id="30-year-label" class="rate-label">
						<?php _e( '30 Year Fixed', 're-pro' ); ?>
					</div>
				</div>

				<div id="15-year-label-row" class="rate-label-row">
					<div id="15-year-label" class="rate-label">
						<?php _e( '15 Year Fixed', 're-pro' ); ?>
					</div>
				</div>

				<div id="5-1-adjustable-label-row" class="rate-label-row">
					<div id="5-1-adjustable-label" class="rate-label">
						<?php _e( '5/1 Adjustable', 're-pro' ); ?>
					</div>
				</div>
			</div>

		<?php

		echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'mortgage-rates-table' ) .'" scrolling="no" title="'. __( 'Zillow Mortgage Rate Table', 're-rpo' ) .'" src="https://www.zillow.com/mortgage/MortgageRateTable.htm?wide=1&textcolor='. $textcolor .'&scrnname='. $screenname .'&region='. $region .'&cobrand='. $screenname .'" width="130" height="100" frameborder="0" style="width:50%;"></iframe>';

		}

		/**
		 * get_mortage_rate_widget function.
		 *
		 * @access public
		 * @return void
		 */
		public function get_mortage_rate_widget( $iframe_id = '' ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'mortgage-rates' ) .'" scrolling="no" title="'. __( 'Zillow Mortgage Rate Table', 're-rpo' ) .'" src="https://www.zillow.com/webtools/widgets/RateTableDistributionWidget.htm" width="306" height="215" frameborder="0" style="width:100%;min-height:215px;"></iframe>';

		}

	}
}
