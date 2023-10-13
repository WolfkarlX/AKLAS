<?php
namespace models;
class area extends conexion{

    private $name;
    private $description;
    private $id;
    
    public function __construct() {
        parent::__construct();
        $this->table = "area";
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

}
    
    
    
    
    
?> 