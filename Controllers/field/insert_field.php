<?php

	require_once(MODEL_PATH.'lokacije.php');
	
	$lokacije = new Lokacije(); 
	
	$naslov = $_POST['naslov'];
	$sadrzaj = $_POST['sadrzaj'];		
	
	require_once(CONTROLLER_PATH.'upload3Image.php');	
	$lokacije->UnesiLokacije($naslov, $sadrzaj, $newname1, $newname2, $newname3);   
	require_once(CONTROLLER_PATH.'lokacije/redirectLokacije.php');	
?>
	
	
