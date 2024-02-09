<!DOCTYPE html>
<html>
    <head>
        <title>Manipal Library</title>
        <link rel="icon" href="../assets/images/manipal.png">
        <link rel="stylesheet" href="../assets/css/signup-login.css">
    </head>
    <body>
        <!-- NAVBAR -->
        <?php include('navbar.php'); ?>
        <!-- NAVBAR -->

        <!-- LOGIN FORM -->
        <div class="image-container">
            <img src="../assets/images/Manipal Library.png" alt="Registration Image">
        </div>
        <div class="form-container">
            <form action="../server/admin_login.php" method="post">
                <label for="email">Admin ID:</label>
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