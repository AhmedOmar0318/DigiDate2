<?php

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    exit;
}

$query = "SELECT firstName, middleName, lastName, email, password,role FROM users WHERE role = 1 ";

$stmt = $conn->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row): ?>
    <tr>
        <td class="py-3 px-4"><?php echo htmlspecialchars($row['firstName']); ?></td>
        <td class="py-3 px-4"><?php echo htmlspecialchars($row['middleName']); ?></td>
        <td class="py-3 px-4"><?php echo htmlspecialchars($row['lastName']); ?></td>
        <td class="py-3 px-4"><?php echo htmlspecialchars($row['email']); ?></td>
        <td class="py-3 px-4"><?php echo htmlspecialchars($row['password']); ?></td>
    </tr>
<?php endforeach; ?>


