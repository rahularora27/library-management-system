<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lms";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$password = $_POST["password"];

$sql = "UPDATE users SET password='$password' WHERE id=1";
if (mysqli_query($conn, $sql)) {
    header("Location: change_password.php");
        exit;
} else {
    echo "Error updating profile: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
