<?php

require_once '../config.php';
require_once '../Auth.php';

$auth = new Auth($pdo);
$token = $_SESSION['token'];
$user = $auth->checkToken($token);

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$oldpass = filter_input(INPUT_POST, 'oldpass');
$newpass = filter_input(INPUT_POST, 'newpass');
$cnewpass = filter_input(INPUT_POST, 'cnewpass');

$image_name = $_FILES['image']['name'];
$image_tmp_name = $_FILES['image']['tmp_name'];
$image_folder = __DIR__ . '/../img/' . $image_name;


if ($newpass != $cnewpass) {
    $_SESSION['message'] = 'NewPassword and ConfirmPassword not match!';
    header("Location: ../user_update.php");
} elseif (password_verify($oldpass, $user['password'])) {
    $query = "UPDATE users SET name = :name, password =:password,image =:image_name, token=:token WHERE id = :id";
    $sql = $pdo->prepare($query);
    $sql->bindValue(':name', $name);

    $sql->bindValue('id', $user["id"]);

    $password_hash = password_hash($newpass, PASSWORD_DEFAULT);
    $sql->bindValue(':password', $password_hash);
    $sql->bindValue(':image_name', $image_name);

    $token = md5(time() . rand(0, 9999));
    $sql->bindValue(':token', $token);
    $sql->execute();

    if ($sql) {
        move_uploaded_file($image_tmp_name, $image_folder);
        $_SESSION['token'] = $token;
        header("Location: ../index.php");
        exit;
    }
} else {
    $_SESSION['message'] = "Senha incorreta!";
    header("Location: ../user_update.php");
    exit;
}
