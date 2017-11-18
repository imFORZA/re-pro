<?php

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * StreetAdvisor_Details class.
 *
 * @extends WP_Widget
 */
class StreetAdvisor_Details extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'streetadvisor-details',
			__( 'Street Advisor - Location Details', 're-pro' ),
			array(
				'description' => __( 'Street Advisor Location Details', 're-pro' ),
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

		// Retrieve an existing value from the database
		$latitude = !empty( $instance['latitude'] ) ? $instance['latitude'] : '';
		$longitude = !empty( $instance['longitude'] ) ? $instance['longitude'] : '';
		$level = !empty( $instance['level'] ) ? $instance['level'] : '';
		$title = !empty( $instance['title'] ) ? $instance['title'] : '';

		$streetadvisor = new StreetAdvisorAPI( 'b08f6473-8dee-41c3-9a3e-b32f335e9d2d' );

		$location = $streetadvisor->get_location_data( $latitude, $longitude, $level );

		$name = $location['Location']['Name'];
		$ranking_description = $location['Location']['RankingDescription'];
		$score = $location['Location']['Score'];
		$photo_url = esc_url( apply_filters( 'jetpack_photon_url', $location['Location']['PhotoUrl'] ) );
		$streetadvisor_url = esc_url( $location['Location']['Url'] ); // Lets force HTTPS for this please !

		$recommendations_greatfor = $location['Recommendations']['GreatFor'];
		$recommendations_notgreatfor = $location['Recommendations']['NotGreatFor'];
		$recommendations_wholiveshere = $location['Recommendations']['WhoLivesHere'];


		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		echo '<style>.sa-column{width:100%;float:left;display:inline-block;}.streetadvisor-list{margin: 10px 0;}.streetadvisor-list li {list-style-type:circle !important;margin:0;padding:0;list-style-position: inside;}</style>';

		echo '<img id="" class="" src="'.$photo_url.'" srcset="" sizes="" alt="'. $name .'" height="" width="">';


		echo '<p>' . $name . ' has a score of <strong>' . $score . ' out of 10</strong> on <a href="'. $streetadvisor_url .'" rel="nofollow">StreetAdvisor</a>. '. $ranking_description .'</p>';

		echo '<div class="sa-column">';

		echo '<strong>Great For:</strong>';
		echo '<ul class="re-pro streetadvisor-list streetadvisor-great-for">';
		foreach($recommendations_greatfor as $greatfor_item) {
			echo '<li>' . $greatfor_item . '</li>';
		}
		echo '</ul>';
		echo '</div>';

		echo '<div class="sa-column">';
		echo '<strong>Not Great For:</strong>';
		echo '<ul class="re-pro streetadvisor-list streetadvisor-not-great-for">';
		foreach($recommendations_notgreatfor as $notgreatfor_item) {
			echo '<li>' . $notgreatfor_item . '</li>';
		}
		echo '</ul>';
		echo '</div>';

		echo '<div class="sa-column">';
		echo '<strong>Who Lives Here:</strong>';
		echo '<ul class="re-pro streetadvisor-list streetadvisor-who-lives-here">';
		foreach($recommendations_wholiveshere as $wholiveshere_item) {
			echo '<li>' . $wholiveshere_item . '</li>';
		}
		echo '</ul>';
		echo '</div>';

		echo $args['after_widget'];

	}

	/**
	 * form function.
	 *
	 * @access public
	 * @param mixed $instance
	 * @return void
	 */
	public function form( $instance ) {

		// Set default values
		$instance = wp_parse_args( (array) $instance, array(
			'latitude' => '',
			'longitude' => '',
			'level' => '',
			'title' => '',
		) );

		// Retrieve an existing value from the database
		$latitude = !empty( $instance['latitude'] ) ? $instance['latitude'] : '';
		$longitude = !empty( $instance['longitude'] ) ? $instance['longitude'] : '';
		$level = !empty( $instance['level'] ) ? $instance['level'] : '';
		$title = !empty( $instance['title'] ) ? $instance['title'] : '';

		// Form fields
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title_label">' . __( 'Title', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 're-pro' ) . '" value="' . esc_attr( $title ) . '">';
		echo '	<span class="description">' . __( 'Title', 're-pro' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'latitude' ) . '" class="latitude_label">' . __( 'Latitude', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'latitude' ) . '" name="' . $this->get_field_name( 'latitude' ) . '" class="widefat" placeholder="' . esc_attr__( '', 're-pro' ) . '" value="' . esc_attr( $latitude ) . '">';
		echo '	<span class="description">' . __( 'Latitude', 're-pro' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'longitude' ) . '" class="longitude_label">' . __( 'Longitude', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'longitude' ) . '" name="' . $this->get_field_name( 'longitude' ) . '" class="widefat" placeholder="' . esc_attr__( '', 're-pro' ) . '" value="' . esc_attr( $longitude ) . '">';
		echo '	<span class="description">' . __( 'Longitude', 're-pro' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'level' ) . '" class="level_label">' . __( 'Level', 're-pro' ) . '</label>';
		echo '	<input type="number" id="' . $this->get_field_id( 'level' ) . '" name="' . $this->get_field_name( 'level' ) . '" class="widefat" placeholder="' . esc_attr__( '', 're-pro' ) . '" value="' . esc_attr( $level ) . '" step="1" min="0" max="50">';
		echo '	<span class="description">' . __( 'Level', 're-pro' ) . '</span>';
		echo '</p>';



	}


	/**
	 * update function.
	 *
	 * @access public
	 * @param mixed $new_instance
	 * @param mixed $old_instance
	 * @return void
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['latitude'] = !empty( $new_instance['latitude'] ) ? strip_tags( $new_instance['latitude'] ) : '';
		$instance['longitude'] = !empty( $new_instance['longitude'] ) ? strip_tags( $new_instance['longitude'] ) : '';
		$instance['level'] = !empty( $new_instance['level'] ) ? strip_tags( $new_instance['level'] ) : '';
		$instance['title'] = !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;

	}

}

/**
 * register_widgets function.
 *
 * @access public
 * @return void
 */
function register_widgets() {
	register_widget( 'StreetAdvisor_Details' );
}
add_action( 'widgets_init', 'register_widgets' );
