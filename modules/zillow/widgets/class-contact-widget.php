<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Zillow Contact Widget (https://www.zillow.com/webtools/widgets/contact-form-widget.htm)
 *
 * @package RE-PRO
 */

/**
 * ZillowContactWidget class.
 *
 * @extends WP_Widget
 */
class ZillowContactWidget extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'zillow_contact_widget',
			__( 'Zillow Contact Form', 're-pro' ),
			array(
				'description' => __( 'Display a form to contact you on Zillow.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget zillow-widget zillow-widget-contact',
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
		$email = ! empty( $instance['email'] ) ? $instance['email'] : '';
		$zuid = ! empty( $instance['zuid'] ) ? $instance['zuid'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$zillow_widgets = new ZillowWidgets();

		return $zillow_widgets->get_contact_widget( $iframe_id, $email );

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
		));

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$screenname = ! empty( $instance['screenname'] ) ? $instance['screenname'] : '';
		$zuid = ! empty( $instance['zuid'] ) ? $instance['zuid'] : '';
		$size = ! empty( $instance['size'] ) ? $instance['size'] : '';
		$height = ! empty( $instance['height'] ) ? $instance['height'] : '';
		$width = ! empty( $instance['width'] ) ? $instance['width'] : '';

		// Title.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '" class="title-label">' . esc_html__( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '" class="widefat">';
		echo '</p>';

		// Zillow Screenname.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'screenname' ) ) . '" class="title-label">' . esc_html__( 'Zillow Screenname:', 're-pro' ) . '</label>';
		echo '	<input id="' . esc_attr( $this->get_field_id( 'screenname' ) ) . '" name="' . esc_attr( $this->get_field_name( 'screenname' ) ) . '" value="' . esc_attr( $screenname ) . '" class="widefat">';
		echo '</p>';

		// Zillow User ID.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'zuid' ) ) . '" class="title-label">' . esc_html__( 'Zillow User ID:', 're-pro' ) . '</label>';
		echo '	<input id="' . esc_attr( $this->get_field_id( 'zuid' ) ) . '" name="' . esc_attr( $this->get_field_name( 'zuid' ) ) . '" value="' . esc_attr( $zuid ) . '" class="widefat">';
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

		$instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['screenname'] = ! empty( $new_instance['screenname'] ) ? sanitize_text_field( $new_instance['screenname'] ) : '';
		$instance['zuid'] = ! empty( $new_instance['zuid'] ) ? sanitize_text_field( $new_instance['zuid'] ) : '';
		$instance['zmod'] = ! empty( $new_instance['zmod'] ) ? sanitize_text_field( $new_instance['zmod'] ) : '';
		return $instance;
	}
}

/**
 * Register Zillow Review Widget.
 *
 * @access public
 * @return void
 */
/*function repro_zillow_contact_widget() {

	register_widget( 'ZillowContactWidget' );
}
add_action( 'widgets_init', 'repro_zillow_contact_widget' );*/
