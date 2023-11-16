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
        $sql = "select a.TransactionID, concat(b.FirstName, ' ', b.LastName) as EmployeeFullName, a.OrderDate, a.Reason from {$this->table} a join employees b on a.EmployeeID = b.EmployeID";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>