<style>
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

    #content main .homepagebackgroundPic {
    background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.5)), url('<?php echo URLROOT; ?>/images/blackwomenreceptionistone.jpg');
    background-repeat: no-repeat;
    /*background-size: cover;*/
    background-size: 100% 100%;
    /* background-size: 60% 60%; */
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


<!-- <div class = "homepagebackgroundPic"> -->
<!-- <div style = "background:url('blackwomenreceptionistone.jpg')"> -->









<div class = "homepagebackgroundPic">
        <div class="head-title">
                <div class="left">
                    <h1>Rate My Receptionist</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Enter your school or business to get started</a>
                        </li>
                    </ul>
                    <!-- action="<?php echo URLROOT; ?>/Institution/show" -->
                            <!-- add id = button to both form element and button element-->
                            <!-- id = "button" -->
                            <!-- action = "<?php echo URLROOT;?>/Institutions/show" -->
                        <form class = "picForm" style = "display: block" action = "<?php echo URLROOT;?>/Institutions/show" method = "POST">

                            <div class="form-input">

                                <input type="text" id = "live_search" placeholder="Search..." name = "input_institution_name" onkeyup="checkInput()">

                                <!-- value = "live_search" -->
                                <!-- <button type="submit" id = "button" class="search-btn"> <i class="bx bx-search"> </i> </button> -->
                                <button type="submit" id="submit-btn" class="search-btn" disabled> <i class="bx bx-search"></i> </button>

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
// $(document).ready(function() {
//     var ajaxCallEnabled = true;
//
//     function search() {
//         if (!ajaxCallEnabled) return;
//
//         var inputValue = $('#live_search').val();
//         console.log('Search triggered for:', inputValue);
//
//         $.ajax({
//             type: 'POST',
//             url: 'search',
//             data: { input: inputValue },
//             success: function(response) {
//                 console.log('AJAX call successful, response:', response);
//
//                 // Check if the response indicates to stop further calls
//                 if (response.trim() === "stop") {
//                     console.log("Condition met to stop further AJAX calls.");
//                     ajaxCallEnabled = false; // Disable further AJAX calls
//                     return; // Exit the function early
//                 }
//
//                 // Otherwise, handle the response normally
//                 $('#searchresult').html(response);
//             },
//             error: function(xhr, status, error) {
//                 console.error("AJAX error:", error);
//                 console.log("Status:", status, "Response:", xhr.responseText);
//             }
//         });
//     }
//
//     $('#live_search').on('input', function() {
//         search();
//     });
// });

</script>


        <!-- <script>
            $(document).ready(function() {
                var ajaxCallEnabled = true;

                function search() {
                    var inputValue = $('#live_search').val();

                    if (!ajaxCallEnabled || !inputValue) {
                        $('#searchresult').hide(); // Hide the dropdown if input is empty
                        return;
                    }

                    console.log('Search triggered for:', inputValue);

                    $.ajax({
                        type: 'POST',
                        url: 'search',
                        data: { input: inputValue },
                        success: function(response) {
                            console.log('AJAX call successful, response:', response);

                            if (response.trim()) {
                                $('#searchresult').html(response).show();
                            } else {
                                $('#searchresult').hide(); // Hide the dropdown if response is empty
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX error:", error);
                            console.log("Status:", status, "Response:", xhr.responseText);
                            $('#searchresult').hide();
                        }
                    });
                }

                $('#live_search').on('input', search);

                // Optional: Hide the dropdown when clicking outside of it
                $(document).on('click', function (e) {
                    if (!$(e.target).closest('#live_search, #searchresult').length) {
                        $('#searchresult').hide();
                    }
                });
            });
        </script> -->



        <!-- <script>
            $(document).ready(function() {


                    // Handle form submission
    $('.picForm').on('submit', function(e) {
        // e.preventDefault(); // Prevent default form submission
        var inputValue = $('#live_search').val();

        $.ajax({
            type: 'POST',
            url: '<?php echo URLROOT; ?>/Institutions/show',
            data: { input_institution_name: inputValue }, // Use the name of your input field as the key
            success: function(response) {
                // Handle success. For example, you might want to display something in the searchresult div
                // $('#searchresult').html(response).show();
                //want to navigate to a new page
                var inputValue = $('#live_search').val(); // Get the input value
                window.location.href = redirectUrl + '?input_institution_name=' + encodeURIComponent(inputValue);
                window.location.href = redirectUrl + '?input_institution_name=' + encodeURIComponent(inputValue);

            },
            error: function(xhr, status, error) {
                // Handle error
                console.error("Error occurred:", error);
            }
        });
    });

    // Your existing AJAX code for the live search...




                var ajaxCallEnabled = true;

                function search() {
                    var inputValue = $('#live_search').val();

                    if (!ajaxCallEnabled || !inputValue) {
                        $('#searchresult').hide(); // Hide the dropdown if input is empty
                        return;
                    }

                    console.log('Search triggered for:', inputValue);

                    $.ajax({
                        type: 'POST',
                        url: 'search',
                        data: { input: inputValue },
                        success: function(response) {
                            console.log('AJAX call successful, response:', response);

                            if (response.trim()) {
                                $('#searchresult').html(response).show();
                            } else {
                                $('#searchresult').hide(); // Hide the dropdown if response is empty
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX error:", error);
                            console.log("Status:", status, "Response:", xhr.responseText);
                            $('#searchresult').hide();
                        }
                    });
                }

                $('#live_search').on('input', search);

                // Optional: Hide the dropdown when clicking outside of it
                $(document).on('click', function (e) {
                    if (!$(e.target).closest('#live_search, #searchresult').length) {
                        $('#searchresult').hide();
                    }
                });
            });
        </script> -->




    
        <script>
// Define checkInput globally to ensure it's accessible
function checkInput() {
    var inputValue = $('#live_search').val().trim(); // Use trim to ignore white spaces
    // Enable or disable the submit button based on input value
    $('#submit-btn').prop('disabled', !inputValue);
}

$(document).ready(function() {
    // Attach the input event listener for live search and to call checkInput
    $('#live_search').on('input', function() {
        checkInput(); // Call to enable/disable submit button

        var inputValue = $(this).val().trim();

        if (!inputValue) {
            $('#searchresult').hide(); // Hide search results if input is empty
            return; // Exit the function if no input value
        }

        // Proceed with AJAX call for live search if there's input
        console.log('Search triggered for:', inputValue);
        $.ajax({
            type: 'POST',
            url: 'search', // Adjust URL as necessary
            data: { input: inputValue },
            success: function(response) {
                if (response.trim()) {
                    $('#searchresult').html(response).show();
                } else {
                    $('#searchresult').hide();
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", error);
                $('#searchresult').hide();
            }
        });
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



<!-- $(document).ready(function() {
    // Your existing code...

    // Handle form submission
    $('.picForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        var inputValue = $('#live_search').val();

        $.ajax({
            type: 'POST',
            url: '<?php echo URLROOT; ?>/Institutions/show', // -->
