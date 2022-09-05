<?php

require_once 'config.php';
require_once 'Auth.php';

$auth = new Auth($pdo);
$token = $_SESSION['token'];
$user = $auth->checkToken($token);

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserPage</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- css file link -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1 class="title"><span>User</span> profile page</h1>

<section class="profile-container">
    <div class="profile">
        <img src="img/<?= $user['image']?>" alt="avatar">
        <h3><?= $user['name']?></h3>
        <a href="user_update.php" class="btn">Update</a>
        <a href="logout.php" class="delete-btn">Delete</a>
        <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
        </div>
    </div>
</section>
</body>
</html>