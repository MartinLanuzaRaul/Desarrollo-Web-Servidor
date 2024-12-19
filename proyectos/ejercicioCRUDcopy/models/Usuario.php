<?php

require_once 'models/Model.php';

class Usuario extends Model
{
    private $id;
    private $nombreUsuario;
    private $password;

    public static function autenticar($nombreUsuario, $password)
    {
        try {
            $conexion = Usuario::db();


            $sql = "SELECT * FROM usuarios WHERE usuario = :nombreUsuario AND contrasenya = :password";
            $resultado = $conexion->prepare($sql);
            $resultado->bindValue(':nombreUsuario', $nombreUsuario);
            $resultado->bindValue(':contrasenya', $password);
            $resultado->execute();
            $encontrado = $resultado->fetch();

            if($encontrado != false){
                $encontrado = true;
            }

            return $encontrado;

        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
        }
    }

    public static function autenticarSoloUsuarioDevolviendoUsuario($nombreUsuario){

        echo "8";
        $conexion = Usuario::db();

        $sql = "SELECT * FROM usuarios WHERE usuario = :nombreUsuario";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':nombreUsuario', $nombreUsuario);
        $resultado->execute();

        $usuario = $resultado->fetch();

        return $usuario;
    }



    public static function introducirUsuario($name, $passHash)
    {
        try {

            $conexion = Usuario::db();

            $sql1 = "INSERT INTO `usuarios` (`usuario`, `contrasenya`) VALUES (?, ?)";
//INSERT INTO `usuarios`( `usuario`, `contrasenya`) VALUES ('a','a')
            $insertarUsuario = $conexion->prepare($sql1);
            $insertarUsuario->bindValue(1, $name);
            $insertarUsuario->bindValue(2, $passHash);

            $insertarUsuario->execute();

            echo "Inserción de videojuego exitosa";
        } catch (PDOException $e) {
            echo $e->getMessage();;
        } finally {
            return $insertarUsuario;
        }
    }

    public static function autenticarSoloUsuario(){
        try{
            $conexion = Usuario::db();

            $sql1 = "SELECT * FROM usuarios WHERE usuario = ?";

            $resultado = $conexion->prepare($sql1);
            $resultado->bindValue(1, $_POST["name"]);

            $resultado->execute();

            $encontrado = $resultado->fetch();

            if($encontrado != false){
                $encontrado = true;
            }
             return $encontrado;


        }catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
        }
    }
}
