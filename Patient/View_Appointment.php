<?php
  include('../dbconnection/Login_conn.php');
    include('../dbconnection/Validate_patient.php');
    include('../Header/Login_header.php');
    include('../ADMIN/Admin_action.php');



?>

<?php 
      $app_id = $_GET['id'];

      $query_pat = "SELECT pt.patient_id, pt.firstname, pt.lastname, pt.middlename, ap.appointment_id, ap.Date, ap.Complain, st.day, st.start_time, st.end_time, dt.firstname, dt.lastname, dt.middlename, sp.Specialization_Type FROM patient_tbl pt INNER JOIN appointment_tbl ap ON pt.patient_id = ap.patient_id INNER JOIN schedule_tbl st ON ap.schedule_id = st.schedule_id INNER JOIN doctor_tbl dt ON st.doctor_id = dt.doctor_id INNER JOIN specialization_tbl sp ON dt.Specialization_id = sp.Specialization_id WHERE pt.patient_id = '$_SESSION[patient_id]'";
      $stmt=$conn->prepare($query_pat);
      $stmt->execute();
      $result_pat=$stmt->get_result();
      $row_pat=$result_pat->fetch_assoc();



      $query_res = "SELECT * FROM patient_tbl WHERE patient_id = '$_SESSION[patient_id]'";
      $stmt=$conn->prepare($query_res);
      $stmt->execute();
      $result_res=$stmt->get_result();

      $row=$result_res->fetch_assoc();


      $query_res1 = "SELECT * FROM appointment_tbl WHERE appointment_id = '$app_id'";
      $stmt1=$conn->prepare($query_res1);
      $stmt1->execute();
      $result_res1=$stmt1->get_result();

      $row1=$result_res1->fetch_assoc();


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
    <div class="my-5 page" size="A4" id="printableArea">
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
                        <p>Appointment ID<span> <b><?php echo $row1['appointment_id']; ?></b></span></p>
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
                             
                            <td style="text-align: center;"><?php echo $row_pat['Date']?></td>
                            <td><?php echo date('h:i A', strtotime($row_pat['start_time'])); ?></td>
                            <td><?php echo date('h:i A', strtotime($row_pat['end_time'])); ?></td>
                        </tr>

                        <form method="post">
                          <input type="hidden" name="date" value="">
                            <table class="com">
                              <tr>
                               <label style="font-family: sand-serif; font-size: 25px;"><b>Complain:</b></label>
                                <td><textarea rows="5" cols="100" class="form-control" id="inputEmail4" placeholder="Complain" name="comp" style="width:100%; height: 100%; resize: none;" required="" readonly=""><?php echo $row1['Complain']; ?></textarea></td>
                              </tr>
                              <tr>

                              </tr>
                            </table>


                            <button  class="btn btn-primary float-right" type="button" id="printpagebutton" onclick="printpage()" style="margin-left: 10px; margin-top: 10px;" class="fas fa-book-medical"></i> Print </button>
                            <a  href="My_Appointment.php?id=<?php echo $_GET['id'] ?>&show=1" id="exit" class="btn btn-danger float-right" style="margin-top: 10px;"><i style="margin-top: 3px;" class="fas fa-door-open"></i> Exit </a>


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
                        <p class="m-0 font-weight-bold"></p>
                        <p></p>
                    </div>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            
                        </table>

                        <!-- Signature -->
                        <div class="col-12">
                            <img src="signature.png" class="img-fluid" alt="">
                            <p class="text-center m-0 float-right"> Doctor Signature </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Cart BG -->
            <img src="../Pics/asdf.png" class="img-fluid cart-bg" alt="">

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


<!-- <script>
     function printDiv() {
            var divContents = document.getElementById("printableArea").innerHTML;
            var a = window.open('', '', 'height=100%, width=100%');
            a.document.write('<html>');
            a.document.write('<body > <h1>Div contents are <br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
</script> -->