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

        public function insertar($tabla, $valores) {
            $keys = implode(', ', array_fill(0, count($valores), '?'));
            $columnas = implode(', ', array_keys($valores));            
            $query = "INSERT INTO $tabla ($columnas) VALUES ($keys)"; 
            $stmt = $this->prepare($query);
            return $stmt->execute(array_values($valores));  
        }

        public function delete($id) {
            // Preparar una sentencia sql para borrar datos
            $sql = "DELETE FROM {$this->table} WHERE {$this->id} = ?";
            $stmt = $this->prepare($sql);

            // Se asigna el id del registro
            $stmt->bindParam(1, $id);

            // Ejecuta la sentencia
            return $stmt->execute();
        }

        public function edit($tabla, $datosActualizar, $id) { 
            $consulta = "UPDATE $tabla SET ";
        
            $valores = [];
            foreach ($datosActualizar as $campo => $valor) {
                $valores[] = "$campo = :$campo";
            }
        
            $consulta .= implode(', ', $valores);
            $consulta .= " WHERE CategoryID = :id";
        
            $stmt = $this->prepare($consulta);
        
            // Asignamos los valores a los marcadores de posición.
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            foreach ($datosActualizar as $campo => $valor) {
                $stmt->bindValue(":$campo", $valor);
            }
            return $stmt->execute();
        }
    }
?>