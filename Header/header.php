<!DOCTYPE html>
<html>
<head>
  <title>S.D.D.H.S</title>
      <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../Sidebar_Header_Test/Sidebar.css">

</head>

<style>
   @media only screen and (max-width: 768px) {
  /* For mobile phones: */
div.imahe {display: none;
}

i.logo {margin-right: -135px;}


}
</style>

<body>
  <input type="checkbox" id="check">
  <header  style="z-index: 1;">
    <label for="check">
      <i class="fa fa-bars" aria-hidden="true" id="sidebar_btn"></i>
    </label>



    <div class="imahe" style="background-image: url('../Pics/67881575_108722483820362_4764055841588379648_n.jpg');width: 40px; height: 40px; position: absolute; float: left; margin-left: 90.3%; margin-top: -5px; border-radius: 50px;"></div>

    <div class="left_area">
      <h3>SDD <span>HS</span></h3>
    </div>
<div class="time" id="runningTime" style="color: white; display: block; float: right; margin-top: 25px; margin-right: 40px;"></div> 

 </div>
  </header>
<script type="text/javascript">
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


  $(window).resize(function()
  {
      var $theWindowSize = $(this).width();
      if($theWindowSize <= 800)
          {
            $( "#check").prop('checked', true);
          }
  });

    $(window).resize(function()
  {
      var $theWindowSize = $(this).width();
      if($theWindowSize > 800)
          {
            $( "#check").prop('checked', false);
          }
  });

  $(function() {      
    let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;

    if (isMobile) {
          $( "#check").prop('checked', true);
    }
  });


</script>
   