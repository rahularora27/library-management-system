<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Redirect if session email is not set (not logged in)
    header("Location: login.php");
    exit();
}

// Database connection parameters
$host = 'localhost';
$dbname = 'lms';
$username = 'root';
$password = '';

// Establish database connection using PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    // Sanitize inputs
    $old_password = trim(htmlspecialchars($_POST['old_password']));
    $new_password = htmlspecialchars($_POST['new_password']);

    // Validate new password
    if (strlen($new_password) < 8 || !preg_match('/[a-zA-Z]/', $new_password) || !preg_match('/[0-9]/', $new_password)) {
        $_SESSION['error_message'] = 'Password should be alphanumeric and minimum 8 characters.';
        header("Location: ../user/change_password.php");
        exit;
    }

    // Retrieve email from session
    $email = $_SESSION['email'];

    // Query to fetch user's current password
    $stmt = $pdo->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Verify old password
        $stored_password = $row['password'];
        if ($old_password === $stored_password) {
            // Update password in database
            $update_stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
            $update_stmt->execute([$new_password, $email]);

            // Redirect or show success message
            $_SESSION['success_message'] = 'Password updated successfully.';
            header("Location: ../user/change_password.php");
            exit;
        } else {
            // Incorrect old password
            $_SESSION['error_message'] = 'Please enter the correct old password.';
            header("Location: ../user/change_password.php");
            exit;
        }
    } else {
        // User not found (should not typically happen if email is stored in session properly)
        echo "User not found.";
    }
}
?>
