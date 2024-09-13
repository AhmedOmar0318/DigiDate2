<div class="w-full max-w-3xl p-4 mx-auto">
    <form class="bg-white shadow-lg rounded-lg px-8 py-6" action="php/register.php" method="post">
        <h2 class="text-3xl font-extrabold mb-6 text-center text-purple-600">Registreren</h2>

<main class="bg-pink-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="px-6 py-8 sm:p-10">
            <h2 class="text-center text-4xl font-extrabold text-gray-900 mb-8">
                Start je <span class="text-pink-600">Liefdesverhaal</span>
            </h2>
            <form action="php/register.php" method="post" enctype="multipart/form-data" class="space-y-6">
                <?php
                if (isset($_SESSION['error'])) {
                    echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                        <p>' . $_SESSION['error'] . '</p>
                    </div>';
                    unset($_SESSION['error']);
                }
                ?>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                    <div>
                        <label for="firstname" class="block text-sm font-medium text-gray-700">Voornaam</label>
                        <input type="text" name="firstName" id="firstname" required
                               class="mt-1 focus:ring-pink-500 focus:border-pink-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="middlename" class="block text-sm font-medium text-gray-700">Tussenvoegsel</label>
                        <input type="text" name="middleName" id="middlename"
                               class="mt-1 focus:ring-pink-500 focus:border-pink-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="lastname" class="block text-sm font-medium text-gray-700">Achternaam</label>
                        <input type="text" name="lastName" id="lastname" required
                               class="mt-1 focus:ring-pink-500 focus:border-pink-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">E-mailadres</label>
                        <input type="email" name="email" id="email" required
                               class="mt-1 focus:ring-pink-500 focus:border-pink-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Telefoonnummer</label>
                        <input type="tel" name="phone" id="phone" required
                               class="mt-1 focus:ring-pink-500 focus:border-pink-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">Wachtwoord</label>
                        <input type="password" name="password" id="password" required
                               class="mt-1 focus:ring-pink-500 focus:border-pink-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">Woonplaats</label>
                        <input type="text" name="city" id="city" required
                               class="mt-1 focus:ring-pink-500 focus:border-pink-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="study" class="block text-sm font-medium text-gray-700">Studie</label>
                        <input type="text" name="study" id="study"
                               class="mt-1 focus:ring-pink-500 focus:border-pink-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="dob" class="block text-sm font-medium text-gray-700">Geboortedatum</label>
                        <input type="date" name="dob" id="dob" required
                               class="mt-1 focus:ring-pink-500 focus:border-pink-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700">Geslacht</label>
                        <select id="gender" name="gender" required
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                            <option value="" disabled selected>Selecteer</option>
                            <option value="male">Man</option>
                            <option value="female">Vrouw</option>
                        </select>
                    </div>
                    <div>
                        <label for="preferredGender" class="block text-sm font-medium text-gray-700">Voorkeur
                            geslacht</label>
                        <select id="preferredGender" name="preferredGender" required
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                            <option value="" disabled selected>Selecteer</option>
                            <option value="male">Man</option>
                            <option value="female">Vrouw</option>
                            <option value="both">Beide</option>
                        </select>
                    </div>
                </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-800 text-sm font-semibold mb-2">Wachtwoord</label>
                <input type="password" name="password" id="password" placeholder="Voer uw wachtwoord in"
                       class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
            </div><br>

            <div class="requirements mb-2" id="passwordlength" style="color: white">
                <small>Wachtwoord moet minimaal 8 tekens bevatten.</small>
            </div>
            <div class="requirements mb-2" id="passwordCapitalLetter" style="color: white">
                <small>Wachtwoord moet 1 hoofdletter bevatten.</small>
            </div>
            <div class="requirements mb-2" id="passwordSmallLetter" style="color: white">
                <small>Wachtwoord moet 1 kleine letter bevatten.</small>
            </div>
            <div class="requirements mb-2" id="passwordNumber" style="color: white">
                <small>Wachtwoord moet 1 nummer bevatten.</small>
            </div>
            <div class="requirements mb-2" id="passwordSpecialCharacter" style="color: white">
                <small>Wachtwoord moet 1 speciaal teken bevatten.</small>
            </div>
        </div>

                <div class="mt-8">
                    <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition duration-150 ease-in-out">
                        Start je liefdesverhaal
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>