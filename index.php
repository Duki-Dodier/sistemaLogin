<?php

require_once 'config.php';
require_once 'Auth.php';

$auth = new Auth($pdo);
$token = $_SESSION['token'];
$user = $auth->checkToken($token);

?>

<h1>LOGIN FEITO COM SUCESSO</h1>
<a type="button" href="logout.php">logout</a>

<?php echo '<pre>'; print_r($user['name']); echo '</pre>';exit; ?>
