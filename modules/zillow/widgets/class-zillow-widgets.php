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

		/* YOU ON ZILLOW WIDGETS. */

		/**
		 * Get My Zillow Listings Widget.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $zuid
		 * @param string $format (default: 'normalWidget')
		 * @return void
		 */
		public function get_listings_widget( $iframe_id = '', $zuid, $format = 'normalWidget' ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'listings' ) .'" scrolling="no" title="'. __( 'My Listings on Zillow', 're-rpo' ) .'" src="https://www.zillow.com/widgets/profile/NewListingsWidget.htm?aid='. $zuid .'&newVersion=true&widgetFormat='. $format .'" width="500" height="300" frameborder="0" style="width:100%;"></iframe>';

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
		public function get_review_widget( $iframe_id = '', $zuid, $screenname, $size = 'wide', $zmod = 'true', $width = '300', $height = '100' ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'reviews' ) .'" scrolling="yes" title="'. __( 'My Reviews on Zillow', 're-pro' ) .'" src="https://www.zillow.com/widgets/reputation/Rating.htm?did=rw-widget-container&ezuid=' . $zuid .'&scrnname=' . $screenname . '&size=' .$size . '&type=iframe&zmod='. $zmod .'" width="'. $width . '" height="'. $height .'" frameborder="0"></iframe>';

		}

		/**
		 * Get My Past Sales Widget.
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
		 * Get Contact Form Widget.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $email
		 * @return void
		 */
		public function get_contact_widget( $iframe_id = '', $email ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'contact' ) .'" scrolling="no" title="'. __( 'Contact me on Zillow', 're-rpo' ) .'" src="https://www.zillow.com/widgets/contact/ContactFormWidget.htm?email='. antispambot( sanitize_email( $email ) ) .'&size=wide" width="350" height="250" frameborder="0" style="width:100%;"></iframe>';

		}

		/* MORTGAGE WIDGETS */

		/**
		 * Get Affordability Calculator.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @return void
		 */
		public function get_affordability_calc_widget( $iframe_id = '' ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'affordability-calc' ) .'" scrolling="no" title="'. __( 'Zillow Affordability Calculator', 're-rpo' ) .'" src="https://www.zillow.com/mortgage/widgets/AffordabilityCalculatorWidget.htm" width="688" height="700" frameborder="0" style="width:100%;min-height:700px;"></iframe>';

		}

		/**
		 * Get Monthly Payment Calculator.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @return void
		 */
		public function get_monthlypay_calc_widget( $iframe_id = '' ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'listings' ) .'" scrolling="no" title="'. __( 'Monthly Payment Calculator', 're-rpo' ) .'" src="https://www.zillow.com/mortgage/MortgageCalculatorWidgetLarge.htm" width="688" height="700" frameborder="0" style="width:100%;min-height:700px;"></iframe>';

		}

		/**
		 * Get Mortgage Calculator Widget.
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
		 * Get Mortgage Rate Table Widget.
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
		<div id="" class="zillow-mortage-rate-table">
		<div class="header-labels">
			<span class="current-label" style="color:#<?php echo $textcolor ?>">
				<?php _e( 'Current', 're-pro' ); ?>
			</span>
			<span class="lastweek-label" style="color:#<?php echo $textcolor ?>">
				<?php _e( 'Last Week', 're-pro' ); ?>
			</span>
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

		echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'mortgage-rates-table' ) .'" scrolling="no" title="'. __( 'Zillow Mortgage Rate Table', 're-pro' ) .'" src="https://www.zillow.com/mortgage/MortgageRateTable.htm?wide=1&textcolor='. $textcolor .'&scrnname='. $screenname .'&region='. $region .'&cobrand='. $screenname .'" width="130" height="100" frameborder="0" style="width:50%;"></iframe>';

		}

		/**
		 * Get Rate Table with Graph Widget.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @return void
		 */
		public function get_rate_table_graph_widget( $iframe_id = '' ) {

			echo '<iframe  id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'mortgage-rates-graph' ) .'" title="'. __( 'Zillow Mortgage Rates Graph', 're-pro' ) .'" src="https://www.zillow.com/webtools/widgets/RateTableAndGraphDistributionWidget.htm" width="306" height="315" frameborder="0" scrolling="no" ></iframe>';

		}

		/**
		 * Get Large Rate Table Widget.
		 *
		 * @access public
		 * @return void
		 */
		public function get_mortage_rate_widget( $iframe_id = '' ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'mortgage-rates' ) .'" scrolling="no" title="'. __( 'Zillow Mortgage Rate Table', 're-pro' ) .'" src="https://www.zillow.com/webtools/widgets/RateTableDistributionWidget.htm" width="306" height="215" frameborder="0" style="width:100%;min-height:215px;"></iframe>';

		}

		/**
		 * Get Payment Breakout Calculator Widget.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $price
		 * @param mixed $region_id
		 * @param string $textcolor (default: '000000')
		 * @return void
		 */
		public function get_paymentbreakout_calc_widget( $iframe_id = '', $price, $region_id, $textcolor = '000000' ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'mortgage-payment-breakout' ) .'" scrolling="no" title="'. __( 'Zillow Mortgage Payment Breakout Calculator', 're-pro' ) .'"src="https://www.zillow.com/mortgage/MortgageLoanCalculatorWidget.htm?skin=custom&price='. $price .'&rid='. $region_id .'&textcolor='. $textcolor .'" frameborder="0" title="'. __( 'Zillow Mortgage Calculator', 're-pro' ) .'" width="176" height="298px"></iframe>';

		}

		/* DATA AND STATS. */

		/**
		 * Get Home Value Estimate Chart Widget.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param string $type (default: 'iframe')
		 * @param mixed $address
		 * @param string $searchbox (default: 'yes')
		 * @param mixed $region
		 * @param string $skinny_widget (default: 'true')
		 * @param string $textcolor (default: '000000')
		 * @param string $bgcolor (default: 'FFFFFF')
		 * @return void
		 */
		public function get_home_value_estimate_widget( $iframe_id = '', $type = 'iframe', $address, $searchbox = 'yes', $region, $skinny_widget = 'true', $textcolor = '000000', $bgcolor = 'FFFFFF' ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'home-value-estimate' ) .'" scrolling="no" title="'. __( 'Zillow Home Value Estimate', 're-pro' ) .'" src="https://www.zillow.com/widgets/zestimate/ZestimateLargeWidget.htm?did=zillow-shv-large-iframe-widget&type='.$type.'&address='.$address.'&searchbox='. $searchbox .'&region='.$region.'&skinnyWidget='.$skinny_widget.'&tc='. $textcolor .'&bgc='. $bgcolor .'" width="296" frameborder="0" height="360"></iframe>';
		}

		/**
		 * get_realestate_stats_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $cs
		 * @param string $did (default: 'rsw-wide')
		 * @param mixed $dys
		 * @param mixed $mt
		 * @param mixed $region_id
		 * @param mixed $sid
		 * @param string $type (default: 'iframe')
		 * @param string $wtype (default: 'rhv')
		 * @param string $skinny_widget (default: 'true')
		 * @param string $textcolor (default: '000000')
		 * @param string $bgcolor (default: 'FFFFFF')
		 * @return void
		 */
		public function get_realestate_stats_widget( $iframe_id = '', $cs, $did = 'rsw-wide', $dys, $mt, $region_id, $sid, $type = 'iframe', $wtype = 'rhv', $skinny_widget = 'true', $textcolor = '000000', $bgcolor = 'FFFFFF' ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'realestate-stats' ) .'" title="'. __( 'Zillow Real Estate Stats', 're-pro' ) .'" scrolling="no" src="https://www.zillow.com/widgets/geo/RegionalStatsWidget.htm?cs='. $cs .'&did='. $did .'&dys='.$dys.'&mt='.$mt.'&rid='.$region_id.'&sid='.$sid.'&type='.$type.'&wtype='. $type .'&skinnyWidget='.$skinny_widget.'&textcolor='.$textcolor.'&backgroundColor='. $bgcolor .'" width="286" frameborder="0" height="280"></iframe>';
		}

		/**
		 * get_rent_validation_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param string $type (default: 'iframe')
		 * @param string $skinny_widget (default: 'true')
		 * @param string $searchbox (default: 'yes')
		 * @param string $for_rent (default: 'true')
		 * @param mixed $address
		 * @param mixed $region
		 * @param string $textcolor (default: '000000')
		 * @param string $bgcolor (default: 'FFFFF')
		 * @return void
		 */
		public function get_rent_validation_widget($iframe_id = '', $type = 'iframe', $skinny_widget = 'true', $searchbox = 'yes', $for_rent = 'true', $address, $region, $textcolor = '000000', $bgcolor = 'FFFFF' ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'rent-validation' ) .'" title="'. __( 'Zillow Rent Validation', 're-pro' ) .'" scrolling="no" src="https://www.zillow.com/widgets/zestimate/ZestimateLargeWidget.htm?did=zillow-shv-large-iframe-widget&type='.$type.'&forRent='.$for_rent.'&tc='.$textcolor.'&bgc='.$bgcolor.'&address='. $address .'&searchbox='.$searchbox.'&region='.$region.'&skinnyWidget='.$skinny_widget.'" frameborder="0" width="296" height="360"></iframe>';
		}

		/* LISTINGS. */

		/**
		 * Get Most Expensive Homes Widget.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $location
		 * @param string $type (default: 'iframe')
		 * @param string $size (default: ' wide')
		 * @return void
		 */
		public function get_expensive_homes_widget( $iframe_id = '', $location, $type = 'iframe', $size = ' wide' ) {

			// TODO - Check for HTTPS, as this widget does not support it.
			// TODO - Support JS Version.

			echo '<div class="zillow-listings-widget-container zillow-meh-widget-container">';
			echo '<h5>Most Expensive Homes in ' . $location . '</h5>';
			echo '<div class="zillow-meh-outer">';
			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'expensive-homes' ) .'" title="'. __( 'Zillow Most Expensive Homes', 're-pro' ) .'" scrolling="no" src="https://www.zillow.com/widgets/fmr/FMRWidget.htm?did=meh-large-iframe-widget-container&type='. $type .'&size='.$size.'&rn='. $location .'&widgettype=meh" width="" height="121" frameborder="0" style="width:100%;"></iframe>';
			echo '</div>';
			echo '<img alt="Zillow Real Estate" style="border:0;" src="http://www.zillow.com/widgets/GetVersionedResource.htm?path=%2Fstatic%2Fimages%2Fpowered-by-zillow.gif" />';
			echo '</div>';
		}

		/**
		 * Get Newest For Sale Homes Widget.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $location
		 * @param string $type (default: 'iframe')
		 * @param string $size (default: ' wide')
		 * @return void
		 */
		public function get_newest_forsale_homes_widget( $iframe_id = '', $location, $type = 'iframe', $size = ' wide' ) {

			// TODO - Check for HTTPS, as this widget does not support it.
			// TODO - Support JS Version.

			echo '<div class="zillow-listings-widget-container zillow-nfs-widget-container">';
			echo '<h5>Newest For Sale Homes in ' . $location . '</h5>';
			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'newest-homes' ) .'" title="'. __( 'Zillow Newest For Sale Homes', 're-pro' ) .'" scrolling="no" src="https://www.zillow.com/widgets/fmr/FMRWidget.htm?did=nfs-large-iframe-widget-container&type='. $type .'&size='.$size.'&rn='. $location .'&widgettype=nfs" width="286" height="123" frameborder="0"></iframe>';
			echo '<img alt="Zillow Real Estate" style="border:0;" src="http://www.zillow.com/widgets/GetVersionedResource.htm?path=%2Fstatic%2Fimages%2Fpowered-by-zillow.gif" />';
			echo '</div>';
		}

		/**
		 * get_zillow_search_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param string $use_user_location (default: 'false')
		 * @param string $is_public (default: 'true')
		 * @param string $bucket (default: 'map')
		 * @param mixed $zillow_screenname
		 * @param mixed $region_id
		 * @return void
		 */
		public function get_zillow_search_widget( $iframe_id = '', $use_user_location = 'false', $is_public = 'true', $bucket = 'map', $zillow_screenname, $region_id ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'search' ) .'" title="'. __( 'Zillow Search', 're-pro' ) .'" src="https://www.zillow.com/widgets/search/PartnerAdWidget.htm?ulbm='.$use_user_location.'&isPublic='.$is_public.'&bucket='.$bucket.'&pn='.$zillow_screenname.'&rid='.$region_id.'&style=default" scrolling="no" frameborder="0" width="298" height="272"></iframe>';

		}

		/**
		 * get_lg_zillow_search_widget function.
		 *
		 * @access public
		 * @param string $widget_type (default: 'iframe')
		 * @param string $iframe_id (default: '')
		 * @param mixed $zillow_screenname
		 * @param string $type (default: 'iframe')
		 * @param mixed $region_name
		 * @param string $include_home_val_info (default: 'yes')
		 * @return void
		 */
		public function get_lg_zillow_search_widget( $iframe_id = '', $zillow_screenname, $type = 'iframe', $region_name, $include_home_val_info = 'yes' ) {

			echo '<div class="zillow-large-search-box-widget-container">';
			echo '	<h2>Find Homes</h2>';
			echo '	<div style="float:right;">';
			echo '		<img alt="Zillow Real Estate Information" style="border:0;" src="http://www.zillow.com/widgets/GetVersionedResource.htm?path=%2Fstatic%2Fimages%2Fpowered-by-zillow.gif" />';
			echo '	</div>';
			echo '	<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'lg-search' ) .'" scrolling="no" title="'. __( 'Zillow Search', 're-pro' ) .'" src="https://www.zillow.com/widgets/search/LargeSearchBoxWidget.htm?did=zillow-large-search-box-iframe-widget&scrnname='.$zillow_screenname.'&type='.$type.'&rgname='.$region_name.'&shvi='.$include_home_val_info.'" width="430" frameborder="0" height="400"></iframe>';
			echo '</div>';
		}

		/* POLLS & QUIZZES. */

		/**
		 * get_refinance_quiz_widget function.
		 *
		 * @access public
		 * @param string $widget_type (default: 'iframe')
		 * @param string $iframe_id (default: '')
		 * @param string $type (default: 'iframe')
		 * @param string $widgetcode (default: 'refq')
		 * @param mixed $zillow_screenname
		 * @return void
		 */
		public function get_refinance_quiz_widget( $widget_type = 'iframe', $iframe_id = '', $type = 'iframe', $widgetcode = 'refq', $zillow_screenname ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'refinance-quiz' ) .'" title="'. __( 'Zillow Refinance Quiz', 're-pro' ) .'" scrolling="no" src="https://www.zillow.com/widgets/quiz/QuizWidget.htm?did=refinance-quiz-iframe-container&type=iframe&widgetcode=refq&scrnname='.$zillow_screenname.'" width="158" frameborder="0" height="317"></iframe>';

		}

		/**
		 * get_kindofneighbor_quiz_widget function.
		 *
		 * @access public
		 * @param string $widget_type (default: 'iframe')
		 * @param string $iframe_id (default: '')
		 * @param string $type (default: 'iframe')
		 * @param string $widgetcode (default: 'konq')
		 * @param mixed $zillow_screenname
		 * @return void
		 */
		public function get_kindofneighbor_quiz_widget( $widget_type = 'iframe', $iframe_id = '', $type = 'iframe', $widgetcode = 'konq', $zillow_screenname ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'kindofneighbor-quiz' ) .'" title="'. __( 'Zillow Kind of Neighbor Quiz', 're-pro' ) .'" scrolling="no" src="httsp://www.zillow.com/widgets/quiz/QuizWidget.htm?did=neighbor-quiz-iframe-container&type=iframe&widgetcode=konq&scrnname='.$zillow_screenname.'" width="158" frameborder="0" height="317"></iframe>';

		}

		/**
		 * get_mortgage_quiz function.
		 *
		 * @access public
		 * @param string $widget_type (default: 'iframe')
		 * @param string $iframe_id (default: '')
		 * @param string $type (default: 'iframe')
		 * @param string $widgetcode (default: 'mq')
		 * @param mixed $zillow_screenname
		 * @return void
		 */
		public function get_mortgage_quiz( $widget_type = 'iframe', $iframe_id = '', $type = 'iframe', $widgetcode = 'mq', $zillow_screenname ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'mortgage-quiz' ) .'" title="'. __( 'Zillow Mortgage Quiz', 're-pro' ) .'" scrolling="no" src="https://www.zillow.com/widgets/quiz/QuizWidget.htm?did=mortgage-iframe-container&type=iframe&widgetcode=mq&scrnname='.$zillow_screenname.'" width="158" frameborder="0" height="317"></iframe>';

		}

		/**
		 * get_mortgage_harp_quiz function.
		 *
		 * @access public
		 * @param string $widget_type (default: 'iframe')
		 * @param string $iframe_id (default: '')
		 * @param string $type (default: 'iframe')
		 * @param string $widgetcode (default: 'hec')
		 * @param mixed $zillow_screenname
		 * @return void
		 */
		public function get_mortgage_harp_quiz( $widget_type = 'iframe', $iframe_id = '', $type = 'iframe', $widgetcode = 'hec', $zillow_screenname ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'mortgage-harp-quiz' ) .'" title="'. __( 'Zillow Mortgage HARP Quiz', 're-pro' ) .'" scrolling="no" src="https://www.zillow.com/widgets/quiz/QuizWidget.htm?did=mortgage-iframe-container&type=iframe&widgetcode=hec&scrnname='.$zillow_screenname.'" width="158" frameborder="0" height="317"></iframe>';

		}

		/**
		 * get_buyeriq_quiz function.
		 *
		 * @access public
		 * @param string $widget_type (default: 'iframe')
		 * @param string $iframe_id (default: '')
		 * @param string $type (default: 'iframe')
		 * @param string $widgetcode (default: 'biq')
		 * @param mixed $zillow_screenname
		 * @return void
		 */
		public function get_buyeriq_quiz( $widget_type = 'iframe', $iframe_id = '', $type = 'iframe', $widgetcode = 'biq', $zillow_screenname ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'buyeriq-quiz' ) .'" title="'. __( 'Zillow Buyer IQ Quiz', 're-pro' ) .'" scrolling="no" src="https://www.zillow.com/widgets/quiz/QuizWidget.htm?did=buyer-iframe-container&type=iframe&widgetcode=biq&scrnname='.$zillow_screenname.'" width="158" frameborder="0" height="317"></iframe>';

		}

		/* MISCELLANEOUS. */

		/**
		 * get_moving_boxes_widget function.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @param mixed $zillow_city_id
		 * @param mixed $button_text
		 * @param mixed $custom_text
		 * @param mixed $button_link
		 * @return void
		 */
		public function get_moving_boxes_widget( $widget_type = 'iframe', $iframe_id = '', $zillow_city_id, $button_text, $custom_text, $button_link ) {

			echo '<iframe id="'. $this->zillow_iframe_id( $iframe_id ) .'" class="'. $this->zillow_iframe_class( 'moving-boxes' ) .'" title="'. __( 'Zillow Moving Box Calculator', 're-pro' ) .'" scrolling="no" src="https://www.zillow.com/widgets/misc/MovingBoxEstimatorWidget.htm?bc='.$zillow_city_id.'&bt='.$button_text.'&cap='.$custom_text.'&bl='.$button_link.'" width="168" frameborder="0" height="315"></iframe>';

		}

	}
}
