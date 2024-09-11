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


        $stmt = $conn->prepare("UPDATE users SET token = null ,  tokenExpiresAt = null, activated = 1 WHERE token = :token");
        $stmt->execute(array("token" => $token));
        header('location: ../index.php?page=login');
        exit();
    }


} else {
    $_SESSION['error'] = 'Verkeerde code, probeer het nogmaals.';
    header("location: ../index.php?page=activate_account&token=$token");
    exit();
}

