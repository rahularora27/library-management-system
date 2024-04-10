<nav class="bg-gray-800 p-4">
    <div class="flex items-center justify-between">
        <div class="logo mr-4">
            <img src="../assets/images/books.png" alt="Logo" class="h-8">
        </div>
        <div class="dropdown relative">
            <!-- Add an ID to the button -->
            <button id="dropdownBtn" class="dropbtn bg-gray-700 text-white px-4 py-2 rounded">Welcome, <?php echo $name; ?></button>
            <div id="dropdownContent" class="dropdown-content hidden absolute bg-white shadow-md z-10">
                <a href="edit_profile.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Edit Profile</a>
                <a href="change_password.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Change Password</a>
                <a href="../server/logout.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a>
            </div>
        </div>
    </div>
</nav>

<script>
    // JavaScript to toggle dropdown visibility
    document.addEventListener("DOMContentLoaded", function () {
        const dropdownBtn = document.getElementById("dropdownBtn");
        const dropdownContent = document.getElementById("dropdownContent");

        dropdownBtn.addEventListener("click", function () {
            dropdownContent.classList.toggle("hidden");
        });

        // Close the dropdown when clicking outside of it
        window.addEventListener("click", function (event) {
            if (!event.target.matches('#dropdownBtn')) {
                if (!dropdownContent.classList.contains('hidden')) {
                    dropdownContent.classList.add('hidden');
                }
            }
        });
    });
</script>
