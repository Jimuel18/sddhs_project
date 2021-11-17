<?php 
 include('../dbconnection/Login_conn.php');
      include('../dbconnection/Validate_patient.php');
    include('../Patient/P_Sidebar.php');
        include('Patient_action.php');
    include('../dbconnection/Home.php');
    include('Patient_Header.php');

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
</head>
<body>


<!-- Modal -->

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

 <?php 
      $query="SELECT dt.Doctor_id, dt.firstname, dt.lastname, dt.middlename, dt.houseno, dt.barangay, dt.municipality, dt.province, dt.contactNo, st.Specialization_Type FROM doctor_tbl dt INNER JOIN specialization_tbl st WHERE dt.Specialization_id = st.Specialization_id";
      $stmt=$conn->prepare($query);
      $stmt->execute();
      $result=$stmt->get_result();
          ?>
<div style="margin:  auto; margin-top: 50px;" class="col-md-8" >
      <h2 class="text-center text-info"> Doctors </h2>

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
        <th scope="col">Contact Number</th>
         <th scope="col">Specialization Type</th>
      </tr>
    </thead>
    <tbody>
     <?php 
    while ($row=$result->fetch_assoc()) { ?>
      <tr>
           <th scope="row"><?= $row['Doctor_id']; ?></th>
        <td><?= $row['firstname']; ?></td>
        <td><?= $row['lastname']; ?></td>
        <td><?= $row['middlename']; ?></td>
        <td><?= $row['houseno']; ?></td>
        <td><?= $row['barangay']; ?></td>
        <td><?= $row['municipality']; ?></td>
         <td><?= $row['province']; ?></td>
          <td><?= $row['contactNo']; ?></td>
          <td><?= $row['Specialization_Type']; ?></td>
  
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
