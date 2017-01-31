<?php
/**
 * Homes.com Home Values Widget (http://www.homes.com/widget/home-values/)
 *
 * @package RE-PRO
 */

	/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * HomesHomeValuesWidget class.
 *
 * @extends WP_Widget
 */
class HomesHomeValuesWidget extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'homes_home_values',
			__( 'Homes Home Values', 're-pro' ),
			array(
				'description' => __( 'Display the average home value in a neighborhood from Homes.com', 're-pro' ),
				'classname'   => 're-pro re-pro-widget homes-widget homes-home-values',
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
		$avgColor = ! empty( $instance['avgColor'] ) ? $instance['avgColor'] : '';
		$medianColor = ! empty( $instance['medianColor'] ) ? $instance['medianColor'] : '';
		$average = ! empty( $instance['average'] ) ? $instance['average'] : 1;
		$median = ! empty( $instance['median'] ) ? $instance['median'] : 1;

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		//$homes_widgets = new HomesWidgets();

		//$homes_widgets->get_featured_listings( $iframe_id, $location, $color, $status );
		?>


		<div class="home-values-widget">
			<h1>Search Home Values</h1>
			<iframe src="http://www.homes.com/widget/home-values/frame/?avm_types=MEAN%2CMEDIAN&text_color=%230054a0&button_color=%23f7841b&cobrand=&location=El%20Segundo%2C%20CA" class="home-values-frame" width="100%" seamless frameborder="0"></iframe>
			<div class="footer">
				<a href="http://www.homes.com/widgets/" title="Homes.com" class="logo">
					Powered By Homes.com
				</a>
			</div>
		<?php

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
			'avgColor' => '0054a0',
			'medianColor' => '0054a0',
			'average' => 'yes',
			'median' => 'yes',
		) );

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$location = ! empty( $instance['location'] ) ? $instance['location'] : '';
		$avgColor = ! empty( $instance['avgColor'] ) ? $instance['avgColor'] : '';
		$medianColor = ! empty( $instance['medianColor'] ) ? $instance['medianColor'] : '';
		$average = ! empty( $instance['average'] ) ? $instance['average'] : '';
		$median = ! empty( $instance['median'] ) ? $instance['median'] : '';

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

		// Average Color
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'avgColor' ) . '" class="title-label">' . __( 'Average Home Value Color:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'avgColor' ) . '" name="' . $this->get_field_name( 'avgColor' ) . '" value="' . $avgColor  . '" class="widefat">';
		echo '</p>';

		// Median Color
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'medianColor' ) . '" class="title-label">' . __( 'Median Home Value Color:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'medianColor' ) . '" name="' . $this->get_field_name( 'medianColor' ) . '" value="' . $medianColor  . '" class="widefat">';
		echo '</p>';

		// Home Value Types
		echo '<p>';
		echo '<label for="home-values-type" class="homes_value_type_label">' . __( 'Home Value Types:', 're-pro' ) . '</label>';
		echo '<br />';
		echo '<input value="yes" type="checkbox"' . checked( $average, 'yes', false ) . 'id="' . $this->get_field_id( 'average' ) . '" name="' . $this->get_field_name( 'average' )  . '" />';
		echo '<label for="' . $this->get_field_id( 'average' ) . '">Average Home Value</label>';
		echo '<br />';
		echo '<input value="yes" type="checkbox"' . checked( $median, 'yes', false ) . 'id="' . $this->get_field_id( 'median' ) . '" name="' . $this->get_field_name( 'median' ) . '" />';
		echo '<label for="' . $this->get_field_id( 'median' ) . '">Median Home Value</label>';
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
		$instance['avgColor'] = ! empty( $new_instance['avgColor'] ) ? strip_tags( $new_instance['avgColor'] ) : '';
		$instance['medianColor'] = ! empty( $new_instance['medianColor'] ) ? strip_tags( $new_instance['medianColor'] ) : '';
		$instance['average'] = ! empty( $new_instance['average'] ) ? strip_tags( $new_instance['average'] ) : '';
		$instance['median'] = ! empty( $new_instance['median'] ) ? strip_tags( $new_instance['median'] ) : '';

		return $instance;
	}
}

/**
 * Register Homes.com Featured Listings Widget.
 *
 * @access public
 * @return void
 */
function repro_homes_com_home_values() {
	if ( is_ssl() ) {
		echo 'This widget does not yet support SSL. Please contact homes.com asking them to support SSL for this widget.';
	} else {
		register_widget( 'HomesHomeValuesWidget' );
	}
}
add_action( 'widgets_init', 'repro_homes_com_home_values' );
