<?php
session_start();

function get_user_issue_book_count()
{
    // Check if user id is set in session
    if (!isset($_SESSION['id'])) {
        return 0;
    }

    $connection = mysqli_connect("localhost", "root", "", "lms");
    if ($connection === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $user_issue_book_count = 0;
    $student_id = $_SESSION['id'];
    $query = "SELECT COUNT(*) AS user_issue_book_count FROM issued_books WHERE student_id = ?";

    // Prepare statement
    if ($stmt = mysqli_prepare($connection, $query)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $student_id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $user_issue_book_count);

            // Fetch value
            mysqli_stmt_fetch($stmt);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($connection);

    return $user_issue_book_count;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="bg-gray-100">

    <?php include 'navbar.php'; ?>

    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96 text-center">
            <div class="font-bold text-xl">Books Issued</div>
            <p class="text-gray-700 font-bold text-3xl mb-4"><?php echo get_user_issue_book_count(); ?></p>
            <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="view_issued_book.php">View Issued Books</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        <?php
        if (isset($_SESSION['success_message'])) {
            echo "toastr.success('" . $_SESSION['success_message'] . "');";
            unset($_SESSION['success_message']);
        }
        ?>
    </script>
</body>

</html>
