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


/* User Profile Dropdown */
.user-profile-dropdown {
    position: relative;
    display: inline-block;
}

.profile-trigger {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 12px;
    cursor: pointer;
    border-radius: 36px;
    transition: background 0.3s;
}

.profile-trigger:hover {
    background: var(--grey);
}

.profile-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--blue);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--light);
    font-size: 20px;
}

.user-email {
    font-size: 14px;
    font-weight: 500;
    color: var(--dark);
    max-width: 150px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.profile-trigger .bx-chevron-down {
    font-size: 18px;
    color: var(--dark);
    transition: transform 0.3s;
}

.user-profile-dropdown:hover .bx-chevron-down {
    transform: rotate(180deg);
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    right: 0;
    margin-top: 8px;
    background: var(--light);
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    min-width: 200px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
    z-index: 1000;
}

.user-profile-dropdown:hover .dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    color: var(--dark);
    text-decoration: none;
    transition: background 0.3s;
}

.dropdown-item:first-child {
    border-radius: 10px 10px 0 0;
}

.dropdown-item:last-child {
    border-radius: 0 0 10px 10px;
}

.dropdown-item:hover {
    background: var(--grey);
}

.dropdown-item i {
    font-size: 20px;
}

.dropdown-item.logout {
    color: var(--red);
}

.dropdown-item.logout:hover {
    background: rgba(255, 76, 96, 0.1);
}

.dropdown-divider {
    height: 1px;
    background: var(--grey);
    margin: 4px 0;
}


/* Force Profile Dropdown to Absolute Right */
#content nav {
    position: relative;
}

#content nav .user-profile-dropdown,
#content nav .profile,
#content nav .notification {
    position: absolute;
    right: 24px;
    top: 50%;
    transform: translateY(-50%);
}

/* When both login and signup exist, position them */
#content nav .profile {
    right: 120px; /* Adjust this number */
}

#content nav .notification {
    right: 24px;
}

/* When logged in, only profile dropdown */
#content nav .user-profile-dropdown {
    right: 24px;
}



@media screen and (max-width: 576px) {
    .user-email {
        display: none;
    }
    .dropdown-menu {
        right: -20px;
    }
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





<!--        <form action="#">-->
<!--            <div class="form-input">-->
<!--                <input type="search" placeholder="Search...">-->
<!--                <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>-->
<!--            </div>-->
<!--        </form>-->
<!--        -->


        

        <!-- <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label> -->


        <!-- <a href="#" class="notification">
            <i class='bx bxs-bell' ></i>
            <span class="num">8</span>
        </a> -->
        <!-- <a href="#" class="notification"> -->



        <!-- In the navbar or sidebar -->
        <a href="<?php echo URLROOT; ?>/institutions/add" class="nav-link">
            <i class='bx bx-plus-circle'></i> Add Institution
        </a>
        <a href="<?php echo URLROOT; ?>/receptionists/add" class="nav-link">
            <i class='bx bx-user-plus'></i> Add Receptionist
        </a>


        <?php if(isLoggedIn()): ?>
            <!-- Logged In - Show Profile Dropdown -->
            <div class="user-profile-dropdown">
                <div class="profile-trigger">
                    <div class="profile-circle">
                        <i class='bx bxs-user'></i>
                    </div>
                    <span class="user-email"><?php echo $_SESSION['user_email'] ?? 'User'; ?></span>
                    <i class='bx bx-chevron-down'></i>
                </div>
                <div class="dropdown-menu">
                    <a href="<?php echo URLROOT; ?>/dashboard" class="dropdown-item">
                        <i class='bx bx-home'></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="<?php echo URLROOT; ?>/users/settings" class="dropdown-item">
                        <i class='bx bx-cog'></i>
                        <span>Settings</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo URLROOT; ?>/users/logout" class="dropdown-item logout">
                        <i class='bx bx-log-out'></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        <?php else: ?>
            <!-- Not Logged In - Show Login/Sign Up -->
            <a href="<?php echo URLROOT; ?>/users/login" class="profile">
                <i class='bx bx-user-check'></i>
                Login
            </a>
            <a href="<?php echo URLROOT; ?>/users/register" class="notification">
                <i class='bx bxs-edit-alt'></i>
                Sign Up
            </a>
        <?php endif; ?>

    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->

<!--</section>-->
<!-- CONTENT -->


