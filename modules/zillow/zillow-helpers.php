<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }


/**
 * Get Zillow Mandatory Disclaimer.
 * See http://www.zillow.com/howto/api/BrandingRequirements.htm.
 *
 * @access public
 * @return void
 */
function get_zillow_mandatory_disclaimer() {
	echo '<p class="zillow-disclaimer">';
	echo '<span>' . __( '© Zillow, Inc., 2006-', 're-pro') . date("Y") .'. Use is subject to <a href="https://www.zillow.com/corp/Terms.htm" title="'. __( 'Terms of Use', 're-pro') .'" target="_blank" rel="nofollow">'. __( 'Terms of Use', 're-pro') .'</a>.</span><br />
<span><a href="https://www.zillow.com/wikipages/What-is-a-Zestimate/" title="'. __( 'What\'s a Zestimate?', 're-pro') .'" target="_blank" rel="nofollow">'. __( 'What\'s a Zestimate?', 're-pro') .'</a></span>';
	echo '</p>';
}
