<?php
namespace models;

class tag extends conexion {
    protected $id;
    private $name;
    private $description;

    public function __construct()
    {
        parent::__construct();
        $this->table = "tags";
        $this->id = "TagID";
    }

    public function addTag($Name, $Description){
        // Preparar una sentencia sql para insertar datos
        $sql = "INSERT INTO {$this->table} ( TagName, Description ) VALUES ( :TagName, :Description )";

        $stmt = $this->prepare($sql);

        // Asignar valores a los parámetros con bindParam
        $stmt->bindParam(':TagName', $Name);
        $stmt->bindParam(':Description', $Description);

        return $stmt->execute();
    }
}
?>