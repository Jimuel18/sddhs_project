<?php
   include('../dbconnection/Login_conn.php');
    include('../dbconnection/Validate_patient.php');
       include('../Header/Login_header.php');
    include('Patient_action.php');
?>
<!DOCTYPE html>
<html>
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

<style>
.header-appointment {
margin-top: -5px;
  width: 800px;
  background-color: rgb(0,0,0,0.5);
  margin: auto;
  color: #0D1E4F;
  padding: 7px;
  text-align: center;
  border-radius: 15px;
  font-size: 30px;
  margin-bottom: 20px;
  font-size: 30px;
  font-family: 'Poppins', sans-serif;
  border-radius: 6px;
  border: solid black;
}
li, a{
color: white;
background-color: black;
border-radius: 50px;
    }
div.foot{
    width: 500px;
    margin: auto;
}


.content{
    margin-left: 0px;
}

@media only screen and (max-width: 768px) {
  /* For mobile phones: */

div.foot {margin-left: 145px; margin-right: 30px; margin-bottom: 20%; width: 300px;}

.header-appointment {margin-left: 14px; width: 400px;}

}

@media only screen and (max-width: 418px) {
    .content{
    margin-left: -22px;
    }

    .nav {padding-left: 50px;}
    .header-appointment {margin-left: 13px; width: 400px;}
    div.date{margin-left: 50px;}
    div.foot {margin-left: 138px; margin-right: 30px; margin-bottom: 20%; width: 250px;}

}

  </style>
<?php 
$doctorid = $_GET['id'];
$show = $_GET['show'];

if($show == 1){
      $query_sched="SELECT dt.firstname, dt.lastname, sd.day, sd.start_time, sd.end_time, sd.status, sd.schedule_id FROM doctor_tbl dt INNER JOIN schedule_tbl sd ON dt.Doctor_id = sd.Doctor_id WHERE dt.Doctor_id = '$doctorid' AND sd.day = 'Sunday' ORDER BY sd.start_time";
      $stmt_sched=$conn->prepare($query_sched);
      $stmt_sched->execute();
      $result_sched=$stmt_sched->get_result();

        date_default_timezone_set('Asia/Manila');
      $Date = date('Y-m-d', strtotime("Sunday this week") );

}
elseif ($show == 2) {
      $query_sched="SELECT dt.firstname, dt.lastname, sd.day, sd.start_time, sd.end_time, sd.status, sd.schedule_id FROM doctor_tbl dt INNER JOIN schedule_tbl sd ON dt.Doctor_id = sd.Doctor_id WHERE dt.Doctor_id = '$doctorid' AND sd.day = 'Monday' ORDER BY sd.start_time";
      $stmt_sched=$conn->prepare($query_sched);
      $stmt_sched->execute();
      $result_sched=$stmt_sched->get_result();

        date_default_timezone_set('Asia/Manila');
      $Date = date('Y-m-d', strtotime("monday this week") );
}
elseif ($show == 3) {
   $query_sched="SELECT dt.firstname, dt.lastname, sd.day, sd.start_time, sd.end_time, sd.status, sd.schedule_id FROM doctor_tbl dt INNER JOIN schedule_tbl sd ON dt.Doctor_id = sd.Doctor_id WHERE dt.Doctor_id = '$doctorid' AND sd.day = 'Tuesday' ORDER BY sd.start_time";
      $stmt_sched=$conn->prepare($query_sched);
      $stmt_sched->execute();
      $result_sched=$stmt_sched->get_result();

        date_default_timezone_set('Asia/Manila');
      $Date = date('Y-m-d', strtotime("tuesday this week") );
}
elseif ($show == 4) {
   $query_sched="SELECT dt.firstname, dt.lastname, sd.day, sd.start_time, sd.end_time, sd.status, sd.schedule_id FROM doctor_tbl dt INNER JOIN schedule_tbl sd ON dt.Doctor_id = sd.Doctor_id WHERE dt.Doctor_id = '$doctorid' AND sd.day = 'Wednesday' ORDER BY sd.start_time";
      $stmt_sched=$conn->prepare($query_sched);
      $stmt_sched->execute();
      $result_sched=$stmt_sched->get_result();

        date_default_timezone_set('Asia/Manila');
      $Date = date('Y-m-d', strtotime("Wednesday this week") );
}
elseif ($show == 5) {
   $query_sched="SELECT dt.firstname, dt.lastname, sd.day, sd.start_time, sd.end_time, sd.status, sd.schedule_id FROM doctor_tbl dt INNER JOIN schedule_tbl sd ON dt.Doctor_id = sd.Doctor_id WHERE dt.Doctor_id = '$doctorid' AND sd.day = 'Thursday' ORDER BY sd.start_time";
      $stmt_sched=$conn->prepare($query_sched);
      $stmt_sched->execute();
      $result_sched=$stmt_sched->get_result();

        date_default_timezone_set('Asia/Manila');
      $Date = date('Y-m-d', strtotime("thursday this week") );
}
elseif ($show == 6) {
   $query_sched="SELECT dt.firstname, dt.lastname, sd.day, sd.start_time, sd.end_time, sd.status, sd.schedule_id FROM doctor_tbl dt INNER JOIN schedule_tbl sd ON dt.Doctor_id = sd.Doctor_id WHERE dt.Doctor_id = '$doctorid' AND sd.day = 'Friday' ORDER BY sd.start_time";
    $stmt_sched=$conn->prepare($query_sched);
      $stmt_sched->execute();
      $result_sched=$stmt_sched->get_result();

        date_default_timezone_set('Asia/Manila');
      $Date = date('Y-m-d', strtotime("friday this week") );
   }
