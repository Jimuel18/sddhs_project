
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scales=1.0">
	<title>STO. DOMINGO DISTRICT HOSPITAL</title>
	<style type="text/css"></style>
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<style type="text/css">

	*{
		margin: 0;
		padding: 0;
		text-decoration: none;
	}

body{

	box-sizing: border-box;
}

.nav__links {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 2;
    height: 100vh;
    width: 250px;
    background: #ffffff;
    transform: translateX(-250px);
    transition: transform 0.3s;
}

.nav--open .nav__links {
    transform: translateX(0);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
}

.nav__link {
    display: flex;
    align-items: center;
    color: #666666;
    font-weight: bold;
    font-size: 14px;
    text-decoration: none;
    padding: 12px 15px;
    background: transform 0.2s;
}

.nav__link > i {
    margin-right: 15px;
}

.nav__link--active {
    color: #009578;
}

.nav__link--active,
.nav__link:hover {
    background: #eeeeee;
}

.nav__overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(2px);
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.4s;
}

.nav--open .nav__overlay {
    visibility: visible;
    opacity: 1;
}

.header__button {
    width: var(--header-height);
    flex-shrink: 0;
    background: #FBDE44FF;
    border: 2px solid;
    color: #ffffff;
    cursor: pointer;
    padding: 2px;

}


.Search_Bar {
margin-left: 80%;
margin-top: -30px;
border: 1px solid;
border-radius: 30px;
height: 50px;
display: flex;
align-items: center;
overflow-x: hidden; 
}


.Search_Bar input {
height: 100%;
padding: .5rem;
border: none;
outline: none;
}
header {
display: flex;
padding: 1rem;

}

.Cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 2rem;
    margin-top: 1rem;
    border: 2px solid;
    border-radius: 2px;
}

.Main_Panel {
margin-left: 45px;
}

.Hospital_Card{
    display: flex;
    justify-content: space-between;
    background: #fff;
    padding: 2rem;
    border-radius: 2px;
}

</style>

</head>
<body style="margin-top: 50px;">

    <div class="Main_panel">
        <header>
            <h1 style="color: black; text-align: center;">
                DASHBOARD
            </h1>
 <div class="Search_Bar">
                <span class="fas fa-search"></span>
                <input type="search" placeholder="Search Here!" />
            </div>

<main>
<div class="Cards">
            <div class="Hospital_Card">
                <h1>Count: </h1>
                <span>Patients</span>
            </div>

            <div>
                <span class="fab fa-accessible-icon"></span>
            </div>

            <div class="Hospital_Card" style="margin-top: -72px; margin-left: 400px; ">
                <h1>Count: </h1>
                <span>Doctors</span>
            </div>

            <div style=" margin-left: 400px; ">
                <span class="fas fa-user-md"></span>
            </div>

            <div class="Hospital_Card" style="margin-top: -70px; margin-left: 900px;">
                <h1>Count: </h1>
                <span>Admins</span>
            </div>

            <div style=" margin-left: 900px; ">
                <span class="fas fa-laptop-medical "></span>
            </div>
            </div>
        </header>
    </div>
</main>

    </header>
    
	<header style="position: fixed; top: 0; left: 0; width: 100%; height: var(--header-height); background: #28334AFF; display: flex; border: 2px solid;">


           
	<button class="header__button" id="btnNav" type="button">
            <i class="material-icons">menu</i>
        </button>
        <div style="background-image: url('67881575_108722483820362_4764055841588379648_n.jpg');width: 40px; height: 40px; position: fixed; margin-left: 150px; margin-top: 1px; border-radius: 50px;"></div>

<header style="text-align: center; font-size: 20px; margin-top: 2px; font-size: 35px; font-family: broadway; margin-left:170px;color:#FBDE44FF;">S.D.D.H.S</header>

</header>
</div>
<div class="sidebar-menu">

	<nav class="nav">
        <div class="nav__links">
        		<header style="text-align: center; background: black; color: #FBDE44FF; padding: 20px;">STO DOMINGO DISTRICT HOSPITAL</header>
        		<br>
        		<br>
            <a class="nav__link nav__link--active ">
                <i class="material-icons">medical_services</i>
               Dashboard
            </a>
            <a class="nav__link" href="#">
                <i class="material-icons">medication</i>
                Doctors
            </a>
            <a class="nav__link " href="#">
                <i class="material-icons">import_contacts</i>
                Patient
            </a>
            
            <a class="nav__link" href="#">
                <i class="material-icons">event</i>
                Room
            </a>
            <a class="nav__link" href="#">
                <i class="material-icons">logout</i>
                New/Old Patient
            </a>
            <a class="nav__link" href="#">
                <i class="material-icons">admin_panel_settings</i>
                Admin
            </a>
            <a class="nav__link" href="#">
                <i class="material-icons">lock</i>
                Security
            </a>
			
            <a class="nav__link" href="#">
                <i class="material-icons">info</i>
                About Us
            </a>
    
   
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
</body>
</html>