
<?php require_once APPROOT . '/views/inc/sidebar.php';
 ?>
<?php require_once APPROOT . '/views/inc/sidebarheader.php'; ?>




<?php require_once APPROOT . '/views/institutions/institutioncontent.php'; ?>



<!-- <script>
    window.addEventListener('load', (event) => {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('hide');
    console.log('The page has fully loaded');
});
</script>

<script>
    var menuBar = document.querySelector('#content nav .bx.bx-menu');
    var sidebar = document.getElementById('sidebar');

    menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
})

</script> -->


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type = "text/javascript">
    $(document).ready(function() {

        $("#live_search").keyup(function() {
    //when a user types any value or releases any key than that value will be stored in a variable called input
            var input = $(this).val();
            // alert(input);

//if input is not empty, then using ajax method, page redirect to livesearch.php with the data input 
            if(input != "") {
                $.ajax({
                    // url:"<?php echo URLROOT; ?>/institutions";
                    url: "livesearchthree.php",
                    method: "POST",
                    data: {input:input},

//after success function, data will be shown in the div section with an id searchresult
                    success:function(data) {
                        $("#searchresult").html(data);
                    }
                });
                //if search reslt is empty, than the div will be hidden
            } else {
                $("#searchresult").css("display", "none");
            }
        });
    });
</script>

 -->




<?php require_once APPROOT . '/views/inc/footer.php'; ?>
