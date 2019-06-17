<?php

//function prepareEmail($str)
//{
//
//    $str = strtolower($str);
//    return $str;
//
//}

//function generatePass($password)
//{
//
//    return md5(md5($password));
//}

//function sanitizeInput($input)
//{
//
//    $input = trim($input);
//    return strip_tags($input);
//}

//function secPswMatch($password, $pswRepeat)
//{
//
//    if ($password === $pswRepeat) {
//        return true;
//    }
//    return false;
//}



//function emailValid($email)
//{
//
//
//    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//        return true;
//    }
//    return false;
//}

//function emailInDb($email)
//{
//    $sql = "SELECT * FROM example WHERE email = ? ";
//    $stmt = connect()->prepare($sql);
//    $stmt->execute([$email]);
//    if (!$stmt->fetch()) {
//        return true;
//    }
//    return false;
//}


//print_r($_POST);