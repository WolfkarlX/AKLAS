<?php
namespace models;
use PDO;

class tag extends conexion {
    protected $id, $attribute, $attribute1;
    private $name;
    private $description;

    public function __construct()
    {
        parent::__construct();
        $this->table = "tags";
        $this->id = "TagID";
        $this->attribute = "TagName";
        $this->attribute1 = "Description";
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

    public function filtertags(){
        $consulta = "select p.ProductID, p.ProductName, s.SupplierName, c.CategoryName, a.NameArea, a.Storaget as Storagetype, p.StorageR, p.StorageRF, p.Price, p.Quantity, p.Description, p.MinQuantityLimit, p.MaxQuantityLimit, IFNULL(group_concat(distinct t.TagName), 'no hay elementos') as 'Etiquetas' from products p  
        left join area a on p.AreaID = a.AreaID
        left join  suppliers s on p.SupplierID = s.SupplierID
        left join Categories c on p.CategoryID = c.CategoryID
        left join products_tags pt on p.ProductID = pt.ProductID
        left join tags t on pt.TagID = t.TagID
        GROUP BY p.ProductID, p.ProductName
        ORDER BY  pt.TagID;";
        $stmt = $this->prepare($consulta);
        $stmt->execute();
        // Almacenar el resultado en el array de resultados
        $resultados[0] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
}
?>