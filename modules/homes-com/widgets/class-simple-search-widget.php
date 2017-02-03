<?php
/**
 * Homes.com Real Estate Simple Search Widget (http://www.homes.com/widget/simple-search/)
 *
 * @package RE-PRO
 */

	/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * HomesSimpleSearchWidget class.
 *
 * @extends WP_Widget
 */
class HomesSimpleSearchWidget extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'homes_simple_search',
			__( 'Homes Real Estate Search', 're-pro' ),
			array(
				'description' => __( 'Display a simple search box from Homes.com', 're-pro' ),
				'classname'   => 're-pro re-pro-widget homes-widget homes-simple-search',
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
		$sale = ! empty( $instance['sale'] ) ? $instance['sale'] : '';
		$rent = ! empty( $instance['rent'] ) ? $instance['rent'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$homes_widgets = new HomesWidgets();

		$homes_widgets->get_simple_search( $iframe_id, $location, $color, $sale, $rent );

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
			'sale' => 1,
			'rent' => 1,
		) );

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$location = ! empty( $instance['location'] ) ? $instance['location'] : '';
		$color = ! empty( $instance['color'] ) ? $instance['color'] : '';
		$sale = ! empty( $instance['sale'] ) ? $instance['sale'] : '';
		$rent = ! empty( $instance['rent'] ) ? $instance['rent'] : '';

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

		// Color.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'color' ) . '" class="title-label">' . __( 'Color:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'color' ) . '" name="' . $this->get_field_name( 'color' ) . '" value="' . $color  . '" class="widefat">';
		echo '</p>';

		// Search Types.
		echo '<p>';
		echo '<label for="search-type" class="search_type_label">' . __( 'Search Types:', 're-pro' ) . '</label>';
		echo '<br />';
		echo '<input value="1" type="checkbox"' . checked( $sale, 1, false ) . 'id="' . $this->get_field_id( 'sale' ) . '" name="' . $this->get_field_name( 'sale' )  . '" />';
		echo '<label for="' . $this->get_field_id( 'sale' ) . '">For Sale</label>';
		echo '<br />';
		echo '<input value="1" type="checkbox"' . checked( $rent, 1, false ) . 'id="' . $this->get_field_id( 'rent' ) . '" name="' . $this->get_field_name( 'rent' ) . '" />';
		echo '<label for="' . $this->get_field_id( 'rent' ) . '">For Rent</label>';
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
		$instance['sale'] = ! empty( $new_instance['sale'] ) ? strip_tags( $new_instance['sale'] ) : '';
		$instance['rent'] = ! empty( $new_instance['rent'] ) ? strip_tags( $new_instance['rent'] ) : '';

		return $instance;
	}
}

/**
 * Register Homes.com Featured Listings Widget.
 *
 * @access public
 * @return void
 */
function repro_homes_com_simple_search() {
	if ( ! is_ssl() ) {
		register_widget( 'HomesSimpleSearchWidget' );
	}
}
add_action( 'widgets_init', 'repro_homes_com_simple_search' );
