<?php
/**
 * Zillow Module
 *
 * @package RE-PRO
 */

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

include( 'widgets/class-zillow-widgets.php' );

// Include Review Widget.
include( 'widgets/class-review-widget.php' );

// Include Badges Widget
include('widgets/class-zillow-badges-widget.php');

// Include Large Search Box Widget.
include('widgets/class-large-search-box.php');

// Include Listings Widgets.
include('widgets/class-expensive-homes-widget.php');
include('widgets/class-newest-homes-widget.php');

// Widgets no longer supported
/*include( 'widgets/class-sales-widget.php' );

include( 'widgets/class-listings-widget.php' );

include( 'widgets/class-contact-widget.php' );

include( 'widgets/class-mortgage-rate-widget.php' );

include( 'widgets/class-monthlypay-calc-widget.php' );

include( 'widgets/class-affordability-calc-widget.php' );

include( 'widgets/class-mortgage-rate-table-widget.php' );

include( 'widgets/class-mortgage-calc-widget.php' );*/
