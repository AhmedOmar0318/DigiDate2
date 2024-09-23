<?php
require '../private/conn_digidate_examen.php';

// Check if the user is logged in
if (!isset($_SESSION['userId'])) {
    exit();
}

$userId = $_SESSION['userId'];

// Query to fetch profile data and profile picture
$query = "SELECT u.firstName, u.middleName, u.lastName, up.description, up.profilePicture, up.genderPreference, up.minAgePreference, up.maxAgePreference, upi.image 
          FROM userProfiles up
          LEFT JOIN users u ON up.FKuserId = u.userId
          LEFT JOIN userProfileImages upi ON up.userProfileId = upi.FKuserProfileId
          WHERE up.FKuserId = :userId AND up.deletedAt IS NULL";
$stmt = $conn->prepare($query);
$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
$stmt->execute();

// Check if a profile was found


$userProfile = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$userProfile) {
    echo "Geen profiel gevonden.";
    exit();
}

$profileData = [
    'firstName' => $userProfile['firstName'],
    'middleName' => $userProfile['middleName'],
    'lastName' => $userProfile['lastName'],
    'description' => $userProfile['description'],
    'profilePicture' => base64_encode($userProfile['profilePicture']),
    'genderPreference' => $userProfile['genderPreference'],
    'minAgePreference' => $userProfile['minAgePreference'],
    'maxAgePreference' => $userProfile['maxAgePreference'],
    'image' => $userProfile['image'] ? base64_encode($userProfile['image']) : null
];

?>

<div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">

    <!-- Profile picture -->
    <div class="flex justify-center">
        <img class="w-32 h-32 rounded-full border-4 border-pink-500 object-cover"
             src="data:image/jpeg;base64,<?= $profileData['profilePicture'] ?>" alt="Profiel Foto">
    </div>

    <!-- Name and basic info -->
    <div class="text-center mt-4">
        <h2 class="text-2xl font-bold text-gray-800">
            <?= $profileData['firstName'] ?> <?= $profileData['middleName'] ?> <?= $profileData['lastName'] ?>
        </h2>
        <p class="text-gray-600">Voorkeur: <?= $profileData['genderPreference'] ?></p>
        <p class="text-gray-600">Leeftijdsvoorkeur: <?= $profileData['minAgePreference'] ?> - <?= $profileData['maxAgePreference'] ?></p>
    </div>

    <!-- Short bio -->
    <div class="mt-4 text-center">
        <p class="text-gray-700"><?= $profileData['description'] ?></p>
    </div>

    <!-- Extra image (if available) -->
    <?php if ($profileData['image']): ?>
        <div class="mt-6 text-center">
            <img class="w-64 h-64 object-cover mx-auto" src="data:image/jpeg;base64,<?= $profileData['image'] ?>" alt="Extra afbeelding">
        </div>
    <?php endif; ?>

    <!-- Actions: buttons to chat or like -->
    <div class="mt-8 flex justify-center space-x-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Bericht sturen</button>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Like profiel</button>
    </div>
</div>
