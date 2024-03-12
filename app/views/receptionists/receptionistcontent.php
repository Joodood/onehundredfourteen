<style>
#content main .homepagebackgroundPic {

    background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.5)), url('<?php echo URLROOT; ?>/images/blackwomenreceptionistone.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-size: 100% 100%;
    min-height: 60vh;
}
#content main #searchresult {
    background: var(--light);
    position: absolute;
    /*width: 100%;*/
    /*width: 60%;*/
        width: 34%;
    /*max-width: 400px;*/
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    z-index: 1;
    display: none; /* Initially hide the dropdown */
}

/*#searchresult a {*/
/*    color: black;*/
/*    padding: 12px 16px;*/
/*    text-decoration: none;*/
/*    display: block;*/
/*    width: 100%;*/
/*}*/

/*#searchresult a:hover {*/
/*    background-color: #ddd;*/
/*}*/

    #content main #searchresult a {
        /*color: black;*/
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        width: 100%;
    }

    #content main #searchresult a:hover {
        color: white;
        background-color: var(--blue);
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
                
                    <form class = "picForm" style = "display: block" action = "<?php echo URLROOT;?>/Receptionists/show" method = "POST">

                            <div class="form-input">

                                <input type="text" id = "live_search" placeholder="Search..." name = "input_receptionist_name" onkeyup="checkInput()">
                                
                                <button type="submit" id="submit-btn" class="search-btn" disabled> <i class="bx bx-search"></i> </button>

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




<script>
// Define checkInput globally to ensure it's accessible
function checkInput() {
    var inputValue = $('#live_search').val().trim(); // Use trim to ignore white spaces
    // Enable or disable the submit button based on input value
    $('#submit-btn').prop('disabled', !inputValue);
}

$(document).ready(function() {
    var ajaxCallEnabled = true;

    // Function 'searchrec' for handling live search with condition to stop further AJAX calls if necessary
    function searchrec() {
        if (!ajaxCallEnabled) return;

        var inputValue = $('#live_search').val().trim(); // Ensure trim is used here as well
        console.log('Search triggered for:', inputValue);

        if (!inputValue) {
            $('#searchresult').hide(); // Hide search results if input is empty
            return; // Exit the function early if no input value
        }

        $.ajax({
            type: 'POST',
            url: 'searchrec', // URL adjusted to 'searchrec'
            data: { input: inputValue },
            success: function(response) {
                console.log('AJAX call successful, response:', response);

                // Check if the response contains a specific marker to stop further calls
                if (response.trim() === "stop") {
                    console.log("Condition met to stop further AJAX calls.");
                    ajaxCallEnabled = false;
                    return;
                }

                $('#searchresult').html(response).show();
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", error);
                $('#searchresult').hide();
            }
        });
    }

    // Attach the input event listener for both live search and to call checkInput
    $('#live_search').on('input', function() {
        checkInput(); // Call to enable/disable submit button based on current input
        searchrec(); // Perform the search/AJAX call
    });

    // Optional: Hide the search results when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#live_search, #searchresult').length) {
            $('#searchresult').hide();
        }
    });
});
</script>




</main>

</section>
<!-- CONTENT -->
