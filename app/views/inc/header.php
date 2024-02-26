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
    <a href = "homepage.php" rel = "stylesheet">homepage</a>
    <br>
    <a href = "searchresults.php" rel = "stylesheet">searchresults</a> 
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

<!-- <script>
function hidemUp() {
    const sidebar = document.getElementById('sidebar');

    classList.toggle('hide');
}
 
</script> 


<script>
    window.addEventListener('load', (event) => {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('hide');
    console.log('The page has fully loaded');
});
</script> -->










<!-- <script>
const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
    const li = item.parentElement;

    item.addEventListener('click', function () {
        allSideMenu.forEach(i=> {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
    if(window.innerWidth < 576) {
        e.preventDefault();
        searchForm.classList.toggle('show');
        if(searchForm.classList.contains('show')) {
            searchButtonIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
        }
    }
})





if(window.innerWidth < 768) {
    sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
    searchButtonIcon.classList.replace('bx-x', 'bx-search');
    searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
    if(this.innerWidth > 576) {
        searchButtonIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
    if(this.checked) {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }
})
</script> -->






<script src="<?php echo URLROOT; ?>/javascript/script.js"></script>