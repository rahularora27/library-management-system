<?php
session_start();

// Database connection
$connection = mysqli_connect("localhost", "root", "", "lms");
if ($connection === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$book_name = "";
$author = "";
$book_no = "";

if (isset($_SESSION['id'])) {
    $student_id = $_SESSION['id'];
    $query = "SELECT book_name, book_author, book_no FROM issued_books WHERE student_id = ? AND status = 1";

    // Prepare statement
    if ($stmt = mysqli_prepare($connection, $query)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $student_id);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issued Books</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <?php include 'navbar.php'; ?>

    <div class="flex flex-col justify-center items-center h-96">
        <h4 class="text-2xl font-bold mb-4">Issued Book Details</h4>
        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-2 px-4">Name</th>
                            <th class="py-2 px-4">Author</th>
                            <th class="py-2 px-4">Number</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 text-center">
                    <?php
                    if (isset($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr class="border-b">
                            <td class="py-2 px-4"><?php echo htmlspecialchars($row['book_name']); ?></td>
                            <td class="py-2 px-4"><?php echo htmlspecialchars($row['book_author']); ?></td>
                            <td class="py-2 px-4"><?php echo htmlspecialchars($row['book_no']); ?></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// Close statement and connection
if (isset($stmt)) {
    mysqli_stmt_close($stmt);
}
mysqli_close($connection);
?>
