<?php 
	session_start();
	
    unset($_SESSION['username_admin']);
    unset($_SESSION['admin_id']);

	header("Location: ../Login/new_Login.php");
?>