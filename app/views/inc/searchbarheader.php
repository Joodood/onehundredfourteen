<style>
#content nav .bx.bx-menu {
    cursor: pointer;
    color: var(--dark); /* Ensure this color contrasts well with your background */
    position: relative;
    display: inline-block;
    width: 40px; /* Reduced width for a smaller circle */
    height: 40px; /* Reduced height for a smaller circle */
    text-align: center;
    line-height: 40px; /* Adjust line height to match the new height */
    transition: color 0.5s ease, box-shadow 0.5s ease;
    border-radius: 50%; /* Maintain circular shape */
}

#content nav .bx.bx-menu:hover {
    color: #3C91E6; /* Blue color on hover for the icon */
    box-shadow: 0 0 8px #3C91E6, 0 0 16px #3C91E6; /* Smaller glowing effect circle */
}

    </style>

<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu' ></i>

        <!-- <a href="#" class="nav-link">Categories</a> -->
        
    <!-- <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">RatetMyRectp</span>
    </a> -->

        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
            </div>
        </form>
        

        <!-- <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label> -->


        <!-- <a href="#" class="notification">
            <i class='bx bxs-bell' ></i>
            <span class="num">8</span>
        </a> -->
        <!-- <a href="#" class="notification"> -->
        <a href ="<?php echo URLROOT; ?>/Users/login" class="nav-link">
            <!-- <i class='bx bxs-bell' ></i> -->
            <!-- <span class="num">8</span> -->
            Login
        </a>
        <!-- <a href="#" class="profile">
            <img src="img/people.png">
        </a> -->
        <a href ="<?php echo URLROOT; ?>/Users/register" class="nav-link">
        <!-- <a href="#" class="profile"> -->
            <!-- <img src="img/people.png"> -->
            Sign Up
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->

<!--</section>-->
<!-- CONTENT -->


