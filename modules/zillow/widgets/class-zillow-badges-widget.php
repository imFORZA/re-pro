<?php
/**
 * Zillow Badges (http://www.zillow.com/webtools/badges/)
 *
 * @package idxFORZA
 */

/**
 * Zillow_Badges class.
 *
 * @extends WP_Widget
 */
class Zillow_Badges extends WP_Widget {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct(
			'zillow-badges',
			__( 'Zillow Badge', 're-pro' ),
			array(
				'description' => __( 'Display a Zillow Badge which links to an agent profile page.', 're-pro' ),
				'classname'   => 'widget widget-zillow-badge',
			)
		);

	}

/**
 * The zillow_badges function.
 *
 * @access public
 * @return Array of Zillow Badges
 */
public function zillow_badges() {

	return array(
	/* Premier Agent. */
	 array(
		 'id' => 'premier-agent',
		 'name' => __( 'Zillow Premier Agent', 're-pro' ),
		 'alt' => __( 'Zillow Premier Agent', 're-pro' ),
		 'title' => __( 'Zillow Premier Agent', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/premier-agent.png',
		 'width' => 100,
		 'height' => 74,
	 ),
	 /* Featured .*/
	 array(
		 'id' => 'feature-badge-sm',
		 'name' => __( 'Featured on Zillow - Small', 're-pro' ),
		 'alt' => __( 'Featured on Zillow', 're-pro' ),
		 'title' => __( 'Featured on Zillow', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/feature_badge_sm.png',
		 'width' => 100,
		 'height' => 74,
	 ),
	 array(
		 'id' => 'feature-badge-lg',
		 'name' => __( 'Featured on Zillow - Large', 're-pro' ),
		 'alt' => __( 'Featured on Zillow', 're-pro' ),
		 'title' => __( 'Featured on Zillow', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/feature_badge_lg.png',
		 'width' => 100,
		 'height' => 74,
	 ),
	 /* View My Profile. */
	 array(
		 'id' => 'view-my-profile',
		 'name' => __( 'View my Profile', 're-pro' ),
		 'alt' => __( 'View my Profile', 're-pro' ),
		 'title' => __( 'View my Profile', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/bdg_profile.gif',
		 'width' => 160,
		 'height' => 40,
	 ),
	 /* Feature My Listings - 160 x 40. */
	 array(
		 'id' => 'my-listing-bllg',
		 'name' => __( 'Feature My Listings 1', 're-pro' ),
		 'alt' => __( 'I feature my listings on Zillow', 're-pro' ),
		 'title' => __( 'I feature my listings on Zillow', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/zillow-my-listing_bllg.gif',
		 'width' => 160,
		 'height' => 40,
	 ),
	 array(
		 'id' => 'my-listing-trlg',
		 'name' => __( 'Feature My Listings 2', 're-pro' ),
		 'alt' => __( 'I feature my listings on Zillow', 're-pro' ),
		 'title' => __( 'I feature my listings on Zillow', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/zillow-my-listing_trlg.gif',
		 'width' => 160,
		 'height' => 40,
	 ),
	 array(
		 'id' => 'my-listing-grlg',
		 'name' => __( 'Feature My Listings 3', 're-pro' ),
		 'alt' => __( 'I feature my listings on Zillow', 're-pro' ),
		 'title' => __( 'I feature my listings on Zillow', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/zillow-my-listing_grlg.gif',
		 'width' => 160,
		 'height' => 40,
	 ),
	 /* ZILLOW ADDICT - 160 x 40 */
	 array(
		 'id' => 'addict-bllg',
		 'name' => __( 'Zillow Addict 1 (160X40)', 're-pro' ),
		 'alt' => __( 'Zillow Addict', 're-pro' ),
		 'title' => __( 'Zillow Addict', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/zillow-addict_bllg.gif',
		 'width' => 160,
		 'height' => 40,
	 ),
	 array(
		 'id' => 'addict-trlg',
		 'name' => __( 'Zillow Addict 2 (160X40)', 're-pro' ),
		 'alt' => __( 'Zillow Addict', 're-pro' ),
		 'title' => __( 'Zillow Addict', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/zillow-addict_trlg.png',
		 'width' => 160,
		 'height' => 40,
	 ),
	 array(
		 'id' => 'addict-grlg',
		 'name' => __( 'Zillow Addict 3 (160X40)', 're-pro' ),
		 'alt' => __( 'Zillow Addict', 're-pro' ),
		 'title' => __( 'Zillow Addict', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/zillow-addict_grlg.gif',
		 'width' => 160,
		 'height' => 40,
	 ),
	 /* ZILLOW ADDICT - 100 x 40 */
	 array(
		 'id' => 'addict-blsm',
		 'name' => __( 'Zillow Addict 1 (100X40)', 're-pro' ),
		 'alt' => __( 'Zillow Addict', 're-pro' ),
		 'title' => __( 'Zillow Addict', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/zillow-addict_blsm.gif',
		 'width' => 100,
		 'height' => 40,
	 ),
	 array(
		 'id' => 'addict-trsm',
		 'name' => __( 'Zillow Addict 2 (100X40)', 're-pro' ),
		 'alt' => __( 'Zillow Addict', 're-pro' ),
		 'title' => __( 'Zillow Addict', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/zillow-addict_trsm.png',
		 'width' => 100,
		 'height' => 40,
	 ),
	 array(
		 'id' => 'addict-grsm',
		 'name' => __( 'Zillow Addict 3 (100X40)', 're-pro' ),
		 'alt' => __( 'Zillow Addict', 're-pro' ),
		 'title' => __( 'Zillow Addict', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/zillow-addict_grsm.gif',
		 'width' => 100,
		 'height' => 40,
	 ),
	 /* REAL ESTATE FANATIC - 160 x 40 */
	 array(
		 'id' => 'fanatic-bllg',
		 'name' => __( 'Real Estate Fanatic 1 (160X40)', 're-pro' ),
		 'alt' => __( 'Real Estate Fanatic', 're-pro' ),
		 'title' => __( 'Real Estate Fanatic', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/zillow-fanatic_bllg.gif',
		 'width' => 160,
		 'height' => 40,
	 ),
	 array(
		 'id' => 'fanatic-trlg',
		 'name' => __( 'Real Estate Fanatic 2 (160X40)', 're-pro' ),
		 'alt' => __( 'Real Estate Fanatic', 're-pro' ),
		 'title' => __( 'Real Estate Fanatic', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/zillow-fanatic_trlg.gif',
		 'width' => 160,
		 'height' => 40,
	 ),
	 array(
		 'id' => 'fanatic-grlg',
		 'name' => __( 'Real Estate Fanatic 3 (160X40)', 're-pro' ),
		 'alt' => __( 'Real Estate Fanatic', 're-pro' ),
		 'title' => __( 'Real Estate Fanatic', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/zillow-fanatic_grlg.gif',
		 'width' => 160,
		 'height' => 40,
	 ),
	 /* REAL ESTATE FANATIC - 120X40 */
	 array(
		 'id' => 'fanatic-blsm',
		 'name' => __( 'Real Estate Fanatic 1 (120X40)', 're-pro' ),
		 'alt' => __( 'Real Estate Fanatic', 're-pro' ),
		 'title' => __( 'Real Estate Fanatic', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/zillow-fanatic_blsm.gif',
		 'width' => 120,
		 'height' => 40,
	 ),
	 array(
		 'id' => 'fanatic-trsm',
		 'name' => __( 'Real Estate Fanatic 2 (120X40)', 're-pro' ),
		 'alt' => __( 'Real Estate Fanatic', 're-pro' ),
		 'title' => __( 'Real Estate Fanatic', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/zillow-fanatic_trsm.gif',
		 'width' => 120,
		 'height' => 40,
	 ),
	 array(
		 'id' => 'fanatic-grsm',
		 'name' => __( 'Real Estate Fanatic 3 (120X40)', 're-pro' ),
		 'alt' => __( 'Real Estate Fanatic', 're-pro' ),
		 'title' => __( 'Real Estate Fanatic', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/zillow-fanatic_grsm.gif',
		 'width' => 120,
		 'height' => 40,
	 ),
	 /* Dig Influencer */
	 array(
		 'id' => 'dig-square-influencer',
		 'name' => __( 'Dig Influencer Square', 're-pro' ),
		 'alt' => __( 'Dig Influencer', 're-pro' ),
		 'title' => __( 'Dig Influencer', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/square-influencer.png',
		 'width' => 72,
		 'height' => 72,
	 ),
	 array(
		 'id' => 'dig-rectangle-influencer',
		 'name' => __( 'Dig Rectangle Influencer', 're-pro' ),
		 'alt' => __( 'Dig Influencer', 're-pro' ),
		 'title' => __( 'Dig Influencer', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/rectangle-influencer.png',
		 'width' => 109,
		 'height' => 35,
	 ),
	 array(
		 'id' => 'dig-square-pro',
		 'name' => __( 'Dig Square Pro', 're-pro' ),
		 'alt' => __( 'Dig Influencer', 're-pro' ),
		 'title' => __( 'Dig Influencer', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/square-pro.png',
		 'width' => 72,
		 'height' => 72,
	 ),
	 array(
		 'id' => 'dig-rectangle-pro',
		 'name' => __( 'Dig Rectangle Pro', 're-pro' ),
		 'alt' => __( 'Dig Influencer', 're-pro' ),
		 'title' => __( 'Dig Influencer', 're-pro' ),
		 'class' => 'zillow-badge',
		 'url' => 'https://www.zillowstatic.com/static/images/badges/rectangle-pro.png',
		 'width' => 109,
		 'height' => 35,
	 ),
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

		// Retrieve any existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$zid = ! empty( $instance['zid'] ) ? $instance['zid'] : '';
		$badge_name = ! empty( $instance['badge_name'] ) ? $instance['badge_name'] : '';
		$badge_alignment = ! empty( $instance['badge_alignment'] ) ? $instance['badge_alignment'] : '';

		$zillow_badges = $this->zillow_badges();

			echo $args['before_widget'];

			echo $args['before_title']  . esc_attr( $title )  . $args['after_title'] ;

		foreach ( $zillow_badges as $zillow_badge ) {
			if ( $badge_name === $zillow_badge['id'] ) {

					echo '<a href="https://www.zillow.com/profile/'. $zid .'" ><img id="zillow-'. esc_attr( $zillow_badge['id'] ) .'-badge" class="'. sanitize_html_class( $zillow_badge['class'] ) . ' ' . sanitize_html_class( $badge_alignment ) .'" src="' . esc_url( apply_filters( 'jetpack_photon_url', $zillow_badge['url'] ) ) . '" alt="'. esc_attr( $zillow_badge['alt'] ) . '"  height="'. esc_attr( $zillow_badge['height'] ) .'" width="'. esc_attr( $zillow_badge['width'] ) .'" title="'. esc_attr( $zillow_badge['alt'] ) .'" /></a>';

			}
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
			'zid' => '',
			'badge_name' => '',
			'badge_alignment' => '',
		));

		// Retrieve an existing value from the database.
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$zid = ! empty( $instance['zid'] ) ? $instance['zid'] : '';
		$badge_name = ! empty( $instance['badge_name'] ) ? $instance['badge_name'] : '';
		$badge_alignment = ! empty( $instance['badge_alignment'] ) ? $instance['badge_alignment'] : '';

		$zillow_badges = $this->zillow_badges();

		// Form fields.
		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '" class="title_label">' . esc_attr( 'Title', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" class="widefat" placeholder="' . esc_attr__( 'Find me on Zillow', 're-pro' ) . '" value="' . esc_attr( $title ) . '">';
		echo '	<span class="description">' . esc_attr( 'Add a title to your zillow badge.', 're-pro' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'zid' ) ) . '" class="zid_label">' . esc_attr( 'Zillow User ID', 're-pro' ) . '</label>';
		echo '	<input type="text" id="' . esc_attr( $this->get_field_id( 'zid' ) ) . '" name="' . esc_attr( $this->get_field_name( 'zid' ) ) . '" class="widefat" placeholder="' . esc_attr__( 'ZID', 're-pro' ) . '" value="' . esc_attr( $zid ) . '">';
		echo '	<span class="description">' . esc_attr( 'Please provide your Zillow User ID.', 're-pro' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'badge_name' ) ) . '" class="badge_name_label">' . esc_attr( 'Badge Type', 're-pro' ) . '</label><br />';
		echo '	<select id="' . esc_attr( $this->get_field_id( 'badge_name' ) ) . '" name="' . esc_attr( $this->get_field_name( 'badge_name' ) ) . '" class="widefat">';
		echo ' <option value="" '. selected( $badge_name, '', false ) .'>'. esc_attr( 'Choose', 're-pro' ) .'</option>';
		foreach ( $zillow_badges as $zillow_badge ) {
			echo '<option value="'. esc_attr( $zillow_badge['id'] ) .'" ' . selected( $badge_name, $zillow_badge['id'], false ) . '> ' . esc_attr( $zillow_badge['name'] ) . '</option>';
		}

		echo '</select>';
		echo '<span class="description">' . __( 'Choose a badge type from the dropdown. Click Save to preview the badge. Full list of badges can be found on <a href="http://www.zillow.com/webtools/badges/" target="_blank" rel="nofollow">Zillow</a>.', 're-pro' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . esc_attr( $this->get_field_id( 'badge_alignment' ) ) . '" class="badge_alignment_label">' . esc_attr_e( 'Badge Alignment', 're-pro' ) . '</label>';
		echo '	<select id="' . esc_attr( $this->get_field_id( 'badge_alignment' ) ) . '" name="' . esc_attr( $this->get_field_name( 'badge_alignment' ) ) . '" class="widefat">';
		echo '		<option value="alignleft" ' . selected( $badge_alignment, 'alignleft', false ) . '> ' . esc_attr( 'Left', 're-pro' ) . '</option>';
		echo '		<option value="aligncenter" ' . selected( $badge_alignment, 'aligncenter', false ) . '> ' . esc_attr( 'Center', 're-pro' ) . '</option>';
		echo '		<option value="alignright" ' . selected( $badge_alignment, 'alignright', false ) . '> ' . esc_attr( 'Right', 're-pro' ) . '</option>';
		echo '	</select>';
		echo '	<span class="description">' . esc_attr( 'Choose how to align your badge within the widget space.', 're-pro' ) . '</span>';
		echo '</p>';

	}

	/**
	 * Update function.
	 *
	 * @access public
	 * @param mixed $new_instance New instance.
	 * @param mixed $old_instance Old Instance.
	 * @return $instance Instance.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['badge_name'] = ! empty( $new_instance['badge_name'] ) ? strip_tags( $new_instance['badge_name'] ) : '';
		$instance['badge_alignment'] = ! empty( $new_instance['badge_alignment'] ) ? strip_tags( $new_instance['badge_alignment'] ) : '';

		$instance['zid'] = ! empty( $new_instance['zid'] ) ? strip_tags( $new_instance['zid'] ) : '';

		return $instance;

	}
}

/**
 * register_zillow_badge_widgets function.
 *
 * @access public
 * @return void
 */
function register_zillow_badge_widgets() {

	register_widget( 'Zillow_Badges' );
}
add_action( 'widgets_init', 'register_zillow_badge_widgets' );
