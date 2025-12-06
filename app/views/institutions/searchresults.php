<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<?php require_once APPROOT . '/views/inc/searchbarheader.php'; ?>

    <style>
        .search-results-container {
            padding: 24px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .search-message {
            background: var(--light);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 24px;
        }

        .search-message.suggestion {
            background: #fff4e6;
            border-left: 4px solid var(--orange);
        }

        .results-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .institution-card {
            background: var(--light);
            padding: 20px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--dark);
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .institution-card:hover {
            border-color: var(--blue);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .institution-card h3 {
            color: var(--blue);
            margin-bottom: 8px;
        }

        .institution-card p {
            color: var(--dark-grey);
            font-size: 14px;
        }

        .no-results {
            text-align: center;
            padding: 60px 20px;
        }

        .no-results i {
            font-size: 72px;
            color: var(--grey);
            margin-bottom: 16px;
        }
    </style>

    <main>
        <div class="search-results-container">
            <div class="search-message <?php echo isset($data['is_suggestion']) && $data['is_suggestion'] ? 'suggestion' : ''; ?>">
                <h2><?php echo $data['message']; ?></h2>
            </div>

            <?php if($data['institutions'] && count($data['institutions']) > 0): ?>
                <div class="results-grid">
                    <?php foreach($data['institutions'] as $institution): ?>
                        <?php
                        $inst = is_array($institution) ? $institution : (array)$institution;
                        ?>
                        <a href="<?php echo URLROOT; ?>/institutions/about/<?php echo $inst['institution_id']; ?>" class="institution-card">
                            <h3><?php echo htmlspecialchars($inst['institution_name']); ?></h3>
                            <p>
                                <i class='bx bx-map'></i>
                                <?php echo htmlspecialchars($inst['institution_city'] . ', ' . $inst['institution_state']); ?>
                            </p>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="no-results">
                    <i class='bx bx-search-alt'></i>
                    <h3>No institutions found</h3>
                    <p>Try searching with a different term or <a href="<?php echo URLROOT; ?>/homepages/index">return to home</a></p>
                </div>
            <?php endif; ?>
        </div>
    </main>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>