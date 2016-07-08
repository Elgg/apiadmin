<?php
/**
 * Form to rename key
 */

/* @var \ElggEntity $entity */
$entity = $vars['entity'];

if (!($entity instanceof \ElggEntity) || $entity->getSubtype() !== 'api_key') {
	return true;
}

echo elgg_view_input('text', [
	'value' => $entity->title,
	'name' => 'newref'
]);

echo elgg_view_input('hidden', [
	'name' => 'keyid',
	'value' => $entity->getGUID()
]);

echo elgg_view_input('submit');
