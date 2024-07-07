<nav class="absolute w-full bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <img src="../assets/books.png" alt="Logo" class="h-8">
        <ul class="flex space-x-4">
            <li class="relative">
                <a id="accountLink" class="text-white hover:text-gray-300 text-lg mr-12 cursor-pointer">Account</a>
                <ul id="dropdownMenu" class="absolute bg-white text-gray-700 shadow-md mt-1 hidden">
                    <li><a class="block px-4 py-2 hover:bg-gray-200" href="view_profile.php">View Profile</a></li>
                    <li><a class="block px-4 py-2 hover:bg-gray-200" href="change_password.php">Change Password</a></li>
                    <li><a class="block px-4 py-2 hover:bg-gray-200" href="../server/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accountLink = document.getElementById('accountLink');
        const dropdownMenu = document.getElementById('dropdownMenu');

        accountLink.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function(event) {
            if (!accountLink.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>
