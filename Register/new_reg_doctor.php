<?php
  include('../Header/user_login_header.php');
  include('../dbconnection/new_reg_connection.php');  
  include ('../dbconnection/Login_conn.php');
           

           if(isset($_POST['Submit-Doc'])){
  
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$middlename = $_POST['middlename'];
$HouseNo=$_POST['housenum'];
$Barangay=$_POST['Bgay'];
$Municipality=$_POST['Municipality'];
$Province=$_POST['province'];
$ContactNo=$_POST['phonenum'];
$username = $_POST['username'];
$pass = $_POST['password'];
$Specialization=$_POST['Spec'];
$password = md5($pass);


$insert_doc = "INSERT INTO doctor_tbl (firstname,lastname,middlename,houseno,barangay,municipality,province,contactNo,username,password,Specialization_id)
  VALUES('$lastname','$firstname','$middlename','$HouseNo','$Barangay','$Municipality','$Province','$ContactNo','$username','$password','$Specialization')";

  $run_insert_doc = mysqli_query($conn,$insert_doc);

  if($run_insert_doc === true){
  echo"All data has been inserted!";
}
else{
  echo"Try Again";
}


}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Form</title>

  <style type="text/css">
  *{
margin: 0;
padding: 0;

  }

  .body{
    background-image: url('../Pics/uJwBHK.jpg');
    background-size: 100% 100%;
    background-position: center;
    margin-top: 60px;
  }
.Registration{
  width: 800px;
  background-color: rgb(0,0,0,0.6);
  margin: auto;
  color: white;
  padding: 10px;
  text-align: center;
  border-radius: 15px;

}

.main{
  background-color: rgb(0,0,0,0.6);
  margin: auto;
  width: 800px;
  padding: 10px;
  border-radius: 15px;
  margin-top: 20px;
}

form
{
  padding: 10px;
}

#name{
  width: 100%;
  height: 100px;
}

.form{
  margin-left: 25px;
  margin-top: 20px;
  width: 100px;
  color: white;
  font-size: 20px; 
  font-weight: 700;
  border-radius: 15px;
}

.FirstName
{
  position: relative;
  top: -76px;
  left: 300px;
  line-height: 30px;
  border-radius: 6px;
  padding:0 20px;
  font-size: 15px;
}

.LastName
{
  position: relative;
  top: -40px;
  left: 50px;
  line-height: 30px;
  border-radius: 5px;
  padding:0 20px;
  font-size: 15px;
}

.MiddleName
{
  position: relative;
  width: 100px;
  top: -112px;
  left: 560px;
  line-height: 30px;
  border-radius: 5px;
  padding:0 20px;
  font-size: 15px;
}

.FirstLabel{
  position: relative;
  color: white;
  text-transform: capitalize;
  font-size: 14px;
  left: 185px;
  top: -15px;

}
.SecondLabel{
  position: relative;
  color: white;
  text-transform: capitalize;
  font-size: 14px;
  left: 435px;
  top: -48px;

}

.LastLabel{
  position: relative;
  color: white;
  text-transform: capitalize;
  font-size: 14px;
  left: 656px;
  top: -83px;

}
.houseno
{
  position: relative;
  width: 130px;
  top: -120px;
  left: 90px;
  line-height: 30px;
  border-radius: 5px;
  padding:0 20px;
  font-size: 15px;
}
.barangay
{
  position: relative;
  width: 330px;
  top: -120px;
  left: 90px;
  line-height: 30px;
  border-radius: 5px;
  padding:0 20px;
  font-size: 15px;
}
.municipality
{
  position: relative;
  width: 300px;
  top: -120px;
  left: 120px;
  line-height: 30px;
  border-radius: 5px;
  padding:0 20px;
  font-size: 15px;
}
.province
{
  position: relative;
  width: 340px;
  top: -120px;
  left: 80px;
  line-height: 30px;
  border-radius: 5px;
  padding:0 20px;
  font-size: 15px;
}
.contactNo
{
  position: relative;
  width: 300px;
  top: -140px;
  left: 120px;
  line-height: 30px;
  border-radius: 5px;
  padding:0 20px;
  font-size: 15px;
}
.Username
{
  position: relative;
  width: 300px;
  top: -160px;
  left: 120px;
  line-height: 30px;
  border-radius: 5px;
  padding:0 20px;
  font-size: 15px;
}
.password
{
  position: relative;
  width: 300px;
  top: -190px;
  left: 120px;
  line-height: 30px;
  border-radius: 5px;
  padding:0 20px;
  font-size: 15px;
}
.Peradd{
  position: relative;
  left: 100px;
  top: -100px;
  line-height: 40px;
  width: 615px;
  border-radius: 5px;
  padding: 0 22px;
  line-height: 30px;
}
.Uname
{
  position: relative;
  top: -120px;
  left: 110px;
  line-height: 30px;
  border-radius: 6px;
  padding:0 20px;
  font-size: 15px;
}
.Pword
{
  position: relative;
  top: -120px;
  left: 110px;
  line-height: 30px;
  border-radius: 6px;
  padding:0 20px;
  font-size: 15px;
}

