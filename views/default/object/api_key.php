<?php
global $CONFIG;

$entity = $vars['entity'];

$icon = elgg_view('graphics/icon', array(
		'entity' => $entity,
		'size' => 'small',
	)
);

$public_label = elgg_echo('apiadmin:public');
$private_label = elgg_echo('apiadmin:private');
$revoke_label = elgg_echo('apiadmin:revoke');

$ts = time();
$token = generate_action_token($ts);

$info  = "<div class=\"contentWrapper\">";
$info .= "<p><b>{$entity->title}</b> ";
$info .= "<a href=\"{$CONFIG->url}apiadmin/revokekey?keyid={$entity->guid}&__elgg_token=$token&__elgg_ts=$ts\">$revoke_label</a>";
$info .= "</p></div>";
$info .= "<div><p><b>$public_label:</b> {$entity->public}<br />";

if ( elgg_is_admin_logged_in() ) {
	// Only show secret portion to admins
	// Fetch key
	$keypair = get_api_user($CONFIG->site_id, $entity->public);
	$info .= "<b>$private_label:</b> {$keypair->secret}"; 
}
$info .= "</p></div>";

echo elgg_view_image_block($icon, $info);
