<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Trulia Feed Widget
 *
 * @package RE-PRO
 */

/**
 * TruliaRssListingWidget class.
 *
 * @extends WP_Widget
 */
class TruliaRssListingWidget extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'trulia_rss_listing_widget',
			__( 'Trulia Listings RSS', 're-pro' ),
			array(
				'description' => __( 'Display listings from Trulia via a RSS Feed.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget trulia-widget trulia-rss-listings-widget',
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

		$iframe_id = ! empty( $args['widget_id'] ) ? $args['widget_id'] : '';
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';


		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];


		$rss =  fetch_feed( get_trulia_rss_listing_feed( 'for_sale', 'Sacramento', 'CA' ) );

		/* Sometimes the feed has errors so we must use SimplePie ForceFeed. */
		add_action('wp_feed_options', 'trulia_force_feed' , 10, 1);
		function trulia_force_feed($rss) {

				$rss->force_feed(true);

		}

		// echo get_trulia_rss_listing_feed( 'for_sale', 'Sacramento', 'CA');
		if( ! is_wp_error( $rss ) ) {

			$max_items = $rss->get_item_quantity(3);
			$rss_items = $rss->get_items(0,3);

			// echo $rss->get_title();
			// echo $rss->get_description();

			foreach( $rss_items as $item ) {

				echo '<div style="margin:20px 0;">';
				echo '<h4><a href="'. $item->get_link() .'" rel="nofollow" target="_blank">' . $item->get_title() . '</a></h4>';
				echo '</div>';

				echo $item->get_content();

				echo '<div style="margin:20px 0;text-align:right;">';
				echo '<small> Updated on '.$item->get_date('F j, Y') . '.</small>';
				echo '</div>';
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


		// Title.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
		echo '</p>';


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

		return $instance;
	}
}

/**
 * Register Widget.
 *
 * @access public
 * @return void
 */
function repro_trulia_rsslisting_widget() {

	register_widget( 'TruliaRssListingWidget' );
}
add_action( 'widgets_init', 'repro_trulia_rsslisting_widget' );
