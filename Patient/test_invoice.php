<?php 
 include('../dbconnection/Login_conn.php');
    include('../dbconnection/Validate_patient.php');
        include('../Header/Login_header.php');

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="test.css">

    <title>SDDHS</title>
</head>

<?php 
    $schedule_id = $_GET['schedule_id'];
    $query_pat = "SELECT dt.firstname, dt.lastname, dt.barangay, dt.municipality, dt.province, sd.day, sd.start_time, sd.end_time, sd.status, st.Specialization_Type FROM schedule_tbl sd  INNER JOIN doctor_tbl dt ON sd.Doctor_id = dt.Doctor_id INNER JOIN specialization_tbl st ON dt.Specialization_id = st.Specialization_id WHERE sd.schedule_id = '$schedule_id'";
    $stmt=$conn->prepare($query_pat);
    $stmt->execute();
    $result_pat=$stmt->get_result();

    $row_pat=$result_pat->fetch_assoc();


    $query_res = "SELECT * FROM patient_tbl WHERE patient_id = '$_SESSION[patient_id]'";
    $stmt=$conn->prepare($query_res);
    $stmt->execute();
    $result_res=$stmt->get_result();

    $row=$result_res->fetch_assoc();


       if (isset($_POST['book'])) {
         
         $Date = $_GET['date'];
         $Complain = $_POST['comp'];
         $p_id = $_SESSION['patient_id'];
         $stat = "Pending";

         $query_app = "INSERT INTO `appointment_tbl`(`patient_id`, `schedule_id`,`Date`, `Complain`,`Completed`) VALUES ('$p_id','$schedule_id','$Date','$Complain','$stat')";
         $query_app_exe = mysqli_query($conn, $query_app);

         $updatestatus = "UPDATE `schedule_tbl` SET status='Not_Available' WHERE schedule_id = '$schedule_id'";
         $update_stat = mysqli_query($conn, $updatestatus);

         echo "<script type='text/javascript'>
          $(document).ready(function(){
          $('#exampleModalCenter1').modal('show');
          });
          </script>";
      }


?>

<body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="../Pics/241359692_549745289476479_98065932882723701_n.png" alt="" class="img-fluid">
                </div>
                <div class="top-left">
                    <div class="graphic-path" >
                        <p><b>SDDHS</b></p>
                    </div>
                    <div class="position-relative">
                        <p>Schedule ID <span> <b><?php echo $schedule_id?></b></span></p>
                    </div>

            </section>

            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <h2>Doctor</h2>
                            <div class="txn mt-2"><b>Name:</b> <?php echo $row_pat['firstname'].' '.$row_pat['lastname'] ?></div>
                            <div class="txn mt-2"><b>Specialization:</b> <?php echo $row_pat['Specialization_Type']?>  </div>
                        </div>
                        <div class="col-5">
                            <h2>Patient</h2>
                            <div class="txn mt-2"><b>Name:</b> <?php echo $row['firstname'].' '.$row['lastname'] ?></div>
                            <div class="txn mt-2"><b>Schedule Day:</b> <?php echo $row_pat['day']?></div>
                        </div>
                    </div>
                   
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td style="text-align: center;">Date</td>
                            <td>Start Time</td>
                            <td>End Time</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                             
                            <td style="text-align: center;"><?php echo $_GET['date']?></td>
                            <td><?php echo date('h:i A', strtotime($row_pat['start_time'])); ?></td>
                            <td><?php echo date('h:i A', strtotime($row_pat['end_time'])); ?></td>
                        </tr>

                        <form method="post">
                          <input type="hidden" name="date" value="">
                            <table class="com">
                              <tr>
                               <label style="font-family: sand-serif; font-size: 25px;"><b>Complain:</b></label>
                                <td><textarea type="text" rows="5" cols="100" class="form-control" id="inputEmail4" placeholder="Complain" name="comp" style="width:100%; height: 100%; resize: none;" placeholder="please type your Complain " required=""></textarea></td>
                              </tr>
                              <tr>

                              </tr>
                            </table>


                            <button  type="submit" class="btn btn-success float-right" style="margin-left: 10px; margin-top: 10px;" name="book" class="fas fa-book-medical"></i> Book </button>
                            <a  href="../Patient/Appointment.php?id=<?php echo $_GET['id'] ?>&show=1" class="btn btn-danger float-right" style="margin-top: 10px;"><i style="margin-top: 3px;" class="fas fa-door-open"></i> Exit </a>


                        </form>
                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col-8">
                        <p class="m-0 font-weight-bold"> Note: </p>
                        <p>Once you click the "BOOK" Button your appointment will be automatically submitted. Make sure that you input your complain before click the "BOOK Button". Thankyou!</p>
                    </div>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            
                        </table>

                        <!-- Signature -->
                        <div class="col-12">
                            <img src="signature.png" class="img-fluid" alt="">
                            <p class="text-center m-0"> Doctor Signature </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Cart BG -->
            <img src="cart.jpg" class="img-fluid cart-bg" alt="">

            <footer>
                <hr>
                <p class="m-0 text-center">
                    Visit our FB page - <a href="#!"> https://www.facebook.com/pgne.santodomingo.dh </a>
                </p>
                <div class="social pt-3">

                    <span class="pr-2">
                  <span></span>
                    </span>
                    <span class="pr-2">
                        <i class="fas fa-mobile-alt"></i>
                        <span>0975 919 6951</span>
                    </span>
                    <span class="pr-2">
                        <i class="fas fa-envelope"></i>
                        <span>@pgne.stodomingodh@gmail.com</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-facebook-f"></i>
                        <span>@pgne.santodomingo.dh</span>
                    </span>

                    <span class="pr-2">
                  <span></span>
                    </span>

                    <span class="pr-2">
                  <span></span>
                    </span>
                </div>
            </footer>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">APPOINTMENT SUBMITTED!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Do you want to print a copy of your appointment?</h3>
        <br>

        <b>Note:</b> Screenshot copy will be accepted in the hospital
      </div>
      <form method="post">
      <div class="modal-footer">
         <a href="Patient_Dashboard.php" class="btn btn-secondary">NO</a>
        <a href="Print.php?schedule_id=<?php echo $schedule_id?>&date=<?php echo $Date?>" class="btn btn-primary">YES</a>
      </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<!-- Modal -->

