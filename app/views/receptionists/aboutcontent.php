<?php

function generateStarRating($rating) {
    $starOutput = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            // Filled star for part of the rating
            $starOutput .= "<span class='bx bxs-star' style='color: gold;'></span>";
        } else {
            // Empty star for the remainder
            $starOutput .= "<span class='bx bx-star' style='color: grey;'></span>";
        }
    }
    return $starOutput;
}


// function calculateAverageStars($comments) {
//     $totalStars = 0;
//     $totalReviews = count($comments);

//     if ($totalReviews == 0) {
//         // No reviews to calculate average from
//         return 0;
//     }

//     foreach ($comments as $comment) {
//         // Ensure $comment['stars'] is a number and accumulate
//         $totalStars += isset($comment['stars']) ? (int)$comment['stars'] : 0;
//     }

//     // Calculate and return the average rounded to 2 decimal places
//     return round($totalStars / $totalReviews, 2);
// }


function calculateAverageStars($comments) {
    // Check if the input is actually an array
    if (!is_array($comments) || empty($comments)) {
        // Handle the error or return 0
        return 0;
    }

    $totalStars = 0;
    $validRatingsCount = 0;

    foreach ($comments as $comment) {
        if (isset($comment['stars']) && is_numeric($comment['stars'])) {
            $totalStars += (int)$comment['stars'];
            $validRatingsCount++;
        }
    }

    if ($validRatingsCount == 0) {
        // Avoid division by zero if there are no valid ratings
        return 0;
    }

    // Calculate the average rating and return it
    return round($totalStars / $validRatingsCount, 2);
}


// Usage:
$averageRating = calculateAverageStars($data[1]);


//PUT
// $stars = 3; // for example, this value would come from user input

// if ($stars > 0 && $stars <= 5) {
//     // Insert into the database
// } else {
//     // Handle the error, such as by showing a message to the user
// }


?>
<style>
    * {
        box-sizing: border-box;
    }
    #content main .table-data {
        display: flex;
        flex-wrap: wrap;
        grid-gap: 24px;
        margin-top: 24px;
        width: 100%;
        color: var(--dark);
    }
    #content main .table-data > div {
        border-radius: 20px;
        background: var(--light);
        padding: 24px;
        overflow-x: auto;
    }
    #content main .table-data .head {
        display: flex;
        align-items: center;
        grid-gap: 16px;
        margin-bottom: 24px;
    }
    #content main .table-data .head h3 {
        margin-right: auto;
        font-size: 24px;
        font-weight: 600;
    }
    #content main .table-data .head .bx {
        cursor: pointer;
    }

    #content main .table-data .order {
        flex-grow: 1;
        flex-basis: 500px;
    }
    #content main .table-data .order table {
        width: 100%;
        border-collapse: collapse;
    }
    #content main .table-data .order table th {
        padding-bottom: 12px;
        font-size: 13px;
        text-align: left;
        border-bottom: 1px solid var(--grey);
    }
    #content main .table-data .order table td {
        padding: 16px 0;
    }
    #content main .table-data .order table tr td:first-child {
        display: flex;
        align-items: center;
        grid-gap: 12px;
        padding-left: 6px;
    }
    #content main .table-data .order table td img {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        object-fit: cover;
    }
    #content main .table-data .order table tbody tr:hover {
        background: var(--grey);
    }
    #content main .table-data .order table tr td .status {
        font-size: 10px;
        padding: 6px 16px;
        color: var(--light);
        border-radius: 20px;
        font-weight: 700;
    }
    #content main .table-data .order table tr td .status.completed {
        background: var(--blue);
    }
    #content main .table-data .order table tr td .status.process {
        background: var(--yellow);
    }
    #content main .table-data .order table tr td .status.pending {
        background: var(--orange);
    }


    #content main .table-data .todo {
        flex-grow: 1;
        flex-basis: 300px;
    }
    #content main .table-data .todo .todo-list {
        width: 100%;
    }
    #content main .table-data .todo .todo-list li {
        width: 100%;
        margin-bottom: 16px;
        background: var(--grey);
        border-radius: 10px;
        padding: 14px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    #content main .table-data .todo .todo-list li .bx {
        cursor: pointer;
    }
    #content main .table-data .todo .todo-list li.completed {
        border-left: 10px solid var(--blue);
    }
    #content main .table-data .todo .todo-list li.not-completed {
        border-left: 10px solid var(--orange);
    }
    #content main .table-data .todo .todo-list li:last-child {
        margin-bottom: 0;
    }
    /* MAIN */
    /* CONTENT */
    #content main .quality-container {
        display: flex;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    #content main .overall-quality-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0;
        padding: 0;
        /*align-items: center;*/
        /*justify-content: center;*/
    }
    #content main .overall-quality {
        margin: 0;
        padding: 0;
        font-size: 4rem;
        align-items: center;
        justify-content: center;
    }
    #content main .overall-quality-container h6 {
        /*margin-top: 0.1rem; !* Reduced margin-top to bring h6 closer to h1 *!*/
        padding: 0;
        /*font-size: 1rem; !* Adjust font-size as needed *!*/
    }






    /* Existing styles */
