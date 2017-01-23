<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Zillow Mortgage Rate Widget (https://www.zillow.com/webtools/widgets/MortgageRateWidget.htm)
 *
 * @package RE-PRO
 */

/**
 * ZillowMortgageRateWidget class.
 *
 * @extends WP_Widget
 */
class ZillowMortgageRateWidget extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'zillow_mortgage_rate_widget',
			__( 'Zillow Mortgage Rate Table', 're-pro' ),
			array(
				'description' => __( 'Display a Mortgage Rate Table from Zillow.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget zillow-widget zillow-widget-mortgage-rate-table',
				'customize_selective_refresh' => true,
			)
		);
	}

	/**
	 * Widget function.
	 *
	 * @access public
	 * @param mixed $args Arguments.
	 * @param mixed $instance Instance.
	 * @return void
	 */
	public function widget( $args, $instance ) {

		$iframe_id = ! empty( $args['widget_id'] ) ? $args['widget_id'] : '';
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$screenname = ! empty( $instance['screenname'] ) ? $instance['screenname'] : '';
		$region = ! empty( $instance['region'] ) ? $instance['region'] : '';
		$textcolor = ! empty( $instance['textcolor'] ) ? $instance['textcolor'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];



		$zillow_widgets = new ZillowWidgets();

		return $zillow_widgets->get_mortgage_rate_table_widget( $iframe_id, $textcolor, $screenname, $region );

		echo $args['after_widget'];
	}

	/**
	 * Form function.
	 *
	 * @access public
	 * @param mixed $instance Instance.
	 * @return void
	 */
	public function form( $instance ) {

		// Set default values.
		$instance = wp_parse_args( (array) $instance, array(
			'title' => '',
			'screenname' => '',
			'region' => '',
			'textcolor' => '000000',
			'zuid' => '',
		));

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$screenname = ! empty( $instance['screenname'] ) ? $instance['screenname'] : '';
		$textcolor = ! empty( $instance['textcolor'] ) ? $instance['textcolor'] : '';
		$region = ! empty( $instance['region'] ) ? $instance['region'] : '';
		$zuid = ! empty( $instance['zuid'] ) ? $instance['zuid'] : '';

		// Title.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
		echo '</p>';

		// Zillow Screenname.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'screenname' ) . '" class="title-label">' . __( 'Zillow Screenname:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'screenname' ) . '" name="' . $this->get_field_name( 'screenname' ) . '" value="' . $screenname  . '" class="widefat">';
		echo '</p>';

		// Select a State.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'region' ) . '" class="title-label">' . __( 'Region:', 're-pro' ) . '</label>';
		echo '<select id="' . $this->get_field_id( 'region' ) . '" name="' . $this->get_field_name( 'region' ) . '" class="widefat">';
	    echo '<option value="102001"'. selected( $region, 102001 ) .'>'. __( 'United States', 're-pro' ) .'</option>';
	    echo '<option value="3"'. selected( $region, 3 ) .'>Alaska</option>';
	    echo '<option value="4"'. selected( $region, 4 ) .'>Alabama</option>';
	    echo '<option value="6"'. selected( $region, 6 ) .'>Arkansas</option>';
	    echo '<option value="8"'. selected( $region, 8 ) .'>Arizona</option>';
	    echo '<option value="9"'. selected( $region, 9 ) .'>California</option>';
	    echo '<option value="10"'. selected( $region, 10 ) .'>Colorado</option>';
	    echo '<option value="11"'. selected( $region, 11 ) .'>Connecticut</option>';
	    echo '<option value="13"'. selected( $region, 13 ) .'>Delaware</option>';
	    echo '<option value="14"'. selected( $region, 14 ) .'>Florida</option>';
	    echo '<option value="16"'. selected( $region, 16 ) .'>Georgia</option>';
	    echo '<option value="18"'. selected( $region, 18 ) .'>Hawaii</option>';
	    echo '<option value="19"'. selected( $region, 19 ) .'>Iowa</option>';
	    echo '<option value="20"'. selected( $region, 20 ) .'>Idaho</option>';
	    echo '<option value="21"'. selected( $region, 21 ) .'>Illinois</option>';
	    echo '<option value="22"'. selected( $region, 22 ) .'>Indiana</option>';
	    echo '<option value="23"'. selected( $region, 23 ) .'>Kansas</option>';
	    echo '<option value="24"'. selected( $region, 24 ) .'>Kentucky</option>';
	    echo '<option value="25"'. selected( $region, 25 ) .'>Louisiana</option>';
	    echo '<option value="26"'. selected( $region, 26 ) .'>Massachusetts</option>';
	    echo '<option value="27"'. selected( $region, 27 ) .'>Maryland</option>';
	    echo '<option value="28"'. selected( $region, 28 ) .'>Maine</option>';
	    echo '<option value="30"'. selected( $region, 30 ) .'>Michigan</option>';
	    echo '<option value="31"'. selected( $region, 31 ) .'>Minnesota</option>';
	    echo '<option value="32"'. selected( $region, 32 ) .'>Missouri</option>';
	    echo '<option value="34"'. selected( $region, 34 ) .'>Mississippi</option>';
	    echo '<option value="35"'. selected( $region, 35 ) .'>Montana</option>';
	    echo '<option value="36"'. selected( $region, 36 ) .'>North Carolina</option>';
	    echo '<option value="37"'. selected( $region, 37 ) .'>North Dakota</option>';
	    echo '<option value="38"'. selected( $region, 38 ) .'>Nebraska</option>';
	    echo '<option value="39"'. selected( $region, 39 ) .'>New Hampshire</option>';
	    echo '<option value="40"'. selected( $region, 40 ) .'>New Jersey</option>';
	    echo '<option value="41"'. selected( $region, 41 ) .'>New Mexico</option>';
	    echo '<option value="42"'. selected( $region, 42 ) .'>Nevada</option>';
	    echo '<option value="43"'. selected( $region, 43 ) .'>New York</option>';
	    echo '<option value="44"'. selected( $region, 44 ) .'>Ohio</option>';
	    echo '<option value="45"'. selected( $region, 45 ) .'>Oklahoma</option>';
	    echo '<option value="46"'. selected( $region, 46 ) .'>Oregon</option>';
	    echo '<option value="47"'. selected( $region, 47 ) .'>Pennsylvania</option>';
	    echo '<option value="48"'. selected( $region, 48 ) .'>Puerto Rico</option>';
	    echo '<option value="50"'. selected( $region, 50 ) .'>Rhode Island</option>';
	    echo '<option value="51"'. selected( $region, 51 ) .'>South Carolina</option>';
	    echo '<option value="52"'. selected( $region, 52 ) .'>South Dakota</option>';
	    echo '<option value="53"'. selected( $region, 53 ) .'>Tennessee</option>';
	    echo '<option value="54"'. selected( $region, 54 ) .'>Texas</option>';
	    echo '<option value="55"'. selected( $region, 55 ) .'>Utah</option>';
	    echo '<option value="56"'. selected( $region, 56 ) .'>Virginia</option>';
	    echo '<option value="57"'. selected( $region, 57 ) .'>Virgin Islands</option>';
	    echo '<option value="58"'. selected( $region, 58 ) .'>Vermont</option>';
	    echo '<option value="59"'. selected( $region, 59 ) .'>Washington</option>';
	    echo '<option value="12"'. selected( $region, 12 ) .'>Washington, DC</option>';
	    echo '<option value="60"'. selected( $region, 60 ) .'>Wisconsin</option>';
	    echo '<option value="61"'. selected( $region, 61 ) .'>West Virginia</option>';
	    echo '<option value="62"'. selected( $region, 62 ) .'>Wyoming</option>';
		echo '</select>';
		echo '</p>';

		// Text Color
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'textcolor' ) . '" class="title-label">' . __( 'Text Color:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'textcolor' ) . '" name="' . $this->get_field_name( 'textcolor' ) . '" value="' . $textcolor  . '" class="widefat">';
		echo '</p>';

	}

	/**
	 * Update Widget Instance.
	 *
	 * @access public
	 * @param mixed $new_instance New Instance.
	 * @param mixed $old_instance Old Instance.
	 * @return $instance
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['screenname'] = ! empty( $new_instance['screenname'] ) ? strip_tags( $new_instance['screenname'] ) : '';
		$instance['region'] = ! empty( $new_instance['region'] ) ? strip_tags( $new_instance['region'] ) : '';
		$instance['textcolor'] = ! empty( $new_instance['textcolor'] ) ? strip_tags( $new_instance['textcolor'] ) : '';

		return $instance;
	}
}

/**
 * Register Zillow Review Widget.
 *
 * @access public
 * @return void
 */
/*function repro_zillow_mortgage_rate_widget() {

	register_widget( 'ZillowMortgageRateWidget' );
}
add_action( 'widgets_init', 'repro_zillow_mortgage_rate_widget' );*/
