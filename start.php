<?php
/**
 * Elgg API Admin
 *
 * @package ElggAPIAdmin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider Ltd
 * @copyright Curverider Ltd 2008-2010
 */

elgg_register_event_handler('init', 'system', 'apiadmin_init');

/**
 * Initialize the web services API admin tool
 */
function apiadmin_init() {

	// Add a page to the admin area
	elgg_register_admin_menu_item('administer', 'apiadmin', 'administer_utilities');

	// Hook into delete to revoke secret keys
	elgg_register_event_handler('delete', 'object', 'apiadmin_delete_key');

	// Register some actions
	$plugins = elgg_get_plugins_path();
	elgg_register_action("apiadmin/revokekey", $plugins . "apiadmin/actions/revokekey.php", 'admin');
	elgg_register_action("apiadmin/generate", $plugins . "apiadmin/actions/generate.php", 'admiin');
}

function apiadmin_delete_key($event, $object_type, $object = null) {
	global $CONFIG;

	if (($object) && ($object->subtype === get_subtype_id('object', 'api_key'))) {
		// Delete
		return remove_api_user($CONFIG->site_id, $object->public);
	}

	return true;
}
