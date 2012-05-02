<?php
	/**
	 * Elgg API Admin
	 * 
	 * @package ElggAPIAdmin
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2010
	 * @link http://elgg.com/
	 * 
	 * Upgraded to Elgg 1.8.4
	 * @author Federico Mestrone
	 * @copyright Moodsdesign Ltd 2012
	 * @link http://www.moodsdesign.com
	 */

	/**
	 * Initialise the API Admin tool
	 *
	 * @param unknown_type $event
	 * @param unknown_type $object_type
	 * @param unknown_type $object
	 */
	function apiadmin_init($event, $object_type, $object = null) {
		
		global $CONFIG;
		
		// Register a page handler, so we can have nice URLs
		elgg_register_page_handler('apiadmin','apiadmin_page_handler');
		
		// Register some actions
		elgg_register_action("apiadmin/revokekey", $CONFIG->pluginspath . "apiadmin/actions/revokekey.php", 'admin');
		elgg_register_action("apiadmin/generate", $CONFIG->pluginspath . "apiadmin/actions/generate.php", 'admin');
	}
	
	/**
	 * Page setup. Adds admin controls to the admin panel.
	 *
	 */
	function apiadmin_pagesetup()
	{
		if ( elgg_get_context() == 'admin' && elgg_is_admin_logged_in() ) {
			global $CONFIG;
			elgg_register_menu_item('page', array(
				'name' => elgg_echo('admin:apiadmin'),
				'href' => 'apiadmin',
				'text' => elgg_echo('admin:apiadmin'),
				'context' => 'admin',
				'priority' => 999999,
				'section' => 'administer'
			));
	}
	
	
	function apiadmin_page_handler($page) 
	{
		global $CONFIG;
		
		if ($page[0])
		{
			switch ($page[0])
			{
  				case "generate":
 				  include($CONFIG->pluginspath . "apiadmin/actions/generate.php"); 
 				  break;
  				case "revokekey":
				  include($CONFIG->pluginspath . "apiadmin/actions/revokekey.php"); 
 				  break;
				default : //include($CONFIG->pluginspath . "apiadmin/index.php"); 
			}
		}
		
		include($CONFIG->pluginspath . "apiadmin/index.php"); 
	}
	
	function apiadmin_delete_key($event, $object_type, $object = null)
	{
		global $CONFIG;
		
		if (($object) && ($object->subtype === get_subtype_id('object', 'api_key')))
		{
			// Delete 
			return remove_api_user($CONFIG->site_id, $object->public);
		}
		
		return true;
	}
	
	
	// Make sure test_init is called on initialisation
	elgg_register_event_handler('init','system','apiadmin_init');
	elgg_register_event_handler('pagesetup','system','apiadmin_pagesetup');
	
	// Hook into delete to revoke secret keys
	elgg_register_event_handler('delete','object','apiadmin_delete_key');
?>