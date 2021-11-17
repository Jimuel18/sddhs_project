<?php 
 include('../dbconnection/Login_conn.php');
 include('../dbconnection/Validate_patient.php');
 include('../Header/header.php');
 include('../Sidebar_Header_Test/Sidebar_Patient.php');
 include('Patient_action.php');

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
.header01{
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
table, thead, tr, th {
  text-align: center;
}

@media only screen and (max-width: 768px) {

.well { margin-left: -70px; overflow-x: auto; max-width: 300px;}
div.header01 {margin-left: 100px; width: 280px; height: 100px; margin-top: 30px; }
  }
</style>


  <body style="background-color: #ebebd9;">
   <?php 

   if (isset($_POST['View'])) {
     // code...
   }

   $findings = "SELECT * FROM patient_diagnosis_tbl WHERE patient_id = '$_SESSION[patient_id]'";
    $stmt=$conn->prepare($findings);
      $stmt->execute();
      $result=$stmt->get_result();

   ?>

  <div class="content">
    <div class="my_content">
              <div class="header01"><b>DIAGNOSIS</b></div>

 <div class="container-fluid" style="margin: auto; margin-top: 50px;">
      <div class="well" >

<table class="table table-striped" >
  <thead class="thead-dark">
  <tr>

    <th>Date of Diagnosis</th>
    <th>Temperature</th>
    <th>Height (inches)</th>
    <th>Weight (kg)</th>
    <th style="width: 100px;">Action</th>
  </tr>
</thead>
 <tbody>
       <?php 
    while ($row=$result->fetch_assoc()) { ?>
      <tr>

        <td><?= $row['dateofdiagnosis']; ?></td>
        <td><?= $row['temperature']; ?></td>
        <td><?= $row['height']; ?></td>
         <td><?= $row['weight']; ?></td>
        <td>
    
          <a href="View_Diagnosis.php?rec_id=<?php echo $row['record_id']?>" class="btn btn-success" name="View" > <i class="fas fa-eye"></i> View</a>

         
        </td>
      </tr>  
      <?php } ?>   
    </tbody>
</table>
   </div>
      </div>
    </div>

  </div>
</div>
</body>
</html>

