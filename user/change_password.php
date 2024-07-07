<?php
session_start();
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
		<h4 class="text-2xl font-bold mb-4">Change Student Password</h4><br>
		<div class="flex justify-center">
			<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
				<form action="../server/update_user_password.php" method="post">
					<div class="mb-4">
						<label for="old_password" class="block text-gray-700 font-bold">Enter Password:</label>
						<input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md" name="old_password">
					</div>
					<div class="mb-4">
						<label for="new_password" class="block text-gray-700 font-bold">Enter New Password:</label>
						<input type="password" name="new_password" class="w-full px-3 py-2 border border-gray-300 rounded-md">
					</div>
					<button type="submit" name="update" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Password</button>
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
    if (isset($_SESSION['error_message'])) {
        echo "toastr.error('" . $_SESSION['error_message'] . "');";
        unset($_SESSION['error_message']);
    }
    ?>
</script>

</body>
</html>
