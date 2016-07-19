<?php
/**
 * Elgg API Admin
 * Implementation of a view for the "API Key" object type.
 * July 2012 : added javascript confirmation for revoke operation and added regeneration and rename operations
 *
 * @package   ElggAPIAdmin
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 *
 * @author    Curverider Ltd and Moodsdesign Ltd
 * @copyright Curverider Ltd 2011 and Moodsdesign Ltd 2012
 * @link      http://www.elgg.org
 */

$entity = $vars['entity'];

$public_label = elgg_echo('apiadmin:public');
$private_label = elgg_echo('apiadmin:private');

// revoke
$item = ElggMenuItem::factory([
	'name' => "revoke",
	'text' => elgg_view_icon('delete'),
	'title' => elgg_echo("apiadmin:revoke"),
	'confirm' => elgg_echo("apiadmin:revoke_prompt"),
	'href' => elgg_http_add_url_query_elements("action/apiadmin/revokekey", ['keyid' => $entity->getGUID()]),
	'item_class' => 'prm'
]);

elgg_register_menu_item('api_admin', $item);

// regenerate
$item = ElggMenuItem::factory([
	'name' => "regenerate",
	'text' => elgg_view_icon('refresh'),
	'title' => elgg_echo("apiadmin:regenerate"),
	'confirm' => elgg_echo("apiadmin:regenerate_prompt"),
	'href' => elgg_http_add_url_query_elements("action/apiadmin/regenerate", ['keyid' => $entity->getGUID()]),
	'item_class' => 'prm'
]);

elgg_register_menu_item('api_admin', $item);

// rename
$item = ElggMenuItem::factory([
	'name' => 'rename',
	'text' => elgg_view_icon('edit'),
	'title' => elgg_echo("apiadmin:rename"),
	'href' => '#edit-' . $entity->guid,
	'rel' => 'toggle'
]);

elgg_register_menu_item('api_admin', $item);


$title = $entity->title;
$title .= elgg_view_menu('api_admin', [
	'class' => 'elgg-menu-hz float-alt',
]);

$info = elgg_view_form("apiadmin/renamekey", [
	'class' => 'hidden',
	'id' => 'edit-' . $entity->getGUID()
], $vars);

$info .= "<p><b>$public_label:</b> {$entity->public}<br />";

// Only show secret portion to admins
if (elgg_is_admin_logged_in()) {
	// Fetch key
	$keypair = get_api_user(elgg_get_site_entity()->getGUID(), $entity->public);
	$info .= "<b>$private_label:</b> {$keypair->secret}<br />";
}

$info .= '</p>';


echo elgg_view_module('inline', $title, $info);