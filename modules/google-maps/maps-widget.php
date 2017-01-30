<?php
/**
 * Property Showcase widget.
 *
 * @package idxFORZA
 **/

/**
 * IdxForzaPropShowcase class.
 *
 * @extends WP_Widget
 */
class WP_API_MAPS_WIDGET extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'wp-api-maps',
			__( 'Google Maps', 'idxforza' ),
			array(
				'description' => __( 'Display a location on google maps', 'idxforza' ),
				'classname'   => 'wp-api-libraries',
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
		echo "woop woop";
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
			'lat' => '',
			'lng' => '',
			'map_info_content' => '',
			'style' => '[]',
		) );

		// Retrieve an existing value from the database.
		$title['val'] 			 = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$lat['val'] 		 = ! empty( $instance['lat'] ) ? $instance['lat'] : '';
		$lng['val'] 		 = ! empty( $instance['lng'] ) ? $instance['lng'] : '';
		$map_info_content['val'] = ! empty( $instance['map_info_content'] ) ? $instance['map_info_content'] : '';
		$style['val'] 			 = ! empty( $instance['style'] ) ? $instance['style'] : '';

		$title['id'] 				= $this->get_field_id( 'title' );
		$lat['id'] 			= $this->get_field_id( 'lat' );
		$lng['id']			= $this->get_field_id( 'lng' );
		$map_info_content['id'] = $this->get_field_id( 'map_info_content' );
		$style['id'] 			= $this->get_field_id( 'style' );

		$title['name'] 				= $this->get_field_name( 'title' );
		$lat['name'] 			= $this->get_field_name( 'lat' );
		$lng['name']			= $this->get_field_name( 'lng' );
		$map_info_content['name'] = $this->get_field_name( 'map_info_content' );
		$style['name']				= $this->get_field_name( 'style' );

		// Widget title.
		echo '<p>';
		echo '	<label for="' . esc_attr( $title['id'] ) . '" class="wp-api-maps_title_label">' . esc_attr( 'Title:' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $title['id'] ) . '" name="' . esc_attr( $title['name'] ) . '" class="widefat" value="' . esc_attr( $title['val'] ) . '">';
		echo '</p>';

		// Latitude input.
		echo '<p>';
		echo '	<label for="' . esc_attr( $lat['id'] ) . '" class="wp-api-maps_lat_label">' . esc_attr( 'Latitude:' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $lat['id'] ) . '" name="' . esc_attr( $lat['name'] ) . '" class="widefat" value="' . esc_attr( $lat['val'] ) . '">';
		echo '</p>';

		// Longitude input.
		echo '<p>';
		echo '	<label for="' . esc_attr( $lng['id'] ) . '" class="wp-api-maps_lng_label">' . esc_attr( 'Longitude:' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $lng['id'] ) . '" name="' . esc_attr( $lng['name'] ) . '" class="widefat" value="' . esc_attr( $lng['val'] ) . '">';
		echo '</p>';

		// Info content input.
		echo '<p>';
		echo '	<label for="' . esc_attr( $map_info_content['id'] ) . '" class="wp-api-maps_lng_label">' . esc_attr( 'Info window content:' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $map_info_content['id'] ) . '" name="' . esc_attr( $map_info_content['name'] ) . '" class="widefat" value="' . esc_attr( $map_info_content['val'] ) . '">';
		echo '</p>';

		// Json style input.
		echo '<p>';
		echo '	<label for="' . esc_attr( $style['id'] ) . '" class="wp-api-maps_lng_label">' . esc_attr( 'JSON style:' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $style['id'] ) . '" name="' . esc_attr( $style['name'] ) . '" class="widefat" value="' . esc_attr( $style['val'] ) . '">';
		echo '</p>';
	}

	/**
	 * Update function.
	 *
	 * @access public
	 * @param mixed $new_instance New Instance.
	 * @param mixed $old_instance Old Instance.
	 * @return $instance Instance.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['lat'] = ! empty( $new_instance['lat'] ) ? strip_tags( $new_instance['lat'] ) : '';
		$instance['lng'] = ! empty( $new_instance['lng'] ) ? strip_tags( $new_instance['lng'] ) : '';
		$instance['map_info_content'] = ! empty( $new_instance['map_info_content'] ) ? strip_tags( $new_instance['map_info_content'] ) : '';
		$instance['style'] = ! empty( $new_instance['style'] ) ? strip_tags( $new_instance['style'] ) : '';

		return $instance;
	}
}
?>
