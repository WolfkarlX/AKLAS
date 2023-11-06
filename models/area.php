<?php
namespace models;

use PDO;

class area extends conexion{
    protected $id;
    private $name;
    private $description;
    protected $attribute, $attribute1, $attribute2, $attribute3, $attribute4;
    


    public function __construct() {
        parent::__construct();
        $this->table = "area";
        $this->id = "AreaID";
        $this -> attribute = "NameArea";
        $this -> attribute1 = "RacksQ";
        $this -> attribute2 = "Rackf";
        $this -> attribute3 = "Storaget";
        $this -> attribute4 = "Description";
        
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
    
    public function getArray($Vname, $Vrq, $Vrf, $Vtype, $Vdescription){
        $array = array($this->attribute => $Vname, $this->attribute1 =>$Vrq, $this->attribute2 =>$Vrf, $this->attribute3 =>$Vtype ,$this->attribute4 =>$Vdescription);
        return $array;
    }

    public function getSelectors(){
        $array = array($this->id, $this->attribute);
        $selectors = $this->select($array);
        return $selectors;
    }

    public function getNracks($id){
        $sql = "SELECT {$this->attribute1} FROM {$this->table} WHERE {$this->id} = ?";
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id);   
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    public function getNfiles($id){
        $sql = "SELECT {$this->attribute2} FROM {$this->table} WHERE {$this->id} = ?";
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id);   
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
}  
?> 