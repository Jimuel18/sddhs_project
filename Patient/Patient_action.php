<?php
include('../dbconnection/Login_conn.php');

$update=false;
//Patient
$id="";
$Lastname1="";
$Firstname1="";
$MiddleInitial1="";
$HouseNo1="";
$Barangay1="";
$Municipality1="";
$Province1="";
$ContactNo1="";
$Email="";




if(isset($_POST['addPatient']))
{
	
		$Lastname1=$_POST['lname1'];
		$Firstname1=$_POST['fname1'];
		$MiddleInitial1=$_POST['mname1'];
		$HouseNo1=$_POST['Hnumber1'];
		$Barangay1=$_POST['Bgay1'];
		$Municipality1=$_POST['Municipality1'];
		$Province1=$_POST['prov1'];
		$ContactNo1=$_POST['phonenum1'];
		$Email1=$_POST['Email1'];
		
		
		$query1="INSERT INTO patient_tbl(LastName,FirstName,MiddleInitial,HouseNo,Barangay,Municipality,Province, ContactNo, Email) VALUES (?,?,?,?,?,?,?,?,?)";
		$stmt1=$conn->prepare($query1);

		$stmt1->bind_param("sssssssis",$Lastname1,$Firstname1,$MiddleInitial1,$HouseNo1,$Barangay1,
			$Municipality1,$Province1,$ContactNo1,$Complain1);
		$stmt1->execute();

		header('location: Patient.php');
		$_SESSION['response']="Thanks! Your Data has been Successfully Inserted to our Database!";
		$_SESSION['res_type']="Success";

}

		if (isset($_GET['delete'])) {
		$id=$_GET['delete'];

				$query1="DELETE FROM patient_tbl WHERE id=?";
				$stmt1=$conn->prepare($query1);
				$stmt1->bind_param("i",$id);
				$stmt1->execute();

			header('location: ../PATIENT/Patient.php');
		}


			if (isset($_POST['update']))
			 {

				$pat_id=$_POST['patient_id'];
				$Firstname1=$_POST['firstname'];
				$Lastname1=$_POST['lastname'];
				$MiddleInitial1=$_POST['middlename'];
				$gender = $_POST['gen'];
				$HouseNo1=$_POST['houseNo'];
				$Barangay1=$_POST['barangay'];
				$Municipality1=$_POST['municipality'];
				$Province1=$_POST['province'];
				$ContactNo1=$_POST['contactno'];
				$Email=$_POST['email'];

				$Update_pat = "UPDATE `patient_tbl` SET `firstname`='$Firstname1',`lastname`='$Lastname1',`middlename`='$MiddleInitial1',`gender`='$gender',`houseNo`='$HouseNo1',`barangay`='$Barangay1',`municipality`='$Municipality1',`province`='$Province1',`contactno`='$ContactNo1',`email`='$Email' WHERE patient_id = '$pat_id'";
				mysqli_query($conn, $Update_pat);

				header('location: Patient.php');


			}

if(isset($_POST['Book'])){
  

  $Lastname1=$_POST['lname1'];
    $Firstname1=$_POST['fname1'];
    $MiddleInitial1=$_POST['mname1'];
    $HouseNo1=$_POST['Hnumber1'];
    $Barangay1=$_POST['Bgay1'];
    $Municipality1=$_POST['Municipality1'];
    $Province1=$_POST['prov1'];
    $ContactNo1=$_POST['phonenum1'];
    $Complain1=$_POST['complain1'];
    

$insert = "INSERT INTO patient_tbl (Lastname,Firstname,MiddleInitial,HouseNo,Barangay,Municipality,Province,ContactNo,Complain)
  VALUES('$Lastname1','$Firstname1','$MiddleInitial1',' $HouseNo1',' $Barangay1','$Municipality1',' $Province1','$ContactNo1','$Complain1')";

  $run_insert = mysqli_query($conn,$insert);

  header('location: Doctor_List.php');
}


?>