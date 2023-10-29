<?php
namespace models;
class area extends conexion{
    protected $id;
    private $name;
    private $description;
    protected $attribute, $attribute1;
    


    public function __construct() {
        parent::__construct();
        $this->table = "area";
        $this->id = "AreaID";
        $this -> attribute = "NameArea";
        $this -> attribute1 = "Description";
    }

    public function insertarArea($name, $description){
        // Preparar una sentencia sql para insertar datos
        $sql = "INSERT INTO {$this->table} (NameArea, Description) VALUES (:name, :description)";

        // Asignar valores a los parámetros con bindParam
        $stmt = $this->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description", $description);
        
        return $stmt ->execute();
    }

    public function getTable(){
        return $this->table;
    }
    
    public function getArray($Vname, $Vdescription){
        $array = array($this->attribute => $Vname, $this->attribute1 =>$Vdescription);
        return $array;
    }
}  
?> 