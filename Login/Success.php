<?php
	include('../dbconnection/Login_conn.php');
	include('../Header/Login_header.php');
	 use PHPMailer\PHPMailer\PHPMailer;

	$check = $_GET['uname'];


	$result_check = "SELECT pat.patient_id, pat.email, pat.account_id, acc.username FROM patient_tbl pat INNER JOIN accounts_tbl acc ON pat.account_id = acc.account_id WHERE acc.username = '$check'";
	$exe_check = mysqli_query($conn, $result_check);
	$res = mysqli_fetch_assoc($exe_check);

	$email = $res['email'];
		list($first, $last) = explode("@", $email);
   	$len = floor(strlen($first)/2);
    $the_email = substr($first, 0, $len) . str_repeat('*', $len) . "@" . $last;

    if (isset($_POST['send'])) {

    	$check_email = $_POST['email_recover'];
    	$id = $res['account_id'];

    	   if ($email == $check_email) {

    	  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr( str_shuffle( $chars ), 0, 8 );

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
        $mail->Body = "<h1>S.D.D.H.S E-Medic</h1></br><h5>Account Recovered! This is your new Password</h5></br></br>password: $password </b>";

        if($mail->send()){

        	$hash_pass = md5($password);

        	$query_1 = "UPDATE accounts_tbl set password = '$hash_pass' WHERE account_id = '$id'";
                     mysqli_query($conn,$query_1);
   
  			 }

  		header('location: Email_Send.php');		

    }
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>SDDHS Forgot Pass</title>
</head>
<body style="background-color: #ebebd9;">
	<div class="content" style="margin-left: 0px;">
		<div class="my_content">
			<div class="card w-50" style="margin: auto;">
			  <div class="card-header">
			    Find Your Account
			  </div>

			  	<center>

			  	<form method="post">
				<div class="form-group">

			  	<p>We've Found your username. To continue recovering please complete this email below.</p>

			  	<label class="text-center"><b>Your Email: <?php echo $the_email; ?> </b></label>
			    <input type="text" name="email_recover" class="form-control w-50">

			    <a href="new_Login.php" class="btn btn-default" style="margin-top: 10px;">Close</a>
			    <button type="submit" class="btn btn-primary" name="send" style="margin-top: 10px;">Submit</button>


			    </form>
				</center>
				</div>

		</div>
	</div>

</body>
</html>