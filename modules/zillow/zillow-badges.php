<?php
/**
 * Zillow Badges
 *
 * @package RE-PRO
 *
 * Returns an array of available Zillow Badges
 * All badges can be found at https://www.zillow.com/webtools/badges/
 */

/* // Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) { exit; }


/**
 * The zillow_badges function.
 *
 * @access public
 * @return Array of Zillow Badges
 */
function zillow_badges() {

	return array(
	/* Premier Agent */
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
	 /* Featured */
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
	 /* View My Profile */
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
	 /* Feature My Listings - 160 x 40 */
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
