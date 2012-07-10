<?php
/**
 * Elgg API Admin
 * 
 * @package ElggAPIAdmin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * 
 * Upgraded to Elgg 1.8 (tested on 1.8.6)
 * @author Federico Mestrone
 * @copyright Curverider Ltd 2011 and Moodsdesign Ltd 2012
 * @link http://www.elgg.org
*/

elgg_register_event_handler('init','system','apiadmin_init');

/**
 * Initialise the API Admin tool
 *
 * @param unknown_type $event
 * @param unknown_type $object_type
 * @param unknown_type $object
*/
function apiadmin_init($event, $object_type, $object = null) {
	// Add a page to the admin area
	elgg_register_admin_menu_item('administer', 'apiadmin', 'administer_utilities');

	// Hook into delete to revoke secret keys
	elgg_register_event_handler('delete', 'object', 'apiadmin_delete_key');

	// Register some actions
	$plugins = elgg_get_plugins_path();
	elgg_register_action('apiadmin/revokekey', $plugins . 'apiadmin/actions/revokekey.php', 'admin');
	elgg_register_action('apiadmin/generate', $plugins . 'apiadmin/actions/generate.php', 'admin');
	elgg_register_action('apiadmin/renamekey', $plugins . 'apiadmin/actions/renamekey.php', 'admin');
	elgg_register_action('apiadmin/regenerate', $plugins . 'apiadmin/actions/regenerate.php', 'admin');
}

/*
 * Event handler for when an API key is deleted
 */
function apiadmin_delete_key($event, $object_type, $object = null) {
	global $CONFIG;

	if ( ($object) && ($object->subtype === get_subtype_id('object', 'api_key')) ) {
		// Delete secret key
		return remove_api_user($CONFIG->site_id, $object->public);
	}

	return true;
}
