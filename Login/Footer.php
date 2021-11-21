<?php
 include('../Header/Login_Header.php');
include ("../dbconnection/Login_conn.php");




if(isset($_POST['Login_Button'])){

      if (!empty($_POST['username']) && !empty($_POST['password'])) {

          $username = $_POST['username'];
          $pass = $_POST['password'];
          $password = md5($pass);

          $sql = "SELECT * FROM accounts_tbl WHERE username = '$username' AND password ='$password'";
          $result = mysqli_query($conn, $sql);
          $exe=mysqli_fetch_assoc($result);

          if ($row=mysqli_num_rows($result)) {
                 $user_type = $exe['usertype_id'];
                
               if($user_type == 1){
                     $sql_ad = "SELECT * FROM admin_tbl WHERE account_id = '$exe[account_id]'";
                    $result_ad = mysqli_query($conn, $sql_ad);
                    $exe_ad=mysqli_fetch_assoc($result_ad);

                    $_SESSION['username_admin'] = $username;
                    $_SESSION['admin_id'] = $exe_ad['id'];
                    header("location: ../Admin/Admin.php");

               }
               elseif ($user_type == 2) {
                     $sql_doc = "SELECT * FROM doctor_tbl WHERE account_id = '$exe[account_id]'";
                    $result_doc = mysqli_query($conn, $sql_doc);
                    $exe_doc=mysqli_fetch_assoc($result_doc);

                    $_SESSION['username_doctor'] = $username;
                    $_SESSION['doc_id'] = $exe_doc['Doctor_id'];
                     header("location: ../Doctor/Doctor_Home.php");
               }
               elseif($user_type == 3){
                     $sql_pat = "SELECT * FROM patient_tbl WHERE account_id = '$exe[account_id]'";
                    $result_pat = mysqli_query($conn, $sql_pat);
                    $exe_pat=mysqli_fetch_assoc($result_pat);

                    $_SESSION['username_patient'] = $exe_pat['firstname'];
                    $_SESSION['patient_id'] = $exe_pat['patient_id'];
                     header("location: ../Patient/Patient_Home.php");
               }
          }
          else{
               
                header("location: user_login.php?error=Incorrect Username or password!");
          }
           
     }
     else{
          header("location: user_login.php?error=All Fields are Required!");
     }
}








/*
if(isset($_POST['Login_Button'])){
          $role = $_POST['role'];
     if ($role == "Admin") {
          if (!empty($_POST['username']) && !empty($_POST['password'])) {
               
               $username = $_POST['username'];
               $pass = $_POST['password'];
               $password = md5($pass);
               

               $sql = "SELECT * FROM admin_tbl WHERE username = '$username' AND password ='$password'";
               $result = mysqli_query($conn, $sql);

               if($row = mysqli_fetch_assoc($result)){
                    $_SESSION['username'] = $username;
                    $_SESSION['admin_id'] = $row ['id'];
                    header("location: ../Admin/Admin.php");
               }
               else{
                    header("location: user_login.php?error=Incorrect Username or password!");
               }
          }else{
               header("location: user_login.php?error=All Fields are Required!");
          }
     }else if ($role == "Doctor") {

          if (!empty($_POST['username']) && !empty($_POST['password'])) {
               
               $username = $_POST['username'];
               $pass = $_POST['password'];
               $password = md5($pass);

               $sql = "SELECT * FROM `doctor_tbl` WHERE username = '$username' AND password ='$password'";
               $result = mysqli_query($conn, $sql);

               if($row = mysqli_fetch_assoc($result)){
                    $_SESSION['username'] = $username;
                    $_SESSION['doc_id'] = $row ['Doctor_id'];
                    header("location: ../Doctor/Doctor_Home.php");
               }
          }else{
               header("location: user_login.php?error=Incorrect Username or password!");
          }
}else{
     header("location: user_login.php?error=All Fields are Required!");
}
if ($role == "Patient") {
          if (!empty($_POST['username']) && !empty($_POST['password'])) {
               
               $username = $_POST['username'];
               $pass = $_POST['password'];
               $password = md5($pass);

               $sql = "SELECT * FROM `patient_tbl` WHERE username = '$username' AND password ='$password'";
               $result = mysqli_query($conn, $sql);

                 if($row = mysqli_fetch_assoc($result)){
                    $_SESSION['username'] = $username;
                    $_SESSION['patient_id'] = $row ['patient_id'];
                    header("location: ../Patient/Patient_Dashboard.php");
               }
               else{
                    header("location: user_login.php?error=Incorrect Username or password!");
               }
          }else{
               header("location: user_login.php?error=All Fields are Required!");
          }
     }
}

if (isset($_POST['SignUp'])) {

          $role = $_POST['role'];

          if($role == "Admin"){

                header("location: ../Register/new_reg.php");

          }else if($role == "Doctor"){

               header("location: ../Register/new_reg_doctor.php");

          }else if($role == "Patient"){

               header("location: ../Register/new_reg_patient.php");

          }
     }


*/
     ?>

