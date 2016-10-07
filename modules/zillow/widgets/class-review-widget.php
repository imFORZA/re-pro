<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Zillow Review Widget (https://www.zillow.com/webtools/widgets/review-widget/)
 *
 * @package RE-PRO
 */

/**
 * Zillow_Widgets class.
 *
 * @extends WP_Widget
 */
class ZillowReviewWidget extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'zillow_review_widget',
			__( 'Zillow Reviews', 're-pro' ),
			array(
				'description' => __( 'Display a widget of your Zillow Reviews.', 're-pro' ),
				'classname'   => 're-pro re-pro-widget zillow-widget zillow-widget-reviews',
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
		$screenname = ! empty( $instance['screenname'] ) ? $instance['screenname'] : '';
		$zuid = ! empty( $instance['zuid'] ) ? $instance['zuid'] : '';
		$size = ! empty( $instance['size'] ) ? $instance['size'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		?>

		<iframe scrolling="no" src="http://www.zillow.com/widgets/reputation/Rating.htm?did=rw-widget-container&ezuid=X1-ZUyymx5957gao9_9prla&scrnname=bkhubbard&size=wide&type=iframe&zmod=true" width="298" frameborder="0" style="display:block;width:100%;max-width:100%;" height="78"></iframe>



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
			'screenname' => '',
			'zuid' => ''
		));

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

		// Form fields.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '" class="title_label">' . esc_attr__( 'Title:', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $title ) . '" class="widefat" placeholder="' . esc_attr__( 'Title', 're-pro' ) . '" value="' . esc_attr( $title ) . '">';
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
		$instance['screenname'] = ! empty( $new_instance['screenname'] ) ? strip_tags( $new_instance['screenname'] ) : '';
		$instance['zuid'] = ! empty( $new_instance['zuid'] ) ? strip_tags( $new_instance['zuid'] ) : '';
		$instance['size'] = ! empty( $new_instance['size'] ) ? strip_tags( $new_instance['size'] ) : '';

		return $instance;
	}
}


/**
 * Register Zillow Review Widget.
 *
 * @access public
 * @return void
 */
function repro_zillow_review_widget() {

	register_widget( 'ZillowReviewWidget' );
}
add_action( 'widgets_init', 'repro_zillow_review_widget' );
