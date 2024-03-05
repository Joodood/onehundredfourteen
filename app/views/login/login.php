
<style>
    .form-container {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background: var(--light);
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .form-container h1 {
        text-align: center;
        margin-bottom: 24px;
    }

    .form-group {
        margin-bottom: 12px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid var(--dark-grey);
    }

    .btn {
        width: 100%;
        padding: 10px;
        border-radius: 4px;
        border: none;
        background: var(--blue);
        color: var(--light);
        cursor: pointer;
        font-size: 16px;
    }

    .btn:hover {
        background: var(--dark-blue);
    }

</style>

<section id="content">
    <!-- ... existing navbar ... -->

    <main>
        <div class="form-container">
            <h1>Register</h1>
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Register</button>
            </form>
        </div>
    </main>
    <!-- ... existing content ... -->
</section>