<?php
/**
 * Homes.com Home Values Widget (http://www.homes.com/widget/home-values/)
 *
 * @package RE-PRO
 */

	/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * HomesHomeValuesWidget class.
 *
 * @extends WP_Widget
 */
class HomesHomeValuesWidget extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'homes_home_values',
			__( 'Homes Home Values', 're-pro' ),
			array(
				'description' => __( 'Display the average home value in a neighborhood from Homes.com', 're-pro' ),
				'classname'   => 're-pro re-pro-widget homes-widget homes-home-values',
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
		$location = ! empty( $instance['location'] ) ? $instance['location'] : '';
		$firstColor = ! empty( $instance['firstColor'] ) ? $instance['firstColor'] : '';
		$secondColor = ! empty( $instance['secondColor'] ) ? $instance['secondColor'] : '';
		$average = ! empty( $instance['average'] ) ? $instance['average'] : '';
		$median = ! empty( $instance['median'] ) ? $instance['median'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$homes_widgets = new HomesWidgets();

		$homes_widgets->get_home_values( $iframe_id, $location, $firstColor, $secondColor, $average, $median );

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
			'firstColor' => '0054a0',
			'secondColor' => 'f7841b',
			'average' => 1,
			'median' => 1,
		) );

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$location = ! empty( $instance['location'] ) ? $instance['location'] : '';
		$firstColor = ! empty( $instance['firstColor'] ) ? $instance['firstColor'] : '';
		$secondColor = ! empty( $instance['secondColor'] ) ? $instance['secondColor'] : '';
		$average = ! empty( $instance['average'] ) ? $instance['average'] : '';
		$median = ! empty( $instance['median'] ) ? $instance['median'] : '';

		if ( empty( $average ) && empty( $median ) ) {
			$average = 1;
			$median = 1;
		}

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

		// Average Color.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'firstColor' ) . '" class="title-label">' . __( 'Color 1:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'firstColor' ) . '" name="' . $this->get_field_name( 'firstColor' ) . '" value="' . $firstColor  . '" class="widefat">';
		echo '</p>';

		// Median Color.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'secondColor' ) . '" class="title-label">' . __( 'Color 2:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'secondColor' ) . '" name="' . $this->get_field_name( 'secondColor' ) . '" value="' . $secondColor  . '" class="widefat">';
		echo '</p>';

		// Home Value Types.
		echo '<p>';
		echo '<label for="home-values-type" class="homes_value_type_label">' . __( 'Home Value Types:', 're-pro' ) . '</label>';
		echo '<br />';
		echo '<input value="1" type="checkbox"' . checked( $average, 1, false ) . 'id="' . $this->get_field_id( 'average' ) . '" name="' . $this->get_field_name( 'average' )  . '" />';
		echo '<label for="' . $this->get_field_id( 'average' ) . '">Average Home Value</label>';
		echo '<br />';
		echo '<input value="1" type="checkbox"' . checked( $median, 1, false ) . 'id="' . $this->get_field_id( 'median' ) . '" name="' . $this->get_field_name( 'median' ) . '" />';
		echo '<label for="' . $this->get_field_id( 'median' ) . '">Median Home Value</label>';
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
		$instance['firstColor'] = ! empty( $new_instance['firstColor'] ) ? strip_tags( $new_instance['firstColor'] ) : '';
		$instance['secondColor'] = ! empty( $new_instance['secondColor'] ) ? strip_tags( $new_instance['secondColor'] ) : '';
		$instance['average'] = ! empty( $new_instance['average'] ) ? strip_tags( $new_instance['average'] ) : '';
		$instance['median'] = ! empty( $new_instance['median'] ) ? strip_tags( $new_instance['median'] ) : '';

		return $instance;
	}
}

/**
 * Register Homes.com Featured Listings Widget.
 *
 * @access public
 * @return void
 */
function repro_homes_com_home_values() {
	if ( ! is_ssl() ) {
		register_widget( 'HomesHomeValuesWidget' );
	}
}
add_action( 'widgets_init', 'repro_homes_com_home_values' );
