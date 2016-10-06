<?php
/**
 * Trulia Badges
 *
 * @package RE-PRO
 *
 * Returns an array of available Trulia Badges
 * All badges can be found at http://www.trulia.com/tools/badge/
 */

/* // Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * The trulia_badges function.
 *
 * @access public
 * @return Array of Trulia Badges
 */
function trulia_badges() {

	return array(
	/* Style 1 */
	 array(
		 'id' => 'truila-btn-1-green',
		 'name' => __( 'Trulia Button - Green (96x40)', 're-pro' ),
		 'alt' => __( 'Trulia', 're-pro' ),
		 'title' => __( 'Trulia', 're-pro' ),
		 'class' => 'trulia-badge',
		 'url' => 'https://static.trulia-cdn.com/images/buttons/trulia_button_v01_green.gif',
		 'width' => 96,
		 'height' => 40,
	 ),
	 array(
		 'id' => 'truila-btn-1-white',
		 'name' => __( 'Trulia Button - White (96x40)', 're-pro' ),
		 'alt' => __( 'Trulia', 're-pro' ),
		 'title' => __( 'Trulia', 're-pro' ),
		 'class' => 'trulia-badge',
		 'url' => 'https://static.trulia-cdn.com/images/buttons/trulia_button_v01_white.gif',
		 'width' => 96,
		 'height' => 40,
	 ),
	 array(
		 'id' => 'truila-btn-1-white-green',
		 'name' => __( 'Trulia Button - White/Green (96x40)', 're-pro' ),
		 'alt' => __( 'Trulia', 're-pro' ),
		 'title' => __( 'Trulia', 're-pro' ),
		 'class' => 'trulia-badge',
		 'url' => 'https://static.trulia-cdn.com/images/buttons/trulia_button_v01_white_green.gif',
		 'width' => 96,
		 'height' => 40,
	 ),
		/* Style 2 */
		array(
			'id' => 'truila-btn-2-green',
			'name' => __( 'Trulia Button 2 - Green (87x33)', 're-pro' ),
			'alt' => __( 'Trulia', 're-pro' ),
			'title' => __( 'Trulia', 're-pro' ),
			'class' => 'trulia-badge',
			'url' => 'https://static.trulia-cdn.com/images/buttons/trulia_button_v02_green.gif',
			'width' => 87,
			'height' => 33,
		),
		array(
			'id' => 'truila-btn-2-white',
			'name' => __( 'Trulia Button 2 - White (87x33)', 're-pro' ),
			'alt' => __( 'Trulia', 're-pro' ),
			'title' => __( 'Trulia', 're-pro' ),
			'class' => 'trulia-badge',
			'url' => 'https://static.trulia-cdn.com/images/buttons/trulia_button_v02_white.gif',
			'width' => 87,
			'height' => 33,
		),
		array(
			'id' => 'truila-btn-2-white-green',
			'name' => __( 'Trulia Button 2 - White/Green (87x33)', 're-pro' ),
			'alt' => __( 'Trulia', 're-pro' ),
			'title' => __( 'Trulia', 're-pro' ),
			'class' => 'trulia-badge',
			'url' => 'https://static.trulia-cdn.com/images/buttons/trulia_button_v02_white_green.gif',
			'width' => 87,
			'height' => 33,
		),
		/* Style 3 */
		array(
			'id' => 'truila-btn-3-green',
			'name' => __( 'Trulia Button 3 - Green (120x54)', 're-pro' ),
			'alt' => __( 'Trulia', 're-pro' ),
			'title' => __( 'Trulia', 're-pro' ),
			'class' => 'trulia-badge',
			'url' => 'https://static.trulia-cdn.com/images/buttons/trulia_button_v03_green.gif',
			'width' => 120,
			'height' => 54,
		),
		array(
			'id' => 'truila-btn-3-white',
			'name' => __( 'Trulia Button 3 - White (120x54)', 're-pro' ),
			'alt' => __( 'Trulia', 're-pro' ),
			'title' => __( 'Trulia', 're-pro' ),
			'class' => 'trulia-badge',
			'url' => 'https://static.trulia-cdn.com/images/buttons/trulia_button_v03_white.gif',
			'width' => 120,
			'height' => 54,
		),
		array(
			'id' => 'truila-btn-3-white-green',
			'name' => __( 'Trulia Button 3 - White/Green (120x54)', 're-pro' ),
			'alt' => __( 'Trulia', 're-pro' ),
			'title' => __( 'Trulia', 're-pro' ),
			'class' => 'trulia-badge',
			'url' => 'https://static.trulia-cdn.com/images/buttons/trulia_button_v03_white_green.gif',
			'width' => 120,
			'height' => 54,
		),
	);
}
