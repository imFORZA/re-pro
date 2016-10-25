<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Zillow Affordability Calculator Widget (https://www.zillow.com/webtools/widgets/AffordabilityCalculatorWidget.htm)
 *
 * @package RE-PRO
 */

/**
 * ZillowAffordabilityCalcWidget class.
 *
 * @extends WP_Widget
 */
class ZillowAffordabilityCalcWidget extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'zillow_affordability_calc_widget',
			__( 'Zillow Affordability Calculator', 're-pro' ),
			array(
				'description' => __( 'Display an Affordability Calculator from Zillow.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget zillow-widget zillow-widget-affordability-calculator',
				'customize_selective_refresh' => true
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

		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		echo '<iframe id="" class="" scrolling="no" title="'. __('Zillow Affordability Calculator', 're-rpo') .'" src="https://www.zillow.com/mortgage/widgets/AffordabilityCalculatorWidget.htm" width="688" height="700" frameborder="0" style="display:block;width:100%;min-height:700px;max-width:100%;"></iframe>';




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
 * Register Zillow Affordability Calculator Widget.
 *
 * @access public
 * @return void
 */
function repro_zillow_affordability_calc_widget() {

	register_widget( 'ZillowAffordabilityCalcWidget' );
}
add_action( 'widgets_init', 'repro_zillow_affordability_calc_widget' );

