 <?php 
  if(!$_SESSION['username_patient'])
  {
    header("location: ../Login/new_Login.php");
  }

?>