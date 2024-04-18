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

<div class="center">
    <button id="openModalButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add a new Author</button>
</div>

<div id="myModal" class="modal hidden fixed inset-0 z-50 overflow-auto bg-gray-700 bg-opacity-75 flex justify-center items-center">
    <div class="modal-content bg-white w-1/2 p-6 rounded-lg">
        <div class="modal-header">
            <span class="modal-close cursor-pointer z-50">
                &times;
            </span>
        </div>
        <div class="modal-body">
            <div class="form-container bg-white p-8 rounded shadow-lg">
                <form action="../server/addAuthor.php" method="post" class="flex flex-col gap-4 w-72">
                    <label for="name" class="text-gray-700">Author Name:</label>
                    <input type="text" id="name" name="name" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-blue-500">
                    <div class="buttons-container flex justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto mt-8">
    <?php
    // Connect to the database
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lms";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch authors with the count of books by each author
    $sql = "SELECT authors.id, authors.name, COUNT(books.id) AS num_books 
            FROM authors 
            LEFT JOIN books ON authors.id = books.author_id 
            GROUP BY authors.id";
    $result = mysqli_query($conn, $sql);
    ?>

    <table class="w-full border-collapse border border-gray-200">
        <thead>
        <tr class="bg-green-500 text-white">
            <th class="p-4 text-left">Author Name</th>
            <th class="p-4 text-left">Number of Books</th>
            <th class="p-4 text-left">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr class="border-b border-gray-200">
                <td class="p-4"><?php echo $row["name"]; ?></td>
                <td class="p-4"><?php echo $row["num_books"]; ?></td>
                <td class="p-4">
                    <button onclick="removeAuthor(<?php echo $row['id']; ?>)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Remove
                    </button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php mysqli_close($conn); ?>
</div>

<script>
    function removeAuthor(authorId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this author!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Here you can make an AJAX request to delete the author from the database
                // After successful deletion, you can remove the row from the table
                Swal.fire(
                    'Deleted!',
                    'Your author has been deleted.',
                    'success'
                );
            }
        });
    }
</script>

<script src="../utils/Modal.js"></script>

</body>
</html>
