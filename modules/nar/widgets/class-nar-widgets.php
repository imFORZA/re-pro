<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'NarWidgets' ) ) {

	/**
	 * NarWidgets class.
	 */
	class NarWidgets {

		/**
		 * __construct function.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {
		}


		/**
		 * Nar Iframe ID Names.
		 *
		 * @access public
		 * @param string $iframe_id (default: '')
		 * @return void
		 */
		public function nar_iframe_id( $iframe_id = '' ) {

			if ( '' !== $iframe_id  ) {
				return sanitize_html_class( $iframe_id ) . '-iframe';
			}

		}

		/**
		 * Nar Iframe Class Names.
		 *
		 * @access public
		 * @param string $widget_name (default: '')
		 * @return void
		 */
		public function nar_iframe_class( $widget_name = '' ) {

			if ( '' !== $widget_name ) {
				return 'nar nar-iframe nar-' . sanitize_html_class( $widget_name ) . '-iframe';
			} else {
				return 'nar nar-iframe';
			}

		}

		/**
		 * get_mvp_program_widget function.
		 *
		 * @access public
		 * @return void
		 */
		public function get_mvp_program_widget() {

			echo '<iframe frameborder="0" id="'. nar_iframe_id() .'" class="'. $this->zillow_iframe_class( 'mvp-program' ) .'" title="'. __('NAR MVP Program.', 're-pro') .'" src="https://static.realtor.org/ro/widget/mvpwidget.html" scrolling="no" width="300"  height="250"></iframe>';
		}

		/**
		 * get_home_ownership_matters_widget function.
		 *
		 * @access public
		 * @return void
		 */
		public function get_home_ownership_matters_widget() {

			// wp_enqueue_script( 'nar-message', 'http://www.realtor.org/sites/all/themes/rotheme/js/narmessage.js', 'jquery', null, true);

			echo '<iframe id="'. nar_iframe_id() .' class="'. $this->zillow_iframe_class( 'home-ownership-matters' ) .'"  title="'. __('NAR Home Hownership Matters.', 're-pro') .'"  src="https://www.realtor.org/sites/all/themes/rotheme/html/narmessage.html" frameborder="0" width="180" height="250" scrolling="no"></iframe></noscript>';
		}

		/**
		 * get_code_of_ethics_widget function.
		 *
		 * @access public
		 * @return void
		 */
		public function get_code_of_ethics_widget() {
			echo '<iframe id="'. nar_iframe_id() .' class="'. $this->zillow_iframe_class( 'code-of-ethics' ) .'" title="'. __('NAR Code of Ethics.', 're-pro') .'" frameborder="0" width="300" height="250" src="https://www.realtor.org/node/7504/embed" scrolling="no"></iframe>';
		}

		/**
		 * get_nar_conf_expo_widget function.
		 *
		 * @access public
		 * @return void
		 */
		public function get_nar_conf_expo_widget() {
			echo '<iframe id="'. nar_iframe_id() .' class="'. $this->zillow_iframe_class( 'conference-expo' ) .'" title="'. __('NAR Conferences and Expos.', 're-pro') .'" frameborder="0" width="300" height="250" src="https://www.realtor.org/node/10695/embed" scrolling="no"></iframe>';
		}

	}

}
