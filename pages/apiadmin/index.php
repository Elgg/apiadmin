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

// Start Elgg Engine if necessary
//require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

admin_gatekeeper();
elgg_set_context('admin');

$limit = get_input('limit', 10);
$offset = get_input('offset', 0);

// Set admin user for user block
elgg_set_page_owner_guid($_SESSION['guid']);

$content = elgg_view_title(elgg_echo('admin:apiadmin'));

// Display add form
$content .= '<br />';
$content .= elgg_view('apiadmin/forms/add_key');

// List entities
elgg_set_context('search');
$content .= elgg_list_entities(array('types' => 'object', 'subtypes' => 'api_key'));
elgg_set_context('admin');

// Display main admin menu
$body = elgg_view_layout('admin', array('content' => $content));
echo elgg_view_page(elgg_echo('admin:apiadmin'), $body, 'admin');