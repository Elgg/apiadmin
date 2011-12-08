<?php

$ref_label = elgg_echo('apiadmin:yourref');
$ref_control = elgg_view('input/text', array('name' => 'ref'));
$gen_control = elgg_view('input/submit', array('value' => elgg_echo('apiadmin:generate')));

$form_body = <<< END
<div>$ref_label: $ref_control</div>
<div class="elgg-foot">$gen_control</div>
END;

echo elgg_view('input/form', array('action' => "{$vars['url']}action/apiadmin/generate", "body" => $form_body));
