<?php
/**
 * Elgg API Admin
 * Web Services API Key page
 * 
 * @package ElggAPIAdmin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * 
 * @author Curverider Ltd
 * @copyright Curverider Ltd 2011
 * @link http://www.elgg.org
*/

// Display add form
echo elgg_view_form('apiadmin/generate');

// Display all current API keys
$list = elgg_list_entities(array(
	'types' => 'object',
	'subtypes' => 'api_key',
	'list_class' => 'mtl',
));

if ( $list ) {
    $log_label = elgg_echo('apiadmin:log:all');
    echo "<p><a href=\"{$CONFIG->url}admin/administer_utilities/apilog\">$log_label</a></p>";
    echo $list;
} else {
    $nokeys_label = elgg_echo('apiadmin:nokeys');
    echo "<p>$nokeys_label</p>";
}
