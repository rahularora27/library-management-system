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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="bg-gray-100">

<?php include 'navbar.php'; ?>

<div class="flex justify-center items-center min-h-screen">
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mx-4">
		<div class="bg-white p-6 rounded-lg shadow-lg text-center">
			<div class="font-bold text-xl">Users</div>
			<p class="text-gray-700 font-bold text-3xl mb-4"><?php echo get_user_count(); ?></p>
			<a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="Regusers.php">Manage users</a>
	</div>

		<div class="bg-white p-6 rounded-lg shadow-lg text-center">
			<div class="font-bold text-xl">Books</div>
			<p class="text-gray-700 font-bold text-3xl mb-4"><?php echo get_book_count(); ?></p>
			<a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="manage_book.php">Manage Books</a>
	</div>

		<div class="bg-white p-6 rounded-lg shadow-lg text-center">
			<div class="font-bold text-xl">Categories</div>
			<p class="text-gray-700 font-bold text-3xl mb-4"><?php echo get_category_count(); ?></p>
			<a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="manage_cat.php">Manage Categories</a>
	</div>

		<div class="bg-white p-6 rounded-lg shadow-lg text-center">
			<div class="font-bold text-xl">Authors</div>
			<p class="text-gray-700 font-bold text-3xl mb-4"><?php echo get_author_count(); ?></p>
			<a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="manage_author.php">Manage Authors</a>
	</div>

		<div class="bg-white p-6 rounded-lg shadow-lg text-center">
			<div class="font-bold text-xl">Books Issued</div>
			<p class="text-gray-700 font-bold text-3xl mb-4"><?php echo get_issue_book_count(); ?></p>
			<a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="view_issued_book.php">View Issued Books</a>
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
