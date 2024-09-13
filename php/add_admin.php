<?php
session_start();
require '../private/conn_digidate_examen.php';

function validatePassword($password) {
    return strlen($password) >= 8 &&
        preg_match("/\d/", $password) &&
        preg_match("/[A-Z]/", $password) &&
        preg_match("/[a-z]/", $password) &&
        preg_match("/\W/", $password);
}
test
if (!validatePassword($_POST['password'])) {
    $_SESSION['error'] = 'Wachtwoord voldoet niet aan vereisten.';
    $_SESSION['data'] = $_POST;
    header('Location: ../index.php?page=register');
    exit();
}

$hashedpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query = $conn->prepare("SELECT * FROM users WHERE email = :email");
$query->execute([':email' => $_POST['email']]);

if ($query->rowCount() == 0) {
    $stmt = $conn->prepare("INSERT INTO users (firstname, middlename, lastname, email, password, role)
            VALUES(:firstName, :middleName, :lastName, :email, :password, :role)");

    try {
        $stmt->execute([
            ':firstName' => $_POST['firstName'],
            ':middleName' => $_POST['middleName'],
            ':lastName' => $_POST['lastName'],
            ':email' => $_POST['email'],
            ':password' => $hashedpassword,
            ':role' => 1,
        ]);

        $_SESSION['role'] = 1;
        $_SESSION['userid'] = $conn->lastInsertId();

        header('Location: ../index.php?page=view_admin');
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Error: ' . $e->getMessage();
        header('Location: ../index.php?page=add_admin');
        exit();
    }
} else {
    $_SESSION['error'] = 'Email bestaat al.';
    $_SESSION['data'] = $_POST;
    header('Location: ../index.php?page=add_admin');
    exit();
}
?>
