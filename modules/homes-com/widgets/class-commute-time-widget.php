<?php
/**
 * Homes.com Commute Time Widget (http://www.homes.com/widget/commute-time/)
 *
 * @package RE-PRO
 */

	/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * HomesCommuteTimeWidget class.
 *
 * @extends WP_Widget
 */
class HomesCommuteTimeWidget extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'homes_commute_time',
			__( 'Homes Commute Time', 're-pro' ),
			array(
				'description' => __( 'Display a form that checks the commute time from Homes.com', 're-pro' ),
				'classname'   => 're-pro re-pro-widget homes-widget homes-commute-time',
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
		$addr = ! empty( $instance['addr'] ) ? $instance['addr'] : '';
		$color = ! empty( $instance['color'] ) ? $instance['color'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$homes_widgets = new HomesWidgets();

		$homes_widgets->get_commute_time_widget( $iframe_id, $addr, $color );

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
			'addr' => '',
			'color' => '0054a0',
		) );

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$addr = ! empty( $instance['addr'] ) ? $instance['addr'] : '';
		$color = ! empty( $instance['color'] ) ? $instance['color'] : '';

		// Title.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
		echo '</p>';

		// Street Address.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'addr' ) . '" class="title-label">' . __( 'Default Start Address:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'addr' ) . '" name="' . $this->get_field_name( 'addr' ) . '" value="' . $addr  . '" class="widefat">';
		echo '</p>';

		// Button Color
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'color' ) . '" class="title-label">' . __( 'Button Color:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'color' ) . '" name="' . $this->get_field_name( 'color' ) . '" value="' . $color  . '" class="widefat">';
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
		$instance['addr'] = ! empty( $new_instance['addr'] ) ? strip_tags( $new_instance['addr'] ) : '';
		$instance['color'] = ! empty( $new_instance['color'] ) ? strip_tags( $new_instance['color'] ) : '';

		return $instance;
	}
}

/**
 * Register Homes.com Cummute Time Widget.
 *
 * @access public
 * @return void
 */
function repro_homes_com_commute_widget() {
	if ( ! is_ssl() ) {
		register_widget( 'HomesCommuteTimeWidget' );
	}
}
add_action( 'widgets_init', 'repro_homes_com_commute_widget' );
