<?php
/**
 * RealtyTrac.com Real Estate Trends Ticker (http://www.realtytrac.com/Widgets/RealEstateTrendsTicker)
 *
 * @package RE-PRO
 */

	/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * RealtyTracTrendsTickerWidget class.
 *
 * @extends WP_Widget
 */
class RealtyTracTrendsTickerWidget extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'realtytrac_trends_ticker',
			__( 'RealtyTrac Real Estate Trends Ticker', 're-pro' ),
			array(
				'description' => __( 'Directly link your visitors to nationwide foreclosure, auction, and bank-owned real estate trends from RealtyTrac.com.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget realtry-trac-widget realtytrac-trends-ticker',
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
		$location = ! empty( $instance['location'] ) ? $instance['location'] : '';
		$size = ! empty( $instance['size'] ) ? $instance['size'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		$realtytrac_widgets = new RealtyTracWidgets();

		$realtytrac_widgets->get_trends_ticker_widget( $location, $size );

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
			'location' => 'National',
			'size' => '1'
		) );

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$location = ! empty( $instance['location'] ) ? $instance['location'] : '';
		$size = ! empty( $instance['size'] ) ? $instance['size'] : '';

		// Title.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
		echo '</p>';

		// Location.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'location' ) . '" class="title-label">' . __( 'Location:', 're-pro' ) . '</label>';
		echo '<select id="' . $this->get_field_id( 'location' ) . '" name="' . $this->get_field_name( 'location' ) . '" class="widefat">';
	    echo '<option value="National"'. selected( $location, 'National' ) .'>'. __( 'National', 're-pro' ) .'</option>';
	    echo '<option value="Alaska"'. selected( $location, 'Alaska' ) .'>Alaska</option>';
	    echo '<option value="Alabama"'. selected( $location, "Alabama" ) .'>Alabama</option>';
	    echo '<option value="Arkansas"'. selected( $location, 'Arkansas' ) .'>Arkansas</option>';
	    echo '<option value="Arizona"'. selected( $location, 'Arizona' ) .'>Arizona</option>';
	    echo '<option value="California"'. selected( $location, 'California' ) .'>California</option>';
	    echo '<option value="Colorado"'. selected( $location, 'Colorado' ) .'>Colorado</option>';
	    echo '<option value="Connecticut"'. selected( $location, 'Connecticut' ) .'>Connecticut</option>';
	    echo '<option value="Delaware"'. selected( $location, 'Delaware' ) .'>Delaware</option>';
	    echo '<option value="Florida"'. selected( $location, 'Florida' ) .'>Florida</option>';
	    echo '<option value="Georgia"'. selected( $location, 'Georgia' ) .'>Georgia</option>';
	    echo '<option value="Hawaii"'. selected( $location, 'Hawaii' ) .'>Hawaii</option>';
	    echo '<option value="Iowa"'. selected( $location, 'Iowa' ) .'>Iowa</option>';
	    echo '<option value="Idaho"'. selected( $location, 'Idaho' ) .'>Idaho</option>';
	    echo '<option value="Illinois"'. selected( $location, 'Illinois' ) .'>Illinois</option>';
	    echo '<option value="Indiana"'. selected( $location, 'Indiana' ) .'>Indiana</option>';
	    echo '<option value="Kansas"'. selected( $location, 'Kansas' ) .'>Kansas</option>';
	    echo '<option value="Kentucky"'. selected( $location, 'Kentucky' ) .'>Kentucky</option>';
	    echo '<option value="Louisiana"'. selected( $location, 'Louisiana' ) .'>Louisiana</option>';
	    echo '<option value="Massachusetts"'. selected( $location, 'Massachusetts' ) .'>Massachusetts</option>';
	    echo '<option value="Maryland"'. selected( $location, 'Maryland' ) .'>Maryland</option>';
	    echo '<option value="Maine"'. selected( $location, 'Maine' ) .'>Maine</option>';
	    echo '<option value="Michigan"'. selected( $location, 'Michigan' ) .'>Michigan</option>';
	    echo '<option value="Minnesota"'. selected( $location, 'Minnesota' ) .'>Minnesota</option>';
	    echo '<option value="Missouri"'. selected( $location, 'Missouri' ) .'>Missouri</option>';
	    echo '<option value="Mississippi"'. selected( $location, 'Mississippi' ) .'>Mississippi</option>';
	    echo '<option value="Montana"'. selected( $location, 'Montana' ) .'>Montana</option>';
	    echo '<option value="North Carolina"'. selected( $location, 'North Carolina' ) .'>North Carolina</option>';
	    echo '<option value="North Dakota"'. selected( $location, 'North Dakota' ) .'>North Dakota</option>';
	    echo '<option value="Nebraska"'. selected( $location, 'Nebraska' ) .'>Nebraska</option>';
	    echo '<option value="New Hampshire"'. selected( $location, 'New Hampshire' ) .'>New Hampshire</option>';
	    echo '<option value="New Jersey"'. selected( $location, 'New Jersey' ) .'>New Jersey</option>';
	    echo '<option value="New Mexico"'. selected( $location, 'New Mexico' ) .'>New Mexico</option>';
	    echo '<option value="Nevada"'. selected( $location, 'Nevada' ) .'>Nevada</option>';
	    echo '<option value="New York"'. selected( $location, 'New York' ) .'>New York</option>';
	    echo '<option value="Ohio"'. selected( $location, 'Ohio' ) .'>Ohio</option>';
	    echo '<option value="Oklahoma"'. selected( $location, 'Oklahoma' ) .'>Oklahoma</option>';
	    echo '<option value="Oregon"'. selected( $location, 'Oregon' ) .'>Oregon</option>';
	    echo '<option value="Pennsylvania"'. selected( $location, 'Pennsylvania' ) .'>Pennsylvania</option>';
	    echo '<option value="Puerto Rico"'. selected( $location, 'Puerto Rico' ) .'>Puerto Rico</option>';
	    echo '<option value="Rhode Island"'. selected( $location, 'Rhode Island' ) .'>Rhode Island</option>';
	    echo '<option value="South Carolina"'. selected( $location, 'South Carolina' ) .'>South Carolina</option>';
	    echo '<option value="South Dakota"'. selected( $location, 'South Dakota' ) .'>South Dakota</option>';
	    echo '<option value="Tennessee"'. selected( $location, 'Tennessee' ) .'>Tennessee</option>';
	    echo '<option value="Texas"'. selected( $location, 'Texas' ) .'>Texas</option>';
	    echo '<option value="Utah"'. selected( $location, 'Utah' ) .'>Utah</option>';
	    echo '<option value="Virginia"'. selected( $location, 'Virginia' ) .'>Virginia</option>';
	    echo '<option value="Vermont"'. selected( $location, 'Vermont' ) .'>Vermont</option>';
	    echo '<option value="Washington"'. selected( $location, 'Washington' ) .'>Washington</option>';
	    echo '<option value="Wisconsin"'. selected( $location, 'Wisconsin' ) .'>Wisconsin</option>';
	    echo '<option value="West Virginia"'. selected( $location, 'West Virginia' ) .'>West Virginia</option>';
	    echo '<option value="Wyoming"'. selected( $location, 'Wyoming' ) .'>Wyoming</option>';
		echo '</select>';
		echo '</p>';

		//Size.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'size' ) . '" class="ticker-size-label">' . __( 'Select a Size:', 're-pro' ) . '</label>';
		echo '	<select id="' . $this->get_field_id( 'size' ) . '" name="' . $this->get_field_name( 'size' ) . '" class="widefat">';
		echo '		<option value="1" ' . selected( $size, '1', false ) . '> ' . __( '300x150', 're-pro' ) . '</option>';
		echo '		<option value="2" ' . selected( $size, '2', false ) . '> ' . __( '300x600', 're-pro' ) . '</option>';
		echo '		<option value="3" ' . selected( $size, '3', false ) . '> ' . __( '980x150', 're-pro' ) . '</option>';
		echo '		<option value="4" ' . selected( $size, '4', false ) . '> ' . __( '980x150 with boxes', 're-pro' ) . '</option>';
		echo '	</select>';
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
		$instance['size'] = ! empty( $new_instance['size'] ) ? strip_tags( $new_instance['size'] ) : '';


		return $instance;
	}
}

/**
 * Register RealtyTrac Real Estate Trends Ticker Widget.
 *
 * @access public
 * @return void
 */
function repro_realty_trac_trends_ticker() {
	register_widget( 'RealtyTracTrendsTickerWidget' );
}
add_action( 'widgets_init', 'repro_realty_trac_trends_ticker' );
