<style>
#content main .homepagebackgroundPic {
    
    /* border-raidus: 25px; */
    /* background-image: url('blackwomenreceptionistone.jpg'); */
    background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.5)), url('<?php echo URLROOT; ?>/images/blackwomenreceptionistone.jpg');
    background-repeat: no-repeat;
    /* background-attachment: fixed; */
    background-size: cover;
    background-size: 100% 100%;

    min-height: 60vh;

    /* filter: blur(.5px);
  -webkit-filter: blur(.5px); */
}
</style>
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
                            <a href="#">Enter your Receptionist to get started</a>
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
                            <a href="<?php echo URLROOT; ?>/institutions" class="btn-download" style = "color: white;">
                                <i class='bx bxs-cloud-download' ></i>
                                <span class="text">I'd Like to look up a Institution by name</span>
                            </a>
                        </li>
                </div>
        </div>
</div>


</main>

</section>
<!-- CONTENT -->