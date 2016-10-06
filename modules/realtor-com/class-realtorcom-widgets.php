<?php
/**
 * Realtor Widgets
 *
 * @package RE-Pro
 *
 * Realtor Widgets: http://www.realtor.com/mortgage/widget/store/
 */

/**
 * RealtorcomWidgets class.
 *
 * @extends WP_Widget
 */
class RealtorcomWidgets extends WP_Widget {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'realtor-widgets',
			__( 'Realtor.com Widgets', 're-pro' ),
			array(
				'description' => __( 'Realtor.com Widgets', 're-pro' ),
				'classname'   => 'widget widget-realtorcom',
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
		$widget_type = ! empty( $instance['widget_type'] ) ? $instance['widget_type'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		if ( 'rent-or-buy-calc' === $widget_type ) {
		?>
		  <div class="re-pro realtorcom-rent-buy-calc">
			<iframe height="620px" width="300px" frameborder="0" scrolling="no" src="http://www.realtor.com/mortgage/widget/rent-buy-calculator/" style="width:100%;min-width:300px;min-height:625px;"></iframe>
		  </div>
		<?php
		}

		if ( 'mortgage-rate-trends' === $widget_type ) { ?>
			<iframe height="80px" width="980px" frameborder="0" scrolling="yes" src="http://www.realtor.com/mortgage/widget/mortgage-rate-trends/wide.aspx"></iframe>
		<?php	                                                                                                                                                                                                                    }

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
			'widget_type' => '',
		));

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$widget_type = ! empty( $instance['widget_type'] ) ? $instance['widget_type'] : '';

		// Form fields.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '" class="title_label">' . esc_attr_e( 'Title', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" class="widefat" placeholder="' . esc_attr__( 'Title', 're-pro' ) . '" value="' . esc_attr( $title ) . '">';
		echo '	<span class="description">' . esc_attr_e( 'Title', 're-pro' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'widget_type' ) ) . '" class="widget_type_label">' . esc_attr_e( 'Widget Type', 're-pro' ) . '</label>';
		echo '	<select id="' . esc_attr( $this->get_field_id( 'widget_type' ) ) . '" name="' . esc_attr( $this->get_field_name( 'widget_type' ) ) . '" class="widefat">';
		echo '		<option value="rent-or-buy-calc" ' . selected( $widget_type, 'rent-or-buy-calc', false ) . '> ' . esc_attr( 'Rent or Buy Calculator', 're-pro' ) . '</option>';
				echo '		<option value="mortgage-rate-trends" ' . selected( $widget_type, 'mortgage-rate-trends', false ) . '> ' . esc_attr( 'Mortgage Rate Trends', 're-pro' ) . '</option>';
		echo '	</select>';
		echo '	<span class="description">' . esc_attr_e( 'Widget Type', 're-pro' ) . '</span>';
		echo '</p>';

	}


	/**
	 * Update function.
	 *
	 * @access public
	 * @param mixed $new_instance New Instance.
	 * @param mixed $old_instance Old Instance.
	 * @return $instance
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['widget_type'] = ! empty( $new_instance['widget_type'] ) ? strip_tags( $new_instance['widget_type'] ) : '';

		return $instance;

	}
}


/**
 * register_realtorcom_widgets function.
 *
 * @access public
 * @return void
 */
function register_realtorcom_widgets() {

	register_widget( 'RealtorcomWidgets' );
}
add_action( 'widgets_init', 'register_realtorcom_widgets' );
