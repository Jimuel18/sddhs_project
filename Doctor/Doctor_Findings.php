<?php
 include('../dbconnection/Login_conn.php');
    include('../dbconnection/Validate_doctor.php');
    include('../Header/Login_Header.php');
     include('../ADMIN/Admin_action.php');


      if(isset($_POST['addRecord']))
    {
    $patientid = $_GET['id']; 
    $schedule_id = $_GET['schedule_id'];

    $doctor_id = $_SESSION['doc_id'];
    $History_of_illness=$_POST['history'];
    $Blood_Pressure=$_POST['bp'];
    $Rest_Rate=$_POST['rest'];
    $Temperature=$_POST['temp'];
    $Height=$_POST['height'];
    $Weight=$_POST['weight'];
    $Findings=$_POST['find'];
    
    $query_diag = "INSERT INTO `patient_diagnosis_tbl`(`patient_id`,`Doctor_id`,`Historyofillness`, `bloodpressure`, `rest_rate`, `temperature`, `height`, `weight`, `findings`) VALUES ('$patientid','$doctor_id','$History_of_illness','$Blood_Pressure','$Rest_Rate','$Temperature','$Height','$Weight','$Findings')";
    mysqli_query($conn, $query_diag);

    $update_stat1 = "UPDATE `schedule_tbl` SET status='Available' WHERE schedule_id = '$schedule_id'";
         $update_stat = mysqli_query($conn, $update_stat1);

    $update_app = "UPDATE `appointment_tbl` SET Completed='Done' WHERE schedule_id = '$schedule_id'";
     $update_app1 = mysqli_query($conn, $update_app);

    header('location: ../DOCTOR/Doctor_Dashboard.php');
  }



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
<style type="text/css">
 .header07 {
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

}
</style>

 <body style="margin: auto; max-width: 80%; margin-top: 100px; background-color: #ebebd9;">

 <div class="header07"><b>Post Diagnosis</b></div>

<div class="my_content">
            <div class="panel panel-default" style="margin-top: 40px;">
              <div class="panel-heading">Doctor Findings</div>
              <div class="panel-body">


                      <input type="hidden" name="id" value="<?= $patientid; ?>">
                      <form method="post">
                         <div class=" form-row">

                        <div class="form-group col-md-12">
                          <h4>Results</h4>
                        </div>

                                              <div>
                                                <?php
                                              if (isset($_SESSION['response'])) { ?>
                                              <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <?= $_SESSION['response']; ?>
                                              </div>
                                              <?php } unset($_SESSION['response']); ?>
                                              </div>

                         <div class="form-group col-md-5">
                          <label>History of Illness</label>
                         <input type="text" name="history" class="form-control" value="<?= $History_of_illness; ?>" placeholder="History of illness" required="">
                         </div>

                         <div class="form-group col-md-5">
                          <label>Blood Pressure</label>
                         <input type="text" name="bp" class="form-control" value="<?= $Blood_Pressure; ?>" placeholder="Blood Pressure" required="">
                         </div>


                         <div class="form-group col-md-5">
                          <label>Rest Rate</label>
                         <input type="text" name="rest" class="form-control" value="<?= $Rest_Rate; ?>" placeholder="Rest Rate" required="">
                         </div>

                          <div class="form-group col-md-5">
                            <label>Temperature</label>
                          <input type="num" name="temp" class="form-control" value="<?= $Temperature; ?>" placeholder="Temperature" required="">
                          </div>

                          <div class="form-group col-md-5">
                            <label>Height</label>
                          <input type="text" name="height" class="form-control" value="<?= $Height; ?>" placeholder="Height" required="">
                          </div>

                          <div class="form-group col-md-5">
                            <label>Weight</label>
                          <input type="text" name="weight" class="form-control" value="<?= $Weight; ?>" placeholder="Weight" required="">
                          </div>

                          <div class="form-group col-md-10">
                            <label>Result</label>
                          <textarea type="text" name="find" rows="3" class="form-control" value="<?= $Findings; ?>" placeholder="Findings" required="" style="resize: none;"></textarea>
                          </div>

                               <div class="form-group col-md-5 center">
                               <?php
                                if ($update==true) { ?>
                                  <input type="submit" name="update" class="btn btn-success btn-block" value="Update Record From Doctor">

                                  <input type="submit" name="cancel" class="btn btn-danger btn-block" value="Cancel">
                                <?php } else {?>
                                </div>


                        </div>
                     

                                 
                                  <a href="Doctor_Dashboard.php" class="btn btn-warning float-right" style="margin-left: 5px;">Close</a>
                                   <input type="submit" name="addRecord" class="btn btn-primary float-right" value="Post Diagnostics" >
                                 </form>
                         <?php } ?>
                    </div>
                </div>
              
                
              </div>
          


</div>
</body>
</html>

<script>
if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


