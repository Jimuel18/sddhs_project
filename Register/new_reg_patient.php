<?php
  include('../dbconnection/new_reg_connection.php');  
  include('../Header/Login_Header.php');
  include ('../dbconnection/Login_conn.php');

      if(isset($_POST['Submit-Patient'])){
  
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$middlename = $_POST['middlename'];
$gender = $_POST['gen'];
$HouseNo=$_POST['num'];
$Barangay=$_POST['Bgay'];
$Municipality=$_POST['Municipality'];
$Province=$_POST['province'];
$ContactNo=$_POST['phonenum'];
$email = $_POST['Email'];


$insert_pat = "INSERT INTO patient_tbl (firstname,lastname,middlename,gender,houseNo,barangay,municipality,province,contactno,email)
  VALUES('$lastname','$firstname','$middlename','$gender','$HouseNo','$Barangay','$Municipality','$Province','$ContactNo','$email')";

  $run_insert_pat = mysqli_query($conn,$insert_pat);

  if($run_insert_pat == true){

  header('location: Reg_Success.php');

}
else{
  echo"Try Again";
}

}  
             
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Form</title>

</style>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../Sidebar_Header_Test/Sidebar.css">

</head>

<style type="text/css">
.Reg{
  font-size: 15px;
  color: #28334AFF;

}

.header55 {
  width: 500px;
  color: #fccf17;
  padding: 20px;
  text-align: center;
  border-radius: 15px;
  font-size: 30px;
  font-family: 'Poppins', sans-serif;
  border-radius: 6px;
  height: 80px;
  background-color: rgb(0,0,0,0.4);
  border: solid #ebebd9 1px;
  box-shadow: 0 1px 1px 3px rgba(0,0,0,2);
  margin-top: 90px;
  margin-left: 38%;

}


@media only screen and (max-width: 768px) {
  /* For mobile phones: */

body {margin-bottom: 10px;}

div.header55 {margin: auto; width: 400px; margin-top: 80px;}

h6 {margin-left: 1%;}


}
</style>
<body style="background-color: #ebebd9;">
 <div class="header55 align-items-center"><b>Patient Registration</b></div>
     <div class="panel panel-default" style="margin-top: 40px;">
              <div class="panel-heading">Doctor Findings</div>
              <div class="panel-body">

<form class="Reg" method="post" style="margin-top:100px;">

  <div class="form-row " style="margin-top: -100px;">


     <div class="form-group col-md-12">
      <h3>Patient Information</h3>
     </div>


    <div class="form-group col-md-4">
    <label for="inputEmail4"> Firstname</label>   <i class="fas fa-user"> </i>
      <input type="text" name="firstname" class="form-control" id="inputEmail4" placeholder="Firstname" required="">
    </div>
    <div class="form-group col-md-4"> 
     <label for="inputPassword4"> Lastname</label>   <i class="fas fa-user"> </i>
      <input type="text" name="lastname" class="form-control" id="inputPassword4" placeholder="Lastname" required="">
    </div>
    <div class="form-group col-md-4"> 
   <label for="inputEmail4"> Middlename</label>   <i class="fas fa-user"> </i>
      <input type="text" name="middlename" class="form-control" id="inputEmail4" placeholder="Middlename" required="">
    </div>
  
  
<div class="form-group col-md-12">
      <h3>Address</h3>
     </div>

  <div class="form-group col-md-3">
    <label for="inputAddress">House Number</label> <i class="fas fa-house-user"></i>
    <input type="text"  name="num" class="form-control" id="inputAddress" placeholder="156 Main St" required="">
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Barangay</label> <i class="fas fa-map-marker-alt"></i>
    <input type="text" name="Bgay" class="form-control" id="inputAddress2" placeholder="Sagaba, Malasin etc." required="">
  </div>
 
  <div class="form-group col-md-3">
      <label for="inputCity">Municipality</label> <i class="fas fa-map-marked"></i>
      <input type="text" name="Municipality" class="form-control" id="inputCity" placeholder="Sto. Domingo" required="">
    </div>
    

     <div class="form-group col-md-3">
      <label for="inputCity">Province</label> <i class="fas fa-globe-americas"></i>
      <input type="text" name="province" class="form-control" id="inputCity" placeholder="Nueva Ecija" required="">
    </div>

     <div class="form-group col-md-12">
      <h3>Others</h3>
     </div>

     <div class="form-group col-md-3">
     <label for="inputState"> Gender</label> <i class="fas fa-venus-mars"></i> 
     <select name="gen" id="inputState" class="form-control" required="">
  <option value="Male">Male</option>
  <option value="Female">Female</option>
</select>
</div>
    <div class="form-group col-md-4">
      <label for="inputCity">Contact Number</label> <i class="fas fa-phone"></i>
      <input type="text" name="phonenum" class="form-control" id="inputCity" placeholder="09124582721" required="">
    </div>
    <div class="form-group col-md-5">
      <label for="inputCity">Email</label> <i class="fas fa-mail-bulk"></i>
      <input type="text"  name="Email" class="form-control" id="inputCity" placeholder="juandelacruz@gmail.com" required="">
    </div>
 
  </div>

 
  <div class="form-check" style="margin-top: 5px; margin: auto; text-align:center;">
    
      <label class="form-check-label" for="gridCheck">
      <h6 style="font-style: italic; color:red;"> Note: Please use a valid email address! The system will send your username and password through email address! Thankyou</h6>
      <input class="form-check-input" type="checkbox" id="gridCheck" required="">
      Did you use valid Email? Check this out!

      </label>
    </div>
 <a href="../Login/new_Login.php" class="btn btn-warning" style="margin-top: 30px; float: right; margin-left: 5px;" > <i class="fas fa-window-close"></i> Close</a>
  <button type="submit" name="Submit-Patient" class="btn btn-primary" style="margin-top: 30px;float: right;" > <i class="far fa-registered"></i> Register </button> 
  
</form>

</div>

</div>
</div>

</body>
</html>

<script>
   if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

    $('.popover-dismiss').popover({
  trigger: 'focus'
})

$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>