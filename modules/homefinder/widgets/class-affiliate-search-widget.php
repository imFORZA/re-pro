<?php
/**
 * HomeFinder Affiliate Search Widget (http://www.homefinder.com/widgets/)
 *
 * @package RE-PRO
 */

	/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * HomeFinderAffiliateSearch class.
 *
 * @extends WP_Widget
 */
class HomeFinderAffiliateSearch extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'homefinder_affiliate_search',
			__( 'HomeFinder Affiliate Search', 're-pro' ),
			array(
				'description' => __( 'Display an affiliate search box from HomeFinder.com', 're-pro' ),
				'classname'   => 're-pro re-pro-widget homefinder-widget homefinder-affiliate-search',
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
		$primary_city = ! empty( $instance['primary_city'] ) ? $instance['primary_city'] : '';
		$primary_state = ! empty( $instance['primary_state'] ) ? $instance['primary_state'] : '';
		$nearby_city_1 = ! empty( $instance['nearby_city_1'] ) ? $instance['nearby_city_1'] : '';
		$nearby_state_1 = ! empty( $instance['nearby_state_1'] ) ? $instance['nearby_state_1'] : '';
		$nearby_city_2 = ! empty( $instance['nearby_city_2'] ) ? $instance['nearby_city_2'] : '';
		$nearby_state_2 = ! empty( $instance['nearby_state_2'] ) ? $instance['nearby_state_2'] : '';
		$nearby_city_3 = ! empty( $instance['nearby_city_3'] ) ? $instance['nearby_city_3'] : '';
		$nearby_state_3 = ! empty( $instance['nearby_state_3'] ) ? $instance['nearby_state_3'] : '';
		$nearby_city_4 = ! empty( $instance['nearby_city_4'] ) ? $instance['nearby_city_4'] : '';
		$nearby_state_4 = ! empty( $instance['nearby_state_4'] ) ? $instance['nearby_state_4'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$homefinder_widgets = new HomeFinderWidgets();

		$homefinder_widgets->get_affiliates_widget( 'search', $instance );

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
			'primary_city' => '',
			'primary_state' => '',
			'nearby_city_1' => '',
			'nearby_state_1' => '',
			'nearby_city_2' => '',
			'nearby_state_2' => '',
			'nearby_city_3' => '',
			'nearby_state_3' => '',
			'nearby_city_4' => '',
			'nearby_state_4' => '',
		) );

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$affiliate = ! empty( $instance['affiliate'] ) ? $instance['affiliate'] : '';
		$primary_city = ! empty( $instance['primary_city'] ) ? $instance['primary_city'] : '';
		$primary_state = ! empty( $instance['primary_state'] ) ? $instance['primary_state'] : '';
		$nearby_city_1 = ! empty( $instance['nearby_city_1'] ) ? $instance['nearby_city_1'] : '';
		$nearby_state_1 = ! empty( $instance['nearby_state_1'] ) ? $instance['nearby_state_1'] : '';
		$nearby_city_2 = ! empty( $instance['nearby_city_2'] ) ? $instance['nearby_city_2'] : '';
		$nearby_state_2 = ! empty( $instance['nearby_state_2'] ) ? $instance['nearby_state_2'] : '';
		$nearby_city_3 = ! empty( $instance['nearby_city_3'] ) ? $instance['nearby_city_3'] : '';
		$nearby_state_3 = ! empty( $instance['nearby_state_3'] ) ? $instance['nearby_state_3'] : '';
		$nearby_city_4 = ! empty( $instance['nearby_city_4'] ) ? $instance['nearby_city_4'] : '';
		$nearby_state_4 = ! empty( $instance['nearby_state_4'] ) ? $instance['nearby_state_4'] : '';

		// Title.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
		echo '</p>';

		// Affiliate Name.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'affiliate' ) . '" class="title-label">' . __( 'Affiliate Name:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'affiliate' ) . '" name="' . $this->get_field_name( 'affiliate' ) . '" value="' . $affiliate . '" class="widefat">';
		echo '</p>';

		// Primary Search Area.
		echo '<p>';
		echo '	<label for="primary-search-area" class="title-label">' . __( 'Primary Search Area:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'primary_city' ) . '" name="' . $this->get_field_name( 'primary_city' ) . '" value="' . $primary_city . '" class="widefat">';
		echo '	<span class="description">' . __( 'City', 're-pro' ) . '</span>';
		echo '	<input id="' . $this->get_field_id( 'primary_state' ) . '" name="' . $this->get_field_name( 'primary_state' ) . '" value="' . $primary_state . '" class="widefat">';
		echo '	<span class="description">' . __( 'State', 're-pro' ) . '</span>';
		echo '</p>';

		// Nearby Area 1.
		echo '<p>';
		echo '	<label for="nearby-area-1" class="title-label">' . __( 'Nearby Area 1:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'nearby_city_1' ) . '" name="' . $this->get_field_name( 'nearby_city_1' ) . '" value="' . $nearby_city_1 . '" class="widefat">';
		echo '	<span class="description">' . __( 'City', 're-pro' ) . '</span>';
		echo '	<input id="' . $this->get_field_id( 'nearby_state_1' ) . '" name="' . $this->get_field_name( 'nearby_state_1' ) . '" value="' . $nearby_state_1 . '" class="widefat">';
		echo '	<span class="description">' . __( 'State', 're-pro' ) . '</span>';
		echo '</p>';

		// Nearby Area 2.
		echo '<p>';
		echo '	<label for="nearby-area-2" class="title-label">' . __( 'Nearby Area 2:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'nearby_city_2' ) . '" name="' . $this->get_field_name( 'nearby_city_2' ) . '" value="' . $nearby_city_2 . '" class="widefat">';
		echo '	<span class="description">' . __( 'City', 're-pro' ) . '</span>';
		echo '	<input id="' . $this->get_field_id( 'nearby_state_2' ) . '" name="' . $this->get_field_name( 'nearby_state_2' ) . '" value="' . $nearby_state_2 . '" class="widefat">';
		echo '	<span class="description">' . __( 'State', 're-pro' ) . '</span>';
		echo '</p>';

		// Nearby Area 3.
		echo '<p>';
		echo '	<label for="nearby-area-3" class="title-label">' . __( 'Nearby Area 3:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'nearby_city_3' ) . '" name="' . $this->get_field_name( 'nearby_city_3' ) . '" value="' . $nearby_city_3 . '" class="widefat">';
		echo '	<span class="description">' . __( 'City', 're-pro' ) . '</span>';
		echo '	<input id="' . $this->get_field_id( 'nearby_state_3' ) . '" name="' . $this->get_field_name( 'nearby_state_3' ) . '" value="' . $nearby_state_3 . '" class="widefat">';
		echo '	<span class="description">' . __( 'State', 're-pro' ) . '</span>';
		echo '</p>';

		// Nearby Area 4.
		echo '<p>';
		echo '	<label for="nearby-area-4" class="title-label">' . __( 'Nearby Area 4:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'nearby_city_4' ) . '" name="' . $this->get_field_name( 'nearby_city_4' ) . '" value="' . $nearby_city_4 . '" class="widefat">';
		echo '	<span class="description">' . __( 'City', 're-pro' ) . '</span>';
		echo '	<input id="' . $this->get_field_id( 'nearby_state_4' ) . '" name="' . $this->get_field_name( 'nearby_state_4' ) . '" value="' . $nearby_state_4 . '" class="widefat">';
		echo '	<span class="description">' . __( 'State', 're-pro' ) . '</span>';
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
		$instance['primary_city'] = ! empty( $new_instance['primary_city'] ) ? strip_tags( $new_instance['primary_city'] ) : '';
		$instance['primary_state'] = ! empty( $new_instance['primary_state'] ) ? strip_tags( $new_instance['primary_state'] ) : '';
		$instance['nearby_city_1'] = ! empty( $new_instance['nearby_city_1'] ) ? strip_tags( $new_instance['nearby_city_1'] ) : '';
		$instance['nearby_city_2'] = ! empty( $new_instance['nearby_city_2'] ) ? strip_tags( $new_instance['nearby_city_2'] ) : '';
		$instance['nearby_city_3'] = ! empty( $new_instance['nearby_city_3'] ) ? strip_tags( $new_instance['nearby_city_3'] ) : '';
		$instance['nearby_city_4'] = ! empty( $new_instance['nearby_city_4'] ) ? strip_tags( $new_instance['nearby_city_4'] ) : '';
		$instance['nearby_state_1'] = ! empty( $new_instance['nearby_state_1'] ) ? strip_tags( $new_instance['nearby_state_1'] ) : '';
		$instance['nearby_state_2'] = ! empty( $new_instance['nearby_state_2'] ) ? strip_tags( $new_instance['nearby_state_2'] ) : '';
		$instance['nearby_state_3'] = ! empty( $new_instance['nearby_state_3'] ) ? strip_tags( $new_instance['nearby_state_3'] ) : '';
		$instance['nearby_state_4'] = ! empty( $new_instance['nearby_state_4'] ) ? strip_tags( $new_instance['nearby_state_4'] ) : '';

		return $instance;
	}
}

/**
 * Register HomeFinder.com Homes for Sale Widget.
 *
 * @access public
 * @return void
 */
function repro_homefinder_affiliate_search() {
	if ( ! is_ssl() ) {
		register_widget( 'HomeFinderAffiliateSearch' );
	}
}
add_action( 'widgets_init', 'repro_homefinder_affiliate_search' );
