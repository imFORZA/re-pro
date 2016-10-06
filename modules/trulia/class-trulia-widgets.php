<?php
/**
 * Adds Trulia Widgets
 *
 * @package IdxFORZA
 *
 * Trulia Widgets URL: http://www.trulia.com/tools/#widgets
 */

/**
 * Trulia_widgets class.
 *
 * @extends WP_Widget
 */
class TruliaWidgets extends WP_Widget
{


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'idxforza-trulia-widget',
			__( 'Trulia Widgets', 'idxforza' ),
			array(
			 'description' => __( 'Display a Trulia Widget', 'idxforza' ),
			 'classname'   => 'idxforza-widget idxforza-trulia-widget',
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

				echo $args['before_widget'];

				echo $args['before_title'] . esc_attr( $idxforza_title ) . $args['after_title'];

				/* DISPLAY TRULIA WIDGETS HERE - Example */

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
			'idxforza_idxforza_trulia_widget' => '',
			'idxforza_title' => '',
		));

		// Retrieve an existing value from the database.
		$idxforza_title = ! empty( $instance['idxforza_title'] ) ? $instance['idxforza_title'] : '';
		$idxforza_idxforza_trulia_widget = ! empty( $instance['idxforza_idxforza_trulia_widget'] ) ? $instance['idxforza_idxforza_trulia_widget'] : '';

		// Form fields.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'idxforza_title' ) ) . '" class="idxforza_title_label">' . esc_attr_e( 'Title', 'idxforza' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $this->get_field_id( 'idxforza_title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'idxforza_title' ) ) . '" class="widefat" placeholder="' . esc_attr_e( '', 'idxforza' ) . '" value="' . esc_attr( $idxforza_title ) . '">';
		echo '	<span class="description">' . esc_attr_e( 'Title', 'idxforza' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'idxforza_idxforza_trulia_widget' ) ) . '" class="idxforza_idxforza_trulia_widget_label">' . esc_attr_e( 'Widget Type', 'idxforza' ) . '</label>';
		echo '	<select id="' . esc_attr( $this->get_field_id( 'idxforza_idxforza_trulia_widget' ) ) . '" name="' . esc_attr( $this->get_field_name( 'idxforza_idxforza_trulia_widget' ) ) . '" class="widefat">';
		echo '		<option value="map-search" ' . selected( $idxforza_idxforza_trulia_widget, 'map-search', false ) . '> ' . esc_attr_e( 'Map Search', 'idxforza' ) . '</option>';
		echo '		<option value="home-showcase" ' . selected( $idxforza_idxforza_trulia_widget, 'home-showcase', false ) . '> ' . esc_attr_e( 'Home Showcase', 'idxforza' ) . '</option>';
		echo '	</select>';
		echo '	<span class="description">' . esc_attr_e( 'Choose a Trulia Widget Type. Full examples can be found at http://www.trulia.com/tools/#widgets', 'idxforza' ) . '</span>';
		echo '</p>';

	}

	/**
	 * Update function.
	 *
	 * @access public
	 * @param mixed $new_instance New Instance.
	 * @param mixed $old_instance Old Instance.
	 * @return $instance
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['idxforza_idxforza_trulia_widget'] = ! empty( $new_instance['idxforza_idxforza_trulia_widget'] ) ? strip_tags( $new_instance['idxforza_idxforza_trulia_widget'] ) : '';
		$instance['idxforza_title'] = ! empty( $new_instance['idxforza_title'] ) ? strip_tags( $new_instance['idxforza_title'] ) : '';

		return $instance;

	}
}


/**
 * Idxforza_register_widgets function.
 *
 * @access public
 * @return void
 */
function idxforza_register_widgets() {

	register_widget( 'TruliaWidgets' );
}
add_action( 'widgets_init', 'idxforza_register_widgets' );
