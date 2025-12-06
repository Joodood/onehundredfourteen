<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<?php require_once APPROOT . '/views/inc/searchbarheader.php'; ?>

    <style>
        .settings-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 24px;
        }

        .settings-section {
            background: var(--light);
            border-radius: 20px;
            padding: 32px;
            margin-bottom: 24px;
        }

        .settings-section h2 {
            color: var(--blue);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .settings-section p {
            color: var(--dark-grey);
            margin-bottom: 24px;
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

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--grey);
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--blue);
        }

        .btn-primary {
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

        .btn-primary:hover {
            background: var(--dark-blue);
            transform: translateY(-2px);
        }

        .btn-danger {
            background: var(--red);
            color: white;
            padding: 12px 32px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-danger:hover {
            background: #c0392b;
            transform: translateY(-2px);
        }

        .danger-zone {
            border: 2px solid var(--red);
        }

        .danger-zone h2 {
            color: var(--red);
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 16px 0;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
            cursor: pointer;
        }

        .checkbox-group label {
            margin: 0;
            font-weight: normal;
            cursor: pointer;
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

        .alert-info {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .user-info {
            background: #f8f9fa;
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 24px;
        }

        .user-info strong {
            color: var(--blue);
        }
    </style>

    <main>
        <div class="settings-container">
            <h1><i class='bx bx-cog'></i> Account Settings</h1>

            <div class="user-info">
                <strong>Email:</strong> <?php echo htmlspecialchars($data['user_email']); ?>
            </div>

            <!-- Change Password Section -->
            <div class="settings-section">
                <h2><i class='bx bx-lock'></i> Change Password</h2>
                <p>Update your password to keep your account secure</p>

                <?php flash('password_message'); ?>

                <form action="<?php echo URLROOT; ?>/users/settings" method="post">
                    <div class="form-group">
                        <label for="current_password">Current Password *</label>
                        <input
                            type="password"
                            name="current_password"
                            id="current_password"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="new_password">New Password * (min 6 characters)</label>
                        <input
                            type="password"
                            name="new_password"
                            id="new_password"
                            minlength="6"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm New Password *</label>
                        <input
                            type="password"
                            name="confirm_password"
                            id="confirm_password"
                            minlength="6"
                            required
                        >
                    </div>

                    <button type="submit" name="change_password" class="btn-primary">
                        <i class='bx bx-check'></i> Update Password
                    </button>
                </form>
            </div>

            <!-- Delete Account Section -->
            <div class="settings-section danger-zone">
                <h2><i class='bx bx-error'></i> Danger Zone</h2>
                <p>Once you delete your account, there is no going back. Your reviews will remain but will be marked as anonymous.</p>

                <?php flash('delete_message'); ?>

                <form action="<?php echo URLROOT; ?>/users/settings" method="post" onsubmit="return confirmDelete()">
                    <div class="form-group">
                        <label for="delete_password">Enter Password to Confirm *</label>
                        <input
                            type="password"
                            name="delete_password"
                            id="delete_password"
                            required
                        >
                    </div>

                    <div class="checkbox-group">
                        <input
                            type="checkbox"
                            name="delete_confirm"
                            id="delete_confirm"
                            required
                        >
                        <label for="delete_confirm">
                            I understand this action cannot be undone
                        </label>
                    </div>

                    <button type="submit" name="delete_account" class="btn-danger">
                        <i class='bx bx-trash'></i> Delete My Account
                    </button>
                </form>
            </div>
        </div>
    </main>

    <script>
        function confirmDelete() {
            return confirm('Are you absolutely sure you want to delete your account? This action cannot be undone!');
        }

        // Password match validation
        document.getElementById('confirm_password')?.addEventListener('input', function() {
            const newPass = document.getElementById('new_password').value;
            const confirmPass = this.value;

            if(newPass && confirmPass) {
                if(newPass !== confirmPass) {
                    this.setCustomValidity('Passwords do not match');
                } else {
                    this.setCustomValidity('');
                }
            }
        });
    </script>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>