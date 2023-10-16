<?php
namespace models;

class supplier extends conexion{ //Clase de proveedor que extiende la conexion, aqui se encontraran las funciones para manipular la tabla de proveedores
    protected $id;
    private $name;
    private $contact;
    private $addres;
    private $city;
    private $postalCode;
    private $country;
    private $phone;

    public function __construct(){
        parent::__construct();
        $this->table = "suppliers";
        $this->id = "SupplierID";
    }

    //Agrega un provedores a la tabla de la base de datos
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

    //Devuleve todos los proveedores
    public function getSuppliers(){
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //Devuelve un proveedor segun su id
    public function getSuppliersByID($id){
        $sql = "SELECT * FROM {$this->table} WHERE SupplierID = :SupplierID";
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':SupplierID', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    //Edita un proveedor segun el id, se especifica el valor del campon en orden de la tabla, en caso de null se toma el valor actual de la tabla
    public function editSupplier($id, $SupplierName=null, $ContactName=null, $Address=null, $City=null, $PostalCode=null, $Country=null, $Phone=null){
        // Preparar una sentencia sql para editar datos
        $sql = "UPDATE suppliers SET SupplierName = :SupplierName, ContactName = :ContactName, Address = :Address, City = :City, PostalCode = :PostalCode, Country = :Country, Phone = :Phone WHERE SupplierID = :SupplierID";

        $stmt = $this->prepare($sql);

        // Asignar valores a los parámetros con bindParam
        $stmt->bindParam(':SupplierID', $id);
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
        if(is_null($ContactName)) $ContactName = $oldData[2];
        if(is_null($Address)) $Address = $oldData[3];
        if(is_null($City)) $City = $oldData[4];
        if(is_null($PostalCode)) $PostalCode = $oldData[5];
        if(is_null($Country)) $Country = $oldData[6];
        if(is_null($Phone)) $SupplierName = $oldData[7];

        return $stmt->execute();
    }

    //Elimina un proveedor segun su id
    public function delSupplier($id){
        // Preparar una sentencia sql para borrar datos
        $sql = "DELETE FROM suppliers WHERE SupplierID = :SupplierID";

        $stmt = $this->prepare($sql);

        // Se asigna el id del registro
        $stmt->bindParam(':SupplierID', $id);

        // Ejecuta la sentencia
        return $stmt->execute();
    }
}
?>