<?php

session_start();

$db_host = '172.17.0.3';
$db_user ='root';
$db_pass = 'root';
$db_name = 'nome_do_bd';


$pdo =  new PDO("mysql:dbname=$dbname".";host=$db_host",$db_user,$db_pass);