
<?php
  include('../dbconnection/Login_conn.php');
    include('../dbconnection/Validate_patient.php');
    include('../Header/Login_header.php');
    include('../ADMIN/Admin_action.php');

?>

<?php 
     $rec = $_GET['rec_id'];

      $query_pat = "SELECT pt.patient_id, pt.firstname, pt.lastname, pt.middlename, dt.Doctor_id, dt.firstname, dt.lastname, dt.middlename, sp.Specialization_Type, pd.record_id, pd.dateofdiagnosis, pd.bloodpressure, pd.rest_rate, pd.temperature, pd.height, pd.weight, pd.findings FROM patient_tbl pt INNER JOIN patient_diagnosis_tbl pd ON pt.patient_id = pd.patient_id INNER JOIN doctor_tbl dt ON pd.doctor_id = dt.doctor_id INNER JOIN specialization_tbl sp ON dt.Specialization_id = sp.Specialization_id WHERE pd.record_id = '$rec'";
      $stmt=$conn->prepare($query_pat);
      $stmt->execute();
      $result_pat=$stmt->get_result();
      $row_pat=$result_pat->fetch_assoc();



      $query_res = "SELECT * FROM patient_tbl WHERE patient_id = '$_SESSION[patient_id]'";
      $stmt=$conn->prepare($query_res);
      $stmt->execute();
      $result_res=$stmt->get_result();

      $row=$result_res->fetch_assoc();


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
                        <p>Record ID<span> <b><?php echo $row_pat['record_id'];?></b></span></p>
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
                        </div>
                    </div>
                   
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td style="text-align: center;">Date of Diagnosis</td>
                            <td>Blood Pressure</td>
                            <td>Respiratory Rate</td>
                            <td>Temperature</td>
                            <td>Height</td>
                            <td>Weight</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                             
                            <td style="text-align: center;"><?php echo $row_pat['dateofdiagnosis'] ?></td>
                            <td><?php echo $row_pat['bloodpressure'] ?></td>
                            <td><?php echo $row_pat['rest_rate'] ?></td>
                            <td><?php echo $row_pat['temperature'] ?></td>
                            <td><?php echo $row_pat['height'] ?></td>
                            <td><?php echo $row_pat['weight'] ?></td>

                        </tr>

                        <form method="post">
                          <input type="hidden" name="date" value="">
                            <table class="com">
                              <tr>
                               <label style="font-family: sand-serif; font-size: 25px;"><b>Doctor Findings</b></label>
                                <td><textarea rows="5" cols="100" class="form-control" id="inputEmail4" placeholder="Complain" name="comp" style="width:100%; height: 100%; resize: none;" required="" readonly=""><?php echo $row_pat['findings']; ?></textarea></td>
                              </tr>
                              <tr>

                              </tr>
                            </table>


                            <button  type="submit" class="btn btn-primary float-right" id="printpagebutton" onclick="printpage()" style="margin-left: 10px; margin-top: 10px;" name="book" class="fas fa-book-medical"></i> Print </button>
                            <a  href="Patient_Diagnostics.php" class="btn btn-danger float-right" id="exit" style="margin-top: 10px;"><i style="margin-top: 3px;" class="fas fa-door-open"></i> Exit </a>


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
                    Visit our FB page - <a href="https://www.facebook.com/pgne.santodomingo.dh"> https://www.facebook.com/pgne.santodomingo.dh </a>
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

  

</body>
</html>

<!-- Script -->
<script>
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        var exit = document.getElementById("exit");
        var headhide = document.getElementById("headhide");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        exit.style.visibility = 'hidden';
        headhide.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printButton.style.visibility = 'visible';
        exit.style.visibility = 'visible';
        headhide.style.visibility = 'visible';
    }
</script>

