<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Zillow Review Widget (https://www.zillow.com/webtools/widgets/review-widget/)
 *
 * @package RE-PRO
 */

/**
 * Zillow Review Widget class.
 *
 * @extends WP_Widget
 */
class ZillowReviewWidget extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'zillow_review_widget',
			__( 'Zillow Reviews', 're-pro' ),
			array(
				'description' => __( 'Display a ratings link to your Zillow Reviews.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget zillow-widget zillow-widget-reviews',
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
		$screenname = ! empty( $instance['screenname'] ) ? $instance['screenname'] : '';
		$zuid = ! empty( $instance['zuid'] ) ? $instance['zuid'] : '';
		$size = ! empty( $instance['size'] ) ? $instance['size'] : 'wide';
		$zmod = ! empty( $instance['zmod'] ) ? $instance['zmod'] : 'true';
		$height = ! empty( $instance['height'] ) ? $instance['height'] : '';
		$width = ! empty( $instance['width'] ) ? $instance['width'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$zillow_widgets = new ZillowWidgets();

		$zillow_widgets->get_review_widget( $iframe_id, $zuid, $screenname, $size, $zmod, $width, $height );

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
			'zuid' => '',
			'size' => 'wide',
			'zmod' => 'true',
		));

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$screenname = ! empty( $instance['screenname'] ) ? $instance['screenname'] : '';
		$zuid = ! empty( $instance['zuid'] ) ? $instance['zuid'] : '';
		$size = ! empty( $instance['size'] ) ? $instance['size'] : '';
		$zmod = ! empty( $instance['zmod'] ) ? $instance['zmod'] : '';
		$height = ! empty( $instance['height'] ) ? $instance['height'] : '';
		$width = ! empty( $instance['width'] ) ? $instance['width'] : '';

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

		// Zillow User ID.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'zuid' ) . '" class="title-label">' . __( 'Zillow User ID:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'zuid' ) . '" name="' . $this->get_field_name( 'zuid' ) . '" value="' . $zuid  . '" class="widefat">';
		echo '</p>';

		// Width Option.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'width' ) . '" class="title-label">' . __( 'Width:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'width' ) . '" name="' . $this->get_field_name( 'width' ) . '" value="' . $width  . '" class="widefat">';
		echo '</p>';

		// Height Option
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'height' ) . '" class="title-label">' . __( 'Height:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'height' ) . '" name="' . $this->get_field_name( 'height' ) . '" value="' . $height  . '" class="widefat">';
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
		$instance['zuid'] = ! empty( $new_instance['zuid'] ) ? strip_tags( $new_instance['zuid'] ) : '';
		$instance['size'] = ! empty( $new_instance['size'] ) ? strip_tags( $new_instance['size'] ) : '';
		$instance['zmod'] = ! empty( $new_instance['zmod'] ) ? strip_tags( $new_instance['zmod'] ) : '';
		$instance['height'] = ! empty( $new_instance['height'] ) ? strip_tags( $new_instance['height'] ) : '';
		$instance['width'] = ! empty( $new_instance['width'] ) ? strip_tags( $new_instance['width'] ) : '';

		return $instance;
	}
}

/**
 * Register Zillow Review Widget.
 *
 * @access public
 * @return void
 */
function repro_zillow_review_widget() {

	register_widget( 'ZillowReviewWidget' );
}
add_action( 'widgets_init', 'repro_zillow_review_widget' );
