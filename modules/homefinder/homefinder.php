<?php
/**
 * HomeFinder Module
 *
 * @package RE-PRO
 */

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

include( 'widgets/class-homefinder-widgets.php' );

// Homes for Sale Widget.
include( 'widgets/class-homes-for-sale-widget.php' );

// Open House Widget.
include( 'widgets/class-open-house-widget.php' );

// Foreclosure Homes Widget.
include( 'widgets/class-foreclosure-homes-widget.php' );

// Affiliate Search Widget.
include( 'widgets/class-affiliate-search-widget.php' );
