<!DOCTYPE html>
<html>
<head>
    <title>Send an Email</title>
</head>
<body>

	<center>
		<h4 class="sent-notification"></h4>

		<form id="myForm">
			<h2>Send an Email</h2>

			<label>Email</label>
			<input id="email" type="text" placeholder="Enter Email">
			<br><br>

			<label>Subject</label>
			<input id="subject" type="text" placeholder=" Enter Subject">
			<br><br>

			<p>Message</p>
			<textarea id="body" rows="5" placeholder="Type Message"></textarea>
			<br><br>

			<button type="button" onclick="sendEmail()" value="Send An Email">Submit</button>
		</form>
	</center>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
           
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'Send_Email.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>
      


      <!--DOCTOR LIST-->
     <?php 
      $query="SELECT dt.Doctor_id, dt.firstname, dt.lastname, dt.middlename, dt.houseno, dt.barangay, dt.municipality, dt.province, dt.contactNo, st.Specialization_Type FROM doctor_tbl dt INNER JOIN specialization_tbl st WHERE dt.Specialization_id = st.Specialization_id";
      $stmt=$conn->prepare($query);
      $stmt->execute();
      $result=$stmt->get_result();
          ?>
<!--PATIENT LIST-->

<?php 
      $query1="SELECT pt.patient_id, pt.firstname, pt.lastname, pt.middlename, pt.houseNo, pt.barangay, pt.municipality, pt.province, pt.contactno, sd.day, sd.start_time, sd.end_time, ap.complain FROM patient_tbl pt INNER JOIN appointment_tbl ap ON pt.patient_id = ap.patient_id INNER JOIN schedule_tbl sd WHERE ap.schedule_id = sd.schedule_id";
      $stmt1=$conn->prepare($query1);
      $stmt1->execute();
      $result1=$stmt1->get_result();
      ?>

<body style="margin-left: 150px; margin-top: 100px;">

<div style="margin-left: 230px;" class="col-md-8">
      <h2 class="text-center text-info" style="font-family: sans-serif; font-size: 40px;"> Doctor </h2>

      <div class="container">
  <h2></h2>
  <p></p>
 <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>MiddleName</th>
        <th>House#</th>
        <th>Barangay</th>
        <th>Municipality</th>
        <th>Province</th>
        <th>Contact#</th>
         <th>Spec_Type</th>
        <th>Action</th>
      </tr>
    </thead>
</tbody>

    <tbody>
       <?php 
    while ($row=$result->fetch_assoc()) { ?>
      <tr>

        <th scope="row"><?= $row['Doctor_id']; ?></th>
        <td><?= $row['firstname']; ?></td>
        <td><?= $row['lastname']; ?></td>
        <td><?= $row['middlename']; ?></td>
        <td><?= $row['houseno']; ?></td>
        <td><?= $row['barangay']; ?></td>
        <td><?= $row['municipality']; ?></td>
         <td><?= $row['province']; ?></td>
          <td><?= $row['contactNo']; ?></td>
          <td><?= $row['Specialization_Type']; ?></td>
        <td>
          <a href="" class="badge-primary btn-sm px-3" style="margin-left: -3%;">Details</a>
        </td>
      </tr>     
 <?php } ?>  

    </tbody>
  </table>
</div>
    </div>
  </div>
<!--Out Patient-->
    <div style="margin-top: 100px; margin-left: 230px;" class="col-md-8">
      <h2 class="text-center text-info" style="font-family: sans-serif; font-size: 40px;"> Patient</h2>

      <div class="container">
  <h2></h2>
  <p></p>
  <table class="table">
    <thead class="thead-dark">
      <tr>
       <th scope="row">ID</th>
        <th>LastName</th>
        <th>FirstName</th>
        <th>Middle Initial</th>
        <th>House#</th>
        <th>Barangay</th>
        <th>Municipality</th>
        <th>Province</th>
        <th>Contact Number</th>
        <th>Complain</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     <?php 
    while ($row1=$result1->fetch_assoc()) { ?>
      <tr>
        <th scope="row"><?= $row1['patient_id']; ?></th>
        <td><?= $row1['lastname']; ?></td>
        <td><?= $row1['firstname']; ?></td>
        <td><?= $row1['middlename']; ?></td>
        <td><?= $row1['houseNo']; ?></td>
        <td><?= $row1['barangay']; ?></td>
        <td><?= $row1['municipality']; ?></td>
         <td><?= $row1['province']; ?></td>
          <td><?= $row1['contactno']; ?></td>
          <td><?= $row1['complain']; ?></td>
        <td>
              <a href="" class="badge-primary btn-sm px-3" style="margin-left: -3%;">Details</a>
        </td>
      </tr>  
         <?php } ?>    
    </tbody>
  </table>
</div>
    </div>
  </div>



<script>
      $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>

  

   <?php 
    while ($row=$result_docs->fetch_assoc()) { ?>
<a href="Appointment.php?id=<?= $row['Doctor_id'] ?>&show=1">
  <div class="grid-item" class="card"><img src="../Pics/96-969204_physician-of-symbol-as-vector-caduceus-doctors-clipart.png" style="width:20%; height: 150px"><br><?= $row['firstname'].' '.$row['lastname'].'<br>'.$row['Specialization_Type'];?></div>
</a>