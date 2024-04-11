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

<br/><br/><br/><br/>

<div class="container mx-auto">
    <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lms";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    ?>

    <table class="w-full border-collapse border border-gray-200">
        <thead>
        <tr class="bg-green-500 text-white">
            <th class="p-4 text-left">ID</th>
            <th class="p-4 text-left">Name</th>
            <th class="p-4 text-left">Email</th>
            <th class="p-4 text-left">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr class="border-b border-gray-200">
                <td class="p-4"><?php echo $row["id"]; ?></td>
                <td class="p-4"><?php echo $row["name"]; ?></td>
                <td class="p-4"><?php echo $row["email"]; ?></td>
                <td class="p-4">
                    <button onclick="confirmRemoveUser(<?php echo $row['id']; ?>)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Remove</button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php mysqli_close($conn); ?>
</div>

<script>
    function confirmRemoveUser(userId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this user!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                removeUser(userId);
            }
        });
    }

    function removeUser(userId) {
        // Here you can implement the logic to remove the user
        // For example, you can make an AJAX request to delete the user from the database
        // After successful deletion, you can remove the row from the table
        console.log('Remove user with ID: ' + userId);
    }
</script>

</body>
</html>
