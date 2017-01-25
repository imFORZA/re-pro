<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Zillow Monthly Payment Calculator Widget (https://www.zillow.com/webtools/widgets/monthly-payment-calculator-widget/)
 *
 * @package RE-PRO
 */

/**
 * ZillowMonthlyPaymentCalcWidget class.
 *
 * @extends WP_Widget
 */
class ZillowMonthlyPaymentCalcWidget extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'zillow_monthly_paycalc_widget',
			__( 'Zillow Monthly Payment Calculator', 're-pro' ),
			array(
				'description' => __( 'Display a Monthly Payment Calculator from Zillow.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget zillow-widget zillow-widget-monthly-payment-calculator',
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

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$zillow_widgets = new ZillowWidgets();

		return $zillow_widgets->get_monthlypay_calc_widget( $iframe_id );

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

		// Title.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
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

		return $instance;
	}
}

/**
 * Register Zillow Monthly Pay Calc Widget.
 *
 * @access public
 * @return void
 */
/*function repro_zillow_monthly_pay_calc_widget() {

	register_widget( 'ZillowMonthlyPaymentCalcWidget' );
}
add_action( 'widgets_init', 'repro_zillow_monthly_pay_calc_widget' );*/
