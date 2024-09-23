<?php
include '../../private/conn_digidate_examen.php';
session_start();
$code = $_POST["code"];
$token = $_POST["token"];
$currentTime = date('Y-m-d H:i:s', time());

$sql = "SELECT * FROM users WHERE token = :token";
$query = $conn->prepare($sql);
$query->bindParam(':token', $token);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

if ($_SESSION['verification_code'] == $code) {
    if ($result['tokenExpiresAt'] > $currentTime) {

        if (isset($_SESSION['mailCode']) && $_SESSION['mailCode'] == 'activateAccount') {
            $stmt = $conn->prepare("UPDATE users SET token = null ,  tokenExpiresAt = null, activated = 1 WHERE token = :token");
            $stmt->execute(array("token" => $token));

            unset($_SESSION['mailCode']);

            header('location: ../index.php?page=login');
            exit();

        } elseif (isset($_SESSION['mailCode']) && $_SESSION['mailCode'] == '2fa') {

            $stmt = $conn->prepare("UPDATE users SET token = null ,  tokenExpiresAt = null, activated = 1 WHERE token = :token");
            $stmt->execute(array("token" => $token));

            unset($_SESSION['mailCode']);
            $_SESSION['roleId'] = 1;
            $_SESSION['userId'] = $result['userId'];
            header('location: ../index.php?page=home');
            exit();
        }
    }


} else {
    $_SESSION['error'] = 'Verkeerde code, probeer het nogmaals.';
    header("location: ../index.php?page=2fa&token=$token");
    exit();
}

