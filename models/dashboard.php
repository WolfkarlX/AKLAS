<?php

namespace models;

use PDO;

class Dashboard extends conexion{
    
    
    public function getTop10(){
        $sql = "select ProductName, Quantity from products order by Quantity desc limit 10;";
        $stmt = $this->prepare($sql);   
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    public function getLess10(){
        $sql = "select ProductName, Quantity from products order by Quantity asc limit 10;";
        $stmt = $this->prepare($sql);   
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    public function getPorcentages(){
        $sql = " select a.AreaID AS area_id,
        a.NameArea AS area_nombre,
        SUM(p.Quantity) AS total_cantidad_productos,
        ROUND((SUM(p.Quantity) * 100.0) / (SELECT SUM(Quantity) FROM products), 2) AS porcentaje
        FROM area a JOIN products p ON a.AreaID = p.AreaID GROUP BY a.AreaID, a.NameArea;";
        $stmt = $this->prepare($sql);   
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    public function permisos() {  
        if (isset($_SERVER['HTTP_ORIGIN'])){
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
            header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
            header('Access-Control-Allow-Credentials: true');      
        }  
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
          if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))          
              header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
          if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
              header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
          exit(0);
        }
    }    
} 

?>