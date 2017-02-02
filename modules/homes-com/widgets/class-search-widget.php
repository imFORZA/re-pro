<?php
/**
 * Homes.com Search Widget (http://www.homes.com/widget/medium-search/)
 *
 * @package RE-PRO
 */

	/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * HomesSearchWidget class.
 *
 * @extends WP_Widget
 */
class HomesSearchWidget extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'homes_search',
			__( 'Homes Search', 're-pro' ),
			array(
				'description' => __( 'Display a search box from Homes.com', 're-pro' ),
				'classname'   => 're-pro re-pro-widget homes-widget homes-search',
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
	 */
	public function widget( $args, $instance ) {

		$iframe_id = ! empty( $args['widget_id'] ) ? $args['widget_id'] : '';
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$location = ! empty( $instance['location'] ) ? $instance['location'] : '';
		$color = ! empty( $instance['color'] ) ? $instance['color'] : '';
		$sale = ! empty( $instance['sale'] ) ? $instance['sale'] : '';
		$rent = ! empty( $instance['rent'] ) ? $instance['rent'] : '';

		echo $args['before_widget'];

		echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];

		//$homes_widgets = new HomesWidgets();

		//$homes_widgets->get_home_values( $iframe_id, $location, $color, $sale, $rent );
		?>

<style>
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700);
.HOMES-medium-search-widget {
	font: 12px/1.5em 'Open Sans', Arial, sans-serif;
	color:#484848;
	padding: 7px 10px 10px;
	overflow: hidden;
	clear:both;
}
.HOMES-medium-search-widget::before,
.HOMES-medium-search-widget::after {
	content: '';
	display: table;
	width:100%;
	clear:both;
}
.HOMES-medium-search-widget h1 {
	color:#0054a0;
	margin:0;
	font-size:24px;
	line-height:1em;
	font-weight:700;
}
.HOMES-medium-search-widget .medium-search-frame {
	border:0;
	border-bottom: 1px solid #eeeae9;
	margin: 0 0 .5em;
	overflow: hidden;
	height: 16.5em;
}
.HOMES-medium-search-widget a {
	font-weight: 700;
	color:#0054a0;
	text-decoration:none;
	font-size:.75em;
	max-width:240px;
	-moz-box-sizing:border-box;
	box-sizing:border-box;
	overflow:hidden;
	white-space:nowrap;
	text-overflow:ellipsis;
}
.HOMES-medium-search-widget a:hover {
	text-decoration: underline;
}
.HOMES-medium-search-widget .logo {
	float:right;background: transparent url(http://cdn1.static-homes.com/media/portalimgcache/widget/builder/logo-widget.png) 0 0 no-repeat;
	width:139px;
	height: 22px;
	overflow: hidden;
	direction: ltr;
	text-indent: -3000px;
}
.HOMES-medium-search-widget .footer a {
	margin:0;
}
.HOMES-medium-search-widget .footer .link {
	max-width: 50%;
	display: block;
}
.HOMES-medium-search-widget .medium-search-frame {
	height: 16.5em;
}
</style>
<div class="HOMES-medium-search-widget">
	<h1>Search Homes</h1>
	<iframe src="http://www.homes.com/widget/medium-search/frame/?text_color=%230054a0&listing_status=FOR%20SALE%2CFOR%20RENT&cobrand=&location=Norfolk%2C%20VA" class="medium-search-frame" width="100%" seamless frameborder="0"></iframe>
	<a href="http://www.homes.com/widgets/" title="Homes.com" class="logo">
		Powered By Homes.com
	</a>
</div>

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
			'location' => '',
			'color' => '0054a0',
			'sale' => 1,
			'rent' => 1,
		) );

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$location = ! empty( $instance['location'] ) ? $instance['location'] : '';
		$color = ! empty( $instance['color'] ) ? $instance['color'] : '';
		$sale = ! empty( $instance['sale'] ) ? $instance['sale'] : '';
		$rent = ! empty( $instance['rent'] ) ? $instance['rent'] : '';

		if( empty( $sale ) && empty( $rent ) ) {
			$sale = 1;
			$rent = 1;
		}

		// Title.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title-label">' . __( 'Tile:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $title  . '" class="widefat">';
		echo '</p>';

		// Location.
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'location' ) . '" class="title-label">' . __( 'Location:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'location' ) . '" name="' . $this->get_field_name( 'location' ) . '" value="' . $location . '" class="widefat">';
		echo '</p>';

		// Color
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'color' ) . '" class="title-label">' . __( 'Color 1:', 're-pro' ) . '</label>';
		echo '	<input id="' . $this->get_field_id( 'color' ) . '" name="' . $this->get_field_name( 'color' ) . '" value="' . $color  . '" class="widefat">';
		echo '</p>';

		// Search Types
		echo '<p>';
		echo '<label for="search-type" class="search_type_label">' . __( 'Search Types:', 're-pro' ) . '</label>';
		echo '<br />';
		echo '<input value="1" type="checkbox"' . checked( $sale, 1, false ) . 'id="' . $this->get_field_id( 'sale' ) . '" name="' . $this->get_field_name( 'sale' )  . '" />';
		echo '<label for="' . $this->get_field_id( 'sale' ) . '">For Sale</label>';
		echo '<br />';
		echo '<input value="1" type="checkbox"' . checked( $rent, 1, false ) . 'id="' . $this->get_field_id( 'rent' ) . '" name="' . $this->get_field_name( 'rent' ) . '" />';
		echo '<label for="' . $this->get_field_id( 'rent' ) . '">For Rent</label>';
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
		$instance['location'] = ! empty( $new_instance['location'] ) ? strip_tags( $new_instance['location'] ) : '';
		$instance['color'] = ! empty( $new_instance['color'] ) ? strip_tags( $new_instance['color'] ) : '';
		$instance['sale'] = ! empty( $new_instance['sale'] ) ? strip_tags( $new_instance['sale'] ) : '';
		$instance['rent'] = ! empty( $new_instance['rent'] ) ? strip_tags( $new_instance['rent'] ) : '';

		return $instance;
	}
}

/**
 * Register Homes.com Featured Listings Widget.
 *
 * @access public
 * @return void
 */
function repro_homes_com_search() {
	if ( is_ssl() ) {
		echo 'This widget does not yet support SSL. Please contact homes.com asking them to support SSL for this widget.';
	} else {
		register_widget( 'HomesSearchWidget' );
	}
}
add_action( 'widgets_init', 'repro_homes_com_search' );
