<?php
/**
 * ACF integration
 *
 * @package WordPress
 * @subpackage AztecWpDevEnv
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Integration\ACF;

use Aztec\Base;

/**
 * Add custom fields to about template.
 */
class ACF extends Base {

	/**
	 * Init on container
	 */
	public function init() {
		add_action( 'admin_menu', $this->callback( 'remove_admin_menu' ) );
	}

	/**
	 * Remove ACF admin menu in favour of hard-coded custom fields
	 */
	public function remove_admin_menu() {
		remove_menu_page( 'edit.php?post_type=acf-field-group' );
	}
}
