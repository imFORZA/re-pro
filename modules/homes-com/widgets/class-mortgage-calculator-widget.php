<?php
/**
 * Homes.com Mortgage Calculator (http://www.homes.com/widget/mortgage-calculator/)
 *
 * @package RE-PRO
 */

	/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * HomesMortgageCalculatorWidget class.
 *
 * @extends WP_Widget
 */
class HomesMortgageCalculatorWidget extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'homes_mortgage_calc',
			__( 'Homes Mortgage Calculator', 're-pro' ),
			array(
				'description' => __( 'Display a mortgage calculator from Homes.com', 're-pro' ),
				'classname'   => 're-pro re-pro-widget homes-widget homes-mortgage-calc',
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
	 */
	public function widget( $args, $instance ) {

		$iframe_id = ! empty( $args['widget_id'] ) ? $args['widget_id'] : '';
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$color = ! empty( $instance['color'] ) ? $instance['color'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$homes_widgets = new HomesWidgets();

		$homes_widgets->get_mortgage_calc( $iframe_id, $color );

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
			'color' => '0054a0',
		) );

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$color = ! empty( $instance['color'] ) ? $instance['color'] : '';

		// Title.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
		echo '</p>';

		// Color.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'color' ) . '" class="title-label">' . __( 'Color:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'color' ) . '" name="' . $this->get_field_name( 'color' ) . '" value="' . $color  . '" class="widefat">';
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
		$instance['color'] = ! empty( $new_instance['color'] ) ? strip_tags( $new_instance['color'] ) : '';

		return $instance;
	}
}

/**
 * Register Homes.com Featured Listings Widget.
 *
 * @access public
 * @return void
 */
function repro_homes_com_mortgage_calc() {
	if ( ! is_ssl() ) {
		register_widget( 'HomesMortgageCalculatorWidget' );
	}
}
add_action( 'widgets_init', 'repro_homes_com_mortgage_calc' );
