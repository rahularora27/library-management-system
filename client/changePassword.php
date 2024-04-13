<!DOCTYPE html>
<html>
    <head><title>Manipal Library</title>
        <link rel="icon" href="./assets/images/manipal.png">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body>
        
    <!-- NAVBAR -->
<?php include 'navbar.php'; ?>
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

$sql = "SELECT * FROM users WHERE id = 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    ?>
    <form method="post" action="update_password.php">
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