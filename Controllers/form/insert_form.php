<?php

require_once(MODEL_PATH.'form.php');
require_once(MODEL_PATH.'field.php');

$form = new Form();
$field = new Field();

$form_id = $form->InsertForm($_POST['name']);

for ($i = 0; $i < count($_POST['field']); $i++) {
    $field_id = $field->InsertField($form_id, $_POST['namelabel'][$i], intval($_POST['field'][$i]));
	    $formFieldName = str_replace(' ', '_', $_POST['namelabel'][$i]);
	    foreach($_POST[$formFieldName] as $multi_name){
	    	$field->InsertMultiField($field_id, $multi_name);
	    }
}
