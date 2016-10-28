<?php

/**
 * EqualHousingWidget class.
 *
 * @extends WP_Widget
 */
class EqualHousingWidget extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'equal_housing_logo',
			__( 'Equal Housing Opportunity', 're-pro' ),
			array(
				'description' => __( 'Display the Equal Housing Opportunity Logo.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget equal-housing',
				'customize_selective_refresh' => true,
			)
		);

	}

	/**
	 * Display Equal Housing Widget.
	 *
	 * @access public
	 * @param mixed $args Arguments.
	 * @param mixed $instance Instance.
	 * @return void
	 */
	public function widget( $args, $instance ) {

		if ( ! empty( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = '';
		}
		$logo_size = $instance['logo_size'];

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		echo '<img src="'. esc_url( plugins_url( '../../../assets/images/equalhousing/equal_housing.svg', __FILE__ ) ) .'" alt="'. __( 'Equal Housing Opportunity', 're-pro' ) .'" height="' . $logo_size . '" width="' . $logo_size . '" class="re-pro equal-housing-opportunity">';

		echo $args['after_widget'];

	}

	/**
	 * Widget Form.
	 *
	 * @access public
	 * @param mixed $instance Instance.
	 * @return void
	 */
	public function form( $instance ) {

		// Set default values
		$instance = wp_parse_args( (array) $instance, array(
			'logo-size' => '32',
			'title' => '',
		) );

		// Retrieve an existing value from the database
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$logo_size = ! empty( $instance['logo_size'] ) ? $instance['logo_size'] : '';

		// Form fields
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'logo_size' ) . '" class="logo-size-label">' . __( 'Logo Size', 're-pro' ) . '</label>';
		echo '	<select id="' . $this->get_field_id( 'logo_size' ) . '" name="' . $this->get_field_name( 'logo_size' ) . '" class="widefat">';
		echo '		<option value="" ' . selected( $logo_size, '', false ) . '> ' . __( 'Choose', 're-pro' ) . '</option>';
		echo '		<option value="512" ' . selected( $logo_size, '512', false ) . '> ' . __( '512px', 're-pro' ) . '</option>';
		echo '		<option value="256" ' . selected( $logo_size, '256', false ) . '> ' . __( '256px', 're-pro' ) . '</option>';
		echo '		<option value="128" ' . selected( $logo_size, '128', false ) . '> ' . __( '128px', 're-pro' ) . '</option>';
		echo '		<option value="64" ' . selected( $logo_size, '64', false ) . '> ' . __( '64px', 're-pro' ) . '</option>';
		echo '		<option value="32" ' . selected( $logo_size, '32', false ) . '> ' . __( '32px', 're-pro' ) . '</option>';
		echo '		<option value="24" ' . selected( $logo_size, '24', false ) . '> ' . __( '24px', 're-pro' ) . '</option>';
		echo '		<option value="16" ' . selected( $logo_size, '16', false ) . '> ' . __( '16px', 're-pro' ) . '</option>';
		echo '		<option value="14" ' . selected( $logo_size, '14', false ) . '> ' . __( '14px', 're-pro' ) . '</option>';
		echo '	</select>';
		echo '	<span class="description">' . __( 'Choose the size of the logo you want to display.', 're-pro' ) . '</span>';
		echo '</p>';

	}


	/**
	 * Update Widget.
	 *
	 * @access public
	 * @param mixed $new_instance New Widget Instance.
	 * @param mixed $old_instance Old Widget instance.
	 * @return void
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['logo_size'] = ! empty( $new_instance['logo_size'] ) ? strip_tags( $new_instance['logo_size'] ) : '';

		return $instance;

	}
}


/**
 * Equal Housing Widget.
 *
 * @access public
 * @return void
 */
function repro_register_widgets() {
	register_widget( 'EqualHousingWidget' );
}
add_action( 'widgets_init', 'repro_register_widgets' );
