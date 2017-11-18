<?php



/**
 * repro_user_profile_fields function.
 *
 * @access public
 * @param mixed $user User.
 * @return void
 */
function repro_user_profile_fields( $user ) {

	?>

	<h3>Real Estate Portal Profiles</h3>

	<table class="form-table">

		<tr>
			<th><label for="zillow-username">Zillow Username:</label></th>

			<td>
				<input type="text" name="zillow_username" id="zillow-username" value="<?php echo esc_attr( get_the_author_meta( 'zillow_username', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please provide your Zillow Username.</span>
			</td>
		</tr>

		<tr>
			<th><label for="trulia-username">Trulia Username:</label></th>

			<td>
				<input type="text" name="trulia_username" id="trulia-username" value="<?php echo esc_attr( get_the_author_meta( 'trulia_username', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please provide your Trulia Username.</span>
			</td>
		</tr>

		<tr>
			<th><label for="homescom-user-id">Homes.com User ID:</label></th>

			<td>
				<input type="text" name="homescom_user_id" id="homescom-user-id" value="<?php echo esc_attr( get_the_author_meta( 'homescom_user_id', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please provide your Homes.com User ID.</span>
			</td>
		</tr>


		<tr>
			<th><label for="realtorcom-url">Realtor.com Profile Url:</label></th>

			<td>
				<input type="text" name="realtorcom_url" id="realtorcom-url" value="<?php echo esc_attr( get_the_author_meta( 'realtorcom_url', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please provide your Realtor.com URL.</span>
			</td>
		</tr>

	</table>

	<?php

} // End repro_user_profile_fields.
add_action( 'show_user_profile', 'repro_user_profile_fields' );
add_action( 'edit_user_profile', 'repro_user_profile_fields' );

/**
 * repro_user_save_profile_fields function.
 *
 * @access public
 * @param mixed $user_id User ID.
 * @return void
 */
function repro_user_save_profile_fields( $user_id ) {

	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}

	update_user_meta( $user_id, 'zillow_username', $_POST['zillow_username'] );
	update_user_meta( $user_id, 'trulia_username', $_POST['trulia_username'] );
	update_user_meta( $user_id, 'homescom_user_id', $_POST['homescom_user_id'] );
	update_user_meta( $user_id, 'realtorcom_url', $_POST['realtorcom_url'] );

} // End repro_user_save_profile_fields.
add_action( 'personal_options_update', 'repro_user_save_profile_fields' );
add_action( 'edit_user_profile_update', 'repro_user_save_profile_fields' );

