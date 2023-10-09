<?php
    namespace models;
    use PDO, PDOException;
    class conexion extends PDO{ // Clase conexion que exitiende a PDO, es clase padre para una conexion a la base de datos
        private $servername= "localhost";
        private $username= "root";
        private $password= "";
        private $dbname= "aklas";
        protected $table;

        public function __construct()
        {
            try{
                parent::__construct("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function select($campos = array('*')) {
            $campos = implode(", ", $campos);
            $sql = "SELECT " . $campos . " FROM {$this->table}";
            $stmt = $this->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>