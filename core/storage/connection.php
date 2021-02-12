<?php
require_once('../../config/db.php');

class Connection {

    public static function get(){
        $conexion = new mysqli(host,user,password,db_name) or die ("No se ha podido conectar al servidor de Base de datos");
        if ($conexion->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
        }      
        mysqli_query($conexion,"SET names 'utf8'");
        return $conexion;
    }
}