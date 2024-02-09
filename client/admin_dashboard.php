<?php
$conn = mysqli_connect("localhost", "root", "", "lms");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$user_id = 1;
$sql = "SELECT name FROM admin WHERE id = $user_id";
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
    <head><title>Manipal Library</title>
        <link rel="icon" href="../assets/images/manipal.png">
        <link rel="stylesheet" href="../assets/css/dashboard.css">
    </head>
    <body>
        
    <!-- NAVBAR -->
    <nav>
        <div class="logo">
            <img src="../assets/images/books.png" alt="Logo">
        </div>
        <div class="dropdown">
            <button class="dropbtn">Welcome, Admin</button>
            <div class="dropdown-content">
                <a href="edit_admin_profile.php">Edit Profile</a>
                <a href="change_admin_password.php">Change Password</a>
                <a href="../server/logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <!-- NAVBAR -->

    <h1>Admin Dashboard</h1>

    <div class="dashboard-elements">
    <div class="block">
        <h2>Registered Users:</h2>

        <p class="count"><?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lms";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
        $sql = "SELECT COUNT(*) as num_users FROM users";
        $result = $conn->query($sql);
        echo ($result->num_rows > 0) ? $result->fetch_assoc()["num_users"] : "No categories found.";
        $conn->close();
        ?></p>

        <a href="users.php">  
            <button class="view-btn">View Users</button>  
        </a>
    </div>

    <div class="block">
        <h2>Registered Books:</h2>

        <p class="count"><?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lms";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
        $sql = "SELECT COUNT(*) as num_books FROM books";
        $result = $conn->query($sql);
        echo ($result->num_rows > 0) ? $result->fetch_assoc()["num_books"] : "No books found.";
        $conn->close();
        ?></p>

        <a href="books.php">  
            <button class="view-btn">View Books</button>  
        </a>
    </div>

    <div class="block">
        <h2>Registered Authors:</h2>

        <p class="count"><?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lms";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
        $sql = "SELECT COUNT(*) as num_authors FROM authors";
        $result = $conn->query($sql);
        echo ($result->num_rows > 0) ? $result->fetch_assoc()["num_authors"] : "No authors found.";
        $conn->close();
        ?></p>
        
        <a href="authors.php">  
            <button class="view-btn">View Authors</button>  
        </a>
    </div>

    <div class="block">
        <h2>Registered Categories:</h2>

        <p class="count"><?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lms";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
        $sql = "SELECT COUNT(*) as num_categories FROM categories";
        $result = $conn->query($sql);
        echo ($result->num_rows > 0) ? $result->fetch_assoc()["num_categories"] : "No categories found.";
        $conn->close();
        ?></p>
        
        <a href="categories.php">  
            <button class="view-btn">View Categories</button>  
        </a>
    </div>
    </div>

    </body>
</html>