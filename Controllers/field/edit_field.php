<?php

	require_once(MODEL_PATH.'lokacije.php');
	
	$lokacije = new Lokacije(); 
	$id = $_POST['lokacijeId'];
	$naslov = $_POST['naslov'];
	$sadrzaj = $_POST['sadrzaj'];
	
	
	require_once(CONTROLLER_PATH.'upload3Image.php');
	
	if($newname1 && $newname2 && $newname3){		
		$lokacije->UpdateLokacije1($naslov, $sadrzaj, $newname1, $newname2, $newname3, $id);   
   		require_once(CONTROLLER_PATH.'lokacije/redirectLokacije.php');		
		return;
	}
	
	if($newname1 && $newname2 && !$newname3){		
		$lokacije->UpdateLokacije2($naslov, $sadrzaj, $newname1, $newname2, $id);   
   		require_once(CONTROLLER_PATH.'lokacije/redirectLokacije.php');	
		return;
	}
	
	if($newname1 && !$newname2 && $newname3){	  
		$lokacije->UpdateLokacije3($naslov, $sadrzaj, $newname1, $newname3, $id);   
   		require_once(CONTROLLER_PATH.'lokacije/redirectLokacije.php');	
		return;
	}
	
	if($newname1 && !$newname2 && !$newname3){
		$lokacije->UpdateLokacije4($naslov, $sadrzaj, $newname1, $id);   
   		require_once(CONTROLLER_PATH.'lokacije/redirectLokacije.php');	
		return;
	}
	
	if(!$newname1 && $newname2 && $newname3){		
		$lokacije->UpdateLokacije5($naslov, $sadrzaj, $newname2, $newname3, $id);   
   		require_once(CONTROLLER_PATH.'lokacije/redirectLokacije.php');	
		return;
	}
	
	if(!$newname1 && $newname2 && !$newname3){
		$lokacije->UpdateLokacije6($naslov, $sadrzaj, $newname2, $id);   
   		require_once(CONTROLLER_PATH.'lokacije/redirectLokacije.php');	
		return;
	}
	
	if(!$newname1 && !$newname2 && $newname3){
		$lokacije->UpdateLokacije7($naslov, $sadrzaj, $newname3, $id);   
   		require_once(CONTROLLER_PATH.'lokacije/redirectLokacije.php');	
		return;
	}
	
	if(!$newname1 && !$newname2 && !$newname3){
		$lokacije->UpdateLokacije8($naslov, $sadrzaj, $id);   
   		require_once(CONTROLLER_PATH.'lokacije/redirectLokacije.php');	
		return;
	}
	
?>