<!DOCTYPE html>
<html>
<head>
	<title>STO. DOMINGO DISTRICT HOSPITAL</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style type="text/css">

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #11101D;
   color: white;
   text-align: center;
}

@media only screen and (max-width: 600px) {
  /* For mobile phones: */
form {padding: 100px; height: 80%; margin-top: -50%; width: 400px; }
div.footer {height: 50px;}
header {float: none; display: none; text-align: left;}
body {}

h2 {margin-top: -100px; font-size:4vw;}

input {padding: 5px; width: 150%; margin-left: -50px;}

label {margin-top: -15%; margin-left: -50px;}

.error {margin-top: -25px; padding: 5px; font-size:2.5vw;}

.show {width: 100px; margin-left: 10px;}

h6 {margin-left: -100px; margin-top: -10%;}


}

</style>

<body  style="background-image: url('../Pics/Digital-Therapeutics.png'); background-size: 100% 100%;">

     <form method="post" style=" background-color: rgb(0,0,0,0.6); border: solid; box-shadow: 0 20px 50px 15px rgba(0,0,0,2);">
     	<h2 style="color: yellow; font-family: britannic bold;">STO. DOMINGO DISTRICT HOSPITAL LOGIN</h2>
          <hr>
          <br>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label for="username">Username:</label>
     	<input type="text" name="username" placeholder="Username" id="username"><br>

     	<label for="password">Password:</label>
     	<input type="password" name="password" placeholder="Password" id="myInput"> 
         
          <br> 
    
          <input class="show" type="checkbox" onclick="myFunction()" style="margin-left: -45%; color: white;">
          <h6 style="color: white; margin-top: -17.3px; margin-left: 22px; ">Show Password</h6>
          
          
          <br>
          <br>
              <button type="submit" name="Login_Button" class="btn btn-primary btn-lg btn-block" style="margin-right: 8px;">
              LOGIN <i class="fas fa-sign-in-alt"> </i></button>

              <a href="../Register/new_reg_patient.php" name="SignUp" class="btn btn-warning btn-lg btn-block" style="padding: 2px; margin-right: 8px; margin-top: 20px; "> <b>SIGN UP</b> <i class="fas fa-user-plus"></i></a>
     </form>



<div class="footer">
  <p>Footer</p>
</div>

</body>
</html>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
$('.popover-dismiss').popover({
  trigger: 'focus'
})

$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>






  <form method="post">
            <?php 
            if ($row1['Completed'] == "Done") {
              ?>

              <a href="Doctor_Findings.php?id=<?= $row1['patient_id']?>&schedule_id=<?php echo $row1['schedule_id']?>" type="submit" class="btn btn-success" style="margin-left: 126px;"><i class="fas fa-file-export"></i> Edit </a>  <input type="text" name="view_id" value="<?= $row1['patient_id']?>">

                      <?php
            }
              else{
            ?>
          <a href="Doctor_Findings.php?id=<?= $row1['patient_id']?>&schedule_id=<?php echo $row1['schedule_id']?>" type="submit" class="btn btn-success" style="margin-left: 50px;"><i class="fas fa-file-export"></i> Post Diagnosis </a> || <input type="text" name="view_id" value="<?= $row1['patient_id']?>">
<?php  } ?>

          <button type="submit" name="view" class="btn btn-warning"><i class="fas fa-eye"></i>View Record</button>

          </form>
        </td>
      </tr>      
    </tbody>
  </tr>
    <?php 

} ?> 



