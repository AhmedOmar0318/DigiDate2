<div class="container mx-auto p-4">
    <form class="bg-white shadow-lg rounded px-8 py-8 pt-8" method="post" action="php/view_admin.php">
        <h1 class="text-2xl font-bold mb-4">Admin Users</h1>
        <div class="text-right mb-4">
            <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                <a href="index.php?page=add_admin" class="text-white no-underline">Add Admin</a>
            </button>
        </div>
        <div class="w-full overflow-x-auto">
            <table class="w-full bg-white shadow-md rounded">
                <thead class="bg-gradient-to-r from-pink-500 to-purple-600 shadow-lg">
                <tr>
                    <th class="py-3 px-4 uppercase font-semibold text-sm w-1/4 text-left">Firstname</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm w-1/4 text-left">Middlename</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm w-1/4 text-left">Lastname</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm w-1/4 text-left">Email</th>
                </tr>
                </thead>
                <tbody>
                <!-- Include PHP script here to populate table rows -->
                <?php include 'php/view_admin.php'; ?>
                </tbody>
            </table>
        </div>
    </form>
</div>