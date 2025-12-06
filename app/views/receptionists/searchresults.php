<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<?php require_once APPROOT . '/views/inc/searchbarheader.php'; ?>

    <style>
        /* Same CSS as institutions/searchresults.php */
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

        .receptionist-card {
            background: var(--light);
            padding: 20px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--dark);
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .receptionist-card:hover {
            border-color: var(--blue);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .receptionist-card h3 {
            color: var(--blue);
            margin-bottom: 8px;
        }

        .receptionist-card p {
            color: var(--dark-grey);
            font-size: 14px;
            margin: 4px 0;
        }

        .institution-info {
            color: var(--dark-grey);
            font-size: 13px;
            margin-top: 8px;
            padding-top: 8px;
            border-top: 1px solid var(--grey);
        }
    </style>

    <main>
        <div class="search-results-container">
            <div class="search-message <?php echo isset($data['is_suggestion']) && $data['is_suggestion'] ? 'suggestion' : ''; ?>">
                <h2><?php echo $data['message']; ?></h2>
            </div>

            <?php if($data['receptionists'] && count($data['receptionists']) > 0): ?>
                <div class="results-grid">
                    <?php foreach($data['receptionists'] as $receptionist): ?>
                        <?php
                        $rec = is_array($receptionist) ? $receptionist : (array)$receptionist;
                        ?>
                        <a href="<?php echo URLROOT; ?>/receptionists/about/<?php echo $rec['receptionist_id']; ?>" class="receptionist-card">
                            <h3><?php echo htmlspecialchars($rec['receptionist_name']); ?></h3>
                            <?php if(isset($rec['institution_name'])): ?>
                                <div class="institution-info">
                                    <p><i class='bx bx-buildings'></i> <?php echo htmlspecialchars($rec['institution_name']); ?></p>
                                    <p><i class='bx bx-map'></i> <?php echo htmlspecialchars($rec['institution_city'] . ', ' . $rec['institution_state']); ?></p>
                                </div>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="no-results">
                    <i class='bx bx-search-alt'></i>
                    <h3>No receptionists found</h3>
                    <p>Try searching with a different term or <a href="<?php echo URLROOT; ?>/homepages/index">return to home</a></p>
                </div>
            <?php endif; ?>
        </div>
    </main>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>