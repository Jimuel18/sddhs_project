<?php
include('../dbconnection/Login_conn.php');

$update=false;
//Doctor
$id="";
$Firstname="";
$Lastname="";
$Middlename="";
$HouseNo="";
$Barangay="";
$Municipality="";
$Province="";
$Schedule="";
$ContactNo="";
$username="";

//Findings
$record_id="";
$History_of_illness="";
$Date_of_Complain="";
$Blood_Pressure="";
$Rest_Rate="";
$Temperature="";
$Height="";
$Weight="";
$Findings="";




	if(isset($_POST['addDoctor'])){


$Firstname=$_POST['fname'];
$Lastname=$_POST['lname'];
$Middlename=$_POST['mname'];
$HouseNo=$_POST['Hnumber'];
$Barangay=$_POST['Bgay'];
$Municipality=$_POST['Municipality'];
$Province=$_POST['prov'];
$ContactNo=$_POST['phonenum'];
$Specialization=$_POST['Special'];
$username = $_POST['user'];
$pass = $_POST['password'];
$password = md5($pass);




         $query_1 = "INSERT INTO accounts_tbl (`username`, `password`, `usertype_id`) VALUES ('$username','$password', '2')";
         mysqli_query($conn,$query_1);

         $query_2 = "SELECT MAX(account_id) AS ID FROM accounts_tbl";
         $exe_2 = mysqli_query($conn,$query_2);
         $result_2 = mysqli_fetch_assoc($exe_2);

         $id = $result_2['ID'];

		$insert_pat = "INSERT INTO doctor_tbl (firstname,lastname,middlename,houseno,barangay,municipality,province,contactNo,Specialization_id,account_id)
	    VALUES('$Lastname','$Firstname','$Middlename','$HouseNo','$Barangay','$Municipality','$Province','$ContactNo','$Specialization','$id')";
  	    $run_insert_pat = mysqli_query($conn,$insert_pat);



  if($run_insert_pat === true){
  $message = "All data has been inserted!";

  echo "<script type='text/javascript'>alert('$message');</script>";

}
else{
  echo"Try Again";
}


}  

	
			if (isset($_GET['delete'])) {
				$id=$_GET['delete'];

				$query="DELETE FROM  doctor_tbl  WHERE Doctor_id=?";
				$stmt=$conn->prepare($query);
				$stmt->bind_param("i",$id);
				$stmt->execute();

			header('location: ../DOCTOR/Doctor.php');
		}

	
			if (isset($_GET['edit'])) {
				$id=$_GET['edit'];

				$query="SELECT * FROM doctor_tbl WHERE Doctor_id=?";
				$stmt=$conn->prepare($query);
				$stmt->bind_param("i",$id);
				$stmt->execute();
				$result=$stmt->get_result();
				$row=$result->fetch_assoc();

				$id=$row['Doctor_id'];
				$Firstname=$row['firstname'];
				$Lastname=$row['lastname'];
				$Middlename=$row['middlename'];
				$HouseNo=$row['houseno'];
				$Barangay=$row['barangay'];
				$Municipality=$row['municipality'];
				$Province=$row['province'];
				$ContactNo=$row['contactNo'];
			

				$update=true;
				
			}
					if (isset($_POST['update'])) {
						$id=$_POST['id'];

				$Firstname=$_POST['fname'];
				$Lastname=$_POST['lname'];
				$Middlename=$_POST['mname'];
				$HouseNo=$_POST['Hnumber'];
				$Barangay=$_POST['Bgay'];
				$Municipality=$_POST['Municipality'];
				$Province=$_POST['prov'];
				$Schedule=$_POST['schedule'];
				$ContactNo=$_POST['phonenum'];
		

				$query="UPDATE `doctor_tbl` SET FirstName='$Firstname', LastName='$Lastname', MiddleName='$Middlename', HouseNo='$HouseNo', Barangay='$Barangay', Municipality='$Municipality', Province='$Province', Schedule='$Schedule', ContactNo='$ContactNo' WHERE Doctor_id='$id'";
				$execute_query = mysqli_query($conn, $query);		


				
				header("location: Doctor/Add_Doctor.php?error=Successfully Updated!");
			}


			if (isset($_POST['show_details'])) {

				$id=$_POST['Doctor_id'];

				$query="SELECT * FROM doctor_tbl WHERE id = '$id' ";
				$execute_query = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($execute_query);

				if(mysqli_num_rows($execute_query) > 0)
				{
				
						echo $return = '
						<p> <b>ID</b>: '.$row['id'].'</p>
						<p> <b>Lastname</b>: '.$row['LastName'].'</p>
						<p> <b>Firstname</b>: '.$row['FirstName'].'</p>
						<p> <b>Middlename</b>: '.$row['MiddleName'].'</p>
						<p> <b>HouseNo</b>: '.$row['HouseNo'].'</p>
						<p> <b>Barangay</b> : '.$row['Barangay'].'</p>
						<p> <b>Municipality</b> : '.$row['Municipality'].'</p>
						<p> <b>Province</b> : '.$row['Province'].'</p>
						<p> <b>Schedule</b> : '.$row['Schedule'].'</p>
						<p> <b>ContactNo</b>: '.$row['ContactNo'].'</p>



						';
				
				} 


				else
				{

					echo $return = "No Record Found!";

		

					}
}



?>