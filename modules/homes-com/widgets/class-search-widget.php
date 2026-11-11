<?php
/**
 * Homes.com Search Widget (http://www.homes.com/widget/medium-search/)
 *
 * @package RE-PRO
 */

	/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * HomesSearchWidget class.
 *
 * @extends WP_Widget
 */
class HomesSearchWidget extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'homes_search',
			__( 'Homes Search', 're-pro' ),
			array(
				'description' => __( 'Display a search box from Homes.com', 're-pro' ),
				'classname'   => 're-pro re-pro-widget homes-widget homes-search',
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

		$homes_widgets->get_search( $iframe_id, $location, $color, $sale, $rent );

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
		echo '	<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '" class="title-label">' . esc_html__( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '" class="widefat">';
		echo '</p>';

		// Location.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'location' ) ) . '" class="title-label">' . esc_html__( 'Location:', 're-pro' ) . '</label>';
		echo '	<input id="' . esc_attr( $this->get_field_id( 'location' ) ) . '" name="' . esc_attr( $this->get_field_name( 'location' ) ) . '" value="' . esc_attr( $location ) . '" class="widefat">';
		echo '</p>';

		// Color.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'color' ) ) . '" class="title-label">' . esc_html__( 'Color:', 're-pro' ) . '</label>';
		echo '	<input id="' . esc_attr( $this->get_field_id( 'color' ) ) . '" name="' . esc_attr( $this->get_field_name( 'color' ) ) . '" value="' . esc_attr( $color ) . '" class="widefat">';
		echo '</p>';

		// Search Types.
		echo '<p>';
		echo '<label for="search-type" class="search_type_label">' . esc_html__( 'Search Types:', 're-pro' ) . '</label>';
		echo '<br />';
		echo '<input value="1" type="checkbox"' . checked( $sale, 1, false ) . 'id="' . esc_attr( $this->get_field_id( 'sale' ) ) . '" name="' . esc_attr( $this->get_field_name( 'sale' ) )  . '" />';
		echo '<label for="' . esc_attr( $this->get_field_id( 'sale' ) ) . '">For Sale</label>';
		echo '<br />';
		echo '<input value="1" type="checkbox"' . checked( $rent, 1, false ) . 'id="' . esc_attr( $this->get_field_id( 'rent' ) ) . '" name="' . esc_attr( $this->get_field_name( 'rent' ) ) . '" />';
		echo '<label for="' . esc_attr( $this->get_field_id( 'rent' ) ) . '">For Rent</label>';
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

		$instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['location'] = ! empty( $new_instance['location'] ) ? sanitize_text_field( $new_instance['location'] ) : '';
		$instance['color'] = ! empty( $new_instance['color'] ) ? sanitize_text_field( $new_instance['color'] ) : '';
		$instance['sale'] = ! empty( $new_instance['sale'] ) ? sanitize_text_field( $new_instance['sale'] ) : '';
		$instance['rent'] = ! empty( $new_instance['rent'] ) ? sanitize_text_field( $new_instance['rent'] ) : '';

		return $instance;
	}
}

/**
 * Register Homes.com Featured Listings Widget.
 *
 * @access public
 * @return void
 */
function repro_homes_com_search() {
	if ( ! is_ssl() ) {
		register_widget( 'HomesSearchWidget' );
	}
}
add_action( 'widgets_init', 'repro_homes_com_search' );
