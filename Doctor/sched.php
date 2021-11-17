<?php
  include('../dbconnection/Login_conn.php');
  include('../dbconnection/Validate_doctor.php');
  include('../Header/header.php');
  include('../Sidebar_Header_Test/Sidebar_Doctor.php');
  


if (isset($_POST['Add'])) {

  $Day = $_POST['day'];
  $Start = $_POST['start_time'];
  $End = $_POST['end_time'];
  $status = "Available";
  $doc_id = $_SESSION['doc_id'];

  $query = "INSERT INTO schedule_tbl (day,Doctor_id,start_time,end_time,status) VALUES ('$Day','$doc_id','$Start','$End','$status')";
  $query_run = mysqli_query($conn, $query);

}


  if (isset($_POST['update_sched'])) {
   
  $s_id = $_POST['sched_id'];

  $Day_up = $_POST['day1'];
  $Start_up = $_POST['start_time1'];
  $End_up = $_POST['end_time1'];

  $query_upt = "UPDATE `schedule_tbl` SET `day`='$Day_up',`start_time`='$Start_up',`end_time`='$End_up', status = 'Available' WHERE schedule_id = '$s_id'";
  mysqli_query($conn, $query_upt);
 }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="author" content="Jim">
  <title>STO. DOMINGO DISTRICT HOSPITAL</title>

    <link rel="stylesheet" href="../Sidebar_Header_Test/Sidebar.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scales=1.0">
 
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script  src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js">  </script>



<style>
.container{
  margin-right: 25%;

}

.table-wrapper {
  width: 130%;
  padding: 20px 25px;
  margin: 40px 0;
  border-radius: 3px;
  box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
 .table-title {        
  padding-bottom: 15px;
  background: #0d2438;
  color: #fff;
  padding: 16px 30px;
  margin: -20px -25px 10px;
  border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
  margin: 5px 0 0;
  font-size: 24px;
  position: relative;
 }
 .table-title .btn-group {
  float: right;
 }
 .table-title .btn {
  color: #fff;
  float: right;
  font-size: 13px;
  border: none;
  min-width: 50px;
  border-radius: 2px;
  border: none;
  outline: none !important;
  margin-left: 10px;
 }
 .table-title .btn i {
  float: left;
  font-size: 21px;
  margin-right: 5px;
 }
 .table-title .btn span {
  float: left;
  margin-top: 2px;
 }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
  padding: 12px 15px;
  vertical-align: middle;
    }
 table.table tr th:first-child {
  width: 60px;
 }
 table.table tr th:last-child {
  width: 100px;
 }
    table.table-striped tbody tr:nth-of-type(odd) {
     background-color: #fcfcfc;
 }
 table.table-striped.table-hover tbody tr:hover {
  background: #f5f5f5;
 }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    } 
    table.table td:last-child i {
  opacity: 0.9;
  font-size: 22px;
        margin: 0 5px;
    }
 table.table td a {
  font-weight: bold;
  color: #566787;
  display: inline-block;
  text-decoration: none;
  outline: none !important;
 }
 table.table td a:hover {
  color: #2196F3;
 }
 table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
 table.table .avatar {
  border-radius: 50%;
  vertical-align: middle;
  margin-right: 10px;
 }
 .dataTables_filter {
   width: 50%;
   float: right;
   text-align: left;
   margin-right: -130px;

}

div.dataTables_length label {
  display: inline-block;
  margin-bottom: 0.5rem;

}

</style>
</head>

 <?php 
      $query_sched="SELECT dt.firstname, dt.lastname, sd.schedule_id, sd.day, sd.start_time, sd.end_time, sd.status FROM doctor_tbl dt INNER JOIN schedule_tbl sd ON dt.Doctor_id = sd.Doctor_id WHERE sd.Doctor_id = '$_SESSION[doc_id]'";
      $stmt_sched=$conn->prepare($query_sched);
      $stmt_sched->execute();
      $result_sched=$stmt_sched->get_result();





?>


<body style="background-color: #ebebd9;">
<div class="content">
  <div class="my_content">


