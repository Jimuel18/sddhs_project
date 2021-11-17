<?php
    include('../dbconnection/Login_conn.php');
    include('../dbconnection/Validate_Admin.php');
    include('../Header/header.php');
    include('../Sidebar_Header_Test/Sidebar_test.php');
    include('../ADMIN/Admin_action.php');




    $query="SELECT Doctor_id FROM doctor_tbl ORDER BY Doctor_id";
    $query_run = mysqli_query($conn, $query);

    $row= mysqli_num_rows($query_run);

    $query_pat="SELECT patient_id FROM patient_tbl ORDER BY patient_id";
    $query_run_pat = mysqli_query($conn, $query_pat);

    $row_pat= mysqli_num_rows($query_run_pat);

      $query_ad="SELECT appointment_id FROM appointment_tbl ORDER BY appointment_id";
    $query_run_ad = mysqli_query($conn, $query_ad);

    $row_ad= mysqli_num_rows($query_run_ad);

//Yearly Chart
    $app_year = "SELECT year(Date) AS year, count(appointment_id) AS total FROM appointment_tbl GROUP BY year(Date) ORDER BY year(Date)";
    $app_year_exe = mysqli_query($conn,$app_year);
    $year = mysqli_fetch_assoc($app_year_exe);

    $xnum = "";
    $ynum = "";
    $color = "";

    do{

      $xnum .= ''.$year['year'].',';
      $ynum .= ''.$year['total'].',';
      $color .= '"#'.substr(str_shuffle("123456789ABCDEF"), 0, 6).'",';
 
    }
    while ($year = mysqli_fetch_assoc($app_year_exe));

    $col = "[".$color."]";
    $xres = "[".$xnum."]";
    $yres = "[".$ynum."]";

  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="author" content="Jim">
  <title>STO. DOMINGO DISTRICT HOSPITAL</title>
    <link rel="stylesheet" href="../Sidebar_Header_Test/Sidebar.css?version=51" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
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


  @media only screen and (max-width: 768px) {

[class*="col-"] {
  width: 65%;
  margin-left: 100px; 
  margin-top: 10px;
  margin-bottom: 10px;
}

div.map {margin-left: 19px; max-width: 400px;}


div.chart{margin-left: 15px;}


  </style>  

<body style="background-color: #ebebd9;">
  <div class="content">
    <div class="my_content">

      <div class="clearfix"></div>


  <div class="clearfix"></div>
  <br/>
  
  <div class="col-div-3">
    <div class="box">
      <p><?= $row_pat ?><br/><span>Patients</span></p>
      <i class="fas fa-heartbeat box-icon"></i>
    </div>
  </div>
  <div class="col-div-3">
    <div class="box">
      <p> <?= $row ?> <br/><span>Doctors</span></p>
      <i class="fas fa-user-md box-icon"></i>
    </div>
  </div>
  <div class="col-div-3">
    <div class="box">
      <p> <?= $row_ad ?><br/><span>Booked</span></p>
      <i class="far fa-address-card box-icon"></i>
    </div>
  </div>
 
 <div class="chart container" style="max-width: 800px; margin-top: 200px; margin-bottom: 50px; ">
 <canvas id="myChart"></canvas>
 </div>


 <div class="container map">
  <?php include('google-calendar.php')?>
</div>

<script>
  

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo $xres; ?>,
        datasets: [{
            label: 'Number of Patient Appointed YEARLY',
            data: <?php echo $yres; ?>,
            backgroundColor: <?php echo $col; ?>,
            borderColor: [
                'rgba(0, 0, 0)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>


<script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  

  //Calendar



</script>
</div>
    </div>
    

</body>
</html>