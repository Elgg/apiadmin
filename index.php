<?php
/**
 * Elgg API Admin
 * @link http://elgg.org/
 */

require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

admin_gatekeeper();
elgg_set_context('admin');
	
$limit = get_input('limit', 10);
$offset = get_input('offset', 0);
	
// Set admin user for user block
elgg_set_page_owner_guid($_SESSION['guid']);
	
$title = elgg_view_title(elgg_echo('apiadmin'));
	
// Display add form
$body .= elgg_view('apiadmin/forms/add_key');
	
// List entities
elgg_push_context('search');

$body .= elgg_list_entities(array(
        'types' => 'object',
        'subtypes' => 'api_key',
    ));

elgg_pop_context();

// Display main admin menu
echo elgg_view_page(elgg_echo('apitest'), elgg_view_layout("one_column_with_sidebar", $title . $body));
