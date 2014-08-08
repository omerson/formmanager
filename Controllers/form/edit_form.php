<?php

require_once(MODEL_PATH.'form.php');
require_once(MODEL_PATH.'field.php');

$form = new Form();
$field = new Field();

$form_id = intval($_POST['id']);
foreach($field->GetFields($form_id)->fetchAll(PDO::FETCH_ASSOC) as $f){
	$value = null;
 	if(isset($_POST[$f['namelabel']])){   			
		$value = $_POST[$f['namelabel']];
 	}
	$formName = str_replace(' ', '_', $f['namelabel']);

   	$field->SaveField($f['id'], $value);
}

