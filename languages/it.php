<?php
/**
 * Elgg API Admin
 * Italian text for the API Admin plug-in
 * 
 * @package ElggAPIAdmin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * 
 * @author Moodsdesign Ltd
 * @copyright Moodsdesign Ltd 2012
 * @link http://www.elgg.org
*/

$localized = array(
	'admin:administer_utilities:apiadmin' => 'Gestione Chiavi API',

	'apiadmin:refrenamed' => 'Riferimento testuale modificato',
	'apiadmin:refnotrenamed' => 'Impossibile modificare il riferimento testuale',
	'apiadmin:keyrevoked' => 'Chiavi API revocate',
	'apiadmin:keynotrevoked' => 'Impossibile revocare le chiavi API',
	'apiadmin:generated' => 'Nuove chiavi API generate con successo',
	'apiadmin:generationfail' => 'Si è verificato un problema nella generazione delle chiavi API',
	'apiadmin:regenerated' => 'Nuove chiavi API rigenerate con successo',
	'apiadmin:regenerationfail' => 'Si è verificato un problema nella rigenerazione delle chiavi API',
	'apiadmin:noreference' => 'Devi fornire un riferimento testuale per le chiavi API.',

	'apiadmin:yourref' => 'Riferimento testuale',
	'apiadmin:generate' => 'Genera chiavi API',
	'apiadmin:rename_prompt' => 'Immetti un riferimento testuale per le chiavi:',
	'apiadmin:revoke_prompt' => 'Sicuro di voler revocare queste chiavi?',
	'apiadmin:regenerate_prompt' => 'Sicuro di voler rigenerare queste chiavi?',
	
	'apiadmin:revoke' => 'Revoca le chiavi',
	'apiadmin:rename' => 'Cambia il riferimento',
	'apiadmin:regenerate' => 'Rigenera le chiavi',
	
	'apiadmin:public' => 'Pubblica',
	'apiadmin:private' => 'Privata',

	'item:object:api_key' => 'Chiavi API'
);

add_translation('it', $localized);
