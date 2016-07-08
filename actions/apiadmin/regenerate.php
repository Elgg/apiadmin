<?php
/**
 * Elgg API Admin
 * Implementation of the Regenerate Keys option on an API Key object
 *
 * @package   ElggAPIAdmin
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 *
 * @author    Moodsdesign Ltd
 * @copyright Moodsdesign Ltd 2012
 * @link      http://www.elgg.org
 */

$key = (int)get_input('keyid');
$obj = get_entity($key);

if (!elgg_instanceof($obj, 'object', 'api_key')) {
	register_error(elgg_echo('apiadmin:regenerationfail'));
	forward(REFERRER);
}

if (!remove_api_user(elgg_get_site_entity()->getGUID(), $obj->public)) {
	register_error(elgg_echo('apiadmin:regenerationfail'));
	forward(REFERRER);
}

$keypair = create_api_user(elgg_get_site_entity()->getGUID());

if (!$keypair) {
	register_error(elgg_echo('apiadmin:regenerationfail'));
	forward(REFERRER);
}

$obj->public = $keypair->api_key;

if (!$obj->save()) {
	register_error(elgg_echo('apiadmin:regenerationfail'));
} else {
	system_message(elgg_echo('apiadmin:regenerated'));
}

forward(REFERRER);
