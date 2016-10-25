<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Zillow Expensive Homes Widget (https://www.zillow.com/webtools/widgets/MostExpensiveHomes.htm)
 *
 * @package RE-PRO
 */

/**
 * ZillowExpensiveHomesWidget class.
 *
 * @extends WP_Widget
 */
class ZillowExpensiveHomesWidget extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'zillow_expensive_homes_widget',
			__( 'Zillow Most Expensive Homes', 're-pro' ),
			array(
				'description' => __( 'Display the most expensive homes from Zillow.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget zillow-widget zillow-widget-expensive-homes',
				'customize_selective_refresh' => true
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
		$type = ! empty( $instance['type'] ) ? $instance['type'] : '';
		$size = ! empty( $instance['size'] ) ? $instance['size'] : '';
		$location = ! empty( $instance['location'] ) ? $instance['location'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		echo '<iframe id="" class="" scrolling="no" title="'. __('Zillow Most Expensive Homes', 're-rpo') .'" src="http://www.zillow.com/widgets/fmr/FMRWidget.htm?did=meh-large-iframe-widget-container&type=iframe&size=wide&rn=Seattle+WA&widgettype=meh" width="287" height="121" frameborder="0" style="display:block;width:100%;max-width:100%;"></iframe>';

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
			'type' => 'iframe',
			'size' => 'wide',
			'location' => 'El Segundo, CA',
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
		$instance['type'] = ! empty( $new_instance['type'] ) ? strip_tags( $new_instance['type'] ) : '';
		$instance['size'] = ! empty( $new_instance['size'] ) ? strip_tags( $new_instance['size'] ) : '';
		$instance['location'] = ! empty( $new_instance['location'] ) ? strip_tags( $new_instance['location'] ) : '';

		return $instance;
	}
}

/**
 * Register Zillow Affordability Calculator Widget.
 *
 * @access public
 * @return void
 */
function repro_zillow_expensive_homes_widget() {

	register_widget( 'ZillowExpensiveHomesWidget' );
}
add_action( 'widgets_init', 'repro_zillow_expensive_homes_widget' );

