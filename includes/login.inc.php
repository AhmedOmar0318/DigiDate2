<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="w-full max-w-md">
    <form class="bg-white shadow-lg rounded px-8 py-8 pt-8" method="post" action="php/login.php">
        <h2 class="text-2xl font-bold mb-6 text-center text-purple-600">Login</h2>


        <?php session_start();
        if (isset($_SESSION['error'])) { ?>
            <div role="alert" class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Fout! <?= $_SESSION['error'] ?></span>
            </div>
            <?php unset($_SESSION['error']);
        }
        ?>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" placeholder="Email"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500">
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Wachtwoord</label>
            <input type="password" name="password" id="password" placeholder="Wachtwoord"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500">
        </div>

        <div class="flex items-center justify-between">
            <button
                    class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                Log In
            </button>

            <a class="inline-block align-baseline font-bold text-sm text-purple-600 hover:text-purple-700" href="#">
                Wachtwoord vergeten?
            </a>
        </div>
    </form>
</div>

</body>
</html>

