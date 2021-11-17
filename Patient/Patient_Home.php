<?php
    include('../dbconnection/Login_conn.php');
    include('../dbconnection/Validate_patient.php');
    include('../Header/header.php');
    include('../Sidebar_Header_Test/Sidebar_Patient.php');
    include('../ADMIN/Admin_action.php');
  
$count = "SELECT count(appointment_id) as App FROM appointment_tbl WHERE patient_id = '$_SESSION[patient_id]'";
$exe_count = mysqli_query($conn, $count);

$result_count = mysqli_fetch_assoc($exe_count);

$count_1 = "SELECT count(record_id) as record FROM patient_diagnosis_tbl WHERE patient_id = '$_SESSION[patient_id]'";
$exe_count_1 = mysqli_query($conn, $count_1);

$result_count_1 = mysqli_fetch_assoc($exe_count_1);

$count_2 = "SELECT count(Doctor_id) as doc FROM doctor_tbl";
$exe_count_2 = mysqli_query($conn, $count_2);

$result_count_2 = mysqli_fetch_assoc($exe_count_2);
 
?>
<!DOCTYPE HTML>
<html>
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

<style>
  .carousel-inner > .item {
    margin: auto;
}

@media only screen and (max-width: 768px) {

[class*="col-"] {
  width: 60%;
}

.carousel-inner>.item>img {
    display: block;
    max-width: 100%;
    height: 590px;
  }


 [class*="col-"] {
  width: 65%;
  margin-left: 105px; 
  margin-top: 10px;
  margin-bottom: 10px;
  float: left;
}

h1{
  margin-left: 60px;
}


div.slide {margin-left: 5%;}

}
</style>

<body style="background-color: #ebebd9;">
    <div class="content">
        <div class="my_content">

<div >
    <div id="main">

    <div class="clearfix"></div>
</div>

    <div class="clearfix"></div>
    <br/>
    <div class="col-div-3">
        <div class="box">
            <p><?= $result_count['App'] ?><br/><span>My Appointment</span></p>
            <i class="fa fa-users box-icon"></i>
        </div>
    </div>
    <div class="col-div-3">
        <div class="box">
            <p><?= $result_count_1['record'] ?><br/><span>Diagnostics</span></p>
            <i class="fa fa-list box-icon"></i>
        </div>
    </div>
    <div class="col-div-3">
        <div class="box">
            <p><?= $result_count_2['doc'] ?><br/><span>Doctors</span></p>
           <i class="fas fa-stethoscope box-icon"></i>
        </div>
    </div>
</div>
</div>

 <h1 style="text-align: center;">ACTIVITIES</h1> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel"  style=" width:100%; height: 650px !important; display: block;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
          <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>

    </ol>



    <!-- Wrapper for slides -->
    <div class="container" style="margin: auto; width: 100%;">
    <div class="carousel-inner">
      <div class="item active">
        <img src="../Pics/hospital.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="../Pics/pic1.jpg" style="margin: auto;"  style="height: 130px;">
      </div>
    
      <div class="item">
        <img src="../Pics/pic2.jpg" style="margin: auto;"  style="height: 130px;">
      </div>

      <div class="item">
        <img src="../Pics/pic3.jpg" style="margin: auto;"  style="height: 130px;">
      </div>

      <div class="item">
        <img src="../Pics/pic4.jpg" style="margin: auto;"  style="height: 130px;">
      </div>

      <div class="item">
        <img src="../Pics/pic5.jpg" style="margin: auto;"  style="height: 130px;">
      </div>


    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
      </div>
          </div>
</div>
</body>
</html>  