<style>
#content main .homepagebackgroundPic {
    background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.5)), url('<?php echo URLROOT; ?>/images/blackwomenreceptionistone.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-size: 100% 100%;
    min-height: 60vh;
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

                                <!-- <button class="search-btn" onclick="$('#searchresult').html('Test update');">Test Update</button> -->

                            </div>

                            <div id = "searchresult">



                                    
                            </div>

                        </form> 
                       
                        <li>
                            <a href="<?php echo URLROOT; ?>/receptionists" class="btn-download" style = "color: white;">
                            <!-- <a href="searchrec" class="btn-download" style = "color: white;">  -->

                                <i class='bx bxs-cloud-download' ></i>
                                <span class="text">I'd Like to look up a receptionist by name</span>
                            </a>
                        </li>
                </div>
        </div>
</div>


<script>
$(document).ready(function() {
    var ajaxCallEnabled = true;

    function search() {
        if (!ajaxCallEnabled) return;

        var inputValue = $('#live_search').val();
        console.log('Search triggered for:', inputValue);

        $.ajax({
            type: 'POST',
            url: 'search',
            data: { input: inputValue },
            success: function(response) {
                console.log('AJAX call successful, response:', response);

                // Check if the response indicates to stop further calls
                if (response.trim() === "stop") {
                    console.log("Condition met to stop further AJAX calls.");
                    ajaxCallEnabled = false; // Disable further AJAX calls
                    return; // Exit the function early
                }

                // Otherwise, handle the response normally
                $('#searchresult').html(response);
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", error);
                console.log("Status:", status, "Response:", xhr.responseText);
            }
        });
    }

    $('#live_search').on('input', function() {
        search();
    });
});




</script>










</main>

</section>
<!-- CONTENT -->
