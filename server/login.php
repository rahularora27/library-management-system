<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$dbname = "lms";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$userType = $_POST['user_type'];

if ($userType == 'admin') {
    $table = 'admins';
    $dashboard = '../admin/dashboard.php';
    $redirectOnError = '../admin/index.php';
} elseif ($userType == 'user') {
    $table = 'users';
    $dashboard = '../user/dashboard.php';
    $redirectOnError = '../user/index.php';
} else {
    die("Invalid user type");
}

$sql = "SELECT * FROM $table WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($row['password'] == $password) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['mobile'] = $row['mobile'];
        $_SESSION['success_message'] = 'Login successful!';
        header("Location: $dashboard");
        exit;
    } else {
        $_SESSION['error_message'] = 'Password Incorrect';
        header("Location: $redirectOnError");
        exit;
    }
} else {
    $_SESSION['error_message'] = 'Email not registered';
    header("Location: $redirectOnError");
    exit;
}

mysqli_close($conn);
?>
