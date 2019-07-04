<?php

namespace App\Model;

use Core\Database;

class UserModel
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $role_id;
    private $active;
    private $db;



    public function __construct()
    {
        $this->db = new Database();
    }


    public function getId()
    {
        return $this->id;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setRoleId($role_id)
    {
        $this->role_id = $role_id;
    }

    public function getRoleId()
    {
        return $this->role_id;
    }
    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function create(){

        $this->db = new Database();
        $tableFields = "name, email, password, role_id, active";
        $values = "'".$this->name."','".$this->email."','".$this->password."','".$this->role_id."', '".$this->active."'";
        $this->db->insert('users', $tableFields, $values);
        $this->db->get();
    }

    public function save($id = null)
    {
        if($id !== null){
            $this->id = $id;
        }else{
            $this->create();
        }
    }

    public static function verification($email, $password)
    {
        $db = new Database();
        $db->select()->from('users')->where('email', $email)->andWhere('password', $password);
        return $db->get();
    }
}
