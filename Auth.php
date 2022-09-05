<?php

class Auth
{
    private  $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function checkToken($token)
    {
        if ($token) {
            $query = "SELECT * FROM users WHERE token = :token";
            $sql = $this->pdo->prepare($query);
            $sql->bindValue(':token', $token);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $user = $sql->fetch(PDO::FETCH_ASSOC);
                return $user;
            } else {
                header("Location: login.php");
                exit;
            }
        } else {
            header("Location: login.php");
            exit;
        }
    }
}
