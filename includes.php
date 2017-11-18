<?php
/**
 * Inlcude Plugin Dependencies.
 *
 * @package TemplatePlugin
 */

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }



// Google maps.
include_once( 'modules/google-maps/gmaps.php' );

// Equal Housing.
include_once( 'modules/equal-housing/equal-housing.php' );

// Zillow.
include_once( 'modules/zillow/zillow.php' );

include_once( 'modules/trulia/trulia.php' );

include_once( 'modules/inman/inman.php' );

include_once( 'modules/homes-com/homes-com.php' );


include_once( 'modules/streetadvisor/streetadvisor.php' );

include_once( 'modules/greatschools/greatschools.php' );

include_once( 'modules/homefinder/homefinder.php' );

include_once( 'modules/rentbits/rentbits.php' );


include_once( 'modules/users/class-user-roles.php' );
include_once( 'modules/users/class-user-fields.php' );

