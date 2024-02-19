<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href ="<?php echo URLROOT; ?>/css/style.css">

    <title><?php echo SITENAME; ?> </title>

    <style>
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

a {
    text-decoration: none;
}

li {
    list-style: none;
}

:root {
    --poppins: 'Poppins', sans-serif;
    --lato: 'Lato', sans-serif;

    --light: #F9F9F9;
    --blue: #3C91E6;
    --light-blue: #CFE8FF;
    --grey: #eee;
    --dark-grey: #AAAAAA;
    --dark: #342E37;
    --red: #DB504A;
    --yellow: #FFCE26;
    --light-yellow: #FFF2C6;
    --orange: #FD7238;
    --light-orange: #FFE0D3;
}

html {
    overflow-x: hidden;
}

body.dark {
    --light: #0C0C1E;
    --grey: #060714;
    --dark: #FBFBFB;
}

body {
    background: var(--grey);
    overflow-x: hidden;
}


/*added by me to make bran work outside of: #sidebar .brand */

.brand {
    font-size: 24px;
    font-weight: 700;
    height: 56px;
    display: flex;
    align-items: center;
    color: var(--blue);
    position: sticky;
    top: 0;
    left: 0;
    background: var(--light);
    z-index: 500;
    /* padding-bottom: 20px; */
    box-sizing: content-box;

}



/* SIDEBAR */
#sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 280px;
    height: 100%;
    background: var(--light);
    z-index: 2000;
    font-family: var(--lato);
    transition: .3s ease;
    overflow-x: hidden;
    scrollbar-width: none;
}
#sidebar::--webkit-scrollbar {
    display: none;
}
#sidebar.hide {
    width: 60px;
}
#sidebar .brand {
    font-size: 24px;
    font-weight: 700;
    height: 56px;
    display: flex;
    align-items: center;
    color: var(--blue);
    position: sticky;
    top: 0;
    left: 0;
    background: var(--light);
    z-index: 500;
    padding-bottom: 20px;
    box-sizing: content-box;
}
#sidebar .brand .bx {
    min-width: 60px;
    display: flex;
    justify-content: center;
}
#sidebar .side-menu {
    width: 100%;
    margin-top: 48px;
}
#sidebar .side-menu li {
    height: 48px;
    background: transparent;
    margin-left: 6px;
    border-radius: 48px 0 0 48px;
    padding: 4px;
}
#sidebar .side-menu li.active {
    background: var(--grey);
    position: relative;
}
#sidebar .side-menu li.active::before {
    content: '';
    position: absolute;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    top: -40px;
    right: 0;
    box-shadow: 20px 20px 0 var(--grey);
    z-index: -1;
}
#sidebar .side-menu li.active::after {
    content: '';
    position: absolute;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    bottom: -40px;
    right: 0;
    box-shadow: 20px -20px 0 var(--grey);
    z-index: -1;
}
#sidebar .side-menu li a {
    width: 100%;
    height: 100%;
    background: var(--light);
    display: flex;
    align-items: center;
    border-radius: 48px;
    font-size: 16px;
    color: var(--dark);
    white-space: nowrap;
    overflow-x: hidden;
}
#sidebar .side-menu.top li.active a {
    color: var(--blue);
}
#sidebar.hide .side-menu li a {
    width: calc(48px - (4px * 2));
    transition: width .3s ease;
}
#sidebar .side-menu li a.logout {
    color: var(--red);
}
#sidebar .side-menu.top li a:hover {
    color: var(--blue);
}
#sidebar .side-menu li a .bx {
    min-width: calc(60px  - ((4px + 6px) * 2));
    display: flex;
    justify-content: center;
}
/* SIDEBAR */





/* CONTENT */
#content {
    position: relative;
    width: calc(100% - 280px);
    left: 280px;
    transition: .3s ease;
}
#sidebar.hide ~ #content {
    width: calc(100% - 60px);
    left: 60px;
}




/* NAVBAR */
#content nav {
    height: 56px;
    background: var(--light);
    padding: 0 24px;
    display: flex;
    align-items: center;
    grid-gap: 24px;
    font-family: var(--lato);
    position: sticky;
    top: 0;
    left: 0;
    z-index: 1000;
}
#content nav::before {
    content: '';
    position: absolute;
    width: 40px;
    height: 40px;
    bottom: -40px;
    left: 0;
    border-radius: 50%;
    box-shadow: -20px -20px 0 var(--light);
}
#content nav a {
    color: var(--dark);
}
#content nav .bx.bx-menu {
    cursor: pointer;
    color: var(--dark);
}
#content nav .nav-link {
    font-size: 16px;
    transition: .3s ease;
}
#content nav .nav-link:hover {
    color: var(--blue);
}

