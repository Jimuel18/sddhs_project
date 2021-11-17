<?php
include('../dbconnection/Login_conn.php');
include('../dbconnection/Validate_doctor.php');
include('../ADMIN/Admin_action.php');
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
  <style>
    .title {
  font-size: 15px;
  text-align: center;
}

body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

h2 {
 text-align: center;
 background-color: #28334AFF;
 width: 300px;
 margin:auto; 
 color: #FBDE44FF;
}

table, th, td {
  text-align: center;
}


.header2 {
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
  
}
  </style>


<div class="content">
  <div class="my_content">

<body style="background-color: #ebebd9;">

  <div class="header2"><b>My Appointment</b></div>

<?php


         $query_sched="SELECT pt.patient_id, pt.firstname, pt.lastname, sd.day, sd.start_time, sd.end_time, ap.complain, sd.schedule_id, ap.Completed FROM patient_tbl pt INNER JOIN appointment_tbl ap ON pt.patient_id = ap.patient_id INNER JOIN schedule_tbl sd ON ap.schedule_id = sd.schedule_id WHERE sd.Doctor_id = '$_SESSION[doc_id]'";
         $stmt_sched=$conn->prepare($query_sched);
         $stmt_sched->execute();
         $result_sched=$stmt_sched->get_result();


if (isset($_POST['view'])) {

  $view = $_POST['view_id'];

    $show_diag = "SELECT * FROM patient_diagnosis_tbl WHERE patient_id = '$view'";
 $stmt_diag=$conn->prepare($show_diag);
 $stmt_diag->execute();
 $result_diag=$stmt_diag->get_result();

 echo "<script type='text/javascript'>
          $(document).ready(function(){
          $('#myModal_Post').modal('show');
          });
          </script>";
}

?>

   
    <br>
    
    <div class="container-fluid" style="margin: auto;">
      <div class="well">
<table class="table table-striped">
   <thead class="thead-dark">
  <tr>
    <th scope="row">Patient Name</th>
    <th>Day</th>
    <th>From</th>
    <th>To</th>
    <th>Complain</th>
            <th style="text-align: center">Status</th>
    <th style="text-align: center;">Action</th>


  </tr>
</thead>
   <tbody>
     <?php 
    
    if($result_sched->fetch_assoc()==0)
    {
    ?>
    <tr>
      <td>
         <td colspan="7" style="text-align: center; border: solid; padding: 8px; background-color: grey;"><b>Empty!</b></td>
      </td>

    </tr>

    <?php
    }


    while ($row1=$result_sched->fetch_assoc()) { ?>
      <tr>
        <th scope="row"><?= $row1['firstname'].' '.$row1['lastname']; ?></th>
        <td><?= $row1['day']; ?></td>
        <td><?= date('h:i A', strtotime($row1['start_time'])); ?></td> 
        <td><?= date('h:i A', strtotime($row1['end_time'])); ?></td>
         <td><?= $row1['complain']; ?></td>
          <td style="text-align:center"><?= $row1['Completed']; ?></td>
             <td style="text-align:center;">


              <?php if ($row1['Completed'] == "Done")
              { 
              ?>

               <a href="Doctor_Findings.php?id=<?= $row1['patient_id']?>&schedule_id=<?php echo $row1['schedule_id']?>" type="submit" class="btn btn-success" style=" margin-right: 10px; width: 150px; display: inline-block;"><i class="fas fa-file-export"></i> Edit </a>

              <?php
                  
              }
              elseif($row1['Completed'] == "Pending"){
              ?>

               <a href="Doctor_Findings.php?id=<?= $row1['patient_id']?>&schedule_id=<?php echo $row1['schedule_id']?>" type="submit" class="btn btn-success" style=" margin-right: 10px; width: 150px; display: inline-block;"><i class="fas fa-file-export"></i> Post Diagnosis </a>

              <?php

              }
              ?>
           <form method="post" style="display: inline-block;">
            <input type="hidden" name="view_id" value="<?= $row1['patient_id']?>">
          <button type="submit" name="view" class="btn btn-warning"><i class="fas fa-eye"></i>View Record</button>
          </form>

        </td>
      </tr>      
    </tbody>
  </tr>
    <?php 

} ?> 

</table>
</div>






 <!-- The Modal -->
  <div class="modal fade" id="myModal_Post">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Patient Record <?php echo $view; ?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-striped">
          <thead>
            <tr>
    <th>History of Illness </th>
    <th>Date of Diagnosis </th>
    <th>Blood Pressure </th>
    <th>Rest_Rate</th>
    <th>Temperatue</th>
    <th>Height</th>
    <th>Weight</th>
    <th>Findings</th>
            </tr>
          </thead>

     <tbody class="table">
         <?php while($row2=$result_diag->fetch_assoc()){?>
          <tr>
        <td><?= $row2['Historyofillness']; ?></td>
        <td><?= $row2['dateofdiagnosis']; ?></td>
        <td><?= $row2['bloodpressure']; ?></td>
         <td><?= $row2['rest_rate']; ?></td>
          <td><?= $row2['temperature']; ?></td>
           <td><?= $row2['height']; ?></td>
            <td><?= $row2['weight']; ?></td>
             <td><?= $row2['findings']; ?></td>
              </tr>
          </tbody>
        <?php }?>
      </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>



</div>

</body>
 </html>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

   if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }


</script> 

     