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
	Version: 1.0.9
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

/** Instantiate the plugin. */
new RePro();
require_once( 'settings.php' );


/**
 * RePro class.
 */
class RePro {

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
		require_once( 'includes.php' );

		$this->init();
	}


	/**
	 * Init.
	 *
	 * @access private
	 * @return void
	 */
	private function init() {
		$this->general_settings = get_option( 're_pro_settings' );

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
		$gmaps_key = isset( $this->general_settings['gmaps_key'] ) ? $this->general_settings['gmaps_key'] : null;

		if ( isset( $this->general_settings['gmaps_active'] ) && isset( $gmaps_key ) ) {
			new WPAPI_GOOGLE_MAPS( $gmaps_key );
		}
	}

	public function gmap_style( $map_data ) {
		// Grab style option.
		$map_json = ( isset( $this->general_settings['gmaps_style'] ) ) ? $this->general_settings['gmaps_style'] : '[]';

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
