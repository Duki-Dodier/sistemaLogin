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
        <form action="actions/login_action.php" method="POST">
            <h3>Login</h3>
           
            <?php if(!empty($_SESSION['message'])):?>
                <div class="message">
                    <span><?= $_SESSION['message'] ?></span>
                    <i class="fas fa-times"></i>
                </div>
            <?php $_SESSION['message'] =''; ?>
            <?php endif; ?>

            <input type="email" placeholder="enter your Email" class="box" name="email" required>
            <input type="password" placeholder="enter your password" class="box" name="pass" required>
            <p>don't have an account?<a href="register.php"> Register Now</a></p>
            <input type="submit" value="Login" class="btn" name="submit">
        </form>
    </section>

</body>
</html>