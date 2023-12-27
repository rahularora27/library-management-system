<!DOCTYPE html>
<html>
    <head>
        <title>Manipal Library</title>
        <link rel="icon" href="./assets/images/manipal.png">
        <link rel="stylesheet" href="./assets/css/signup-login.css">
    </head>
    <body>

        <!-- NAVBAR -->
        <nav>
            <div class="logo">
                <img src="./assets/images/books.png" alt="Logo">
            </div>
            <ul class="nav-items">
                <li><a href="admin_login.php">Admin Login</a></li>
                <li><a href="index.php">User Login</a></li>
                <li><a href="signup.php">Register</a></li>
            </ul>
        </nav>
        <!-- NAVBAR -->

        <!-- LOGIN FORM -->
        <div class="image-container">
            <img src="./assets/images/Manipal Library.png" alt="Registration Image">
        </div>
        <div class="form-container">
            <form action="login.php" method="post">
                <label for="email">Email ID:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <div class="buttons-container">
                    <button type="submit" class="register-button">Login</button>
                    <button type="reset" class="reset-button">Reset</button>
                </div>
            </form>
        </div>
        <!-- LOGIN FORM -->

    </body>
</html>