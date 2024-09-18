<?php
// Assuming the session and database connection are already initialized
include '../private/conn_digidate_examen.php';

// Check if the user is logged in and if their role is 2 (Admin)
if (!isset($_SESSION['userId']) || $_SESSION['role'] !== 2) {
    exit('Access denied.');
}

try {
    // Prepare the query to fetch users with roleId = 2 (Admins)
    $query = "SELECT userId, firstName, middleName, lastName, email FROM users WHERE roleId = 2 AND activated = 1";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are any results
    if (count($results) === 0) {
        echo "<tr><td colspan='4' class='py-3 px-4 text-center'>No admin users found.</td></tr>";
    } else {
        foreach ($results as $row) {
            if ($_SESSION['userId'] == $row['userId']) {
                continue;
            }
            echo "<tr class='hover:bg-gray-100'>";
            echo "<td class='py-3 px-4 border-b border-gray-200 w-1/4'>" . htmlspecialchars($row['firstName']) . "</td>";
            echo "<td class='py-3 px-4 border-b border-gray-200 w-1/4'>" . htmlspecialchars($row['middleName']) . "</td>";
            echo "<td class='py-3 px-4 border-b border-gray-200 w-1/4'>" . htmlspecialchars($row['lastName']) . "</td>";
            echo "<td class='py-3 px-4 border-b border-gray-200 w-1/4'>" . htmlspecialchars($row['email']) . "</td>";
            echo "</tr>";
        }
    }
} catch (PDOException $e) {
    echo "<tr><td colspan='4' class='py-3 px-4 text-center text-red-500'>";
    echo "Error: " . htmlspecialchars($e->getMessage());
    echo "</td></tr>";
}
?>