<div class="container">
  <div class="result">
    
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row justify-content-center">
          <div class="col-sm-6">
             <h2>Doctor <b>Schedule</b></h2>
          </div>

          <div class="container-fluid" >
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addsched">
            <i class="fa fa-plus"></i> <span>Add New Schedule</span></button>
          </div>
        </div>
      </div>

      <div >
        <table class="table table-striped table-hover mx-auto w-auto" id="example" style="overflow-x: auto;">
          <thead>
            <th style="text-align: center;">Doctor</th>
            <th style="text-align: center;">Day</th>
            <th style="text-align: center;">From</th>
            <th style="text-align: center;">To</th>
            <th style="text-align: center;">Appointment</th>
            <th style="text-align: center;">Action</th> 
            </th>
          </thead>
          <tbody>
            <?php 
              while ($row=$result_sched->fetch_assoc()) { ?>
                <tr>
                <td scope="row" style="text-align: center;"><?= $row['firstname'].' '.$row['lastname'];?></td>
                <td scope="row" style="text-align: center;"><?= $row['day']; ?></td>
                <td scope="row" style="text-align: center;"><?= date('h:i A', strtotime($row['start_time'])); ?></td>
                <td scope="row" style="text-align: center;"><?= date('h:i A', strtotime($row['end_time'])); ?></td>
                <td scope="row" style="text-align: center;">
                  <?php

                  if($row['status'] == "Available")
                  {
                    ?> <p  style="background-color: green; padding: 5px; width: 120px; color: black; display: inline-block; border-radius: 50px;"><b><?= $row['status']; ?></b></p>
                    <?php
                  }

                  elseif($row['status'] == "Not_Available")
                  {
                    ?>
                    <p  style="background-color: red; padding: 5px; width: 120px; color: black; display: inline-block; border-radius: 50px;"><b><?= $row['status']; ?></b></p>
                    <?php
                  }


                 ?></td>
                <td style="text-align: center;">
                  <button class="btn btn-default view" type="submit" data-toggle="modal" data-target="#updateschedModal<?= $row['schedule_id']?>" style="color: black;"> Update <i class="fas fa-edit"></i></button>
                     </td>
              </tr>
              <div class="modal fade" id="updateschedModal<?= $row['schedule_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form method="post">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Update Schedule</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
         <div class="form-row text-center">
    <div class="form-group col-md-11">
      <label  style="color: black;"><b>Day</b></label>

      <select type="Day" class="form-control text-center" id="inputPassword4" placeholder="Date" name="day1" style="width: 250px; margin:auto;">
        <option value="Monday" <?php if($row['day'] == "Monday" ) { echo "Selected";}?>>Monday</option>
        <option value="Tuesday" <?php if($row['day'] == "Tuesday" ) { echo "Selected";}?>>Tuesday</option>
        <option value="Wednesday" <?php if($row['day'] == "Wednesday" ) { echo "Selected";}?>>Wednesday</option>
        <option value="Thursday" <?php if($row['day'] == "Thursday" ) { echo "Selected";}?>>Thursday</option>
        <option value="Friday" <?php if($row['day'] == "Friday" ) { echo "Selected";}?>>Friday</option>
        <option value="Saturday" <?php if($row['day'] == "Saturday" ) { echo "Selected";}?>>Saturday</option>
        <option value="Sunday" <?php if($row['day'] == "Sunday" ) { echo "Selected";}?>>Sunday</option>
      </select>
    </div>
  </div>

    <input type="hidden" name="sched_id" value="<?= $row['schedule_id']?>">

      <div class="form-group">
    <label for="inputAddress"  style="color: black; margin: auto;"><b>Start Time</b></label>
    <input type="Time" class="form-control text-center" id="inputAddress" placeholder="Time" name="start_time1" value="<?= date('H:i', strtotime($row['start_time'])); ?>">
  </div>

  <div class="form-group">
    <label for="inputAddress2"  style="color: black; margin: auto;"><b>End Time</b></label>
    <input type="Time" class="form-control text-center" id="inputAddress2" placeholder="Consultation Time" name="end_time1" value="<?= date('H:i', strtotime($row['end_time'])); ?>">
  </div> 
        <div class="form-group">
              <div class="modal-footer">
              <button type="submit" name="update_sched" class="btn btn-success float-right" > Update</button>
               <a href="Patient.php" class="btn btn-danger float-right" data-dismiss="modal">Cancel</a>
              </div>   
        </div>   
      </form>
    </div>
      </div>
      </div>
              <?php } ?>  
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>





<!-- Modal -->
<div class="modal fade" id="addsched" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form method="post" style="width: 100%;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">ADD SCHEDULE</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">

       <div class="form-row text-center">
    <div class="form-group col-md-11">
      <label  style="color: black;"><b>Day</b></label>
      <select type="Day" class="form-control text-center" id="inputPassword4" placeholder="Date" name="day" style="width: 250px; margin:auto;">
        <option>Monday</option>
        <option>Tuesday</option>
        <option>Wednesday</option>
        <option>Thursday</option>
        <option>Friday</option>
        <option>Saturday</option>
        <option>Sunday</option>
      </select>
    </div>
  </div>

      <div class="form-group">
    <label for="inputAddress"  style="color: black; margin: auto;"><b>Start Time</b></label>
    <input type="Time" class="form-control text-center" id="inputAddress" placeholder="Time" name="start_time" required="">
  </div>

  <div class="form-group">
    <label for="inputAddress2"  style="color: black; margin: auto;"><b>End Time</b></label>
    <input type="Time" class="form-control text-center" id="inputAddress2" placeholder="Consultation Time" name="end_time">
  </div>
 
  <div class="modal-footer">
     <button type="submit" onclick="return confirm('Do you want to add this Schedule?');" name="Add" class="btn btn-warning float-right" > ADD</button>

     <a href="Patient.php" class="btn btn-danger float-right" data-dismiss="modal">Cancel</a>
   </div>

</form>
</div>
      </div>
    </div>
  </div>
</div>



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

 $(document).ready( function () {
    $('#example').DataTable();
} );

 $('#example').dataTable( {
    "oLanguage": {
      "sLengthMenu": "Show Entries_MENU_",
    }
});

     function showMessage() {
       alert("Your Schedule has been Successfully Added!");
     }

</script> 

</body>
</html>