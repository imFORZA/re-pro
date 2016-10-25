<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Zillow Mortgage Rate Widget (https://www.zillow.com/webtools/widgets/MortgageRateWidget.htm)
 *
 * @package RE-PRO
 */

/**
 * ZillowMortgageRateWidget class.
 *
 * @extends WP_Widget
 */
class ZillowMortgageRateWidget extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'zillow_mortgage_rate_widget',
			__( 'Zillow Mortgage Rate Table', 're-pro' ),
			array(
				'description' => __( 'Display a Mortgage Rate Table from Zillow.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget zillow-widget zillow-widget-mortgage-rate-table',
				'customize_selective_refresh' => true
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
		$screenname = ! empty( $instance['screenname'] ) ? $instance['screenname'] : '';
		$region = ! empty( $instance['region'] ) ? $instance['region'] : '';
		$textcolor = ! empty( $instance['textcolor'] ) ? $instance['textcolor'] : '';
		$zuid = ! empty( $instance['zuid'] ) ? $instance['zuid'] : '';
		$format = ! empty( $instance['format'] ) ? $instance['format'] : '';
		$height = ! empty( $instance['height'] ) ? $instance['height'] : '';
		$width = ! empty( $instance['width'] ) ? $instance['width'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		echo '<iframe id="" class="" scrolling="no" src="http://www.zillow.com/mortgage/MortgageRateTable.htm?wide=1&textcolor='. $textcolor .'&scrnname='. $screenname .'&region='. $region .'&cobrand='. $screenname .'" width="'. $width .'" height="'. $height .'" frameborder="0" style="display:block;max-width:100%;"></iframe>';

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
			'region' => '',
			'textcolor' => '000000',
			'zuid' => '',
			'width' => '',
			'height' => ''
		));

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$screenname = ! empty( $instance['screenname'] ) ? $instance['screenname'] : '';
		$textcolor = ! empty( $instance['textcolor'] ) ? $instance['textcolor'] : '';
		$region = ! empty( $instance['region'] ) ? $instance['region'] : '';
		$zuid = ! empty( $instance['zuid'] ) ? $instance['zuid'] : '';
		$format = ! empty( $instance['format'] ) ? $instance['format'] : 'format';
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

		// Region
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'region' ) . '" class="title-label">' . __( 'Region:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'region' ) . '" name="' . $this->get_field_name( 'region' ) . '" value="' . $region  . '" class="widefat">';
		echo '</p>';

		// Text Color
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'textcolor' ) . '" class="title-label">' . __( 'Text Color:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'textcolor' ) . '" name="' . $this->get_field_name( 'textcolor' ) . '" value="' . $region  . '" class="widefat">';
		echo '</p>';

		// Zillow User ID.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'zuid' ) . '" class="title-label">' . __( 'Zillow User ID:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'zuid' ) . '" name="' . $this->get_field_name( 'zuid' ) . '" value="' . $zuid  . '" class="widefat">';
		echo '</p>';

		// Dropdown for Format.

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
		$instance['screenname'] = ! empty( $new_instance['screenname'] ) ? strip_tags( $new_instance['screenname'] ) : '';
		$instance['region'] = ! empty( $new_instance['region'] ) ? strip_tags( $new_instance['region'] ) : '';
		$instance['textcolor'] = ! empty( $new_instance['textcolor'] ) ? strip_tags( $new_instance['textcolor'] ) : '';
		$instance['zuid'] = ! empty( $new_instance['zuid'] ) ? strip_tags( $new_instance['zuid'] ) : '';
		$instance['format'] = ! empty( $new_instance['format'] ) ? strip_tags( $new_instance['format'] ) : '';
		$instance['zmod'] = ! empty( $new_instance['zmod'] ) ? strip_tags( $new_instance['zmod'] ) : '';
		$instance['width'] = ! empty( $new_instance['width'] ) ? strip_tags( $new_instance['width'] ) : '';
		$instance['height'] = ! empty( $new_instance['height'] ) ? strip_tags( $new_instance['height'] ) : '';

		return $instance;
	}
}

/**
 * Register Zillow Review Widget.
 *
 * @access public
 * @return void
 */
function repro_zillow_mortgage_rate_widget() {

	register_widget( 'ZillowMortgageRateWidget' );
}
add_action( 'widgets_init', 'repro_zillow_mortgage_rate_widget' );
