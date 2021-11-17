<?php
 include ("../dbconnection/Login_conn.php");


if(isset($_POST['Submit-btn'])){
  

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middleinitial = $_POST['middleinitial'];
$address = $_POST['address'];
$birthday = $_POST['birthday'];
$age = $_POST['age'];
$phonenumber = $_POST['phone'];
$email = $_POST['email'];
$username = $_POST['username'];
$pass = $_POST['password'];
$password = md5($pass);


$insert = "INSERT INTO admin_tbl (lastname,firstname,middleinitial,address,birthday,age,phonenumber,email,username,password)
  VALUES('$lastname','$firstname','$middleinitial','$address','$birthday','$age','$phonenumber','$email','$username','$password')";

  $run_insert = mysqli_query($conn,$insert);

  if($run_insert === true){
  echo"All data has been inserted!";
}
else{
  echo"Try Again";
}


}

?>
