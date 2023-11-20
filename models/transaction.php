<?php
namespace models;

use PDO;

class transaction extends conexion {
    protected $id;
    private $employee;
    private $date;
    private $reason;
    private $table_details;

    public function __construct() {
        parent::__construct();
        $this->id = "TransactionID";
        $this->table = "transaction";
        $this->table_details = "transactiondetails";
    }

    public function getTransactions() { //Función para obtener las transacciones junto con el Nombre del empleado en vez de su id
        $sql = "select a.TransactionID, concat(b.FirstName, ' ', b.LastName) as EmployeeFullName, a.OrderDate, a.Reason from {$this->table} a join employees b on a.EmployeeID = b.EmployeID ORDER BY a.OrderDate DESC";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTransactionsDetails($id) {
        $sql = "SELECT p.ProductName as Producto, td.PInput as Entrada, td.POutput as Salida FROM {$this->table_details} td NATURAL JOIN products p WHERE TransactionID = ?";
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTransaction($employee, $reason) {
        $this->insertar($this->table, array("EmployeeID" => $employee ,"Reason" => $reason));
        return $this->lastInsertId();
    }

    public function addDetail($TransactionID, $ProductID, $input, $output) {
        return $this->insertar($this->table_details, array($this->id => $TransactionID, "ProductID" => $ProductID, "PInput" => $input, "POutput" => $output));
    }
}
?>