<?php
require_once('../storage/connection.php');
require_once('../model/category.php');

class CategoryRepository {
    public $conexion;
    public $ERRORDEL = "Error al preparar la sentencia";

    public function __construct() {
        $this->conexion = Connection::get();
    }
    
    public function fetchAll(){
        $query = "SELECT * FROM category";
        if (!$stmt = $this->conexion->prepare($query)) {
            throw Exception($this->ERRORDEL. $this->conexion->error);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $results = array();
        while ($myrow = $result->fetch_assoc()) {
            $results[] = $myrow;
        }
        return $results;
    }

    public function insert($category){
        
    }

    public function update($category){
        
    }

    public function delete($id){
        
    }


}

?>