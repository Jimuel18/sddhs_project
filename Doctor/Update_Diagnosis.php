<?php
 include('../dbconnection/Login_conn.php');
    include('../dbconnection/Validate_doctor.php');
    include('../Header/Login_Header.php');
     include('../ADMIN/Admin_action.php');

     $pat_id = $_GET['id'];

     $update_diag = "SELECT * FROM patient_diagnosis_tbl WHERE patient_id = '$pat_id'";
     $ex_update = mysqli_query($conn, $update_diag);
     $res_update = mysqli_fetch_assoc($ex_update);


     if (isset($_POST['uptRecord'])) {

      $HI = $_POST['history1'];
      $BP = $_POST['bp1'];
      $RR = $_POST['rest1'];
      $TP = $_POST['temp1'];
      $HT = $_POST['height1'];
      $WT = $_POST['weight1'];
      $FD = $_POST['find1'];
       
       $up_diag = "UPDATE `patient_diagnosis_tbl` SET `Historyofillness`='$HI',`bloodpressure`='$BP',`rest_rate`='$RR',`temperature`='$TP',`height`='$HT ',`weight`='$WT ',`findings`='$FD' WHERE patient_id = '$pat_id'";
       $exe_up = mysqli_query($conn, $up_diag);


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


    
                      <form method="post">
                         <div class=" form-row">
                          <input type="hidden" name="id" value="<?= $pat_id?>">
                        <div class="form-group col-md-12">
                          <h4>Results</h4>
                        </div>

                         <div class="form-group col-md-5">
                          <label>History of Illness</label>
                         <input type="text" name="history1" class="form-control" value="<?php echo $res_update['Historyofillness']; ?>" placeholder="History of illness" required="">
                         </div>

                         <div class="form-group col-md-5">
                          <label>Blood Pressure</label>
                         <input type="text" name="bp1" class="form-control" value="<?php echo $res_update['bloodpressure']; ?>" placeholder="Blood Pressure" required="">
                         </div>


                         <div class="form-group col-md-5">
                          <label>Rest Rate</label>
                         <input type="text" name="rest1" class="form-control" value="<?php echo $res_update['rest_rate']; ?>" placeholder="Rest Rate" required="">
                         </div>

                          <div class="form-group col-md-5">
                            <label>Temperature</label>
                          <input type="num" name="temp1" class="form-control" value="<?php echo $res_update['temperature']; ?>" placeholder="Temperature" required="">
                          </div>

                          <div class="form-group col-md-5">
                            <label>Height</label>
                          <input type="text" name="height1" class="form-control" value="<?php echo $res_update['height']; ?>" placeholder="Height" required="">
                          </div>

                          <div class="form-group col-md-5">
                            <label>Weight</label>
                          <input type="text" name="weight1" class="form-control" value="<?php echo $res_update['weight']; ?>" placeholder="Weight" required="">
                          </div>

                          <div class="form-group col-md-10">
                            <label>Result</label>
                          <textarea name="find1" rows="3" class="form-control" required="" style="resize: none;"><?php echo $res_update['findings']; ?></textarea>
                          </div>

                               <div class="form-group col-md-5 center">
                               <?php
                                if ($update==true) { ?>
                                  <input type="submit" name="update1" class="btn btn-success btn-block" value="Update Record From Doctor">

                                  <input type="submit" name="cancel1" class="btn btn-danger btn-block" value="Cancel">
                                <?php } else {?>
                                </div>


                        </div>
                     

                                 
                                  <a href="Doctor_Dashboard.php" class="btn btn-warning float-right" style="margin-left: 5px;">Close</a>
                                   <input type="submit" name="uptRecord" class="btn btn-primary float-right" value="Update" >
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