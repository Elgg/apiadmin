<?php
/**
 * Elgg API Admin
 * Upgraded to Elgg 1.8 (tested on 1.8.8) and added rename and regenerate actions
 * 
 * @package ElggAPIAdmin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * 
 * @author Curverider Ltd
 * @copyright Curverider Ltd 2011
 * @link http://www.elgg.org
*/

elgg_register_event_handler('init','system','apiadmin_init');

/**
 * Initialise the API Admin tool on init,system
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
	$plugindir = dirname(__FILE__);
	elgg_register_action('apiadmin/revokekey', $plugindir . '/actions/apiadmin/revokekey.php', 'admin');
	elgg_register_action('apiadmin/generate', $plugindir . '/actions/apiadmin/generate.php', 'admin');
	elgg_register_action('apiadmin/renamekey', $plugindir . '/actions/apiadmin/renamekey.php', 'admin');
	elgg_register_action('apiadmin/regenerate', $plugindir . '/actions/apiadmin/regenerate.php', 'admin');
}

/**
 * @param      $event
 * @param      $object_type
 * @param null $object
 *
 * @return bool
 */
function apiadmin_delete_key($event, $object_type, $object = null) {
	if (!elgg_instanceof($object, 'object', 'api_key')) {
		return true;
	}

	return remove_api_user(elgg_get_site_entity()->getGUID(), $object->public);
}
