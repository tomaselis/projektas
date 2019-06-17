<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function connect()
{

    $host = '127.0.0.1';
    $db = 'PamokaPHP';
    $user = 'tomaselis';
    $password = '123P3tr4s123!';

    try {
        $pdo = new PDO("mysql:host=$host; dbname=$db; charset=utf8", $user, $password);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        return false;
    }
    return $pdo;
}


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$pswRepeat = $_POST['pswRepeat'];
//$password = md5(md5($password.'salt'));


submitUser($name, $password, $pswRepeat, $email);

function submitUser($name, $password, $pswRepeat, $email){
    $email = prepareEmail($email);
    //die('IKI CIA');
   // var_dump(secPswMatch($password, $pswRepeat));
    //var_dump(emailValid($email));
    //var_dump(emailInDb($email));
    if(!secPswMatch($password, $pswRepeat) || !emailValid($email) || !emailInDb($email)){

        return false;
    }

    $name = sanitizeInput($name);

    $password = generatePass($password);

    createUser($name, $password, $email);

}

function prepareEmail($str){

    $str = strtolower($str);
    return $str;

}

function generatePass($password){

    return md5(md5($password));
}

function sanitizeInput($input){

    $input = trim($input);
    return strip_tags($input);
}

function secPswMatch($password, $pswRepeat){

    if($password === $pswRepeat){
       return true;
    }
    return false;
}


function createUser($name, $password, $email)
{
        $sql = "INSERT INTO example(name, password, email) VALUES(:name, :password, :email)";
        $stmt = connect()->prepare($sql);

        $stmt->execute([
            "name" => $name,
            "password" => $password,
            "email" => $email,

        ]);
        //print_r($stmt->errorInfo());

}



function emailValid($email){


    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function emailInDb($email){


        $sql = "SELECT * FROM example WHERE email = ? ";
        $stmt = connect()->prepare($sql);
        $stmt->execute([$email]);
        if(!$stmt->fetch()){
            return true;
        }

        return false;

}


//EmailInDb($email);
    //phpinfo();
//
//$stmt = $pdo->query('SELECT * FROM example');
//
//while ($row = $stmt->fetch()){
//    echo '<pre>';
//    print_r($row);
//}

//print_r($_POST);