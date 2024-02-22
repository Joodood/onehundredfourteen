
    <!-- MAIN -->
<main>

    <h1> <?php echo $data['title']; ?> </h1>

    <div class = "homepagebackgroundPic">
                
            
                <div class="head-title">

                    <div class="left">


                        <h1>Rate My Receptionist</h1>

                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Enter your school or business to get started</a>
                            </li>
                        </ul>
                           
                            <!-- <form class = "homepagesearchSchoolBus" action="#"> -->
                            <form class = "picForm" style = "display: block" action="#">
                                <div class="form-input">
                                    <!-- activate get_data function everytime text changes, !-->
                                    <input type="text" onchange = "get_data()" class = "js-search" autofocus="true" placeholder="Search...">
                                    <!-- <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button> -->
                                    <!-- <div class = "js-results">
                                        <div style = "display: block;">
                                            Ron
                                        </div>
                                    </div> -->
                                </div>

                                <div class = "results js-results" style = "background-color: bisque;">
                                    <div>
                                        Ron
                                    </div>
                                    <div>
                                        kyle
                                    </div>
                                </div>

                            </form> 
                           
                            <!-- <div class = "js-results">
                                <div>
                                    Ron
                                </div>
                            </div> -->

                            <li>
                                <a href="#" class="btn-download" style = "color: white;">
                                    <i class='bx bxs-cloud-download' ></i>
                                    <span class="text">I'd Like to look up a receptionist by name</span>
                                </a>
                            </li>
                
                            <!-- <li><i class='bx bx-chevron-right' ></i></li>
                            <li>
                                <a class="active" href="#">Home</a>
                            </li> -->
                        <!-- </ul> -->
                    </div>



                </div>

                    <!-- <a href="#" class="btn-download">
                        <i class='bx bxs-cloud-download' ></i>
                        <span class="text">Download PDF</span>
                    </a> -->
            
        </div>

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

</main>

</section>
<!-- CONTENT -->


