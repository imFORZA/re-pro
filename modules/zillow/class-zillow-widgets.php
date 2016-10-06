<?php
/**
 * Zillow Widgets
 *
 * @package idxFORZA
 */

/**
 * Idxforza_Zillow_Widgets class.
 *
 * @extends WP_Widget
 */
class Idxforza_Zillow_Widgets extends WP_Widget
{


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'idxforza-zillow-widgets',
			__( 'Zillow Widgets (idxFORZA)', 'idxforza' ),
			array(
				'description' => __( 'Zillow Mortgage Widgets', 'idxforza' ),
				'classname'   => 'idxforza-widget idxforza-widget-zillow',
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
		$idxforza_calculator_type = ! empty( $instance['idxforza_calculator_type'] ) ? $instance['idxforza_calculator_type'] : '';
		echo $args['before_widget'];
		echo $args['before_title'] . esc_attr( $idxforza_title ) . $args['after_title'];
		if ( 'lg-mortgage' === $idxforza_calculator_type ) {
		?>
		  <div class="idxforza idxforza-zillow-mortgage-calc-lg">
		<iframe scrolling="yes" src="https://www.zillow.com/mortgage/MortgageCalculatorWidgetLarge.htm?homePrice=200000" width="688px" frameborder="0" height="700px"></iframe>
		  </div>
		<?php
		}
		if ( 'lg-mortgage-rate-table' === $idxforza_calculator_type ) { ?>
		<div class="idxforza idxforza-zillow-mortgage-calc-lg" style="text-align:center;">
		<iframe src="https://www.zillow.com/webtools/widgets/RateTableDistributionWidget.htm" width="306" height="215" frameborder="0" scrolling="yes"></iframe>
		</div>
			<?php                                                                                                                                                                                                                 }
		if ( 'lg-affordability-calc' === $idxforza_calculator_type ) { ?>

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
			'idxforza_title' => '',
			'idxforza_calculator_type' => '',
		));

		// Retrieve an existing value from the database.
		$idxforza_title = ! empty( $instance['idxforza_title'] ) ? $instance['idxforza_title'] : '';
		$idxforza_calculator_type = ! empty( $instance['idxforza_calculator_type'] ) ? $instance['idxforza_calculator_type'] : '';

		// Form fields.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'idxforza_title' ) ) . '" class="idxforza_title_label">' . esc_attr__( 'Title:', 'idxforza' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $this->get_field_id( 'idxforza_title' ) ) . '" name="' . esc_attr( $idxforza_title ) . '" class="widefat" placeholder="' . esc_attr__( 'Title', 'idxforza' ) . '" value="' . esc_attr( $idxforza_title ) . '">';
		echo '</p>';
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'idxforza_calculator_type' ) ) . '" class="idxforza_calculator_type_label">' . esc_attr__( 'Zillow Widget:', 'idxforza' ) . '</label>';
		echo '	<select id="' . esc_attr( $this->get_field_id( 'idxforza_calculator_type' ) ) . '" name="' . esc_attr( $this->get_field_name( 'idxforza_calculator_type' ) ) . '" class="widefat">';
		echo '		<option value="lg-mortgage" ' . selected( $idxforza_calculator_type, 'lg-mortgage', false ) . '> ' . esc_attr__( 'Large Mortgage Calculator', 'idxforza' ) . '</option>';
		echo '		<option value="lg-mortgage-rate-table" ' . selected( $idxforza_calculator_type, 'lg-mortgage-rate-table', false ) . '> ' . esc_attr__( 'Large Mortgage Rate Table', 'idxforza' ) . '</option>';
			echo '		<option value="lg-affordability-calc" ' . selected( $idxforza_calculator_type, 'lg-affordability-calc', false ) . '> ' . esc_attr__( 'Large Affordability Calculator', 'idxforza' ) . '</option>';
		echo '	</select>';
		echo '	<span class="description">' . esc_attr__( 'Choose which Zillow widget you want to display.', 'idxforza' ) . '</span>';
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
		$instance['idxforza_calculator_type'] = ! empty( $new_instance['idxforza_calculator_type'] ) ? strip_tags( $new_instance['idxforza_calculator_type'] ) : '';
		return $instance;
	}
}


/**
 * Idxforza_register_zillow_widgets function.
 *
 * @access public
 * @return void
 */
function idxforza_register_zillow_widgets() {

	register_widget( 'Idxforza_Zillow_Widgets' );
}
add_action( 'widgets_init', 'idxforza_register_zillow_widgets' );
