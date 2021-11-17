<?php 
 include('../dbconnection/Login_conn.php');
    include('../dbconnection/Validate_patient.php');
    include('../PATIENT/P_Sidebar.php');
    include('../ADMIN/Admin_action.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="stylesheet" href="../style_dashboard.css" type="text/css"/>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scales=1.0">
    <title>STO. DOMINGO DISTRICT HOSPITAL</title>
    <style type="text/css"></style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    </script>
<style type="text/css">

    *{
        margin: 0;
        padding: 0;
        text-decoration: none;
    }

body{

    box-sizing: border-box;
}

.nav__links {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 2;
    height: 100vh;
    width: 250px;
    background: #ffffff;
    transform: translateX(-250px);
    transition: transform 0.3s;
}

.nav--open .nav__links {
    transform: translateX(0);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
}

.nav__link {
    display: flex;
    align-items: center;
    color: #666666;
    font-weight: bold;
    font-size: 14px;
    text-decoration: none;
    padding: 12px 15px;
    background: transform 0.2s;
}

.nav__link > i {
    margin-right: 15px;
}

.nav__link--active {
    color: #009578;
}

.nav__link--active,
.nav__link:hover {
    background: #eeeeee;
}

.nav__overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(2px);
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.4s;
}

.nav--open .nav__overlay {
    visibility: visible;
    opacity: 1;
}

.header__button {
    width: var(--header-height);
    flex-shrink: 0;
    background: #FBDE44FF;
    border: 2px solid;
    color: #ffffff;
    cursor: pointer;
    padding: 10px;
    border: solid black;

}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 102px;
}


</style>

</head>
<body>

<!--<p style="margin-top: 50px; background-image: url('69527872_118739269485350_946424021090566144_n.jpg');width: 1080px; height: 369px; position: fixed; border-radius: 10px;"> </p>-->
       
    </header>
    <div>
    <header class="header" id="myHeader" style="position: fixed; top: 0; left: 0; width: 100%; height: var(--header-height); background: #28334AFF; display: flex; border: 2px solid;">

    <button class="header__button" id="btnNav" type="button">
            <i class="material-icons" style="color:#28334AFF; font-size: 30px; ">menu</i>
        </button>
        <div style="background-image: url('../pics/67881575_108722483820362_4764055841588379648_n.jpg');width: 40px; height: 40px; position: fixed; margin-left: 79%; margin-top: 8px; border-radius: 50px;"></div>

<header style="text-align: center; font-size: 20px; margin-top: 2px; font-size: 35px; font-family: broadway; margin-left:80%;color:#FBDE44FF;">S.D.D.H.S</header>


 <div class="col-div-6">
    <div class="profile">
        <p> <?php echo $_SESSION['username_patient']; ?><span>PATIENT</span>
    </div>
</div>
  

</p>
<script>

window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
</div>
</header>
</div>


    
</body>
</html>
