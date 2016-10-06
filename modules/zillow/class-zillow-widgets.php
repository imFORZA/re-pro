<?php
/**
 * Zillow Widgets
 *
 * @package idxFORZA
 */

/**
 * Zillow_Widgets class.
 *
 * @extends WP_Widget
 */
class Zillow_Widgets extends WP_Widget
{


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'zillow-widgets',
			__( 'Zillow Widgets', 're-pro' ),
			array(
				'description' => __( 'Zillow Mortgage Widgets', 're-pro' ),
				'classname'   => 're-pro re-pro-widget widget-zillow',
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
		$calculator_type = ! empty( $instance['calculator_type'] ) ? $instance['calculator_type'] : '';
		echo $args['before_widget'];
		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];
		if ( 'lg-mortgage' === $calculator_type ) {
		?>
		  <div class="idxforza zillow-mortgage-calc-lg">
		<iframe scrolling="yes" src="https://www.zillow.com/mortgage/MortgageCalculatorWidgetLarge.htm?homePrice=200000" width="688px" frameborder="0" height="700px"></iframe>
		  </div>
		<?php
		}
		if ( 'lg-mortgage-rate-table' === $calculator_type ) { ?>
		<div class="idxforza zillow-mortgage-calc-lg" style="text-align:center;">
		<iframe src="https://www.zillow.com/webtools/widgets/RateTableDistributionWidget.htm" width="306" height="215" frameborder="0" scrolling="yes"></iframe>
		</div>
			<?php                                                                                                                                                                                                                 }
		if ( 'lg-affordability-calc' === $calculator_type ) { ?>

	  <iframe scrolling="yes" src="https://www.zillow.com/mortgage/widgets/AffordabilityCalculatorWidget.htm?inc=75000" width="688px" frameborder="0" height="700px"></iframe>

			<?php                                                                                                                                                                                                                   }
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
			'calculator_type' => '',
		));

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$calculator_type = ! empty( $instance['calculator_type'] ) ? $instance['calculator_type'] : '';

		// Form fields.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '" class="title_label">' . esc_attr__( 'Title:', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $title ) . '" class="widefat" placeholder="' . esc_attr__( 'Title', 're-pro' ) . '" value="' . esc_attr( $title ) . '">';
		echo '</p>';
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'calculator_type' ) ) . '" class="calculator_type_label">' . esc_attr__( 'Zillow Widget:', 're-pro' ) . '</label>';
		echo '	<select id="' . esc_attr( $this->get_field_id( 'calculator_type' ) ) . '" name="' . esc_attr( $this->get_field_name( 'calculator_type' ) ) . '" class="widefat">';
		echo '		<option value="lg-mortgage" ' . selected( $calculator_type, 'lg-mortgage', false ) . '> ' . esc_attr__( 'Large Mortgage Calculator', 're-pro' ) . '</option>';
		echo '		<option value="lg-mortgage-rate-table" ' . selected( $calculator_type, 'lg-mortgage-rate-table', false ) . '> ' . esc_attr__( 'Large Mortgage Rate Table', 're-pro' ) . '</option>';
			echo '		<option value="lg-affordability-calc" ' . selected( $calculator_type, 'lg-affordability-calc', false ) . '> ' . esc_attr__( 'Large Affordability Calculator', 're-pro' ) . '</option>';
		echo '	</select>';
		echo '	<span class="description">' . esc_attr__( 'Choose which Zillow widget you want to display.', 're-pro' ) . '</span>';
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
		$instance['calculator_type'] = ! empty( $new_instance['calculator_type'] ) ? strip_tags( $new_instance['calculator_type'] ) : '';
		return $instance;
	}
}


/**
 * register_zillow_widgets function.
 *
 * @access public
 * @return void
 */
function register_zillow_widgets() {

	register_widget( 'Zillow_Widgets' );
}
add_action( 'widgets_init', 'register_zillow_widgets' );
