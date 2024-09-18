<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    require '../../private/conn_digidate_examen.php';
    $mailer = '../mailer/mailer.php';

    $dateOfBirth = new DateTime($_POST['dob']);
    $currentDate = new DateTime();
    $ageInterval = $currentDate->diff($dateOfBirth);

    if ($ageInterval->y < 18) {
        $_SESSION['error'] = 'Je moet 18 jaar of ouder zijn.';
        $_SESSION['data'] = $_POST;
        header('Location: ../index.php?page=register');
        exit();
    }
    if (strlen($_POST['password']) < 8 || !preg_match("/\d/", $_POST['password']) || !preg_match("/[A-Z]/", $_POST['password']) || !preg_match("/[a-z]/", $_POST['password']) || !preg_match("/\W/", $_POST['password'])) {
        $_SESSION['error'] = 'Wachtwoord voldoet niet aan vereisten.';
        $_SESSION['data'] = $_POST;
        header('Location: ../index.php?page=register');
        exit();
    }

    $sql = "SELECT email FROM users WHERE email = :email";
    $query = $conn->prepare($sql);
    $query->bindParam(':email', $_POST['email']);
    $query->execute();


    $hashedpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($query->rowCount() == 0) {
        $stmt = $conn->prepare("INSERT INTO users (firstname, middlename, lastname, email, password, phonenumber, dob, study, gender,preferredGender, residence, roleId, deletedAt)
            VALUES(:firstName, :middleName, :lastName, :email, :password, :phonenumber, :dob, :study, :gender,:preferredGender, :residence, :roleId, :deletedAt)");

        $stmt->execute([
            ':firstName' => $_POST['firstName'],
            ':middleName' => $_POST['middleName'],
            ':lastName' => $_POST['lastName'],
            ':email' => $_POST['email'],
            ':password' => $hashedpassword,
            ':phonenumber' => $_POST['phonenumber'],
            ':dob' => $_POST['dob'],
            ':study' => $_POST['study'],
            ':gender' => $_POST['gender'],
            ':preferredGender' => $_POST['preferredGender'],
            ':residence' => $_POST['residence'],
            ':roleId' => 1,
            ':deletedAt' => null
        ]);

        $_SESSION['role'] = 1;
        $_SESSION['userId'] = $conn->lastInsertId();

        $_SESSION['mailCode'] = 'activateAccount';
        header('location: ../php/send_login_code.php');
        exit();
    } else {

        $_SESSION['error'] = 'Email bestaat al.';
        $_SESSION['data'] = $_POST;
        header('Location: ../index.php?page=register');
        exit();
    }

} else {
    header('Location: ../index.php?page=register');
    exit();
}


