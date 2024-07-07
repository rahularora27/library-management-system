<?php
session_start();

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");

$name = "";
$email = "";
$mobile = "";

$query = "SELECT * FROM users WHERE email = '$_SESSION[email]'";
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
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="bg-gray-100">

<?php include 'navbar.php'; ?>

<div class="flex flex-col justify-center items-center min-h-screen">
	<h4 class="text-2xl font-bold mb-4">Edit Profile</h4>
	<div class="flex justify-center">
		<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
			<form action="../server/update_user_profile.php" method="post" class="flex flex-col">
				<div class="mb-4">
					<label for="name" class="block text-gray-700 font-bold">Name:</label>
					<input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md" name="name" value="<?php echo $name; ?>">
				</div>
				<div class="mb-4">
					<label for="email" class="block text-gray-700 font-bold">Email:</label>
					<input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md" name="email" value="<?php echo $email; ?>">
				</div>
				<div class="mb-4">
					<label for="mobile" class="block text-gray-700 font-bold">Mobile:</label>
					<input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md" name="mobile" value="<?php echo $mobile; ?>">
				</div>
				<button type="submit" name="update" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update</button>
				<a href="view_profile.php" class="mt-2 bg-red-500 text-white px-4 py-2 rounded-md text-center">Cancel</a>
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
    if (isset($_SESSION['error_message'])) {
        echo "toastr.error('" . $_SESSION['error_message'] . "');";
        unset($_SESSION['error_message']);
    }
    ?>
</script>

</body>
</html>
