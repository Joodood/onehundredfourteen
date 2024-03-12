
<style>
.register-container {
    max-width: 800px;
    margin: 40px auto;
    padding: 40px;
    background: var(--light);
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.register-container h1 {
    margin-bottom: 30px;
    color: var(--dark);
    font-family: var(--poppins);
    text-align: center;
    font-size: 28px; /* Slightly smaller font size for a cleaner look */
}

.form-group {
    margin-bottom: 20px; /* Slightly reduced space between form fields */
}

.form-group label {
    display: block;
    margin-bottom: 8px; /* Reduced space above inputs for tighter form */
    color: var(--dark);
    font-family: var(--lato);
    font-size: 18px; /* Smaller font size for labels */
}

.form-group input[type="email"],
.form-group input[type="password"] {
    width: 100%;
    padding: 12px; /* Slightly reduced padding for input fields */
    border: 1px solid var(--dark-grey);
    border-radius: 4px;
    font-family: var(--lato);
    font-size: 16px; /* Smaller font size for input text */
}

.error {
    color: var(--red);
    font-size: 14px; /* Slightly smaller font size for error messages */
    margin-top: 5px;
}

.submit-btn {
    display: block;
    width: 100%;
    padding: 12px; /* Slightly reduced height for the button */
    border: none;
    border-radius: 4px;
    background-color: var(--blue);
    color: var(--light);
    font-family: var(--poppins);
    font-size: 18px; /* Slightly smaller font size for the button text */
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.submit-btn:hover {
    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00ab, #ff0000);
    background-size: 600% 100%;
    animation: rainbow 8s linear infinite;
}

@keyframes rainbow {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

.register-container {
    /* Existing styles */
    animation: outlineFlash 1s ease-out forwards;
}

@keyframes outlineFlash {
    0% {
        box-shadow: 0 0 0px 0px rgba(60, 145, 230, 0);
    }
    50% {
        box-shadow: 0 0 0px 3px rgba(60, 145, 230, 1);
    }
    100% {
        box-shadow: 0 0 0px 0px rgba(60, 145, 230, 0);
    }
}

.register-link {
    margin-top: 20px;
    text-align: center;
}

.register-link p {
    color: var(--dark); /* Or choose a color that fits your design */
}

.register-link a {
    color: #3C91E6; /* Same blue as your animation */
    text-decoration: underline;
}


</style>



<!-- <main>
    <div class="register-container">
        <h1>Login to Your Account</h1>
        <form action="<?php echo URLROOT; ?>/Users/login" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                <div class="error"><?php echo $data['email_err'] ?? ''; ?></div>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <div class="error"><?php echo $data['password_err'] ?? ''; ?></div>
            </div>

            <input type="submit" class="submit-btn" value="Login">
        </form>
    </div>
</main> -->


<main>
    <div class="register-container">
        <h1>Login to Your Account</h1>
        <form action="<?php echo URLROOT; ?>/Users/login" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $_POST['email'] ?? ''; ?>">
                <?php if (isset($data['errors']['email'])): ?>
                    <div class="error"><?php echo htmlspecialchars($data['errors']['email']); ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <?php if (isset($data['errors']['password'])): ?>
                    <div class="error"><?php echo htmlspecialchars($data['errors']['password']); ?></div>
                <?php endif; ?>
            </div>

            <input type="submit" class="submit-btn" value="Login">
        </form>
        <div class="register-link">
            <p>Don't have an account yet? <a href="<?php echo URLROOT; ?>/Users/register">Register</a></p>
        </div>
    </div>
</main>

</section>