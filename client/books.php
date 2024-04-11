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
        <link rel="icon" href="./assets/images/manipal.png">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body>
        
    <!-- NAVBAR -->
<?php include "navbar.php"; ?>
    <!-- NAVBAR -->
    
    </body>
</html>

<br/><br/></br></br>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lms";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT b.title, a.name AS author, c.name AS category
        FROM books b 
        INNER JOIN authors a ON b.author_id = a.id 
        INNER JOIN categories c ON b.category_id = c.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table style='border-collapse: collapse; width: 100%;'>";
  echo "<tr style='background-color: #4CAF50;'><th style='padding: 12px; text-align: left;'>Title</th>";
  echo "<th style='padding: 12px; text-align: left;'>Author</th>";
  echo "<th style='padding: 12px; text-align: left;'>Category</th>";

  while($row = $result->fetch_assoc()) {
    echo "<tr style='border-bottom: 1px solid #ddd;'><td style='padding: 12px;'>" . $row["title"] . "</td>";
    echo "<td style='padding: 12px;'>" . $row["author"] . "</td>";
    echo "<td style='padding: 12px;'>" . $row["category"] . "</td>";
  }

  echo "</table>";
} else {
  echo "No books found.";
}

$conn->close();
?>
