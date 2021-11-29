<?php
include('../dbconnection/Login_conn.php');
include('../dbconnection/Validate_doctor.php');
include('../Header/header.php');
include('../Sidebar_Header_Test/Sidebar_Doctor.php');

?>

	<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="author" content="Jim">
  <title>STO. DOMINGO DISTRICT HOSPITAL</title>
    <link rel="stylesheet" href="../Sidebar_Header_Test/Sidebar.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scales=1.0">
  <!-- Latest compiled and minified CSS -->
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


  <style>
    .title {
  font-size: 15px;
  text-align: center;
}

.up{
  margin-left: 155px;
  padding: 2px;
  color: #ebebd9;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 16px;
}
.header03 {
  width: 500px;
  color: #fccf17;
  padding: 20px;
  text-align: center;
  border-radius: 15px;
  font-size: 30px;
  font-family: 'Poppins', sans-serif;
  border-radius: 6px;
  margin-top: 20px;
  height: 80px;
  background-color: rgb(0,0,0,0.4);
  border: solid #ebebd9 1px;
  box-shadow: 0 1px 1px 3px rgba(0,0,0,2);
  margin: auto;
  margin-top: 20px;
}


/*Profile*/
.wrapper{
  margin: auto;
  height: 500px; 
  width: 1000px;
  display: flex;
  box-shadow: 0 1px 20px 0 rgba(69,90,100,.08);
}

.wrapper .left{
  width: 35%;
  background: #0D1E4F;
  padding: 30px 25px;
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
  text-align: center;
  color: #fff;
}

.wrapper .left img{
  border-radius: 5px;
  margin-bottom: 10px;
}

.wrapper .left h4{
  margin-bottom: 10px;
}

.wrapper .left p{
  font-size: 12px;
}

.wrapper .right{
  width: 65%;
  background: #fff;
  padding: 30px 25px;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}

.wrapper .right .info,
.wrapper .right .projects{
  margin-bottom: 25px;
}

.wrapper .right .info h3,
.wrapper .right .projects h3{
    text-align: center;
    margin-bottom: 15px;
    padding-bottom: 5px;
    border-bottom: 1px solid #e0e0e0;
    color: #353c4e;
  text-transform: uppercase;
  letter-spacing: 5px;
}

.wrapper .right .info_data,
.wrapper .right .projects_data{
  display: flex;
  justify-content: space-between;
}

.wrapper .right .info_data .data,
.wrapper .right .projects_data .data{
  width: 45%;
  text-align: center;
}

.wrapper .right .info_data .data h4,
.wrapper .right .projects_data .data h4{
    color: #353c4e;
    margin-bottom: 5px;
}

.wrapper .right .info_data .data p,
.wrapper .right .projects_data .data p{
  font-size: 13px;
  margin-bottom: 10px;
  color: #919aa3;
}

.wrapper .social_media ul{
  display: flex;
}

