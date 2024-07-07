<?php
	session_start();
	// Fetch data from the database
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "lms");
	$query = "SELECT issued_books.book_name, issued_books.book_author, issued_books.book_no, users.name FROM issued_books LEFT JOIN users ON issued_books.student_id = users.id WHERE issued_books.status = 1";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Issued Books</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

	<?php include 'navbar.php'; ?>

<div class="flex justify-center items-center min-h-screen">
	<div class="container mx-auto mt-10">
		<div class="text-center mb-8">
			<h1 class="text-3xl font-bold">Issued Book Details</h1>
		</div>
		<div class="flex justify-center">
			<div class="overflow-x-auto">
				<table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
					<thead class="bg-gray-200">
						<tr>
							<th class="py-3 px-6 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Name</th>
							<th class="py-3 px-6 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Author</th>
							<th class="py-3 px-6 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Number</th>
							<th class="py-3 px-6 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Student Name</th>
						</tr>
					</thead>
					<tbody class="bg-white">
						<?php
							$query_run = mysqli_query($connection, $query);
							while ($row = mysqli_fetch_assoc($query_run)) {
								echo "<tr class='hover:bg-gray-100'>";
								echo "<td class='py-4 px-6 border-b border-gray-200 text-sm'>{$row['book_name']}</td>";
								echo "<td class='py-4 px-6 border-b border-gray-200 text-sm'>{$row['book_author']}</td>";
								echo "<td class='py-4 px-6 border-b border-gray-200 text-sm'>{$row['book_no']}</td>";
								echo "<td class='py-4 px-6 border-b border-gray-200 text-sm'>{$row['name']}</td>";
								echo "</tr>";
							}
						?>	
					</tbody>
				</table>
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
