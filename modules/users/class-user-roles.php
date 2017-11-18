<?php
/**
 * User roles.
 *
 * @package re-pro
 */

 /** Instantiate the plugin. */
 new ReProUserRoles();


 /**
  * ReProUserRoles class.
  */
 class ReProUserRoles {

 	/**
 	 * Plugin Constructor.
 	 */
 	public function __construct() {
 		$this->add_roles();
 	}


	/**
	 * add_roles function.
	 *
	 * @access private
	 * @return void
	 */
	private function add_roles(){

		// Add Lead.
		add_role(
			'lead', __(
				'Lead'
			),
			array(
				'read'              => true,  // Allows a user to read.
				'create_posts'      => false, // Allows user to create new posts.
				'edit_posts'        => false, // Allows user to edit their own posts.
				'edit_others_posts' => false, // Allows user to edit others posts too.
				'publish_posts'     => false, // Allows the user to publish posts.
				'manage_categories' => false, // Allows user to manage post categories.
			)
		);


	}


}
