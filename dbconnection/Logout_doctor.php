<?php 
	session_start();
	
    unset( $_SESSION['username_doctor'] );
    unset( $_SESSION['doc_id'] );
                   

	header("Location: ../Login/new_Login.php");
?>