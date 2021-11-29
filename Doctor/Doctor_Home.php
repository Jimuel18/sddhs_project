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
.header05 {
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
.carousel-inner > .item {
    margin: auto;
}


@media only screen and (max-width: 631px){
.for_title, .my_content {
    left: 0;
    margin-top: 25px;
    width: 100%;
    margin: 17px;
}


@media only screen and (max-width: 484px){

#check:checked ~ .content {
    margin-left: -31px;
    width: 550px;
}
}


  </style>

<body style="background-color: #ebebd9">
<div class="content">
  <div class="my_content">

<div class="header05">Dashboard</div>




 <h1 style="text-align: center;">ACTIVITIES</h1> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
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
    <div class="container" style="margin: auto; width: 100%; min-height: 50%;">
    <div class="carousel-inner">
      <div class="item active">
        <img src="../Pics/Sample.jpg" style="margin: auto;">
      </div>

      <div class="item">
        <img src="../Pics/Sample.jpg" style="margin: auto;">
      </div>
    
      <div class="item">
        <img src="../Pics/Sample.jpg" style="margin: auto;">
      </div>

      <div class="item">
        <img src="../Pics/Sample.jpg" style="margin: auto;">
      </div>

      <div class="item">
        <img src="../Pics/Sample.jpg" style="margin: auto;">
      </div>

      <div class="item">
        <img src="../Pics/Sample.jpg" style="margin: auto;">
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
</head>
</body>
</html>
