<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<?php require_once APPROOT . '/views/inc/searchbarheader.php'; ?>

    <style>
        /* Same CSS as institutions/add.php */
        .add-form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 24px;
            background: var(--light);
            border-radius: 20px;
        }

        .add-form-container h2 {
            margin-bottom: 24px;
            color: var(--blue);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--grey);
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--blue);
        }

        .btn-submit {
            background: var(--blue);
            color: white;
            padding: 12px 32px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background: var(--dark-blue);
            transform: translateY(-2px);
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .help-text {
            font-size: 13px;
            color: var(--dark-grey);
            margin-top: 4px;
        }
    </style>

    <main>
        <div class="add-form-container">
            <h2><i class='bx bx-user-plus'></i> Add New Receptionist</h2>

            <?php flash('add_message'); ?>

            <form action="<?php echo URLROOT; ?>/receptionists/add" method="post">
                <div class="form-group">
                    <label for="receptionist_name">Receptionist Name *</label>
                    <input
                        type="text"
                        name="receptionist_name"
                        id="receptionist_name"
                        value="<?php echo $data['receptionist_name']; ?>"
                        placeholder="e.g., John Doe"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="institution_id">Institution *</label>
                    <select name="institution_id" id="institution_id" required>
                        <option value="">Select Institution</option>
                        <?php foreach($data['institutions'] as $institution): ?>
                            <?php
                            $inst = is_array($institution) ? $institution : (array)$institution;
                            $selected = $data['institution_id'] == $inst['institution_id'] ? 'selected' : '';
                            ?>
                            <option value="<?php echo $inst['institution_id']; ?>" <?php echo $selected; ?>>
                                <?php echo htmlspecialchars($inst['institution_name'] . ' - ' . $inst['institution_city'] . ', ' . $inst['institution_state']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <p class="help-text">Don't see the institution? <a href="<?php echo URLROOT; ?>/institutions/add">Add it first</a></p>
                </div>

                <button type="submit" class="btn-submit">
                    <i class='bx bx-plus'></i> Add Receptionist
                </button>
            </form>
        </div>
    </main>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>