.wrapper .social_media ul li{
  width: 45px;
  height: 45px;
  background: linear-gradient(to right,#01a9ac,#01dbdf);
  margin-right: 10px;
  border-radius: 5px;
  text-align: center;
  line-height: 45px;
}

.wrapper .social_media ul li a{
  color :#fff;
  display: block;
  font-size: 18px;
}


@media only screen and (max-width: 800px)
 {

  div.content {height: 100px;}

   

.header03 {
    width: 500px;
    color: #fccf17;
    padding: 20px;
    text-align: center;
    border-radius: 15px;
    font-size: 30px;
    font-family: 'Poppins', sans-serif;
    border-radius: 6px;
    margin-top: 20px;
    height: 80px;
    background-color: rgb(0,0,0,0.4);
    border: solid #ebebd9 1px;
    box-shadow: 0 1px 1px 3px rgb(0 0 0);
    margin: auto;
    margin-top: 20px;
    margin-left: 242px;
}

.wrapper .right {
    width: 58%;
    background: #fff;
    padding: 30px 5px;
    border-top-right-radius: 7px;
    border-bottom-right-radius: 6px;
}

.wrapper .left {
    width: 30%;
    background: #0D1E4F;
    padding: 46px 30px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    text-align: center;
    color: #fff;
    margin-left: 60px;
}





  </style>


 
<body  style="background-color: #ebebd9;">
<div class="all">
<div class="content">
  <div class="my_content">
  <div class="header03"><b>My Profile</b></div>

<?php

  $sql_doc = "SELECT dt.Doctor_id, dt.firstname, dt.lastname, dt.middlename, dt.houseno, dt.barangay, dt.municipality, dt.province, dt.contactNo, dt.account_id, st.Specialization_Type FROM doctor_tbl dt INNER JOIN specialization_tbl st ON dt.Specialization_id = st.Specialization_id WHERE dt.Doctor_id = '$_SESSION[doc_id]'";
      $stmt=$conn->prepare($sql_doc);
      $stmt->execute();
      $result_doc=$stmt->get_result();


      $pass = mysqli_query($conn,$sql_doc);
      $exe_pass = mysqli_fetch_assoc($pass);


      if (isset($_POST['update'])) {

        $lname = $_POST['lastname'];
        $fname = $_POST['firstname'];
        $cnum = $_POST['Con'];

        $doctor_upt = "UPDATE `doctor_tbl` SET `firstname`='$fname',`lastname`='$lname',`contactNo`='$cnum' WHERE Doctor_id = '$_SESSION[doc_id]'";
        mysqli_query($conn, $doctor_upt);
}


      if (isset($_POST['savepass'])) {

        $acc_id = $exe_pass['account_id'];

        $dating_password = $_POST['curpass'];
        $bagong_password = $_POST['newpass'];
        $kumpirmahin = $_POST['conpass'];


        if(empty($dating_password)){
        $error = "<p style='text-align: center;'> <b>Current Password</b> Requires Input!</p>";
        echo  '<script> 
          $(document).ready(function(){
          $("#exampleModal1").modal("show");
          });
        </script>';
    }
    else if(empty($bagong_password)){
        $error = "<p style='text-align: center;'> <b>New Password</b> Requires Input!</p>";
        echo  '<script> 
          $(document).ready(function(){
          $("#exampleModal1").modal("show");
          });
        </script>';
    }
    else if(empty($kumpirmahin)){
        $error = "<p style='text-align: center;'> Password<b> doesn't match to your new password!</b> </p>";
        echo  '<script> 
          $(document).ready(function(){
          $("#exampleModal1").modal("show");
          });
        </script>';

    }
    else if($bagong_password != $kumpirmahin){
        $error = "<p style='text-align: center;'> <b>New Password</b> doesn't Match!</p>";
         echo  '<script> 
          $(document).ready(function(){
          $("#exampleModal1").modal("show");
          });
        </script>';
    }

    else{

        $kunin = "SELECT * FROM accounts_tbl WHERE account_id = '$acc_id'";
        $resulta = mysqli_query($conn, $kunin);
        $kr = mysqli_fetch_assoc($resulta);

        $pas_record = $kr['password'];
        $dating_password = md5($dating_password);

        if($pas_record == $dating_password){

          $bagong_pass = md5($kumpirmahin);

          $baguhin = "UPDATE accounts_tbl set password = '$bagong_pass' WHERE account_id = '$acc_id'";
          mysqli_query($conn, $baguhin);

            echo  '<script> 
            $(document).ready(function(){
            $("#success").modal("show");
            });
                  </script>';
        }
           else{
          $error = "You've entered wrong current password";
          echo  '<script> 
            $(document).ready(function(){
            $("#exampleModal1").modal("show");
            });
          </script>';
        }

    }

}

?>

<div class="justify-content-center">
<div class="wrapper" style="margin-top: 50px;">
 <?php 
    while ($row_doc=$result_doc->fetch_assoc()) { ?>
  <div class="left">
        <img src="../Pics/240820682_4823504134386103_8850075826434454316_n.jpg" 
        alt="user" width="200" style="border-radius: 200px;">
        <h4> <b><?= $row_doc['firstname'].' '.$row_doc['lastname']; ?></b></h4>

        <p>DOCTOR</p>
  </div>
  <div class="right">
    <div class="info">
      <h3>Information</h3>
        <div class="info_data">
          <div class="data">
             <h4>Specialization</h4>
             <p><?= $row_doc['Specialization_Type']; ?></p>

             <h4>Address</h4>
             <p><?= $row_doc['barangay'].' '.$row_doc['municipality']; ?></p>
          </div>   
           <div class="data">
              <h4>Phone</h4>
              <p><?= $row_doc['contactNo']; ?></p>

              <h4>Doctor ID</h4>
              <p><?= $row_doc['Doctor_id']; ?></p>
        </div>                 
    </div>    
  </div>

  <div class="projects">
     <h3>Action</h3>
     <div class="projects_data">
       <div class="data">
      
      <form method="post">
        <div class="row">
       <button type="button" class="btn btn-primary up m" data-toggle="modal" data-target="#exampleModal">Update</button>
        <button type="button" class="btn btn-warning up" data-toggle="modal" data-target="#exampleModal1" style="margin-top: 10px;">Change Password</button>
        </form>
       </div>
        </div>
     </div>
  </div>     
</div>

</div>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="exampleModalLabel">Update Profile Information</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="float: right;">&times;</span>
        </button>
      </div>
      <div class="modal-body">

                <input type="hidden" name="doc1_id" value="<?= $row_doc['Doctor_id'];?>"/>
         
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

                 <div class="modal-footer">
                <button onclick="return confirm('Are you sure you want to Update this record?');" type="submit" name="update" class="btn btn-success float-right" > Save </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 </div>
      </div>


</form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="exampleModalLabel">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="float: right">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post">

                                              <?php if(isset($error)) { ?>
                                              <div class="alert alert-danger" role="alert">
                                                  <?php echo $error; ?>
                                              </div>
                                              <?php } ?>

         <label>Current Password:?></label>
         <div class="form-group">
          <input type="password" name="curpass" class="form-control" id="myInput">
        </div>


         <label>New Password:</label>
         <div class="form-group">
          <input type="password" name="newpass" class="form-control" id="myInput1">
        </div>

         <label>Confirm Password:</label>
         <div class="form-group">
          <input type="password" name="conpass" class="form-control" id="myInput2">

          <input type="checkbox" onclick="myFunction()"> Show Password
        </div>

  

        <div class="modal-footer">
         <button onclick="return confirm('Are you sure you want to Update this record?');" type="submit" name="savepass" class="btn btn-success float-right"> Save </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       
      </div>

      </div>
    </div>
  </div>
</div>
</form>
 <?php }?>
    </div>
</body>
</html>



<div class="modal" id="success" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Password Change!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Success! Please use your <b>New Password</b> in your next Login. ThankYou!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
  function myFunction() {
  var x = document.getElementById("myInput");
   var y = document.getElementById("myInput1");
    var pwet = document.getElementById("myInput2");
  if (x.type === "password") {
    x.type = "text";
    y.type = "text";
    pwet.type = "text";
  } else {
    x.type = "password";
     y.type = "password";
      pwet.type = "password";
  }
}
</script>