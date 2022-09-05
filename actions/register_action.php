<?php

require_once "../config.php";

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$pass = filter_input(INPUT_POST, 'pass');
$cpass = filter_input(INPUT_POST, 'cpass');

$image_name = $_FILES['image']['name'];
$image_tmp_name = $_FILES['image']['tmp_name'];
$image_folder = __DIR__.'/../img/' . $image_name;


$query = "SELECT * FROM users WHERE email = :email";
$sql = $pdo->prepare($query);
$sql->bindValue(':email', $email);
$sql->execute();

if ($sql->rowCount() > 0) {
    $_SESSION['message'] = 'User already exist!';
    header("Location: ../register.php");
} else {
    if ($pass != $cpass) {
        $_SESSION['message'] = 'Password not match!';
        header("Location: ../register.php");
    }else{
        $query = "INSERT INTO users (name,email,password,image,token) VALUES (:name,:email,:password,:image_name,:token)";
        $sql = $pdo->prepare($query);
        $sql->bindValue(':name',$name);
        $sql->bindValue(':email',$email);

        $password_hash = password_hash($pass,PASSWORD_DEFAULT);
        $sql->bindValue(':password',$password_hash);
        $sql->bindValue(':image_name',$image_name);

        $token = md5(time().rand(0,9999));
        $sql->bindValue(':token',$token);
        $sql->execute();

        if($sql){
            move_uploaded_file($image_tmp_name,$image_folder);
            $_SESSION['token'] = $token;
            header("Location: ../index.php");
            exit;
          
        }

    }
}
