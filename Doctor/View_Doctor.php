<?php
    include('../dbconnection/Login_conn.php');
    include('../dbconnection/Validate_Admin.php');
        include('../Header/header.php');
    include('../Sidebar_Header_Test/Sidebar_test.php');
    include('../ADMIN/Admin_action.php');


 ?>

 <!DOCTYPE html>
<html lang="en">

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


<script  src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js">  </script>





</head>
<style type="text/css">
  .header06 {
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


.dataTables_filter {
   width: 50%;
   float: right;
   text-align: left;
   margin-right: -70px;

}

table, tr, th {
  text-align: center;
}

div.dataTables_length label {
  display: inline-block;
  margin-bottom: 0.5rem;
  z-index: 0;

}


 @media only screen and (max-width: 768px) {


div.well {
overflow-x: auto; margin-left: -92px; max-width: 560px; }

div.header06 {width: 290px; height: 120px; text-align: center; margin-left: 150px;}

 div.view {margin-left: 145px; margin-right: -66px; background-color: #fccf17; border-radius: 10px;}

  div.add {margin-left: 145px; margin-right: -66px; background-color: #fccf17; border-radius: 10px;}

.dataTables_filter {
   width: 50%;
   float: left;
   text-align: left;
   margin-top: -78px;
   margin-left: 140px;

}

.dataTables_info {
  margin-left: 50px;
}

.pagination{
  margin-left: 52px;
}

a.back {margin-left: 50px;}
}


@media only screen and (max-width: 528px) {
  div.header06{
  width: 290px;
  height: 120px;
  text-align: center;
  margin-left: 100px;
}

 div.view {
  margin-left: 90px;
  margin-right: 40px;
  background-color: #fccf17;
  border-radius: 10px;
}

  div.add {
  margin-left: 90px;
  margin-right: 40px;
  background-color: #fccf17;
  border-radius: 10px;
 }

 div.well {
  overflow-x: auto;
  margin-left: 20px;
  max-width: 560px;
}

a.back {margin-left: 45px;}
}

@media only screen and (max-width: 418px) {
 div.header06{
  width: 290px;
  height: 120px;
  text-align: center;
  margin-left: 70px;
}

 div.view {
  margin-left: 40px;
  margin-right: 0px;
  background-color: #fccf17;
  border-radius: 10px;
}

  div.add {
  margin-left: 40px;
  margin-right: 0px;
  background-color: #fccf17;
  border-radius: 10px;
 }

}

</style>
<body style="background-color: #ebebd9;">

<div class="content">
  <div class="my_content">

<a  href="Doctor.php" type="submit" class="btn btn-primary btn-lg float-end back" style="font-family: sans-serif; margin-top: 10px; font-size: 12px">BACK</a>

<div class="header06 d-flex justify-content-center"> <b> DOCTOR RECORDS </b></div>


  <div class="view">
    <a href="View_Doctor.php" type="submit" class="btn btn d-flex justify-content-center" style="font-family: 'Poppins', sans-serif; font-size: 30px; background-color: #fccf17; width: 20%; margin: auto; margin-top: 20px;"> <i class="fas fa-street-view"></i> <b>VIEW DOCTOR</b></a>
</div>

<div class="add">
     <a href="Add_Doctor.php" type="submit" class="btn btn d-flex justify-content-center" style="height: 50px; font-family: 'Poppins', sans-serif; font-size: 30px; background-color: #fccf17; width: 20%; margin: auto; margin-top: 10px;"> <i class="fas fa-user-plus" style="margin-top: 5px;"></i> <b>ADD DOCTOR</b></a>
</div>

  <!--Doctor Table-->

        <div class="container-fluid">

    <!--Doctor Get_Info-->
          <?php 
      $query="SELECT dt.Doctor_id, dt.firstname, dt.lastname, dt.middlename, dt.houseno, dt.barangay, dt.municipality, dt.province, dt.contactNo, st.Specialization_Type FROM doctor_tbl dt INNER JOIN specialization_tbl st WHERE dt.Specialization_id = st.Specialization_id";
      $stmt=$conn->prepare($query);
      $stmt->execute();
      $result=$stmt->get_result();
          ?>

  <h2></h2>
  <p></p>


    <div class="well container-fluid">
  <table id="dtBasicExample" class="table table-striped table-bordered table-lg" cellspacing="0" width="100%">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>MiddleName</th>
        <th>House#</th>
        <th>Barangay</th>
        <th>Municipality</th>
        <th>Province</th>
        <th>Contact</th>
         <th>Specialization</th>
        <th>Action</th>
      </tr>
    </thead>
</tbody>

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
        <td>
          <a>
           
          <a href="../Doctor/Add_Doctor.php?edit=<?= $row['Doctor_id']; ?>" class="badge-success btn-sm p-2" >Update <i class="fas fa-edit"></i></a>
            
        </td>
      </tr>  
      <?php } ?>   
    </tbody>
  </table>
</form>

        </div>
    </div> 
    </div>
    </div> 
    </div>
</section>
<script>
  $(document).ready(function () {

    $('.view-btn').click(function (e) {

      e.preventDefault();

      var Doctor_id = $(this).closest('tr').find('.id').text();

      $.ajax({
        type:"POST",
        url:"../ADMIN/Admin_action.php",
        data:{
          'show_details': true,
          'id': Doctor_id,
        },
        success: function (response){

            $('.show_details').html(response);
            $('#DoctorModal').modal('show');

        }

      });





    });
  });

$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
    "scrollX": true,
    "bScrollCollapse": true
  }
);
  $('.dataTables_length').addClass('bs-select');
});

</script>
    

