<?php

namespace App\Controller;

use Core\Controller;
use \App\Helper\Helper;
use \App\Helper\InputHelper;



Class AccountController extends Controller
{
    public function index(){
        echo 'ok';
    }


    public function  registration()
    {
        $this->view->render('account/registration');

    }

    public function login()
    {
        $this->view->render('account/login');
    }

    public function create()
    {
//        $data = $_POST;
        //$helper = new \InputHelper(); nes static naudojame inputhelperyje

        if (inputHelper::checkEmail($_POST['email'])) {
            if (InputHelper::PasswordMatch($_POST['password'], $_POST['password2'])){
                $accountModelObject = new \App\Model\UserModel();
                $accountModelObject->setName($_POST['name']);
                $accountModelObject->setEmail($_POST['email']);
                $pass = \App\Helper\InputHelper::passwordGenerator($_POST['password']);
                $accountModelObject->setPassword($pass);
                $accountModelObject->setRoleId(1);
                $accountModelObject->setActive(1);
                $accountModelObject->save();
                $helper = new Helper();
                $helper->redirect('http://194.5.157.92/phpObjektinis/index.php');
            }
        }
    }

public function authentication()
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = \App\Model\UserModel::verification($email, $password);

    if (!empty($user)){

        //vyks dalykai prisiloginus
    }else{
        //neteisingas prisijungimas
        //redirectas i admin
    }
}
    //redirectas
    //kviesime postmodel klase ir create post metoda
    //redirect i index metoda
}