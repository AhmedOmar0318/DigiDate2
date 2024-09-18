<?php
// Start the session and include database connection
session_start();
include '../../private/conn_digidate_examen.php';

// Debugging: Check what session values are being set
if (!isset($_SESSION['userId'])) {
    exit('User is not logged in.');
}

if (!isset($_SESSION['roleId']) || $_SESSION['roleId'] !== 2) {
    exit('Access denied.');
}

// Check if the userId is provided via POST
if (!isset($_POST['userId'])) {
    exit('Invalid request.');
}
$userId = $_POST['userId'];

try {
    // Deactivate the existing user
    $query = "UPDATE users 
              SET activated = 0, deletedAt = NOW() 
              WHERE userId = :userId AND roleId = 2";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    // Get the email of the deactivated user
    $query = "SELECT email FROM users WHERE userId = :userId";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $email = $result['email'];
        // You can now use $email to manually add a new user if needed
        header('Location: ../index.php?page=view_admin&message=User deactivated successfully. Email: ' . urlencode($email));
        exit();
    } else {
        header('Location: ../index.php?page=view_admin.inc.php&error=No user found with the provided userId.');
        exit();
    }

} catch (PDOException $e) {
    // Error handling
    header('Location: admin_dashboard.php?error=' . urlencode("Error: " . $e->getMessage()));
    exit();
}
?>
