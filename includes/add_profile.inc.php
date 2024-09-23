<div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Add Profile</h2>
    <form action="php/add_profile.php" method="POST" enctype="multipart/form-data">

        <div class="mb-4">
            <label for="profilePicture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
            <input type="file" id="profilePicture" name="profilePicture" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Container for extra photo upload fields -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Extra Photos</label>
            <div class="flex space-x-2 mt-2">
                <input type="file" id="extraPhoto1" name="extraPhotos[]" class="block w-1/5 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <input type="file" id="extraPhoto2" name="extraPhotos[]" class="block w-1/5 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <input type="file" id="extraPhoto3" name="extraPhotos[]" class="block w-1/5 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <input type="file" id="extraPhoto4" name="extraPhotos[]" class="block w-1/5 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <input type="file" id="extraPhoto5" name="extraPhotos[]" class="block w-1/5 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
        </div>

        <div class="mb-4">
            <label for="genderPreference" class="block text-sm font-medium text-gray-700">Gender Preference</label>
            <select id="genderPreference" name="genderPreference" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="minAgePreference" class="block text-sm font-medium text-gray-700">Minimum Age Preference</label>
            <input type="number" id="minAgePreference" name="minAgePreference" min="18" max="99" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="mb-4">
            <label for="maxAgePreference" class="block text-sm font-medium text-gray-700">Maximum Age Preference</label>
            <input type="number" id="maxAgePreference" name="maxAgePreference" min="18" max="99" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add Profile</button>
        </div>
    </form>
</div>