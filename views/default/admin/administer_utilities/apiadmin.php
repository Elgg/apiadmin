<?php
/**
 * Web services API key page
 */

// Display add form
echo elgg_view('apiadmin/forms/add_key');

echo elgg_list_entities(array(
	'types' => 'object',
	'subtypes' => 'api_key',
	'list_class' => 'mtl',
));
