<?php
session_start();

// Check if form data is posted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Establish database connection
    $connection = mysqli_connect("localhost", "root", "", "lms");

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize and validate inputs
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $mobile = mysqli_real_escape_string($connection, $_POST['mobile']);

    // Validate email domain
    if (!endsWith($email, '@muj.manipal.edu')) {
        $_SESSION['error_message'] = 'Please use an email associated with Manipal University Jaipur.';
        header("Location: ../user/edit_profile.php");
        exit;
    }

    // Validate mobile number format
    if (!preg_match('/^\d{10}$/', $mobile)) {
        $_SESSION['error_message'] = 'Mobile number should be 10 digits.';
        header("Location: ../user/edit_profile.php");
        exit;
    }

    // Check if email is already registered
    $query_email = "SELECT * FROM users WHERE email = '$email' AND email != '{$_SESSION['email']}'";
    $result_email = mysqli_query($connection, $query_email);
    if (mysqli_num_rows($result_email) > 0) {
        $_SESSION['error_message'] = 'Email is already registered.';
        header("Location: ../user/edit_profile.php");
        exit;
    }

    // Check if mobile number is already registered
    $query_mobile = "SELECT * FROM users WHERE mobile = '$mobile' AND mobile != '{$_SESSION['mobile']}'";
    $result_mobile = mysqli_query($connection, $query_mobile);
    if (mysqli_num_rows($result_mobile) > 0) {
        $_SESSION['error_message'] = 'Mobile number is already registered.';
        header("Location: ../user/edit_profile.php");
        exit;
    }

    // Update query
    $query_update = "UPDATE users SET name = '$name', email = '$email', mobile = '$mobile' WHERE email = '{$_SESSION['email']}'";
    $query_run = mysqli_query($connection, $query_update);

    // Check if update was successful
    if ($query_run) {
        $_SESSION['success_message'] = 'Updated successfully.';
        $_SESSION['email'] = $email; // Update session email
        $_SESSION['mobile'] = $mobile; // Update session mobile
        header("Location: ../user/view_profile.php");
        exit;
    } else {
        $_SESSION['error_message'] = 'Failed to update. Please try again.';
        header("Location: ../user/edit_profile.php");
        exit;
    }
} else {
    // Handle if POST method is not used (optional)
    $_SESSION['error_message'] = 'Invalid request.';
    header("Location: ../user/edit_profile.php");
    exit;
}

// Function to check if a string ends with a specific substring
function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }
    return (substr($haystack, -$length) === $needle);
}
?>
