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
    <form method="post" action="update_profile.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row["name"]; ?>"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row["email"]; ?>"><br>
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