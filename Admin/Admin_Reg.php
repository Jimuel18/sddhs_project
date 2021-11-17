<?php 
include('../Header/user_login_header.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="author" content="Jim">
  <title>STO. DOMINGO DISTRICT HOSPITAL</title>
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scales=1.0">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  
.body{
    background-image: url('../uJwBHK.jpg');
    background-size: 100% 100%;
    background-position: center;
    margin-top: 60px;
}
    .main{
  background-color: rgb(0,0,0,0.6);
  margin: auto;
  padding: 10px;
  border-radius: 15px;
  margin-top: 20px;
}
  .label{
    font-size: 20px;
    color: gray;
  }



</style>

<body class="body">
<a class="btn btn-primary" href="../user_login.php" role="button" style="margin-top: 100px; margin-left: 30px;"> <i class="fas fa-step-backward"></i>
Back to Login</a>

<form style="margin-top: 100px; margin-right: 100px; margin-left: 100px;" class="main">

  <div class="form-row">
    <div class="form-group col-md-6">
      <label class="label" for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label class="label" for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label class="label" for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label class="label" for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label class="label" for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label class="label" for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label class="label" for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
 
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
</body>
</html>
