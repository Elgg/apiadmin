<?php
/**
 * Elgg API Admin
 * 
 * @package ElggAPIAdmin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * 
 * Upgraded to Elgg 1.8 (tested on 1.8.6)
 * @author Federico Mestrone
 * @copyright Curverider Ltd 2011 and Moodsdesign Ltd 2012
 * @link http://www.elgg.org
*/

$english = array(
	'admin:apiadmin' => 'API Administration',

	'apiadmin:keyrevoked' => 'API Key revoked',
	'apiadmin:keynotrevoked' => 'API Key could not be revoked',
	'apiadmin:generated' => 'API Key successfully generated',

	'apiadmin:yourref' => 'Your reference',
	'apiadmin:generate' => 'Generate a new keypair',

	'apiadmin:noreference' => 'You must provide a reference for your new key.',
	'apiadmin:generationfail' => 'There was a problem generating the new keypair',
	'apiadmin:generated' => 'New API keypair generated successfully',

	'apiadmin:revoke' => 'Revoke key',
	'apiadmin:public' => 'Public',
	'apiadmin:private' => 'Private',

	'item:object:api_key' => 'API Keys'
);

add_translation('en', $english);