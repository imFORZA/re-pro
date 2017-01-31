<?php

class HomesCommuteTime extends WP_Widget {

	public function __construct() {

		parent::__construct(
			'homes_commute_time',
			__( 'Homes.com - Commute Time', 're-pro' ),
			array(
				'description' => __( 'Display Commute Time from Homes.com', 're-pro' ),
				'classname'   => 're-pro re-pro-widget homes-widget homes-commute-time',
			)
		);

	}

	public function widget( $args, $instance ) {

		$iframe_id = ! empty( $args['widget_id'] ) ? $args['widget_id'] : '';
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$addr = ! empty( $instance['addr'] ) ? $instance['addr'] : '';
		$color = ! empty( $instance['color'] ) ? $instance['color'] : '0054a0';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$homes_widgets = new HomesWidgets();

		$homes_widgets->get_commute_time_widget( $iframe_id, $addr, $color );

	echo $args['after_widget'];

	}

	public function form( $instance ) {

		// Set default values
		$instance = wp_parse_args( (array) $instance, array(
			'title' => '',
		) );

		// Retrieve an existing value from the database
		$title = !empty( $instance['title'] ) ? $instance['title'] : '';

		// Form fields
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title_label">' . __( 'Title', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 're-pro' ) . '" value="' . esc_attr( $title ) . '">';
		echo '	<span class="description">' . __( 'Title', 're-pro' ) . '</span>';
		echo '</p>';

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;

	}

}

function repro_register_homes_com_commute_widgets() {
	if ( is_ssl() ) {
		echo 'This widget does not yet support SSL. Please contact homes.com asking them to support SSL for this widget.';
	} else {
		register_widget( 'HomesCommuteTime' );
	}
}
add_action( 'widgets_init', 'repro_register_homes_com_commute_widgets' );
