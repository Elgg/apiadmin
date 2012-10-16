<?php
/**
 * Elgg API Admin
 * English text for the API Admin plug-in
 * 
 * @package ElggAPIAdmin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * 
 * @author Curverider Ltd and Moodsdesign Ltd
 * @copyright Curverider Ltd 2011 and Moodsdesign Ltd 2012
 * @link http://www.elgg.org
*/

$english = array(
	'admin:administer_utilities:apiadmin' => 'API Key Admin',
    'admin:administer_utilities:apistats' => 'API Key Stats',

	'apiadmin:refrenamed' => 'API Reference changed',
	'apiadmin:refnotrenamed' => 'API Reference could not be changed',
	'apiadmin:keyrevoked' => 'API Key revoked',
	'apiadmin:keynotrevoked' => 'API Key could not be revoked',
	'apiadmin:generated' => 'New API keypair generated successfully',
	'apiadmin:generationfail' => 'There was a problem generating the new keypair',
	'apiadmin:regenerated' => 'API Key successfully regenerated',
	'apiadmin:regenerationfail' => 'There was a problem regenerating the keys',
	'apiadmin:noreference' => 'You must provide a reference for your new key.',

	'apiadmin:yourref' => 'Your reference',
	'apiadmin:generate' => 'Generate a new keypair',
	'apiadmin:rename_prompt' => 'Enter your new reference for the key:',
	'apiadmin:revoke_prompt' => 'Are you sure you want to revoke these keys?',
	'apiadmin:regenerate_prompt' => 'Are you sure you want to regenerate these keys?',
    'apiadmin:stats:all' => 'View stats for all keys',
    'apiadmin:nokeys' => 'There are no registered api keys at the moment.',
	
	'apiadmin:revoke' => 'Revoke keys',
	'apiadmin:rename' => 'Change reference',
	'apiadmin:regenerate' => 'Regenerate keys',
    'apiadmin:stats' => 'View stats',

	'apiadmin:public' => 'Public',
	'apiadmin:private' => 'Private',

    'apiadmin:settings:enable_stats' => 'Enable API Key stats collection',
    'apiadmin:settings:keep_tables' => 'Do not drop stats DB tables when deactivating the plugin',

	'item:object:api_key' => 'API Keys'
);

add_translation('en', $english);
