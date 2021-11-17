<?php 
 include('../dbconnection/Login_conn.php');
  include('../dbconnection/validate.php');
    include('Doctor_Sidebar.php');
    include('../ADMIN/Admin_action.php');
    include('../dbconnection/Home.php');

?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
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
    padding: 2px;

}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 102px;
}

.main {
    width: 50%;
    margin: 50px auto;
}

/* Bootstrap 4 text input with search icon */

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}

</style>

</head>
<body>

<!--<p style="margin-top: 50px; background-image: url('69527872_118739269485350_946424021090566144_n.jpg');width: 1080px; height: 369px; position: fixed; border-radius: 10px;"> </p>-->
       
    </header>
    <div>
	<header class="header" id="myHeader" style="position: fixed; top: 0; left: 0; width: 100%; height: var(--header-height); background: #28334AFF; display: flex; border: 2px solid;">

	<button class="header__button" id="btnNav" type="button">
            <i class="material-icons">menu</i>
        </button>
        <div style="background-image: url('../67881575_108722483820362_4764055841588379648_n.jpg');width: 40px; height: 40px; position: fixed; margin-left: 79%; margin-top: 8px; border-radius: 50px;"></div>

<header style="text-align: center; font-size: 20px; margin-top: 2px; font-size: 35px; font-family: broadway; margin-left:80%;color:#FBDE44FF;">S.D.D.H.S</header>


	<div class="dropdown" style="margin-right: 100%;">
    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 50%; margin-top: 8px;">
    <span class="sr-only"></span>
   User Type
</button>
  <div class="dropdown-menu" >
    <a class="dropdown-item" href="#">DOCTOR</a>
    <a class="dropdown-item" href="../PATIENT/Patient_Dashboard.php">PATIENT</a>
  </div>
</div>



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

<div class="main">

  
  <!-- Another variation with a button -->
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search Doctor">
    <div class="input-group-append">
      <button class="btn btn-secondary" type="button">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>

 <?php 
      $query="SELECT * FROM `doctor_tbl`";
      $stmt=$conn->prepare($query);
      $stmt->execute();
      $result=$stmt->get_result();
          ?>
<div style="margin:  -100px; margin-top: 90px;" class="col-md-8" >
      <h2 class="text-center text-info" style="margin-left: 70%; margin-top: 10%;"> Doctor List </h2>

      <div class="container">
  <h2></h2>
  <p></p>
  <table class="table">
    <thead class="thead-dark">
      <tr>
       <th scope="col">#</th>
        <th scope="col">FirstName</th>
        <th scope="col">LastName</th>
        <th scope="col">MiddleName</th>
        <th scope="col">House#</th>
        <th scope="col">Barangay</th>
        <th scope="col">Municipality</th>
        <th scope="col">Province</th>
        <th scope="col">Schedule</th>
        <th scope="col">Contact Number</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
     <?php 
    while ($row=$result->fetch_assoc()) { ?>
      <tr>

        <th scope="row"><?= $row['id']; ?></th>
        <td><?= $row['FirstName']; ?></td>
        <td><?= $row['LastName']; ?></td>
        <td><?= $row['MiddleName']; ?></td>
        <td><?= $row['HouseNo']; ?></td>
        <td><?= $row['Barangay']; ?></td>
        <td><?= $row['Municipality']; ?></td>
         <td><?= $row['Province']; ?></td>
          <td><?= $row['Schedule']; ?></td>
          <td><?= $row['ContactNo']; ?></td>
        <td>
        <td>
          <a href="" class="badge-warning p-1" style="margin-left: -80%;">Get Appointment</a>

        </td>
      </tr>     
 <?php } ?>  

    </tbody>
  </table>
</div>
    </div>
  </div>

</body>
</html>
