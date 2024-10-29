<?php 

    $cadenaConexion = "mysql:dbname=Escuela; host=localhost";
    $usuario = 'root';
    $clave = '';

    try{
        $conexion = new PDO($cadenaConexion, $usuario, $clave);

        $sql1 = "SELECT a.nombre, c.nombre FROM alumno a JOIN curso c ON(a.codigo_curso = c.codigo);";

        

        $resultado = $conexion->query($sql1);


        foreach($resultado as $alumno){
            echo $alumno['nombre']."<br>";
        }
        echo "Conexion establecida con exito";


    }catch(PDOException $e){
        echo "Problema de conexion";
    }
    finally{
        $conexion = null;
    }
?>