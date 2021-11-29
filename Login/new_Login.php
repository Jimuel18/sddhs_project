<?php
  include('../Header/Login_header.php');
  include ('../dbconnection/Login_conn.php');
      

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
               
                header("location: new_Login.php?error=Incorrect Username or password! ");
          }
           
     }
     else{
          header("location: new_Login.php?error=All Fields are Required!");
     }
}


       
?>


<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="Login.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   </head>
<body style="background-image: url('../Pics/back123.jpeg'); background-size: cover;">
  <div class="container">
    <div class="cover">
      <div class="front">
        <!--<img src="images/frontImg.jpg" alt="">-->
        <div class="text">
          <span class="text-1">Malasakit at<br> Serbisyong Matapat</span>
          <span class="text-2">Sto. Domingo District Hospital</span>
        </div>
      </div>
      <div class="back">
        <div class="text">
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title"><b>S.D.D.H.S Login</b></div>

            <!-- Login  -->

          <form method="post">
            <div class="input-boxes">
              <div class="input-box">
               <i class="fas fa-user-tie"></i>

                <input type="text" name="username" placeholder="username" required="" id="username">
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="password" required="" >
              </div>

               <div><label  class="text forgot"><a href="Forgot_Pass.php" name="forgotpass">Forgot Password?</label></a></div>
              <div class="text">

                <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
            
              <div class="button input-box">
                <button type="submit" value="Login" name="Login_Button">Login</button>
                 
              </div>

              <div class="text sign-up-text">Don't have an account? <label><a href="../Register/new_reg_patient.php" name="SignUp">Sigup now</label></a></div>
              </div>
        </form>
      </div>     
    </div>
    </div>
  </div>




</body>
</html>








