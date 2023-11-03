<?php
namespace models;

class category extends conexion {
    protected $id, $attribute, $attribute1;
    private $name;
    private $description;

    public function __construct()
    {   parent::__construct();
        $this->table = "categories";
        $this->id = "CategoryID";
        $this->attribute = "CategoryName";
        $this->attribute1 = "Description";
    }

    public function addCategory($Name, $Description){
        // Preparar una sentencia sql para insertar datos
        $sql = "INSERT INTO {$this->table} ( CategoryName, Description ) VALUES ( :CategoryName, :Description )";

        $stmt = $this->prepare($sql);

        // Asignar valores a los parámetros con bindParam
        $stmt->bindParam(':CategoryName', $Name);
        $stmt->bindParam(':Description', $Description);

        return $stmt->execute();
    }

    public function getTable(){
        return $this->table;
    }

    public function getArray($Vname, $Vdescription){
        $array = array($this->attribute => $Vname, $this->attribute1 => $Vdescription);
        return $array;
    }

    public function getSelectors(){
        $array = array($this->id, $this->attribute);
        $selectors = $this->select($array);
        return $selectors;
    }

}
?>