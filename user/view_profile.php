<?php
session_start();

// Database connection
$connection = mysqli_connect("localhost", "root", "", "lms");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = "";
$email = "";
$mobile = "";

// Validate session email to prevent SQL injection
if (isset($_SESSION['email'])) {
    $email = mysqli_real_escape_string($connection, $_SESSION['email']);

    // Query to fetch user details
    $query = "SELECT * FROM users WHERE email = '$email'";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $row = mysqli_fetch_assoc($query_run);
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
    } else {
        echo "User not found";
    }
} else {
    echo "Session email not set";
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Profile Detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="bg-gray-100">

    <?php include 'navbar.php'; // Assuming navbar.php contains your navigation ?>

    <div class="flex flex-col justify-center items-center min-h-screen">
        <h4 class="text-2xl font-bold mb-4">Student Profile Detail</h4>
        <div class="flex justify-center">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <form class="flex flex-col">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold">Name:</label>
                        <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="<?php echo htmlspecialchars($name); ?>" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold">Email:</label>
                        <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="<?php echo htmlspecialchars($email); ?>" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="mobile" class="block text-gray-700 font-bold">Mobile:</label>
                        <input type="text" id="mobile" name="mobile" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="<?php echo htmlspecialchars($mobile); ?>" readonly>
                    </div>
                    <a href="edit_profile.php" class="bg-blue-500 text-white px-4 py-2 rounded-md text-center">Edit Profile</a>
                </form>
            </div>
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
