<?php 
include('../dbconnection/Login_conn.php');
    include('../dbconnection/Validate_patient.php');
    include('../Header/header.php');
    include('../Sidebar_Header_Test/Sidebar_Patient.php');
    include('../ADMIN/Admin_action.php');

?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
  <meta name="author" content="Jim">
  <title>STO. DOMINGO DISTRICT HOSPITAL</title>
    <link rel="stylesheet" href="../Sidebar.css" type="text/css"/>
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

	</script>

</head>
<body>

<style>

.grid-container {
  display: grid;
  grid-gap: 20px 20px;
  grid-template-columns: auto auto auto;
  box-shadow: 2px 8px 10px 0 rgba(0,0,0,0.2);
   transition: 0.3s;
  margin-top: 30px;
  border-radius: 9px;
  background-color: #ebebd9;
}

.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  font-size: 23px;
  text-align: center;
  color: #28334AFF;
  margin: auto;
  border: solid;
}

.card {

  text-align: center;
  margin: auto;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.4);
  transition: 0.3s;
  width: 45%;
  height: 500px;
  background-color: #0D1E4F;
  color: #ebebd9;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.9);
}

.card{
     display: inline-block;

     border-radius: 5px; 
    }
a:hover{
  text-decoration: none;
}

div.doc_title {
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

@media only screen and (max-width: 768px) {
  /* For mobile phones: */
.grid-container {
  grid-template-columns: auto; margin-left: 6%; margin-top: 50px; margin-right: -20px;
}
.card {
  height: 440px;
  width: 60%;
}
h4, br {
  margin-top: -15px;
}
  div.doc_title {margin-left: 70px; width: 280px; height: 80px; margin-top: 30px; 
}
.grid-item {
  margin-left: 100%;
}


}
</style>

<?php 

  $docs = "SELECT * FROM `doctor_tbl` INNER JOIN specialization_tbl WHERE doctor_tbl.Specialization_id = specialization_tbl.Specialization_id";
   $stmt_docs=$conn->prepare($docs);
    $stmt_docs->execute();
    $result_docs=$stmt_docs->get_result();
?>

<body style="background-color: gray;">

<div class="content">
  <div class="my_content">


<div class="doc_title d-flex justify-content-center">
  <b>Doctors</b></div>


<div class="grid-container" style="border: solid;">
  <?php 
    while ($row=$result_docs->fetch_assoc()) { ?>
       
       <div class="card">
       <a href="Appointment.php?id=<?= $row['Doctor_id'] ?>&show=1" style="color: #ebebd9;">
<div class="image" >
   <img src="../Pics/96-969204_physician-of-symbol-as-vector-caduceus-doctors-clipart.png" style="width:100%; height: 300px; border-radius: 5px;">
</div>
<div class="title">
 <h4>
<br>Name: <?= $row['firstname'].' '.$row['lastname'];?></h4>
</div>
<div class="des">
 <p>Specialization: <?=$row['Specialization_Type'];?></p>
</div>
</a>
</div>
<?php } ?>
</div>


</div>
</div>
</body>
</html>


<script>
if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script> 