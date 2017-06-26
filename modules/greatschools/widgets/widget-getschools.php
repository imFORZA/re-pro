<?php

class greatschools_getschools extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'getschools',
			__( 'GreatSchools - Get List of Schools', 're-pro' ),
			array(
				'description' => __( 'Get Schools', 're-pro' ),
			)
		);

	}

	/**
	 * widget function.
	 *
	 * @access public
	 * @param mixed $args
	 * @param mixed $instance
	 * @return void
	 */
	public function widget( $args, $instance ) {

	$greatschools_title = !empty( $instance['greatschools_title'] ) ? $instance['greatschools_title'] : '';
	$greatschools_state = !empty( $instance['greatschools_state'] ) ? $instance['greatschools_state'] : '';
	$greatschools_city = !empty( $instance['greatschools_city'] ) ? $instance['greatschools_city'] : '';

	// Call our API.
	$repro_settings = get_option( 'repro_settings' );
	$greatschools_apikey = $repro_settings['greatschools_apikey'];

	$greatschools = new GreatSchoolsAPI( $greatschools_apikey );
	$schools = $greatschools->get_schools( $greatschools_state,$greatschools_city );



		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $greatschools_title ) . $args['after_title'];

				// var_dump($schools);

				foreach($schools as $school) {

					foreach($school as $school_item) {

						$name = $school_item['name'];
						$type =$school_item['type'];
						$grade_range = $school_item['gradeRange'];
						$state = $school_item['state'];
						$city = $school_item['city'];
						$overview_link = $school_item['overviewLink'];

						echo '<li><a href="'.$overview_link.'" rel="nofollow">' . $name . '</a></li>';
					}


				}

		echo $args['after_widget'];

	}

	public function form( $instance ) {

		// Set default values
		$instance = wp_parse_args( (array) $instance, array(
			'greatschools_title' => '',
			'greatschools_state' => '',
			'greatschools_city' => '',
		) );

		// Retrieve an existing value from the database
		$greatschools_title = !empty( $instance['greatschools_title'] ) ? $instance['greatschools_title'] : '';
		$greatschools_state = !empty( $instance['greatschools_state'] ) ? $instance['greatschools_state'] : '';
		$greatschools_city = !empty( $instance['greatschools_city'] ) ? $instance['greatschools_city'] : '';

		// Form fields
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'greatschools_title' ) . '" class="greatschools_title_label">' . __( 'Title', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'greatschools_title' ) . '" name="' . $this->get_field_name( 'greatschools_title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 're-pro' ) . '" value="' . esc_attr( $greatschools_title ) . '">';
		echo '	<span class="description">' . __( 'Title', 're-pro' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'greatschools_state' ) . '" class="greatschools_state_label">' . __( 'State', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'greatschools_state' ) . '" name="' . $this->get_field_name( 'greatschools_state' ) . '" class="widefat" placeholder="' . esc_attr__( '', 're-pro' ) . '" value="' . esc_attr( $greatschools_state ) . '">';
		echo '	<span class="description">' . __( 'State', 're-pro' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'greatschools_city' ) . '" class="greatschools_city_label">' . __( 'City', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'greatschools_city' ) . '" name="' . $this->get_field_name( 'greatschools_city' ) . '" class="widefat" placeholder="' . esc_attr__( '', 're-pro' ) . '" value="' . esc_attr( $greatschools_city ) . '">';
		echo '	<span class="description">' . __( 'City', 're-pro' ) . '</span>';
		echo '</p>';

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['greatschools_title'] = !empty( $new_instance['greatschools_title'] ) ? strip_tags( $new_instance['greatschools_title'] ) : '';
		$instance['greatschools_state'] = !empty( $new_instance['greatschools_state'] ) ? strip_tags( $new_instance['greatschools_state'] ) : '';
		$instance['greatschools_city'] = !empty( $new_instance['greatschools_city'] ) ? strip_tags( $new_instance['greatschools_city'] ) : '';

		return $instance;

	}

}

function greatschools_register_widgets() {

	$repro_settings = get_option( 'repro_settings' );
	$greatschools_apikey = $repro_settings['greatschools_apikey'];

	if ( ! empty( $greatschools_apikey) ) {
	register_widget( 'greatschools_getschools' );
	}
}
add_action( 'widgets_init', 'greatschools_register_widgets' );
