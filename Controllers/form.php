<?php

	require_once(MODEL_PATH.'form.php');
	require_once(MODEL_PATH.'field.php');
	
	$form = new Form();
	$field = new Field();
	
	switch($route['view']){			
		case 'forms';
		$foundForms = $form->GetAllForms();
		require_once(VIEW_PATH.'form/forms.php');
		break;	
		
		case 'form';
        $id = $params['id'];
        $foundForm = $form->GetForm($id);
        $foundFields = array();
        $foundMultiFields = $field->GetMultiFields($id);
        foreach($field->GetFields($id)->fetchAll(PDO::FETCH_ASSOC) as $f){
            $f['multi'] = $field->GetMultiFields($f['id']);
            $foundFields[] = $f;
        }
		require_once(VIEW_PATH.'form/form.php');
		break;

		case 'new';
        $foundTypes = $field->GetFieldTypes();
        require_once(VIEW_PATH.'form/form_insert.php');
		break;

        case 'config';
        $id = $params['id'];
        $foundForm = $form->GetForm($id);
        $fieldTypes = $field->GetFieldTypes()->fetchAll(PDO::FETCH_ASSOC);
        $foundFields = array();
        $foundMultiFields = $field->GetMultiFields($id);
        foreach($field->GetFields($id)->fetchAll(PDO::FETCH_ASSOC) as $f){
            $f['multi'] = $field->GetMultiFields($f['id']);
            $foundFields[] = $f;
        }
        require_once(VIEW_PATH.'form/form_config.php');
        break;

      	case 'edit';
        $id = $params['id'];
        $foundForm = $form->GetForm($id);
        $foundFields = array();
        $foundMultiFields = $field->GetMultiFields($id);
        foreach($field->GetFields($id)->fetchAll(PDO::FETCH_ASSOC) as $f){
            $f['multi'] = $field->GetMultiFields($f['id']);
            $foundFields[] = $f;
        }
        require_once(VIEW_PATH.'form/form_edit.php');
        break;
		
		case 'del';
		$id = $params['id'];
		$foundForm = $form->DeleteForm($id);
        header("Location: " . URL_ROOT.'formmanager/forms');
		break;
}
