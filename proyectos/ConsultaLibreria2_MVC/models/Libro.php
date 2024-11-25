<?php
require_once "models/Model.php";
class Libro extends Model{
    private $db;
    private $codigo;
    private $codigo_escritor;
    private $titulo;
    private $agno_publicacion;
    private $numero_paginas;
    private $precio;


    public function __construct()
    {
        $this->db=Model::db();
    }

    public function getCodigo(){
        return $this->codigo;
    }
    public function getCodigo_escritor(){
        return $this->codigo_escritor;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getAgno_publicacion(){
        return $this->agno_publicacion;
    }
    public function getNumero_paginas(){
        return $this->numero_paginas;
    }
    public function getPrecio(){
        return $this->precio;
    }
   
    public static function consulta1($nombreAutor)
    {
        $todosLibros = null;

        try{
            $conexion = Libro::db();

            $sql1 = "SELECT * FROM `libro` WHERE `codigo_escritor` IN(SELECT `codigo` FROM `escritor` WHERE `nombre`= ?) ORDER by `agno_publicacion` ASC;";
        
            $resultado = $conexion->prepare($sql1);
            $resultado->bindValue(1, $nombreAutor);
            $resultado->execute();
  
            $todosLibros = $resultado->fetchAll(PDO::FETCH_CLASS, Libro::class);
            
        }catch(PDOException){
            echo "Problema en la conexion";
        }finally{
            return $todosLibros;
        }
        
       
        
    }
}