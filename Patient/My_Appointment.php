<?php 
 include('../dbconnection/Login_conn.php');
     include('../dbconnection/Validate_patient.php');
   include('../Header/header.php');
    include('../Sidebar_Header_Test/Sidebar_Patient.php');
        include('Patient_action.php');


    $query_app = "SELECT pt.patient_id, pt.firstname, pt.lastname, pt.middlename, ap.appointment_id, ap.Complain, st.day, st.start_time, st.end_time, dt.firstname, dt.lastname, dt.middlename, sp.Specialization_Type, ap.Date, ap.Completed, ap.schedule_id FROM patient_tbl pt INNER JOIN appointment_tbl ap ON pt.patient_id = ap.patient_id INNER JOIN schedule_tbl st ON ap.schedule_id = st.schedule_id INNER JOIN doctor_tbl dt ON st.doctor_id = dt.doctor_id INNER JOIN specialization_tbl sp ON dt.Specialization_id = sp.Specialization_id WHERE pt.patient_id = '$_SESSION[patient_id]'";
      $stmt=$conn->prepare($query_app);
      $stmt->execute();
      $result_app=$stmt->get_result();


      if (isset($_POST['view_app'])) {

   $view = $_POST['app'];

    $show_diag = "SELECT * FROM appointment_tbl WHERE appointment_id = '$view'";
 $stmt_diag=$conn->prepare($show_diag);
 $stmt_diag->execute();
 $result_diag=$stmt_diag->get_result();

 echo "<script type='text/javascript'>
          $(document).ready(function(){
          $('#myApp').modal('show');
          });
          </script>";
}


      if (isset($_POST['cancel_app'])) {

        $app_id = $_POST['app'];

        $sched = explode('|',$app_id);
        $app_id = $sched[0];
        $s_id = $sched[1];


        $cancel_app = "DELETE FROM `appointment_tbl` WHERE appointment_id = '$app_id'";
        mysqli_query($conn, $cancel_app);

         if($cancel_app == true){
  $message = "Appointment Cancelled!";

         $update_stat = "UPDATE `schedule_tbl` SET status='Available' WHERE schedule_id = '$s_id'";
         $update_stat = mysqli_query($conn, $update_stat);

          header('location: My_Appointment.php');

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
   h2 {
 text-align: center;
 background-color: #28334AFF;
 width: 300px;
 margin:auto; 
 color: #FBDE44FF;
}
table, thead, tr, th {
  text-align: center;
}
.header00 {
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

.butche{
  align-items: center;
  border: none;
}

@media only screen and (max-width: 768px) {
  /* For mobile phones: */

div.container { max-width: 470px;}

div.well{ margin-left: 55px;}

.butche {width: 40px; height: 40px; }
b {
  display: none;
}

h2 {margin-top: 50px; margin-left: 80px;}

div.header00 {margin-left: 100px; width: 280px; height: 120px; margin-top: 30px; }

}

</style>
<body style="background-color: #ebebd9;">
<div class="content" >
  <div class="my_content">

  <div class="header00">My Appointment</div>

<div class="well" style="margin-top: 15px;">
<div class="container-fluid" style="width: 100%; height: 100%; overflow-x: auto;">

<table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>Doctor</th>
        <th>Date</th>
        <th>From</th>
        <th>End</th>
        <th>Completed</th>
        <th>Action</th>
        <th></th>

      
      </tr>
    </thead>
</tbody>

    <tbody>
       <?php 
    while ($row=$result_app->fetch_assoc()) { ?>
      <tr>
          <td><?= $row['firstname'].' '.$row['lastname']; ?></td>
          <td><?= $row['Date']?></td>
          <td><?= date('h:i A', strtotime($row['start_time'])); ?></td>
          <td><?= date('h:i A', strtotime($row['end_time'])); ?></td>
          <td><?= $row['Completed']?></td>    

        <td>
          <form method="post" class="row-4">
          <input type="hidden" name="app" value="<?= $row['appointment_id'].'|'.$row['schedule_id']?>">
          <a href="View_Appointment.php?id=<?php echo $row['appointment_id']; ?>" type="submit" class="btn btn-success butche" name="view_app"> <i class="far fa-eye"></i> <b>View</b>  </a>
          <button onclick="return confirm('Are you sure you want to Cancel your Appointment?');"  type="submit" name="cancel_app" class="btn btn-danger butche" > <i class="far fa-window-close"></i> <b>Cancel</b> </button>

          </form>
      
      </tr>     
 <?php } ?>  
    </tbody>
  </table>

<!-- The Modal -->
  <div class="modal fade" id="myApp">
    <div class="modal-dialog modal-xl">
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
    <th>Appointment_ID </th>
    <th>Schedule_ID </th>
    <th>Date </th>
    <th>Your Complain </th>
  
            </tr>
          </thead>

     <tbody class="table">
         <?php while($row2=$result_diag->fetch_assoc()){?>
          <tr>
        <th scope="row"><?= $row2['appointment_id']; ?></th>
        <td><?= $row2['schedule_id']; ?></td>
        <td><?= $row2['Date']; ?></td>
        <td><?= $row2['Complain']; ?></td>
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