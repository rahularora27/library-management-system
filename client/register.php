<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipal Library</title>
    <link rel="icon" href="../assets/images/manipal.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<!-- REGISTRATION FORM -->
<div class="flex items-center justify-evenly h-screen">
    <div class="hidden md:block image-container">
        <img src="../assets/images/Manipal Library.png" alt="Registration Image" class="h-80 w-80">
    </div>
    <div class="form-container bg-white p-8 rounded shadow-lg">
        <form action="../server/register.php" method="post" class="flex flex-col gap-4 w-72">
            <label for="name" class="text-gray-700">Name:</label>
            <input type="text" id="name" name="name" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-blue-500">

            <label for="email" class="text-gray-700">Email ID:</label>
            <input type="email" id="email" name="email" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-blue-500">

            <label for="password" class="text-gray-700">Password:</label>
            <input type="password" id="password" name="password" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-blue-500">

            <div class="buttons-container flex justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Register
                </button>
                <button type="reset" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Reset
                </button>
            </div>
            <div class="flex gap-x-2">
                <p>Already a User?</p>
                <a href="login.php" class="text-blue-500 hover:underline">Login here</a>
            </div>    
        </form>
    </div>
</div>
<!-- REGISTRATION FORM -->

</body>
</html>
