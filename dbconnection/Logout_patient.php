<?php 
	session_start();
	
    unset($_SESSION['username_patient']);
    unset($_SESSION['patient_id']);
                   

	header("Location: ../Login/new_Login.php");
?>