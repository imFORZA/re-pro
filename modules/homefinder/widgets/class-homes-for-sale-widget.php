<?php
/**
 * HomeFinder Homes for Sale Widget (http://www.homefinder.com/widgets/)
 *
 * @package RE-PRO
 */

	/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * HomeFinderHomesForSale class.
 *
 * @extends WP_Widget
 */
class HomeFinderHomesForSale extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'homefinder_homes_for_sale',
			__( 'HomeFinder Homes for Sale', 're-pro' ),
			array(
				'description' => __( 'Display a search box from HomeFinder.com', 're-pro' ),
				'classname'   => 're-pro re-pro-widget homefinder-widget homefinder-homes-for-sale',
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

		$widget_id = ! empty( $args['widget_id'] ) ? $args['widget_id'] : '';
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$homefinder_widgets = new HomeFinderWidgets();

		$homefinder_widgets->get_homes_for_sale_widget();

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
		) );

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

		// Title.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
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

		return $instance;
	}
}

/**
 * Register HomeFinder.com Homes for Sale Widget.
 *
 * @access public
 * @return void
 */
function repro_homefinder_homes_for_sale() {
	if ( ! is_ssl() ) {
		register_widget( 'HomeFinderHomesForSale' );
	}
}
add_action( 'widgets_init', 'repro_homefinder_homes_for_sale' );
