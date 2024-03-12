

<!-- <style>
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
    font-size: 28px; /* Slightly smaller font size */
}

.form-group {
    margin-bottom: 20px; /* Slightly reduced space */
}

.form-group label {
    display: block;
    margin-bottom: 8px; /* Reduced space above inputs */
    color: var(--dark);
    font-family: var(--lato);
    font-size: 18px; /* Smaller font size */
}

.form-group input[type="email"],
.form-group input[type="password"] {
    width: 100%;
    padding: 12px; /* Slightly reduced height */
    border: 1px solid var(--dark-grey);
    border-radius: 4px;
    font-family: var(--lato);
    font-size: 16px; /* Smaller font size for input text */
}

.error {
    color: var(--red);
    font-size: 14px; /* Slightly smaller font size */
    margin-top: 5px;
}

.submit-btn {
    display: block;
    width: 100%;
    padding: 12px; /* Slightly reduced height */
    border: none;
    border-radius: 4px;
    background-color: var(--blue);
    color: var(--light);
    font-family: var(--poppins);
    font-size: 18px; /* Smaller font size */
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
    animation: outlineFlash 0.5s ease-out forwards; /* Adjusted duration for a quicker effect */
}

/* Adding styles for the sign-in link at the bottom */
.login-link {
    margin-top: 20px; /* Space above the link */
    text-align: center; /* Center-align the text */
    font-size: 16px; /* Adjusted font size for consistency */
}

.login-link a {
    color: #3C91E6; /* Same blue as your animation */
    text-decoration: none; /* Optional: removes underline from links */
}

/* The load animation for .register-container */
@keyframes outlineFlash {
    0% { box-shadow: 0 0 0px 0px rgba(60, 145, 230, 0); }
    50% { box-shadow: 0 0 0px 3px rgba(60, 145, 230, 1); }
    100% { box-shadow: 0 0 0px 0px rgba(60, 145, 230, 0); }
}



</style> -->



<style>
:root {
    --light: #f9f9f9; /* Light background */
    --dark: #333; /* Dark text color for contrast */
    --red: #ff0000; /* Error color */
    --dark-grey: #aaa; /* Input border color */
    --blue: #007bff; /* Button and link color */
    --poppins: 'Poppins', sans-serif;
    --lato: 'Lato', sans-serif;
}

.register-container {
    max-width: 800px;
    margin: 40px auto;
    padding: 40px;
    background: var(--light);
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    animation: outlineFlash 0.5s ease-out forwards;
}

.register-container h1 {
    margin-bottom: 30px;
    color: var(--dark);
    font-family: var(--poppins);
    text-align: center;
    font-size: 28px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: var(--dark);
    font-family: var(--lato);
    font-size: 18px;
}

.form-group input[type="email"],
.form-group input[type="password"] {
    width: 100%;
    padding: 12px;
    border: 1px solid var(--dark-grey);
    border-radius: 4px;
    font-family: var(--lato);
    font-size: 16px;
}

.error {
    color: var(--red);
    font-size: 14px;
    margin-top: 5px;
}

.submit-btn {
    display: block;
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 4px;
    background-color: var(--blue);
    color: var(--light);
    font-family: var(--poppins);
    font-size: 18px;
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

@keyframes outlineFlash {
    0% { box-shadow: 0 0 0px 0px rgba(60, 145, 230, 0); }
    50% { box-shadow: 0 0 0px 3px rgba(60, 145, 230, 1); }
    100% { box-shadow: 0 0 0px 0px rgba(60, 145, 230, 0); }
}

.login-link {
    margin-top: 20px;
    text-align: center;
    font-size: 16px;
}

.login-link a {
    color: var(--blue);
    text-decoration: none;
}
</style>

    

<!-- <main>
    <div class="register-container">
        <h1>Create an Account</h1>
        <form action="<?php echo URLROOT; ?>/Users/register" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                <div class="error"><?php echo $data['email'] ?? ''; ?></div>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
                <div class="error"><?php echo $data['password'] ?? ''; ?></div>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" value="<?php echo isset($_POST['confirm_password']) ? htmlspecialchars($_POST['confirm_password']) : ''; ?>">
                <div class="error"><?php echo $data['confirm_password'] ?? ''; ?></div>
            </div>

            <input type="submit" class="submit-btn" value="Submit">
            <div class="register-container">


        <div class="login-link">
            Already have an account? <a href="<?php echo URLROOT; ?>/Users/login">Sign in</a>
        </div>
    </div>
        </form>
    </div>
</main>
</section> -->

<main>


    <div class="register-container">
        <h1>Create an Account</h1>
        <form action="<?php echo URLROOT; ?>/Users/register" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $_POST['email'] ?? ''; ?>">
                <?php if (isset($data['errors']['email'])): ?>
                    <div class="error"><?php echo htmlspecialchars($data['errors']['email']); ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="">
                <?php if (isset($data['errors']['password'])): ?>
                    <div class="error"><?php echo htmlspecialchars($data['errors']['password']); ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" value="">
                <?php if (isset($data['errors']['confirm_password'])): ?>
                    <div class="error"><?php echo htmlspecialchars($data['errors']['confirm_password']); ?></div>
                <?php endif; ?>
            </div>

            <input type="submit" name = "Submit" class="submit-btn" value="Submit">
        </form>

        <div class="login-link">
            Already have an account? <a href="<?php echo URLROOT; ?>/Users/login">Sign in</a>
        </div>
    </div>
</main>
