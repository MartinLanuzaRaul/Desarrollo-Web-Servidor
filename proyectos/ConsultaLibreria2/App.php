<?php
require_once "config.php";

class App
{

    public function run()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'home';
        }
        $this->$method();
    }

    public function home()
    {
        include("views/home.php");
    }

   

    public function consulta1()
    {
        // SELECT `codigo`, `centro_comercial`, `direccion`, `localidad`, `telefono`, `D.cantidad` FROM `tienda` JOIN disponibilidad as D ON (codigo = codigo_tienda)

        try {
            $conexion = new PDO(cadenaConexion, usuario, clave);

            if (isset($_POST['nombreAutor']) && !empty($_POST['nombreAutor'])) {
                //$nombreAutor = ($_POST['nombreAutor']);
                $sql1 = "SELECT * FROM `libro` WHERE `codigo_escritor` IN(SELECT `codigo` FROM `escritor` WHERE `nombre`= :nombreAutor) ORDER by `agno_publicacion` ASC;";


                $resultadoConsulta1 = $conexion->prepare($sql1);
                $resultadoConsulta1->bindValue(':nombreAutor', $_POST['nombreAutor']);
                $resultadoConsulta1->execute();
            }
        } catch (PDOException $e) {
            echo "Problema de conexion";
        } finally {
            $conexion = null;
            include("views/home.php");
        }
    }


    public function consulta4()
    {
        //SELECT `centro_comercial`, `cantidad` FROM `tienda` JOIN `disponibilidad` AS d ON `tienda`.`codigo` = `codigo_tienda` JOIN `libro` ON `libro`.`codigo` = `codigo_libro` WHERE `titulo` = 'El Viejo y el Mar'

        try {
            $conexion = new PDO(cadenaConexion, usuario, clave);

            if (isset($_POST['nombreLibro']) && !empty($_POST['nombreLibro'])) {
                //$nombreAutor = ($_POST['nombreAutor']);
                $sql1 = "SELECT `centro_comercial`, `cantidad` FROM `tienda` JOIN `disponibilidad` 
                AS d ON `tienda`.`codigo` = `codigo_tienda` JOIN `libro` ON `libro`.`codigo` = `codigo_libro` WHERE `titulo` = :nombreLibro";

                $resultadoConsulta4 = $conexion->prepare($sql1);
                $resultadoConsulta4->bindValue(':nombreLibro', $_POST['nombreLibro']);
                $resultadoConsulta4->execute();
            }
        } catch (PDOException $e) {
            echo "Problema de conexion";
        } finally {
            $conexion = null;
            include("views/home.php");
        }
    }
    public function borrarTiendaYDisponibilidad()
    {
        try {

            $conexion = new PDO(cadenaConexion, usuario, clave);
            if (isset($_POST["codigoTienda"]) && $_POST["codigoTienda"] != "") {
                $codigolibreria = $_POST["codigoTienda"];
            }

            $sql1 = "DELETE FROM disponibilidad  WHERE codigo_tienda = ?";
            $sql2 = "DELETE FROM tienda WHERE codigo = :codigoTienda";


            $resultadoborradodisponibilidad = $conexion->prepare($sql1);
            $resultadoborradodisponibilidad->bindValue(1, $codigolibreria);
            $resultadoborradodisponibilidad->execute();

            $resultadoborradotienda = $conexion->prepare($sql2);

            $resultadoborradotienda->execute(array(':codigoTienda' => $codigolibreria));

            echo "eliminacion de tienda exitosa";
        } catch (PDOException $e) {
            echo "Problema en la conexion";
            $conexion->rollback();
        } catch (Exception $b) {
            echo "Problema en la conexion";
            $conexion->rollback();
        } finally {
            include("views/home.php");
        }
    }
    

    public function InsertarTienda()
    {
        try {

            $conexion = new PDO(cadenaConexion, usuario, clave);



            $sql1 = "INSERT INTO tienda (centro_comercial,direccion,localidad,telefono)  values (?,?,?,?)";

            $insertartienda = $conexion->prepare($sql1);
            $insertartienda->bindValue(1, $_POST["centroComercial"]);
            $insertartienda->bindValue(2, $_POST["localidad"]);
            $insertartienda->bindValue(3, $_POST["direccion"]);
            $insertartienda->bindValue(4, $_POST["telefono"]);
            $insertartienda->execute();


            echo "Inserccion de tienda exitosa";
        } catch (PDOException $e) {
            echo "Problema en la conexion";
            $conexion->rollback();
        } catch (Exception $b) {
            echo "Problema en la conexion";
            $conexion->rollback();
        } finally {
            include("views/home.php");
        }
    }

    public function ActualizarPrecioLibros()
  {
    try{

        $conexion = new PDO(cadenaConexion, usuario, clave);
        $descuento = $_POST["descuento"] / 100;

      $sql1 = "UPDATE libro SET precio= precio -(precio* ? )  WHERE agno_publicacion BETWEEN  ?  AND ?";

      $resultadoborradodisponibilidad = $conexion->prepare($sql1);
      $resultadoborradodisponibilidad->bindValue(1, $descuento);
      $resultadoborradodisponibilidad->bindValue(2, $_POST["fechaA"]);
      $resultadoborradodisponibilidad->bindValue(3, $_POST["fechaB"]);
      $resultadoborradodisponibilidad->execute();

 

      echo "Actualizacion exitosa";

  
    }catch(PDOException $e){  
      echo "Problema en la conexion";
      $conexion->rollback();
    }catch(Exception $b){  
      echo "Problema en la conexion";
      $conexion->rollback();
    }finally{
      include("views/home.php");
    }

  }

  /* Consula 4:
  UPDATE disponibilidad SET cantidad = cantidad + ?
  */

  
}