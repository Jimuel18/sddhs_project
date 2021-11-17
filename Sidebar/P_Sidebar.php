
<div class="sidebar-menu">

	<nav class="nav">
        <div class="nav__links">
        		<header style="text-align: center; background: black; color: #FBDE44FF; padding: 20px;">STO DOMINGO DISTRICT HOSPITAL</header>
        		<br>
        		<br>
            <a href="Patient_Dashboard.php" class="nav__link">
                <i class="material-icons">medical_services</i>
               Home
            </a>
            <a class="nav__link" href="Doctor_List.php">
                <i class="material-icons">medication</i>
                Doctor List
            </a>
            <a class="nav__link " href="../My_Appointment.php">
                <i class="material-icons">import_contacts</i>
                Add Complain
            </a>
            

          <a style="width: 100px; margin: auto; margin-top: 150%;" class="btn btn-primary btn-block"  href="../dbconnection/Logout_patient.php" name="Logout"> <i class="fas fa-sign-out-alt"></i>
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