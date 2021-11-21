<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../Sidebar_Header_Test/Sidebar.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
    <title>STO. DOMINGO DISTRICT HOSPITAL</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<body>

<style type="text/css">
   @media only screen and (max-width: 768px) {
  /* For mobile phones: */
div.imahe {display: none;
}

i.logo {margin-right: -135px;}

#runningTime {display: none;}

 
}
</style>
    <div id="headhide">
    <header class="header" style="top: 0; left: 0; width: 100%; height: 53px; background:#0D1E4F; display: flex; border: 2px solid; z-index: 1;">  

<div class="left_area">
      <h3 style="margin-top: 5px; margin-left: 8px;">SDD <span>HS</span></h3>
    </div>

<i class="far fa-clock fa-2x logo" style="color: white; display: block; margin-left: 60%; margin-top: 10px;"></i>
<div id="runningTime" style="color: white; display: block; margin-left: 0.5%; margin-top: 14px; "></div> 


        <div class="imahe" style="background-image: url('../Pics/67881575_108722483820362_4764055841588379648_n.jpg');width: 40px; height: 40px; position: absolute;  margin-left: 7.5%; margin-top: 4px; border-radius: 50px;"></div>


<script>

  $(document).ready(function() {
 setInterval(runningTime, 1000);
});
function runningTime() {
  $.ajax({
    url: '../Header/Time.php',
    success: function(data) {
       $('#runningTime').html(data);
     },
  });
}
</script>
</div>
</header>
</div>

