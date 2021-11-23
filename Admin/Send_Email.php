<?php
 include('../Header/Login_Header.php');
include ("../dbconnection/Login_conn.php");
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
                <b>Email Sent!</b>
              </div>

                <center>

                    <div class="form-group">

                    <i class="fas fa-envelope" style="font-size: 80px;"></i> 
                    <br>
                    <br>
                <p>Account Verified!</p>
                <label class="text-center"><b>THANK YOU!</b></label>
                    </center>

                     <a href="Account_Verification.php" class="btn btn-default" style="margin-top: 60px;">Back</a>
        
                </div>

        </div>
    </div>

</body>
</html>