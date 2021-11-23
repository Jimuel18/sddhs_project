 <?php
 use PHPMailer\PHPMailer\PHPMailer;
   include('../dbconnection/Login_conn.php');
    include('../dbconnection/Validate_Admin.php');
     include('../Header/header.php');
     include('../Sidebar_Header_Test/Sidebar_test.php');


    if(isset($_POST['Verify'])){

        $pat_id = $_POST['patient_id'];
        
        $query = "SELECT * FROM patient_tbl WHERE patient_id = '$pat_id'";
        $exe = mysqli_query($conn, $query);
        $result_pat=mysqli_fetch_assoc($exe);

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr( str_shuffle( $chars ), 0, 8 );
        $username = substr( str_shuffle( $chars ), 0, 8 );
        $email = $result_pat['email'];


        require_once "../PHPMailer/PHPMailer.php";
        require_once "../PHPMailer/SMTP.php";
        require_once "../PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //smtp settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "stodomingodistricthospital@gmail.com";
        $mail->Password = 'Capstone0101';
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //email settings
        $mail->isHTML(true);
        $mail->setFrom("stodomingodistricthospital@gmail.com", "S.D.D.H.S");
        $mail->addAddress($email);
        $mail->Subject = ("StoDomingo District Hospital");
        $mail->Body = "<h1>S.D.D.H.S E-Medic</h1></br><h5>Hey this is your login information.</h5></br> <b>username: $username </br>password: $password </b>";

            if($mail->send()){

                     $hash_pass = md5($password);

                     $query_1 = "INSERT INTO accounts_tbl (`username`, `password`, `usertype_id`) VALUES ('$username','$hash_pass', '3')";
                     mysqli_query($conn,$query_1);

                     $query_2 = "SELECT MAX(account_id) AS ID FROM accounts_tbl";
                     $exe_2 = mysqli_query($conn,$query_2);
                     $result_2 = mysqli_fetch_assoc($exe_2);

                     $id = $result_2['ID'];

                     $query_3 = "UPDATE patient_tbl SET `account_id`='$id' WHERE patient_id = '$pat_id'";
                     mysqli_query($conn, $query_3);

                     $status = "success";
                     $response = "Email is sent!";

                     echo  '<script> window.location.href="Send_Email.php";</script>';
             }
             else
             {
                  $status = "failed";
                  $response = "Something is wrong: <br>" . $mail->ErrorInfo;
             }

        exit(json_encode(array("status" => $status, "response" => $response)));
    
    }
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
  .header1 {
   width: 500px;
  background: #28334AFF;
  margin-left: 34%;
  color: #FBDE44FF;
  padding: 20px;
  text-align: center;
  border-radius: 15px;
  font-size: 30px;
  font-family: 'Poppins', sans-serif;
  border-radius: 6px;
  border: solid black;
  margin-top: 20px;
  height: 80px;
  
}
.table-wrapper {
  width: 130%;
      
        padding: 20px 25px;
        margin: 40px 0;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
 .table-title {        
  padding-bottom: 15px;
  background: #0d2438;
  color: #fff;
  padding: 16px 30px;
  margin: -20px -25px 10px;
  border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
  margin: 5px 0 0;
  font-size: 24px;
 }
 .table-title .btn-group {
  float: right;
 }
 .table-title .btn {
  color: #fff;
  float: right;
  font-size: 13px;
  border: none;
  min-width: 50px;
  border-radius: 2px;
  border: none;
  outline: none !important;
  margin-left: 10px;
 }
 .table-title .btn i {
  float: left;
  font-size: 21px;
  margin-right: 5px;
 }
 .table-title .btn span {
  float: left;
  margin-top: 2px;
 }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
  padding: 12px 15px;
  vertical-align: middle;
    }
 table.table tr th:first-child {
  width: 60px;
 }
 table.table tr th:last-child {
  width: 100px;
 }
    table.table-striped tbody tr:nth-of-type(odd) {
     background-color: #fcfcfc;
 }
 table.table-striped.table-hover tbody tr:hover {
  background: #f5f5f5;
 }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    } 
    table.table td:last-child i {
  opacity: 0.9;
  font-size: 22px;
        margin: 0 5px;
    }
 table.table td a {
  font-weight: bold;
  color: #566787;
  display: inline-block;
  text-decoration: none;
  outline: none !important;
 }
 table.table td a:hover {
  color: #2196F3;
 }
 table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
 table.table .avatar {
  border-radius: 50%;
  vertical-align: middle;
  margin-right: 10px;
 }

 @media only screen and (max-width: 768px) {
    div.table-wrapper {margin-left: -20px; width: 100%;}
 }
table, thead, tr, th {
  text-align: center;
}
</style>
<body style="background-color: #ebebd9;">
<div class="content">
    <div class="my_content">

 <div class="col-md-9" style="margin-top: 50px; margin-left: 50px;">
      <?php 
      $query1="SELECT * FROM patient_tbl WHERE account_id = 0";
      $stmt1=$conn->prepare($query1);
      $stmt1->execute();
      $result1=$stmt1->get_result();
      ?>

<div class="container">

<div class="result"></div>

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
      <h2>ACCOUNT <b>VERIFICATION</b></h2>
     </div>
     </div>
     </div>

     <div style="width: 100%; height: 100%; overflow-x: auto;">
     <table class="table table-striped table-hover" style="overflow-x:auto">
     <thead>
        <th scope="row">ID</th>
        <th>LastName</th>
        <th>FirstName</th>
        <th>MiddleName</th>
        <th>House#</th>
        <th>Barangay</th>
        <th>Municipality</th>
        <th>Province</th>
        <th>Contact Number</th>
        <th>Email</th>
        <th>Action</th>
       </tr>
                </thead>
                <tbody>
    <?php 
    while ($row1=$result1->fetch_assoc()) { ?>
      <tr>
        <th scope="row"><?= $row1['patient_id']; ?></th>
        <td><?= $row1['lastname']; ?></td>
        <td><?= $row1['firstname']; ?></td>
        <td><?= $row1['middlename']; ?></td>
        <td><?= $row1['houseNo']; ?></td>
        <td><?= $row1['barangay']; ?></td>
        <td><?= $row1['municipality']; ?></td>
        <td><?= $row1['province']; ?></td>
        <td><?= $row1['contactno']; ?></td>
        <td><?= $row1['email']; ?></td>
        <td>
          <form method="post">
            <input type="hidden" name="patient_id" value="<?= $row1['patient_id']; ?>">
          <button onclick="return confirm('Verify This Patient Account?');" type="submit" name="Verify" class="btn btn-danger">VERIFY <i class="fas fa-user-check" style="font-size: 18px;"></i></button>
          </form>
          
        </td>
      </tr>  
      <?php }
   ?>   
    </tbody>
   </table>
  </div>
</div> 
  </div>
</div>
</div>



</div>
 




</body>
</html>
</section>

 