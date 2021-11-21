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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  .header5 {
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

div.header5 {width: 290px; height: 120px; text-align: center; margin-left: 75px;}

 div.view {margin-left: 70px; margin-right: 8px; background-color: #fccf17; border-radius: 10px;}

  div.add {margin-left: 70px; margin-right: 8px; background-color: #fccf17; border-radius: 10px;}


a.back {margin-left: 60px;}

[class*="col-"] {
  width: 102%;
  margin-top: 5px; 
  margin-bottom: 50px;
  margin-left: -30px;
}

}



 @media only screen and (max-width: 528px) {

div.header5 {width: 290px; height: 80px; text-align: center; margin-left: 100px;}

div.view {margin-left: 85px; margin-right: 35px; background-color: #fccf17; border-radius: 10px;}

  div.add {margin-left: 85px; margin-right: 35px; background-color: #fccf17; border-radius: 10px;}

[class*="col-"] {
  width: 102%;
  margin-top: 5px; 
  margin-bottom: 50px;
  margin-left: -45px;
}

a.back {margin-left: 45px;}

 }

 @media only screen and (max-width: 418px) {

div.header5 {width: 290px; height: 80px; text-align: center; margin-left: 65px;}

div.view {margin-left: 40px; margin-right: 0px; background-color: #fccf17; border-radius: 10px;}

  div.add {margin-left: 40px; margin-right: 0px; background-color: #fccf17; border-radius: 10px;}

  [class*="col-"] {
  width: 102%;
  margin-top: 5px; 
  margin-bottom: 50px;
  margin-left: -50px;
}
 }



</style>

<body style="background-color: #ebebd9;">
<div class="content">
    <div class="my_content">

<a  href="Doctor.php" type="submit" class="btn btn-primary btn-lg float-end back" style="font-family: sans-serif; margin-top: 10px; font-size: 12px;">BACK</a>

<div class="header5 d-flex justify-content-center"><i class="fas fa-user-nurse" style="margin-top: 5px; margin-right: 10px;"></i>  <b>  ADD DOCTOR </b></div>

  <div class="view">
    <a href="View_Doctor.php" type="submit" class="btn btn d-flex justify-content-center" style="font-family: sans-serif; font-size: 30px; background-color: #fccf17; width: 20%; margin: auto; margin-top: 20px;"> <i class="fas fa-street-view"></i> <b>VIEW DOCTOR</b></a>
</div>

<div class="add">
     <a href="Add_Doctor.php" type="submit" class="btn btn d-flex justify-content-center" style="height: 50px; font-family: sans-serif; font-size: 30px; background-color: #fccf17; width: 20%; margin: auto; margin-top: 10px;"> <i class="fas fa-user-plus"></i> <b>ADD DOCTOR</b></a>
</div>

<div>
  <?php
if (isset($_SESSION['response'])) { ?>
<div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?= $_SESSION['response']; ?>
</div>
<?php } unset($_SESSION['response']); ?>
</div>


    <div class="row" style="margin-left: 27%; margin-top: 30px; ">
        <div class="col-md-8">
       
            <form method="post">
              <input type="hidden" name="id" value="<?=$id; ?>">
        <body>
                <div class="form-group">
                    <input type="text" name="fname" class="form-control" value="<?= $Firstname; ?>" placeholder="Enter first Name" required=""> 
                </div>

        <div class="form-group">
          <input type="text" name="lname" class="form-control" value="<?= $Lastname; ?>" placeholder="Enter last Name" required="">
        </div>

        <div class="form-group">
          <input type="text" name="mname" class="form-control" value="<?= $Middlename; ?>" placeholder="Enter middle Name" required="">
        </div>

                <div class="form-group">
                    <input type="text" name="Hnumber" class="form-control" value="<?= $HouseNo; ?>" placeholder="Enter House Number" required="">
                </div>

                <div class="form-group">
                    <input type="num" name="Bgay" class="form-control" value="<?= $Barangay; ?>" placeholder="Enter Barangay" required="">
                </div>

                <div class="form-group">
                    <input type="text" name="Municipality" class="form-control" value="<?= $Municipality; ?>" placeholder="Enter Municipality" required="">
                </div>

                <div class="form-group">
                    <input type="text" name="prov" class="form-control" value="<?= $Province; ?>" placeholder="Enter Province" required="">
                </div>

        <div class="form-group">
          <input type="tel" name="phonenum" class="form-control" value="<?= $ContactNo; ?>" placeholder="Enter ContactNo" required="">
        </div>

        <div class="form-group">
          <input type="text" name="eml" class="form-control" value="<?= $email; ?>" placeholder="Enter Email" required="">
        </div>

        <input type="hidden" name="doctor_id" value="<?= $result1['doctor_id']; ?>">

        <?php
  $sql = "SELECT * FROM specialization_tbl";
  $res = mysqli_query($conn, $sql);
  $spec = mysqli_fetch_assoc($res);

  $sql_1 = "SELECT * FROM doctor_tbl WHERE account_id = 0";
  $stmt1=$conn->prepare($sql_1);
  $stmt1->execute();
  $result1=$stmt1->get_result()
?>

        <h3 class="Specialization"> Specialization: </h3>
<select name="Special" class="Special" style="width: 100%" >
                    <option>Select Specialization</option>
                    <?php do{ ?>
                      <option value="<?php echo $spec['Specialization_id'] ?>"><?php echo $spec['Specialization_Type']?></option>
                    <?php }while($spec = mysqli_fetch_assoc($res)) ?>
            </select>

                <div class="form-group" style="margin-top: 30px;">
           <?php
            if ($update==true) { ?>
              <input type="submit" name="update" class="btn btn-success btn-block" onclick="return confirm('Are you sure you want to update this record')" value="Update Record From Doctor">

              <a href="Doctor.php" class="btn btn-danger btn-block">Cancel</a>
            <?php } else {?>
                <form method="post">
              <div>
                    <input type="submit" name="addDoctor" class="btn btn-primary btn-block" value="Add Doctor">
        </div>
        </form>
           <?php } ?>
                </div>
        
            </form>
       


        </div>
 </section>
 <script>
   if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
 
