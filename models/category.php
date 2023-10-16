<?php
namespace models;

class category extends conexion {
    protected $id;
    private $name;
    private $description;

    public function __construct()
    {
        parent::__construct();
        $this->table = "categories";
        $this->id = "CategoryID";
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
}
?>