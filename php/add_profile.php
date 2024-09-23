<?php
session_start();
require '../../private/conn_digidate_examen.php';

try {
    // Controleer of de gebruiker is ingelogd en de userId in de sessie aanwezig is
    if (!isset($_SESSION['userId'])) {
        throw new Exception("Gebruiker is niet ingelogd.");
    }

    // Haal de ingelogde userId op vanuit de sessie
    $userId = $_SESSION['userId'];

    // Begin transactie
    if ($conn->inTransaction() === false) {
        $conn->beginTransaction();
    }

    // Verwerk de profielfoto
    if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] == 0) {
        $profilePicture = file_get_contents($_FILES['profilePicture']['tmp_name']);
    } else {
        throw new Exception("Profielfoto uploaden mislukt.");
    }

    // Haal de andere formulierwaarden op
    $description = $_POST['description'];
    $genderPreference = $_POST['genderPreference'];
    $minAgePreference = $_POST['minAgePreference'];
    $maxAgePreference = $_POST['maxAgePreference'];
    $deletedAt = null;

    // Voeg het gebruikersprofiel in en sla FKuserId op (userId van ingelogde gebruiker)
    $sql = "INSERT INTO userProfiles (FKuserId, profilePicture, description, genderPreference, minAgePreference, maxAgePreference, deletedAt)
            VALUES (:FKuserId, :profilePicture, :description, :genderPreference, :minAgePreference, :maxAgePreference, :deletedAt)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':FKuserId', $userId);  // Koppel de ingelogde userId aan het profiel
    $stmt->bindParam(':profilePicture', $profilePicture, PDO::PARAM_LOB);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':genderPreference', $genderPreference);
    $stmt->bindParam(':minAgePreference', $minAgePreference);
    $stmt->bindParam(':maxAgePreference', $maxAgePreference);
    $stmt->bindParam(':deletedAt', $deletedAt, PDO::PARAM_NULL);
    $stmt->execute();

    // Haal het gegenereerde userProfileId op
    $userProfileId = $conn->lastInsertId();

    // Verwerk extra foto's
    if (!empty($_FILES['extraPhotos']['name'][0])) {
        $sql = "INSERT INTO userProfileImages (FKuserProfileId, image) VALUES (:FKuserProfileId, :image)";
        $stmt = $conn->prepare($sql);

        foreach ($_FILES['extraPhotos']['tmp_name'] as $key => $tmpName) {
            if ($_FILES['extraPhotos']['error'][$key] == 0) {
                $image = file_get_contents($tmpName);
                $stmt->bindParam(':FKuserProfileId', $userProfileId);
                $stmt->bindParam(':image', $image, PDO::PARAM_LOB);
                $stmt->execute();
            }
        }
    }

    // Commit transactie
    $conn->commit();

    echo "Nieuw gebruikersprofiel succesvol toegevoegd!";
} catch (Exception $e) {
    // Controleer of de transactie nog loopt en voer rollback uit als dat het geval is
    if ($conn->inTransaction()) {
        $conn->rollBack();
    }

    echo "Fout: " . $e->getMessage();
}
?>
