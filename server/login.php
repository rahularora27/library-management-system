<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lms";
    
    $conn = mysqli_connect($host, $username, $password, $dbname);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['user_type']; 

    if ($userType == 'admin') {
        $table = 'admin';
        $dashboard = '../admin/dashboard.php';
        $redirectOnError = '../admin/login.php';
    } elseif ($userType == 'user') {
        $table = 'users';
        $dashboard = '../client/dashboard.php';
        $redirectOnError = '../client/login.php';
    } else {
        die("Invalid user type");
    }

    $sql = "SELECT * FROM $table WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        header("Location: $dashboard");
        exit;
    } else {
        echo '<script type="text/javascript"> alert("Email or Password Incorrect"); window.location = "' . $redirectOnError . '" </script>';
    }
    
    mysqli_close($conn);
?>
