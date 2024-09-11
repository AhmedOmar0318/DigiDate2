<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

<div class="w-full max-w-3xl p-4">
    <form class="bg-white shadow-lg rounded px-8 py-6" action="php/register.inc.php" method="post">
        <h2 class="text-2xl font-bold mb-6 text-center text-purple-600">Register</h2>

        <!-- Two-column grid for form fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- First column -->
            <div>
                <label for="firstname" class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
                <input type="text" id="firstname" placeholder="Enter your first name"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500">
            </div>

            <div>
                <label for="middlename" class="block text-gray-700 text-sm font-bold mb-2">Middle Name</label>
                <input type="text" id="middlename" placeholder="Enter your middle name"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500">
            </div>

            <div>
                <label for="lastname" class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
                <input type="text" id="lastname" placeholder="Enter your last name"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500">
            </div>

            <div>
                <label for="residence" class="block text-gray-700 text-sm font-bold mb-2">Residence</label>
                <input type="text" id="residence" placeholder="Enter your residence"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500">
            </div>

            <div>
                <label for="phonenumber" class="block text-gray-700 text-sm font-bold mb-2">Phone Number</label>
                <input type="text" id="phonenumber" placeholder="Enter your phone number"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500">
            </div>

            <div>
                <label for="dob" class="block text-gray-700 text-sm font-bold mb-2">Date of Birth</label>
                <input type="date" id="dob"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500">
            </div>

            <!-- Second column -->
            <div>
                <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Gender</label>
                <select id="gender" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500">
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div>
                <label for="profile_picture" class="block text-gray-700 text-sm font-bold mb-2">Profile Picture</label>
                <input type="file" id="profile_picture"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500">
            </div>

            <div>
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" id="email" placeholder="Enter your email"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500">
            </div>

            <div>
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" id="password" placeholder="Enter your password"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500">
            </div>
        </div>

        <!-- Submit button -->
        <div class="flex items-center justify-center mt-6">
            <button
                class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Register
            </button>
        </div>
    </form>
</div>

</body>
</html>
