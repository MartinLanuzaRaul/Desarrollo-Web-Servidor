<?php

require_once 'models/Model.php';

class Usuario extends Model
{

    private $id;
    private $nombre;
    private $contrasenya;

    public static function introducirUsuario($nombreUsuario, $password) {

        $conexion = Usuario::db();


        $sql = "INSERT INTO `Usuario`(`nombre`, `contrasenya`) VALUES (:nombreUsuario,:contrasenya)";

        $resultado = $conexion->prepare($sql);
        $resultado->bindValue('nombreUsuario', $nombreUsuario);
        $resultado->bindValue('contrasenya', $password);

        $insertado = $resultado->execute();

        return $insertado; // Devuelve true la introduccion ha sido correcta
    }

    public static function autenticar($nombreUsuario) {

        $conexion = Model::db();


        $sql = "SELECT * FROM Usuario WHERE nombre = ?";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(1, $nombreUsuario);
        $resultado->execute();
        $resultado->setFetchMode(PDO::FETCH_CLASS, Usuario::class);

        $usuario = $resultado->fetch(); //Fetch devuelve el Usuario si lo encuentra, o false si no


        return $usuario; // Devuelve al usuario si se ha encontrado al usuario con su contraseña, o false si no
    }



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of contrasenya
     */ 
    public function getContrasenya()
    {
        return $this->contrasenya;
    }

    /**
     * Set the value of contrasenya
     *
     * @return  self
     */ 
    public function setContrasenya($contrasenya)
    {
        $this->contrasenya = $contrasenya;

        return $this;
    }

}
