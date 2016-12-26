<?php

class homes_com extends WP_Widget {

	public function __construct() {

		parent::__construct(
			'homes-commute-time',
			__( 'Homes.com - Commute Time', 're-pro' ),
			array(
				'description' => __( 'Commute Time', 're-pro' ),
				'classname'   => 'homes-commute-time',
			)
		);

	}

	public function widget( $args, $instance ) {

		if ( is_ssl( site_url() ) ) {
			echo 'This widget does not yet support SSL. Please contact homes.com asking them support SSL for this widget.';
		} else {

	echo '<iframe src="http://www.homes.com/widget/commute-time/frame/?show_only_destination=NO&text_color=%230054a0&direction_link=%2FHomesCom%2FInclude%2FListingDetail%2FMap%2FPrintDirections%2Ecfm%3FstartAddress%3D%25%25source%5Faddress%25%25%26endAddress%3D%25%25destination%5Faddress%25%25&button_color=%23f7841b&cobrand=&source_address=&property_id=" class="commute-time-frame" width="100%" seamless frameborder="0"></iframe>';

	echo'<script src="http://www.homes.com/widget/commute-time/remote.js?show_only_destination=NO&text_color=%230054a0&direction_link=%2FHomesCom%2FInclude%2FListingDetail%2FMap%2FPrintDirections%2Ecfm%3FstartAddress%3D%25%25source%5Faddress%25%25%26endAddress%3D%25%25destination%5Faddress%25%25&button_color=%23f7841b&cobrand=&source_address=&property_id=" type="text/javascript"></script></div>';

	}

	}

	public function form( $instance ) {

		// Set default values
		$instance = wp_parse_args( (array) $instance, array(
			'repro_title' => '',
		) );

		// Retrieve an existing value from the database
		$repro_title = !empty( $instance['repro_title'] ) ? $instance['repro_title'] : '';

		// Form fields
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'repro_title' ) . '" class="repro_title_label">' . __( 'Title', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'repro_title' ) . '" name="' . $this->get_field_name( 'repro_title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 're-pro' ) . '" value="' . esc_attr( $repro_title ) . '">';
		echo '	<span class="description">' . __( 'Title', 're-pro' ) . '</span>';
		echo '</p>';

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['repro_title'] = !empty( $new_instance['repro_title'] ) ? strip_tags( $new_instance['repro_title'] ) : '';

		return $instance;

	}

}

function repro_register_homes_com_commute_widgets() {
	register_widget( 'homes_com' );
}
add_action( 'widgets_init', 'repro_register_homes_com_commute_widgets' );
