<?php
// Assuming the session and database connection are already initialized
//echo '<pre>';
//var_dump($_SESSION);
//echo '</pre>';
// Check if the user is logged in and if their role is 2 (Admin)
if (!isset($_SESSION['userId']) || $_SESSION['role'] !== 2) {
    exit('Access denied.');
}
include '../private/conn_digidate_examen.php';

try {
    // Prepare the query to fetch users with roleId = 2 (Admins)
    $query = "SELECT firstName, middleName, lastName, email FROM users WHERE roleId = 2 and activated = 1";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are any results
    if (count($results) === 0) {
        echo "<tr><td colspan='5' class='py-3 px-4'>No admin users found.</td></tr>";
    } else {
        // Display users in a table
        foreach ($results as $row) {
            echo "<tr>";
            echo "<td class='py-3 px-4'>" . htmlspecialchars($row['firstName']) . "</td>";
            echo "<td class='py-3 px-4'>" . htmlspecialchars($row['middleName']) . "</td>";
            echo "<td class='py-3 px-4'>" . htmlspecialchars($row['lastName']) . "</td>";
            echo "<td class='py-3 px-4'>" . htmlspecialchars($row['email']) . "</td>";
            echo "</tr>";
        }
    }
} catch (PDOException $e) {
    echo "<tr><td colspan='5' class='py-3 px-4'>Error: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
}
?>