#content nav form {
    max-width: 400px;
    width: 100%;
    
    /* margin-right: auto; */
}

#content nav form .form-input {
    display: flex;
    align-items: center;
    height: 36px;
}
#content nav form .form-input input {
    flex-grow: 1;
    padding: 0 16px;
    height: 100%;
    border: none;
    background: var(--grey);
    border-radius: 36px 0 0 36px;
    outline: none;
    width: 100%;
    color: var(--dark);
}
#content nav form .form-input button {
    width: 36px;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: var(--blue);
    color: var(--light);
    font-size: 18px;
    border: none;
    outline: none;
    border-radius: 0 36px 36px 0;
    cursor: pointer;
}


/* me added to get the search bar, currently in .homepagebackgroundPic */

form {
    max-width: 400px;
    width: 100%;
    /* margin-right: auto; */
    margin: auto;
    /* margin-top: 10%; */
    /* margin-top: 20px; */
    /* margin-top: 30px; */
    margin-top: 5%;
    margin-bottom: 5%;
    /* margin-bottom: 46px; */
}
form .form-input {
    display: flex;
    align-items: center;
    height: 36px;
}
form .form-input input {
    flex-grow: 1;
    padding: 0 16px;
    height: 100%;
    border: none;
    background: var(--grey);
    border-radius: 36px 0 0 36px;
    outline: none;
    width: 100%;
    color: var(--dark);
}
form .form-input button {
    width: 36px;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: var(--blue);
    color: var(--light);
    font-size: 18px;
    border: none;
    outline: none;
    border-radius: 0 36px 36px 0;
    cursor: pointer;
} 

/* #content main .head-title .btn-download {
    height: 36px;
    padding: 0 16px;
    border-radius: 36px;
    background: var(--blue);
    color: var(--light);
    display: flex;
    justify-content: center;
    align-items: center;
    grid-gap: 10px;
    font-weight: 500;
}
#content nav .notification {
    font-size: 16px;
    position: relative;

    height: 36px;
    padding: 0 16px;
    border-radius: 36px;
    background: var(--blue);
    color: var(--light);
    display: flex;
    justify-content: center;
    align-items: center;
    grid-gap: 10px;
    font-weight: 500;
}
#content nav .notification .num {
    position: absolute;
    top: -6px;
    right: -6px;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 2px solid var(--light);
    background: var(--red);
    color: var(--light);
    font-weight: 700;
    font-size: 12px;
    display: flex;
    justify-content: center;
    align-items: center;
}

#content nav .profile img {
    width: 36px;
    height: 36px;
    object-fit: cover;
    border-radius: 50%;
}
#content nav .switch-mode {
    display: block;
    min-width: 50px;
    height: 25px;
    border-radius: 25px;
    background: var(--grey);
    cursor: pointer;
    position: relative;
}
#content nav .switch-mode::before {
    content: '';
    position: absolute;
    top: 2px;
    left: 2px;
    bottom: 2px;
    width: calc(25px - 4px);
    background: var(--blue);
    border-radius: 50%;
    transition: all .3s ease;
}
#content nav #switch-mode:checked + .switch-mode::before {
    left: calc(100% - (25px - 4px) - 2px);
}
/* NAVBAR */





/* MAIN */
#content main {
    width: 100%;
    padding: 36px 24px;
    font-family: var(--poppins);
    max-height: calc(100vh - 56px);
    overflow-y: auto;
}

/*added by me to make homepage background pic w search: */
#content main .homepagebackgroundPic {
    
    /* border-raidus: 25px; */
    /* background-image: url('blackwomenreceptionistone.jpg'); */
    background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.5)), url('blackwomenreceptionistone.jpg');
    background-repeat: no-repeat;
    /* background-attachment: fixed; */
    background-size: cover;
    background-size: 100% 100%;

    min-height: 60vh;

    /* filter: blur(.5px);
  -webkit-filter: blur(.5px); */
}
/* #content main .homepagebackgroundPic .homepagebackgroundPicClear {
    background-image: :disable;

} */

/*I changed from justify-content: space-between  to center*/
#content main .head-title {
    display: flex;
    align-items: center;
    justify-content: center;
    grid-gap: 16px;
    flex-wrap: wrap;

    /* border-raidus: 25px; */

    /* padding: 6px;
    background: var(--light);
    border-radius: 20px;
    display: flex;
    align-items: center;
    grid-gap: 24px; */

}

