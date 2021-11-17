<?php
  include('../dbconnection/Login_conn.php');
    include('../dbconnection/Validate_patient.php');
    include('../Header/Login_header.php');
    include('../ADMIN/Admin_action.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Invoice</title>
  <link rel="stylesheet" href="style.css">
  <link rel="license" href="https://www.opensource.org/licenses/mit-license/">
  <!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
</head>


<style>
  
  /* reset */

* {
  border: 0;
  box-sizing: content-box;
  color: inherit;
  font-family: inherit;
  font-size: inherit;
  font-style: inherit;
  font-weight: inherit;
  line-height: inherit;
  list-style: none;
  margin: 0;
  padding: 0;
  text-decoration: none;
  vertical-align: top;
}




h1 {
  font: bold 100% sans-serif;
  letter-spacing: 0.5em;
  text-align: center;
  text-transform: uppercase;
}



table {
  font-size: 75%;
  table-layout: fixed;
  width: 100%;
}
table {
  border-collapse: separate;
  border-spacing: 2px;
}
th,
td {
  border-width: 1px;
  padding: 0.5em;
  position: relative;
  text-align: left;
}
th,
td {
  border-radius: 0.25em;
  border-style: solid;
}
th {
  background: #eee;
  border-color: #bbb;
}
td {
  border-color: #ddd;
}


html {
  font: 16px/1 "Open Sans", sans-serif;
  overflow: auto;
  padding: 0.5in;
}
html {
  background: #999;
  cursor: default;
}

body {
  box-sizing: border-box;
  height: 11in;
  margin: 0 auto;
  overflow: hidden;
  padding: 0.5in;
  width: 8.5in;
}
body {
  background: #fff;
  border-radius: 1px;
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
}




header:after {
  clear: both;
  content: "";
  display: table;
}

header h1 {
  background: #000;
  border-radius: 0.25em;
  color: #fff;
  margin: 0 0 1em;
  padding: 0.5em 0;
}
div address {
  font-size: 75%;
  font-style: normal;
  line-height: 1.25;
  margin: 0 1em 1em 0;
}
div address p {
  margin: 0 0 0.25em;
}

header span {
  max-height: 25%;
  max-width: 60%;
  position: relative;
}



article,
article address,
table.meta,
table.inventory {
  margin: 0 0 3em;
}
article:after {
  clear: both;
  content: "";
  display: table;
}
article h1 {
  clip: rect(0 0 0 0);
  position: absolute;
}

article address {
  float: left;
  font-size: 125%;
  font-weight: bold;
}



table.meta,
table.balance {
  float: right;
  width: 36%;
}
table.meta:after,
table.balance:after {
  clear: both;
  content: "";
  display: table;
}



table.meta th {

  width: 40%;
}
table.meta td {
  text-align: center;
  width: 60%;
}




table.inventory {
  clear: both;
  width: 100%;
}
table.inventory th {
  font-weight: bold;
  text-align: center;
}

table.inventory td:nth-child(1) {
   text-align: center;
  width: 26%;
}
table.inventory td:nth-child(2) {
   text-align: center;
  width: 38%;
}
table.inventory td:nth-child(3) {
  text-align: center;
  width: 12%;
}
table.inventory td:nth-child(4) {
  text-align: center;
  width: 12%;
}
table.inventory td:nth-child(5) {
  text-align: center;
  width: 12%;
}





table.balance th,
table.balance td {
  width: 50%;
}
table.balance td {
  text-align: right;
}



aside h1 {
  border: none;
  border-width: 0 0 1px;
  margin: 0 0 1em;
}
aside h1 {
  border-color: #999;
  border-bottom-style: solid;
}


.logman{
  width: 200px;
  margin-left: 250px;

}
.beside{
  text-align: center;
 
}

table.com,
table. {
  float: left;
  width: 36%;
}

.in {
  width: 705px;
  height: 40px;
}
button {
  width: 100px;
    float: left;
    background: #555;
    padding: 10px 15px;
    color: #fff;
    border-radius: 5px;
    border: none;
    margin-top: 10px;
    }
button:hover{
    opacity: .7;
}
@media screen and (min-width: 400px) {
  .media {
    width: 350px;
  }
@media screen and (min-width: 600px) {
  .media {
    width: 500px;
  }
}

@media screen and (min-width: 800px) {
  .media {
   width: 700px;
  }
}


@media screen and (min-width: 400px) {
  .head1 {

    width: 350px;
  }
@media screen and (min-width: 600px) {
  .head1 {
    width: 500px;
  }
}

@media screen and (min-width: 800px) {
  .head1 {
   width: 700px;
  }
}




</style>

<body style="margin-top: 50px;">
  

<?php 
$schedule_id = $_GET['schedule_id'];
$query_pat = "SELECT dt.firstname, dt.lastname, sd.day, sd.start_time, sd.end_time, sd.status, st.Specialization_Type FROM schedule_tbl sd  INNER JOIN doctor_tbl dt ON sd.Doctor_id = dt.Doctor_id INNER JOIN specialization_tbl st ON dt.Specialization_id = st.Specialization_id WHERE sd.schedule_id = '$schedule_id'";
 $stmt=$conn->prepare($query_pat);
      $stmt->execute();
      $result_pat=$stmt->get_result();

      $row_pat=$result_pat->fetch_assoc();


$query_res = "SELECT * FROM patient_tbl WHERE patient_id = '$_SESSION[patient_id]'";
$stmt=$conn->prepare($query_res);
$stmt->execute();
 $result_res=$stmt->get_result();

  $row=$result_res->fetch_assoc();


       if (isset($_POST['book'])) {
         
         $Date = $_POST['date'];
         $Complain = $_POST['comp'];
         $p_id = $_SESSION['patient_id'];
         $stat = "Pending";

         $query_app = "INSERT INTO `appointment_tbl`(`patient_id`, `schedule_id`,`Date`, `Complain`,`Completed`) VALUES ('$p_id','$schedule_id','$Date','$Complain','$stat')";
         $query_app_exe = mysqli_query($conn, $query_app);

         $updatestatus = "UPDATE `schedule_tbl` SET status='Not_Available' WHERE schedule_id = '$schedule_id'";
         $update_stat = mysqli_query($conn, $updatestatus);

         echo "<script type='text/javascript'>
          $(document).ready(function(){
          $('#exampleModalCenter').modal('show');
          });
          </script>";
      }


?>
   

  <div class="head1">

    <address>
      <img class="logman" src="../Pics/241359692_549745289476479_98065932882723701_n.png">
      <p class="beside">E-Medic Online Appointment</p>
      <p class="beside">Sto. Domingo District Hospital</label><br>
      <p class="beside">Pulong Buli, Sto. Domingo, Nueva Ecija</p>
     
    </address>

  </div>

  <article  class="media">
   <div >
      <label><B>Doctor Name:&#160;</B> <label type="text" name="text"><?php echo $row_pat['firstname'].' '.$row_pat['lastname'] ?></label><br>
      <label><B>Specialization:&#160;</B> <label type="text" name="text"> <?php echo $row_pat['Specialization_Type']?> </label>


    <table class="meta">
      <tr>
        <th><span >Patient ID</span></th>
        <td><label type="text" name="text"><?php echo $row['patient_id'] ?></label></td>
      </tr>
      <tr>


        <th><span >Patient name</span></th>
        <td><label type="text" name="text" ><?php echo $row['firstname'].' '.$row['lastname'] ?></label></td>
      </tr>
    </table>



    <table class="inventory">
      <thead>
        <tr>
          <th><label>Date</label></th>
          <th><label>Day</label></th>
          <th><label>Start Time</label></th>
          <th><label>End Time</label></th>
       
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><span><label type="text" name="text" placeholder="date"><?php echo $_GET['date']?></span></td>
          <td><span ><label type="text" name="text" placeholder="day"><?php echo $row_pat['day']?></span></td>
          <td><span ><label type="text" name="text" placeholder="start"><?php echo date('h:i A', strtotime($row_pat['start_time'])); ?></span></td>
          <td><span ><label type="text" name="text" placeholder="end"><?php echo date('h:i A', strtotime($row_pat['end_time'])); ?></span></td>
          
        </tr>
      </tbody>
    </table>
  
 <form method="post">
  <input type="hidden" name="date" value="<?php echo $_GET['date']?>">
    <table class="com">
      <tr>
       <label style="font-family: sand-serif; font-size: 25px;"><b>Complain:</b></label>
        <td><textarea type="text" rows="5" class="form-control" id="inputEmail4" placeholder="Complain" name="comp" style="width:96.5%; height: 100%; resize: none;" placeholder="please type your Complain " required=""></textarea></td>
      </tr>
      <tr>


      </tr>
    </table>


<button  type="submit" class="btn btn-success" name="book" style="margin-left: 80%;"><i style="margin-top: 3.5px;" class="fas fa-book-medical"></i> Book </button>
<a  href="Appointment.php?id=<?php echo $_GET['id'] ?>&show=1" class="btn btn-danger" style="margin-left: 84%; margin-top: 5px;"><i style="margin-top: 3px;" class="fas fa-door-open"></i> Exit </a>


</form>
  </article>

<!-- Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">APPOINTMENT SUBMITTED!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Do you want to print a copy of your appointment?</h3>
        <br>

        <b>Note:</b> Screenshot copy will be accepted in the hospital
      </div>
      <form method="post">
      <div class="modal-footer">
         <a href="Patient_Dashboard.php" class="btn btn-secondary">NO</a>
        <a href="Print.php?schedule_id=<?php echo $schedule_id?>&date=<?php echo $Date?>" class="btn btn-primary">YES</a>
      </form>
      </div>
    </div>
  </div>
</div>


  <aside>
    <h1><span >Additional Notes</span></h1>
    <div >
      <p style="text-indent: 25px; font-family: calibri;">Once you click the "BOOK" Button your appointment will be automatically submitted. Make sure that you input your complain before click the "BOOK Button. Thankyou and God Bless!</p>
    </div>
  </aside>

  </div>

</body>
</html>

<script>
   if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>