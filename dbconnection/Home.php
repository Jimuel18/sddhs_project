<?php 
session_start();
include "../dbconnection/Login_conn.php";

if(isset($_POST['Login_Button'])){
		$role = $_POST['role'];
	if ($role == "Admin") {
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			
			$username = $_POST['username'];
			$pass = $_POST['password'];
			

			$sql = "SELECT * FROM `accounts_tbl` WHERE role = '$role' AND username = '$username' AND password ='$pass'";
			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) == 1){
				$_SESSION['username'] = $username;
				header("location: ../ADMIN/Admin.php");
			}
			else{
				header("location: ../user_login.php?error=Incorrect Username or password!");
			}
		}else{
			header("location: ../user_login.php?error=All Fields are Required!");
		}
	}elseif ($role == "User") {

		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			
			$username = $_POST['username'];
			$pass = $_POST['password'];
			

			$sql = "SELECT * FROM `accounts_tbl` WHERE role = '$role' AND username = '$username' AND password ='$pass'";
			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) == 1){
				$_SESSION['username'] = $username;
				header("location: ../PATIENT/Patient.php");
			}
		}else{
			header("location: ../user_login.php?error=Incorrect Username or password!");
		}
}else{
	header("location: ../user_login.php?error=All Fields are Required!");
}
}

if (isset($_POST['SignUp'])) {

          $role = $_POST['role'];

          if($role == "Admin"){

               header("location: ../ADMIN/Admin_reg.php");

          }else if($role == "User"){

               
               header("location: ../PATIENT/new_reg.php");

          }
     }