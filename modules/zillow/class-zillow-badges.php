<?php
/**
 * Zillow Badges (http://www.zillow.com/webtools/badges/)
 *
 * @package idxFORZA
 */

/**
 * Idxforza_Zillow_Badges class.
 *
 * @extends WP_Widget
 */
class Idxforza_Zillow_Badges extends WP_Widget
{

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'idxforza-zillow-badges',
			__( 'Zillow Badge (idxFORZA)', 'idxforza' ),
			array(
				'description' => __( 'Display a Zillow Badge which links to an agent profile page.', 'idxforza' ),
				'classname'   => 'idxforza-widget idxforza-widget-zillow-badge',
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
		$idxforza_title = ! empty( $instance['idxforza_title'] ) ? $instance['idxforza_title'] : '';
		$idxforza_badge_name = ! empty( $instance['idxforza_badge_name'] ) ? $instance['idxforza_badge_name'] : '';
		$idxforza_badge_alignment = ! empty( $instance['idxforza_badge_alignment'] ) ? $instance['idxforza_badge_alignment'] : '';

		$zillow_badges = idxforza_zillow_badges();

			echo $args['before_widget'];

			echo $args['before_title']  . esc_attr( $idxforza_title )  . $args['after_title'] ;

		foreach ( $zillow_badges as $zillow_badge ) {
			if ( $idxforza_badge_name === $zillow_badge['id'] ) {

					echo '<a href="https://www.zillow.com/profile/" ><img id="zillow-'. esc_attr( $zillow_badge['id'] ) .'-badge" class="'. sanitize_html_class( $zillow_badge['class'] ) . ' ' . sanitize_html_class( $idxforza_badge_alignment ) .'" src="' . esc_url( apply_filters( 'jetpack_photon_url', $zillow_badge['url'] ) ) . '" alt="'. esc_attr( $zillow_badge['alt'] ) . '"  height="'. esc_attr( $zillow_badge['height'] ) .'" width="'. esc_attr( $zillow_badge['width'] ) .'" title="'. esc_attr( $zillow_badge['alt'] ) .'" /></a>';

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
			'idxforza_title' => '',
			'idxforza_badge_name' => '',
			'idxforza_badge_alignment' => '',
		));

		// Retrieve an existing value from the database.
		$idxforza_title = ! empty( $instance['idxforza_title'] ) ? $instance['idxforza_title'] : '';
		$idxforza_badge_name = ! empty( $instance['idxforza_badge_name'] ) ? $instance['idxforza_badge_name'] : '';
		$idxforza_badge_alignment = ! empty( $instance['idxforza_badge_alignment'] ) ? $instance['idxforza_badge_alignment'] : '';

		$zillow_badges = idxforza_zillow_badges();

		// Form fields.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'idxforza_title' ) ) . '" class="idxforza_title_label">' . esc_attr( 'Title', 'idxforza' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $this->get_field_id( 'idxforza_title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'idxforza_title' ) ) . '" class="widefat" placeholder="' . esc_attr__( 'Find me on Zillow', 'idxforza' ) . '" value="' . esc_attr( $idxforza_title ) . '">';
		echo '	<span class="description">' . esc_attr( 'Add a title to your zillow badge.', 'idxforza' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'idxforza_badge_name' ) ) . '" class="idxforza_badge_name_label">' . esc_attr( 'Badge Type', 'idxforza' ) . '</label><br />';
		echo '	<select id="' . esc_attr( $this->get_field_id( 'idxforza_badge_name' ) ) . '" name="' . esc_attr( $this->get_field_name( 'idxforza_badge_name' ) ) . '" class="widefat">';
		echo ' <option value="" '. selected( $idxforza_badge_name, '', false ) .'>'. esc_attr( 'Choose', 'idxforza' ) .'</option>';
		foreach ( $zillow_badges as $zillow_badge ) {
			echo '<option value="'. esc_attr( $zillow_badge['id'] ) .'" ' . selected( $idxforza_badge_name, $zillow_badge['id'], false ) . '> ' . esc_attr( $zillow_badge['name'] ) . '</option>';
		}

		echo '	</select>';
		echo '	<span class="description">' . esc_attr_e( 'Choose a badge type from the dropdown. Click Save to preview the badge. Full list of badges can be found on <a href="http://www.zillow.com/webtools/badges/" target="_blank" rel="nofollow">Zillow</a>.', 'idxforza' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'idxforza_badge_alignment' ) ) . '" class="idxforza_badge_alignment_label">' . esc_attr_e( 'Badge Alignment', 'idxforza' ) . '</label>';
		echo '	<select id="' . esc_attr( $this->get_field_id( 'idxforza_badge_alignment' ) ) . '" name="' . esc_attr( $this->get_field_name( 'idxforza_badge_alignment' ) ) . '" class="widefat">';
		echo '		<option value="alignleft" ' . selected( $idxforza_badge_alignment, 'alignleft', false ) . '> ' . esc_attr( 'Left', 'idxforza' ) . '</option>';
		echo '		<option value="aligncenter" ' . selected( $idxforza_badge_alignment, 'aligncenter', false ) . '> ' . esc_attr( 'Center', 'idxforza' ) . '</option>';
		echo '		<option value="alignright" ' . selected( $idxforza_badge_alignment, 'alignright', false ) . '> ' . esc_attr( 'Right', 'idxforza' ) . '</option>';
		echo '	</select>';
		echo '	<span class="description">' . esc_attr( 'Choose how to align your badge.', 'idxforza' ) . '</span>';
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

		$instance['idxforza_title'] = ! empty( $new_instance['idxforza_title'] ) ? strip_tags( $new_instance['idxforza_title'] ) : '';
		$instance['idxforza_badge_name'] = ! empty( $new_instance['idxforza_badge_name'] ) ? strip_tags( $new_instance['idxforza_badge_name'] ) : '';
		$instance['idxforza_badge_alignment'] = ! empty( $new_instance['idxforza_badge_alignment'] ) ? strip_tags( $new_instance['idxforza_badge_alignment'] ) : '';

		return $instance;

	}
}

/**
 * Idxforza_register_zillow_badge_widgets function.
 *
 * @access public
 * @return void
 */
function idxforza_register_zillow_badge_widgets() {

	register_widget( 'Idxforza_Zillow_Badges' );
}
add_action( 'widgets_init', 'idxforza_register_zillow_badge_widgets' );
