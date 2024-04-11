<?php
$conn = mysqli_connect("localhost", "root", "", "lms");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$user_id = 1;
$sql = "SELECT name FROM users WHERE id = $user_id";
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
<head>
    <title>Manipal Library</title>
    <link rel="icon" href="../assets/images/manipal.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- NAVBAR -->
<?php include "navbar.php"; ?>
<!-- NAVBAR -->

<div class="container mx-auto px-4 py-8">

    <h1 class="text-3xl font-bold mb-8">User Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg p-6 shadow-md">
            <h2 class="text-xl font-bold mb-4">Registered Books:</h2>
            <p class="text-2xl font-semibold mb-4">
                <?php
                $conn = new mysqli("localhost", "root", "", "lms");
                if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
                $sql = "SELECT COUNT(*) as num_books FROM books";
                $result = $conn->query($sql);
                echo ($result->num_rows > 0) ? $result->fetch_assoc()["num_books"] : "No books found.";
                $conn->close();
                ?>
            </p>
            <a href="books.php" class="text-blue-500 hover:text-blue-700">View Books</a>
        </div>
        
    </div>
</div>

</body>
</html>
