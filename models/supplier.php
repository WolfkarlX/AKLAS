<?php
namespace models;

class supplier extends conexion{ #Clase de proveedor que extiende la conexion, aqui se encontraran las funciones para manipular la tabla de proveedores
    private $id;
    private $name;
    private $contact;
    private $addres;
    private $city;
    private $postalCode;
    private $country;
    private $phone;

    private $table;

    public function __construct(){
        parent::__construct();
        $this->table = "suppliers";
    }

    public function addSupplier($SupplierName=null, $ContactName=null, $Address=null, $City=null, $PostalCode=null, $Country=null, $Phone=null){
        // Preparar una sentencia sql para insertar datos
        $sql = "INSERT INTO suppliers ( SupplierName, ContactName, Address, City, PostalCode, Country, Phone) VALUES ( :SupplierName, :ContactName, :Address, :City, :PostalCode, :Country, :Phone)";

        $stmt = $this->prepare($sql);

        // Asignar valores a los parámetros con bindParam
        $stmt->bindParam(':SupplierName', $SupplierName);
        $stmt->bindParam(':ContactName', $ContactName);
        $stmt->bindParam(':Address', $Address);
        $stmt->bindParam(':City', $City);
        $stmt->bindParam(':PostalCode', $PostalCode);
        $stmt->bindParam(':Country', $Country);
        $stmt->bindParam(':Phone', $Phone);

        return $stmt->execute();
    }

    public function getSuppliers(){
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getSuppliersByID($id){
        $sql = "SELECT * FROM {$this->table} WHERE SupplierID = :SupplierID";
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':SupplierID', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function editSupplier($id, $SupplierName=null, $ContactName=null, $Address=null, $City=null, $PostalCode=null, $Country=null, $Phone=null){
        // Preparar una sentencia sql para editar datos
        $sql = "UPDATE suppliers SET SupplierName = :SupplierName, ContactName = :ContactName, Address = :Address, City = :City, PostalCode = :PostalCode, Country = :Country, Phone = :Phone WHERE SupplierID = :SupplierID";

        $stmt = $this->prepare($sql);

        // Asignar valores a los parámetros con bindParam
        $stmt->bindParam(':SupplierID', $SupplierID);
        $stmt->bindParam(':SupplierName', $SupplierName);
        $stmt->bindParam(':ContactName', $ContactName);
        $stmt->bindParam(':Address', $Address);
        $stmt->bindParam(':City', $City);
        $stmt->bindParam(':PostalCode', $PostalCode);
        $stmt->bindParam(':Country', $Country);
        $stmt->bindParam(':Phone', $Phone);

        // Establecer el valor anterior en case de ser nulo
        $oldData = $this->getSuppliersByID($id);
        if(is_null($SupplierName)) $SupplierName = $oldData[1];
        if(is_null($ContactName)) $SupplierName = $oldData[2];
        if(is_null($Address)) $SupplierName = $oldData[3];
        if(is_null($City)) $SupplierName = $oldData[4];
        if(is_null($PostalCode)) $SupplierName = $oldData[5];
        if(is_null($Country)) $SupplierName = $oldData[6];
        if(is_null($Phone)) $SupplierName = $oldData[7];

        return $stmt->execute();
    }
}
?>