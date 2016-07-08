<?php
/**
 * Elgg API Admin
 * Implementation of the Change Reference option on an API Key object
 *
 * @package   ElggAPIAdmin
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 *
 * @author    Moodsdesign Ltd
 * @copyright Moodsdesign Ltd 2012
 * @link      http://www.elgg.org
 */

$key = (int)get_input('keyid');
$ref = get_input('newref');
$obj = get_entity($key);

if (!elgg_instanceof($obj, 'object', 'api_key')) {
	register_error(elgg_echo('apiadmin:refnotrenamed'));
	forward(REFERRER);
}

$obj->title = $ref;
if ($obj->save()) {
	system_message(elgg_echo('apiadmin:refrenamed'));
} else {
	register_error(elgg_echo('apiadmin:refnotrenamed'));
}

forward(REFERER);
