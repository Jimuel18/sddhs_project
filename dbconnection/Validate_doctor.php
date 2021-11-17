 <?php 
  if(!$_SESSION['username_doctor'])
  {
    header("location: ../Login/new_Login.php");
  }

?>