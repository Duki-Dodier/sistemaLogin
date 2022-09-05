<?php

require_once "config.php";

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- css file link -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="form-container">
        <form action="actions/register_action.php" method="POST" enctype="multipart/form-data">
            <h3>Register Now</h3>
           
            <?php if(!empty($_SESSION['message'])):?>
                <div class="message">
                    <span><?= $_SESSION['message'] ?></span>
                    <i class="fas fa-times"></i>
                </div>
            <?php $_SESSION['message'] =''; ?>
            <?php endif; ?>

            <input type="text" placeholder="enter your name" class="box" name="name" required>
            <input type="email" placeholder="enter your Email" class="box" name="email" required>
            <input type="password" placeholder="enter your password" class="box" name="pass" required>
            <input type="password" placeholder="confirm your password" class="box" name="cpass" required>
            <input type="file" class="box" name="image" accept="image/jpeg,image/png,image/jpg">
            <p>Already have an account?<a href="login.php"> Login Now</a></p>
            <input type="submit" value="registerNow" class="btn" name="submit">
        </form>
    </section>

</body>
</html>