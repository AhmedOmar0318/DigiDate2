<div class="w-full max-w-3xl p-4 mx-auto">
    <form class="bg-white shadow-lg rounded-lg px-8 py-6" action="php/register.php" method="post">
        <h2 class="text-3xl font-extrabold mb-6 text-center text-purple-600">Registreren</h2>


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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


            <div class="mb-4">
                <label for="firstname" class="block text-gray-800 text-sm font-semibold mb-2">Voornaam</label>
                <input type="text" name="firstName" id="firstname" placeholder="Voer uw voornaam in"
                       class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
            </div>

            <div class="mb-4">
                <label for="middlename" class="block text-gray-800 text-sm font-semibold mb-2">Tussenvoegsel</label>
                <input type="text" name="middleName" id="middlename" placeholder="Voer uw tussenvoegsel in"
                       class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
            </div>

            <div class="mb-4">
                <label for="lastname" class="block text-gray-800 text-sm font-semibold mb-2">Achternaam</label>
                <input type="text" name="lastName" id="lastname" placeholder="Voer uw achternaam in"
                       class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
            </div>

            <div class="mb-4">
                <label for="residence" class="block text-gray-800 text-sm font-semibold mb-2">Studie</label>
                <input type="text" name="study" id="residence" placeholder="Voer uw woonplaats in"
                       class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
            </div>

            <div class="mb-4">
                <label for="residence" class="block text-gray-800 text-sm font-semibold mb-2">Woonplaats</label>
                <input type="text" name="residence" id="residence" placeholder="Voer uw woonplaats in"
                       class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
            </div>

            <div class="mb-4">
                <label for="phonenumber" class="block text-gray-800 text-sm font-semibold mb-2">Telefoonnummer</label>
                <input type="number" name="phonenumber" id="phonenumber" placeholder="Voer uw telefoonnummer in"
                       class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
            </div>

            <div class="mb-4">
                <label for="dob" class="block text-gray-800 text-sm font-semibold mb-2">Geboortedatum</label>
                <input type="date" name="dob" id="dob"
                       class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
            </div>

            <div class="mb-4">
                <label for="gender" class="block text-gray-800 text-sm font-semibold mb-2">Geslacht</label>
                <select id="gender" name="gender"
                        class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <option value="" disabled selected>Selecteer uw geslacht</option>
                    <option value="male">Man</option>
                    <option value="female">Vrouw</option>
                </select>
            </div>


            <div class="mb-4">
                <label for="gender" class="block text-gray-800 text-sm font-semibold mb-2">Voorkeur geslacht</label>
                <select id="gender" name="preferredGender"
                        class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <option value="" disabled selected>Selecteer uw geslacht</option>
                    <option value="male">Man</option>
                    <option value="female">Vrouw</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="profile_picture" class="block text-gray-800 text-sm font-semibold mb-2">Profielfoto</label>
                <input type="file" name="pfp" id="profile_picture"
                       class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-800 text-sm font-semibold mb-2">E-mailadres</label>
                <input type="email" name="email" id="email" placeholder="Voer uw e-mailadres in"
                       class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
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


        <div class="flex items-center justify-center mt-6">
            <button
                    class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                    type="submit">
                Register
            </button>
        </div>
    </form>
</div>
