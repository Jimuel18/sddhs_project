
<div class="sidebar-menu">

	<nav class="nav">
        <div class="nav__links">
        		<header style="text-align: center; background: black; color: #FBDE44FF; padding: 20px;">STO DOMINGO DISTRICT HOSPITAL</header>
        		<br>
        		<br>
            <a href="../ADMIN/Admin.php" class="nav__link">
                <i class="material-icons">medical_services</i>
               Dashboard
            </a>
            <a class="nav__link" href="../DOCTOR/Doctor.php">
                <i class="material-icons">medication</i>
                Doctors
            </a>
            <a class="nav__link " href="../PATIENT/Patient.php">
                <i class="material-icons">import_contacts</i>
                Patients
            </a>

              <a class="nav__link " href="../ADMIN/Account_Verification.php">
               <i class="fa fa-unlock" style="font-size:20px"></i>
                Account Verification
            </a>
            
            <a class="nav__link " href="../ADMIN/Schedule.php">
               <i class="material-icons">date_range
               </i>
                Schedule
            </a>

             <a class="nav__link " href="../ADMIN/Appointment.php">
                <i class="material-icons">fact_check</i>
                Appointment
            </a>


            <a class="nav_link" href="../dbconnection/Logout_patient.php">
            <i class="fas fa-sign-out-alt"></i>
               Logout
            </a>

        </div>
        <div class="nav__overlay"></div>
    </nav>

    <script>
    window.addEventListener("load", () => {
            document.body.classList.remove("preload");
        });

        document.addEventListener("DOMContentLoaded", () => {
            const nav = document.querySelector(".nav");

            document.querySelector("#btnNav").addEventListener("click", () => {
                nav.classList.add("nav--open");
            });

            document.querySelector(".nav__overlay").addEventListener("click", () => {
                nav.classList.remove("nav--open");
            });
        });
</script>