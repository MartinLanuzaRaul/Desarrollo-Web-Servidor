<?php

require_once 'model/Model.php';

class ListaSteam extends Model
{

    private $id;
    private $codigo_videojuego;
    private $clave;

    public static function anyadirVideojuego() {
        try {
            $conexion = ListaSteam::db();

            if($_POST["codigoVideojuego"] && $_POST["claveVideojuego"]){
                $sql1 = "INSERT INTO `ListaSteam`(`codigo_videojuego`, `clave`) VALUES (?, ?)";
            
            
            $insertarVideojuego = $conexion->prepare($sql1);
            $insertarVideojuego->bindValue(1, $_POST["codigoVideojuego"]);

            $clave = $_POST["claveVideojuego"];
            $hash = password_hash($clave, PASSWORD_ARGON2I);  


            $insertarVideojuego->bindValue(2, $clave);

            }

            if($_POST["codigoVideojuego"] && $_POST["claveVideojuego"] == false){
                $sql1 = "INSERT INTO `ListaSteam`(`codigo_videojuego`, `clave`) VALUES (?)";
            
            
            $insertarVideojuego = $conexion->prepare($sql1);
            $insertarVideojuego->bindValue(1, $_POST["codigoVideojuego"]);

            }
            
           
    
            $insertarVideojuego->execute();
    
            echo "Inserción de videojuego exitosa";
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        }finally{
            return $insertarVideojuego;
        }
    }

    

    public static function eliminarVideojuego(){
        try {
            $conexion = ListaSteam::db();
    
            $sql1 = "DELETE FROM `ListaSteam` WHERE `codigo_videojuego` = ?";
    
            $eliminarVideojuego = $conexion->prepare($sql1);
            $eliminarVideojuego->bindValue(1, $_POST["idAEliminar"]);
            
    
            $eliminarVideojuego->execute();
    
            echo "El juego se ha eliminado";
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        }
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of codigo_videojuego
     */
    public function getCodigo_videojuego()
    {
        return $this->codigo_videojuego;
    }

    /**
     * Set the value of codigo_videojuego
     *
     * @return  self
     */
    public function setCodigo_videojuego($codigo_videojuego)
    {
        $this->codigo_videojuego = $codigo_videojuego;

        return $this;
    }

    /**
     * Get the value of clave
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set the value of clave
     *
     * @return  self
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

}
