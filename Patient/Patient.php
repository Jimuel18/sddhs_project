<?php
   include('../dbconnection/Login_conn.php');
    include('../dbconnection/Validate_Admin.php');
    include('../Header/header.php');
    include('../Sidebar_Header_Test/Sidebar_test.php');
    include('Patient_action.php');
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script src="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap4.min.css"></script>

</head>
<style type="text/css">
  .mytitle {
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

 table, thead, tr, th {
  text-align: center;
}

 @media only screen and (max-width: 768px) {

div.my_content{margin-top: 30px; margin-left: 100px; width: 50%;}

tbody {
  overflow-x: auto;
}
div.well { margin-left: 74px; margin-right: -50;}

div.mytitle {width: 290px; height: 120px; text-align: center; margin-left: -20px;}

}

</style>
 <?php 
      $query1="SELECT * FROM `patient_tbl` WHERE account_id != 0;";
      $stmt1=$conn->prepare($query1);
      $stmt1->execute();
      $result1=$stmt1->get_result();
      ?>

  <body style="background-color: #ebebd9;">    

<div class="content">
  <div class="my_content">

<div class="mytitle d-flex justify-content-center"></i> <b> PATIENT RECORDS </b></div>

<div>
  <?php
if (isset($_SESSION['response'])) { ?>
<div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?= $_SESSION['response']; ?>
</div>
<?php } unset($_SESSION['response']); ?>
</div>

    
  </div>
<div class="justify-content-center" style="align-items: center; margin-top: 20px;">
  <div class="well">
<article class="all-browsers">
      <div>
  <h2></h2>
  <p></p>

  <div style="overflow-x: auto; width: 100%; height: 100%;">

  <table class="table table-striped table-bordered nowrap">
    <thead class="thead-dark">
      <tr>
        <th scope="row">Patient_ID</th>
        <th>LastName</th>
        <th>FirstName</th>
        <th>MiddleName</th>
        <th>Gender</th>
        <th>House#</th>
        <th>Barangay</th>
        <th>Municipality</th>
        <th>Province</th>
        <th>Contact Number</th>
        <th>Email</th>
        <th>Account_ID</th>
        <th>Action</th>
    
      </tr>
    </thead>
</tbody>
    <tbody>
       <?php 
    while ($row1=$result1->fetch_assoc()) { ?>
      <tr>
        <th scope="row"><?= $row1['patient_id']; ?></th>
        <td><?= $row1['lastname']; ?></td>
        <td><?= $row1['firstname']; ?></td>
        <td><?= $row1['middlename']; ?></td>
        <td><?= $row1['gender']; ?></td>
        <td><?= $row1['houseNo']; ?></td>
        <td><?= $row1['barangay']; ?></td>
        <td><?= $row1['municipality']; ?></td>
         <td><?= $row1['province']; ?></td>
          <td><?= $row1['contactno']; ?></td>
          <td><?= $row1['email']; ?></td>
          <td><?= $row1['account_id']; ?></td>
        <td>  
          <button class="btn btn-success " data-toggle="modal" type="button" data-target="#updateModalCenter<?= $row1['patient_id']?>"> Update <i class="fas fa-edit"></i></button>
   
    </td>
        </td>
      </tr>  
      <!-- Modal UPDATE PATIENT -->
<div class="modal fade" id="updateModalCenter<?= $row1['patient_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form action="Patient_action.php" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">PATIENT INFORMATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true" style="float: right;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <h1 class="text-center text-info">Update</h1>

        <input type="hidden" name="patient_id" value="<?php echo $row1['patient_id'];?>"/>

       <div class="form-group">
          <input type="text" name="lastname" class="form-control" value="<?= $row1['lastname'];?>" placeholder="Enter Last Name" required="">
        </div>

        <div class="form-group">
          <input type="text" name="firstname" class="form-control" value="<?= $row1['firstname'];?>" placeholder="Enter First Name" required="">
        </div>

        <div class="form-group">
          <input type="text" name="middlename" class="form-control" value="<?= $row1['middlename']; ?>" placeholder="Enter Middle Name" required="">
        </div>

         <div class="form-group">
     <label for="inputState"> Gender</label>
     <select name="gen" id="inputState" class="form-control" required="">
  <option value="Male">Male</option>
  <option value="Female">Female</option>
</select>
    </div>

        <div class="form-group">
          <input type="text" name="houseNo" class="form-control" value="<?= $row1['houseNo']; ?>" placeholder="Enter House Number" required="">
        </div>

        <div class="form-group">
          <input type="num" name="barangay" class="form-control" value="<?= $row1['barangay']; ?>" placeholder="Enter Barangay" required="">
        </div>

        <div class="form-group">
          <input type="text" name="municipality" class="form-control" value="<?= $row1['municipality']; ?>" placeholder="Enter Municipality" required="">
        </div>

        <div class="form-group">
          <input type="text" name="province" class="form-control" value="<?= $row1['province']; ?>" placeholder="Enter Province" required="">
        </div>

        <div class="form-group">
          <input type="tel" name="contactno" class="form-control" value="<?= $row1['contactno']; ?>" placeholder="Enter Phone Number" required="">
        </div>

        <div class="form-group">
          <input type="tel" name="email" class="form-control" value="<?= $row1['email']; ?>" placeholder="Enter Email" required="">
        </div>

        <div class="form-group">
   
              <button onclick="return confirm('Are you sure you want to Update this record?');" type="submit" name="update" class="btn btn-success btn-block" > Update</button>

               <a href="Patient.php" class="btn btn-danger btn-block" data-dismiss="modal">Cancel</a>
 
             
        </div>   
      </form>
    </div>
      </div>
      </div>
      <div class="modal-footer">
    
      </div>
    </div>
  </div>
</div>

      <?php } ?>   
    </tbody>
  </table>
</div>
    </div>
  </div>

</div>
</div>
</div>
</div>
</article>
</section>

</body>
</html>
<!-- Modal ADD PATIENT -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ADD PATIENT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <h1 class="text-center text-info">Add Record</h1>

      <form action="Patient_action.php" method="post" enctype="multipart/form-data">

        <body>

       <div class="form-group">
          <input type="text" name="lname1" class="form-control"  placeholder="Enter Last Name" required="">
        </div>
        <div class="form-group">
          <input type="text" name="fname1" class="form-control"  placeholder="Enter First Name" required="">
        </div>

        <div class="form-group">
          <input type="text" name="mname1" class="form-control"  placeholder="Enter Middle Initial" required="">
        </div>

        <div class="form-group">
     <label for="inputState"> Gender</label>
     <select name="gen" id="inputState" class="form-control" required="">
  <option value="Male">Male</option>
  <option value="Female">Female</option>
</select>
    </div>

        <div class="form-group">
          <input type="text" name="Hnumber1" class="form-control"  placeholder="Enter House Number" required="">
        </div>

        <div class="form-group">
          <input type="num" name="Bgay1" class="form-control"  placeholder="Enter Barangay" required="">
        </div>

        <div class="form-group">
          <input type="text" name="Municipality1" class="form-control"  placeholder="Enter Municipality" required="">
        </div>

        <div class="form-group">
          <input type="text" name="prov1" class="form-control"  placeholder="Enter Province" required="">
        </div>

        <div class="form-group">
          <input type="tel" name="phonenum1" class="form-control"  placeholder="Enter Phone Number" required="">
        </div>

        <div class="form-group">
          <input type="tel" name="complain1" class="form-control" placeholder="Enter Email" required="">
        </div>

        <div class="form-group">
 
              <div class="form-group">
          <input type="submit" name="addPatient" class="btn btn-primary btn-block" value="Add Record of Patient">
        </div>
        

        </div>
    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left: 390px;"> Close</button>

        
      </form>
    </div>
      </div>
      </div>
      <div class="modal-footer">
    
      </div>
    </div>
  </div>
</div>
