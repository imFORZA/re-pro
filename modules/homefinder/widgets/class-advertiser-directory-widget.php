<?php
/**
 * HomeFinder Advetiser Directory Widget (http://www.homefinder.com/widgets/)
 *
 * @package RE-PRO
 */

	/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * HomeFinderAdvertiserDirectory class.
 *
 * @extends WP_Widget
 */
class HomeFinderAdvertiserDirectory extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'homefinder_advertiser_directory',
			__( 'HomeFinder Advertiser Directory', 're-pro' ),
			array(
				'description' => __( "Display your advertiser's contact information from HomeFinder.com", 're-pro' ),
				'classname'   => 're-pro re-pro-widget homefinder-widget homefinder-advertiser-directory',
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

		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$affiliate = ! empty( $instance['affiliate'] ) ? $instance['affiliate'] : '';
		$count = ! empty( $instance['count'] ) ? $instance['count'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$homefinder_widgets = new HomeFinderWidgets();

		$homefinder_widgets->get_affiliates_widget( 'directory', $instance );

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
			'affiliate' => '',
			'count' => '6',
		) );

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$affiliate = ! empty( $instance['affiliate'] ) ? $instance['affiliate'] : '';
		$count = ! empty( $instance['count'] ) ? $instance['count'] : '';

		// Title.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
		echo '</p>';

		// Affiliate Profile Name.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'affiliate' ) . '" class="title-label">' . __( 'Affiliate Profile Name:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'affiliate' ) . '" name="' . $this->get_field_name( 'affiliate' ) . '" value="' . $affiliate . '" class="widefat">';
		echo '</p>';

		// Max Count.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'count' ) . '" class="title-label">' . __( 'Display Count:', 're-pro' ) . '</label>';
		echo '	<input type="number" id="' . $this->get_field_id( 'count' ) . '" name="' . $this->get_field_name( 'count' ) . '" min="1" max="50" value="' . $count . '">';
		echo '	<span class="description">' . __( 'Max Count: 50', 're-pro' ) . '</span>';
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
		$instance['affiliate'] = ! empty( $new_instance['affiliate'] ) ? strip_tags( $new_instance['affiliate'] ) : '';
		$instance['count'] = ! empty( $new_instance['count'] ) ? strip_tags( $new_instance['count'] ) : '';

		return $instance;
	}
}

/**
 * Register HomeFinder.com Homes for Sale Widget.
 *
 * @access public
 * @return void
 */
function repro_homefinder_advertiser_directory() {
	if ( ! is_ssl() ) {
		register_widget( 'HomeFinderAdvertiserDirectory' );
	}
}
add_action( 'widgets_init', 'repro_homefinder_advertiser_directory' );