/*this is the backgroound for the title*/
/*what pushes title down */
#content main .head-title .left h1 {
    /* border-radius: 21px; */

    /* padding: 6px; */
    padding: 3px 12px;
    background: var(--light);
    border-radius: 20px;
    display: flex;
    align-items: center;

    justify-content: center;

    grid-gap: 24px;

    /* background: linear-gradient(rgba(255,255,255,255)); */
    background: rgba(255,255,255,255);
    font-size: 36px;
    font-weight: 600;
    color: var(--dark);



    margin-top: 66px;


    margin-bottom: 20px;
    
}

/* #content main .head-title .left form {
    display: flex;
    align-items: center;
    justify-content: center;
} */

/* #content main .head-title .left .homepagesearchSchoolBus {
    display: flex;
    align-items: center;
    justify-content: center;

} */

/*font-enter your school to get started */
#content main .head-title .left .breadcrumb {
    display: flex;
    align-items: center;
/* i added justify content */
    justify-content: center;

    grid-gap: 16px;


    font-size: 26px;


    margin-top: 16px;
    /* padding: 16px 16px; */
}


#content main .head-title .left .breadcrumb li {
    /* color: var(--dark); */
    /* height: 36px;
    padding: 0 16px;
     */

    margin-top: 26px;

    padding: 6px 16px;
    

    color: var(--light);

}
#content main .head-title .left .breadcrumb li a {
    /* color: var(--dark-grey); */
    /* margin-top: 16px; */
    color: var(--light);
    pointer-events: none;
    
}
#content main .head-title .left .breadcrumb li a.active {
    color: var(--blue);
    pointer-events: unset;
}







#content main .head-title .btn-download {
    height: 36px;
    padding: 0 16px;
    border-radius: 36px;
    background: var(--blue);
    color: var(--light);
    display: flex;
    justify-content: center;
    align-items: center;
    grid-gap: 10px;
    font-weight: 500;
}




#content main .box-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    grid-gap: 24px;
    margin-top: 36px;
}
#content main .box-info li {
    padding: 24px;
    background: var(--light);
    border-radius: 20px;
    display: flex;
    align-items: center;
    grid-gap: 24px;
}
#content main .box-info li .bx {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    font-size: 36px;
    display: flex;
    justify-content: center;
    align-items: center;
}
#content main .box-info li:nth-child(1) .bx {
    background: var(--light-blue);
    color: var(--blue);
}
#content main .box-info li:nth-child(2) .bx {
    background: var(--light-yellow);
    color: var(--yellow);
}
#content main .box-info li:nth-child(3) .bx {
    background: var(--light-orange);
    color: var(--orange);
}
#content main .box-info li .text h3 {
    font-size: 24px;
    font-weight: 600;
    color: var(--dark);
}
#content main .box-info li .text p {
    color: var(--dark);
}





#content main .table-data {
    display: flex;
    flex-wrap: wrap;
    grid-gap: 24px;
    margin-top: 24px;
    width: 100%;
    color: var(--dark);
}
#content main .table-data > div {
    border-radius: 20px;
    background: var(--light);
    padding: 24px;
    overflow-x: auto;
}
#content main .table-data .head {
    display: flex;
    align-items: center;
    grid-gap: 16px;
    margin-bottom: 24px;
}
#content main .table-data .head h3 {
    margin-right: auto;
    font-size: 24px;
    font-weight: 600;
}
#content main .table-data .head .bx {
    cursor: pointer;
}

#content main .table-data .order {
    flex-grow: 1;
    flex-basis: 500px;
}
#content main .table-data .order table {
    width: 100%;
    border-collapse: collapse;
}
#content main .table-data .order table th {
    padding-bottom: 12px;
    font-size: 13px;
    text-align: left;
    border-bottom: 1px solid var(--grey);
}
#content main .table-data .order table td {
    padding: 16px 0;
}
#content main .table-data .order table tr td:first-child {
    display: flex;
    align-items: center;
    grid-gap: 12px;
    padding-left: 6px;
}
#content main .table-data .order table td img {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
}
#content main .table-data .order table tbody tr:hover {
    background: var(--grey);
}
#content main .table-data .order table tr td .status {
    font-size: 10px;
    padding: 6px 16px;
    color: var(--light);
    border-radius: 20px;
    font-weight: 700;
}
#content main .table-data .order table tr td .status.completed {
    background: var(--blue);
}
#content main .table-data .order table tr td .status.process {
    background: var(--yellow);
}
#content main .table-data .order table tr td .status.pending {
    background: var(--orange);
}


