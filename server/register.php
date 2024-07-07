<?php
session_start();

$connection = mysqli_connect("localhost", "root", "", "lms");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];

// Validate email format (must end with @muj.manipal.edu)
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@muj\.manipal\.edu$/', $email)) {
    $_SESSION['error_message'] = 'Please use an email associated with Manipal University Jaipur.';
    header("Location: ../user/signup.php");
    exit();
}

// Validate mobile number format (10 digits)
if (!preg_match('/^\d{10}$/', $mobile)) {
    $_SESSION['error_message'] = 'Mobile number should be 10 digits.';
    header("Location: ../user/signup.php");
    exit();
}

// Validate password (alphanumeric, minimum 8 characters)
if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
    $_SESSION['error_message'] = 'Password should be alphanumeric and minimum 8 characters.';
    header("Location: ../user/signup.php");
    exit();
}

// Check if email already exists
$query_email = "SELECT * FROM users WHERE email='$email'";
$result_email = mysqli_query($connection, $query_email);

if (mysqli_num_rows($result_email) > 0) {
    $_SESSION['error_message'] = 'Email already registered.';
    header("Location: ../user/signup.php");
    exit();
}

// Check if mobile number already exists
$query_mobile = "SELECT * FROM users WHERE mobile='$mobile'";
$result_mobile = mysqli_query($connection, $query_mobile);

if (mysqli_num_rows($result_mobile) > 0) {
    $_SESSION['error_message'] = 'Mobile number already registered.';
    header("Location: ../user/signup.php");
    exit();
}

// Insert user into database
$query = "INSERT INTO users VALUES('', '$name', '$email', '$password', '$mobile')";
$query_run = mysqli_query($connection, $query);

if ($query_run) {
    $_SESSION['success_message'] = 'Registration successful! You may login now.';
    header("Location: ../user/index.php");
    exit();
} else {
    $_SESSION['error_message'] = 'Failed to register. Please try again later.';
    header("Location: ../user/signup.php");
    exit();
}

mysqli_close($connection);
?>
