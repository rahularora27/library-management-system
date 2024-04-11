<!DOCTYPE html>
<html>
<head>
    <title>Manipal Library</title>
    <link rel="icon" href="./assets/images/manipal.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body class="bg-gray-100">

<!-- NAVBAR -->
<?php include "navbar.php"; ?>
<!-- NAVBAR -->

<div class="container mx-auto my-8">
    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lms";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch books data
    $sql = "SELECT b.id, b.title, a.name AS author, c.name AS category, b.total
            FROM books b 
            INNER JOIN authors a ON b.author_id = a.id 
            INNER JOIN categories c ON b.category_id = c.id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='w-full border-collapse border border-gray-200'>";
        echo "<thead><tr class='bg-green-500 text-white'>";
        echo "<th class='p-4 text-left'>Title</th>";
        echo "<th class='p-4 text-left'>Author</th>";
        echo "<th class='p-4 text-left'>Category</th>";
        echo "<th class='p-4 text-left'>Total Books</th>";
        echo "<th class='p-4 text-left'>Actions</th>";
        echo "</tr></thead>";
        echo "<tbody>";

        while($row = $result->fetch_assoc()) {
            echo "<tr class='border-b border-gray-200'>";
            echo "<td class='p-4'>" . $row["title"] . "</td>";
            echo "<td class='p-4'>" . $row["author"] . "</td>";
            echo "<td class='p-4'>" . $row["category"] . "</td>";
            echo "<td class='p-4'>" . $row["total"] . "</td>";
            echo "<td class='p-4'><button onclick='removeBook(" . $row["id"] . ")' class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded'>Remove</button></td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<p class='mt-4 text-center'>No books found.</p>";
    }

    mysqli_close($conn);
    ?>
</div>

<script>
    function removeBook(bookId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this book!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Here you can implement the logic to remove the book
                console.log("Removing book with ID: " + bookId);
            }
        });
    }
</script>

</body>
</html>
