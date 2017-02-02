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
			$this->general_settings = get_option('re_pro_settings');

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
		register_setting( 're_pro_settings', 're_pro_settings' );

		// Feeds.
		add_settings_section(
			're_pro_settings',
			__( 'General Settings', 're-pro' ),
			array( $this, 'general_callback' ),
			're_pro_general_settings'
		);

		add_settings_field(
			'google_maps',
			__( 'Google Maps Module', 're-pro' ),
			array( $this, 'google_maps' ),
			're_pro_general_settings',
			're_pro_settings'
		);

		// TODO: Coming soon.
		/*
		add_settings_field(
			'zillow',
			__( 'Zillow Module', 're-pro' ),
			array( $this, 'zillow_module' ),
			're_pro_general_settings',
			're_pro_settings'
		);

		add_settings_field(
			'sa_module',
			__( 'Street Advisor Module', 're-pro' ),
			array( $this, 'street_advisor' ),
			're_pro_general_settings',
			're_pro_settings'
		);
		*/
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

		$checked = checked( '1', $gmaps_active, false );
		$is_active = ( '1' === $gmaps_active ) ? 'Deactivate Google maps module?' : 'Activate Google maps module?';

		echo '<input style="vertical-align: top;" type="checkbox" name="re_pro_settings[gmaps_active]"' . esc_attr( $checked ) . ' value="1"> ';
		echo '<div style="display: inline-block;">';
		esc_attr_e( $is_active );
		echo '</div><br><br>';

		echo '<input class="widefat" type="password" name="re_pro_settings[gmaps_key]" placeholder="Google maps API key" value="' . $gmaps_key . '">';
		echo '<span class="description"> Enter your google maps javascript api key</span><br><br>';

		echo '<textarea style="width:500px;" rows="10" cols="50" name="re_pro_settings[gmaps_style]">';
		esc_attr_e( $gmaps_style );
		echo '</textarea>';
		echo '<br /><span class="description">Insert valid json to add custom style to maps. Json styles can be generated using <a target="_blank" href="https://snazzymaps.com/">Snazzy&nbsp;Maps</a> or the <a target="_blank" href="https://mapstyle.withgoogle.com/">Google&nbsp;Maps&nbsp;Styling&nbsp;Wizard</a></span>';
	}

	/**
	 * Render lux portfoluo field.
	 */
	public function zillow_module() {

	}

	/**
	 * Render mayfair field.
	 */
	public function street_advisor() {

	}

	/**
	 * Render full settings page.
	 */
	public function render_settings() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_attr( "You don't have access to this page", 'imforza' ) );
		}

		echo '<div class="wrap">';
		echo '<form method="post" action="options.php">';
		echo '<h1>' . esc_attr( 'Real Estate Pro', 'imforza' ) . '</h1>';

		settings_fields( 're_pro_settings' );
		do_settings_sections( 're_pro_general_settings' );
		submit_button();

		echo '</form>';
		echo '</div>';
	}
}

new REProSettings();
