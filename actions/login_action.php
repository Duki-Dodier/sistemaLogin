<?php

require_once "../config.php";

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$pass = filter_input(INPUT_POST, 'pass');


$query = "SELECT * FROM users WHERE email = :email";
$sql = $pdo->prepare($query);
$sql->bindValue(':email', $email);
$sql->execute();

if ($sql->rowCount() > 0) {
   $user = $sql->fetch(PDO::FETCH_ASSOC);
   $_SESSION['token'] = $user['token'];
   header("Location: ../index.php");
   exit;
  
} else {
    $_SESSION['message'] = 'E-mail não cadastrado!';
    header("Location: ../login.php");
    exit;
}
