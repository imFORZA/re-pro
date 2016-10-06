<?php
/**
 * Zillow Badges (http://www.zillow.com/webtools/badges/)
 *
 * @package idxFORZA
 */

/**
 * Zillow_Badges class.
 *
 * @extends WP_Widget
 */
class Zillow_Badges extends WP_Widget
{

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'zillow-badges',
			__( 'Zillow Badge', 're-pro' ),
			array(
				'description' => __( 'Display a Zillow Badge which links to an agent profile page.', 're-pro' ),
				'classname'   => 'widget widget-zillow-badge',
			)
		);

	}

	/**
	 * Widget function.
	 *
	 * @access public
	 * @param mixed $args Arguments.
	 * @param mixed $instance Instance.
	 * @return void
	 */
	public function widget( $args, $instance ) {

		// Retrieve any existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$badge_name = ! empty( $instance['badge_name'] ) ? $instance['badge_name'] : '';
		$badge_alignment = ! empty( $instance['badge_alignment'] ) ? $instance['badge_alignment'] : '';

		$zillow_badges = zillow_badges();

			echo $args['before_widget'];

			echo $args['before_title']  . esc_attr( $title )  . $args['after_title'] ;

		foreach ( $zillow_badges as $zillow_badge ) {
			if ( $badge_name === $zillow_badge['id'] ) {

					echo '<a href="https://www.zillow.com/profile/" ><img id="zillow-'. esc_attr( $zillow_badge['id'] ) .'-badge" class="'. sanitize_html_class( $zillow_badge['class'] ) . ' ' . sanitize_html_class( $badge_alignment ) .'" src="' . esc_url( apply_filters( 'jetpack_photon_url', $zillow_badge['url'] ) ) . '" alt="'. esc_attr( $zillow_badge['alt'] ) . '"  height="'. esc_attr( $zillow_badge['height'] ) .'" width="'. esc_attr( $zillow_badge['width'] ) .'" title="'. esc_attr( $zillow_badge['alt'] ) .'" /></a>';

			}
		}

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
			'badge_name' => '',
			'badge_alignment' => '',
		));

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$badge_name = ! empty( $instance['badge_name'] ) ? $instance['badge_name'] : '';
		$badge_alignment = ! empty( $instance['badge_alignment'] ) ? $instance['badge_alignment'] : '';

		$zillow_badges = zillow_badges();

		// Form fields.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '" class="title_label">' . esc_attr( 'Title', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" class="widefat" placeholder="' . esc_attr__( 'Find me on Zillow', 're-pro' ) . '" value="' . esc_attr( $title ) . '">';
		echo '	<span class="description">' . esc_attr( 'Add a title to your zillow badge.', 're-pro' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'badge_name' ) ) . '" class="badge_name_label">' . esc_attr( 'Badge Type', 're-pro' ) . '</label><br />';
		echo '	<select id="' . esc_attr( $this->get_field_id( 'badge_name' ) ) . '" name="' . esc_attr( $this->get_field_name( 'badge_name' ) ) . '" class="widefat">';
		echo ' <option value="" '. selected( $badge_name, '', false ) .'>'. esc_attr( 'Choose', 're-pro' ) .'</option>';
		foreach ( $zillow_badges as $zillow_badge ) {
			echo '<option value="'. esc_attr( $zillow_badge['id'] ) .'" ' . selected( $badge_name, $zillow_badge['id'], false ) . '> ' . esc_attr( $zillow_badge['name'] ) . '</option>';
		}

		echo '	</select>';
		echo '	<span class="description">' . esc_attr_e( 'Choose a badge type from the dropdown. Click Save to preview the badge. Full list of badges can be found on <a href="http://www.zillow.com/webtools/badges/" target="_blank" rel="nofollow">Zillow</a>.', 're-pro' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'badge_alignment' ) ) . '" class="badge_alignment_label">' . esc_attr_e( 'Badge Alignment', 're-pro' ) . '</label>';
		echo '	<select id="' . esc_attr( $this->get_field_id( 'badge_alignment' ) ) . '" name="' . esc_attr( $this->get_field_name( 'badge_alignment' ) ) . '" class="widefat">';
		echo '		<option value="alignleft" ' . selected( $badge_alignment, 'alignleft', false ) . '> ' . esc_attr( 'Left', 're-pro' ) . '</option>';
		echo '		<option value="aligncenter" ' . selected( $badge_alignment, 'aligncenter', false ) . '> ' . esc_attr( 'Center', 're-pro' ) . '</option>';
		echo '		<option value="alignright" ' . selected( $badge_alignment, 'alignright', false ) . '> ' . esc_attr( 'Right', 're-pro' ) . '</option>';
		echo '	</select>';
		echo '	<span class="description">' . esc_attr( 'Choose how to align your badge.', 're-pro' ) . '</span>';
		echo '</p>';

	}

	/**
	 * Update function.
	 *
	 * @access public
	 * @param mixed $new_instance New instance.
	 * @param mixed $old_instance Old Instance.
	 * @return $instance Instance.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['badge_name'] = ! empty( $new_instance['badge_name'] ) ? strip_tags( $new_instance['badge_name'] ) : '';
		$instance['badge_alignment'] = ! empty( $new_instance['badge_alignment'] ) ? strip_tags( $new_instance['badge_alignment'] ) : '';

		return $instance;

	}
}

/**
 * register_zillow_badge_widgets function.
 *
 * @access public
 * @return void
 */
function register_zillow_badge_widgets() {

	register_widget( 'Zillow_Badges' );
}
add_action( 'widgets_init', 'register_zillow_badge_widgets' );
