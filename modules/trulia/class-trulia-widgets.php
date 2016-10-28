<?php
/**
 * Adds Trulia Widgets
 *
 * @package RE-PRO
 *
 * Trulia Widgets URL: http://www.trulia.com/tools/#widgets
 */

/**
 * Trulia_widgets class.
 *
 * @extends WP_Widget
 */
class TruliaWidgets extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'trulia-widget',
			__( 'Trulia Widgets', 're-pro' ),
			array(
			 'description' => __( 'Display a Trulia Widget', 're-pro' ),
			 'classname'   => 'widget trulia-widget',
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
				$trulia_widget = ! empty( $instance['trulia_widget'] ) ? $instance['trulia_widget'] : '';

				echo $args['before_widget'];

				echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		if ( $trulia_widget == 'map-search' ) {

			?>

		<iframe src="https://synd.trulia.com/tools/map-search/embedded?params%5Blocation%5D=91307&params%5BlocationId%5D=76380&params%5Bagent_id%5D=&params%5Bproperty_status%5D=for+sale&params%5Btitle%5D=Map+Search&params%5Bcolor%5D=green&params%5Bemail%5D=&params%5Buser_url%5D=&params%5Bwidth%5D=300&params%5Bheight%5D=250&params%5Bguid%5D=57f6e0a7b75e3" style="min-height: 185px; overflow: hidden;">
		<p>Your browser does not support iframes</p></iframe>
			<?php

		}

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
			'trulia_widget' => '',
			'title' => '',
		));

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$trulia_widget = ! empty( $instance['trulia_widget'] ) ? $instance['trulia_widget'] : '';

		// Form fields.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '" class="title_label">' . esc_attr_e( 'Title', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" class="widefat" placeholder="' . esc_attr_e( '', 're-pro' ) . '" value="' . esc_attr( $title ) . '">';
		echo '	<span class="description">' . esc_attr_e( 'Title', 're-pro' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'trulia_widget' ) ) . '" class="trulia_widget_label">' . esc_attr_e( 'Widget Type', 're-pro' ) . '</label>';
		echo '	<select id="' . esc_attr( $this->get_field_id( 'trulia_widget' ) ) . '" name="' . esc_attr( $this->get_field_name( 'trulia_widget' ) ) . '" class="widefat">';
		echo '		<option value="map-search" ' . selected( $trulia_widget, 'map-search', false ) . '> ' . esc_attr( 'Map Search', 're-pro' ) . '</option>';
		echo '		<option value="home-showcase" ' . selected( $trulia_widget, 'home-showcase', false ) . '> ' . esc_attr( 'Home Showcase', 're-pro' ) . '</option>';
		echo '	</select>';
		echo '	<span class="description">' . esc_attr_e( 'Choose a Trulia Widget Type. Full examples can be found at http://www.trulia.com/tools/#widgets', 're-pro' ) . '</span>';
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

		$instance['trulia_widget'] = ! empty( $new_instance['trulia_widget'] ) ? strip_tags( $new_instance['trulia_widget'] ) : '';
		$instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;

	}
}


/**
 * register_widgets function.
 *
 * @access public
 * @return void
 */
function register_widgets() {

	register_widget( 'TruliaWidgets' );
}
add_action( 'widgets_init', 'register_widgets' );
