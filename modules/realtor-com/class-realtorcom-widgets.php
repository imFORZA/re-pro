<?php
/**
 * Realtor Widgets
 *
 * @package idxFORZA
 *
 * Realtor Widgets: http://www.realtor.com/mortgage/widget/store/
 */

/**
 * IdxFORZA_RealtorcomWidgets class.
 *
 * @extends WP_Widget
 */
class IdxFORZA_RealtorcomWidgets extends WP_Widget
{


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'idxforza-realtor-widgets',
			__( 'Realtor.com Widgets (idxFORZA)', 'idxforza' ),
			array(
				'description' => __( 'Realtor.com Widgets', 'idxforza' ),
				'classname'   => 'idxforza-widget idxforza-widget-realtorcom',
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

		$idxforza_title = ! empty( $instance['idxforza_title'] ) ? $instance['idxforza_title'] : '';
		$idxforza_widget_type = ! empty( $instance['idxforza_widget_type'] ) ? $instance['idxforza_widget_type'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $idxforza_title ) . $args['after_title'];

		if ( 'rent-or-buy-calc' === $idxforza_widget_type ) {
		?>
		  <div class="idxforza idxforza-realtorcom-rent-buy-calc">
			<iframe height="620px" width="300px" frameborder="0" scrolling="no" src="http://www.realtor.com/mortgage/widget/rent-buy-calculator/" style="width:100%;min-width:300px;min-height=625px;"></iframe>
		  </div>
		<?php
		}

		if ( 'mortgage-rate-trends' === $idxforza_widget_type ) { ?>
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
			'idxforza_title' => '',
			'idxforza_widget_type' => '',
		));

		// Retrieve an existing value from the database.
		$idxforza_title = ! empty( $instance['idxforza_title'] ) ? $instance['idxforza_title'] : '';
		$idxforza_widget_type = ! empty( $instance['idxforza_widget_type'] ) ? $instance['idxforza_widget_type'] : '';

		// Form fields.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'idxforza_title' ) ) . '" class="idxforza_title_label">' . esc_attr_e( 'Title', 'idxforza' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $this->get_field_id( 'idxforza_title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'idxforza_title' ) ) . '" class="widefat" placeholder="' . esc_attr__( 'Title', 'idxforza' ) . '" value="' . esc_attr( $idxforza_title ) . '">';
		echo '	<span class="description">' . esc_attr_e( 'Title', 'idxforza' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'idxforza_widget_type' ) ) . '" class="idxforza_widget_type_label">' . esc_attr_e( 'Widget Type', 'idxforza' ) . '</label>';
		echo '	<select id="' . esc_attr( $this->get_field_id( 'idxforza_widget_type' ) ) . '" name="' . esc_attr( $this->get_field_name( 'idxforza_widget_type' ) ) . '" class="widefat">';
		echo '		<option value="rent-or-buy-calc" ' . selected( $idxforza_widget_type, 'rent-or-buy-calc', false ) . '> ' . esc_attr_e( 'Rent or Buy Calculator', 'idxforza' ) . '</option>';
				echo '		<option value="mortgage-rate-trends" ' . selected( $idxforza_widget_type, 'mortgage-rate-trends', false ) . '> ' . esc_attr_e( 'Mortgage Rate Trends', 'idxforza' ) . '</option>';
		echo '	</select>';
		echo '	<span class="description">' . esc_attr_e( 'Widget Type', 'idxforza' ) . '</span>';
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

		$instance['idxforza_title'] = ! empty( $new_instance['idxforza_title'] ) ? strip_tags( $new_instance['idxforza_title'] ) : '';
		$instance['idxforza_widget_type'] = ! empty( $new_instance['idxforza_widget_type'] ) ? strip_tags( $new_instance['idxforza_widget_type'] ) : '';

		return $instance;

	}
}


/**
 * Idxforza_register_realtorcom_widgets function.
 *
 * @access public
 * @return void
 */
function idxforza_register_realtorcom_widgets() {

	register_widget( 'IdxFORZA_RealtorcomWidgets' );
}
add_action( 'widgets_init', 'idxforza_register_realtorcom_widgets' );
