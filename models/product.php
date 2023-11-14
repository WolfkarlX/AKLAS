<?php

namespace models;

use PDO;

class product extends conexion{
    protected $id;
    private $attribute, $attribute1, $attribute2, $attribute3, $attribute4, $attribute5, $attribute6, $attribute7, $attribute8, $attribute9, $attribute10;

    public function __construct()
    {
        parent::__construct();
        $this->table = "products";
        $this->id = "ProductID";
        $this->attribute = "ProductName";
        $this->attribute1 = "SupplierID";
        $this-> attribute2 = "CategoryID";
        $this-> attribute3 = "AreaID";
        $this->attribute4 = "StorageR";
        $this->attribute5 = "StorageRF";
        $this->attribute6 = "Price";
        $this->attribute7 = "Quantity";
        $this->attribute8 = "Description";
        $this->attribute9 = "MinQuantityLimit";
        $this->attribute10 = "MaxQuantityLimit";
    }

    public function getTable(){
        return $this->table;
    }

    public function getArray($Vname,$VSid, $VCid, $VAid, $Vsr, $Vsrf, $Vprice, $Vquantity  ,$Vdescription, $Vmin, $Vmax){
        $array = array(
            $this->attribute => $Vname, $this->attribute1 => $VSid,
            $this->attribute2 => $VCid, $this->attribute3 => $VAid,
            $this->attribute4 => $Vsr, $this->attribute5 => $Vsrf,
            $this->attribute6 => $Vprice, $this->attribute7 => $Vquantity,
            $this->attribute8 => $Vdescription, $this->attribute9 => $Vmin,
            $this->attribute10 => $Vmax);
        return $array;
    }

    public function getAtribute(){ 
        $array = array(
        $this->id,
        $this->attribute,
        $this->attribute1,
        $this-> attribute2,
        $this-> attribute3,
        $this->attribute4,
        $this->attribute5,
        $this->attribute6,
        $this->attribute7,
        $this->attribute8,
        $this->attribute9,
        $this->attribute10);
        return $array;
    }   

    public function JOIN(){
        $sql = "select p.ProductID, p.ProductName, s.SupplierName, c.CategoryName, a.NameArea, a.Storaget as Storagetype, p.StorageR, p.StorageRF, p.Price, p.Quantity, p.Description, p.MinQuantityLimit, p.MaxQuantityLimit from products p  
        left join area a on p.AreaID = a.AreaID
        left join  suppliers s on p.SupplierID = s.SupplierID
        left join Categories c on p.CategoryID = c.CategoryID ORDER BY p.ProductID;";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    public function getTags() {
        //SQL para obtener las etiquetas de cada producto
        $sql = "select ProductID, TagID, TagName from products_tags natural join tags";
        $stmt = $this->prepare($sql);
        // Ejecuta la sentencia
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTagsByProduct($id) {
        //SQL para obtener las etiquetas de cada producto
        $sql = "select TagID, TagName from products_tags natural join tags where ProductID = ?";
        $stmt = $this->prepare($sql);
        //Enlaza el identificador
        $stmt->bindParam(1, $id);
        // Ejecuta la sentencia
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setTags($id, $tags) {
        //SQL para eliminar las etiquetas de un producto
        $delete_sql = "DELETE FROM `products_tags` WHERE `ProductID` = ?";
        $delete_stmt = $this->prepare($delete_sql);
        $delete_stmt->bindValue(1, $id);
        $delete_stmt->execute();
        //SQL para establecer las etiquetas de un producto
        $insert_sql = "INSERT INTO `products_tags`(`ProductID`, `TagID`) VALUES (?, ?)";
        $insert_stmt = $this->prepare($insert_sql);
        foreach ($tags as $tag) {
            if($tag != 0){
                $insert_stmt->bindValue(1, $id);
                $insert_stmt->bindValue(2, $tag);
                $insert_stmt->execute();
            }
        }
    }

    public function getNotify() {
        //SQL para obtener las si falta y sobre cantidad de los productos
        $sql = "select ProductID, ProductName, (Quantity < MinQuantityLimit) as Falta, (Quantity > MaxQuantityLimit) as Sobra from $this->table";
        $stmt = $this->prepare($sql);
        // Ejecuta la sentencia
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} 


?>