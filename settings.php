<?php
/**
 * RE Pro Settings
 *
 * @package re-pro
 */

/**
 * REProSettings.
 */
class REProSettings {

	/**
	 * General settings.
	 *
	 * @var [Array]
	 */
	private $general_settings;

	/**
	 * Settings constructor.
	 */
	public function __construct() {
		if ( is_admin() ) {
			$this->general_settings = get_option( 'repro_settings' );

			add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
			add_action( 'admin_init', array( $this, 'settings_init' ) );
		}
	}

	/**
	 * Add admin menu.
	 */
	public function add_admin_menu() {
		add_options_page( __( 'Real Estate Pro' ), __( 'Real Estate Pro' ), 'manage_options', 're-pro-settings', array( $this, 'render_settings' ) );
	}

	/**
	 * Initialize settings fields and sections.
	 */
	public function settings_init() {
		register_setting( 'repro_settings', 'repro_settings' );

		// General Settings.
		add_settings_section(
			'repro_settings',
			__( 'General Settings', 're-pro' ),
			array( $this, 'general_callback' ),
			'repro_general_settings'
		);

		add_settings_field(
			'google_maps',
			__( 'Google Maps Module', 're-pro' ),
			array( $this, 'google_maps' ),
			'repro_general_settings',
			'repro_settings'
		);

		add_settings_field(
			'greatschools_apikey',
			__( 'Great Schools API Key', 're-pro' ),
			array( $this, 'greatschools_module' ),
			'repro_general_settings',
			'repro_settings'
		);

		add_settings_field(
			'zillow_apikey',
			__( 'Zillow API Key', 're-pro' ),
			array( $this, 'zillow_module' ),
			'repro_general_settings',
			'repro_settings'
		);

		add_settings_field(
			'sa_apikey',
			__( 'Street Advisor API Key', 're-pro' ),
			array( $this, 'street_advisor' ),
			'repro_general_settings',
			'repro_settings'
		);

	}

	/**
	 * Feed section callback.
	 */
	public function general_callback() {
		echo esc_attr( 'Activate the modules you would like to use.', 're-pro' );
	}

	/**
	 * Render Christies field.
	 */
	public function google_maps() {
		$gmaps_active = isset( $this->general_settings['gmaps_active'] ) ? $this->general_settings['gmaps_active'] : '0';
		$gmaps_key = isset( $this->general_settings['gmaps_key'] ) ? $this->general_settings['gmaps_key'] : '';
		$gmaps_style = isset( $this->general_settings['gmaps_style'] ) ? $this->general_settings['gmaps_style'] : '';
		$gmaps_zoom = isset( $this->general_settings['gmaps_zoom'] ) ? $this->general_settings['gmaps_zoom'] : '';

		$checked = checked( '1', $gmaps_active, false );
		$is_active = ( '1' === $gmaps_active ) ? 'Deactivate Google maps module?' : 'Activate Google maps module?';
		$disable_zoom = checked( '1', $gmaps_zoom, false );

		echo '<input style="vertical-align: top;" type="checkbox" name="repro_settings[gmaps_active]"' . esc_attr( $checked ) . ' value="1"> ';
		echo '<div style="display: inline-block;">';
		esc_attr_e( $is_active );
		echo '</div><br><br>';

		echo '<input class="widefat" type="password" name="repro_settings[gmaps_key]" placeholder="Google maps API key" value="' . $gmaps_key . '">';
		echo '<span class="description"> Enter your google maps javascript api key</span><br><br>';

		echo '<textarea style="width:500px;" rows="10" cols="50" name="repro_settings[gmaps_style]">';
		esc_attr_e( $gmaps_style );
		echo '</textarea>';
		echo '<br /><span class="description">Insert valid json to add custom style to maps. Json styles can be generated using <a target="_blank" href="https://snazzymaps.com/">Snazzy&nbsp;Maps</a> or the <a target="_blank" href="https://mapstyle.withgoogle.com/">Google&nbsp;Maps&nbsp;Styling&nbsp;Wizard</a></span><br><br>';

		echo '<input style="vertical-align: top;" type="checkbox" name="repro_settings[gmaps_zoom]"' . esc_attr( $disable_zoom ) . ' value="1"> ';
		echo '<div style="display: inline-block;">';
		echo 'Disable scroll zoom in Google Maps';
		echo '</div>';
	}


	public function zillow_module() {

		$zillow_apikey = isset( $this->general_settings['zillow_apikey'] ) ? $this->general_settings['zillow_apikey'] : '';

		echo '<input class="widefat" type="text" name="repro_settings[zillow_apikey]" placeholder="Zillow API Key" value="' . $zillow_apikey . '">';

	}

	public function street_advisor() {

		$sa_apikey = isset( $this->general_settings['sa_apikey'] ) ? $this->general_settings['sa_apikey'] : '';

		echo '<input class="widefat" type="text" name="repro_settings[sa_apikey]" placeholder="Street Advisor API Key" value="' . $sa_apikey . '">';

	}

	/**
	 * greatschools_module function.
	 *
	 * @access public
	 * @return void
	 */
	public function greatschools_module() {

		$greatschools_apikey = isset( $this->general_settings['greatschools_apikey'] ) ? $this->general_settings['greatschools_apikey'] : '';

		echo '<input class="widefat" type="text" name="repro_settings[greatschools_apikey]" placeholder="Great Schools API Key" value="' . $greatschools_apikey . '">';

	}

	/**
	 * Render full settings page.
	 */
	public function render_settings() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_attr( "You don't have access to this page", 're-pro' ) );
		}

		echo '<div class="wrap">';
		echo '<form method="post" action="options.php">';
		echo '<h1>' . esc_attr( 'Real Estate Pro', 're-pro' ) . '</h1>';

		settings_fields( 'repro_settings' );
		do_settings_sections( 'repro_general_settings' );
		submit_button();

		echo '</form>';
		echo '</div>';
	}
}

new REProSettings();
