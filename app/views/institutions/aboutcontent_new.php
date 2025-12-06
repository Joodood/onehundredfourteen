<?php
// Helper function to generate star ratings
function generateStarRating($stars) {
    $output = '';
    for($i = 1; $i <= 5; $i++) {
        if($i <= $stars) {
            $output .= "<i class='bx bxs-star' style='color: gold;'></i>";
        } else {
            $output .= "<i class='bx bx-star' style='color: #ccc;'></i>";
        }
    }
    return $output;
}
?>

<style>
    * {
        box-sizing: border-box;
    }
    
    .review-form-container {
        background: var(--light);
        padding: 24px;
        border-radius: 20px;
        margin-bottom: 24px;
    }
    
    .review-form-container h3 {
        margin-bottom: 16px;
    }
    
    .star-rating {
        display: flex;
        gap: 5px;
        font-size: 30px;
        margin: 16px 0;
    }
    
    .star-rating i {
        cursor: pointer;
        color: #ccc;
        transition: color 0.2s;
    }
    
    .star-rating i:hover,
    .star-rating i.active {
        color: gold;
    }
    
    .review-form textarea {
        width: 100%;
        min-height: 120px;
        padding: 12px;
        border: 1px solid var(--grey);
        border-radius: 8px;
        font-family: inherit;
        font-size: 14px;
        resize: vertical;
    }
    
    .btn-submit {
        background: var(--blue);
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        margin-top: 12px;
    }
    
    .btn-submit:hover {
        opacity: 0.9;
    }
    
    .alert {
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 16px;
    }
    
    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
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
    }
    
    #content main .overall-quality {
        margin: 0;
        padding: 0;
        font-size: 4rem;
        align-items: center;
        justify-content: center;
    }
    
    #content main .overall-quality-container h6 {
        padding: 0;
    }
    
    .todo-list li.completed {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }
    
    .review-rating {
        display: flex;
        align-items: center;
        margin-right: 8px;
    }
    
    .review-header {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .review-date {
        margin-left: auto;
        color: #757575;
        font-size: 14px;
    }
    
    .review-body {
        width: 100%;
        margin-top: 8px;
        color: #333;
        font-size: 16px;
        line-height: 1.5;
        text-align: left;
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
    
    #content main .table-data .todo .todo-list li.completed {
        border-left: 10px solid var(--blue);
    }
    
    #content main .table-data .todo .todo-list li:last-child {
        margin-bottom: 0;
    }
</style>

<main>
    <?php flash('review_message'); ?>

    <div class="name">
        <h1>
            <?php
            $institution = is_array($data['institution']) ? $data['institution'] : (array)$data['institution'];
            echo htmlspecialchars($institution['institution_name'] ?? '');
            ?>
        </h1>
        <p>
            <?php
            echo htmlspecialchars(($institution['institution_city'] ?? '') . ', ' . ($institution['institution_state'] ?? ''));
            ?>
        </p>
    </div>

    <div class="quality-container">
        <div class="overall-quality-container">
            <h1 class="overall-quality"><?php echo number_format($data['avg_rating'] ?? 0, 1); ?></h1>
            <h6>Overall Quality</h6>
            <p><?php echo $data['review_count'] ?? 0; ?> Reviews</p>
        </div>
    </div>




    </div>

    <!-- Receptionists at this Institution -->
    <?php
    $receptionists = $data['receptionists'] ?? [];
    if($receptionists && count($receptionists) > 0):
        ?>
        <div class="receptionists-section">
            <h3><i class='bx bx-group'></i> Receptionists at this Institution</h3>
            <div class="receptionists-grid">
                <?php foreach($receptionists as $rec): ?>
                    <?php
                    $receptionist = is_array($rec) ? $rec : (array)$rec;
                    ?>
                    <a href="<?php echo URLROOT; ?>/receptionists/about/<?php echo $receptionist['receptionist_id']; ?>" class="receptionist-card">
                        <div class="receptionist-icon">
                            <i class='bx bx-user'></i>
                        </div>
                        <h4><?php echo htmlspecialchars($receptionist['receptionist_name']); ?></h4>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>





    <?php if(isLoggedIn()): ?>
        <!-- Review Form -->
        <div class="review-form-container" id="review-form">
            <?php flash('review_prompt'); ?>
            <h3><?php echo $data['user_review'] ? 'Edit Your Review' : 'Write Your Review'; ?></h3>

            <form action="<?php echo URLROOT; ?>/institutions/submitReview/<?php echo $institution['institution_id']; ?>" method="post" id="reviewForm">
                <div class="star-rating" id="starRating">
                    <?php
                    $currentRating = 0;
                    if($data['user_review']) {
                        $review = is_array($data['user_review']) ? $data['user_review'] : (array)$data['user_review'];
                        $currentRating = $review['stars'] ?? 0;
                    }

                    for($i = 1; $i <= 5; $i++):
                        $starClass = ($i <= $currentRating) ? 'bxs-star active' : 'bx-star';
                        ?>
                        <i class='bx <?php echo $starClass; ?>' data-value="<?php echo $i; ?>"></i>
                    <?php endfor; ?>
                </div>
                <input type="hidden" name="stars" id="starsInput" value="<?php echo $currentRating; ?>" required>

                <textarea name="comment" placeholder="Share your experience..." required><?php
                    if($data['user_review']) {
                        $review = is_array($data['user_review']) ? $data['user_review'] : (array)$data['user_review'];
                        echo htmlspecialchars($review['institution_comment'] ?? '');
                    }
                    ?></textarea>

                <button type="submit" class="btn-submit">
                    <?php echo $data['user_review'] ? 'Update Review' : 'Submit Review'; ?>
                </button>
            </form>
        </div>
    <?php else: ?>
        <div class="review-form-container">
            <p>Please <a href="<?php echo URLROOT; ?>/users/login">login</a> to write a review.</p>
        </div>
    <?php endif; ?>

    <div class="table-data">
        <div class="todo">
            <div class="head">
                <h3>Reviews</h3>
                <i class='bx bx-comment-dots'></i>
            </div>
            
            <?php if(empty($data['reviews'])): ?>
                <p>No reviews yet. Be the first to review!</p>
            <?php else: ?>
                <ul class="todo-list">
                    <?php foreach ($data['reviews'] as $comment): ?>
                        <li class="completed">
                            <div class="review-header">
                                <div class="review-rating">
                                    <?php echo generateStarRating($comment['stars']); ?>
                                </div>
                                <div class="review-date">
                                    <?php echo htmlspecialchars($comment['created_at']); ?>
                                </div>
                            </div>
                            <div class="review-body">
                                <p><?php echo htmlspecialchars($comment['institution_comment']); ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</main>