elseif ($show == 7){
     $query_sched="SELECT dt.firstname, dt.lastname, sd.day, sd.start_time, sd.end_time, sd.status, sd.schedule_id FROM doctor_tbl dt INNER JOIN schedule_tbl sd ON dt.Doctor_id = sd.Doctor_id WHERE dt.Doctor_id = '$doctorid' AND sd.day = 'Saturday' ORDER BY sd.start_time";
      $stmt_sched=$conn->prepare($query_sched);
      $stmt_sched->execute();
      $result_sched=$stmt_sched->get_result();


      date_default_timezone_set('Asia/Manila');
      $Date = date('Y-m-d', strtotime("saturday this week") );
}


?>

<div class="content">
    <div class="my_content">


<a href="Patient_Dashboard.php" class="btn btn backk" style="margin-top: 10px;"><i class="fas fa-angle-double-left" style="font-size: 50px; color: #0D1E4F;"></i></a>

<div class="header-appointment">  <i class="fas fa-th-list"></i> <b>Appointment Booking </b></div>

<body style="background-color: #ebebd9;">


   <ul class="nav nav-tabs justify-content-center" style="margin-top: 10px;">

    <li><a href="Appointment.php?id=<?php echo $doctorid ?>&show=1">Sunday</a></li>
    <li><a href="Appointment.php?id=<?php echo $doctorid ?>&show=2">Monday</a></li>
    <li><a href="Appointment.php?id=<?php echo $doctorid ?>&show=3">Tuesday</a></li>
    <li><a href="Appointment.php?id=<?php echo $doctorid ?>&show=4">Wednesday</a></li>
    <li><a href="Appointment.php?id=<?php echo $doctorid ?>&show=5">Thursday</a></li>
    <li><a href="Appointment.php?id=<?php echo $doctorid ?>&show=6">Friday</a></li>
   <li><a href="Appointment.php?id=<?php echo $doctorid ?>&show=7">Saturday</a></li>
  

  </ul>

<div class="date">
<?php
echo "<h4 style='text-align: center; color: white; padding: 10px; width: 100%;  background-color: rgb(0,0,0,0.5); margin: auto; margin-top: 10px;'>| <i class='fas fa-calendar-week'></i> ".date_format (new DateTime($Date), 'F d, Y')."  |</h4>";

date_default_timezone_set("Asia/Manila");
$time = date("h:i A"); 

?>
</div>

  <h2></h2>
  <p></p>
