<?php
//var_dump("Session data:", $_SESSION);
//var_dump("isLoggedIn:", isLoggedIn());
//die("STOPPING HERE TO DEBUG");
//?>
<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<?php require_once APPROOT . '/views/inc/searchbarheader.php'; ?>

<!-- MAIN CONTENT -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>My Dashboard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo URLROOT; ?>">Home</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>

    <?php flash('review_message'); ?>

    <div class="table-data">
        <!-- Institution Reviews -->
        <div class="order">
            <div class="head">
                <h3>My Institution Reviews</h3>
                <i class='bx bx-school'></i>
            </div>
            
            <?php if(empty($data['institution_reviews'])): ?>
                <p style="padding: 20px;">You haven't reviewed any institutions yet.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Institution</th>
                            <th>Location</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['institution_reviews'] as $review): ?>
                        <tr>
                            <td>
                                <a href="<?php echo URLROOT; ?>/institutions/about/<?php echo $review['institution_id']; ?>">
                                    <?php echo htmlspecialchars($review['institution_name']); ?>
                                </a>
                            </td>
                            <td><?php echo htmlspecialchars($review['institution_city'] . ', ' . $review['institution_state']); ?></td>
                            <td>
                                <div class="stars">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php if($i <= $review['stars']): ?>
                                            <i class='bx bxs-star' style="color: gold;"></i>
                                        <?php else: ?>
                                            <i class='bx bx-star' style="color: #ccc;"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                            </td>
                            <td><?php echo htmlspecialchars(substr($review['institution_comment'], 0, 50)) . '...'; ?></td>
                            <td><?php echo $review['created_at']; ?></td>
                            <td>
                                <a href="<?php echo URLROOT; ?>/institutions/about/<?php echo $review['institution_id']; ?>" class="btn-sm">Edit</a>
                                <form action="<?php echo URLROOT; ?>/dashboard/deleteInstitutionReview/<?php echo $review['review_id']; ?>" method="post" style="display: inline;">
                                    <button type="submit" class="btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

        <!-- Receptionist Reviews -->
        <div class="order">
            <div class="head">
                <h3>My Receptionist Reviews</h3>
                <i class='bx bx-phone-call'></i>
            </div>
            
            <?php if(empty($data['receptionist_reviews'])): ?>
                <p style="padding: 20px;">You haven't reviewed any receptionists yet.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Receptionist</th>
                            <th>Institution</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['receptionist_reviews'] as $review): ?>
                        <tr>
                            <td>
                                <a href="<?php echo URLROOT; ?>/receptionists/about/<?php echo $review['receptionist_id']; ?>">
                                    <?php echo htmlspecialchars($review['receptionist_name']); ?>
                                </a>
                            </td>
                            <td><?php echo htmlspecialchars($review['institution_name'] ?? 'N/A'); ?></td>
                            <td>
                                <div class="stars">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php if($i <= $review['stars']): ?>
                                            <i class='bx bxs-star' style="color: gold;"></i>
                                        <?php else: ?>
                                            <i class='bx bx-star' style="color: #ccc;"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                            </td>
                            <td><?php echo htmlspecialchars(substr($review['receptionist_comment'], 0, 50)) . '...'; ?></td>
                            <td><?php echo $review['created_at']; ?></td>
                            <td>
                                <a href="<?php echo URLROOT; ?>/receptionists/about/<?php echo $review['receptionist_id']; ?>" class="btn-sm">Edit</a>
                                <form action="<?php echo URLROOT; ?>/dashboard/deleteReceptionistReview/<?php echo $review['review_id']; ?>" method="post" style="display: inline;">
                                    <button type="submit" class="btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>

<style>
.btn-sm {
    padding: 5px 10px;
    font-size: 12px;
    text-decoration: none;
    background: #3C91E6;
    color: white;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    margin-right: 5px;
}

.btn-danger {
    background: #DC3545;
}

.btn-sm:hover {
    opacity: 0.8;
}

.stars {
    display: flex;
    gap: 2px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table thead {
    background: var(--grey);
}

table th {
    padding: 12px 10px;
    font-size: 14px;
    text-align: left;
}

table td {
    padding: 12px 10px;
    font-size: 14px;
}

table tbody tr {
    border-bottom: 1px solid var(--grey);
}

table tbody tr:hover {
    background: var(--grey);
}
</style>

<script>
    window.addEventListener('load', (event) => {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('hide');
        console.log('The page has fully loaded');
    });

    const menuBar = document.querySelector('#content nav .bx.bx-menu');
    const sidebar = document.getElementById('sidebar');

    menuBar.addEventListener('click', function () {
        sidebar.classList.toggle('hide');
    })
</script>
