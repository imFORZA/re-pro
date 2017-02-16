<?php
/**
 * Inlcude Plugin Dependencies.
 *
 * @package TemplatePlugin
 */

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }



// Google maps.
require_once( 'modules/google-maps/gmaps.php' );

// Equal Housing.
require_once( 'modules/equal-housing/equal-housing.php' );

// Zillow.
require_once( 'modules/zillow/zillow.php' );

require_once( 'modules/trulia/trulia.php' );

require_once( 'modules/inman/inman.php' );

require_once( 'modules/homes-com/homes-com.php' );


require_once( 'modules/streetadvisor/streetadvisor.php' );

require_once( 'modules/greatschools/greatschools.php' );

require_once( 'modules/homefinder/homefinder.php' );

require_once( 'modules/rentbits/rentbits.php' );
