<?php
    $conn = mysqli_connect('localhost', 'root', '', 'lms');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = $_POST['title'];
    $author_id = $_POST['author_id'];
    $category_id = $_POST['category_id'];
    $total = $_POST['total'];

    $sql = "INSERT INTO books (title, author_id, category_id, total) VALUES ('title', '$author_id', '$category_id', '$total')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../admin/books.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
