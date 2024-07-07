<?php
    require("functions.php");
    session_start();
    # Fetch data from the database
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $name = "";
    $email = "";
    $mobile = "";
    $query = "SELECT * FROM admins WHERE email = '$_SESSION[email]'";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <?php include 'navbar.php'; ?>

    <div class="container mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold">Admin Profile Detail</h1>
            <p class="text-gray-600">Here are the details of your admin profile.</p>
        </div>
        <div class="flex justify-center">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <form>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                        <input type="text" id="name" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="<?php echo $name; ?>" disabled>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                        <input type="text" id="email" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="<?php echo $email; ?>" disabled>
                    </div>
                    <div class="mb-4">
                        <label for="mobile" class="block text-gray-700 font-bold mb-2">Mobile:</label>
                        <input type="text" id="mobile" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="<?php echo $mobile; ?>" disabled>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const profileMenu = document.querySelector('li.relative');
            profileMenu.addEventListener('mouseenter', function() {
                this.querySelector('ul').classList.remove('hidden');
            });
            profileMenu.addEventListener('mouseleave', function() {
                this.querySelector('ul').classList.add('hidden');
            });
        });
    </script>
</body>
</html>