<div class="container-fluid" >
  <div class="row content">
    
    <br>

      <div class="table justify-content-center">
    <table class="table table-striped" style="border: solid black 2px; border-radius: 5px; margin: auto;">
  <tr>
    
    <th style="width: 250px;" scope="col">|Doctor<i class="fas fa-user-md"></i>|</th>
    <th style="width: 350px;">|Day<i class="fas fa-sun"></i>|</th>
    <th style="width: 350px;">|From<i class="fas fa-arrow-circle-down"></i>|</th>
    <th style="width: 350px;">|To<i class="fas fa-arrow-circle-down"></i>|</th>
     <th style="width: 250px;">|Appointment<i class="far fa-calendar-check"></i>|</th>
      

  </tr>
   <tbody>
       <?php
       if ($result_sched->fetch_assoc()==0) {
           ?>
           <tr>
            <td colspan="5" style="text-align:center; border: solid; padding: 10px; background-color: grey;"><b>This Doctor Doesn't Have a Available Schedule this day Yet. Check it later Thank You!</b></td>
           </tr>
           <?php

       }
       else{
            while ($row=$result_sched->fetch_assoc()) { ?>
              <tr>
                <td scope="row"><?= $row['firstname'].' '.$row['lastname'];?></td>
              <td scope="row"><?= $row['day']; ?></td>
               <td scope="row"><?= date('h:i A', strtotime($row['start_time'])); ?></td>
              <td scope="row"><?= date('h:i A', strtotime($row['end_time'])); ?></td>
              <td>
    <?php
            $today = date("Y-m-d");
            $time = ltrim(date("H:i:s"), 0);
            $sched = ltrim($row['start_time'], 0);


            $sched_date = explode("-", $Date);
            $date_now = explode("-", $today);

            $sched_time = explode(":", $sched);
            $time_now = explode(":", $time);

 if($row['status'] == "Not_Available"){
    echo "<label class='disabled' style='color: red;'>Not Available <i class='fas fa-ban'></i></label>";
 }
 else{
            if( $sched_date[0] < $date_now[0]){

                echo "<label class='disabled' style='color: red;'>Not Available <i class='fas fa-ban'></i></label>";

            }else if ($sched_date[0] >= $date_now[0]){

                if( $sched_date[1] < $date_now[1]){

                   echo "<label class='disabled' style='color: red;'>Not Available <i class='fas fa-ban'></i></label>";

                }else if ($sched_date[1] >= $date_now[1]){

                    if($sched_date[2] < $date_now[2]){

                        echo "<label class='disabled' style='color: red;'>Not Available <i class='fas fa-ban'></i></label>";

                    }else if($sched_date[2] == $date_now[2]){

                        if($sched_time[0] < $time_now[0]){

                           echo "<label class='disabled' style='color: red;'>Not Available <i class='fas fa-ban'></i></label>";

                        }else if($sched_time[0] > $time_now[0]){

                            ?>
                            <a href='test_invoice.php?id=<?php echo $doctorid?>&schedule_id=<?php echo $row['schedule_id']?>&date=<?php echo $Date?>' style='color: green; background-color: white;'> Available <i class='fas fa-check-square'></a></i> <?php

                        }else if($sched_time[0] == $time_now[0]){
                            
                            if($sched_time[1] <= $time_now[1]){

                               echo "<label class='disabled' style='color: red;'>Not Available <i class='fas fa-ban'></i></label>";

                            }else if($sched_time[1] > $time_now[1]){

                                ?>
                               <a href='test_invoice.php?id=<?php echo $doctorid?>&schedule_id=<?php echo $row['schedule_id']?>&date=<?php echo $Date?>' style='color: green; background-color: white;'> Available <i class='fas fa-check-square'></a></i><?php
                            
                            }
                        }

                    }else{
                        ?>
                               <a href='test_invoice.php?id=<?php echo $doctorid?>&schedule_id=<?php echo $row['schedule_id']?>&date=<?php echo $Date?>' style='color: green; background-color: white;'> Available <i class='fas fa-check-square'></a></i><?php
                    }
                }

            }
        }
      ?>

        </td>

      </tr>     
 <?php } 

} ?>  

    </tbody>
  </table>
  </div>
</div>
    </div>
  </div>
  </div>
  <div class="foot">
  <h5 style="font-style: italic; color: white; margin-top: 30px; background-color: rgb(0,0,0,0.5); padding: 10px; border-radius: 10px; position: relative; margin-left: -100px;">Note: Schedules will reset after a week! Make sure that you book an appointment "The day before the doctor's schedule". Thankyou! </h5>
  
</form>
</div>

 </div>
</body>
</html>



<script>

   $(function($){
  let url = window.location.href;
  $('li a').each(function() {
    if (this.href === url) {
      $(this).closest('li').addClass('active');
    }
  });
});

   if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

    
</script>



   