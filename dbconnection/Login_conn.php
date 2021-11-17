<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$sname= "localhost";
$uname= "root";
$password = "";
$db_name = "sddhs_db";

$conn = mysqli_connect('localhost', 'root', '', 'sddhs_db');

if (!$conn) {
	echo "Connection failed!";
}