.add{
  position: relative;
  top: -85px;
  color: white;
  font-size: 20px;
}

.Bdate{
  position: relative;
  top: -120px;
  left: 100px;
  line-height: 24px;
  width: 120px;
  border-radius: 5px;
}

.BD
{
  position: relative;
  top: -90px;
  color: white;
  font-size: 18px;
}

.Edad{
  position: relative;
  top: -100px;
  left: 5px;
  color: white;
  font-size: 20px;
}

.age{
  position: relative;
  top: -179px;
  left: 310px;
  width: 70px;
  line-height: 24px;
  border-radius: 5px;
}

.PN{
  position: relative;
  top: -130px;
  left: 5px;
  color: white;
  font-size: 20px;
}

.number{
  position: relative;
  top: -240px;
  left: 505px;
  width: 200px;
  line-height: 24px;
  border-radius: 5px;
}

.EM
{
  position: relative;
  top: -160px;
  left: 5px;
  color: white;
  font-size: 20px;
}


.role
{
  position: relative;
  top: -210px;
  left: 5px;
  color: white;
  font-size: 20px;
}

.role1
{
  position: relative;
  top: -240px;
  left: 100px;
  width: 200px;
  line-height: 24px;
  border-radius: 5px;
}

.email
{
  position: relative;
  top: -240px;
  left: 100px;
  width: 200px;
  line-height: 24px;
  border-radius: 5px;
}

.Gen{
  position: relative;
  top: -210px;
  left: 5px;
  color: white;
  font-size: 20px;
}

.option{
  position: relative;
  top: -240px;
  left: 100px;
}

.NP
{
  position: relative;
  top: -150px;
  left: 5px;
  color: white;
  font-size: 20px;

}

.radio
{
  position: relative;
  top: -180px;
  left: 150px;
  color: white;
}

.input{
background-color: Yellow;
display: block;
text-align: center;
margin-top: -150px;
margin-left: 450px;
font-size: 30px;
border-radius: 5px;
font-family: Algerian;
width: 300px;
}

.Special
{
  position: relative;
  width: 300px;
  top: -190px;
  left: 150px;
  line-height: 30px;
  border-radius: 5px;
  padding:0 20px;
  font-size: 15px;
}
</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="body" >
  <?php
  $sql = "SELECT * FROM specialization_tbl";
  $res = mysqli_query($conn, $sql);
  $spec = mysqli_fetch_assoc($res);
?>
<a class="btn btn-primary" href="../Login/user_login.php" role="button" style="margin-top: 50px; margin-left: 30px;"> <i class="fas fa-step-backward"></i>
Back to Login</a>
<div class="container">
  <form method="post">
    <div class="Registration"><h1> Doctor Registration Form</h1></div>
<div class="main">
  <div id ="id">
    <h2 class="form">Name:</h2>
    <label class="FirstLabel" >FirstName</label>
    <input class="LastName" type="text" name="lastname" required placeholder="EX.Juan"><br>
    <label class="SecondLabel" >LastName</label>
    <input class="FirstName" type="text" name="firstname" required placeholder="EX.Pedro"><br>
    <label class="LastLabel">MiddleName </label>
    <input class="MiddleName" type="text" name="middlename" required placeholder="EX.P."><br>


<h2 class="add"> HouseNo:</h2>
<input class="houseno" type="text" name="housenum" placeholder="">

<h2 class="add"> Barangay: </h2>
<input class="barangay" type="text" name="Bgay" placeholder="">

<h2 class="add"> Municipality: </h2>
<input class="municipality"  name="Municipality" placeholder="">

<h2 class="BD"> Province: </h2>
<input class="province" type="text" name="province" placeholder="">

<h2 class="Edad"> ContactNo:</h2>
<input class="contactNo" type="text" name="phonenum" placeholder="">

<h2 class="PN"> Username: </h2>
<input class="Username" type="text" name="username" placeholder="">

<h2 class="EM"> Password: </h2>
<input class="password" type="password" name="password" placeholder="">

        <h3 class="EM"> Specialization: </h3>
<select name="Spec" class="Special" style="width: 80%;" >
                    <option>Select Specialization</option>
                    <?php do{ ?>
                      <option value="<?php echo $spec['Specialization_id'] ?>"><?php echo $spec['Specialization_Type']?></option>
                    <?php }while($spec = mysqli_fetch_assoc($res)) ?>
            </select>

<input class="input" type="submit" name="Submit-Doc" class="btn btn-primary" />
</div>
  </div>
    
  </form>

</div>
</body>
</html>
