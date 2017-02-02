<?php
/**
 * Google maps API library.
 *
 * @package WP-API-Libraries
 **/

/**
 * WP_API_MAPS_WIDGET class.
 *
 * @extends WP_Widget
 */
class WP_API_MAPS_WIDGET extends WP_Widget {

	/**
	 * Widget constructor.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'wp-api-maps',
			__( 'Google Maps' ),
			array(
				'description' => __( 'Display a location on google maps' ),
				'classname'   => 'wp-api-libraries',
			)
		);
	}

	/**
	 * Widget method.
	 *
	 * @access public
	 * @param mixed $args Arguments.
	 * @param mixed $instance Instance.
	 * @return void
	 */
	public function widget( $args, $instance ) {
		$instance = $this->parse_args( $instance );

		// Display widget title.
		if ( isset( $instance['title'] ) ) {
			echo $args['before_title'];
			echo esc_attr( $instance['title'] );
			echo $args['after_title'];
		}

		WPAPI_GOOGLE_MAPS::print_map( $instance );
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
		$instance = $this->parse_args( $instance );

		// Retrieve an existing value from the database.
		$title['val']  = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$lat['val']    = ! empty( $instance['lat'] ) ? $instance['lat'] : '';
		$lng['val']    = ! empty( $instance['lng'] ) ? $instance['lng'] : '';
		$info['val'] 	 = ! empty( $instance['info'] ) ? $instance['info'] : '';
		$width['val']  = ! empty( $instance['width'] ) ? $instance['width'] : '';
		$height['val'] = ! empty( $instance['height'] ) ? $instance['height'] : '';
		$zoom['val'] 	 = ! empty( $instance['zoom'] ) ? $instance['zoom'] : '';

		$title['id'] 	= $this->get_field_id( 'title' );
		$lat['id'] 		= $this->get_field_id( 'lat' );
		$lng['id']		= $this->get_field_id( 'lng' );
		$info['id']		= $this->get_field_id( 'info' );
		$width['id'] 	= $this->get_field_id( 'width' );
		$height['id'] = $this->get_field_id( 'height' );
		$zoom['id'] 	= $this->get_field_id( 'zoom' );

		$title['name'] 	= $this->get_field_name( 'title' );
		$lat['name'] 	 	= $this->get_field_name( 'lat' );
		$lng['name']	 	= $this->get_field_name( 'lng' );
		$info['name']  	= $this->get_field_name( 'info' );
		$width['name'] 	= $this->get_field_name( 'width' );
		$height['name'] = $this->get_field_name( 'height' );
		$zoom['name'] 	= $this->get_field_name( 'zoom' );

		// Widget title.
		echo '<p>';
		echo '	<label for="' . esc_attr( $title['id'] ) . '" class="wp-api-maps_title_label">' . esc_attr( 'Title:' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $title['id'] ) . '" name="' . esc_attr( $title['name'] ) . '" class="widefat" value="' . esc_attr( $title['val'] ) . '">';
		echo '</p>';

		// Widget width.
		echo '<p>';
		echo '	<label for="' . esc_attr( $width['id'] ) . '" class="wp-api-maps_width_label">' . esc_attr( 'Width:' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $width['id'] ) . '" name="' . esc_attr( $width['name'] ) . '" class="widefat" value="' . esc_attr( $width['val'] ) . '">';
		echo '</p>';

		// Widget height.
		echo '<p>';
		echo '	<label for="' . esc_attr( $height['id'] ) . '" class="wp-api-maps_height_label">' . esc_attr( 'Height:' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $height['id'] ) . '" name="' . esc_attr( $height['name'] ) . '" class="widefat" value="' . esc_attr( $height['val'] ) . '">';
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
		echo '	<label for="' . esc_attr( $info['id'] ) . '" class="wp-api-maps_info_label">' . esc_attr( 'Info window content:' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $info['id'] ) . '" name="' . esc_attr( $info['name'] ) . '" class="widefat" value="' . esc_attr( $info['val'] ) . '">';
		echo '</p>';

		// Zoom input.
		echo '<p>';
		echo '	<label for="' . esc_attr( $zoom['id'] ) . '" class="wp-api-maps_zoom_label">' . esc_attr( 'Zoom:' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $zoom['id'] ) . '" name="' . esc_attr( $zoom['name'] ) . '" class="widefat" value="' . esc_attr( $zoom['val'] ) . '">';
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
		$instance['width'] = ! empty( $new_instance['width'] ) ? strip_tags( $new_instance['width'] ) : '';
		$instance['height'] = ! empty( $new_instance['height'] ) ? strip_tags( $new_instance['height'] ) : '';
		$instance['lat'] = ! empty( $new_instance['lat'] ) ? strip_tags( $new_instance['lat'] ) : '';
		$instance['lng'] = ! empty( $new_instance['lng'] ) ? strip_tags( $new_instance['lng'] ) : '';
		$instance['info'] = ! empty( $new_instance['info'] ) ? strip_tags( $new_instance['info'] ) : '';
		$instance['zoom'] = ! empty( $new_instance['zoom'] ) ? strip_tags( $new_instance['zoom'] ) : null;

		return $instance;
	}

	/**
	 * Parse default arguments.
	 *
	 * @param  [Array] $args : Array of arguments to parse.
	 * @return [Array]       : Parsed arguments.
	 */
	private function parse_args( $args ) {
		// Set default values.
		$args = wp_parse_args( $args, array(
			'title' => '',
			'width'	 => '300px',
			'height' => '300px',
			'lat'		 => '-17.7134',
			'lng'		 => '178.0650',
			'info'	 => '',
			'zoom'	 => 8,
		) );

		return $args;
	}
}
