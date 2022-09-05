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
    <title>Update</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- css file link -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <h1 class="title"><span>User</span> profile Update</h1>

    <section class="form-container">

        <form action="actions/update_action.php" method="POST" enctype="multipart/form-data">
            <h3>Update</h3>
            <img src="img/<?= $user['image'] ?>" alt="avatar">
            <h3><?= $user['name'] ?></h3>
            <?php if (!empty($_SESSION['message'])) : ?>
                <div class="message">
                    <span><?= $_SESSION['message'] ?></span>
                    <i class="fas fa-times"></i>
                </div>
                <?php $_SESSION['message'] = ''; ?>
            <?php endif; ?>

            <label>Name:</label>
            <input type="text" value="<?= $user['name'] ?>" placeholder="enter your name" class="box" name="name" required>
            <label>Email:</label>
            <input type="email" value="<?= $user['email'] ?>" placeholder="enter your Email" class="box"  id="emaildesa" name="email" disabled>
            <label>Password:</label>
            <input type="password" placeholder="enter your old password" class="box" name="oldpass" required>
            <label>NewPassword:</label>
            <input type="password" placeholder="enter your new password" class="box" name="newpass" required>
            <label>ConfirmPassword:</label>
            <input type="password" placeholder="confirm your new password" class="box" name="cnewpass" required>
            <input type="file" class="box" name="image" accept="image/jpeg,image/png,image/jpg">
            <input type="submit" value="UpdateNow" class="btn" name="submit">
        </form>

    </section>
</body>

</html>