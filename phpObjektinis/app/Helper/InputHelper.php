<?php

namespace App\Helper;

class inputHelper
{

    public static function passwordGenerator($pass)
    {
        return md5(md5($pass.'salt'));
    }
    //validation
    //apdirbimas kaip su emails buvo
    //password generator
    //validacijos skaiciu

    public function secPswMatch($password, $pswRepeat)
    {
        if ($password === $pswRepeat){
            return true;
        }
        return false;
    }

    public function prepareEmail($str)
    {
        $str = strtolower($str);
        return $str;
    }

    public function emailValid($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    Public function emailInDb($email)
    {
        $sql = "SELECT * FROM users WHERE email = ? ";
        $stmt = connect()->prepare($sql);
        $stmt->execute([$email]);
        if (!$stmt->fetch()) {
            return true;
        }
        return false;
    }
}