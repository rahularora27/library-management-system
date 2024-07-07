<?php
	require("functions.php");
	session_start();
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
			<h1 class="text-3xl font-bold">Change Admin Password</h1>
			<p class="text-gray-600">Update your password below.</p>
		</div>
		<div class="flex justify-center">
			<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
				<form action="update_password.php" method="post">
					<div class="mb-4">
						<label for="old_password" class="block text-gray-700 font-bold mb-2">Enter Current Password:</label>
						<input type="password" id="old_password" name="old_password" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
					</div>
					<div class="mb-4">
						<label for="new_password" class="block text-gray-700 font-bold mb-2">Enter New Password:</label>
						<input type="password" id="new_password" name="new_password" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
					</div>
					<button type="submit" name="update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Password</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