<?php

                  if($row['status'] == "Available")
                  {
                    ?> <p style="background-color:green;"><?= $row['status']; ?></p>
                    <?php
                  }

                  elseif($row['status'] == "Not_Available")
                  {
                    ?>
                    <p style="background-color: red;"><?= $row['status']; ?></p>
                    <?php
                  }


                 ?>



                 <p style="background-color: green; padding: 10px; width: 120px; color: black; text-align: center; border-radius: 50px;">




                      $Month = array("January", "February", "March", "April", "May", "June", "July", "August", "September","October", "November", "December");
    $None = 0;

    for ($i=1; $i <= 12 ; $i++) { 

      $Monthly = "SELECT round(count(appointment_id),2) as Monthly_Total_Patient, month(Date), Monthname(Date) as mname FROM appointment_tbl GROUP BY year(Date) AND Month(Date) = '$i'";
      $res_month = mysqli_query($conn, $Monthly);
      $exe_month = mysqli_fetch_assoc($res_month);

      if (!empty($exe_month)) {
          $ynum.= '' .$exe_month['Monthly_Total_Patient'].',';
      }
      elseif(empty($exe_month)){
          $ynum .= '' .$None.',';
      }

      $xnum .= '"' .$Month[$i-1]. '",';
      $color .= '"#'.substr(str_shuffle("123456789ABCDEF"), 0, 6).'",';
    }






    <!-- The Modal -->
       <div class="modal fade" id="Update" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form method="post" style="width: 100%;">
              <div class="modal-content">
              <div class="modal-header" >
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="float: right; ">&times;</span>
                </button>
              </div>
                    <div class="modal-body">
             
                <h1 class="text-center text-info">Update Profile <?php echo $row_doc['Doctor_id'];?></h1>

                <input type="hidden" name="patient_id" value="<?php echo $row_doc['Doctor_id'];?>"/>

                <label>Firstname:</label>
               <div class="form-group">
                  <input type="text" name="firstname" class="form-control" value="<?= $row_doc['firstname'];?>" placeholder="Enter Last Name" required="">
                </div>

                <label>Lastname:</label>
                <div class="form-group">
                  <input type="text" name="lastname" class="form-control" value="<?= $row_doc['lastname'];?>" placeholder="Enter First Name" required="">
                </div>

                <label>Contact No.:</label>
                 <div class="form-group">
                  <input type="text" name="Con" class="form-control" value="<?= $row_doc['contactNo']; ?>" placeholder="Enter Middle Name" required="">
                </div>
                 <button onclick="return confirm('Are you sure you want to Update this record?');" type="submit" name="update" class="btn btn-success btn-block" > Save </button>
      </div>
              </div>
          </form>
</div>
        </div>
      </div>

<div class="modal fade" id="ChangePass1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form method="post" style="width: 100%;">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="float: right;">&times;</span>
        </button>
      </div>
            <div class="modal-body">

        <h1 class="text-center text-info">CHANGE PASSWORD</h1>

         <label>Current Password:</label>
         <div class="form-group">
          <input type="text" name="Con" class="form-control" value="Current Password Here" placeholder="Enter Middle Name" required="">
        </div>


         <label>New Password:</label>
         <div class="form-group">
          <input type="text" name="Con" class="form-control" value="New Password Here" placeholder="Enter Middle Name" required="">
        </div>


        <button onclick="return confirm('Are you sure you want to Update this record?');" type="submit" name="update" class="btn btn-success btn-block" > Save </button>
      </div>
    </form>
  </div>
</div>

if(isset($_POST['addDoctor'])){


$Firstname=$_POST['fname'];
$Lastname=$_POST['lname'];
$Middlename=$_POST['mname'];
$HouseNo=$_POST['Hnumber'];
$Barangay=$_POST['Bgay'];
$Municipality=$_POST['Municipality'];
$Province=$_POST['prov'];
$ContactNo=$_POST['phonenum'];
$Specialization=$_POST['Special'];
$email = $_POST['eml'];
$username = $_POST['user'];
$pass = $_POST['password'];
$password = md5($pass);




         $query_1 = "INSERT INTO accounts_tbl (`username`, `password`, `usertype_id`) VALUES ('$username','$password', '2')";
         mysqli_query($conn,$query_1);

         $query_2 = "SELECT MAX(account_id) AS ID FROM accounts_tbl";
         $exe_2 = mysqli_query($conn,$query_2);
         $result_2 = mysqli_fetch_assoc($exe_2);

         $id = $result_2['ID'];

    $insert_pat = "INSERT INTO doctor_tbl (firstname,lastname,middlename,houseno,barangay,municipality,province,contactNo,email,Specialization_id,account_id)
      VALUES('$Lastname','$Firstname','$Middlename','$HouseNo','$Barangay','$Municipality','$Province','$ContactNo','$email','$Specialization','$id')";
        $run_insert_pat = mysqli_query($conn,$insert_pat);



  if($run_insert_pat === true){
  $message = "All data has been inserted!";

  echo "<script type='text/javascript'>alert('$message');</script>";

}
else{
  echo"Try Again";
}


}  