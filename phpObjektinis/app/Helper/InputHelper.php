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

    public static function PasswordMatch($password, $password2)
    {
        if ($password === $password2) {
            return true;
        }
        return false;
    }

    public static function prepareEmail($str)
    {
        $str = strtolower($str);
        return $str;
    }

    public static function emailValid($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function uniqueEmail($email)
    {
        $db = new \Core\Database();
        $db->select()->from('users')->where('email', $email);
        if ($db->get()) {
            return false;
        }
        return true;
    }

    public static function checkEmail($email)
    {
        $email = self::prepareEmail($email);
        if (self::uniqueEmail($email) && self::emailValid($email)) {
            return true;
        }
            return false;
    }

}