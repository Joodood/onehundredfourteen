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


<!-- <div class = "homepagebackgroundPic"> -->
<!-- <div style = "background:url('blackwomenreceptionistone.jpg')"> -->
    <div class = "homepagebackgroundPic">
        <!-- <img src ='blackwomenreceptionistone.jpg' class = 'homepagebackgroundPic'> -->
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

                                <button type="submit" id = "button" class="search-btn"><i class='bx bx-search' ></i></button>
                            </div>

                            <div id = "searchresult">

                            </div>

                        </form> 
                       
                        <li>
                            <a href="<?php echo URLROOT; ?>/receptionists" class="btn-download" style = "color: white;">
                                <i class='bx bxs-cloud-download' ></i>
                                <span class="text">I'd Like to look up a receptionist by name</span>
                            </a>
                        </li>
                </div>
        </div>
</div>



<script>
        function search() {
            var inputValue = $('#live_search').val();

            // Make AJAX request only if the input is not null or undefined
            if (inputValue !== null && inputValue !== undefined) {
                // Make AJAX request
                $.ajax({
                    type: 'POST',
                    url: 'search',
                    data: { input: inputValue },
                    success: function(response) {
                        // Update the content
                        // $('#searchresult').html(response);
                        console.log(response);
                    }
                });
            }
        }

        // Initial search on page load
        search();
    </script>



</main>

</section>
<!-- CONTENT -->
