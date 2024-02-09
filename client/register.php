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

        <!-- REGISTRATION FORM -->
        <div class="image-container">
            <img src="../assets/images/Manipal Library.png" alt="Registration Image">
        </div>
        <div class="form-container">
            <form action="../server/register.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email ID:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
        <div class="buttons-container">
            <button type="submit" class="register-button">Register</button>
            <button type="reset" class="reset-button">Reset</button>
        </div>
            </form>
        </div>
        <!-- REGISTRATION FORM -->
    </body>
</html>