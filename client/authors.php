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
        <link rel="stylesheet" href="./assets/css/user_navbar.css">
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
    
    </body>
</html>

<br/><br/></br></br>

<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "lms";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM authors";
$result = mysqli_query($conn, $sql);

echo "<table style='border-collapse: collapse; width: 100%;'>";
echo "<tr style='background-color: #4CAF50;'><th style='padding: 12px; text-align: left;'>ID</th><th style='padding: 12px; text-align: left;'>Name</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr style='border-bottom: 1px solid #ddd;'><td style='padding: 12px;'>" . $row["id"] . "</td>";
  echo "<td style='padding: 12px;'>" . $row["name"] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>

