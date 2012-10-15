<?php
/* 
 * API Admin plugin settings
 * 
 */

// Plugin setting: should we show standin?
if ( isset($vars['entity']->enable_stats) ) {
    $enable_stats = $vars['entity']->enable_stats;
} else {
    $enable_stats = 'on';
}

$label1 = elgg_echo('apiadmin:settings:enable_stats');
// Add a checkbox
$options1 = array(
    'name' => 'params[enable_stats]',
    'value' => 'on',
    'checked' => ($enable_stats == 'on')
);
echo "<p>$label1 ";
echo elgg_view('input/checkbox', $options1);
echo '</p>';
