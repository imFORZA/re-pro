<?php
/**
 * Rentbits.com Rental Comparison Widget (http://rentbits.com/rb/page/rental-comparison-widget.html)
 *
 * @package RE-PRO
 */

	/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * RentbitsRentalComparisonWidget class.
 *
 * @extends WP_Widget
 */
class RentbitsRentalComparisonWidget extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'rentbits_rental_comparison',
			__( 'Rentbits Rental Comparison', 're-pro' ),
			array(
				'description' => __( 'Display the current average rental price for up to any four locations.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget rentbits-widget rentbits-rental-comparison',
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
		$location1 = ! empty( $instance['location1'] ) ? $instance['location1'] : '';
		$location2 = ! empty( $instance['location2'] ) ? $instance['location2'] : '';
		$location3 = ! empty( $instance['location3'] ) ? $instance['location3'] : '';
		$location4 = ! empty( $instance['location4'] ) ? $instance['location4'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$rentbits_widgets = new RentbitsWidgets();

		$rentbits_widgets->get_rental_comparison_widget( $location1, $location2, $location3, $location4 );

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
			'location1' => '',
			'location2' => '',
			'location3' => '',
			'location4' => '',
		) );

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$location1 = ! empty( $instance['location1'] ) ? $instance['location1'] : '';
		$location2 = ! empty( $instance['location2'] ) ? $instance['location2'] : '';
		$location3 = ! empty( $instance['location3'] ) ? $instance['location3'] : '';
		$location4 = ! empty( $instance['location4'] ) ? $instance['location4'] : '';

		// Title.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '" class="title-label">' . esc_html__( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '" class="widefat">';
		echo '</p>';

		// Location 1.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'location1' ) ) . '" class="title-label">' . esc_html__( 'Location:', 're-pro' ) . '</label>';
		echo '	<input id="' . esc_attr( $this->get_field_id( 'location1' ) ) . '" name="' . esc_attr( $this->get_field_name( 'location1' ) ) . '" value="' . esc_attr( $location1 ) . '" class="widefat">';
		echo '</p>';

		// Location 2.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'location2' ) ) . '" class="title-label">' . esc_html__( 'Location:', 're-pro' ) . '</label>';
		echo '	<input id="' . esc_attr( $this->get_field_id( 'location2' ) ) . '" name="' . esc_attr( $this->get_field_name( 'location2' ) ) . '" value="' . esc_attr( $location2 ) . '" class="widefat">';
		echo '</p>';

		// Location 3.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'location3' ) ) . '" class="title-label">' . esc_html__( 'Location:', 're-pro' ) . '</label>';
		echo '	<input id="' . esc_attr( $this->get_field_id( 'location3' ) ) . '" name="' . esc_attr( $this->get_field_name( 'location3' ) ) . '" value="' . esc_attr( $location3 ) . '" class="widefat">';
		echo '</p>';

		// Location 4.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'location4' ) ) . '" class="title-label">' . esc_html__( 'Location:', 're-pro' ) . '</label>';
		echo '	<input id="' . esc_attr( $this->get_field_id( 'location4' ) ) . '" name="' . esc_attr( $this->get_field_name( 'location4' ) ) . '" value="' . esc_attr( $location4 ) . '" class="widefat">';
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

		$instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['location1'] = ! empty( $new_instance['location1'] ) ? sanitize_text_field( $new_instance['location1'] ) : '';
		$instance['location2'] = ! empty( $new_instance['location2'] ) ? sanitize_text_field( $new_instance['location2'] ) : '';
		$instance['location3'] = ! empty( $new_instance['location3'] ) ? sanitize_text_field( $new_instance['location3'] ) : '';
		$instance['location4'] = ! empty( $new_instance['location4'] ) ? sanitize_text_field( $new_instance['location4'] ) : '';

		return $instance;
	}
}

/**
 * Register Rentbits.com Rental Comparison Widget.
 *
 * @access public
 * @return void
 */
function repro_rentbits_rental_comparison() {
	if ( ! is_ssl() ) {
		register_widget( 'RentbitsRentalComparisonWidget' );
	}
}
add_action( 'widgets_init', 'repro_rentbits_rental_comparison' );