/* ...your existing CSS... */

/* Enhancements for review presentation */
/* Existing styles */
/* ...your existing CSS... */

/* Enhancements for review presentation */
/* ... other styles ... */

/* Existing styles */
/* ...your existing CSS... */

/* Enhancements for review presentation */
/* Existing styles */
/* ...your existing CSS... */

/* Reviews List Enhancements */
/* ...existing styles... */

.todo-list li.completed {
    /* ...existing styles... */
    display: flex;
    flex-direction: column; /* Stack children vertically */
    justify-content: flex-start; /* Align children to the start of the flex container */
    align-items: flex-start; /* Align children to the start of the cross axis */
}

.review-rating {
    display: flex;
    align-items: center;
    /* Set a margin or padding if you want to control the spacing around the stars */
    margin-right: 8px; /* Example space between stars and review text */
}

.review-header {
    width: 100%;
    display: flex;
    justify-content: space-between; /* Separates the star rating and date */
    align-items: center;
}

.review-date {
    /* No need to position absolutely, let flexbox handle the positioning */
    margin-left: auto; /* Pushes the date to the right */
    color: #757575;
    font-size: 14px;
}

.review-body {
    width: 100%; /* Take full width to control the text alignment */
    margin-top: 8px; /* Space between header and body */
    color: #333; /* Readable text color */
    font-size: 16px; /* Readable font size */
    line-height: 1.5; /* For better readability */
    text-align: left; /* Ensures text aligns to the left */
}

/* Add your star rating styles here */



</style>









<main>

    <div class = "name">
        <h1>
            <?php print_r($data[0]["receptionist_name"]); ?>
        </h1>

    </div>

    <!-- <div class = "quality-container">
        <div class = "overall-quality-container">
            <h1 class = "overall-quality"> <?php echo '<div class="average-rating">Average Rating: ' . $averageRating . '</div>'; ?></h1>
            <h6>Overall Quality</h6>
        </div>
    </div> -->
    <div class="quality-container">
    <div class="overall-quality-container">
        <h1 class="overall-quality">
            <?php echo $averageRating; ?>
        </h1>
        <h6>Overall Quality</h6>
    </div>
</div>
<!-- <div class="quality-container">
    <div class="overall-quality-container">
        <div class="fraction" style="display: inline-block; text-align: center;">
            <span style="display: block;"><?php echo $averageRating; ?></span>
            <hr style="margin: 0;">
            <span style="display: block;">5</span>
        </div>
        <h6>Overall Quality</h6>
    </div>
</div> -->


    <!-- <?php  
    // foreach($data[1] as $comment) {
    //     echo '<div>';
    //     echo $comment['institution_comment'];
    //     echo '</div>';
    // }
?> -->


    <div class="table-data">
        <!-- <div class="order">
            <div class="head">
                <h3>Receptionists</h3>
                <i class='bx bx-search' ></i>
                <i class='bx bx-filter' ></i>
            </div>
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Date Work</th>
                    <th>Reviews</th>
                </tr>
                </thead>
                <tbody>


                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status completed">Completed</span></td>
                </tr>


                <!-- <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status process">Process</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status completed">Completed</span></td>
                </tr> -->


                <!-- </tbody>
            </table>
        </div> -->


        <!-- <div class="order">
            <div class="head">
                <h3>Receptionists</h3>
                <i class='bx bx-search' ></i>
                <i class='bx bx-filter' ></i>
            </div>
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Date Work</th>
                    <th>Reviews</th>
                </tr>
                </thead>
                <tbody>


                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status completed">Completed</span></td>
                </tr>


                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status process">Process</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status completed">Completed</span></td>
                </tr>


                </tbody>
            </table>
        </div> -->




        <div class="todo">
            <div class="head">
                <h3>Reviews</h3>
                <i class='bx bx-plus' ></i>
                <i class='bx bx-filter' ></i>
            </div>
            <ul class="todo-list">



            <!-- <div class = "cont" style = "display: flex">
                <div class = "overall-single-review">
                    <div class = "overall-single-review-container">
                        <h6>Overall</h6>
                        <h3 class = "overall-quality">3.5</h3>
                    </div>
                </div>
                
                <li class="completed">
                    <p>$comment['institution_comment']</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li>

            </div> -->
            

            <!-- <?php  
    // foreach($data[1] as $comment) {



    //     echo '<li class="completed">';
    //     echo $comment['institution_comment'];
    //     echo "<i class='bx bx-dots-vertical-rounded'></i>";
    //     echo '</li>';

    // }
