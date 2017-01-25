<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Zillow Large Search Box Widget (http://www.zillow.com/webtools/widgets/ZillowLargeSearchBox.htm)
 *
 * @package RE-PRO
 */

/**
 * ZillowLargeSearchBox class.
 *
 * @extends WP_Widget
 */
class ZillowLargeSearchBox extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'zillow_large_search_box',
			__( 'Zillow Large Search Box', 're-pro' ),
			array(
				'description' => __( 'Display a Large Search Box from Zillow.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget zillow-widget zillow-widget-search-box',
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
		$type = ! empty( $instance['type'] ) ? $instance['type'] : '';
		$screenname = ! empty( $instance['screenname'] ) ? $instance['screenname'] : '';
		$location = ! empty( $instance['location'] ) ? $instance['location'] : '';
		$home_val_info = ! empty( $instance['home_val_info'] ) ? $instance['home_val_info'] : '';
		$home_val_info = ( $home_val_info ) ? 'no' : 'yes';


		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$zillow_widgets = new ZillowWidgets();

 		$zillow_widgets->get_lg_zillow_search_widget( $iframe_id, $screenname, 'iframe', $location, $home_val_info );

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
			'type' => 'iframe',
			'screenname' => '',
			'location' => '',
			'home_val_info' => 0,
		));

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$screenname = ! empty( $instance['screenname'] ) ? $instance['screenname'] : '';
		$location = ! empty( $instance['location'] ) ? $instance['location'] : '';
		$home_val_info = ! empty( $instance['home_val_info'] ) ? $instance['home_val_info'] : 0;


		// Title.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
		echo '</p>';

		// Zillow Screenname.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'screenname' ) . '" class="title-label">' . __( 'Zillow Screenname:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'screenname' ) . '" name="' . $this->get_field_name( 'screenname' ) . '" value="' . $screenname  . '" class="widefat">';
		echo '</p>';

		// Location.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'location' ) . '" class="title-label">' . __( 'Location:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'location' ) . '" placeholder="El Segundo, CA" name="' . $this->get_field_name( 'location' ) . '" value="' . $location  . '" class="widefat">';
		echo '</p>';

		// Home Value Info
		echo '<p>';
		echo '<input value="1" type="checkbox"' . checked( esc_attr( $home_val_info ), 1, false ) . 'id="' . esc_attr( $this->get_field_id( 'home_val_info' ) ) . '" name="' . esc_attr( $this->get_field_name( 'home_val_info' ) ) . '" />';
		echo '<label for="' . $this->get_field_id( 'home_val_info' ) . '">Hide home value information</label>';
		echo '</p>';


	}

	/**
	 * Update.
	 *
	 * @access public
	 * @param mixed $new_instance New Instance.
	 * @param mixed $old_instance Old Instance.
	 * @return $instance
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['screenname'] = ! empty( $new_instance['screenname'] ) ? strip_tags( $new_instance['screenname'] ) : '';
		$instance['location'] = ! empty( $new_instance['location'] ) ? strip_tags( $new_instance['location'] ) : '';
		$instance['home_val_info'] = ! empty( $new_instance['home_val_info'] ) ? strip_tags( $new_instance['home_val_info'] ) : 0;


		return $instance;
	}
}

/**
 * Register Zillow Large Search Box.
 *
 * @access public
 * @return void
 */
function repro_zillow_search_box_widget() {

	register_widget( 'ZillowLargeSearchBox' );
}
add_action( 'widgets_init', 'repro_zillow_search_box_widget' );
