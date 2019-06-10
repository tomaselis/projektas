<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$host = '127.0.0.1';
$db = 'PamokaPHP';
$user = 'tomaselis';
$password = '123P3tr4s123!';

try {
    $pdo = new PDO("mysql:host=$host; dbname=$db; charset=utf8", $user, $password);
}catch (PDOException $e){
    echo 'Connection failed: ' . $e->getMessage();
    }

    //phpinfo();

$stmt = $pdo->query('SELECT * FROM example');

while ($row = $stmt->fetch()){
    echo '<pre>';
    print_r($row);
}