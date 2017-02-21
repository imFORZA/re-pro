<?php
/**
 * RealtyTrac.com Detailed Foreclosure Search Widget (http://www.realtytrac.com/widgets/widgetDetailed/2)
 *
 * @package RE-PRO
 */

	/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * RealtyTracDetailedForeclosureSearchWidget class.
 *
 * @extends WP_Widget
 */
class RealtyTracDetailedForeclosureSearchWidget extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'realtytrac_detailed_foreclousure_search',
			__( 'RealtyTrac Detailed Foreclosure Search', 're-pro' ),
			array(
				'description' => __( 'Display a detailed foreclosure search box from RealtyTrac.com.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget realtry-trac-widget realtytrac-detailed-foreclosure-search',
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

		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$location = ! empty( $instance['location'] ) ? $instance['location'] : '';
		$widget_type = 'DetailedSearch';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$realtytrac_widgets = new RealtyTracWidgets();

		$realtytrac_widgets->get_foreclosure_search_widget( $widget_type, $location );

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
			'location' => '',
		) );

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$location = ! empty( $instance['location'] ) ? $instance['location'] : '';

		// Title.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
		echo '</p>';

		// Location.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'location' ) . '" class="title-label">' . __( 'Location:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'location' ) . '" name="' . $this->get_field_name( 'location' ) . '" value="' . $location . '" class="widefat">';
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
		$instance['location'] = ! empty( $new_instance['location'] ) ? strip_tags( $new_instance['location'] ) : '';

		return $instance;
	}
}

/**
 * Register RealtyTrac Detailed Foreclosure Search Widget.
 *
 * @access public
 * @return void
 */
function repro_realty_trac_detailed_foreclosure_search() {
	if ( ! is_ssl() ) {
		register_widget( 'RealtyTracDetailedForeclosureSearchWidget' );
	}
}
add_action( 'widgets_init', 'repro_realty_trac_detailed_foreclosure_search' );
