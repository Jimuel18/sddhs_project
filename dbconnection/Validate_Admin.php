 <?php 
  if(!$_SESSION['username_admin'])
  {
    header("location: ../Login/new_Login.php");
  }

?>