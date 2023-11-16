<?php
namespace models;

use PDO;

class users extends conexion
{
    protected $id, $name, $lastname, $IdKey, $description, $email, $password, $rol;

    public function __construct(){
        parent::__construct();
        $this->table = "employees";
        $this->id = "EmployeID";
        $this->name = "FirstName";
        $this->lastname = "LastName";
        $this->IdKey = "IdKey";
        $this->description = "Description";
        $this->email = "email";
        $this->password = "Password";
        $this->rol = "rol";
    }

    public function getUsers() {
        return $this->select(array($this->id, $this->name, $this->lastname, $this->description, $this->IdKey, $this->email));
    }

    public function getTable()
    {
        return $this->table;
    }

    public function getArray($Vname, $lastname, $IdKey, $description, $email, $password, $rol)
    {
        $array = array($this->attribute => $Vname, $this->attribute1 =>$lastname, $this->attribute2 =>$IdKey, $this->attribute3 =>$description ,$this->attribute4 =>$email, $this->attribute5 =>$password, $this->attribute6 =>$rol);
        return $array;
    }
}

?>