#content main .table-data .todo {
    flex-grow: 1;
    flex-basis: 300px;
}
#content main .table-data .todo .todo-list {
    width: 100%;
}
#content main .table-data .todo .todo-list li {
    width: 100%;
    margin-bottom: 16px;
    background: var(--grey);
    border-radius: 10px;
    padding: 14px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
#content main .table-data .todo .todo-list li .bx {
    cursor: pointer;
}
#content main .table-data .todo .todo-list li.completed {
    border-left: 10px solid var(--blue);
}
#content main .table-data .todo .todo-list li.not-completed {
    border-left: 10px solid var(--orange);
}
#content main .table-data .todo .todo-list li:last-child {
    margin-bottom: 0;
}
/* MAIN */
/* CONTENT */









@media screen and (max-width: 768px) {
    #sidebar {
        width: 200px;
    }

    #content {
        width: calc(100% - 60px);
        left: 200px;
    }

    #content nav .nav-link {
        display: none;
    }
}






@media screen and (max-width: 576px) {
    #content nav form .form-input input {
        display: none;
    }

    #content nav form .form-input button {
        width: auto;
        height: auto;
        background: transparent;
        border-radius: none;
        color: var(--dark);
    }

    #content nav form.show .form-input input {
        display: block;
        width: 100%;
    }
    #content nav form.show .form-input button {
        width: 36px;
        height: 100%;
        border-radius: 0 36px 36px 0;
        color: var(--light);
        background: var(--red);
    }

    #content nav form.show ~ .notification,
    #content nav form.show ~ .profile {
        display: none;
    }

    #content main .box-info {
        grid-template-columns: 1fr;
    }

    #content main .table-data .head {
        min-width: 420px;
    }
    #content main .table-data .order table {
        min-width: 420px;
    }
    #content main .table-data .todo .todo-list {
        min-width: 420px;
    }
}
    </style>
    
</head>

<body>

<!-- SIDEBAR -->
<!-- i added style = "sidebar.hide" to hide sidebar on homepage-->
<section id="sidebar">
    <a href="#" class="brand"> 
        <i class='bx bxs-smile'></i>
        <!-- <span class="text">RateMyRectp</span> -->
    </a> 
    <ul class="side-menu top">
        <!-- <li class="active">
            <a href="#">
            <i class='bx bx-phone-call'></i>
                <span class="text">Receptionists</span>
            </a>
        </li> -->
        
        <!-- <li>
            <a href="#">
            <i class='bx bxs-school' ></i> -->
            <!-- <i class='bx bxs-graduation'></i>
                <span class="text">Work Place</span>
            </a>
        </li> -->

        <!-- <li>
            <a href="#">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Analytics</span>
            </a>
        </li> -->
        <!-- <li>
            <a href="#">
                <i class='bx bxs-message-dots' ></i>
                <span class="text">Message</span>
            </a>
        </li> -->
        <!-- <li>
            <a href="#">
            <i class='bx bx-note'></i>
                <span class="text">Rate</span>
            </a>
        </li> -->
    </ul>

    <!-- <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog' ></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="#" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul> -->

    <ul class="side-menu">
        <li>
            <a title = "Login" href="#">
            <i class='bx bx-user-check' ></i>
                <span class="text" >Login</span>
            </a>
        </li>
        <li>
            <a href="#" title = "Sign Up" class="logout">
            <!-- <i class='bx bx-user-plus'></i> -->
            <i class='bx bxs-edit-alt' ></i>
                <span class="text">Sign Up</span>
            </a>
        </li>
    </ul>

</section>
<!-- SIDEBAR -->



<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <!-- <i class='bx bx-menu' ></i> -->

        <!-- <a href="#" class="nav-link">Categories</a> -->
        
    <!-- <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">RatetMyRectp</span>
    </a> -->

        <!-- <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
            </div>
        </form>
         -->

        <!-- <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label> -->


        <!-- <a href="#" class="notification">
            <i class='bx bxs-bell' ></i>
            <span class="num">8</span>
        </a> -->
        <!-- <a href="#" class="notification"> -->
        <a href="#" class="profile">
            <!-- <i class='bx bxs-bell' ></i> -->
            <!-- <span class="num">8</span> -->
            Login
        </a>
        <!-- <a href="#" class="profile">
            <img src="img/people.png">
        </a> -->
        <a href="#" class="notification">
        <!-- <a href="#" class="profile"> -->
            <!-- <img src="img/people.png"> -->
            Sign Up
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
<main>
    <!-- <main> -->
    <!-- <a href = "homepage.php" rel = "stylesheet">homepage</a>
    <br>
    <a href = "searchresults.php" rel = "stylesheet">searchresults</a>  -->
