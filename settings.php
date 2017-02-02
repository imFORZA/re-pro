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
	 * Settings constructor.
	 */
	public function __construct() {
		if ( is_admin() ) {
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
		echo '<h1>' . esc_attr( 'IMPress Pro: Feeds', 'imforza' ) . '</h1>';

		settings_fields( 're_pro_settings' );
		do_settings_sections( 're_pro_general_settings' );
		submit_button();

		echo '</form>';
		echo '</div>';
	}
}

new REProSettings();
