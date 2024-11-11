<?php
include "models/config.php";

class Model
{
    protected static function db()
    {
        try {
            $conexion = new PDO(cadenaConexion, usuario, clave);
        } catch (PDOException $e) {
            echo "Problema de conexion";
        }finally{
            return $conexion;
        } 
    }
}
