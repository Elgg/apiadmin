<?php

global $CONFIG;

admin_gatekeeper();

$key = (int)get_input('keyid');

$obj = get_entity($key);

if ( $obj && ($obj instanceof ElggObject) && ($obj->subtype == get_subtype_id('object', 'api_key')) ) {
	if ( remove_api_user($CONFIG->site_id, $obj->public) ) {
		$keypair = create_api_user($CONFIG->site_id);
		if ( $keypair ) {
			$obj->public = $keypair->api_key;
		} else {
			register_error(elgg_echo('apiadmin:regenerationfail'));
		}
		if ( !$obj->save() ) {
			register_error(elgg_echo('apiadmin:regenerationfail'));
		} else {
			system_message(elgg_echo('apiadmin:regenerated'));
		}
	} else {
		register_error(elgg_echo('apiadmin:regenerationfail'));
	}
}

forward(REFERER);
