<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<?php require_once APPROOT . '/views/inc/searchbarheader.php'; ?>

    <style>
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

        .alert-warning {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
    </style>

    <main>
        <div class="add-form-container">
            <h2><i class='bx bx-plus-circle'></i> Add New Institution</h2>

            <?php flash('add_message'); ?>

            <form action="<?php echo URLROOT; ?>/institutions/add" method="post">
                <div class="form-group">
                    <label for="institution_name">Institution Name *</label>
                    <input
                        type="text"
                        name="institution_name"
                        id="institution_name"
                        value="<?php echo $data['institution_name']; ?>"
                        placeholder="e.g., General Hospital"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="institution_city">City *</label>
                    <input
                        type="text"
                        name="institution_city"
                        id="institution_city"
                        value="<?php echo $data['institution_city']; ?>"
                        placeholder="e.g., New York"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="institution_state">State *</label>
                    <select name="institution_state" id="institution_state" required>
                        <option value="">Select State</option>
                        <option value="AL" <?php echo $data['institution_state'] == 'AL' ? 'selected' : ''; ?>>Alabama</option>
                        <option value="AK" <?php echo $data['institution_state'] == 'AK' ? 'selected' : ''; ?>>Alaska</option>
                        <option value="AZ" <?php echo $data['institution_state'] == 'AZ' ? 'selected' : ''; ?>>Arizona</option>
                        <option value="AR" <?php echo $data['institution_state'] == 'AR' ? 'selected' : ''; ?>>Arkansas</option>
                        <option value="CA" <?php echo $data['institution_state'] == 'CA' ? 'selected' : ''; ?>>California</option>
                        <option value="CO" <?php echo $data['institution_state'] == 'CO' ? 'selected' : ''; ?>>Colorado</option>
                        <option value="CT" <?php echo $data['institution_state'] == 'CT' ? 'selected' : ''; ?>>Connecticut</option>
                        <option value="DE" <?php echo $data['institution_state'] == 'DE' ? 'selected' : ''; ?>>Delaware</option>
                        <option value="FL" <?php echo $data['institution_state'] == 'FL' ? 'selected' : ''; ?>>Florida</option>
                        <option value="GA" <?php echo $data['institution_state'] == 'GA' ? 'selected' : ''; ?>>Georgia</option>
                        <option value="HI" <?php echo $data['institution_state'] == 'HI' ? 'selected' : ''; ?>>Hawaii</option>
                        <option value="ID" <?php echo $data['institution_state'] == 'ID' ? 'selected' : ''; ?>>Idaho</option>
                        <option value="IL" <?php echo $data['institution_state'] == 'IL' ? 'selected' : ''; ?>>Illinois</option>
                        <option value="IN" <?php echo $data['institution_state'] == 'IN' ? 'selected' : ''; ?>>Indiana</option>
                        <option value="IA" <?php echo $data['institution_state'] == 'IA' ? 'selected' : ''; ?>>Iowa</option>
                        <option value="KS" <?php echo $data['institution_state'] == 'KS' ? 'selected' : ''; ?>>Kansas</option>
                        <option value="KY" <?php echo $data['institution_state'] == 'KY' ? 'selected' : ''; ?>>Kentucky</option>
                        <option value="LA" <?php echo $data['institution_state'] == 'LA' ? 'selected' : ''; ?>>Louisiana</option>
                        <option value="ME" <?php echo $data['institution_state'] == 'ME' ? 'selected' : ''; ?>>Maine</option>
                        <option value="MD" <?php echo $data['institution_state'] == 'MD' ? 'selected' : ''; ?>>Maryland</option>
                        <option value="MA" <?php echo $data['institution_state'] == 'MA' ? 'selected' : ''; ?>>Massachusetts</option>
                        <option value="MI" <?php echo $data['institution_state'] == 'MI' ? 'selected' : ''; ?>>Michigan</option>
                        <option value="MN" <?php echo $data['institution_state'] == 'MN' ? 'selected' : ''; ?>>Minnesota</option>
                        <option value="MS" <?php echo $data['institution_state'] == 'MS' ? 'selected' : ''; ?>>Mississippi</option>
                        <option value="MO" <?php echo $data['institution_state'] == 'MO' ? 'selected' : ''; ?>>Missouri</option>
                        <option value="MT" <?php echo $data['institution_state'] == 'MT' ? 'selected' : ''; ?>>Montana</option>
                        <option value="NE" <?php echo $data['institution_state'] == 'NE' ? 'selected' : ''; ?>>Nebraska</option>
                        <option value="NV" <?php echo $data['institution_state'] == 'NV' ? 'selected' : ''; ?>>Nevada</option>
                        <option value="NH" <?php echo $data['institution_state'] == 'NH' ? 'selected' : ''; ?>>New Hampshire</option>
                        <option value="NJ" <?php echo $data['institution_state'] == 'NJ' ? 'selected' : ''; ?>>New Jersey</option>
                        <option value="NM" <?php echo $data['institution_state'] == 'NM' ? 'selected' : ''; ?>>New Mexico</option>
                        <option value="NY" <?php echo $data['institution_state'] == 'NY' ? 'selected' : ''; ?>>New York</option>
                        <option value="NC" <?php echo $data['institution_state'] == 'NC' ? 'selected' : ''; ?>>North Carolina</option>
                        <option value="ND" <?php echo $data['institution_state'] == 'ND' ? 'selected' : ''; ?>>North Dakota</option>
                        <option value="OH" <?php echo $data['institution_state'] == 'OH' ? 'selected' : ''; ?>>Ohio</option>
                        <option value="OK" <?php echo $data['institution_state'] == 'OK' ? 'selected' : ''; ?>>Oklahoma</option>
                        <option value="OR" <?php echo $data['institution_state'] == 'OR' ? 'selected' : ''; ?>>Oregon</option>
                        <option value="PA" <?php echo $data['institution_state'] == 'PA' ? 'selected' : ''; ?>>Pennsylvania</option>
                        <option value="RI" <?php echo $data['institution_state'] == 'RI' ? 'selected' : ''; ?>>Rhode Island</option>
                        <option value="SC" <?php echo $data['institution_state'] == 'SC' ? 'selected' : ''; ?>>South Carolina</option>
                        <option value="SD" <?php echo $data['institution_state'] == 'SD' ? 'selected' : ''; ?>>South Dakota</option>
                        <option value="TN" <?php echo $data['institution_state'] == 'TN' ? 'selected' : ''; ?>>Tennessee</option>
                        <option value="TX" <?php echo $data['institution_state'] == 'TX' ? 'selected' : ''; ?>>Texas</option>
                        <option value="UT" <?php echo $data['institution_state'] == 'UT' ? 'selected' : ''; ?>>Utah</option>
                        <option value="VT" <?php echo $data['institution_state'] == 'VT' ? 'selected' : ''; ?>>Vermont</option>
                        <option value="VA" <?php echo $data['institution_state'] == 'VA' ? 'selected' : ''; ?>>Virginia</option>
                        <option value="WA" <?php echo $data['institution_state'] == 'WA' ? 'selected' : ''; ?>>Washington</option>
                        <option value="WV" <?php echo $data['institution_state'] == 'WV' ? 'selected' : ''; ?>>West Virginia</option>
                        <option value="WI" <?php echo $data['institution_state'] == 'WI' ? 'selected' : ''; ?>>Wisconsin</option>
                        <option value="WY" <?php echo $data['institution_state'] == 'WY' ? 'selected' : ''; ?>>Wyoming</option>
                    </select>
                </div>

                <button type="submit" class="btn-submit">
                    <i class='bx bx-plus'></i> Add Institution
                </button>
            </form>
        </div>
    </main>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>