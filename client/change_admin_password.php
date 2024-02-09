<?php
$conn = mysqli_connect("localhost", "root", "", "lms");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$user_id = 1;
$sql = "SELECT name FROM admin WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row["name"];
} else {
    $name = "Unknown";
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head><title>Manipal Library</title>
        <link rel="icon" href="./assets/images/manipal.png">
        <link rel="stylesheet" href="./assets/css/edit_profile.css">
    </head>
    <body>
        
    <!-- NAVBAR -->
    <nav>
        <div class="logo">
            <img src="./assets/images/books.png" alt="Logo">
        </div>
        <div class="dropdown">
            <button class="dropbtn">Welcome, <?php echo $name;?></button>
            <div class="dropdown-content">
                <a href="edit_admin_profile.php">Edit Profile</a>
                <a href="change_admin_password.php">Change Password</a>
                <a href="logout_admin.php">Logout</a>
            </div>
        </div>
    </nav>
    <!-- NAVBAR -->

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lms";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM admin WHERE id = 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    ?>
    <form method="post" action="update_admin_password.php">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $row["password"]; ?>"><br>
        <input type="submit" value="Save Changes">
    </form>
    <?php
} else {
    echo "User not found";
}

mysqli_close($conn);
?>

    </body>
</html>