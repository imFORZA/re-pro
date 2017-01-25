<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Zillow Mortgage Calculator Widget (https://www.zillow.com/webtools/widgets/MortgageCalculatorWidget.htm)
 *
 * @package RE-PRO
 */

/**
 * ZillowAffordabilityCalcWidget class.
 *
 * @extends WP_Widget
 */
class ZillowMortgageCalcWidget extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'zillow_mortgage_calc_widget',
			__( 'Zillow Mortgage Calculator', 're-pro' ),
			array(
				'description' => __( 'Display Mortgage Calculator from Zillow.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget zillow-widget zillow-widget-mortgage-calculator',
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
		$orientation = ! empty( $instance['orientation'] ) ? $instance['orientation'] : '';

		if ( 'verticalWidget' === $orientation ) {
			$height = '470';
			$width = '200';
		} else {
			$height = '235';
			$width = '352';
		}

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$zillow_widgets = new ZillowWidgets();

		return $zillow_widgets->get_mortgage_calc_widget( $iframe_id, $orientation );


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
			'orientation' => 'verticalWidget',
		));

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$orientation = ! empty( $instance['orientation'] ) ? $instance['orientation'] : '';

		// Title.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
		echo '</p>';

		// Orientation.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'orientation' ) . '" class="title-label">' . __( 'Orientation:', 're-pro' ) . '</label>';
		echo '<select id="' . $this->get_field_id( 'orientation' ) . '" name="' . $this->get_field_name( 'orientation' ) . '" class="widefat">';
	    echo '<option value="verticalWidget"'. selected( $orientation, 'verticalWidget' ) .'>'. __( 'Vertical', 're-pro' ) .'</option>';
	    echo '<option value="horizontalWidget"'. selected( $orientation, 'horizontalWidget' ) .'>'. __( 'Horizontal', 're-pro' ) .'</option>';
		echo '</select>';
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
		$instance['orientation'] = ! empty( $new_instance['orientation'] ) ? strip_tags( $new_instance['orientation'] ) : '';

		return $instance;
	}
}

/**
 * Register Zillow Affordability Calculator Widget.
 *
 * @access public
 * @return void
 */
/*function repro_zillow_mortgage_calc_widget() {

	register_widget( 'ZillowMortgageCalcWidget' );
}
add_action( 'widgets_init', 'repro_zillow_mortgage_calc_widget' );*/
