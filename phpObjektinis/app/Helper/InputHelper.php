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
}