<!-- 
        <div class="head-title">
            <div class="left">
                <h1>Rate My Receptionists</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Rate My Receptionists</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="#">Home</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download' ></i>
                <span class="text">Download PDF</span>
            </a>
        </div> -->







        <div class = "homepagebackgroundPic">
                
            
                <div class="head-title">

                    <div class="left">


                        <h1>Rate My Receptionist</h1>

                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Enter your school or business to get started</a>
                            </li>
                        </ul>
                           
                            <!-- <form class = "homepagesearchSchoolBus" action="#"> -->
                            <form class = "picForm" style = "display: block" action="#">
                                <div class="form-input">
                                    <input type="search" placeholder="Search...">
                                    <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
                                </div>
                            </form> 
                           
                            <li>
                                <a href="#" class="btn-download" style = "color: white;">
                                    <i class='bx bxs-cloud-download' ></i>
                                    <span class="text">I'd Like to look up a receptionist by name</span>
                                </a>
                            </li>
                
                            <!-- <li><i class='bx bx-chevron-right' ></i></li>
                            <li>
                                <a class="active" href="#">Home</a>
                            </li> -->
                        <!-- </ul> -->
                        
                    </div>

                    <!-- <a href="#" class="btn-download">
                        <i class='bx bxs-cloud-download' ></i>
                        <span class="text">Download PDF</span>
                    </a> -->
                </div>
        </div>
        
        
</main>


<!-- 
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
                </div>
            </form> 


            <a href="#" class="btn-download" style = "color: white;">
                    <i class='bx bxs-cloud-download' ></i>
                    <span class="text">I'd Like to look up a receptionist by name</span>
            </a>
             -->


        <!-- </div> -->



        
        <!-- <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check' ></i>
                <span class="text">
						<h3>1020</h3>
						<p>Your Ratings Are Always Anonymous</p>
					</span>
            </li>
            <li>
                <i class='bx bxs-group' ></i>
                <span class="text">
						<h3>2834</h3>
						<p>Manage and Edit your ratings</p>
					</span>
            </li>
            <li>
                <i class='bx bxs-dollar-circle' ></i>
                <span class="text">
						<h3>$2543</h3>
						<p>Like Or Dislike ratings</p>
					</span>
            </li>
        </ul>


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Recent Orders</h3>
                    <i class='bx bx-search' ></i>
                    <i class='bx bx-filter' ></i>
                </div>
                <table>
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Date Order</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>John Doe</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>John Doe</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>John Doe</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status process">Process</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>John Doe</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>John Doe</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="todo">
                <div class="head">
                    <h3>Todos</h3>
                    <i class='bx bx-plus' ></i>
                    <i class='bx bx-filter' ></i>
                </div>
                <ul class="todo-list">
                    <li class="completed">
                        <p>Todo List</p>
                        <i class='bx bx-dots-vertical-rounded' ></i>
                    </li>
                    <li class="completed">
                        <p>Todo List</p>
                        <i class='bx bx-dots-vertical-rounded' ></i>
                    </li>
                    <li class="not-completed">
                        <p>Todo List</p>
                        <i class='bx bx-dots-vertical-rounded' ></i>
                    </li>
                    <li class="completed">
                        <p>Todo List</p>
                        <i class='bx bx-dots-vertical-rounded' ></i>
                    </li>
                    <li class="not-completed">
                        <p>Todo List</p>
                        <i class='bx bx-dots-vertical-rounded' ></i>
                    </li>
                </ul>
            </div>
        </div>

    </main>
    MAIN -->
</section>
<!-- CONTENT -->

<!-- <script>
    window.addEventListener("load", (event) => {
        sidebar.classList.toggle('hide');
  console.log("page is fully loaded");
});
</script> -->

<!-- <script>

// const sidebar = document.getElementById('sidebar');

function hidemUp() {
    classList.toggle('hide');
}
 
</script> -->


<!-- <script>
    window.addEventListener('load', (event) => {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('hide');
    console.log('The page has fully loaded');
});
</script>



<script src="script.js"></script> -->









<!-- 
<script>
    window.addEventListener('load', (event) => {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('hide');
    console.log('The page has fully loaded');
});
</script>

<script>
    const menuBar = document.querySelector('#content nav .bx.bx-menu');
    const sidebar = document.getElementById('sidebar');

    menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
})

</script> -->




