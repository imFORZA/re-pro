<?php
/**
 * Real Estate Pro
 *
 * @package re-pro
 */

/*
-------------------------------------------------------------------------------
	Plugin Name: Real Estate Pro
	Plugin URI: https://www.imforza.com
	Description: A WordPress plugin for Real Estate websites, offering tools such as widgets and badges. Built by <a href="https://www.imforza.com">imFORZA</a>.
	Version: 1.0.12
	Author: imFORZA
	Contributors: imforza, bhubbard, sfgarza, matoledo
	Text Domain: re-pro
	Author URI: https://www.imforza.com
	License: GPLv3 or later
	License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
------------------------------------------------------------------------------
*/

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Shared settings saved by the settings screen.
 *
 * @return array
 */
function repro_get_settings() {
	$settings = get_option( 'repro_settings' );
	return is_array( $settings ) ? $settings : array();
}

/**
 * One settings value, with a default when the option or key is missing.
 *
 * @param string $key     Setting key.
 * @param mixed  $default Default when the key is missing.
 * @return mixed
 */
function repro_setting( $key, $default = '' ) {
	$settings = repro_get_settings();
	return $settings[ $key ] ?? $default;
}

/**
 * Keep a color to a 3 or 6 digit hex value, without a leading hash.
 *
 * @param mixed $color Color.
 * @return string
 */
function repro_hex_color( $color ) {
	$color = ltrim( (string) $color, '#' );
	if ( preg_match( '/^[0-9a-fA-F]{3}$/', $color ) || preg_match( '/^[0-9a-fA-F]{6}$/', $color ) ) {
		return $color;
	}
	return '000000';
}

/**
 * Build an iframe URL.
 *
 * Query values are percent-encoded first so spaces survive esc_url().
 * Callers must escape the return value with esc_url().
 *
 * @param string $base URL before the query string.
 * @param array  $args Query arguments, in order.
 * @return string
 */
function repro_iframe_src( $base, $args = array() ) {
	$pairs = array();
	foreach ( $args as $key => $value ) {
		$pairs[] = rawurlencode( (string) $key ) . '=' . rawurlencode( (string) $value );
	}

	$url = $base;
	if ( ! empty( $pairs ) ) {
		$url .= '?' . implode( '&', $pairs );
	}

	return $url;
}

/**
 * Copy legacy Maps settings into repro_settings once.
 *
 * An existing repro_settings value is never overwritten. re_pro_settings is kept.
 *
 * @return void
 */
function repro_upgrade_settings() {
	if ( get_option( 'repro_settings_upgraded_1_0_12' ) ) {
		return;
	}

	$legacy   = get_option( 're_pro_settings' );
	$settings = get_option( 'repro_settings' );
	if ( ! is_array( $settings ) ) {
		$settings = array();
	}

	$copied = false;
	if ( is_array( $legacy ) ) {
		foreach ( array( 'gmaps_active', 'gmaps_key', 'gmaps_style' ) as $key ) {
			if ( array_key_exists( $key, $legacy ) && ! array_key_exists( $key, $settings ) ) {
				$settings[ $key ] = $legacy[ $key ];
				$copied           = true;
			}
		}
	}

	if ( $copied ) {
		update_option( 'repro_settings', $settings );
	}

	update_option( 'repro_settings_upgraded_1_0_12', '1' );
}

/** Instantiate the plugin. */
new RePro();
require_once( __DIR__ . '/settings.php' );


/**
 * RePro class.
 */
class RePro {

	/**
	 * Plugin settings.
	 *
	 * @var array
	 */
	private $general_settings = array();

	/**
	 * Constructor.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		/* Define Constants */
		define( 'REPRO_BASE_NAME', plugin_basename( __FILE__ ) );
		define( 'REPRO_BASE_DIR', plugin_dir_path( __FILE__ ) );
		define( 'REPRO_PLUGIN_FILE', REPRO_BASE_DIR . 're-pro.php' );

		/* Include dependencies */
		require_once( __DIR__ . '/includes.php' );

		$this->init();
	}


	/**
	 * Init.
	 *
	 * @access private
	 * @return void
	 */
	private function init() {
		repro_upgrade_settings();
		$this->general_settings = repro_get_settings();

		/* Language Support. */
		load_plugin_textdomain( 're-pro', false, dirname( REPRO_BASE_NAME ) . '/languages' );

		/* Plugin Activation/De-Activation. */
		register_activation_hook( REPRO_PLUGIN_FILE, array( $this, 'activate' ) );
		register_deactivation_hook( REPRO_PLUGIN_FILE, array( $this, 'deactivate' ) );

		/* Set menu page. */
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );

		/** Enqueue css and js files. */
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		add_action( 'wp_enqueue_scripts', 	 array( $this, 'widget_styles' ) );

		/* Add link to settings in plugins admin page. */
		add_filter( 'plugin_action_links_' . REPRO_BASE_NAME , array( $this, 'plugin_links' ) );

		add_filter( 'wpapi_google_map_data', array( $this, 'gmap_style' ), 1 );

		$this->init_modules();
	}

	private function init_modules() {
		$gmaps_key = $this->general_settings['gmaps_key'] ?? null;

		if ( isset( $this->general_settings['gmaps_active'] ) && isset( $gmaps_key ) ) {
			new WPAPI_GOOGLE_MAPS( $gmaps_key );
		}
	}

	public function gmap_style( $map_data ) {
		// Grab style option.
		$map_json = $this->general_settings['gmaps_style'] ?? '[]';

		// Validate JSON.
		json_decode( $map_json );
		$json_valid = json_last_error();

		// Set style to map_data.
		$map_data['style'] = ( $json_valid === JSON_ERROR_NONE ) ? $map_json : '[]';

		return $map_data;
	}

	/**
	 * Method that runs on admin_menu hook.
	 */
	public function admin_menu() {

	}

	/**
	 * Enqueue CSS.
	 */
	public function admin_scripts() {
		if ( ! is_admin() ) {
			wp_register_style( 're-pro', plugins_url( 'assets/css/re-pro-min.css', REPRO_PLUGIN_FILE ) );
			// wp_enqueue_style( 're-pro' );
		}
	}

	/**
	 * Register Widget CSS.
	 */
	public function widget_styles() {
		wp_register_style( 're-pro-widgets', plugins_url( 'assets/css/re-pro-widgets.min.css', REPRO_PLUGIN_FILE ) );
		wp_enqueue_style( 're-pro-widgets' );
	}

	/**
	 * Method that executes on plugin activation.
	 */
	public function activate() {
		flush_rewrite_rules();
	}

	/**
	 * Method that executes on plugin de-activation.
	 */
	public function deactivate() {
		flush_rewrite_rules();
	}

	/**
	 * Add Tools link on plugin page.
	 *
	 * @param  [Array] $links : Array of links on plugin page.
	 * @return [Array]        : Array of links on plugin page.
	 */
	public function plugin_links( $links ) {
		$settings_link = '<a href="options-general.php?page=re-pro-settings">Settings</a>';
		array_unshift( $links, $settings_link );
		return $links;
	}
}
