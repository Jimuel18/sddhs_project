<?php
include('../dbconnection/Login_conn.php');
include('../dbconnection/Validate_patient.php');
include('../Header/header.php');
include('../Sidebar_Header_Test/Sidebar_Patient.php');

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

@media only screen and (max-width: 768px)
 {
   
.wrapper{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  width: 450px;
   height: 380px; 
  display: flex;
  box-shadow: 0 1px 20px 0 rgba(69,90,100,.08);
}
}
  </style>


 
<body  style="background-color: #ebebd9;">

<div class="content">
  <div class="my_content">
  <div class="header03"><b>My Profile</b></div>

<?php

    $sql_pat = "SELECT * FROM patient_tbl WHERE patient_id = '$_SESSION[patient_id]'";
      $stmt=$conn->prepare($sql_pat);
      $stmt->execute();
      $result_pat=$stmt->get_result();

      $acc_exe = mysqli_query($conn, $sql_pat);
      $exe_pass = mysqli_fetch_assoc($acc_exe);


      if (isset($_POST['update_info'])) {

        $fname1 = $_POST['firstname1'];
        $lname1 = $_POST['lastname1'];
        $con1 = $_POST['Con1'];

        $upt_info = "UPDATE `patient_tbl` SET `firstname`='$fname1',`lastname`='$lname1', `contactno`='$con1' WHERE patient_id = '$_SESSION[patient_id]'";
        mysqli_query($conn,$upt_info);
       

      }


      if(isset($_POST['update'])){

          $acc_pat = $exe_pass['account_id'];

          $current_pass = $_POST['cur_pass'];
          $n_pass = $_POST['new_pass'];
          $c_pass = $_POST['con_pass'];


           if(empty($current_pass)){
        $error = "<p style='text-align: center;'> <b>Current Password</b> Requires Input!</p>";
        echo  '<script> 
          $(document).ready(function(){
          $("#exampleModal1").modal("show");
          });
        </script>';
    }
    else if(empty($n_pass)){
        $error = "<p style='text-align: center;'> <b>New Password</b> Requires Input!</p>";
        echo  '<script> 
          $(document).ready(function(){
          $("#exampleModal1").modal("show");
          });
        </script>';
    }
    else if(empty($c_pass)){
        $error = "<p style='text-align: center;'> Password<b> doesn't match to your new password!</b> </p>";
        echo  '<script> 
          $(document).ready(function(){
          $("#exampleModal1").modal("show");
          });
        </script>';

    }
    else if($n_pass != $c_pass){
        $error = "<p style='text-align: center;'> <b>New Password</b> doesn't Match!</p>";
         echo  '<script> 
          $(document).ready(function(){
          $("#exampleModal1").modal("show");
          });
        </script>';
    }


     else{

        $get = "SELECT * FROM accounts_tbl WHERE account_id = '$acc_pat'";
        $result = mysqli_query($conn, $get);
        $exe_res = mysqli_fetch_assoc($result);

        $pass_record = $exe_res['password'];
        $old_pass = md5($current_pass);

        if($pass_record == $old_pass){

          $new_pass = md5($c_pass);

          $baguhin = "UPDATE accounts_tbl set password = '$new_pass' WHERE account_id = '$acc_pat'";
          mysqli_query($conn, $baguhin);

            echo  '<script> 
            $(document).ready(function(){
            $("#success").modal("show");
            });
                  </script>';
        }
           else{
          $error = "<p style='text-align: center;'> You've entered wrong <b>Current Password</b</p>";
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
    while ($row_pat=$result_pat->fetch_assoc()) { ?>
  <div class="left">
        <img src="../Pics/240820682_4823504134386103_8850075826434454316_n.jpg" 
        alt="user" width="200" style="border-radius: 200px;">
        <h4> <b><?= $row_pat['firstname'].' '.$row_pat['lastname']; ?></b></h4>

        <p>Patient</p>
  </div>
  <div class="right">
    <div class="info">
      <h3>Information</h3>
        <div class="info_data">
          <div class="data">
             <h4></h4>
             <p></p>

             <h4>Address</h4>
             <p><?= $row_pat['barangay'].' '.$row_pat['municipality']; ?></p>
            <h4>Email</h4>
            <p><?= $row_pat['email']; ?></p>
          </div>   
           <div class="data">
              <h4>Phone</h4>
              <p><?= $row_pat['contactno']; ?></p>

              <h4>Patient ID</h4>
              <p><?= $row_pat['patient_id']; ?></p>
        </div>                 
    </div>    
  </div>

  <div class="projects">
     <h3>Action</h3>
     <div class="projects_data">
       <div class="data">
      
      <form method="post">
        <div class="row">
       <button type="button" class="btn btn-primary up" data-toggle="modal" data-target="#exampleModal">Update</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="float: right;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <h1 class="text-center text-info">Update Profile <?php echo $row_pat['patient_id'];?></h1>

                <input type="hidden" name="doc1_id" value="<?= $row_pat['patient_id'];?>"/>

                <label>Firstname:</label>
               <div class="form-group">
                  <input type="text" name="firstname1" class="form-control" value="<?= $row_pat['firstname'];?>" required="">
                </div>

                <label>Lastname:</label>
                <div class="form-group">
                  <input type="text" name="lastname1" class="form-control" value="<?= $row_pat['lastname'];?>" required="">
                </div>

                <label>Contact No.:</label>
                 <div class="form-group">
                  <input type="text" name="Con1" class="form-control" value="<?= $row_pat['contactno']; ?>" required="">
                </div>
                <div class="modal-footer">
                <button onclick="return confirm('Are you sure you want to Update this record?');" type="submit" name="update_info" class="btn btn-success float-right" > Save </button>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="float: right">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
        <h1 class="text-center text-info">CHANGE PASSWORD <?php echo $exe_pass['account_id']?></h1>

                                              <?php if(isset($error)) { ?>
                                              <div class="alert alert-danger" role="alert">
                                                  <?php echo $error; ?>
                                              </div>
                                              <?php } ?>

         <label>Current Password:</label>
         <div class="form-group">
          <input type="password" name="cur_pass" class="form-control">
        </div>


         <label>New Password:</label>
         <div class="form-group">
          <input type="password" name="new_pass" class="form-control">
        </div>

         <label>Confirm Password:</label>
         <div class="form-group">
          <input type="password" name="con_pass" class="form-control">
        </div>

        <div class="modal-footer">
        <button onclick="return confirm('Are you sure you want to Update this record?');" type="submit" name="update" class="btn btn-success float-right" > Save </button>
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