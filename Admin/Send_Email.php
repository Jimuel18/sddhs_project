<?php
 include('../dbconnection/Login_conn.php');
 include('../dbconnection/validate.php');

use PHPMailer\PHPMailer\PHPMailer;

   
   if(isset($_GET['id'])){

        $patient_id = $_GET['id'];
        
        $query = "SELECT * FROM patient_tbl WHERE patient_id = '$patient_id'";
        $exe = mysqli_query($conn, $query);
        $result_pat=mysqli_fetch_assoc($exe);

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr( str_shuffle( $chars ), 0, 8 );
        $username = substr( str_shuffle( $chars ), 0, 8 );
        $email = $result_pat['email'];


        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

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
        $mail->Body = "username: ".$username." password:".$password;

            if($mail->send()){

                     $query_1 = "INSERT INTO accounts_tbl (`username`, `password`, `usertype_id`) VALUES ('$username','$password', '3')";
                     mysqli_query($conn,$query_1);

                     $query_2 = "SELECT MAX(account_id) AS ID FROM accounts_tbl";
                     $exe_2 = mysqli_query($conn,$query_2);
                     $result_2 = mysqli_fetch_assoc($exe_2);

                     $id = $result_2['ID'];

                     $query_3 = "UPDATE patient_tbl SET `account_id`='$id' WHERE patient_id = '$patient_id'";
                     mysqli_query($conn, $query_3);

                     $status = "success";
                     $response = "Email is sent!";
             }
             else
             {
                  $status = "failed";
                  $response = "Something is wrong: <br>" . $mail->ErrorInfo;
             }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }
    
?>