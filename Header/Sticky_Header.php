<?php
  include('../dbconnection/Login_conn.php');
    include('../dbconnection/validate.php');
    include('../ADMIN/Admin_action.php');
  include('../Header/User_Header.php');
    include('Doctor_Sidebar.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard ni doc</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .title {
  color: grey;
  font-size: 25px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
 
h5 {
 text-align: center;
}
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

h2 {
 text-align: center;
 background-color: yellow;
 width: 300px;
 margin:auto; 
}


    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
 overflow-y: scroll;
  height: 750px;

}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
  </style>
  </style>


<body>

<?php 
      $query1="SELECT * FROM `patient_records`";
      $stmt1=$conn->prepare($query1);
      $stmt1->execute();
      $result1=$stmt1->get_result();
      ?>

<div class="container-fluid" style="margin-left: 10px; margin-top: 60px;">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs">
      <div class="card">
  <header style="text-align: center; background: black; color: #FBDE44FF; padding: 20px;">STO DOMINGO DISTRICT HOSPITAL</header>
  <img src="../240820682_4823504134386103_8850075826434454316_n.jpg" alt="John" style="width:30%; margin-top: 20px;">
  <h1>Jim Juan</h1>
  <p class="title">Doctor No: 1</p>
  <p>Sagaba</p>
  <p>09090909</p>
  <p>meljuan@email.com</p>
  <p>New patient</p>
  <p>Schedule:</p>
</div>
    </div>
    <br>
    
    <div class="col-sm-9" style="margin-left: 80px;">
      <div class="well">
        <h2>Patient Info</h2>
<table>
  <tr>
    <th>Patient ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Middle Name</th>
    <th>Gender</th>
    <th>House No.</th>
    <th>Barangay</th>
    <th>Municipality</th>
    <th>Province</th>
    <th>Contact No.</th>
    <th>Complain</th>
  </tr>
   <tbody>
     <?php 
    while ($row1=$result1->fetch_assoc()) { ?>
      <tr>
        <td><?= $row1['id']; ?></td>
        <td><?= $row1['LastName']; ?></td>
        <td><?= $row1['FirstName']; ?></td>
        <td><?= $row1['MiddleInitial']; ?></td>
        <td><?= $row1['HouseNo']; ?></td>
        <td><?= $row1['Barangay']; ?></td>
        <td><?= $row1['Municipality']; ?></td>
         <td><?= $row1['Province']; ?></td>
          <td><?= $row1['ContactNo']; ?></td>
          <td><?= $row1['Complain']; ?></td>
        <td>
              <a href="" class="badge-warning p-0" style="margin-left: -3%; font-size: 15px;">Add Record</a>
        </td>
      </tr>  
         <?php } ?>    
    </tbody>
  </tr>
  
</table>

</div>
      </div>
      <div class="col-sm-9" style="margin-left: 20.9%; margin-top: -10%;">
      <div class="well">
        <h2>Patient Record</h2>
<table>
  <tr>
    <th>Record ID</th>
    <th>History of Illness</th>
    <th>Date of complain</th>
    <th>BloodPressure</th>
    <th>Respiratory Rate</th>
    <th>Temperature</th>
    <th>Height</th>
    <th>Weight</th>
    <th>Diagnosis</th>
    <th>Patient ID</th>
  </tr>

</table>

</div>
       <button class="open-button" onclick="openForm()">Add Record</button>

<div class="form-popup" id="myForm">

  <form action="/action_page.php" class="form-container">
    <h1>Add Record</h1>

    <label for="name"><b>Record ID</b></label>
    <input type="text" placeholder="Enter ID" name="name" required>

    <label for="Lname"><b>History of Illness</b></label>
    <input type="text" placeholder="Enter HoI" name="Lname" required>

    <label for="Lname"><b>Date of Complain</b></label>
    <input type="text" placeholder="Enter Date" name="Lname" required>

     <label for="Lname"><b>Blood Pressure</b></label>
    <input type="text" placeholder="Enter BP" name="Lname" required>

     <label for="Lname"><b>Respiratory Rate</b></label>
    <input type="text" placeholder="Enter Rate" name="Lname" required>

     <label for="Lname"><b>Temperature</b></label>
    <input type="text" placeholder="Enter Temperature" name="Lname" required>

     <label for="Lname"><b>height</b></label>
    <input type="text" placeholder="Enter Height" name="Lname" required>

     <label for="Lname"><b>Weight</b></label>
    <input type="text" placeholder="Enter Weight" name="Lname" required>

     <label for="Lname"><b>Diagnosis</b></label>
    <input type="text" placeholder="Enter Diagnosis" name="Lname" required>

     <label for="Lname"><b>Patient ID</b></label>
    <input type="text" placeholder="Enter Patient ID" name="Lname" required>

    <button type="submit" class="btn">Add</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script> 

        </div>
      </div>
    </d