?> -->
            

                <!-- // foreach($data[1] as $comment) {
                //     echo '<li class="completed">';
                //         echo '<div class = "overall">';
                //             echo '<div class = "two-nested-elements">';
                                
                //             echo $comment['stars'];

                //             echo $comment['review_date'];

                //             echo $comment['receptionist_anonymous'];

                //                 echo $comment['receptionist_comment'];

                //                 // echo $comment['stars'];

                //             echo '</div>';
                //         echo '</div>';
                //     echo '</li>';
                // } -->



<!-- foreach($data[1] as $comment) {
    $anonymousText = $comment['receptionist_anonymous'] == 1 ? "Anonymous" : "User ID: ".$comment['user_id'];
    $starRating = generateStarRating($comment['stars']);

    echo '<div class="review-container" style="margin-bottom: 20px; padding: 15px; background-color: #f9f9f9; border-radius: 5px;">';
        echo '<div class="review-header" style="display: flex; justify-content: space-between; align-items: center;">';
            echo '<div class="review-rating">'.$starRating.'</div>';
            echo '<div class="review-date" style="color: #777;">'.$comment['review_date'].'</div>';
        echo '</div>'; // Close review-header
        echo '<div class="review-body" style="margin-top: 10px;">';
            echo '<p>'.$comment['receptionist_comment'].'</p>';
        echo '</div>'; // Close review-body
        echo '<div class="review-footer" style="margin-top: 10px; text-align: right;">';
            echo '<span style="font-style: italic; color: #aaa;">Posted by: '.$anonymousText.'</span>';
        echo '</div>'; // Close review-footer
    echo '</div>'; // Close review-container
} -->

<!-- <ul class="todo-list">
    
    foreach($data[1] as $comment) {
        $starRating = generateStarRating($comment['stars']);
        $isAnonymous = $comment['receptionist_anonymous'] == 1 ? "Anonymous" : "";

        echo '<li class="completed">';
            echo '<div class="review-header" style="display: flex; justify-content: space-between; align-items: center;">';
                echo '<div class="review-rating" style="font-size: 0;">' . $starRating . '</div>';
                echo '<div class="review-date" style="color: #777;">' . $comment['review_date'] . '</div>';
            echo '</div>'; // Close review-header
            echo '<div class="review-body" style="margin-top: 10px;">';
                if ($isAnonymous) {
                    echo '<p style="font-style: italic; color: #aaa;">' . $isAnonymous . '</p>';
                }
                echo '<p>' . $comment['receptionist_comment'] . '</p>';
            echo '</div>'; // Close review-body
        echo '</li>';
    }
    
</ul> -->

    <!-- ... other content ... -->

<!-- ... -->
<ul class="todo-list">
    <?php foreach ($data[1] as $comment): ?>
        <li class="completed">
            <div class="review-header">
                <div class="review-rating">
                    <?php echo generateStarRating($comment['stars']); ?>
                </div>
                <div class="review-date">
                    <?php echo htmlspecialchars($comment['review_date']); ?>
                </div>
            </div>
            <div class="review-body">
                <?php if ($comment['receptionist_anonymous'] == 1): ?>
                    <p class="anonymous-tag">Anonymous</p>
                <?php endif; ?>
                <p><?php echo htmlspecialchars($comment['receptionist_comment']); ?></p>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
<!-- ... -->



    <!-- ... other content ... -->



                

<!-- //                 foreach($data[1] as $comment) {
//                     echo '<li class="completed">';
//                         echo '<div class = "overall">';
//                             echo '<div class = "two-nested-elements">';
//                                 echo '<h6>Overall</h6>';
//                                 echo '<h3 class = "overall-rating"></h3>';
//                                 $start = 1;
//                                 while($start <= 5) {
//                                     if($comment['rating'] < $start) {

//                                     } else {

//                                     }

//                                     $start++;
//                                 }

//                                 // echo $comment['rating'];
//                                 // echo $comment['institution_comment'];
//                             echo '</div>';
//                         echo '</div>';
//                     echo '</li>';
//                 }
//  -->


                <!-- <li class="completed">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, voluptas adipisci aperiam 
                        provident amet ab, dolore sapiente veniam hic consequuntur,
                         officiis deserunt perferendis quae nulla est ipsum et tempore!</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li>

                <li class="completed">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li>
                <li class="not-completed">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li>
                <li class="completed">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li>
                <li class="not-completed">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li> -->
            </ul>
        </div>



    </div>








</main>
</section>