<script>
    // Star rating functionality
    const starRating = document.getElementById('starRating');
    const starsInput = document.getElementById('starsInput');

    if(starRating && starsInput) {
        const stars = starRating.querySelectorAll('i');

        // Set initial state based on hidden input value
        const initialRating = parseInt(starsInput.value) || 0;
        updateStars(initialRating);

        stars.forEach(star => {
            // Click event
            star.addEventListener('click', function() {
                const value = parseInt(this.getAttribute('data-value'));
                starsInput.value = value;
                updateStars(value);
            });

            // Hover event
            star.addEventListener('mouseenter', function() {
                const value = parseInt(this.getAttribute('data-value'));
                updateStars(value);
            });
        });

        // Reset on mouse leave
        starRating.addEventListener('mouseleave', function() {
            const currentValue = parseInt(starsInput.value) || 0;
            updateStars(currentValue);
        });

        function updateStars(rating) {
            stars.forEach((star, index) => {
                if(index < rating) {
                    star.classList.remove('bx-star');
                    star.classList.add('bxs-star', 'active');
                } else {
                    star.classList.remove('bxs-star', 'active');
                    star.classList.add('bx-star');
                }
            });
        }
    }

    // Auto-scroll to review form if coming from add page
    window.addEventListener('load', function() {
        if(window.location.hash === '#review-form') {
            setTimeout(() => {
                const reviewForm = document.getElementById('review-form');
                if(reviewForm) {
                    reviewForm.scrollIntoView({ behavior: 'smooth', block: 'center' });

                    // Highlight effect
                    reviewForm.style.transition = 'background 2s ease';
                    reviewForm.style.background = '#e3f2fd';
                    setTimeout(() => {
                        reviewForm.style.background = 'var(--light)';
                    }, 2000);

                    // Focus textarea
                    const textarea = reviewForm.querySelector('textarea');
                    if(textarea) {
                        setTimeout(() => textarea.focus(), 600);
                    }
                }
            }, 100);
        }
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('#starRating i');
    const starsInput = document.getElementById('starsInput');
    
    // Set initial rating if editing
    const initialRating = starsInput.value;
    if(initialRating) {
        updateStars(parseInt(initialRating));
    }
    
    stars.forEach(star => {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            starsInput.value = value;
            updateStars(parseInt(value));
        });
        
        star.addEventListener('mouseover', function() {
            const value = this.getAttribute('data-value');
            updateStars(parseInt(value));
        });
    });
    
    document.getElementById('starRating').addEventListener('mouseleave', function() {
        const currentValue = starsInput.value;
        if(currentValue) {
            updateStars(parseInt(currentValue));
        } else {
            resetStars();
        }
    });
    
    function updateStars(rating) {
        stars.forEach(star => {
            const value = parseInt(star.getAttribute('data-value'));
            if(value <= rating) {
                star.classList.remove('bx-star');
                star.classList.add('bxs-star', 'active');
            } else {
                star.classList.remove('bxs-star', 'active');
                star.classList.add('bx-star');
            }
        });
    }
    
    function resetStars() {
        stars.forEach(star => {
            star.classList.remove('bxs-star', 'active');
            star.classList.add('bx-star');
        });
    }
});
</script>

</section>
