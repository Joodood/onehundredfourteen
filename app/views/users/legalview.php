
<?php require_once APPROOT . '/views/inc/sidebar.php';?>


<?php require_once APPROOT . '/views/inc/searchbarheader.php';?>


<?php require_once APPROOT . '/views/users/legalviewcontent.php'; ?>


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





<?php require_once APPROOT . '/views/inc/footer.php'; ?>
