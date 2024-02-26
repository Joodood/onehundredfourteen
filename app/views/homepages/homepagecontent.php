
    <!-- MAIN -->
    <main>

<!-- <h1> <?php echo $data['title']; ?> </h1> -->
<!-- <h1> <?php echo "................" . $data['single_institution']->{"institution_name"}; ?> </h1> -->


<div class = "homepagebackgroundPic">
        <div class="head-title">
                <div class="left">
                    <h1>Rate My Receptionist</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Enter your school or business to get started</a>
                        </li>
                    </ul>
                
                        <form class = "picForm" style = "display: block" action="#">
                            <div class="form-input">

                                <input type="text" id = "live_search" placeholder="Search...">

                                <!-- <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button> -->
                            </div>

                            <div id = "searchresult">

                            </div>

                        </form> 
                       
                        <li>
                            <a href="<?php echo URLROOT; ?>/receptionist" class="btn-download" style = "color: white;">
                                <i class='bx bxs-cloud-download' ></i>
                                <span class="text">I'd Like to look up a receptionist by name</span>
                            </a>
                        </li>
                </div>
        </div>
</div>


</main>

</section>
<!-- CONTENT -->
