<?php
$sname= "localhost";
$uname= "root";
$password = "";
$db_name = "poa_records";

if ($conn->connect_error) {
	die("Cannot Connect to Database" .$conn->connect_error);
	# code...
}
?>