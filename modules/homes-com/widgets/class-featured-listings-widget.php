<?php
/**
 * Homes.com Featured Listings Widget (http://www.homes.com/widget/featured-listings/)
 *
 * @package RE-PRO
 */

	/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * HomesFeaturedListingsWidget class.
 *
 * @extends WP_Widget
 */
class HomesFeaturedListingsWidget extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'homes_featured_listings',
			__( 'Homes Featured Listings', 're-pro' ),
			array(
				'description' => __( 'Display featured listings from Homes.com', 're-pro' ),
				'classname'   => 're-pro re-pro-widget homes-widget homes-featured-listings',
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
		$location = ! empty( $instance['location'] ) ? $instance['location'] : '';
		$color = ! empty( $instance['color'] ) ? $instance['color'] : '';
		$status = ! empty( $instance['status'] ) ? $instance['status'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$homes_widgets = new HomesWidgets();

		$homes_widgets->get_featured_listings( $iframe_id, $location, $color, $status );

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
			'location' => '',
			'color' => '0054a0',
			'status' => 'SALE',
		) );

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$location = ! empty( $instance['location'] ) ? $instance['location'] : '';
		$color = ! empty( $instance['color'] ) ? $instance['color'] : '';
		$status = ! empty( $instance['status'] ) ? $instance['status'] : '';

		// Title.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
		echo '</p>';

		// Location.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'location' ) . '" class="title-label">' . __( 'Location:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'location' ) . '" name="' . $this->get_field_name( 'location' ) . '" value="' . $location . '" class="widefat">';
		echo '</p>';

		// Text Color
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'color' ) . '" class="title-label">' . __( 'Button Color:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'color' ) . '" name="' . $this->get_field_name( 'color' ) . '" value="' . $color  . '" class="widefat">';
		echo '</p>';

		// Listing Status
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'status' ) . '" class="title-label">' . __( 'Listing Status:', 're-pro' ) . '</label>';
		echo '	<br />';
		echo '	<input id="' . $this->get_field_id( 'status' ) . '" type="radio" name="' . $this->get_field_name( 'status' ) . '" value="SALE"' . checked( $status, 'SALE', false ) . '>For Sale<br />' . "\n";
		echo '	<input id="' . $this->get_field_id( 'status' ) . '" type="radio" name="' . $this->get_field_name( 'status' ) . '" value="RENT"' . checked( $status, 'RENT', false ) . '>For Rent<br />' . "\n";
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
		$instance['location'] = ! empty( $new_instance['location'] ) ? strip_tags( $new_instance['location'] ) : '';
		$instance['color'] = ! empty( $new_instance['color'] ) ? strip_tags( $new_instance['color'] ) : '';
		$instance['status'] = ! empty( $new_instance['status'] ) ? strip_tags( $new_instance['status'] ) : '';

		return $instance;
	}
}

/**
 * Register Homes.com Featured Listings Widget.
 *
 * @access public
 * @return void
 */
function repro_homes_com_featured_listings() {
	if ( ! is_ssl() ) {
		register_widget( 'HomesFeaturedListingsWidget' );
	}
}
add_action( 'widgets_init', 'repro_homes_com_featured_listings' );
