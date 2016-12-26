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

include( 'widgets/class-sales-widget.php' );

include( 'widgets/class-listings-widget.php' );

include( 'widgets/class-contact-widget.php' );

include( 'widgets/class-mortgage-rate-widget.php' );

include( 'widgets/class-monthlypay-calc-widget.php' );

include( 'widgets/class-affordability-calc-widget.php' );

include( 'widgets/class-mortgage-rate-table-widget.php' );

include( 'widgets/class-mortgage-calc-widget.php' );

include('widgets/class-expensive-homes-widget.php');


include('widgets/class-zillow-badges-widget.php');
