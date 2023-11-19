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
        $campos = implode(", ", array($this->id, $this->name, $this->lastname, $this->description, $this->rol, $this->IdKey, $this->email));
        $sql = "SELECT " . $campos . " FROM {$this->table} WHERE {$this->id} <> 1";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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