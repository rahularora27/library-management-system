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

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        header("Location: user_dashboard.php");
        exit;
    } else {
        echo '<script type="text/javascript"> alert("Email or Password Incorrect"); window.location = "index.php" </script>';
    }
    
    mysqli_close($conn);
?>
