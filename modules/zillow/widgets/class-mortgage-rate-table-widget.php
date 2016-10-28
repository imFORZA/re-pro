<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Zillow Large Rate Table Widget (https://www.zillow.com/webtools/widgets/large-rate-table-widget/)
 *
 * @package RE-PRO
 */

/**
 * ZillowLargeRateTableWidget class.
 *
 * @extends WP_Widget
 */
class ZillowLargeRateTableWidget extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'zillow_lg_ratetable_widget',
			__( 'Zillow Large Mortgage Rate Table', 're-pro' ),
			array(
				'description' => __( 'Display a large Mortgage Rate Table from Zillow.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget zillow-widget zillow-widget-lg-rate-table',
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
	 * @return void
	 */
	public function widget( $args, $instance ) {

		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		echo '<iframe id="" class="" scrolling="no" title="'. __( 'Zillow Mortgage Rate Table', 're-rpo' ) .'" src="https://www.zillow.com/webtools/widgets/RateTableDistributionWidget.htm" width="306" height="215" frameborder="0" style="display:block;width:100%;min-height:215px;max-width:100%;"></iframe>';

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
			'screenname' => '',
			'region' => '',
			'textcolor' => '000000',
			'zuid' => '',
		));

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
 * Register Zillow Affordability Calculator Widget.
 *
 * @access public
 * @return void
 */
function repro_zillow_rate_table_widget() {

	register_widget( 'ZillowLargeRateTableWidget' );
}
add_action( 'widgets_init', 'repro_zillow_rate_table_widget' );

