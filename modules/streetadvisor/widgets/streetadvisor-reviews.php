<?php

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * StreetAdvisor_Details class.
 *
 * @extends WP_Widget
 */
class StreetAdvisor_Reviews extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'streetadvisor-reviews',
			__( 'Street Advisor - Location Reviews', 're-pro' ),
			array(
				'description' => __( 'Street Advisor Location Reviews', 're-pro' ),
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

$reviews = $streetadvisor->get_location_reviews( $latitude, $longitude, $level );

// var_dump($reviews);
/*
$name = $location['Location']['Name'];
$ranking_description = $location['Location']['RankingDescription'];
$score = $location['Location']['Score'];
$photo_url = esc_url( apply_filters( 'jetpack_photon_url', $location['Location']['PhotoUrl'] ) );
$streetadvisor_url = esc_url( $location['Location']['Url'] ); // Lets force HTTPS for this please !

$recommendations_greatfor = $location['Recommendations']['GreatFor'];
$recommendations_notgreatfor = $location['Recommendations']['NotGreatFor'];
$recommendations_wholiveshere = $location['Recommendations']['WhoLivesHere'];
*/


echo $args['before_widget'];

echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

foreach ($reviews['Items'] as $review) {

	// var_dump($review);

	$title = $review['Title'];
	$content = $review['Content'];
	$date = $review['Date'];
	$rating = $review['Rating'];
	$legal = $review['Legal'];
	$url = $review['Url'];
	$user_displayname = $review['User']['DisplayName'];
	$user_avatar_url = $review['User']['AvatarUrl'];

	echo '<div class="review" itemprop="review" itemscope itemtype="https://schema.org/Review">';

	// echo '<img src="'. $user_avatar_url .'">';
	echo '<span itemprop="reviewRating">' . esc_html( $rating ) . '</span> stars - <strong>"<span itemprop="name">' . esc_html( $title ) . '</span>"</strong>
  <br /> by <span itemprop="author">' . esc_html( $user_displayname ) . '</span><br />
  Written on <meta itemprop="datePublished" content="' . esc_attr( $date ) . '">' . esc_html( $date ) . '
  <br /><span itemprop="reviewBody">' . esc_html( $content ) . '</span>';

  // echo '<small>'.$legal . '</small>';

	echo '</div>';




}


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
		echo '	<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '" class="title_label">' . esc_html__( 'Title', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" class="widefat" placeholder="' . esc_attr__( '', 're-pro' ) . '" value="' . esc_attr( $title ) . '">';
		echo '	<span class="description">' . esc_html__( 'Title', 're-pro' ) . '</span>';
		echo '</p>';


		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'latitude' ) ) . '" class="latitude_label">' . esc_html__( 'Latitude', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $this->get_field_id( 'latitude' ) ) . '" name="' . esc_attr( $this->get_field_name( 'latitude' ) ) . '" class="widefat" placeholder="' . esc_attr__( '', 're-pro' ) . '" value="' . esc_attr( $latitude ) . '">';
		echo '	<span class="description">' . esc_html__( 'Latitude', 're-pro' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'longitude' ) ) . '" class="longitude_label">' . esc_html__( 'Longitude', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $this->get_field_id( 'longitude' ) ) . '" name="' . esc_attr( $this->get_field_name( 'longitude' ) ) . '" class="widefat" placeholder="' . esc_attr__( '', 're-pro' ) . '" value="' . esc_attr( $longitude ) . '">';
		echo '	<span class="description">' . esc_html__( 'Longitude', 're-pro' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'level' ) ) . '" class="level_label">' . esc_html__( 'Level', 're-pro' ) . '</label>';
		echo '	<input type="number" id="' . esc_attr( $this->get_field_id( 'level' ) ) . '" name="' . esc_attr( $this->get_field_name( 'level' ) ) . '" class="widefat" placeholder="' . esc_attr__( '', 're-pro' ) . '" value="' . esc_attr( $level ) . '">';
		echo '	<span class="description">' . esc_html__( 'Level', 're-pro' ) . '</span>';
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

		$instance['latitude'] = !empty( $new_instance['latitude'] ) ? sanitize_text_field( $new_instance['latitude'] ) : '';
		$instance['longitude'] = !empty( $new_instance['longitude'] ) ? sanitize_text_field( $new_instance['longitude'] ) : '';
		$instance['level'] = !empty( $new_instance['level'] ) ? (string) absint( $new_instance['level'] ) : '';
		$instance['title'] = !empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;

	}

}

/**
 * register_widgets function.
 *
 * @access public
 * @return void
 */
function streetadvisor_register_widgets() {
	register_widget( 'StreetAdvisor_Reviews' );
}
add_action( 'widgets_init', 'streetadvisor_register_widgets' );
