<?php
    $conn = mysqli_connect('localhost', 'root', '', 'lms');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = $_POST['name'];

    $sql = "INSERT INTO categories (name) VALUES ('$name')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../admin/categories.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
