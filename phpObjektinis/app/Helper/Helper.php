<?php


namespace App\Helper; //namespace turi apsirasyti virtulau path

class Helper
{
    public function instanceMaker($controller)
    {
    }

    public function getController($path)
    {
        $controller = strtolower($path);
        $controller = ucfirst($controller);
        $controller = '\App\Controller\\'.$controller . 'Controller';
        return $controller;
    }
}