<?php

require_once(MODEL_PATH.'form.php');
require_once(MODEL_PATH.'field.php');

$form = new Form();
$field = new Field();

$form->UpdateForm($_POST['name'], intval($_POST['id']));
$form_id = intval($_POST['id']);

if(isset($_POST['fieldid'])){
	$allFields = $field->GetFields($form_id)->fetchAll(PDO::FETCH_ASSOC);
	$fieldsNotDelete =  $_POST['fieldid'];

	$allFieldsIds = array();

	foreach($allFields as $f){
		$allFieldsIds[] = $f['id'];
	}
	$fieldsToDelete = array_diff($allFieldsIds, $fieldsNotDelete);

	foreach($fieldsToDelete as $d){
		$field->DeleteField(intval($d));
	}
}


for ($i = 0; $i < count($_POST['field']); $i++) {
	if(isset($_POST['fieldid']) && isset($_POST['fieldid'][$i])){

		$field_id = $_POST['fieldid'][$i];

		$oldType = $field->GetType($field_id);
		$oldTypeId = 0;
		if(count($oldType) > 0){
			$oldTypeId = $oldType[0]['type'];
		}
		if($oldTypeId != intval($_POST['field'][$i])){
			$field->ResetValue($field_id);
		}

		$field->UpdateField($field_id, $_POST['namelabel'][$i], intval($_POST['field'][$i]));
		$formFieldName = str_replace(' ', '_', $_POST['namelabel'][$i]);

		$selected = $field->DeleteMultiFields($field_id);
		$option_label = "";
		if(count($selected) > 0){
			$option_label = $selected[0]['optionlabel'];
		}

	    foreach($_POST[$formFieldName] as $multi_name){
	    	$field->InsertMultiField($field_id, $multi_name);
	    }

	    $field->SetSelectedMultiField($field_id, $option_label);

	}else{
		$field_id = $field->InsertField($form_id, $_POST['namelabel'][$i], intval($_POST['field'][$i]));
	    $formFieldName = str_replace(' ', '_', $_POST['namelabel'][$i]);
	    foreach($_POST[$formFieldName] as $multi_name){
	    	$field->InsertMultiField($field_id, $multi_name);
	    }
	}    
}
