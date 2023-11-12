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
            $consulta .= " WHERE {$this->id} = :LS";
        
            $stmt = $this->prepare($consulta);
        
            // Asignamos los valores a los marcadores de posición.
            $stmt->bindValue(':LS', $id, PDO::PARAM_INT);
            foreach ($datosActualizar as $campo => $valor) {
                $stmt->bindValue(":$campo", $valor);
            }
            return $stmt->execute();
        }

        public function filterEachProducts($word){
            // Obtener las IDs de la base de datos y guardarlas en un array
            $query = "SELECT {$this->id} FROM {$this->table}";
            $statement = $this->prepare($query);
            $statement->execute();
            $ids = $statement->fetchAll(PDO::FETCH_COLUMN);
    
            // Inicializar el array para almacenar los resultados de las consultas SELECT
            $resultados = array();
            // Iterar sobre cada ID y realizar una consulta SELECT
            foreach ($ids as $id) {
                $consulta = "select p.ProductID, p.ProductName, s.SupplierName, c.CategoryName, a.NameArea, a.Storaget as Storagetype, p.StorageR, p.StorageRF, p.Price, p.Quantity, p.Description, p.MinQuantityLimit, p.MaxQuantityLimit from products p  
                left join area a on p.AreaID = a.AreaID
                left join  suppliers s on p.SupplierID = s.SupplierID
                left join Categories c on p.CategoryID = c.CategoryID WHERE {$word}.{$this->id} = ? ORDER BY p.ProductID;";
                $stmt = $this->prepare($consulta);
                $stmt->bindParam(1, $id, PDO::PARAM_INT);
                $stmt->execute();
                // Almacenar el resultado en el array de resultados
                $resultados[$id] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
            }
            return $resultados;
        }

        public function filter(){
            $consulta = "select p.ProductID, p.ProductName, s.SupplierName, c.CategoryName, a.NameArea, a.Storaget as Storagetype, p.StorageR, p.StorageRF, p.Price, p.Quantity, p.Description, p.MinQuantityLimit, p.MaxQuantityLimit from products p  
                left join area a on p.AreaID = a.AreaID
                left join  suppliers s on p.SupplierID = s.SupplierID
                left join Categories c on p.CategoryID = c.CategoryID ORDER BY p.{$this->id};";
                $stmt = $this->prepare($consulta);
                $stmt->execute();
                // Almacenar el resultado en el array de resultados
                $resultados[0] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultados;
        }
    }
?>