
<?php require APPROOT . '/views/inc/sidebar.php';
 ?>


<?php require APPROOT . '/views/inc/sidebarheader.php'; ?>




<?php require APPROOT . '/views/inc/content.php'; ?>

<script>
            
            function get_data() {
                var text = document.querySelector(".js-search").value;
                var form = new FormData();
                form.append('text', text);
                //read data from server side
                var ajax = new XMLHttpRequest();

                //listen before you send the data
                ajax.addEventListener('readystatechange', function(e){
                    //if 4 we know result has come back
                    //200 status means everything is ok, 404 not found, 500 some error
                    if(ajax.readyState == 4 && ajax.status = 200) {
                        
                        //results are back 

                        handle_result(ajax.responseText);
                    }
                });

                //what method ur ganna use to send the data
                ajax.open('post', 'api.php', true);
                ajax.send(form);
            }

            function handle_result(result) {
                console.log(result);
            }

        </script>









<script>
    window.addEventListener('load', (event) => {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('hide');
    console.log('The page has fully loaded');
});
</script>

<script>
    const menuBar = document.querySelector('#content nav .bx.bx-menu');
    const sidebar = document.getElementById('sidebar');

    menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
})

</script>


<?php require APPROOT . '/views/inc/footer.php'; ?>

