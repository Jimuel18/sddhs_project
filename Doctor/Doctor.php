<?php
    include('../dbconnection/Login_conn.php');
    include('../dbconnection/Validate_Admin.php');
    include('../Header/header.php');
    include('../Sidebar_Header_Test/Sidebar_test.php');
    include('../ADMIN/Admin_action.php');

if(isset($_POST['Submit-Doc'])){
  
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$middlename = $_POST['middlename'];
$HouseNo=$_POST['housenum'];
$Barangay=$_POST['Bgay'];
$Municipality=$_POST['Municipality'];
$Province=$_POST['province'];
$ContactNo=$_POST['phonenum'];
$username = $_POST['username'];
$pass = $_POST['password'];
$Specialization=$_POST['Spec'];
$password = md5($pass);


$insert_doc = "INSERT INTO doctor_tbl (firstname,lastname,middlename,houseno,barangay,municipality,province,contactNo,username,password,Specialization_id)
  VALUES('$lastname','$firstname','$middlename','$HouseNo','$Barangay','$Municipality','$Province','$ContactNo','$username','$password','$Specialization')";

  $run_insert_doc = mysqli_query($conn,$insert_doc);

  if($run_insert_doc === true){
  echo"All data has been inserted!";
}
else{
  echo"Try Again";
}


}  

 ?>

 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="author" content="Jim">
  <title>STO. DOMINGO DISTRICT HOSPITAL</title>
    <link rel="stylesheet" href="../Sidebar.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scales=1.0">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Image Slider -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>
  .header5 {
 width: 500px;
  color: #fccf17;
  padding: 20px;
  text-align: center;
  border-radius: 15px;
  font-size: 30px;
  font-family: 'Poppins', sans-serif;
  border-radius: 6px;
  margin-top: -100px;
  height: 80px;
  background-color: rgb(0,0,0,0.4);
  border: solid #ebebd9 1px;
  box-shadow: 0 1px 1px 3px rgba(0,0,0,2);
  margin: auto;
  margin-top: 20px;
  
}

@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

