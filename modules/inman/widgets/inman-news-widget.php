<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Inman Feed Widget
 *
 * @package RE-PRO
 */

/**
 * InmanNewsWidget class.
 *
 * @extends WP_Widget
 */
class InmanNewsWidget extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'inman_news_widget',
			__( 'Inman News', 're-pro' ),
			array(
				'description' => __( 'Display the lastest news from Inman.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget inman-widget inman-news-widget',
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
		$display_total = ! empty( $instance['display_total'] ) ? $instance['display_total'] : '3';


		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];


		$rss =  fetch_feed( 'https://feeds.feedburner.com/inmannews' );



		if( ! is_wp_error( $rss ) ) {

			$max_items = $rss->get_item_quantity( $display_total );
			$rss_items = $rss->get_items( 0, $display_total );

			// echo $rss->get_title();
			// echo '<small>'. $rss->get_description() . '.</small>';

			foreach( $rss_items as $item ) {

				echo '<div style="margin:20px 0;">';
				echo '<h4><a href="'. $item->get_link() .'" rel="nofollow" target="_blank">' . $item->get_title() . '</a></h4>';
				echo '</div>';

				echo $item->get_content();

			}

		} else {
			echo $rss->get_error_message();
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

		));

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$display_total = ! empty( $instance['display_total'] ) ? $instance['display_total'] : '';

		// Title.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
		echo '</p>';

		// TODO: Add field to select display total count, 1 - 20.

	}

	/**
	 * Update.
	 *
	 * @access public
	 * @param mixed $new_instance New Instance.
	 * @param mixed $old_instance Old Instance.
	 * @return $instance
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['display_total'] = ! empty( $new_instance['display_total'] ) ? strip_tags( $new_instance['display_total'] ) : '';

		return $instance;
	}
}

/**
 * Register Widget.
 *
 * @access public
 * @return void
 */
function repro_inman_news_widget() {

	register_widget( 'InmanNewsWidget' );
}
add_action( 'widgets_init', 'repro_inman_news_widget' );
