<?php 

namespace Proyecto\Aplicacion;

 class App{

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

    public function consulta1(){
    $cadenaConexion = "mysql:dbname=libreria; host=localhost";
    $usuario = 'root';
    $clave = '';

    try{
        $conexion = new \PDO($cadenaConexion, $usuario, $clave);

        $sql1 = "SELECT * FROM `escritor`ORDER BY nombre ASC";

        

        $resultado = $conexion->query($sql1);


        foreach($resultado as $escritor){
            echo $escritor['nombre']."<br>";
        }
        echo "Conexion establecida con exito";


    }catch(\PDOException $e){
        echo "Problema de conexion";
    }
    finally{
        $conexion = null;
    }
    }

    public function consulta4(){
        $cadenaConexion = "mysql:dbname=libreria; host=localhost";
        $usuario = 'root';
        $clave = '';
    
        try{
            $conexion = new \PDO($cadenaConexion, $usuario, $clave);

            if (isset($_POST['codigoLibro']) && !empty($_POST['codigoLibro'])) {    
                $codigoLibro = ($_POST['codigoLibro']);
            }
            if (isset($_POST['codigoTienda']) && !empty($_POST['codigoTienda'])) {    
                $codigoTienda = ($_POST['codigoTienda']);
            }

            $sql1 = "SELECT `cantidad` FROM `disponibilidad` WHERE codigo_libro = $codigoLibro and codigo_tienda = $codigoTienda";
    
            
    
            $resultado = $conexion->query($sql1);
    
    
            foreach($resultado as $disponibilidad){
                echo $disponibilidad['cantidad']."<br>";
            }
            if($disponibilidad['cantidad']<=0){
                echo "Ese libro no se encuentra en esa libreria.";
            }
    
    
        }catch(\PDOException $e){
            echo "Problema de conexion";
        }
        finally{
            $conexion = null;
        }
        }


 }

    
?>