.tree {
  width: 100%;
  height: auto;
  text-align: center;
}
.tree h4{
  margin: auto;
  margin-top: 30px;
  font-family: 'Poppins', sans-serif;
  font-size: 30px;
}
.tree a{
  background-color: whitesmoke;
}
.tree ul {
  padding-top: 20px;
  position: relative;
  transition: .5s;
}
.tree li {
  display: inline-table;
  text-align: center;
  list-style-type: none;
  position: relative;
  padding: 10px;
  transition: .5s;
}
.tree li::before, .tree li::after {
  content: '';
  position: absolute;
  top: 0;
  right: 50%;
  border-top: 1px solid #ccc;
  width: 51%;
  height: 10px;
}
.tree li::after {
  right: auto;
  left: 50%;
  border-left: 1px solid #ccc;
}
.tree li:only-child::after, .tree li:only-child::before {
  display: none;
}
.tree li:only-child {
  padding-top: 0;
}
.tree li:first-child::before, .tree li:last-child::after {
  border: 0 none;
}
.tree li:last-child::before {
  border-right: 1px solid #ccc;
  border-radius: 0 5px 0 0;
  -webkit-border-radius: 0 5px 0 0;
  -moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after {
  border-radius: 5px 0 0 0;
  -webkit-border-radius: 5px 0 0 0;
  -moz-border-radius: 5px 0 0 0;
}
.tree ul ul::before {
  content: '';
  position: absolute;
  top: 0;
  left: 50%;
  border-left: 1px solid #ccc;
  width: 0;
  height: 20px;
}
.tree li a {
  border: 1px solid #ccc;
  padding: 10px;
  display: inline-grid;
  border-radius: 5px;
  text-decoration-line: none;
  border-radius: 5px;
  transition: .5s;
}
.tree li a img {
  width: 50px;
  height: 50px;
  margin-bottom: 10px !important;
  border-radius: 100px;
  margin: auto;
}
.tree li a span {
  border: 1px solid #ccc;
  border-radius: 5px;
  color: #666;
  padding: 8px;
  font-size: 12px;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 500;
}




@media only screen and (max-width: 768px) {

.header5{
  width: 290px;
  height: 120px;
  text-align: center;
  margin-left: 58px;
}

 div.chart{
  max-width: 500px;
  margin-left: 15px;
}

 div.view {
  margin-left: 35px;
  background-color: #fccf17;
  border-radius: 10px;
}

  div.add {
  margin-left: 35px;
  background-color: #fccf17;
  border-radius: 10px;
 }

}



@media only screen and (max-width: 528px) {

  .header5{
  width: 290px;
  height: 120px;
  text-align: center;
  margin-left: 100px;
}

 div.chart{
  max-width: 500px;
  margin-left: 15px;
}

 div.view {
  margin-left: 35px;
  background-color: #fccf17;
  border-radius: 10px;
}

  div.add {
  margin-left: 35px;
  background-color: #fccf17;
  border-radius: 10px;
 }

}

@media only screen and (max-width: 418px) {
 .header5{
  width: 290px;
  height: 120px;
  text-align: center;
  margin-left: 67px;
}
}

</style>

 

  <body   style="background-color: #ebebd9;">

    <div class="content">
    <div class="my_content">
    
<div class="header5">
  <i class="fas fa-user-nurse"></i>  <b>  DOCTOR RECORDS </b></div>
 
  
<div class="view" >
    <a href="View_Doctor.php" type="submit" class="btn btn d-flex justify-content-center" style="font-family: sans-serif; font-size: 30px; width: 20%; background-color: #fccf17;  margin: auto; margin-top: 20px;"> <i class="fas fa-street-view"></i> <b>VIEW DOCTOR</b></a>
</div>

<div class="add">
     <a href="Add_Doctor.php" type="submit" class="btn btn d-flex justify-content-center" style="height: 50px; font-family: sans-serif; font-size: 30px; background-color: #fccf17; width: 20%; margin: auto; margin-top: 10px;"> <i class="fas fa-user-plus"></i> <b>ADD DOCTOR</b></a>
</div>


  <body>
    <div class="container-fluid chart" style="margin-top: 20px;">
      <div class="row">
        <div class="tree">
          <h4><b>ORGANIZATIONAL CHART</b></h4>
          <ul>
            <li> <a><img src="../Pics/127-1272273_doctors-logo-black-and-white-vector-png-download.png"><span>Doctor #1</span></a>
            <ul>
              <li><a><img src="../Pics/127-1272273_doctors-logo-black-and-white-vector-png-download.png"><span>Doctor #2</span></a>
              <ul>
                <li> <a><img src="../Pics/127-1272273_doctors-logo-black-and-white-vector-png-download.png"><span>Doctor #3</span></a> </li>
                <li> <a><img src="../Pics/127-1272273_doctors-logo-black-and-white-vector-png-download.png"><span>Doctor #4</span></a> </li>
              </ul>
            </li>
            <li> <a><img src="../Pics/127-1272273_doctors-logo-black-and-white-vector-png-download.png"><span>Doctor #5</span></a>
            <ul>
              <li> <a><img src="../Pics/127-1272273_doctors-logo-black-and-white-vector-png-download.png"><span>Doctor #6</span></a> </li>
              <li> <a><img src="../Pics/127-1272273_doctors-logo-black-and-white-vector-png-download.png"><span>Doctor #7</span></a> </li>
              <li> <a><img src="../Pics/127-1272273_doctors-logo-black-and-white-vector-png-download.png"><span>Doctor #8</span></a> </li>
               <li> <a><img src="../Pics/127-1272273_doctors-logo-black-and-white-vector-png-download.png"><span>Doctor #9</span></a> </li>
            </ul>
          </li>
  <li><a><img src="../Pics/127-1272273_doctors-logo-black-and-white-vector-png-download.png"><span>Doctor #10</span></a></li>
        </ul>
      </li>
         <li><a><img src="../Pics/127-1272273_doctors-logo-black-and-white-vector-png-download.png"><span>Doctor #11</span></a></li>
    </ul>

  </div>
</div>
</div>
</body>
</html>
  </div>
</div>
 </body>
 </html> 