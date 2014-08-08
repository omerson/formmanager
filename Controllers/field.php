<?php

	require_once(MODEL_PATH.'field.php');
	
	$field = new Field();
	
	switch($route['view']){					
		
		case 'fields';
		$foundFields = $field->GetAllFields();
		require_once(VIEW_PATH.'field/fields.php');
		break;	
		
		case 'field';
		$id = $params['id'];	
		$foundField = $field->GetField($id);
		require_once(VIEW_PATH.'field/field.php');
		break;	
		
		case 'new';
		require_once(VIEW_PATH.'field/field_insert.php');
		break;	
		
		case 'del';
		$id = $params['id'];
		$field->DeleteField($id);
        $foundFields = $field->GetAllFields();
        require_once(VIEW_PATH.'field/fields.php');
		break;	
    }