<?php
	include('../dbconnection/Login_conn.php');
	include('../Header/Login_header.php');

	 if (isset($_POST['forgot'])){

	 $user_name = $_POST['u_name'];

	 $forgot = "SELECT * FROM accounts_tbl WHERE username = '$user_name'";
	 $exe_forgot = mysqli_query($conn, $forgot);
	 $result = mysqli_fetch_assoc($exe_forgot);

	 		if(mysqli_num_rows($exe_forgot)){

	 				 $u_id = $result['usertype_id'];

					 if ($u_id == 1) {
					 		$error = "<p style='text-align: center; padding: -20px;'> <b>Username</b> not found! Please Try Again.</p>";
					 }

					 elseif ($u_id == 2)
					{
						$result_check = "SELECT doc.email, acc.username FROM doctor_tbl doc INNER JOIN accounts_tbl acc ON doc.account_id = acc.account_id WHERE acc.username = '$user_name'";
						$exe_check = mysqli_query($conn, $result_check);
						$res = mysqli_fetch_assoc($exe_check);

						$uname = $res['username'];

						echo  '<script> window.location.href="Success.php?uname='.$uname.'";</script>';

					}

					elseif ($u_id == 3)
					{
						$result_check = "SELECT pat.email, acc.username FROM patient_tbl pat INNER JOIN accounts_tbl acc ON pat.account_id = acc.account_id WHERE acc.username = '$user_name'";
						$exe_check = mysqli_query($conn, $result_check);
						$res = mysqli_fetch_assoc($exe_check);

						$uname = $res['username'];

						echo  '<script> window.location.href="Success.php?uname='.$uname.'";</script>';

					}

	 		}else{
	 				$error = "<p style='text-align: center; padding: -20px;'> <b>Username</b> not found! Please Try Again.</p>";
	 		}

}


	
	//  $result_check = "SELECT doc.email FROM doctor_tbl doc INNER JOIN accounts_tbl acc ON doc.account_id = acc.account_id WHERE acc.username = '$check'";
	// 	$exe_check = mysqli_query($conn, $result_check);
	// 	$res = mysqli_fetch_assoc($exe_check);

	// 	$email = $res['email'];


	//  $cur_username = $result['username'];


	// if ($u_id == 1) {
	// 	$error = "<p style='text-align: center; padding: -20px;'> <b>Username</b> not found! Please Try Again.</p>";
	// }
	//  if ($cur_username == $user_name) {
	//  		 header('location: Success.php?uname='.$cur_username.'');	
	//  }
	//  else{
	//  	$error = "<p style='text-align: center; padding: -20px;'> <b>Username</b> not found! Please Try Again.</p>";
	//  }

	//  }
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
			    <b>ACCOUNT RECOVERY</b>
			  </div>

			  	<center>

			  	<form method="post">
				<div class="form-group">

			  	<p>Please enter your username to reset your password.</p>

			  								  <?php if(isset($error)) { ?>
                                              <div class="alert alert-danger w-50" role="alert">
                                                  <?php echo $error; ?>
                                              </div>
                                              <?php } ?>


			  	<label class="text-center"><b>Username:</b></label>
			    <input type="text" name="u_name" class="form-control w-50" required="">

			    <a href="new_Login.php" class="btn btn-default" style="margin-top: 10px;">Close</a>
			    <button type="submit" class="btn btn-primary" name="forgot" style="margin-top: 10px;">Submit</button>


			    </form>
				</center>
				</div>

		</div>
	</div>

</body>
</html>