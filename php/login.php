<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    require '../private/conn_digidate_examen.php';
    $email = $_POST['email'];
    $password = $_POST['password'];


    $checkUser = $conn->prepare("SELECT activated,userId,password,email,role FROM users WHERE email = :email");
    $checkUser->execute(array(':email' => $email));

    if ($checkUser->rowCount() > 0) {
        $userData = $checkUser->fetch(PDO::FETCH_ASSOC);
        if ($userData['activated'] == '1') {
            if (password_verify($password, $userData['password'])) {
                $_SESSION['userId'] = $userData['userId'];
                $_SESSION['role'] = $userData['role'];


                header('Location: ../index.php?page=home_page');
                exit();
            } else {


                $_SESSION['error'] = "Email of wachtwoord is incorrect. ";
                header('Location: ../index.php?page=login');
                exit();
            }
        } else {

            $_SESSION['error'] = "Email of wachtwoord is incorrect. ";
            header('Location: ../index.php?page=login');
            exit();
        }

    } else {


        $_SESSION['error'] = "Email of wachtwoord is incorrect. ";
        header('Location: ../index.php?page=login');
        exit();
    }
} else {
    header('Location: ../index.php?page=login');
    exit();
}
